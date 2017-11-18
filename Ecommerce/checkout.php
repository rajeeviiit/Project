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
    

    <div id="content_area">
        <?php cart(); ?>
        <div id="shopping_cart">
            <span style="float:right; font-size: 18px; padding:5px;
             line-height: 40px;">


             Welcome Guest!<b style="color: yellow ">Shopping Cart</b>
           Total Items <?php total_items();?> : Total Price <?php total_price(); ?><a href="cart.php" style="color: yellow">Goto Cart</a></span>"

        </div>
        
        <div id="products_box">
        <?php
        if (!isset($_SESSION['customer_email'])) {
            # code...
           include("customer_login.php");
        }
        else{
            include("payment.php");
        }

        ?>

            
        </div>


    </div>
    </div>
    <div id="footer">
       <h2 style="text-align:center; padding-top: 30px;">&copy;2016 by ITGroup.com</h2>

    </div>
</div>

</body>
</html>