<?php
    require_once "oop/autoload.php";
    session_destroy();
    Helper::redirect("index.php");
?>