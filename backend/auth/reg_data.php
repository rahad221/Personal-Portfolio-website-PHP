<?php
    session_start();
    require_once('../../db_connect.php');

    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));
    $comfirm_password = htmlspecialchars(trim($_POST['comfirm_password']));
    $email_check_query = "SELECT COUNT(*) AS 'E-mail_Found' FROM `admins` WHERE email='$email'";
    
    $flag = false;

    if($name){
        $remove_space = str_replace(" ", "", $name);
        if(ctype_alpha($remove_space)){
            $_SESSION['old_name'] = $name;
        }else{
            $_SESSION['name_error'] = "Enter Your Wrong Type Name";
            $flag = true;
        }
    }else{
        $_SESSION['name_error'] = "Enter Your Name";
        $flag = true;
    }

    if($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $email_check_query = "SELECT COUNT(*) AS 'E-mail_Found' FROM `admins` WHERE email='$email'";
            $email_check_query_db = mysqli_query($db_connect, $email_check_query);
            if(mysqli_fetch_assoc($email_check_query_db)['E-mail_Found'] == 1){
                $_SESSION['email_error'] = "Your E-mail Already Exit. Please Try Agine Another E-mail";
                $flag = true;
            }else{
                $_SESSION['old_email'] = $email;
            }
        }else{
            $_SESSION['email_error'] = "Enter Your Wrong Type E-mail";
            $flag = true;
        }
    }else{
        $_SESSION['email_error'] = "Enter Your E-mail";
        $flag = true;
    }

    if($password){
        if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password)){
            $_SESSION['password_error'] = "Enter Your Wrong Type Password";
            $flag = true;
        }
    }else{
        $_SESSION['password_error'] = "Enter Your Password";
        $flag = true;
    }

    if($comfirm_password){
        if(!$password == $comfirm_password){
            $_SESSION['comfirm_password_error'] = "Enter Your Wrong Type Confirm Password";
            $flag = true;
        }
    }else{
        $_SESSION['comfirm_password_error'] = "Enter Your Confirm Password";
        $flag = true;
    }

    if($flag){
        header('location: reg.php');
    }else{
        $hash_password = sha1($password);
        $user_insert_query = "INSERT INTO `admins`( `name`, `email`, `password`) VALUES ('$name','$email','$hash_password')";
        $user_insert_query_db = mysqli_query($db_connect, $user_insert_query);
        $_SESSION['user_register'] = "Hi! $name. Your Registation Successfully.";
        header('location: login.php');
    }
?>