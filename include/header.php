<?php
    ob_start();
    require_once "oop/autoload.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Han Min Htet</title>
    <meta name="description" content="Welcome to my portfolio. I am Full-stack web developer, MYANMAR.">
    <meta name="keywords" content="Full-stack Web Developer, Frontend Web Developer, Backend Web Developer,
     UI-UX Designer, Developer, Web Developer, PHP Developer">
    <meta name="robots" content="INDEX, FOLLOW">
    <meta name="language" content="EN">
    <meta name="revisit-after" content="5 days">
    <meta name="rating" content="General">
    <meta name="distribution" content="Global">
    <link rel="icon" href="bootstrap/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/custom.css">
    <link rel="stylesheet" href="ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="bootstrap/css/toastr.css">
</head>
<body class="bg-dark">
    <section id="nav" class="container-fluid bg-dark NavBar fixed-top">
        <div class="container-fluid" data-aos="zoom-out">
            <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
                <a href="#header" class="navbar-brand"><h2><b>Portfo<span class="text-info">lio.</span></b></h2></a>
                <button class="navbar-toggler" data-target="#Nav" data-toggle="collapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="Nav">
                    <ul class="navbar-nav text-white ml-auto">
                        <li class="nav-item my-2">
                            <div class="bg-dark rounded ml-2">
                                <input id="search_pro" type="text" class="form-control" placeholder="search...">
                                <div id="search_res"></div>
                            </div>
                        </li>
                    <?php
                        if(User::auth()){
                            ?>
                            <li class="nav-item d-block my-2">
                                <a href="" class="nav-link text-info ml-2"><b><?php echo User::auth()->name; ?></b></a>
                            </li>
                            <li class="nav-item my-2"><a href="logout.php" class="nav-link btn btn-outline-info text-white btn-sm ml-2">Logout</a></li>
                            <?php
                        }else{
                            ?>
                            <li class="nav-item my-2"><a href="login.php" class="nav-link btn btn-outline-info text-white btn-sm ml-2">Login</a></li>
                            <li class="nav-item my-2"><a href="register.php" class="nav-link btn btn-outline-info text-white btn-sm ml-2">Register</a></li>
                            <?php
                        } 
                    ?>
                    </ul>
                </div>
            </nav>
        </div>
    </section>
    <section id="">
        <div class="jumbotron jumbotron-fluid header">
            <div class="container text-white pt-5">
                <p class="lead">Hi, I'm</p>
                <h1 class="display-4"><b>Han Min Htet</b></h1>
                <h2 class="mb-3">Jr Web Developer</h2>
                <?php
                    if(User::auth()){
                        ?>
                        <h4 class="my-3">Hello <b class="text-success"><?php echo User::auth()->name; ?></b></h4>
                        <a href="logout.php" class="btn btn-success">Logout</a>
                        <?php
                    }else{
                        ?>
                        <a href="login.php" class="btn btn-outline-success mr-5">SignIn</a><a href="register.php" class="btn btn-success">SignUp</a>
                        <?php
                    }
                ?>
            </div>
        </div>
    </section>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 col-12">
                    <div class="card text-white bg-dark mb-3">
                        <div class="card-header"><h3>Welcome</h3></div>
                        <div class="card-body p-0">
                            <ul class="list-group">
                            <?php
                                if(User::auth()){
                                    $user_id = User::auth()->id;
                                    if($user_id == 1){
                                        ?>
                                        <a href="addpro.php" class="btn btn-dark text-left p-0"><li class="list-group-item bg-dark">Add Project</li></a>
                                        <?php
                                    }
                                }
                            ?>
                                <a href="index.php" class="btn btn-dark text-left p-0"><li class="list-group-item bg-dark">About Me</li></a>
                                <a href="certificate.php" class="btn btn-dark text-left p-0"><li class="list-group-item bg-dark">Certificate</li></a>
                                <a href="resume.php" class="btn btn-dark text-left p-0"><li class="list-group-item bg-dark">Resume</li></a>
                                <a href="cv.php" class="btn btn-dark text-left p-0"><li class="list-group-item bg-dark">CV</li></a>
                                <a href="projects.php" class="btn btn-dark text-left p-0"><li class="list-group-item bg-dark">Projects</li></a>
                                <a href="contact.php" class="btn btn-dark text-left p-0"><li class="list-group-item bg-dark">Contact Me</li></a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-12">