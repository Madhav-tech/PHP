<?php
if (isset($_POST['submit_comment'])) {

    $comment_post_id = $_GET["post_id"];

    $comment_author = $_POST["comment_author"];
    $comment_email = $_POST["comment_email"];
    $comment_content = $_POST["comment_content"];

    $query = "Insert into comments (comment_post_id,comment_author,comment_email, comment_content) ";
    $query .= " Value($comment_post_id, '$comment_author', '$comment_email' ,'$comment_content')";

    $res = mysqli_query($connection, $query);
    if ($res) {
       $query = "Update posts Set post_comment_count = post_comment_count + 1 where post_id = '$comment_post_id'";
       mysqli_query($connection, $query);
    }
    else{
        die(mysqli_error($connection));
    }
}


?>

<div class="well">
    <h4>Leave a Comment:</h4>
    <form role="form" action="" method="POST">
        <div class="form-group mb-3">
            <label for="">Name</label>
            <input type="text" class="form-control" name="comment_author" required>
        </div>
        <div class="form-group mb-3">
            <label for="">Email</label>
            <input type="email" class="form-control" name="comment_email" required>
        </div>
        <div class="form-group mb-3">
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
//loop to print the post details
$no_of_row = mysqli_num_rows($comment_data);

if ($no_of_row > 0) {
    while ($row = mysqli_fetch_assoc($comment_data)) {
        $comment_id = $row["comment_id"];
        $comment_author = $row["comment_author"];
        $comment_date = $row["comment_date"];
        $comment_status = $row["comment_status"];
        $comment_email = $row["comment_email"];
        $comment_content = $row["comment_content"];

        //show only approved comments
        if ($comment_status === "Approved") {


?>
            <div class="row bg-light p-2">

                <div class="col-">
                    <div>
                        <strong><?= $comment_author ?></strong>
                        <small>Commented on <?= $comment_date ?></small>

                    </div>
                    <div>
                        <?= $comment_content ?>
                    </div>
                </div>

            </div>

<?php }
    }
} else {
    echo "<h4>No comments found</h4>";
}
?>