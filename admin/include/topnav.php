<!-- Brand and toggle get grouped for better mobile display -->
<?php

// $home = "";
$loginText = "../logout.php";
$username = $_SESSION['username'];
$name = $_SESSION['name'];
$ole = $_SESSION['role'];
$text = "Logout";
// if (!isset($_SESSION['valid']) || !$_SESSION['valid']) {
//     $home = "../login";
//     $loginText = "../login.php";
//     $text = "Login";
// }
?>
<nav class="navbar  navbar-light navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#bs-example-navbar-collapse-1" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!--  top nav -->


        <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">
            <ul class="navbar-nav me-auto">
                <li class='nav-item <?php echo str_contains($_SERVER["PHP_SELF"], "index.php") ? "active" : ""; ?>'>
                    <a class='nav-link' href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>
                <li class=' nav-item dropdown'>
                    <a class='nav-link dropdown-toggle' href="#" data-bs-toggle="collapse" data-bs-target="#post"><i class="fa fa-fw fa-arrows-v"></i> Post </i></a>
                    <ul id="post" class="dropdown-menu p-2">
                        <li class="nav-item mb-2">
                            <?php $source = '' ?>
                            <a class='nav-link btn btn-outline-danger' href="post.php?source=<?= $source ?>">All</a>
                        </li>
                        <li class="nav-item mb-2">
                            <?php $source = 'add_post' ?>
                            <a class='nav-link btn btn-outline-danger' href="post.php?source=<?= $source ?>">Add Post</a>
                        </li>
                    </ul>
                </li>
                <li class='nav-item <?php echo str_contains($_SERVER["PHP_SELF"], "categories.php") ? "active" : ""; ?>'>
                    <a class='nav-link' href="categories.php"><i class="fa fa-fw fa-wrench"></i> Categories</a>
                </li>

                <li class='nav-item <?php echo str_contains($_SERVER["PHP_SELF"], "comments.php") ? "active" : ""; ?>'>
                    <a class='nav-link' href="comments.php"><i class="fa fa-fw fa-file"></i> Comment</a>
                </li>
                <li class='<?php echo str_contains($_SERVER["PHP_SELF"], "users") ? "active" : ""; ?>'>
                    <a class='nav-link dropdown-toggle' href="#" data-bs-toggle="collapse" data-bs-target="#users"><i class="fa fa-fw fa-arrows-v"></i> Users</a>
                    <ul id="users" class="dropdown-menu p-2">
                        <li class="nav-item mb-2">
                            <?php $source = '' ?>
                            <a class='nav-link btn btn-outline-danger' href="users.php?source=<?= $source ?>">All Users</a>
                        </li>
                        <li class="nav-item mb-2">
                            <?php $source = 'add' ?>
                            <a class='nav-link btn btn-outline-danger' href="users.php?source=<?= $source ?>">Add User</a>
                        </li>
                    </ul>
                </li>
                <li class='nav-item <?php //echo str_contains($_SERVER["PHP_SELF"], "index.php") ? "active" : ""; 
                                    ?>'>
                    <a class='nav-link' href="users.php?source=details"><i class="fa fa-fw fa-dashboard"></i> Profile</a>
                </li>
            </ul>
        </div>


        <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= $name ?></a>
                    <ul id="user" class="dropdown-menu dropdown-menu-dark">
                        <li class='nav-item'>
                            <a class="dropdown-item" href="users.php?source=details"></i> Profile</a>

                        <li class='nav-item'><a href='<?= $loginText ?>' class="dropdown-item"><?= $text ?> </a></li>

                    </ul>
                </li>
                <li class='nav-item '><a class='nav-link' href=" ../index.php">Home</a></li>
                <!-- <ul class="navbar-nav">
                <li class='nav-item'><a href='<?= $loginText ?>' class='nav-link'><?= $text ?> </a></li>
            </ul> -->
            </ul>
        </div>
    </div>
</nav>