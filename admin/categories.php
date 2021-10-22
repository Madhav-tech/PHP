<?php include "include/header.php";
include_once "../DBFunction/GetAllCategory.php";
include_once "../DBFunction/EntityClass/CategoryEntity.php";
if (!$_SESSION['valid'] || $_SESSION['role'] !== "admin") {
    header("Location:../login.php?source=false");
}

$msg = "";


//delete a category
if (isset($_GET["delete_cat_id"])) {
    $id = $_GET["delete_cat_id"];
    $catTableObj = new CategoryTable();

    if ($catTableObj->delete($connection, $id)) {
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

<div class="row">

    <div class="p-3">

        <div class="container">

            <!-- Page Heading -->
            <div class="row">

                <h1 class="page-header">
                    Welcome Admin
                    <small> <?= $username ?></small>
                </h1>

                <div class="col-lg-5">
                    <!-- Add Category -->
                    <?php include "category/AddCategory.php" ?>
                    <?= $msg ?>
                    <!-- Update Category -->
                    <?php
                    if (isset($_GET['update_cat_id'])) {
                        include "category/UpdateCategory.php";
                    }
                    ?>
                </div>
                <div class="col-lg-2"></div>
                <div class="col-lg-5">
                    <!-- Print  Category table -->
                    <?php include "category/ShowCategories.php" ?>
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