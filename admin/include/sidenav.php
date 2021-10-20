<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li class='<?php echo str_contains($_SERVER["PHP_SELF"], "index.php") ? "active" : ""; ?>'>
            <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
        </li>
        <li class='<?php echo str_contains($_SERVER["PHP_SELF"], "post.php") ? "active" : ""; ?>'>
            <a href="#" data-toggle="collapse" data-target="#post"><i class="fa fa-fw fa-arrows-v"></i> Post <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="post" class="collapse">
                <li>
                    <?php $source = '' ?>
                    <a href="post.php?source=<?= $source ?>">All</a>
                </li>
                <li>
                    <?php $source = 'add_post' ?>
                    <a href="post.php?source=<?= $source ?>">Add Post</a>
                </li>
            </ul>
        </li>
        <li class='<?php echo str_contains($_SERVER["PHP_SELF"], "categories.php") ? "active" : ""; ?>'>
            <a href="categories.php"><i class="fa fa-fw fa-wrench"></i> Categories</a>
        </li>

        <li class='<?php echo str_contains($_SERVER["PHP_SELF"], "comments.php") ? "active" : ""; ?>'>
            <a href="comments.php"><i class="fa fa-fw fa-file"></i> Comment</a>
        </li>
        <li class='<?php echo str_contains($_SERVER["PHP_SELF"], "users") ? "active" : ""; ?>'>
            <a href="#" data-toggle="collapse" data-target="#users"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="users" class="collapse">
                <li>
                    <?php $source = '' ?>
                    <a href="users.php?source=<?= $source ?>">All Users</a>
                </li>
                <li>
                    <?php $source = 'add_user' ?>
                    <a href="users.php?source=<?= $source ?>">Add User</a>
                </li>
            </ul>
        </li>
        <li class='<?php //echo str_contains($_SERVER["PHP_SELF"], "index.php") ? "active" : ""; 
                    ?>'>
            <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Profile</a>
        </li>
    </ul>
</div>