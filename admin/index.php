<?php include "include/header.php";
if (!$_SESSION['valid'] || $_SESSION['role'] !== "admin") {
    header("Location:../index.php?source=false");
}



?>


<div class="row ">
    <div class="p-3">
        <div class="container">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Dashboard
                        <small> <?= $username ?></small>
                    </h1>
                </div>
            </div>
            <!-- /.row -->

            <!-- /.row -->
            <?php include "dashboard/dashboard.php"; ?>
            
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>

<!-- /#wrapper -->
<?php include "include/footer.php"; ?>