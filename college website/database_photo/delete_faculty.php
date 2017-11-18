<?php

$faculty_id=$_POST["faculty_id"];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sandeep";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to delete a record
$sql = "DELETE FROM faculty WHERE faculty_id='$faculty_id'";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>