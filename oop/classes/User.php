<?php
    class User{
        public static function auth(){
            if(isset($_SESSION['user_id'])){
                $user_id = $_SESSION['user_id'];
                return DB::table('users')->where('id', $user_id)->getOne();
            }else{
                return false;
            }
        }
        public function login($req){
            $err = [];
            if(isset($req)){
                if(empty($req['email'])){
                    $err[] = "Email field is required.";
                }elseif(!filter_var($req['email'], FILTER_VALIDATE_EMAIL)){
                    $err[] = "Invalid email format.";
                }elseif(empty($req['password'])){
                    $err[] = "Password field is required.";
                }
                if(count($err)){
                    return $err;
                }else{   
                    $email = Helper::filter($req['email']);
                    $password = $req['password'];
                    $user = DB::table('users')->where('email', $email)->getOne();
                    if($user){
                        $db_password = $user->password;
                        if(password_verify($password, $db_password)){
                            $_SESSION['user_id'] = $user->id;
                            return "success";
                        }else{
                            $err[] = "Wrong password!";
                        }
                    }else{
                        $err[] = "Wrong email!";
                    }
                    return $err;
                }
            }
        }
        public function register($req){
            $err = [];
            if(isset($req)){
                if(empty($req['name'])){
                    $err[] = "Name field is required.";
                }elseif(empty($req['email'])){
                    $err[] = "Email field is required.";
                }elseif(!filter_var($req['email'], FILTER_VALIDATE_EMAIL)){
                    $err[] = "Invalid email format.";
                }elseif(empty($req['password'])){
                    $err[] = "Password field is required.";
                }else{
                    $user = DB::table('users')->where('email', $req['email'])->getOne();
                    if($user){
                        $err[] = "Your email is already exist.";
                    }
                }
                if(count($err)){
                    return $err;
                }else{
                    $user = DB::create('users', [
                        'name' => Helper::filter($req['name']),
                        'slug' => Helper::slug($req['name']),
                        'email' => Helper::filter($req['email']),
                        'password' => password_hash($req['password'], PASSWORD_BCRYPT)
                    ]);
                    $_SESSION['user_id'] = $user->id;
                    return "success";
                }
            }
        }
    }
?>