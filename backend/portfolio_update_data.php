<?php
    session_start();
    require_once('../db_connect.php');
   
    $portfolio_title = htmlspecialchars(trim($_POST['portfolio_title']));
    $portfolio_header = htmlspecialchars(trim($_POST['portfolio_header']));
    $portfolio_description = htmlspecialchars(trim($_POST['portfolio_description']));
    $portfolio_status = htmlspecialchars(trim($_POST['portfolio_status']));
    $portfolio_id = htmlspecialchars(trim($_POST['id']));
    $portfolio_image = $_FILES['portfolio_image'];

    $flag = false;

    if($portfolio_title){
        header('location: portfolio_update.php');
    }else{
        $_SESSION['portfolio_title_error'] = "Enter Your Portfolio Title";
        $flag = true;
    }
    if($portfolio_header){
        header('location: portfolio_update.php');
    }else{
        $_SESSION['portfolio_header_error'] = "Enter Your Portfolio Header";
        $flag = true;
    }
    if($portfolio_description){
        header('location: portfolio_update.php');
    }else{
        $_SESSION['portfolio_description_error'] = "Enter Your Portfolio Description";
        $flag = true;
    }

    if($portfolio_image['name']){
        $portfolio_image_name_query = "SELECT `portfolio_image` FROM portfolio WHERE id=$portfolio_id";
        $portfolio_image_name_query_db = mysqli_query($db_connect, $portfolio_image_name_query);
        $portfolio_image_name = mysqli_fetch_assoc($portfolio_image_name_query_db)['portfolio_image'];
        $filepath = "./uploads/portfolio_image/$portfolio_image_name";
        unlink($filepath);
        $image_name = $_FILES['portfolio_image']['name'];
        $explode_image_name = explode('.', $image_name);
        $extenstion = end($explode_image_name);
        $new_image_name = $id.'-'.rand(10,50).'-'.time().'-'.rand(50,100).'.'.$extenstion;
        $tmp_name = $_FILES['portfolio_image']['tmp_name'];
        $file_path = "uploads/portfolio_image/". $new_image_name;
        move_uploaded_file($tmp_name,$file_path);
        $portfolio_insert_query = "UPDATE `portfolio` SET `portfolio_title`='$portfolio_title',`portfolio_header`='$portfolio_header',`portfolio_description`='$portfolio_description',`portfolio_image`='$new_image_name',`portfolio_status`='$portfolio_status' WHERE id=$portfolio_id";
        $portfolio_insert_query_db = mysqli_query($db_connect ,$portfolio_insert_query);
        $_SESSION['portfolio_add'] = "Portfolio Update Successfully";
        header("location: portfolio_update.php?id={$portfolio_id}");     
    }else{
        $portfolio_insert_query = "UPDATE `portfolio` SET `portfolio_title`='$portfolio_title',`portfolio_header`='$portfolio_header',`portfolio_description`='$portfolio_description',`portfolio_status`='$portfolio_status' WHERE id=$portfolio_id";
        $portfolio_insert_query_db = mysqli_query($db_connect ,$portfolio_insert_query);
        $_SESSION['portfolio_add'] = "Portfolio Update Successfully";
        header("location: portfolio_update.php?id={$portfolio_id}");
    }

    if($flag){
        header("location: portfolio_update.php?id={$portfolio_id}");
    }
?> 