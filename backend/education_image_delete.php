<?php
    session_start();
    require_once('../db_connect.php');

    $id = $_GET['id'];
    $education_image_query = "SELECT * FROM `educations` WHERE id = $id";
    $education_image_query_db = mysqli_query($db_connect, $education_image_query);
    $education_image_name = mysqli_fetch_assoc($education_image_query_db)['education_image'];
    $file_path = "uploads/education_image/". $education_image_name;
    unlink($file_path);
    $education_image_delete_query = "DELETE FROM `educations` WHERE id = $id";
    $education_image_delete_query_db = mysqli_query($db_connect, $education_image_delete_query);
    $_SESSION['education_delete'] = "Education Delete Successfully";
    header('location: education_image_list.php');
?>