<?php
include '../database/connect.php';

if (admin_logged_in() === true) {
    $session_admin_id = $_SESSION['admin_id'];
    $admin_data = admin_data($session_admin_id,'admin_id','username','password','first_name','last_name','email','gender','contact_no','admin_pic','address');
}
function admin_exists($username)
{
    $username = strip_tags($username);
    return (mysql_result(mysql_query("SELECT COUNT('admin_id') FROM admin WHERE username = '$username'"), 0) == 1) ? true : false;
}

function admin_id_from_username($username)
{
    $username = strip_tags($username);
    return (mysql_result(mysql_query("SELECT admin_id FROM admin WHERE username = '$username'"), 0, 'admin_id'));
}

function admin_id_from_email($email)
{
    $email = strip_tags($email);
    return (mysql_result(mysql_query("SELECT admin_id FROM admin WHERE email = '$email'  "), 0, 'admin_id'));
}

function admin_check($username, $password)
{
    $admin_id = admin_id_from_username($username);
    $password = md5($password);
    return (mysql_result(mysql_query("SELECT count('admin_id') FROM admin WHERE username = '$username' AND password = '$password'"), 0) == 1) ? $admin_id : false;

}

function admin_login($username, $password)
{
    $result = admin_check($username, $password);
    return $result;
}

function admin_logged_in()
{
    return (isset($_SESSION['admin_id'])) ? true : false;
}

function admin_data($admin_id)
{
    $data = array();
    $admin_id = (int)$admin_id;

    $func_num_args = func_num_args();
    $func_get_args = func_get_args();

    if ($func_num_args > 1) {
        unset($func_get_args[0]);
        $fields = '`' . implode('`, `', $func_get_args) . '`';
        $data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM admin WHERE admin_id = $admin_id"));
        //$data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM users WHERE user_id = $user_id"));
        return $data;
    }
}

function admin_change_password($admin_id, $new_password)
{
    $admin_id = (int)$admin_id;
    $new_password = md5($new_password);
    mysql_query("UPDATE `admin` SET `password` = '$new_password' WHERE `user_id` = $admin_id");
}

function admin_email_exists($email)
{
    $email = strip_tags($email);
    return (mysql_result(mysql_query("SELECT COUNT('admin_id') FROM admin WHERE email = '$email'  "), 0) == 1) ? true : false;
}

function admin_insert_image($admin_id, $file_name)
{
    $admin_id = (int)$admin_id;
    $file_name = trim($file_name);
    mysql_query("UPDATE `admin` SET `profile_pic` = '$file_name' WHERE `admin_id` = $admin_id");
}

function update_admin_profile($admin_id, $first_name, $last_name, $email, $contact_number, $address)
{
    $admin_id = (int)$admin_id;
    mysql_query("UPDATE `admin` SET `first_name` = '$first_name',`last_name` = '$last_name',`email` = '$email',`contact_number` = '$contact_number',`address` = '$address'  WHERE `user_id` = $user_id");

}

function recover_admin_password($email)
{
    $email = trim($email);
    $admin_id = admin_id_from_email($email);
    $username = admin_data($admin_id, 'username');
    $generate_password = substr(md5(rand(999, 99999)), 0, 8);
    mail($email, 'Reset Password', "Hello " . $username . ",\n Please go to above link to reset password :\n http://library.freeoda.com/app/view/reset_password.php?email=" . $email . "&generate_password=" . $generate_password . "  \n\n  -Library", 'From:premchandsaini779@gmail.com');
}

function admin_protact_page()
{
    if (admin_logged_in() == true) {
        header('Location: index.php');
        exit();
    }
}

function admin_login_redirect()
{
    if (admin_logged_in() == false) {
        header('Location: login.php');
        exit();
    }
}
