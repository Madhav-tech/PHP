<?php ?>
<div class="col-md-4">
    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post">
            <div class="input-group">
                <input type="text" class="form-control" name="search">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit" name="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                    <li><a href='index.php'>All</a> </li>
                    <?php
                    $categoriesTableObj = new CategoryTable();
                    $catResult = $categoriesTableObj->getAllCategories($connection);
                    while ($categoryPojo = $catResult->fetch_object('Category')) {
                        $title = $categoryPojo->getCat_title();
                        $id = $categoryPojo->getCat_id();
                        echo "<li><a href='search.php?cat_id=$id'>{$title}</a> </li>";
                    }
                    ?>
                </ul>
            </div>

        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <?php include "include/sidewell.php" ?>

</div>