
<?php include "include/header.php" ?>
<?php include "DBFunction/PostAllFunction.php" ?>

<!-- Page Content -->
<div class="container">
    <hr>
    <h1 class="page-header">
        Page Heading
        <small>Secondary Text</small>
    </h1>
    <div class="row ">
        <!-- Blog Entries Column -->
        <div class="col-md-7">

            <?php
            $post_id = $_GET['post_id'];
            $posts_data = getPostsFromId($post_id);

            $row = mysqli_fetch_assoc($posts_data);
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
            <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo  $post_date ?></p>
            <hr>
            <blockquote>
                <p><?php echo $post_content ?></p>
            </blockquote>
            <hr>
            <?php
            ?>
        </div>
        <div class="col-md-5  ">
            <img class="img-responsive img-rounded" src="image/<?php echo $post_image;  ?>" width="400" height="200" alt="">
            <hr>
            <cite>
                <p class="lead">
                    <small> by</small>
                    <a href="postDetails.php?post_id=<?= $post_id ?>"><?php echo  $post_author ?></a>
                </p>
            </cite>
        </div>
    </div>
    <div class="row ">
        <div class="col-md-7">
            <!-- Comments Form -->
            <?php include "include/postAndShowComments.php" ?>
        </div>
    </div>
    <?php include "include/footer.php" ?>
</div>