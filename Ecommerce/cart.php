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
        
        <?php cart(); ?>
        <div id="shopping_cart">
            <span style="font-size: 18px; padding:5px;
             line-height: 40px;">Welcome Guest!<b style="color: yellow ">Shopping Cart</b>
           Total Items <?php total_items();?> : Total Price <?php echo "$" .  total_price() ;?> <a href="index.php" style="color: red">Back to shop</a>
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
       
    </br>
        <div id="products_box">
          <form action="" method="post" enctype="multipart/form-data">
            <table align="center" width="700" bgcolor="skyblue">
               
                 <tr align="center">
                    <th>Remove</th>
                    <th>Products</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                   
                </tr>
                <?php
                 global $con;
               
               $Total=0;

     $ip=getIp();
     
     $sel_price="select * from cart where ip_add='$ip'";
     
     $run_price=mysqli_query($con, $sel_price);

     while ($p_price=mysqli_fetch_array($run_price)) {
        $pro_id=$p_price['p_id'];
        $pro_price="select * from products where product_id='$pro_id'";
        $run_pro_price=mysqli_query($con, $pro_price);

        while ($pp_price=mysqli_fetch_array($run_pro_price)) {
            # code...
            $product_price=array($pp_price['product_price']);
            $product_title=$pp_price['product_title'];
            $product_image=$pp_price['product_image'];
            $single_price=$pp_price['product_price'];
            $values=array_sum($product_price);
            $Total+=$values;


   

                ?>

                <tr align ="center">
                    <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>"/></td>
                     <td><?php echo $product_title;?><br> 
                        <img src="../admin_area/product_images/<?php echo $product_image;?> width="60" height="60"></td>
                     
             <td><input type="text" size="3" name="qty" value="<?php echo $_SESSION['qty'];?>"/> </td>

              <?php
             if (isset($_POST['update_cart'])) {
               $qty=$_POST['qty'];
               
               $update_qty="update cart set qty='$qty'";
               $run_qty=mysqli_query($con, $update_qty);

               $_SESSION['qty']=$qty;
               $Total=$Total*$qty;
             }
             ?>

             <td><?php echo "$" . $single_price;?> </td>

            
                    </tr>
                 


                                    <?php } } ?>

                 <tr align="right">
                    <td colspan="4" ><b>Sub Total:</b></td>
                    <td><?php echo "$" . $Total;?>

                  </tr> 

                  <tr align="center">
                   <td colspan="4"><input type="submit" name="update_cart" value="Update cart"/></td>
                    <td><input type="submit" name="continue" value="Countinue Shopping"/></td>
                     <td><a href="checkout.php" style="text-decoration:none;color:black;"><button>Checkout</a></button></td>


                  </tr>          


            </table>
          </form>
          <?php
          function updatecart(){
           global $con;
          $ip=getIp();

          if (isset($_POST['update_cart'])) {
            foreach ($_POST['remove'] as $remove_id) {
              $delete_product="delete from cart where p_id='$remove_id' AND ip_add='$ip'";
              $run_delete =mysqli_query($con, $delete_product);
              if ($run_delete) {
                echo "<script>window.open('cart.php','_self')</script>";
              }
 
                }
          }

          echo @$up_cart= updatecart(); 
          if (isset($_POST['continue'])) {
             echo "<script>window.open('index.php','_self')</script>";

          }
          
     }
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
