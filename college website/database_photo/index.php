<?php
include('./classes/image_class.php');
$obj_image=new Image();
if(@$_POST['Submit']){
 $obj_image->faculty_id=str_replace("'","''",$_POST['faculty_id']);
 $obj_image->faculty_name=str_replace("'","''",$_POST['faculty_name']);
 $obj_image->degree=str_replace("'","''",$_POST['degree']);
 $obj_image->interest=str_replace("'","''",$_POST['interest']);
 $obj_image->contact=str_replace("'","''",$_POST['contact']);
 $obj_image->link_addr=str_replace("'","''",$_POST['link_addr']);
    
    $obj_image->image=str_replace("","",$_POST['txt_image']);
    $obj_image->insert_into_image();
    
    
}

?>


<html>
    <head></head>
    
    
    <body>
    
        <center>Faculty Details</center>
    
        <center>
        
            <form method="post" enctype="multipart/form-data">
            <table border="1" width="80%">
                
                <tr><td>Faculty ID:</td>
                    <td><input type="text" name="faculty_id"></td>
                </tr>
                <tr><td>Faculty Name:</td>
                    <td><input type="text" name="faculty_name"></td>
                </tr>
                <tr><td>Degree</td>
                    <td><input type="text" name="degree"></td>
                </tr>
                <tr><td>Interest:</td>
                    <td><input type="text" name="interest"></td>
                </tr>
                <tr><td>Contact:</td>
                    <td><input type="text" name="contact"></td>
                </tr>
                <tr><td>Link:</td>
                    <td><input type="text" name="link_addr"></td>
                </tr>
            
                <tr><td>Upload image</td>
                    <td><input type="file" name="txt_image"></td>
                </tr>
                  <tr><td></td>
                      <td><input type="submit" name="Submit" value="Save"></td></tr>
            </form>
        
        
        
        </center>
            
            <p><a href="faculty_delete_form.php">Delete faculty details</p>
    </body>
</html>