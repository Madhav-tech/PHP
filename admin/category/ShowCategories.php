<table class="table table-bordered table-success table-hover">
    <caption></caption>
    <thead>
        <tr>
            <th>Id</th>
            <th>Category Title</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $categoriesTableObj = new CategoryTable();
        $catResult = $categoriesTableObj->getAllCategories($connection);
        while ($categoryPojo = $catResult->fetch_object('Category')) {
            $title = $categoryPojo->getCat_title();
            $id = $categoryPojo->getCat_id();

        ?>
            <tr>
                <td><?= $id ?> </td>
                <td><?= $title ?></td>
                <td>
                    <a href="categories.php?update_cat_id=<?= $id ?>" class='btn btn-info btn-sm'>Update</a>
                </td>
                <td>
                    <a href="categories.php?delete_cat_id=<?= $id ?>" class='btn btn-danger btn-sm'>Delete</a>
                </td>
            </tr>

        <?php
        } //end of while loop 
        ?>
    </tbody>
</table>