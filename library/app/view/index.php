<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="../dashboard/assets/image/logo.ico">
    <link rel="shortcut icon" type="image/x-icon" href="../dashboard/assets/image/logo.ico">
    <title>Library: Home</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../dashboard/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dashboard/assets/css/font-awesome.min.css">
    <!-- Owl Carousel Assets -->
    <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="owl-carousel/owl.theme.css">
</head>
<body>
<?php
require '../init.php';
require 'navbar.php';

?>

<div class="main-content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div id="owl-demo" class="owl-carousel">
                <div class="item"><img src="image/library/library_1.jpg" alt="Library Image"></div>
                <div class="item"><img src="image/library/library_2.jpg" alt="Library Image"></div>
                <div class="item"><img src="image/library/library_3.jpg" alt="Library Image"></div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="about">
            <h2 class="text-center">About</h2>
            <p class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in
                the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with
                desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>
        <div class="activities">
            <h2 class="text-center">Last Activities</h2>
            <div class="row">
                <div class="col-xs-12 col-md-3 col-sm-12 col-lg-3">
                    <div class="quarter">
                        <i class="fa fa-book fa-3x fa-align-right"></i>
                        <span class="number">1255</span> <br/><br/>
                        <span>Total Books</span>
                    </div>
                </div>
                <div class="col-xs-12 col-md-3 col-sm-12 col-lg-3">
                    <div class="quarter">
                        <i class="fa fa-user fa-3x"></i>
                        <span class="number">325</span> <br/><br/>
                        <span>Total Student</span>
                    </div>
                </div>
                <div class="col-xs-12 col-md-3 col-sm-12 col-lg-3">
                    <div class="quarter">
                        <i class="fa fa-book fa-3x"></i>
                        <span class="number">25</span> <br><br/>
                        <span>Recently added Books</span>
                    </div>
                </div>
                <div class="col-xs-12 col-md-3 col-sm-12 col-lg-3">
                    <div class="quarter">
                        <i class="fa fa-book fa-3x"></i>
                        <span class="number">15</span> <br><br/>
                        <span>Most issued Books</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once "footer.php";
?>

<script src='../dashboard/assets/js/jquery-3.1.1.min.js'></script>
<script src='../dashboard/assets/js/bootstrap.min.js'></script>
<script src='owl-carousel/owl.carousel.min.js'></script>
<script src="js/main.js"></script>
</body>
</html>
