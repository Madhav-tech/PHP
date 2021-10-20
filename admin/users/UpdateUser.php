<?php
$msg = '';
if (isset($_GET['update_user_id'])) {

    $user_id  = $_GET['update_user_id'];
    $query = "select * from users WHERE user_id = '{$user_id}'";
    $users_data = mysqli_query($connection, $query);
    //user details based on user Id
    $row = mysqli_fetch_assoc($users_data);

    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $username = $row['username'];
    $email = $row['email'];
    $role = $row['role'];
    $img = $row['user_image'];

    $_SESSION['update_user_id'] = $user_id;
}

?>

<div class="bg-gradient-warning">
    <form action="users.php" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">First Name</label>
                    <input type="text" class="form-control" name="firstname" value="<?= $firstname ?>" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Last Name</label>
                    <input type="text" class="form-control" name="lastname" value="<?= $lastname ?>" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" class="form-control" name="username" value="<?= $username ?>" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" class="form-control mb-3" name="image"><br>
                    <img class="img-responsive" src="../image/<?= $img ?>" alt="<?= $img ?>" width="100">

                </div>
            </div>
            <div class="col-md-12 ">
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email" value="<?= $email ?>" required>
                </div>
                <div class="form-group">
                    <label for="">Role</label>
                    <input type="text" class="form-control" name="role" value="<?= $role ?>" required>
                </div>
            </div>
        </div>
        <input class="btn btn-primary" type="submit" value="update" name="update_user">
    </form>
    <div class="text-danger"> <?= $msg ?></div>
</div>