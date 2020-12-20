<?php
    require_once "oop/autoload.php";
    if($_POST['comment']){
        $user_id = User::auth()->id;
        $project_id = $_POST['project_id'];
        $cmt = $_POST['comment'];

        $comment = DB::create('project_comments', [
            'user_id' => $user_id,
            'project_id' => $project_id,
            'comment' => $cmt
        ]);
        
        if($comment){
            $cmd = DB::table('project_comments')->where('project_id', $project_id)->orderBy('id', 'DESC')->get();
            $html = '';
            foreach($cmd as $c){
                $user = DB::table('users')->where('id', $c->user_id)->getOne();
                $cs = strtotime($c->created_at);
                $ago = Project::get_time_ago( $cs );
                $html .= "
                        <div class='card text-white bg-dark rounded-pill my-2'>
                            <div class='card-header rounded-pill'>
                                <div class='container'>
                                    <div class='row d-flex justify-content-between align-items-center'>
                                        <div class='col-6'>
                                            <img src='bootstrap/images/img.png' alt='' class='img-fluid mx-2' width='28px'>
                                            <span style='font-size: 20px;'>{$user->name}</span>
                                        </div>
                                        <div class='col-6 text-right'>   
                                            <span class='mr-3'>{$ago}</span>
                                        </div>
                                    </div>
                                    <hr class='border border-dark'>
                                    <p class='px-4'>{$c->comment}</p>
                                </div>
                            </div>
                        </div>
                        ";
            }
            echo $html;        
        }
    }
?>