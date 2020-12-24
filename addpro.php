<?php
    require_once "include/header.php";
    if(!isset($_SESSION['user_id'])){
        Helper::redirect("404.php");
    }elseif($_SESSION['user_id'] != 1){
        Helper::redirect("404.php");
    }else{
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            print_r($_POST);
            $pro = new Project();
            $pro = $pro->create($_POST);
            if($pro == "success"){
                Helper::redirect("index.php");
            }
        }
?>
<div class="card text-white bg-dark mb-3">
    <div class="card-header text-info"><h1>Add Project</h1></div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
        <?php
            if(isset($pro) and is_array($pro)){
                foreach($pro as $e){
                    ?>
                    <div class="alert alert-danger"><?php echo $e; ?></div>
                    <?php
                }
            }
        ?>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control c_input mb-3">
            <label for="cat">Category</label>
            <select name="category" id="cat" class="form-control c_input mb-3">
                <option selected>Choose Category</option>
                <option value="project">Project</option>
                <option value="mini_project">Mini Project</option>
            </select>
            <label for="language">Language</label>
            <input type="text" id="language" name="language" class="form-control c_input mb-3">
            <label for="codeurl">Code URL</label>
            <input type="text" id="codeurl" name="codeurl" class="form-control c_input mb-3">
            <label for="demourl">Demo URL</label>
            <input type="text" id="demourl" name="demourl" class="form-control c_input mb-3">
            <label for="image">Image</label>
            <input type="file" id="image" name="image" class="form-control c_input mb-3">
            <label for="description">Description</label>
            <input type="text" id="description" name="description" class="form-control c_input mb-3">
            <input type="submit" class="btn btn-info btn-block" value="Upload">
        </form>
    </div>
</div>
<?php
    }
    require_once "include/footer.php";
?>