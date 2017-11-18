<!DOCTYPE html>
<?php
session_start();
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
        <a href="index.php"><img id="logo" class="location" src="images/gambarlogo.png" /></a>
        
        <div class="form">
            <form method="get" action="results.php"enctype="multipart/form-data">
                <input class="srch" type="text" placeholder="&nbsp&nbsp&nbsp Search products" name="user_query"/>
                <input class="sch" type="submit" name="search" value="search"/>
            </form>
        </div>
    </div>
    <div class="menubar">
            <ul id="menu">
                <li><a href="../index.php">Home</a> </li>
                <li><a href="../all_products.php">All Products</a> </li>
                <li><a href="customer/my_account.php">My Account</a> </li>
                <li><a href="">Sign Up</a> </li>
                <li><a href="../cart.php">Shopping Cart</a> </li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        
    </div>

    <!--header ends here -->
    <!--navigation starts here-->


    <div class="content_wrapper">
        <!--navigation bar ends-->
        <!--content wrapper ends-->

    <div id="sidebar">
        <div id="sidebar_title">My Account</div>
        <ul id="cats">

           <?php
              $user=$_SESSION['customer_email'];
              $get_img="select * from customers where customer_email='$user'";
              $run_img=mysqli_query($con, $get_img);
              $row_img=mysqli_fetch_array($run_img);
              $c_image=$row_img['customer_image'];
              $c_name=$row_img['customer_name'];
              echo "<img src='customer_images/$c_image' width='150' height='120'/>";

           ?>

            <li><a href="my_account.php?my_order">My Order</a></li>
            <li><a href="my_account.php?editaccount">Edit Account</a></li>
            <li><a href="my_account.php?change_paasword">Change Password</a></li>
            <li><a href="my_account.php?delete_account">Delete Account</a></li>
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
            <span style="font-size: 15px; padding:5px;
             line-height: 40px;">
          <?php
           if (isset($_SESSION['customer_email'])){
               echo "<b>Welocme: </b>" . $_SESSION['customer_email'];
                 }
             
           
        ?>
            
        <?php
           if (!isset($_SESSION['customer_email'])){
               echo "Click here for Login <a href='checkout.php'>Login</a>";
           }
           else{
            echo "<a href='logout.php'>Logout</a>";
           }
        ?>

           </span>
           </div>
       
        <div id="products_box">


   

   <?php 
     if (!isset($_GET['my_order'])) {
         if (!isset($_GET['editaccount'])) {
             if (!isset($_GET['change_paasword'])) {
                 if (!isset($_GET['delete_account'])) {

                   echo " <h2>Welcome: echo $c_name </h2></br>
                     <b>Check your order <a href='my_account.php?my_order'>Link</a></b>";
        
        }
        
        }
        
        }
        }
         # code...
     
    ?>
    <?php
    if (isset($_GET['editaccount'])) {
        include("editacount.php");
        # code...
    }
     if (isset($_GET['change_paasword'])) {
        include("change_pass.php");
        # code...
    }
     
      if (isset($_GET['delete_account'])) {
        include("delete_account.php");
        # code...
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