<?php include "DBFunction/GetAllCategory.php";
include "DBFunction/EntityClass/CategoryEntity.php";
$home = "";
$loginText = "./logout.php";
$text = "Logout";
if (!isset($_SESSION['valid']) || !$_SESSION['valid']) {
    $home = "cms";
    $loginText = "login.php";
    $text = "Login";
}
?>
<nav class="navbar navbar-light navbar-expand-lg  bg-light">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <a class="navbar-brand" href="index.php">CMS</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#bs-example-navbar-collapse-1" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categories</a>
                    <ul id="category" class="dropdown-menu dropdown-menu-dark">

                        <?php
                        $categoriesTableObj = new CategoryTable();
                        $catResult = $categoriesTableObj->getAllCategories($connection);
                        while ($categoryPojo = $catResult->fetch_object('Category')) {
                            $title = $categoryPojo->getCat_title();
                            echo "<li ><a class='dropdown-item' href='#'>{$title}</a> </li>";
                        }
                        ?>
                    </ul>
                </li>
                <li class='nav-item '><a class='nav-link' href='admin'>Admin</a> </li>
                <li class='nav-item '><a class='nav-link' href='#'>Help</a> </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <?php
                if (isset($_SESSION['name'])) {
                    echo "<li class='nav-item'><a href='#' class='nav-link'><strong>Welcome {$_SESSION['name']}</strong></a></li>";
                } ?>
                <li class='nav-item'><a href='<?= $loginText ?>' class='nav-link btn btn-sm btn-outline-warning'><?= $text ?> </a></li>
            </ul>

        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>