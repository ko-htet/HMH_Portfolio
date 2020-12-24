<?php
    require_once "include/header.php";
    $user = User::alluser();
?>
<div class="card text-white bg-dark mb-3">
    <div class="card-header text-info"><h1>Users</h1></div>
    <div class="card-body">
        <div class="card text-white bg-dark mb-3">
            <div class="card-header">
                <table class="table text-white">
                    <thead>
                        <td>No</td>
                        <td>Name</td>
                        <td>Email</td>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach($user as $u){
                        ?>
                        <tr>
                            <td><?php echo $i++; ?>.</td>
                            <td><?php echo $u->name; ?></td>
                            <td><?php echo $u->email; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require_once "include/footer.php"; ?>