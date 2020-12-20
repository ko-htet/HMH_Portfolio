<?php
    require_once "include/header.php";
    if(User::auth()){
        Helper::redirect("index.php");
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $user = new User();
        $user = $user->login($_POST);
        if($user == "success"){
            Helper::redirect("index.php");
        }
    }
?>
<div class="card text-white bg-dark mb-3">
    <div class="card-header text-info"><h1>Login</h1></div>
    <div class="card-body">
        <form action="" method="post">
        <?php
            if(isset($user) and is_array($user)){
                foreach($user as $e){
                ?>
                <div class="alert alert-danger"><?php echo $e; ?></div>
                <?php
                }
            }
        ?>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control c_input mb-3">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control c_input mb-3">
            <p>Have an account? <a href="login.php">Register</a></p>
            <input type="submit" class="btn btn-info btn-block" value="Login">
        </form>
    </div>
</div>
<?php require_once "include/footer.php"; ?>