<!DOCTYPE html>
<?php
session_start();
include("functions/functions.php");
?>
<html lang="en">
<head>

  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" type="text/css" href="css/font-awesome.css"> -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
  <script src="js/jquery-3.1.1.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <title>Onilne Shoping</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css" media="all"/>
</head>

<body>
 <!-- main Container starts here-->
<div class="main_wrapper">
    <!--starts here header-->
    <div class="header_wrapper">
        <a href="index.php"><img id="logo" class="location" src="images/gambarlogo.png" /></a>
       <div class="form">
            <form method="get" action="results.php"enctype="multipart/form-data">
                <input class="srch" type="text" placeholder="&nbsp&nbsp&nbsp Search products" name="user_query"/>
                <input class="sch" type="submit" name="search" value="Search"/>
            </form>
        </div>
    </div>
    <div class="menubar">
            <ul id="menu">
                <li><a href="index.php">Home</a> </li>
                <li><a href="all_products.php">All Products</a> </li>
                <li><a href="customer/my_account.php">My Account</a> </li>
                <li><a href="">Sign Up</a> </li>
                <li><a href="cart.php">Shopping Cart</a> </li>
                <li><a href="#">Contact Us</a></li>
            </ul>
       
    </div>


    <div id="header2">
  
       <div class="carousel-inner" class="first">
       <div id="myCarousel" class="carousel slide" data-ride="carousel" class="first">
  

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active" class="first">
          <div class="div1"><img src="image/1.jpg" alt="Chania" width="100%" height="280"></div>


         
      </div>

         <div class="item">

         <div class="div1"><img src="image/2.jpg" alt="Chania" width="100%" height="280"></div>

       
         </div>

         <div class="item">

         <div class="div1"><img src="image/3.jpg" alt="Chania" width="100%" height="280"></div>

       
         </div>

         <div class="item">

         <div class="div1"><img src="image/4.jpg" alt="Chania" width="100%" height="280"></div>

       
         </div>

         <div class="item">

         <div class="div1"><img src="image/5.jpg" alt="Chania" width="100%" height="280"></div>

       
         </div>
    
    </div>

    <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    </div>
 

</div>


    <!--header ends here -->
    <!--navigation starts here-->


    <div class="content_wrapper">
        <!--navigation bar ends-->
        <!--content wrapper ends-->

    <div id="sidebar">
        <div id="sidebar_title">Categories</div>
        <ul id="cats">
           <?php getCats();  ?>

        </ul>
        <div id="sidebar_title">Brands</div>
        <ul id="cats">
           <?php
           getBrands();
           ?>

        </ul>


    </div>

    <div id="content_area">
        <div class="marqui">
             <marquee  behavior="alternet" direction="left" onmouseover="stop()" onmouseout="start()" bgcolor="gray" height="40px;  hspace="2">
             <h3>*****Welcome to Online Shoping*****</h3>

</marquee>

        </div>
        <?php cart(); ?>
        
        <div id="shopping_cart">
            <span style="font-size: 15px; line-height: 40px;">
          <?php
           if (isset($_SESSION['customer_email'])){
               echo "<b>Welocme: </b>" . $_SESSION['customer_email'] . "<b style='color=yello;'> Your";
                 }
            else{
                echo "<b> Welcome guest!</b>";
            }     
           
        ?>
             <b style="color: yellow ">Shopping Cart</b>
           Total Items <?php total_items();?> : Total Price <?php total_price(); ?><a href="cart.php" style="color: yellow">Goto Cart</a>
        <?php
           if (!isset($_SESSION['customer_email'])){
               echo "<a href='checkout.php'>Login</a>";
           }
           else{
            echo "<a href='logout.php'>Logout</a>";
           }
        ?>

           </span>

        </div>
        <?php  echo $ip= getIp(); ?>
        <div id="products_box">
            <?php getPro(); ?>
            <?php getCatPro(); ?>
            <?php getBrandPro(); ?>
        </div>


    </div>
    </div>
    <div id="footer">
      

    </div>
    </div>
</body>
</html>