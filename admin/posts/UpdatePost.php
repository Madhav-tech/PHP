<?php
$msg = '';
if (isset($_GET['update_post_id'])) {

    $update_post_id = $_GET['update_post_id'];
    $posts_data = getPostsFromId($update_post_id);

    $row = mysqli_fetch_assoc($posts_data);

    $post_id = $row["post_id"];
    $post_title = $row["post_title"];
    $post_author = $row["post_author"];
    $post_date = $row["post_date"];
    $post_status = $row["post_status"];
    $post_image = $row["post_image"];
    $post_category_id = $row["post_category_id"];
    $post_tags = $row["post_tags"];
    $post_comment_count = $row["post_comment_count"];
    $post_content = $row['post_content'];
}
$catTable = new CategoryTable();
$categories_data = $catTable->getAllCategories($connection);



?>

<div id="card">

    <div id="card-content" class="p-3">
        <form action="post.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" class="form-control" name="post_id" value="<?= $post_id ?>">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="post_title" value="<?= $post_title ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <?php
                    $no_row = mysqli_num_rows($categories_data);
                    if ((int)$no_row > 0) {
                    ?>
                        <div class="form-group mb-3">
                            <label for="">Post Category</label>
                            <!-- <input type="text" class="form-control" name="post_category_id" required> -->
                            <select name="post_category_id" id="post_category_id" class="form-control">
                                <?php

                                while ($row = mysqli_fetch_assoc($categories_data)) {
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];
                                    if ($cat_id === $post_category_id) {
                                        echo "<option selected value=$cat_id>$cat_title</option>";
                                    } else {
                                        echo "<option  value=$cat_id>$cat_title</option>";
                                    }
                                }

                                ?>
                            </select>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="">Post Author</label>
                        <input type="text" class="form-control" name="post_author" value="<?= $post_author ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="">Image</label>
                        <input type="file" class="form-control mb-3" name="image"><br>
                        <img class="img-responsive" src="../image/<?= $post_image ?>" alt="<?= $post_image ?>" width="100">
                        <?php $_POST = $post_image; ?>
                    </div>
                </div>
                <div class="col-md-12 ">
                    <div class="form-group mb-3">
                        <label for="">Content</label>
                        <textarea class="form-control" rows="5" name="post_content" required><?= $post_content ?></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Tags</label>
                        <textarea rows="3" class="form-control" name="post_tags" required><?= $post_tags ?></textarea>
                    </div>
                </div>
            </div>
            <input class="btn btn-primary mb-3" type="submit" value="update" name="update_post" id="submit-btn">
        </form>
        <div class="text-danger mb-3"> <?= $msg ?></div>
    </div>
</div>