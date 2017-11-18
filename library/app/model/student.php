<?php
require '../database/connect.php';

function view_student($batch,$stream){
    return mysql_query("SELECT * FROM users WHERE batch='$batch' AND stream='$stream'");
}

function delete_student($user_id){
    return mysql_query("DELETE FROM users WHERE user_id = $user_id");
}
function view_student_by_id($user_id)
{
    $student_data = user_data($user_id,'user_id','username','password','first_name','last_name','email','gender','contact_number','profile_pic','address','batch','stream');
    return $student_data;
}
function student_issue_book($user_id){
    return mysql_query("SELECT * FROM books NATURAL JOIN issue_book WHERE user_id = $user_id AND issue_status = 1");
}
function student_history($user_id){
    return mysql_query("SELECT * FROM books NATURAL JOIN return_book WHERE user_id = $user_id");
}
function student_register_book($user_id){
    return mysql_query("SELECT * FROM books NATURAL JOIN register_book WHERE user_id = $user_id AND register_status = 1");
}