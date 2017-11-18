<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="assets/image/logo.ico">
    <link rel="shortcut icon" type="image/x-icon" href=assets/image/logo.ico">
    <title>Dashboard - Home</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
</head>
<body>
<div class="app-container">
    <div class="row content-container">
        <?php
        include "init.php";
        include_once "navbar.php";
        include_once "sidebar.php";
        //include_once "footer.php";
    ?>
        <div class="main-content container">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <?php
                if (isset($_GET['password_success']) && empty($_GET['password_success'])) {
                    echo "<div class='alert alert-success'>Password Sucessfully Changed
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <span aria-hidden=\"true\">&times;</span>
                        </button>
                        </div>";
                }
                ?>
                <img src="../view/image/library/back.jpg" style="width: 100%;height: 100%" >
                <!--<iframe src="http://seminarioteologicouc.net/es/wp-content/uploads/2013/07/ONLINE-LIBRARY-PICTURE.jpg" style="width: 100%;height: 600px"></iframe>-->
            </div>
        </div>
    </div>
</div>


<script src="assets/js/jquery-3.1.1.min.js"></script>
<script src='assets/js/bootstrap.min.js'></script>
<script src="assets/js/app.js"></script>
</body>
</html>