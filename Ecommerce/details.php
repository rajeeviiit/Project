<!DOCTYPE html>
<?php
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
        <img id="logo" src="images/gambarlogo.png"/>
        <div class="form">
            <form method="get" action="results.php"enctype="multipart/form-data">
                <input class="srch" type="text" placeholder="&nbsp&nbsp&nbsp Search products" name="user_query"/>
                <input class="sch" type="submit" name="search" value="Search"/>
            </form>
        </div>
    
    </div>
    <div class="menubar">
        <ul id="menu">
            <li><a href="#">Home</a> </li>
            <li><a href="#">All Products</a> </li>
            <li><a href="#">My Account</a> </li>
            <li><a href="#">Sign Up</a> </li>
            <li><a href="#">Shopping Cart</a> </li>
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
            <div id="shopping_cart">
            <span style="font-size: 18px; padding:5px;
             line-height: 40px;">Welcome Guest!<b style="color: yellow ">Shopping Cart</b>
           Total Items : Total Price <a href="cart.php" style="color: yellow">Goto Cart</a></span>"

            </div>
            <div id="products_box">
                <?php
                if(isset($_GET['pro_id'])){
                    $product_id = $_GET['pro_id'];

                $get_pro = "select * from products where product_id = '$product_id'";
                $run_pro = mysqli_query($con,$get_pro);
                while($row_pro=mysqli_fetch_array($run_pro)){
                    $pro_id = $row_pro['product_id'];

                    $pro_title = $row_pro['product_title'];
                    $pro_price = $row_pro['product_price'];
                    $pro_image = $row_pro['product_image'];
                    $pro_desc = $row_pro['product_desc'];

                    echo "
         <div id='single_product'>
         <h3>$pro_title</h3>
         <img src='admin_area/product_images/$pro_image' width='400px' height='300px' 
    / >
    <p><b>$pro_price</b></p>
    <a href='index.php' style='float: left;'>Go Back</a>
    <a href='index.php?pro_id=$pro_id'><button style='float: right'>Add to Cart</button></a>
         </div>
         
         ";

                }}

                ?>
            </div>


        </div>
    </div>
    <div id="footer">
        <h2 style="text-align:center; padding-top: 30px;">&copy;2016 by 000webhost.shopnfest.com</h2>

    </div>
</div>

</body>
</html>