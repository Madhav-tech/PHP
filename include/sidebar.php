<!-- Blog Categories Well -->
<div class="well bg-light rounded p-3" id="side-card">
    <div class="row">
        <div class="mb-3">
            <form class="" action="search.php" method="post">
                <div class="input-group">
                    <input type="text" class="form-control mb-3" name=" search" placeholder="Blog Search">
                </div>
                <button class="form-control btn btn-success" type="submit" name="submit">search</button>

            </form>
        </div>
        <div class=" mt-3 ">
            <h4>Blog Categories</h4>
            <div class="col-lg-12 ">
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

</div>