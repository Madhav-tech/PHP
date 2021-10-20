<div>
    <?php

    if (isset($_POST["add_cat"])) {
        if (trim($_POST["cat_title"])) {
            $catPojo = new Category();
            $catTable = new CategoryTable();

            $catPojo->setCat_title($_POST["cat_title"]);

            $catResult = $catTable->getAllCategoriesFromTitle($connection,$catPojo->getCat_title());
            if (mysqli_num_rows($catResult) > 0) {
                $msg = "<span class='text-danger'>Category already Present<br><small>Enter a different one </small></span>";
            } else {
                $catInsertResult = $catTable->insertIntoCategoryTable($connection,$catPojo);
                $msg = "Category <strong>{$catPojo->getCat_title()}</strong> added successfully";
            }
        } else {
            echo "Please enter a category";
        }
    }
    ?>

    <form action="" method="POST">
        <div class="form-group mb-3">
            <label for="cat_title">Enter Category</label>
            <input class="form-control " type="text" name="cat_title" id="cat_title">

        </div>
        <div class="form-group mb-3">
            <input type="submit" class="btn btn-primary mb-3" name="add_cat" value="Add">
        </div>
    </form>

</div>