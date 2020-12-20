<?php
    class Project{
        public static function all(){
            $data = DB::table('projects')->orderBy('id', 'DESC')->paginate(3);
            foreach($data['data'] as $k => $v){
                $data['data'][$k]->like_count = DB::table('project_likes')->where('project_id', $v->id)->count();
                $data['data'][$k]->comment_count = DB::table('project_comments')->where('project_id', $v->id)->count();
            }
            return $data;
        }
        public static function detail($slug){
            $data = DB::table('projects')->where('slug', $slug)->getOne();
            $data->like_count = DB::table('project_likes')->where('project_id', $data->id)->count();
            $data->comment_count = DB::table('project_comments')->where('project_id', $data->id)->count();
            $data->comments = DB::table('project_comments')->where('project_id', $data->id)->orderBy('id', 'DESC')->get();
            return $data;
        }
        public static function get_time_ago( $time )
        {
            date_default_timezone_set("Asia/Yangon");
            $time_difference = time() - $time;
        
            if( $time_difference < 1 ) { return 'a few minute ago'; }
            $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
                        30 * 24 * 60 * 60       =>  'month',
                        24 * 60 * 60            =>  'day',
                        60 * 60                 =>  'hour',
                        60                      =>  'minute',
                        1                       =>  'second'
            );
        
            foreach( $condition as $secs => $str )
            {
                $d = $time_difference / $secs;
        
                if( $d >= 1 )
                {
                    $t = round( $d );
                    return  $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
                }
            }
        }
        public static function create($req){
            $err = [];
            $image = $_FILES['image'];
            $image_name = $image['name'];
            $path = "bootstrap/images/projects/$image_name";
            $tmp_name = $image['tmp_name'];
            if(move_uploaded_file($tmp_name, $path)){
                $project = DB::create('projects', [
                    'title' => $req['title'],
                    'language' => $req['language'],
                    'slug' => Helper::slug($req['title']),
                    'codeurl' => $req['codeurl'],
                    'demourl' => $req['demourl'],
                    'image' => $path,
                    'description' => $req['description']
                ]);
                return "success";
            }else{
                $err[] = "Insert projects table not successful";
            }
            return $err;
        }
    }
?>