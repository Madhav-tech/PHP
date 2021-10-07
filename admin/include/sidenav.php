<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li>
            <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
        </li>


        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#post"><i class="fa fa-fw fa-arrows-v"></i> Post <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="post" class="collapse">
                <li>
                <?php $source = '' ?>
                    <a href="post.php?source=<?=$source ?>">All</a>
                </li>
                <li>
                    <?php $source = 'add_post' ?>
                    <a href="post.php?source=<?=$source ?>">Add Post</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="categories.php"><i class="fa fa-fw fa-wrench"></i> Categories</a>
        </li>

        <li class="active">
            <a href="comments.php"><i class="fa fa-fw fa-file"></i> Comment</a>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#post"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="users" class="collapse">
                <li>
                    <a href="#">1</a>
                </li>
                <li>
                    <a href="#">2</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> Profile</a>
        </li>
    </ul>
</div>