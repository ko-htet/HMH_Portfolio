<?php
    require_once "oop/autoload.php";
    $request = $_GET;
    if(isset($request['like'])){
        $user_id = $request['user_id'];
        $project_id = $request['project_id'];

        $use = DB::table('project_likes')->where('user_id', $user_id)->andwhere('project_id', $project_id)->getOne();
        if($use){
            echo "already_like";
        }else{
            $user = DB::create('project_likes', [
                'user_id' => $user_id,
                'project_id' => $project_id
            ]);
            if($user){
                $like_count = DB::table('project_likes')->where('project_id', $project_id)->count();
                echo $like_count;
            }
        }
    }
?>