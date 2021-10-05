<div>
    <?php

    if (isset($_POST["add_cat"])) {
        if (trim($_POST["cat_title"])) {
            $cat_title =  $_POST["cat_title"];
            $category_data = getAllCategoriesFromTitle($cat_title);
            if (mysqli_num_rows($category_data) > 0) {
                $msg = "<span class='text-danger'>Category already Present<br><small>Enter a different one </small></span>";
            } else {
                if (!insertIntoCategoryTable($cat_title)) {
                    die(mysqli_error($connection));
                }
                $msg = "Category <strong>{$cat_title}</strong> added successfully";
            }
        } else {
            echo "Please enter a category";
        }
    }
    ?>

    <form action="" method="POST">
        <div class="form-group">
            <label for="cat_title">Enter Category</label>
            <input class="form-control " type="text" name="cat_title" id="cat_title">

        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary mb-3" name="add_cat" value="Add">
        </div>
    </form>

</div>