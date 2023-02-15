<?php
    session_start();
    require_once('../db_connect.php');

    $name = htmlspecialchars(trim($_POST['name']));
    $phone_number = htmlspecialchars(trim($_POST['phone_number']));
    $address = htmlspecialchars(trim($_POST['address']));
    $current_password = htmlspecialchars(trim($_POST['current_password']));
    $new_password = htmlspecialchars(trim($_POST['new_password']));
    $confirm_password = htmlspecialchars(trim($_POST['confirm_password']));

    $id = $_SESSION['auth_id'];

    $flag = false;

    if(isset($_POST['update_profile'])){
        if(!$name){
            $flag = true;
        }
        if($_FILES['profile_pic']['name'] !== ''){
            $image_name = $_FILES['profile_pic']['name'];
            $explode_image_name = explode('.', $image_name);
            $extenstion = end($explode_image_name);
            $new_image_name = $id.'.'.$extenstion;
            $tmp_name = $_FILES['profile_pic']['tmp_name'];
            $file_path = "uploads/profile_pic/". $new_image_name;
            move_uploaded_file($tmp_name,$file_path);
            $auth_profile_pic_update_query = "UPDATE `admins` SET `profile_pic`='$new_image_name' WHERE id='$id'";
            $auth_profile_pic_update_query_db = mysqli_query($db_connect, $auth_profile_pic_update_query);
            header('location: profile.php');        
        }
    }

    if(isset($_POST['update_password'])){
        if($current_password){
            $encoded_current_password = sha1($current_password);
            $auth_password_query = "SELECT password FROM `admins` WHERE id = '$id'";
            $auth_password_query_db = mysqli_query($db_connect, $auth_password_query);
            $old_password = mysqli_fetch_assoc($auth_password_query_db)['password'];
            if($encoded_current_password === $old_password){
                if($new_password){
                    if(preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $new_password)){
                        if($confirm_password){
                            if($new_password === $confirm_password){
                                $encoded_password = sha1($confirm_password);
                                $auth_password_update_query = "UPDATE `admins` SET `password`='$encoded_password' WHERE id='$id'";
                                $auth_password_update_query_db = mysqli_query($db_connect, $auth_password_update_query);
                                header('location: profile.php');
                            }else{
                                $flag = true;
                                $_SESSION['confirm_password_error'] = "Enter Your Wrong Type Confirm Password";
                            }
                        }else{
                            $flag = true;
                            $_SESSION['confirm_password_error'] = "Enter Your Confirm Password";
                        }
                    }else{
                        $flag = true;
                        $_SESSION['new_password_error'] = "Enter Your Wrong Type New Password";
                    }
                }else{
                    $flag = true;
                    $_SESSION['new_password_error'] = "Enter Your New Password";
                }
            }else{
                $flag = true;
                $_SESSION['current_password_error'] = "Enter Your Wrong Type Current Password";
            }
        }else{
            $flag = true;
            $_SESSION['current_password_error'] = "Enter Your Current Password";
        }
    }

    if($flag){
        header('location: profile.php');
    }elseif(isset($_POST['update_profile'])){
        $auth_info_update_query = "UPDATE `admins` SET `name`='$name',`phone_Number`='$phone_number',`address`='$address' WHERE id='$id'";
        $auth_info_update_query_db = mysqli_query($db_connect, $auth_info_update_query);
        header('location: profile.php');
    }
?>