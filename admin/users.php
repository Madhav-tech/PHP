<?php include "include/header.php";


$msg = "";
//delete a Comment
// if (isset($_GET["delete_comment_id"])) {
//     $comment_id = $_GET["delete_comment_id"];
//     $post_id = $_GET["post_id"];
//     //deletePost()---> PostAllFunction
//     if (deleteComment($comment_id)) {
//         $msg = "Comment deleted";
//         //decrease coment count
//         $query = "Update posts Set post_comment_count = post_comment_count - 1 where post_id = '$post_id'";
//         mysqli_query($connection, $query);
//     } 
// }

//update a User
if (isset($_POST["update_user"])) {

    $user_id = $_SESSION['update_user_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $user_image = "";

    //if image change goto if otherwise else
    if (!empty($_FILES['image']['name'])) {
        $user_image = $_FILES['image']['name'];
        $user_image_path = $_FILES['image']['tmp_name'];
        move_uploaded_file($user_image_temp, "../image/$user_image");
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
    $query .= "email = '$email', role = '$role' ";
    $query .=  "where user_id = '$user_id'";

    $update_result = mysqli_query($connection, $query);

    if (!$update_result) {
        die(mysqli_error($connection));
    } else {
        $msg = "User Updated";
    }
}

?>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Top Menu Items -->
        <?php include "include/topnav.php" ?>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <?php include "include/sidenav.php"; ?>
        <!-- /.navbar-collapse -->
    </nav>
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12 ">
                    <h1 class="page-header"> Welcome Admin <small>Users</small> </h1>

                    <div class="text-danger"> <?= $msg ?></div>
                    <?php
                    if (isset($_GET['source'])) {
                        $source = $_GET['source'];
                    } else {
                        $source = '';
                    }
                    switch ($source) {
                        case "add":
                            //include "include/AddPost.php";
                            break;
                        case "update":
                            include "users/UpdateUser.php";
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