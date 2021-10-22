<?php include "include/header.php";
if (isset($_GET['source'])) {
    $source = $_GET['source'];
    if ($source == 'false') {
        echo "<div class = 'text-center p-1'><h4 id='error'>Unauthorized Access</h4><span>Login with admin account</span></div>";
    }
}
$msg = '';
if (isset($_POST['login'])) {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    if (!empty(trim($username)) && !empty(trim($password))) {

        $user = new Users();

        $result = $user->getUser($username, $password);
        $no_of_row = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);

        if ($no_of_row > 0) {
            $_SESSION['valid'] = true;
            $_SESSION['timeout'] = time();
            $_SESSION['username'] = $username;
            $_SESSION['name'] = $row['firstname'] . ' ' . $row['lastname'];
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['role'] = $row['role'];

            $_SESSION['role'] === "admin" ? header("Location: admin") : header("Location: index.php");
        } else {
            $msg = "Invalid Credential";
            $_SESSION['valid'] = false;
        }
    } else {
        $msg = "Enter all field with * symbol";
    }
}
?>
<div class="container">
    <div class="row ">
        <div class="col-lg-2 "></div>


        <div class="col=lg-8" id="card">
            <div class="container bg-light rounded py-2 mt-3 " id="card-content">
                <div id="card-title">
                    <h2 class="mt-3">Login</h2>
                </div>
                <span class="d-flex flex-row-reverse bd-highlight">*required</span>
                <form action="" method="post" class="form">
                    <div class="input-group mb-3">
                        <div class="input-group-text required">Username</div>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="input-group mb-3 ">
                        <div class="input-group-text required">Password</div>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="d-flex justify-content-center ">
                        <input class="btn btn-info mb-3" type="submit" name="login" id="submit-btn">
                    </div>
                </form>
                <div class="d-flex justify-content-center text-red my-0" id="error">
                    <?= $msg ?>
                </div>
                <div class="my-3 d-flex justify-content-between">
                    <a class="btn btn-warning" href="index.php?source=create" name="create" id="create">Create Account</a>
                    <a class="btn btn-warning" href="index.php?source=help" name="help" id="help">Help</a>
                </div>

            </div>
        </div>
        <div class="col-lg-2 "></div>
    </div>

</div>
<?php include "include/footer.php" ?>