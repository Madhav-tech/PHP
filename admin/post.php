<?php include "include/header.php";
include "../DBFunction/PostAllFunction.php";
$msg = "";
//delete a Post
if (isset($_GET["delete_post_id"])) {
    $post_id = $_GET["delete_post_id"];
    if (delete($post_id)) {
        $msg = "Post deleted";
    }
}

// //update a category
// if (isset($_POST["update"]) && trim($_POST["cat_title"])) {
//     $cat_title =  $_POST["cat_title"];
//     $cat_id =  $_POST["cat_id"];
//     if (update($cat_id, $cat_title)) {
//         $msg = "Category updated";
//     }
// }


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
                    <h1 class="page-header">
                        Welcome Admin
                        <small>Author</small>
                    </h1>
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
                        case 20:
                            # code...
                            echo 100;
                            break;
                        case 30:
                            # code...
                            echo 1000;
                            break;

                        default:
                            include "include/AllPost.php";
                            break;
                    }

                    ?>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<?php include "include/footer.php"; ?>