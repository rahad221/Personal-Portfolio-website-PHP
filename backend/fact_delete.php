<?php
    session_start();
    require_once('../db_connect.php');
    $id = $_GET['id'];
    $fact_delete_query = "DELETE FROM `fact` WHERE id=$id";
    $fact_delete_query_db = mysqli_query($db_connect, $fact_delete_query);
    $_SESSION['delete_done'] = "Feature Delete Successfully";
    header('location: fact_list.php');
?>