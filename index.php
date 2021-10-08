<?php include "include/header.php" ?>
<!-- Navigation -->

<!-- Page Content -->
<div class="container">

    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>
            <!-- First Blog Post -->
            <?php
            $query = "select * from posts";
            $posts_data = mysqli_query($connection, $query);

            //loop to print the post details
            while ($row = mysqli_fetch_assoc($posts_data)) {
                $post_id = $row["post_id"];
                $post_title = $row["post_title"];
                $post_author = $row["post_author"];
                $post_date = $row["post_date"];
                $post_content = $row["post_content"];
                $post_image = $row["post_image"];
            ?>
                <h2>
                    <a href="postDetails.php?post_id=<?= $post_id ?>"><?php echo  $post_title ?> </a>
                </h2>
                <p class="lead">
                    <small> by</small>
                    <a href="postDetails.php?post_id=<?= $post_id ?>"><?php echo  $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo  $post_date ?></p>
                <hr>
                <img class="img-responsive" src="image/<?php echo $post_image;  ?>" width="800" alt="">
                <hr>
                <p><?php echo  substr($post_content, 0, 60) ?><strong> . . . .</strong></p>
                <a class="btn btn-primary" href="postDetails.php?post_id=<?= $post_id ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>
            <?php   } //while loop ended 
            ?>
        </div>
        <!-- Blog Sidebar Widgets Column -->
        <?php include "include/sidebar.php" ?>
    </div>
    <!-- /.row -->
    <hr>
    <?php include "include/footer.php" ?>