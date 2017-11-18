<!DOCTYPE html>
<?php
session_start();
include("functions/functions.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Onilne Shop</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css" media="all"/>
</head>
<body>
 <!-- main Container starts here-->
<div class="main_wrapper">
    <!--starts here header-->
    <div class="header_wrapper">
        <a href="index.php"><img id="logo" src="images/logo.jpg"/></a>
        <div class="form">
            <form method="get" action="results.php"enctype="multipart/form-data">
                <input class="srch" type="text" placeholder="search a product" name="user_query"/>
                <input class="sch" type="submit" name="search" value="search"/>
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
        </div>
       
    <div id="content_area">
       
        <div id="products_box">
         <?php cart(); ?>
        <div id="shopping_cart">
            <span style="float:right; font-size: 15px; padding:5px;
             line-height: 40px;">
          <?php
           if (isset($_SESSION['customer_email'])){
               echo "<b>Welocme: </b>" . $_SESSION['customer_email'];
                 }
             
           
        ?>
            
        <?php
           if (!isset($_SESSION['customer_email'])){
               echo "<a href='checkout.php'>Login</a>";
           }
           else{
            echo "<a href='logout.php'>Logout</a>";
           }
        ?>

           </span>"

        </div>
       
           
        </div>


    </div>
    </div>
    <div id="footer">
       <h2 style="text-align:center; padding-top: 30px;">&copy;2016 by 000webhost.shopnfest.com</h2>

    </div>
</div>

</body>
</html>