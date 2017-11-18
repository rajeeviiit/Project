<?php

include('./db/db.php');

class Image{
 var
     $faculty_id,
    $faculty_name,
    $degree,
    $interest,
    $contact,
    $link_addr,
    $image;
    
function insert_into_image(){
 if($_FILES["txt_image"]){
  $tmpname=$_FILES["txt_image"]["tmp_name"];
     $orignalname=$_FILES["txt_image"]["name"];
     $size=($_FILES["txt_image"]["size"]/ 5242880)."MB<br>";
     $type=$_FILES["txt_image"]["name"];
     $image=$_FILES["txt_image"]["name"];
     move_uploaded_file($_FILES["txt_image"]["tmp_name"],"image/".$_FILES["txt_image"]["name"]);
 }
    $query="insert into faculty (faculty_id,faculty_name,degree,interest,contact,link_addr,image)
    values ('$this->faculty_id','$this->faculty_name','$this->degree','$this->interest','$this->contact','$this->link_addr','$image')";
    if(mysql_query($query)){
        echo "<script language='javascript' type='text/javascript'>
        alert('Image Uploaded');
        </script>";
    }else{
           echo "<script language='javascript' type='text/javascript'>
        alert('Image Not Uploaded');
        </script>";
    }
}
    
}

?>