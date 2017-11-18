<?php
require "../init.php";


if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $username = filter_var($username, FILTER_SANITIZE_STRING);
    $password = filter_var($password, FILTER_SANITIZE_STRING);

    if (empty($username) === true || empty($password) === true) {
        //$errors[] = 'Please enter username and password';
        header('Location: ../dashboard/login.php?errors=Please enter username and password');
    }
    if (admin_exists($username) === false) {
        //$errors[] = 'Invailed username';
        header('Location: ../dashboard/login.php?errors=Invailed username');
    } else {

        $admin_login = admin_login($username, $password);
        if ($admin_login == false) {
            //$errors[] = 'username and password is incorrect';
            header('Location: ../dashboard/login.php?errors=username and password is incorrect');
        } else {
            $_SESSION['admin_id'] = $admin_login;
            header('Location: ../dashboard');
        }
    }
}

if (isset($_POST['change_password'])) {
    if (md5($_POST['current_password']) === $admin_data['password']) {
        if (trim($_POST['new_password']) !== trim($_POST['new_password_again'])) {
            header('Location: ../dashboard/change_password.php?errors=your possword don\'t match');
        } else if (strlen($_POST['new_password']) < 6) {
            header('Location: ../dashboard/change_password.php?errors=please enter min 6 char pass');
        } else {
            admin_change_password($admin_data['admin_id'], $_POST['new_password']);
            header('Location: ../dashboard/index.php?password_success');
        }
    } else {
        header('Location: ../dashboard/change_password.php?errors=Enter Right Password');
    }
}
if (isset($_POST['forgot_password'])) {
    if (isset($_POST['email']) === true && empty($_POST['email']) === false) {
        if (admin_email_exists($_POST['email']) === true) {
            admin_recover_password($_POST['email']);
            header('Location: ../dashboard/forgot_password.php?success');
            exit();
        } else {
            header('Location: ../dashboard/forgot_password.php?errors=Email Address not Found');
        }
    }
}

if (isset($_POST['reset_password'])) {
    if (trim($_POST['new_password']) !== trim($_POST['new_password_again'])) {
        header('Location: ../dashboard/reset_password.php?errors=your possword don\'t match');
    } else if (strlen($_POST['new_password']) < 6) {
        header('Location: ../dashboard/reset_password.php?errors=please enter min 6 char pass');
    } else {
        if (isset($_GET['email'], $_GET['generate_password']) === true) {
            $email = trim($_GET['email']);
            $generate_password = trim($_GET['generate_password']);
            $user_id = user_id_from_email($email);
            $user_data = user_data($user_id, 'username');
            change_password($user_id, $generate_password);
            $login = admin_login($admin_data['username'], $generate_password);
            if ($login == true) {
                if (empty($_POST) === false) {
                    change_password($user_id, $_POST['new_password']);
                    header('Location: ../dashboard/reset_password.php?success');
                }
                ?>
            <?php }
        } else {
            header('Location: index.php');
            exit();
        }
        header('Location: ../dashboard/reset_password.php?success');
    }
}
if (isset($_POST['update_profile'])) {
    $user_id = $_SESSION['user_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $contact_number = $_POST['contact_number'];
    $address = $_POST['address'];

    update_profile($user_id, $first_name, $last_name, $email, $contact_number, $address);
    header('Location: ../dashboard/edit_profile.php');

}
?>