<?php include "include/db.php" ?>
<?php include "include/header.php" ?>
<?php include "DBFunction/PostAllFunction.php" ?>

<!-- Navigation -->
<?php include "include/navigation.php" ?>

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

            <!-- First Blog Post -->
            <?php
            $post_id = $_GET['post_id'];
            $posts_data = getPostsFromId($post_id);
            //loop to print the post details
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
        <!-- </div>
   
        <div class="row"> -->
        <div class="col-md-5  " >
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

        <!-- Blog Entries Column -->
        <div class="col-md-7">
            <!-- Comments Form -->
            <div class="well mt-3">
                <h4>Leave a Comment:</h4>
                <form role="form">
                    <div class="form-group">
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <hr>
            <!-- Posted Comments -->
            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Start Bootstrap
                        <small>August 25, 2014 at 9:30 PM</small>
                    </h4>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo.
                </div>
            </div>

            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Start Bootstrap
                        <small>August 25, 2014 at 9:30 PM</small>
                    </h4>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo.
                    <!-- Nested Comment -->
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Nested Start Bootstrap
                                <small>August 25, 2014 at 9:30 PM</small>
                            </h4>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo.
                        </div>
                    </div>
                    <!-- End Nested Comment -->
                </div>
            </div>
        </div>
    </div>

    <?php include "include/footer.php" ?>
</div>