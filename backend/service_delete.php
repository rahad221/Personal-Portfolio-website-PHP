<?php
    session_start();
    require_once('../db_connect.php');
    $id = $_GET['id'];
    $service_delete_query = "DELETE FROM `service` WHERE id = '$id'";
    $service_delete_query_db = mysqli_query($db_connect, $service_delete_query);
    $_SESSION['delete_done'] = "Service Delete Successfully";
    header('location: service_list.php');
?>