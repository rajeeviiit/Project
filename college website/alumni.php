<html>
<body>
<?php
$s_name="";
$student_id="";
$s_batch="";
$s_id=$_POST["roll"];

$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="sandeep";
$connection=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(mysqli_connect_errno()){
    echo"error";
}else{

echo"connect";
}
$sql="select * from student where s_id='$s_id'";
$result=mysqli_query($connection,$sql);
while($row=mysqli_fetch_array($result)){

    
    
   
      $s_name=$row["name"];
    $student_id=$row["s_id"];
     
       $s_batch=$row["batch"];
    
}

$sql = "DELETE FROM student WHERE s_id='$s_id'";
if (mysqli_query($connection, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($connection);
}
 

 


$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="sandeep";
$connection1=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(mysqli_connect_errno()){
    echo"error";
}else{

echo"connect";
}


$sql = "INSERT INTO alumni (s_name,student_id,s_batch)
VALUE ('$s_name','$student_id','$s_batch')";
mysqli_query($connection1,$sql);

    
  include('view_student.php'); 
     
?>
    
    </body>
</html>