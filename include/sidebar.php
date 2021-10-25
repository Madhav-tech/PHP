<!-- Blog Categories Well -->
<div class="well bg-light rounded p-3" id="side-card">
    <div class="row">
        <div class="mb-3">
            <form class="" action="search.php" method="post">
                <div class="input-group">
                    <input id="search" type="text" class="form-control mb-3" name=" search" placeholder="Blog Search" onkeyup="showCategoryHint(this.value);">
                </div>
                <div id="hint"></div>
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
<script>
    function showCategoryHint(text) {
        if (text.length === 0) {
            document.getElementById("hint").innerHTML = "";
        } else {
            const httpRequest = new XMLHttpRequest();
            httpRequest.onload = function() {

                document.getElementById("hint").innerHTML = this.responseText;
            }
            httpRequest.open("GET", "include/getCategoryHint.php?text=" + text);
            httpRequest.send();
        }
    }
</script>