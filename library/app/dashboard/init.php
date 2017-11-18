<?php
session_start();
error_reporting();

require "../model/auth.php";
require "../model/book.php";
require "../model/student.php";
require "../model/admin_auth.php";


if (admin_logged_in() === true) {
    $session_admin_id = $_SESSION['admin_id'];
    $admin_data = admin_data($session_admin_id,'admin_id','username','password','first_name','last_name','email','gender','contact_no','admin_pic','address');
}
