<?php include "include/header.php";
include "../DBFunction/CommentsDb.php";


$msg = "";
//delete a Comment
if (isset($_GET["delete_comment_id"])) {
    $comment_id = $_GET["delete_comment_id"];
    $post_id = $_GET["post_id"];
    //deletePost()---> PostAllFunction
    if (deleteComment($comment_id)) {
        $msg = "Comment deleted";
        //decrease coment count
        $query = "Update posts Set post_comment_count = post_comment_count - 1 where post_id = '$post_id'";
        mysqli_query($connection, $query);
    } 
}

//APPROVE A COMMENT
if (isset($_GET["approve_comment_id"])) {
    $status = "Approved";
    $comment_id = $_GET["approve_comment_id"];

    $update_result = approveComment($status, $comment_id);
    if (!$update_result) {
        die(mysqli_error($connection));
    } else {
        $msg = "Comment Approved";
    }
}
//APPROVE A COMMENT
if (isset($_GET["draft_comment_id"])) {
    $status = "Pending";
    $comment_id = $_GET["draft_comment_id"];

    $update_result = approveComment($status, $comment_id);
    if (!$update_result) {
        die(mysqli_error($connection));
    } else {
        $msg = "Comment Status Change";
    }
}

?>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Top Menu Items -->
        <?php include "include/topnav.php"; ?>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <?php include "include/sidenav.php"; ?>
        <!-- /.navbar-collapse -->
    </nav>
    <div id="page-wrapper">
        <div class="container-fluid">
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
                            //include "include/AddPost.php";
                            break;
                        case "update":
                            //include "include/UpdatePost.php";
                            break;
                        default:
                            include "include/AllComments.php";
                            break;
                    }
                    ?>
                </div>
            </div> <!-- /.row -->
        </div> <!-- /.container-fluid -->
    </div><!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<?php include "include/footer.php"; ?>