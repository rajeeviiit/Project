<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="../dashboard/assets/image/logo.ico">
    <link rel="shortcut icon" type="image/x-icon" href="../dashboard/assets/image/logo.ico">
    <title>Login</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../dashboard/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dashboard/assets/css/font-awesome.min.css">
</head>

<body>
<?php
include_once "../init.php";
include_once "navbar.php";
protact_page();
?>
<div class="login-logo">
    <img src="../dashboard/assets/image/logo.png">
</div>
<div class="form-content">
    <div class="form">
        <h2>Reset Password</h2>
        <?php
        if (isset($_GET['errors']) == true) {
            $errors = $_GET['errors'];
            ?>
            <p class="errors">
                <?php
                print_r($errors);
                ?>
            </p>
            <?php
        }
        if (isset($_GET['success']) && empty($_GET['success'])) {
            echo "<p style='text-align: center;'>Password Changed Suceessfully.</p>";
        }
        ?>
        <form action="../controller/auth.php" method="post">
            <input type="password" placeholder="Password" id="password" name="new_password"/>
            <input type="password" placeholder="Confirm Password" id="password" name="new_password_again"/>
            <button type="submit" class="reset_password"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                Reset Password
            </button>
        </form>
    </div>
</div>
<script src='../dashboard/assets/js/jquery-3.1.1.min.js'></script>
<script src='../dashboard/assets/js/bootstrap.min.js'></script>
<script src="js/main.js"></script>
</body>
</html>
