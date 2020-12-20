<?php
    class Helper{
        public static function redirect($page){
            header("location:$page");
        }
        public static function filter($str){
            $str = trim($str);
            $str = stripcslashes($str);
            $str = htmlspecialchars($str);
            return $str;
        }
        public static function slug($str){
            $str = strtolower($str);
            $str = str_ireplace(' ', '-', $str);
            $str .= '-'.time();
            return $str;
        }
    }
?>