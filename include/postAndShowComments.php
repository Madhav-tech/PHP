<?php
if (isset($_POST['submit_comment'])) {

    $comment_post_id = $_GET["post_id"];

    $comment_author = $_POST["comment_author"];
    $comment_email = $_POST["comment_email"];
    $comment_content = $_POST["comment_content"];

    $query = "Insert into comments (comment_post_id,comment_author,comment_email, comment_content) ";
    $query .= " Value($comment_post_id, '$comment_author', '$comment_email' ,'$comment_content')";

    $res = mysqli_query($connection, $query);
    if (!$res) {
        die(mysqli_error($connection));
    }
}


?>

<div class="well">
    <h4>Leave a Comment:</h4>
    <form role="form" action="" method="POST">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" name="comment_author" required>
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" name="comment_email" required>
        </div>
        <div class="form-group">
            <textarea class="form-control" rows="3" name="comment_content" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="submit_comment">Submit</button>
    </form>
</div>

<hr>
<!-- Posted Comments -->
<!-- Comment -->
<?php
    $query = "select * from comments where comment_post_id = $post_id";
    $comment_data = mysqli_query($connection, $query);
    //print_r($posts_data) ;
    //loop to print the post details
    while ($row = mysqli_fetch_assoc($comment_data)) {
        $comment_id = $row["comment_id"];
        $comment_author = $row["comment_author"];
        $comment_date = $row["comment_date"];
        $comment_status = $row["comment_status"];
        $comment_email = $row["comment_email"];
        $comment_content = $row["comment_content"];


    ?>
<div class="media">
    
        <a class="pull-left" href="#">
            <img class="media-object" src="http://placehold.it/64x64" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading"><?= $comment_author ?>
                <small>Commented on <?= $comment_date ?></small>
            </h4>
            <?= $comment_content ?>
        </div>
       
</div>

<?php } ?>