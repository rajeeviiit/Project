</br>

<h2 style="text-align: center; ">Do you wanna really delete account</h2>

<form accept="" method="post" style="height: 300px;">
	</br>

<input type="submit" name="yes" value="Yes I want" required></br>

<input type="submit" name="change_pass" value="No I was accidently here"/></br>

</form>

<?php
include("includes/db.php");

$use=$_SESSION['customer_email'];

if (isset($_POST['yes'])) {
 
    $delete_customer="delete from customers where  customer_email='$user'";

 $run_customer=mysqli_query($con, $delete_customer);
 

 
 	echo "<script>alert('We are really sorry your ac is deleted!')</script>";
 	echo "<script>window.open('../index.php', '_self') </script>";

}
if (isset($_POST['no'])) {
	echo "<script>alert('Oh don't worry We save your ac!')</script>";
 	echo "<script>window.open('my_account.php', '_self') </script>";
 }
 



?>