<?php include "include/header.php" ?>

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
            $query = "";
            $count=0;
            if (isset($_POST["submit"])) {
                $search = $_POST["search"];
                $query = "Select * from posts where post_tags LIKE '%$search%'";
            } elseif (isset($_GET["cat_id"])) {
                $id = $_GET["cat_id"];
                $query = "Select * from posts where post_category_id = $id";
            }
            $posts_data = mysqli_query($connection, $query);
            $row_count = mysqli_num_rows($posts_data);
            if ($row_count > 0) {
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
                        <p><?php echo  $post_content ?></p>
                        <a class="btn btn-primary" href="postDetails.php?post_id=<?= $post_id ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                        <hr>
            <?php } 
                } //while loop ended 
            } 
            if($row_count ==0 || $count ===0){
                echo "<h3>No post found</h3><br>";
            }
            ?>
        </div>
        <!-- Blog Sidebar Widgets Column -->
        <?php include "include/sidebar.php" ?>
    </div>
    <!-- /.row -->
    <hr>
    <?php include "include/footer.php" ?>