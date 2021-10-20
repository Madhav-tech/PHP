<table class="table table-bordered table-hover table-success table-responsive">
    <caption>All Users</caption>
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th class="text-center">Edit</th>
            <th class="text-center">Delete</th>
            <!--<th>Date</th>
            <th>Approved</th>
            <th>Draft</th>-->

        </tr>
    </thead>
    <tbody>
        <?php
        $query = "select * from users";
        $users_data = mysqli_query($connection, $query);
        //loop to print the post details
        while ($row = mysqli_fetch_assoc($users_data)) {
            $user_id = $row['user_id'];
            $name = $row['firstname'] . ' ' . $row['lastname'];
            $username = $row['username'];
            $email = $row['email'];
            $role = $row['role'];

        ?>
            <tr>
                <td><?= $user_id ?></td>
                <td><?= $name ?></td>
                <td><?= $username ?></td>
                <td><?= $email ?></td>
                <td><?= $role ?></td>
                <td class="text-center"> <a href="users.php?source=update&update_user_id=<?= $user_id ?>" class="btn btn-primary">Edit</a>
                </td>
                <!-- <td> <a href="../postDetails.php?post_id=<?= $post_id ?>"><?= $post_title ?></a></td> -->

                <!-- <td><?php echo $comment_status === "Approved" ? "<p class = 'text-success'>$comment_status</p>" : "<p class = 'text-danger'>$comment_status</p>" ?></td> 
                <td><?= $comment_date ?></td>
                
                <td> <a href="comments.php?draft_comment_id=<?= $comment_id ?>" class="btn btn-warning"><i class="glyphicon glyphicon-remove"></i></a>
                </td>-->
                <td class="text-center">
                    <a href="users.php?delete_user_id=<?= $user_id ?>" class="btn btn-danger mb-3"><i class="bi bi-trash "></i></a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>