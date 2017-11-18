<?php
session_start();
error_reporting(0);

require "model/auth.php";
require "model/book.php";
require "model/student.php";
require "model/admin_auth.php";

if (logged_in() === true) {
    $session_user_id = $_SESSION['user_id'];
    $user_data = user_data($session_user_id,'user_id','username','password','first_name','last_name','email','gender','contact_number','profile_pic','address','batch','stream');
}