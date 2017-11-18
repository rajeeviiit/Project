<!DOCTYPE html>
<?php
include("functions/functions.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Onilne Shoping</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css" media="all"/>
</head>
<body>
<!-- main Container starts here-->
<div class="main_wrapper">
    <!--starts here header-->
    <div class="header_wrapper">
        <a href="index.php"><img id="logo" src="images/gambarlogo.png"/></a>
         <div class="form">
            <form method="get" action="results.php"
                  enctype="multipart/form-data">
                <input class="srch" type="text" placeholder="&nbsp&nbsp&nbsp Search products" name="user_query"/>
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
            <div id="shopping_cart">
            <span style="float:center; font-size: 18px; padding:5px;
             line-height: 40px;">Welcome Guest!<b style="color: yellow ">Shopping Cart</b>
           Total Items : Total Price <a href="cart.php" style="color: yellow">Goto Cart</a></span>

            </div>
            <div id="products_box">
                <?php
                $get_pro = "select * from products";
                $run_pro = mysqli_query($con,$get_pro);
                while($row_pro=mysqli_fetch_array($run_pro)){
                    $pro_id = $row_pro['product_id'];
                    $pro_cat = $row_pro['product_cat'];
                    $pro_brand = $row_pro['product_brand'];
                    $pro_title = $row_pro['product_title'];
                    $pro_price = $row_pro['product_price'];
                    $pro_image = $row_pro['product_image'];

                    echo "
         <div id='single_product'>
         <h3>$pro_title</h3>
         <img src='admin_area/product_images/$pro_image' width='180px' height='180px' 
    / >
    <p><b>$pro_price</b></p>
    <a href='details.php?pro_id=$pro_id' style='float: left;'>Details</a>
    <a href='index.php?pro_id=$pro_id'><button style='float: right'>Add to Cart</button></a>
    
         </div>
         
         ";

                }
                ?>


            </div>


        </div>
    </div>
    <div id="footer">
        

    </div>
</div>

</body>
</html>