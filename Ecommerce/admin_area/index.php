<!DOCTYPE>
<!DOCTYPE html>
<html>
<head>
	<title>This is Admin panel</title>
   <link rel="stylesheet" type="text/css" href="style.css" media="all">

</head>
<body>
<div class="main_wrapper">
 	 

 	<div id="header"> <h1>Welcome to admin Manage Panel</h1></div>
 	<div id="right">
 		<h2>Manage Content</h2>
 		<a href="index.php?insert_product">Insert New Product</a>
<a href="index.php?view_products">View All Products</a>
<a href="index.php?insert_cat">Insert New Category</a>
<a href="index.php?view_cats">View All Categories</a>
<a href="index.php?insert_brand">Insert New Brand</a>
<a href="index.php?view_brands">View All Brand</a>
<a href="index.php?view_customer">View Customers</a>
<a href="index.php?view_order">View Orders</a>
<a href="index.php?view_payments">View Payments</a>
<a href="logout.php">Admin Logout</a>
 	</div>

 	<div id="left">
 		<?php
 		if (isset($_GET['insert_product'])) {
 			include("insert_product.php");
 			# code...
 		}
 		if (isset($_GET['view_products'])) {
 			include("view_products.php");
 			# code...
 		}
 		if (isset($_GET['edit_pro'])) {
 			include("edit_pro.php");
 			# code...
 		}

 		if (isset($_GET['insert_cat'])) {
 			include("insert_cat.php");
 			# code...
 		}
 		if (isset($_GET['view_cats'])) {
 			include("view_cats.php");
 			# code...
 		}
        if (isset($_GET['edit_cat'])) {
 			include("edit_cat.php");
 			# code...
 		}

 		?>
 	</div>
 </div>

</body>
</html>