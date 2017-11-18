
        
        <form action="customer_register.php" method="post" enctype="multipart/form-data">
            <table align="center" width="750">
                <tr align="center">
                    <td colspan="8"><h2>Create an Account</h2></td>
                </tr>
                <tr>
                    <td align="right">Customer name</td>
                    <td><input type="text" name="c_name" required/></td>
                </tr>
                <tr>
                    <td align="right">Customer Email</td>
                    <td><input type="text" name="c_email" required/></td>
                </tr>
                <tr>
                    <td align="right">Customer Password</td>
                    <td><input type="password" name="c_pass" required/></td>
                </tr>
                <tr>
                    <td align="right">Customer Image</td>
                    <td><input type="file" name="c_image"></td>
                </tr>
                <tr>
                    <td align="right">Customer country:</td>
                    <td><select name=c_country required>
                        <option>India</option>
                        <option>Nepal</option>
                        <option>US</option>
                        <option>UK</option>
                        <option>England</option>
                        <option>Astria</option>
                        <option>Bhutan</option>
                    </select></td>
                </tr>
                <tr>
                   <td align="right">Customer City:</td>
                   <td><input type="text" name="c_city"required/></td>
                </tr>

                <tr >
                    <td align="right">Customer Contact</td>
                    <td><input type="text" name="c_contact" required/></td>
                </tr>
  
               <tr >
                   <td align="right">Customer Address</td>
                   <td><textarea cols="25" rows="6" name="c_address" required/></textarea></td>
               </tr>
               <tr align="center">
                   <td colspan="6"><input type="submit" name="register" value="Create An Account"></td>
               </tr>




            </table>
        </form>

   


<?php 
    if (isset($_POST['register'])) {
        $ip=getIp();
        $c_name=$_POST['c_name'];
        $c_email=$_POST['c_email'];
        $c_pass=$_POST['c_pass'];
        $c_image=$_FILES['c_image']['name'];
        $c_image_tmp=$_FILES['c_image']['tmp_name'];
        $c_country=$_POST['c_country'];
        $c_city=$_POST['c_city'];
        $c_contact=$_POST['c_contact'];
        $c_address=$_POST['c_address'];

        move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");

        $insert_c="insert into customers 
        (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_image,customer_address) value('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_image','$c_address')";

        $run_c=mysqli_query($con, $insert_c);
       
        $sel_cart="select * from cart where ip_add='$ip'";
        $run_cart=mysqli_query($con, $sel_cart);

        $check_cart=mysqli_num_rows($run_cart);

        if ($check_cart==0) {
            $_SESSION['customer_email']=$c_email;
            echo "<script>alert('Account has been created successfully, Thanks!')</script>";
             echo "<script>window.open('customer/my_account.php','_self')</script>";

        }else{
             $_SESSION['customer_email']=$c_email;
            echo "<script>alert('Account has been created successfully, Thanks!')</script>";
             echo "<script>window.open('checkout.php','_self')</script>";
        }

        


      
    }


?>