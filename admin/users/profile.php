<?php
$user_id = $_SESSION['user_id'];

$userDatils = new Users();
$result = $userDatils->getUserFromId($user_id);
$row = mysqli_fetch_assoc($result);
$firstName = $row['firstname'];
$lastName = $row['lastname'];
$email = $row['email'];


?>

<div class="mx-3 ">
    <div class="d-flex justify-content-center ">
        <H1>User Details</H1>
    </div>
    <table class=" table table-bordered bg-light text-center border-primary ">

        <tr>
            <th>First Name</th>
            <td><?= $firstName; ?></td>
            <td><a class="btn btn-outline-danger" href="users.php?source=update&update_user_id=<?= $user_id ?>">Update</a> </td>
        </tr>
        <tr>
            <th>Last Name</th>
            <td><?= $lastName ?></td>
            <td><a class="btn btn-outline-danger" href="users.php?source=update&update_user_id=<?= $user_id ?>p">Update</a> </td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?= $email ?></td>
            <td><a class="btn btn-outline-danger" href="users.php?source=update&update_user_id=<?= $user_id ?>">Update</a> </td>
        </tr>

    </table>
</div>
<?php include "include/footer.php"; ?>