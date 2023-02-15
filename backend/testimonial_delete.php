<?php
    session_start();
    require_once('../db_connect.php');
    $id = $_GET['id'];
    $testimonial_image_query_name = "SELECT `t_image` FROM `testimonial` WHERE id=$id";
    $testimonial_image_query_name_db = mysqli_query($db_connect, $testimonial_image_query_name);
    $testimonial_image_name = mysqli_fetch_assoc($testimonial_image_query_name_db)['t_image'];
    $filepath = "./uploads/testimonial_image/$testimonial_image_name";
    unlink($filepath);
    $testimonial_delete_query = "DELETE FROM `testimonial` WHERE id=$id";
    $testimonial_delete_query_db = mysqli_query($db_connect, $testimonial_delete_query);
    $_SESSION['delete_done'] = "Testimonial Delete Successfully";
    header('location: testimonial_list.php');
?>