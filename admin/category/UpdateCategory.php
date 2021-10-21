<div id="cat_card2">
    <div id="card-content" class="p-2">
        <?php
        $value_cat_title = "";
        if (isset($_GET["update_cat_id"])) {
            $value_cat_id = $_GET["update_cat_id"];
            $catTableObj = new CategoryTable();
            $catResult = $catTableObj->getCategoryFromId($connection, $value_cat_id);
            $categoryPojo = $catResult->fetch_object('Category');
            $value_cat_title = $categoryPojo->getCat_title();
        }
        ?>
        <form action="categories.php" method="POST">
            <div class="form-group mb-3">
                <label for="cat_title">Update Category</label>
                <input class="form-control " type="text" name="cat_title" id="cat_update_title" value="<?php echo $value_cat_title; ?>">
                <input type="text" name="cat_id" value="<?php echo $value_cat_id; ?>" hidden>

            </div>
            <div class="form-group mb-3">
                <input type="submit" class="btn btn-success mb-3" name="update" value="Update">
            </div>
        </form>
    </div>
</div>