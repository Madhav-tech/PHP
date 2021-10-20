<?php
$msg = '';
if (isset($_POST['create_user'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $user_image = $_FILES['image']['name'];
    $user_image_temp = $_FILES['image']['tmp_name'];

    $query = "INSERT INTO users(username,firstname, lastname, email, password,user_image,role) ";
    $query .= "VALUE('$username','$firstname', '$lastname', '$email','$password', '$user_image','$role')";
    
    $insert_result = mysqli_query($connection,$query);
    if (!$insert_result) {
        die(mysqli_error($connection));
    } else {
        move_uploaded_file($user_image_temp, "../image/$user_image");
        $msg = "User Created";
    }
}

?>
<div class="bg-gradient-warning">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="row bg-info rounded mb-3 p-3">

            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="">First Name</label>
                    <input type="text" class="form-control" name="firstname" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="">Last Name</label>
                    <input type="text" class="form-control" name="lastname" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="">Username</label>
                    <input type="text" class="form-control" name="username" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="">Role</label>
                    <select name="role" id="role" class="form-control">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="">Image</label>
                    <input type="file" class="form-control" name="image" required>
                </div>
            </div>

        </div>
        <div class="text-center">
            <input class="btn btn-primary" type="submit" value="Submit" name="create_user">
        <div>
    </form>
    <div class="text-danger"> <?= $msg ?></div>
</div>