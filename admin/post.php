<?php include "include/header.php";

include "../DBFunction/GetAllCategory.php";
include "../DBFunction/PostAllFunction.php";
include_once "../DBFunction/EntityClass/CategoryEntity.php";
$msg = "";

//delete a Post
if (isset($_GET["delete_post_id"])) {
    $post_id = $_GET["delete_post_id"];
    //deletePost()---> PostAllFunction
    if (deletePost($post_id)) {
        $msg = "Post deleted";
    }
}

//update a post
if (isset($_POST["update_post"])) {
    $post_id = $_POST["post_id"];
    $post_title = $_POST['post_title'];
    $post_category_id = $_POST['post_category_id'];
    $post_author = $_POST['post_author'];
    $post_content = $_POST['post_content'];
    $post_tags = $_POST['post_tags'];
    $post_date =  date("Y-m-d");
    $post_image = "";

    //if image change goto if otherwise else
    if (!empty($_FILES['image']['name'])) {
        $post_image = $_FILES['image']['name'];
        $post_image_path = $_FILES['image']['tmp_name'];
        move_uploaded_file($post_image_temp, "../image/$post_image");
    } else {

        //if no want to update image search existing image name
        $query = "Select post_image from posts where post_id = $post_id ";
        $res = mysqli_query($connection, $query);
        if (!$res) {
            die(mysqli_error($connection));
        }
        $row = mysqli_fetch_assoc($res);
        $post_image = $row['post_image'];
    }

    //UpdatePost()---> PostAllFunction
    $update_result = UpdatePost($post_id, $post_category_id, $post_title, $post_author, $post_date, $post_image, $post_content, $post_tags);
    if (!$update_result) {
        die(mysqli_error($connection));
    } else {
        $msg = "Post Updated";
    }
}


//APPROVE A COMMENT
if (isset($_GET["approve_post_id"])) {
    $status = "Approved";
    $post_id = $_GET["approve_post_id"];

    $update_result = approvePost($status, $post_id);
    if (!$update_result) {
        die(mysqli_error($connection));
    } else {
        $msg = "Post Approved";
    }
}

?>


<div class="row">

    <div class="p-3">
        <div class="container">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12 ">
                    <h1 class="page-header"> Welcome Admin <small>Author</small> </h1>
                    <div class="text-danger"> <?= $msg ?></div>
                    <?php
                    if (isset($_GET['source'])) {
                        $source = $_GET['source'];
                    } else {
                        $source = '';
                    }
                    switch ($source) {
                        case "add_post":
                            include "include/AddPost.php";
                            break;
                        case "update":
                            include "include/UpdatePost.php";
                            break;
                        default:
                            include "include/AllPost.php";
                            break;
                    }
                    ?>
                </div>
            </div> <!-- /.row -->
        </div> <!-- /.container-fluid -->
    </div><!-- /#page-wrapper -->
</div><!-- /#wrapper -->

<?php include "include/footer.php"; ?>