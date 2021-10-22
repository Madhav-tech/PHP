<?php include "include/header.php";
include "../DBFunction/GetAllCategory.php";
include "../DBFunction/PostAllFunction.php";
include_once "../DBFunction/EntityClass/CategoryEntity.php";
include "posts/implementation/postFunction.php";

if (!$_SESSION['valid'] || $_SESSION['role'] !== "admin") {
    header("Location:../login.php?source=false");
}
$msg = "";

//delete a Post
if (isset($_GET["delete_post_id"])) {
    $post_id = $_GET["delete_post_id"];
    $msg = deletePostImpl($post_id);
}
//update a post
if (isset($_POST["update_post"])) {
    $msg = UpdatePostImpl();
}

//APPROVE A COMMENT
if (isset($_GET["approve_post_id"])) {
    $status = "Approved";
    $post_id = $_GET["approve_post_id"];
    $msg = approvePostImpl($status, $post_id);
}
//Draft A COMMENT
if (isset($_GET["draft_post_id"])) {
    $status = "draft";
    $post_id = $_GET["draft_post_id"];
    $msg = approvePostImpl($status, $post_id);
}

?>
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
                        case "add_post":
                            include "posts/AddPost.php";
                            break;
                        case "update":
                            include "posts/UpdatePost.php";
                            break;
                        default:
                            include "posts/AllPost.php";
                            break;
                    }
                    ?>
                </div>
            </div> <!-- /.row -->
        </div> <!-- /.container-fluid -->
    </div><!-- /#page-wrapper -->
</div><!-- /#wrapper -->

<?php include "include/footer.php"; ?>