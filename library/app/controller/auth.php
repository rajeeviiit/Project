<?php
require "../init.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $username = filter_var($username, FILTER_SANITIZE_STRING);
    $password = filter_var($password, FILTER_SANITIZE_STRING);

    if (empty($username) === true || empty($password) === true) {
        //$errors[] = 'Please enter username and password';
        header('Location: ../view/login.php?errors=Please enter username and password');
    }
    if (user_exists($username) === false) {
        //$errors[] = 'Invailed username';
        header('Location: ../view/login.php?errors=Invailed username');
    } else {

        $login = login($username, $password);
        if ($login == false) {
            //$errors[] = 'username and password is incorrect';
            header('Location: ../view/login.php?errors=username and password is incorrect');
        } else {
            $_SESSION['user_id'] = $login;
            header('Location: ../view/index.php');
        }
    }
}
if (isset($_POST['change_password'])) {
    if (md5($_POST['current_password']) === $user_data['password']) {
        if (trim($_POST['new_password']) !== trim($_POST['new_password_again'])) {
            header('Location: ../view/change_password.php?errors=your possword don\'t match');
        } else if (strlen($_POST['new_password']) < 6) {
            header('Location: ../view/change_password.php?errors=please enter min 6 char pass');
        } else {
            change_password($user_data['user_id'], $_POST['new_password']);
            header('Location: ../view/change_password.php?success');
        }
    } else {
        header('Location: ../view/change_password.php?errors=Enter Right Password');
    }
}
if (isset($_POST['forgot_password'])) {
    if (isset($_POST['email']) === true && empty($_POST['email']) === false) {
        if (email_exists($_POST['email']) === true) {
            recover_password($_POST['email']);
            header('Location: ../view/forgot_password.php?success');
            exit();
        } else {
            header('Location: ../view/forgot_password.php?errors=Email Address not Found');
        }
    }
}

if (isset($_POST['reset_password'])) {
    if (trim($_POST['new_password']) !== trim($_POST['new_password_again'])) {
        header('Location: ../view/reset_password.php?errors=your possword don\'t match');
    } else if (strlen($_POST['new_password']) < 6) {
        header('Location: ../view/reset_password.php?errors=please enter min 6 char pass');
    } else {
        if (isset($_GET['email'], $_GET['generate_password']) === true) {
            $email = trim($_GET['email']);
            $generate_password = trim($_GET['generate_password']);
            $user_id = user_id_from_email($email);
            $user_data = user_data($user_id, 'username');
            change_password($user_id, $generate_password);
            $login = login($user_data['username'], $generate_password);
            if ($login == true) {
                if (empty($_POST) === false) {
                    change_password($user_id, $_POST['new_password']);
                    header('Location: ../view/reset_password.php?success');
                }
                ?>
            <?php }
        } else {
            header('Location: index.php');
            exit();
        }
        header('Location: ../view/reset_password.php?success');
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
    header('Location: ../view/edit_profile.php');

}
?>