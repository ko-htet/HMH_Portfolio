<?php
    require_once "include/header.php";
    if(isset($_GET['project'])){
        $slug = $_GET['project'];
        $pj = Project::pro($slug);
    }elseif(isset($_GET['mini_project'])){
        $slug = $_GET['mini_project'];
        $pj = Project::minipro($slug);
    }else{
        $pj = Project::all();
    }
    $ac = DB::table('projects')->count();
    $pc = DB::table('projects')->where('category', 'project')->count();
    $mc = DB::table('projects')->where('category', 'mini_project')->count();
?>
<div class="card text-white bg-dark mb-3">
    <div class="card-header">
        <div class="row">
            <div class="col-7">
                <!-- <h1 class="text-info">Projects</h1> -->
                <a href="projects.php" class="btn pBtn mr-3">
                    All<span class="badge badge-primary badge-pill ml-3"><?php echo $ac; ?></span>
                </a>
                <a href="projects.php?project=project" class="btn pBtn mr-3">
                    Projects<span class="badge badge-primary badge-pill ml-3"><?php echo $pc; ?></span>
                </a>
                <a href="projects.php?mini_project=mini_project" class="btn pBtn mr-3">
                    Mini_projects<span class="badge badge-primary badge-pill ml-3"><?php echo $mc; ?></span>
                </a>
            </div>
            <div class="col-5 d-flex justify-content-end align-items-center">
                <a href="<?php echo $pj['pre_page'] ?>" class="btn pBtn mr-2">Pre</a>
                <a href="<?php echo $pj['next_page'] ?>" class="btn pBtn">Next</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
        <?php
            foreach($pj['data'] as $p){
        ?>
            <div class="col-md-4 col-sm-6 col-12">
                <div class="card text-white bg-dark mb-3">
                    <div class="card-header"><img src="<?php echo $p->image; ?>" alt="" class="img-fluid"></div>
                    <div class="card-body">
                        <h5 class="card-title text-info"><?php echo $p->title; ?></h5>
                        <h6 class="card-title text-info"><b><?php echo $p->language; ?></b></h6>
                        <div class="row">
                            <div class="col-4">
                                <i class="ion-ios-heart mr-2"></i><small><?php echo $p->like_count ?></small>
                            </div>
                            <div class="col-4">
                                <i class="ion-ios-chatboxes mr-2"></i><small><?php echo $p->comment_count ?></small>
                            </div>
                            <div class="col-4 text-center">
                                <a href="<?php echo "detail.php?slug=$p->slug"; ?>"><span class="badge bg-info text-white p-1">view</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
</div>
<?php require_once "include/footer.php"; ?>