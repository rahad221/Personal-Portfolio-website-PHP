<?php
    session_start();
    require_once('../../db_connect.php');

    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));

    $encoded_password = sha1($password);
    $auth_check_query = "SELECT COUNT(*) AS 'auth' FROM `admins` WHERE email='$email' AND password='$encoded_password'";
    $auth_check_query_db = mysqli_query($db_connect, $auth_check_query);
    $auth_name_query = "SELECT id, name FROM `admins` WHERE email = '$email' AND password = '$encoded_password'";
    $auth_name_query_db = mysqli_query($db_connect, $auth_name_query);
    $auth_info = mysqli_fetch_assoc($auth_name_query_db);

    if(mysqli_fetch_assoc($auth_check_query_db)['auth'] == 1){
        $_SESSION['auth_id'] = $auth_info['id'];
        $_SESSION['auth_name'] = $auth_info['name'];
        $_SESSION['auth_email'] = $email;
        header('location: ../dashboard.php');
    }else{
        $_SESSION['auth_error'] = "You Are not in Register. Please Sing Up?";
        header('location: login.php');
    }
?>