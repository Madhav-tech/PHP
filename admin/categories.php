<?php include "include/header.php";
include_once "../DBFunction/GetAllCategory.php";
include_once "../DBFunction/EntityClass/CategoryEntity.php";
$msg = "";


//delete a category
if (isset($_GET["delete_cat_id"])) {
    $id = $_GET["delete_cat_id"];
    $catTableObj = new CategoryTable();

    if ($catTableObj->delete($connection,$id)) {
        $msg = "Category deleted";
    }
} 

//update a category
if (isset($_POST["update"]) && trim($_POST["cat_title"])) {

    $catPojo = new Category();
    $catPojo->setCat_id($_POST["cat_id"]);
    $catPojo->setCat_title($_POST["cat_title"]);

    $catTableObj = new CategoryTable();
    if ($catTableObj->update($connection, $catPojo)) {
        $msg = "Category updated";
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
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome Admin
                        <small>Author</small>
                    </h1>
                    <div class="col-sm-6">
                        <!-- Add Category -->
                        <?php include "include/AddCategory.php" ?>
                        <?= $msg ?>
                        <hr>
                        <!-- Update Category -->
                        <?php
                        if (isset($_GET['update_cat_id'])) {
                            include "include/UpdateCategory.php";
                        }
                        ?>
                    </div>
                    <div class="col-sm-6">
                        <!-- Print  Category table -->
                        <?php include "include/ShowCategories.php" ?>
                    </div>

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