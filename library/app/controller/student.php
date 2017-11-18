<?php
/**
 * Created by PhpStorm.
 * User: pcsaini779
 * Date: 08-11-2016
 * Time: 07:00 PM
 */
require '../dashboard/init.php';

if (isset($_POST['add_student'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $batch = $_POST['batch'];
    $stream = $_POST['stream'];
    $password = $_POST['password'];
    $password_again = $_POST['password_again'];

    $password = trim($password);
    $password_again = trim($password_again);

    if (user_exists($username)) {
        Header("Location: ../dashboard/add_student.php?errors=username already exists");
        exit();
    } else if (email_exists($email)) {
        Header("Location: ../dashboard/add_student.php?errors=Email already exists");
        exit();
    } else if ($password !== $password_again) {
        header('Location: ../dashboard/add_student.php?errors=Possword don\'t match');
    } else if (strlen($password) < 8) {
        header('Location: ../dashboard/add_student.php?errors=please enter min 6 char password');
    } else {
        $password = md5($password);
        $data = array("username"=>$username, "password"=>$password, "first_name"=>$first_name, "last_name"=>$last_name, "email"=>$email, "gender"=>$gender, "batch"=>$batch, "stream"=>$stream);
        db_insert($data,"users");
        header("Location: ../dashboard/add_student.php?success=successfully add $username");
    }
}

if (isset($_POST['view_student'])) {
    $batch = $_POST['batch'];
    $stream = $_POST['stream'];

    Header("Location: ../dashboard/view_student.php?batch=$batch&stream=$stream");
    exit();
}
            
if (isset($_POST['delete_student'])){
    $user_id = $_GET['user_id'];
    delete_student($user_id);
    header('Location: ../dashboard/view_student.php?success');
}