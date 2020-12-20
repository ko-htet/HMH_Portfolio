<?php require_once "include/header.php"; ?>
<div class="card text-white bg-dark mb-3">
    <div class="card-header text-info"><h1>Content Me</h1></div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-3 col-12">
                <i class="ion-ios-telephone text-info mr-2 c_icon"></i><span><b>Phone</b></span>
                <p>+959 793 199 913</p>
                <i class="ion-ios-email text-info mr-2 c_icon"></i><span><b>Email</b></span>
                <p>mghanmhtet91@gmail.com</p>
                <i class="ion-ios-location text-info mr-2 c_icon"></i><span><b>Address</b></span>
                <p>Kamayut Township, Yangon</p>
            </div>
            <div class="col-md-9 col-12">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control c_input mb-3">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" class="form-control c_input mb-3">
                <label for="phone">Phone</label>
                <input type="text" id="phone" name="phone" class="form-control c_input mb-3">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" class="form-control c_input mb-3">
                <input type="submit" class="btn btn-info btn-block" value="Send">
            </div>
        </div>
    </div>
</div>
<?php require_once "include/footer.php"; ?>