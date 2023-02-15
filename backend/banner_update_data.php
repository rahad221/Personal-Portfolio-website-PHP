<?php
    session_start();
    require_once('../db_connect.php');

    $id = $_SESSION['auth_id'];
    $banner_id = htmlspecialchars(trim($_POST['id']));
    $banner_name = htmlspecialchars(trim($_POST['banner_name']));
    $banner_descrtiption = htmlspecialchars(trim($_POST['banner_descrtiption']));
    $banner_image = $_FILES['banner_image'];
    $banner_status = htmlspecialchars(trim($_POST['banner_status']));
    
    $flag = false;

    if($banner_name){
        $remove_space = str_replace(" ", "",$banner_name);
        if(ctype_alpha($remove_space)){
            $_SESSION['old_banner_name'] = $banner_name;
        }else{
            $_SESSION['banner_name_error'] = "Enter Your Wrong Type Banner Name";
            $flag = true;
        }
    }else{
        $_SESSION['banner_name_error'] = "Enter Your Banner Name";
        $flag = true;
    }
    if($banner_descrtiption){
        $_SESSION['old_description'] = $banner_descrtiption;
    }else{
        $_SESSION['banner_descrtiption_error'] = "Enter Your Banner Description";
        $flag = true;
    }
    if($banner_image['name']){
        $banner_image_query_name = "SELECT `banner_image` FROM `banner` WHERE id=$banner_id";
        $banner_image_query_name_db = mysqli_query($db_connect, $banner_image_query_name);
        $banner_image_name = mysqli_fetch_assoc($banner_image_query_name_db)['banner_image'];
        $filepath = "./uploads/banner_image/$banner_image_name";
        unlink($filepath);
        $image_name = $_FILES['banner_image']['name'];
        $explode_image_name = explode('.', $image_name);
        $extenstion = end($explode_image_name);
        $new_image_name = $id.'-'.rand(10,50).'-'.time().'-'.rand(50,100).'.'.$extenstion;
        $tmp_name = $_FILES['banner_image']['tmp_name'];
        $file_path = "uploads/banner_image/". $new_image_name;
        move_uploaded_file($tmp_name,$file_path);
        $banner_update_query = "UPDATE `banner` SET `banner_name`='$banner_name',`banner_descrtiption`='$banner_descrtiption',`banner_image`='$new_image_name',`banner_status`='$banner_status' WHERE id=$banner_id";
        $banner_update_query_db = mysqli_query($db_connect, $banner_update_query);
        $_SESSION['banner_update'] = "banner Update Successfully";
        header("location: banner_update.php?id={$banner_id}");        
    }else{
        $banner_update_query = "UPDATE `banner` SET `banner_name`='$banner_name',`banner_descrtiption`='$banner_descrtiption',`banner_status`='$banner_status' WHERE id=$banner_id";
        $banner_update_query_db = mysqli_query($db_connect, $banner_update_query);
        $_SESSION['banner_update'] = "Banner Update Successfully";
        header("location: banner_update.php?id={$banner_id}");
    }

    if($flag){
        header('location: banner_update.php');
    }