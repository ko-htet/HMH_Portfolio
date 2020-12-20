<?php
    require_once "include/header.php";
    $pro = Project::all();
?>
<div class="card text-white bg-dark mb-3">
    <div class="card-header">
        <div class="row">
            <div class="col-6"><h1 class="text-info">Projects</h1></div>
            <div class="col-6 d-flex justify-content-end align-items-center">
                <a href="<?php echo $pro['pre_page'] ?>" class="btn btn-dark mr-2">Pre</a>
                <a href="<?php echo $pro['next_page'] ?>" class="btn btn-dark">Next</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
        <?php
            foreach($pro['data'] as $p){
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