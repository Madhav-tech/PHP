<?php include "include/header.php";
include "../DBFunction/UsersDb.php";


$msg = "";
// delete a User
if (isset($_GET["delete_user_id"])) {
    $user_id = $_GET["delete_user_id"];
    if (deleteUser($user_id)) {
        $msg = "User deleted";
    }
}

//update a User
if (isset($_POST["update_user"])) {

    $user_id = $_SESSION['update_user_id'];
    $firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $role = mysqli_real_escape_string($connection, $_POST['role']);

    $user_image = "";

    //if image change goto if otherwise else
    if (!empty($_FILES['image']['name'])) {
        $user_image = $_FILES['image']['name'];
        $user_image_path = $_FILES['image']['tmp_name'];
        move_uploaded_file($user_image_path, "../image/$user_image");
    } else {

        //if no want to update image search existing image name
        $query = "Select user_image from users where user_id = $user_id ";
        $res = mysqli_query($connection, $query);
        if (!$res) {
            die(mysqli_error($connection));
        }
        $row = mysqli_fetch_assoc($res);
        $user_image = $row['user_image'];
    }

    $query  = "UPDATE users SET firstname = '$firstname', lastname = '$lastname' , ";
    $query .= "email = '$email', role = '$role', user_image = '$user_image' ";
    $query .=  "where user_id = '$user_id'";

    $update_result = mysqli_query($connection, $query);

    if (!$update_result) {
        die(mysqli_error($connection));
    } else {
        $msg = "User Updated";
    }
}

?>

<!-- Navigation -->




<div class="row">

    <div class="p-3">
        <div class="container">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12 ">
                    <h1 class="page-header"> Welcome Admin <small> <?= $username ?></small> </h1>

                    <div class="text-danger"> <?= $msg ?></div>
                    <?php
                    if (isset($_GET['source'])) {
                        $source = $_GET['source'];
                    } else {
                        $source = '';
                    }
                    switch ($source) {
                        case "add":
                            include "users/AddUser.php";
                            break;
                        case "update":
                            include "users/UpdateUser.php";
                            break;
                        case "details":
                            include "users/profile.php";
                            break;
                        default:
                            include "users/AllUsers.php";
                            break;
                    }
                    ?>
                </div>
            </div> <!-- /.row -->
        </div> <!-- /.container-fluid -->
    </div><!-- /#page-wrapper -->
</div><!-- /#wrapper -->



<?php include "include/footer.php"; ?>