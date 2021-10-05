<table class="table table-bordered table-hover">
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
        $category_data = getAllCategories();
        while ($row = mysqli_fetch_assoc($category_data)) {
            $id = $row["cat_id"];
            $title = $row["cat_title"];

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
                <!--   <button type='submit' class='btn btn-danger' name='update' value=<?= $id ?> >Delete</button> -->
            </tr>

        <?php
        } //end of while loop 
        ?>
    </tbody>
</table>