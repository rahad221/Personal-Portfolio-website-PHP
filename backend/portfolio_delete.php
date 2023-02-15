<?php
    session_start();
    require_once('../db_connect.php');
    $id = $_GET['id'];
    $portfolio_image_name_query = "SELECT `portfolio_image` FROM portfolio WHERE id=$id";
    $portfolio_image_name_query_db = mysqli_query($db_connect, $portfolio_image_name_query);
    $portfolio_image_name = mysqli_fetch_assoc($portfolio_image_name_query_db)['portfolio_image'];
    $filepath = "./uploads/portfolio_image/$portfolio_image_name";
    unlink($filepath);
    $portfolio_delete_query = "DELETE FROM `portfolio` WHERE id = '$id'";
    $portfolio_delete_query_db = mysqli_query($db_connect, $portfolio_delete_query);
    $_SESSION['delete_done'] = "Portfolio Delete Successfully";
    header('location: portfolio_list.php');    
?>