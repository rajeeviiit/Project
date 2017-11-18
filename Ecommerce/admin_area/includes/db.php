<?php
/**
 * Created by PhpStorm.
 * User: ARIHANT
 * Date: 04-11-2016
 * Time: 10:37
 */
$con=mysqli_connect("localhost","root","","ecommerce");
if (mysqli_connect_errno()){
    echo "failed to connect to MySQL:".mysqli_connect_errno();
}