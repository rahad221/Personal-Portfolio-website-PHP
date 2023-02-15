<?php
    session_start();
    require_once('../db_connect.php');
    $id = $_GET['id'];
    $banner_image_query_name = "SELECT `banner_image` FROM `banner` WHERE id=$id";
    $banner_image_query_name_db = mysqli_query($db_connect, $banner_image_query_name);
    $banner_image_name = mysqli_fetch_assoc($banner_image_query_name_db)['banner_image'];
    $filepath = "./uploads/banner_image/$banner_image_name";
    unlink($filepath);
    $banner_delete_query = "DELETE FROM `banner` WHERE id=$id";
    $banner_delete_query_db = mysqli_query($db_connect, $banner_delete_query);
    $_SESSION['delete_done'] = "banner Delete Successfully";
    header('location: banner_list.php');
?>