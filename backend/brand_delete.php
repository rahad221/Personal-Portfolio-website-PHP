<?php
    session_start();
    require_once('../db_connect.php');
    $id = $_GET['id'];
    $brand_image_query_name = "SELECT `brand_image` FROM `brand` WHERE id=$id";
    $brand_image_query_name_db = mysqli_query($db_connect, $brand_image_query_name);
    $brand_image_name = mysqli_fetch_assoc($brand_image_query_name_db)['brand_image'];
    $filepath = "./uploads/brand_image/$brand_image_name";
    unlink($filepath);
    $brand_delete_query = "DELETE FROM `brand` WHERE id=$id";
    $brand_delete_query_db = mysqli_query($db_connect, $brand_delete_query);
    $_SESSION['delete_done'] = "Brand Delete Successfully";
    header('location: brand_list.php');
?>