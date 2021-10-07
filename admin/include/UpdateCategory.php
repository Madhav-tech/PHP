<div>
    <?php
    $value_cat_title = "";
    if (isset($_GET["update_cat_id"])) {
        $value_cat_id = $_GET["update_cat_id"];
        $category_data = getCategoryFromId($value_cat_id);
        $row = mysqli_fetch_assoc($category_data);
        $value_cat_title = $row['cat_title'];
    }
    ?>
    <form action="categories.php" method="POST">
        <div class="form-group">
            <label for="cat_title">Update Category</label>
            <input class="form-control " type="text" name="cat_title" id="cat_update_title" value="<?php echo $value_cat_title; ?>">
            <input type="text" name="cat_id" value="<?php echo $value_cat_id; ?>" hidden>

        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success mb-3" name="update" value="Update">
        </div>
    </form>
</div>