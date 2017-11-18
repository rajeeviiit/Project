<html>
    <head>
    <link href="college.css">
    </head>
    
<body>
<?php
$name=$_POST["name"];
$s_id=$_POST["s_id"];

$branch=$_POST["branch"];
$batch=$_POST["batch"];


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


$sql = "INSERT INTO student (name,s_id,branch,batch)
VALUE ('$name','$s_id','$branch','$batch')";
mysqli_query($connection,$sql);

    include 'form.html';

?>
</body>
</html>