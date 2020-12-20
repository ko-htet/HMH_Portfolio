<?php
    require_once "include/header.php";
    if(!isset($_GET['slug'])){
        Helper::redirect("404.php");
    }else{
        $slug = $_GET['slug'];
        $data = Project::detail($slug);
    }
?>
<div class="card text-white bg-dark mb-3">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6 col-12"><h1 class="text-info"><?php echo $data->title; ?></h1></div>
            <div class="col-md-6 col-12 d-flex justify-content-end align-items-center">
                <a href="<?php echo $data->codeurl; ?>" target="_blank" class="btn btn-success mr-2">View code</a>
                <a href="<?php echo $data->demourl; ?>" target="_blank" class="btn btn-warning">Live Demo</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="card text-white bg-dark mb-3">
            <div class="card-header"><img src="<?php echo $data->image; ?>" alt="" class="img-fluid"></div>
            <div class="card-body">
                <h4 class="card-title">Language: <b class="text-info"><?php echo $data->language; ?></b></h4>
                <h4 class="card-title">Description:</h4>
                <p><?php echo $data->description; ?></p>
                <div class="card text-white bg-dark rounded-pill mb-3">
                    <div class="card-header rounded-pill">
                        <div class="row py-2">
                        <?php
                            $user_id = User::auth()? User::auth()->id : 0;
                            $project_id = $data->id;
                        ?>
                            <div class="col-6 text-center">
                                <button class="border-0 bg-transparent text-white" id="like" user_id="<?php echo $user_id; ?>" project_id="<?php echo $project_id; ?>"></a><i class="ion-ios-heart mr-2"
                                    ></i> Like <small id="like_count"><?php echo $data->like_count; ?></small></button>
                            </div>
                            <div class="col-6 text-center">
                                <i class="ion-ios-chatboxes mr-2"></i> Comment <small id="comment_count"><?php echo $data->comment_count; ?></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card text-white bg-dark rounded-pill mb-3">
                    <div class="card-header rounded-pill py-3">
                    <?php
                        if(User::auth()){?>
                            <form action="" method="POST" id="Cmd">
                                <div class="row">
                                    <div class="col-sm-10 col-12 mb-2">
                                        <input type="text" id="comment" class="form-control c_input" placeholder="Enter comment.....">
                                    </div>
                                    <div class="col-sm-2" col-12>
                                        <input type="submit" value="Send" class="btn btn-dark btn-block rounded-pill mr-1">
                                    </div>
                                </div>
                            </form><?php
                        }else{
                            ?>
                            <div class="d-flex justify-content-center align-items-center">
                                <p class="text-warning pt-2">
                                    If you want to make a like/comment, please 
                                    <a href="login.php">Login</a> / <a href="register.php">Register</a> first!
                                </p>
                            </div>
                            <?php
                        }
                    ?>
                        
                    </div>
                </div>
                <div id="comment_list">
                    <?php
                        foreach($data->comments as $c){
                    ?>
                        <div class="card text-white bg-dark rounded-pill my-2">
                            <div class="card-header rounded-pill">
                                <div class="container">
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="col-6">
                                            <img src="bootstrap/images/img.png" alt="" class="img-fluid mx-2" width="28px">
                                            <span style="font-size: 20px;"><?php echo DB::table('users')->where('id', $c->user_id)->getOne()->name; ?></span>
                                        </div>
                                        <div class="col-6 text-right">
                                        <?php
                                            $cs = strtotime($c->created_at);
                                            echo Project::get_time_ago( $cs ).'<br>';
                                        ?>
                                        </div>
                                    </div>
                                    <hr class="border border-dark">
                                    <p class="px-4"><?php echo $c->comment; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once "include/footer.php"; ?>

<script>
    var like = document.querySelector('#like');
    var like_count = document.querySelector('#like_count');
    like.addEventListener('click', function(){
        var user_id = this.getAttribute('user_id');
        var project_id = this.getAttribute('project_id');
        if(user_id == 0){
            toastr.warning("Please Login or Register First!");
        }else if(user_id > 0){
            axios.get(`api.php?like&user_id=${user_id}&project_id=${project_id}`)
                .then(function(res){
                    if(res.data == "already_like"){
                        toastr.warning("Already like this.");
                    }
                    if(Number.isInteger(res.data)){
                        like_count.innerHTML = res.data;
                        toastr.success("Successfully like.");
                    }
                })
        }
    });

    var Cmd = document.getElementById('Cmd');
    Cmd.addEventListener('submit', function(e){
        e.preventDefault();
        var data = new FormData();
        data.append('comment', document.getElementById('comment').value);
        data.append('project_id', <?php echo $data->id; ?>);
        axios.post(`cmd.php`, data)
            .then(function(res){
                document.getElementById('comment_list').innerHTML = res.data;
            })
    })
</script>