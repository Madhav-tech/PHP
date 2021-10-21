<?php include "include/header.php";
if (isset($_GET['source'])) {
    $source = $_GET['source'];
    if ($source == 'false') {
        echo "<div class = 'text-center p-2'><h4 id='error'>Unauthorized Access</h4><span>Login with admin account</span></div>";
    }
}
?>
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
            $count = 0;
            //loop to print the post details
            while ($row = mysqli_fetch_assoc($posts_data)) {
                $post_id = $row["post_id"];
                $post_title = $row["post_title"];
                $post_author = $row["post_author"];
                $post_date = $row["post_date"];
                $post_content = $row["post_content"];
                $post_image = $row["post_image"];
                $post_status = $row["post_status"];

                if ($post_status === "Approved") {
                    $count++;
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
                    <img class="img-responsive" src="image/<?php echo $post_image;  ?>" width="700" height="300" alt="">
                    <hr>
                    <p><?php echo  substr($post_content, 0, 60) ?><strong> . . . .</strong></p>
                    <a class="btn btn-primary" href="postDetails.php?post_id=<?php echo $post_id ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                    <hr>
            <?php }
            } //while loop ended
            if ($count === 0) {
                echo "<h3>No Post Found</h3>";
            }
            ?>
        </div>
        <div class="col-md-4" >

            <?php include "include/sidebar.php" ?>
        </div>
    </div>
    <!-- /.row -->
    <hr>
</div>
<?php include "include/footer.php" ?>