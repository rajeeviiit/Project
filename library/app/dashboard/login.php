<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="assets/image/logo.ico">
    <link rel="shortcut icon" type="image/x-icon" href="../dashboard/assets/image/logo.ico">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../view/css/reset.css">
    <link rel="stylesheet" href="../view/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
</head>

<body>
<?php
include_once "init.php";
admin_protact_page();
?>
<div class="login-logo">
    <img src="assets/image/logo.png">
</div>
<div class="form-content">
    <div class="form">
        <h2>Admin Login</h2>
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
        ?>
        <form action="../controller/admin_auth.php" method="post">
            <input type="text" placeholder="Username" id="username" name="username"/>
            <input type="password" placeholder="Password" id="password" name="password"/>
            <button type="submit" name="login"><i class="fa fa-sign-in"></i> Login</button>
        </form>
        <div class="cta"><a href="forgot_password.php"><i class="fa fa-info-circle"></i> Forgot your password?</a></div>
    </div>
</div>
<script src='assets/js/jquery-3.1.1.min.js'></script>
<script src='assets/js/bootstrap.min.js'></script>
<script src="../view/js/main.js"></script>
</body>
</html>
