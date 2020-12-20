<?php
    require_once "oop/autoload.php";
    $request = $_GET;
    $user = DB::raw("select * from projects where title like '{$request['key']}%'")->get();
    $html = '';
    foreach($user as $u){
        $slug = $u->slug;
        $html .= "<div id='search_res' class='p-2'>
                    <a href='detail.php?slug={$slug}' class='text-decoration-none'>{$u->title}</a>
                </div>";
    }
    echo $html;
?>