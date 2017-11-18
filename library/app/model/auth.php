<?php
include '../database/connect.php';
function db_insert($array, $tbname)
{
    $array_keys = array_keys($array);
    $array_keys = implode("`,`", $array_keys);
    $array_keys = "`" . $array_keys . "`";
    $array_values = implode("','", $array);
    $array_values = "'" . $array_values . "'";
    return mysql_query("INSERT INTO $tbname ($array_keys) VALUES ($array_values)");
}

function db_select($select, $tbname, $filter = "")
{
    return mysqli_result(mysql_query("SELECT $select FROM $tbname $filter"),1);
}

function user_exists($username)
{
    $username = strip_tags($username);
    return (mysql_result(mysql_query("SELECT COUNT('user_id') FROM users WHERE username = '$username'"), 0) == 1) ? true : false;
}

function user_id_from_username($username)
{
    $username = strip_tags($username);
    return (mysql_result(mysql_query("SELECT user_id FROM users WHERE username = '$username'"), 0, 'user_id'));
}

function user_id_from_email($email)
{
    $email = strip_tags($email);
    return (mysql_result(mysql_query("SELECT user_id FROM users WHERE email = '$email'  "), 0, 'user_id'));
}

function check($tbname, $username, $password)
{
    $user_id = user_id_from_username($username);
    $password = md5($password);
    return (mysql_result(mysql_query("SELECT count('user_id') FROM $tbname WHERE username = '$username' AND password = '$password'"), 0) == 1) ? $user_id : false;

}

function login($username, $password)
{
    $result = check('users', $username, $password);
    return $result;
}

function logged_in()
{
    return (isset($_SESSION['user_id'])) ? true : false;
}

function user_data($user_id)
{
    $data = array();
    $user_id = (int)$user_id;

    $func_num_args = func_num_args();
    $func_get_args = func_get_args();

    if ($func_num_args > 1) {
        unset($func_get_args[0]);
        $fields = '`' . implode('`, `', $func_get_args) . '`';
        //echo "SELECT $fields FROM users WHERE user_id = $user_id";
        $data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM users WHERE user_id = $user_id"));

        return $data;
    }
}

function change_password($user_id, $new_password)
{
    $user_id = (int)$user_id;
    $new_password = md5($new_password);
    mysql_query("UPDATE `users` SET `password` = '$new_password' WHERE `user_id` = $user_id");
}

function email_exists($email)
{
    $email = strip_tags($email);
    return (mysql_result(mysql_query("SELECT COUNT('user_id') FROM users WHERE email = '$email'  "), 0) == 1) ? true : false;
}

function insert_image($user_id, $file_name)
{
    $user_id = (int)$user_id;
    $file_name = trim($file_name);
    mysql_query("UPDATE `users` SET `profile_pic` = '$file_name' WHERE `user_id` = $user_id");
}

function update_profile($user_id, $first_name, $last_name, $email, $contact_number, $address)
{
    $user_id = (int)$user_id;
    mysql_query("UPDATE `users` SET `first_name` = '$first_name',`last_name` = '$last_name',`email` = '$email',`contact_number` = '$contact_number',`address` = '$address'  WHERE `user_id` = $user_id");

}

function recover_password($email)
{
    $email = trim($email);
    $user_id = user_id_from_email($email);
    $username = user_data($user_id, 'username');
    $generate_password = substr(md5(rand(999, 99999)), 0, 8);
    mail($email, 'Reset Password', "Hello " . $username . ",\n Please go to above link to reset password :\n http://library.freeoda.com/app/view/reset_password.php?email=" . $email . "&generate_password=" . $generate_password . "  \n\n  -Library", 'From:premchandsaini779@gmail.com');
}

function protact_page()
{
    if (logged_in() == true) {
        header('Location: index.php');
        exit();
    }
}

function login_redirect()
{
    if (logged_in() == false) {
        header('Location: login.php');
        exit();
    }
}
