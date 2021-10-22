<?php
if (isset($_POST['apply'])) {
    if (isset($_POST['selectedId']) && !($_POST['selectOption'] === "Choose...")) {
        $selectedId = $_POST['selectedId'];
        $option = $_POST['selectOption'];

        foreach ($selectedId as $post_id) {

            switch ($option) {
                case 'approve':
                    $status = "Approved";
                    $msg = approvePostImpl($status, $post_id);
                    break;
                case 'draft':
                    $status = "Draft";
                    $msg = approvePostImpl($status, $post_id);
                    break;
                case 'delete':
                    $msg = deletePostImpl($post_id);
                    break;
            }
        }
    } else
        echo "<p>Select At least One check Box and one option</p>";
}


?>

<div class="p-2">
    <form action="" method="post">
        <div class="row">
            <div class="col-lg-4">
                <div class=" col-lg-2 input-group mb-2">
                    <select class="form-select" id="inputGroupSelect04" name="selectOption">
                        <option selected>Choose...</option>
                        <option value="approve">Approve</option>
                        <option value="draft">Draft</option>
                        <option value="delete">Delete</option>
                    </select>
                    <button class="btn btn-secondary" type="submit" name="apply">Apply</button>
                </div>
            </div>
        </div>
        <table class="table table-bordered table-hover table-success table-responsive">
            <caption>All Post</caption>
            <thead>
                <tr>
                    <th><input id="selectAllBox" class="form-check-input" type="checkbox" name="selectAllId"></th>
                    <th>Id</th>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Comment</th>
                    <th>Date</th>
                    <th>Delete</th>
                    <th>Update</th>
                    <th>Approve</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "select * from posts join categories on post_category_id = cat_id";
                $posts_data = mysqli_query($connection, $query);
                //loop to print the post details
                while ($row = mysqli_fetch_assoc($posts_data)) {
                    $post_id = $row["post_id"];
                    $post_title = $row["post_title"];
                    $post_author = $row["post_author"];
                    $post_date = $row["post_date"];
                    $post_status = $row["post_status"];
                    $post_image = $row["post_image"];
                    $post_category = $row["cat_title"];
                    $post_tags = $row["post_tags"];
                    $post_comment_count = $row["post_comment_count"];

                ?>
                    <tr>
                        <td>
                            <input type="checkbox" class="form-check-input checkBox" name="selectedId[]" value="<?= $post_id ?>">
                        </td>
                        <td><?= $post_id ?></td>
                        <td><?= $post_author ?></td>
                        <td> <a href="../postDetails.php?post_id=<?= $post_id ?>"><?= $post_title ?></a></td>
                        <td><?= $post_category ?></td>
                        <td><?= $post_status ?></td>
                        <td><img src="../image/<?= $post_image ?>" alt="<?= $post_category ?>" class="img-responsive" width="80"></td>
                        <!-- <td><?= $post_tags ?></td> -->
                        <td><?= $post_comment_count ?></td>
                        <td><?= $post_date ?></td>
                        <td>
                            <a href="post.php?delete_post_id=<?= $post_id ?>" class="btn btn-warning mb-3"><i class="bi bi-trash "></i></a>

                        </td>
                        <td> <a href="post.php?source=update&update_post_id=<?= $post_id ?>" class="btn btn-info"><i class="bi bi-plus"></i></a>
                        </td>
                        <td> <a href="post.php?approve_post_id=<?= $post_id ?>" class="btn btn-success"><i class="bi bi-check"></i></a>
                        </td>
                    </tr>

                <?php
                }
                ?>

            </tbody>
        </table>
    </form>
</div>