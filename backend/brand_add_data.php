<?php
    session_start();
    require_once('../db_connect.php');

    $id = $_SESSION['auth_id'];
    $brand_status = htmlspecialchars(trim($_POST['brand_status']));

    $flag = false;

    if($_FILES['brand_image']['name'] !== ''){
        $image_name = $_FILES['brand_image']['name'];
        $explode_image_name = explode('.',$image_name);
        $extenstion = end($explode_image_name);
        $new_image_name = $id.'.'.rand(10,50).'-'.time().'-'.rand(50,100).'.'.$extenstion;
        $temp_name = $_FILES['brand_image']['tmp_name'];
        $file_path = "uploads/brand_image/". $new_image_name;
        move_uploaded_file($temp_name, $file_path);
        header('location: brand_add.php');
    }

    if($flag){
        header('location: brand_add.php');
    }else{
        $brand_insert_query = "INSERT INTO `brand`(`brand_image`, `brand_status`) VALUES ('$new_image_name','$brand_status')";
        $brand_insert_query_db = mysqli_query($db_connect, $brand_insert_query);
        $_SESSION['brand_add'] = "Brand Add Successfully";
        header('location: brand_add.php');
    }
?>