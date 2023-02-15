<?php
    session_start();
    require_once('../db_connect.php');

    $id = $_SESSION['auth_id'];
    $brand_id = htmlspecialchars(trim($_POST['id']));
    $brand_image = $_FILES['brand_image'];
    $brand_status = htmlspecialchars(trim($_POST['brand_status']));

    if($brand_image['name']){
        $brand_image_query_name = "SELECT `brand_image` FROM `brand` WHERE id=$brand_id";
        $brand_image_query_name_db = mysqli_query($db_connect, $brand_image_query_name);
        $brand_image_name = mysqli_fetch_assoc($brand_image_query_name_db)['brand_image'];
        $filepath = "./uploads/brand_image/$brand_image_name";
        unlink($filepath);
        $image_name = $_FILES['brand_image']['name'];
        $explode_image_name = explode('.', $image_name);
        $extenstion = end($explode_image_name);
        $new_image_name = $id.'-'.rand(10,50).'-'.time().'-'.rand(50,100).'.'.$extenstion;
        $tmp_name = $_FILES['brand_image']['tmp_name'];
        $file_path = "uploads/brand_image/". $new_image_name;
        move_uploaded_file($tmp_name,$file_path);
        $brand_update_query = "UPDATE `brand` SET `brand_image`='$new_image_name',`brand_status`='$brand_status' WHERE id=$brand_id";
        $brand_update_query_db = mysqli_query($db_connect, $brand_update_query);
        $_SESSION['brand_update'] = "Brand Update Successfully";
        header("location: brand_update.php?id={$brand_id}");        
    }else{
        $brand_update_query = "UPDATE `brand` SET `brand_status`='$brand_status' WHERE id=$brand_id";
        $brand_update_query_db = mysqli_query($db_connect, $brand_update_query);
        $_SESSION['brand_update'] = "Brand Update Successfully";
        header("location: brand_update.php?id={$brand_id}");
    }