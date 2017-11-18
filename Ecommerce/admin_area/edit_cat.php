


<?php
include ("includes/db.php");
if (isset($_GET['edit_cat'])) {
    $cat_id=$_GET['edit_cat'];
    # code...

    $get_cat="select * from categories where cat_id='$cat_id'";

     $run_cat =mysqli_query($con, $get_cat);
    

     $row_cat=mysqli_fetch_array($run_cat);
     $cat_id=$row_cat['cat_id'];    
     $cat_title=$row_cat['cat_title'];
   
?>

<form accept="" method="post" style="padding: 80px;">

<b>Update Category:</b>
<input type="text" name="new_cat" value="<?php echo $cat_title;?>" required/>
<input type="submit" name="update_cat" value="Update Category"/>
	

</form>

<?php
if (isset($_POST['update_cat'])) {
	# code...

$update_id=$cat_id;

$new_cat=$_POST['new_cat'];
$update_cat="update categories set cat_title='$new_cat' where cat_id='$update_id'";
$run_cat=mysqli_query($con, $update_cat);
if($run_cat){
	echo "<script>alert('Category has been updated!')</script>";
	echo "<script>window.open('index.php?view_cats', '_self')</script> ";
   }
 }

 ?>