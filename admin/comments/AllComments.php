<table class="table table-bordered table-hover table-success table-responsive">
    <caption>All Comments</caption>
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Post</th>
            <th>Email</th>
            <th>Comment</th>
            <th>Status</th>
            <th>Date</th>
            <th>Approved</th>
            <th>Draft</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "select * from comments join posts on comment_post_id = post_id";
        $comment_data = mysqli_query($connection, $query);
        //loop to print the post details
        while ($row = mysqli_fetch_assoc($comment_data)) {
            $comment_id = $row["comment_id"];
            $post_title = $row["post_title"];
            $post_id = $row["post_id"];
            $comment_author = $row["comment_author"];
            $comment_date = $row["comment_date"];
            $comment_status = $row["comment_status"];
            $comment_email = $row["comment_email"];
            $comment_content = $row["comment_content"]; 

        ?>
            <tr>
                <td><?= $comment_id ?></td>
                <td><?= $comment_author ?></td>
                <td> <a href="../postDetails.php?post_id=<?= $post_id ?>"><?= $post_title ?></a></td>
                <td><?= $comment_email ?></td>
                <td><?= $comment_content ?></td>
                <td><?php echo $comment_status==="Approved" ?"<p class = 'text-success'>$comment_status</p>":"<p class = 'text-danger'>$comment_status</p>" ?></td>
                <td><?= $comment_date ?></td>
                <td class="text-center"> <a href="comments.php?approve_comment_id=<?= $comment_id ?>" class="btn btn-success"><i class="bi bi-check"></i></a>
                </td>
                <td> <a href="comments.php?draft_comment_id=<?= $comment_id ?>" class="btn btn-warning"><i class="bi bi-x"></i></a>
                </td>
                <td>
                    <a href="comments.php?delete_comment_id=<?= $comment_id ?>&post_id=<?= $post_id ?>" class="btn btn-danger mb-3"><i class="bi bi-trash "></i></a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>