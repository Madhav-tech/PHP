<?php
$msg = '';
if (isset($_POST['create_post'])) {
    $post_title = $_POST['post_title'];
    $post_category_id = $_POST['post_category_id'];
    $post_author = $_POST['post_author'];
    $post_content = $_POST['post_content'];
    $post_tags = $_POST['post_tags'];

    $post_date =  date("Y-m-d");

    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];

    $insert_result = insertIntoPost($post_category_id, $post_title, $post_author, $post_date, $post_image, $post_content, $post_tags);

    if (!$insert_result) {
        die(mysqli_error($connection));
    } else {
        move_uploaded_file($post_image_temp, "../image/$post_image");
        $msg = "Post Submitted";
    }
}
$categoriesTableObj = new CategoryTable();
$catResult = $categoriesTableObj->getAllCategories($connection);

?>

<div class="bg-gradient-warning">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="post_title" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="">Post Category</label>
                    <!-- <input type="text" class="form-control" name="post_category_id" required> -->
                    <select name="post_category_id" id="post_category_id" class="form-control">
                        <?php
                        while ($categoryPojo = $catResult->fetch_object('Category')) {
                            $cat_title = $categoryPojo->getCat_title();
                            $cat_id = $categoryPojo->getCat_id();
                            echo "<option value=$cat_id>$cat_title</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="">Post Author</label>
                    <input type="text" class="form-control" name="post_author" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="">Image</label>
                    <input type="file" class="form-control" name="image" required>
                </div>
            </div>
            <div class="col-md-12 ">
                <div class="form-group mb-3">
                    <label for="">Content</label>
                    <textarea class="form-control" rows="5" name="post_content" required></textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="">Tags</label>
                    <textarea rows="3" class="form-control" name="post_tags" required></textarea>
                </div>
            </div>
        </div>
        <input class="btn btn-primary" type="submit" value="Submit" name="create_post">
    </form>
    <div class="text-danger"> <?= $msg ?></div>
</div>