<?php
    session_start();
    require_once('../db_connect.php');

    $id = $_SESSION['auth_id'];
    $banner_name = htmlspecialchars(trim($_POST['banner_name']));
    $banner_descrtiption = htmlspecialchars(trim($_POST['banner_descrtiption']));
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
    if($_FILES['banner_image']['name'] !== ''){
        $image_name = $_FILES['banner_image']['name'];
        $explode_image_name = explode('.',$image_name);
        $extenstion = end($explode_image_name);
        $new_image_name = $id.'.'.rand(10,50).'-'.time().'-'.rand(50,100).'.'.$extenstion;
        $temp_name = $_FILES['banner_image']['tmp_name'];
        $file_path = "uploads/banner_image/". $new_image_name;
        move_uploaded_file($temp_name, $file_path);
        header('location: banner_add.php');
    }

    if($flag){
        header('location: banner_add.php');
    }else{
        $banner_insert_query = "INSERT INTO `banner`(`banner_name`,`banner_descrtiption`,`banner_image`, `banner_status`) VALUES ('$banner_name','$banner_descrtiption','$new_image_name','$banner_status')";
        $banner_insert_query_db = mysqli_query($db_connect, $banner_insert_query);
        $_SESSION['banner_add'] = "Banner Add Successfully";
        header('location: banner_add.php');
    }
?>