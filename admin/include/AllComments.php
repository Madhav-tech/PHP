<table class="table table-bordered table-hover table-responsive">
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
            <!-- <th>Delete</th>
            <th>Update</th> -->
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "select * from comments join posts on comment_post_id = post_id";
        $comment_data = mysqli_query($connection, $query);
        //print_r($posts_data) ;
        //loop to print the post details
        while ($row = mysqli_fetch_assoc($comment_data)) {
            $comment_id = $row["comment_id"];
            $post_title = $row["post_title"];
            $comment_author = $row["comment_author"];
            $comment_date = $row["comment_date"];
            $comment_status = $row["comment_status"];
            $comment_email = $row["comment_email"];
            $comment_content = $row["comment_content"];


        ?>
            <tr>
                <td><?= $comment_id ?></td>
                <td><?= $comment_author ?></td>
                <td><?= $post_title ?></td>
                <td><?= $comment_email ?></td>
                <td><?= $comment_content ?></td>
                <td><?= $comment_status ?></td>
                <td><?= $comment_date ?></td>
                <!-- <td>
                    <a href="comment.php?delete_comment_id=<?= $comment_id ?>" class="btn btn-warning mb-3"><i class="glyphicon glyphicon-trash "></i></a>

                </td>
                <td> <a href="comment.php?source=update&update_comment_id=<?= $comment_id ?>" class="btn btn-info"><i class="glyphicon glyphicon-plus"></i></a>
                </td> -->
            </tr>

        <?php
        }
        ?>

    </tbody>
</table>