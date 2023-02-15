<?php
    session_start();
    require_once('../db_connect.php');

    $id = $_SESSION['auth_id'];    
    $portfolio_title = htmlspecialchars(trim($_POST['portfolio_title']));
    $portfolio_header = htmlspecialchars(trim($_POST['portfolio_header']));
    $portfolio_description = htmlspecialchars(trim($_POST['portfolio_description']));
    $portfolio_status = htmlspecialchars(trim($_POST['portfolio_status']));
    //$portfolio_image = $_FILES['portfolio_image'];

    $flag = false;

    if($portfolio_title){
        header('location: portfolio_add.php');
    }else{
        $_SESSION['portfolio_title_error'] = "Enter Your Portfolio Title";
        $flag = true;
    }
    if($portfolio_header){
        header('location: portfolio_add.php');
    }else{
        $_SESSION['portfolio_header_error'] = "Enter Your Portfolio Header";
        $flag = true;
    }
    if($portfolio_description){
        header('location: portfolio_add.php');
    }else{
        $_SESSION['portfolio_description_error'] = "Enter Your Portfolio Description";
        $flag = true;
    }

    if($_FILES['portfolio_image']['name'] !== ''){
        $image_name = $_FILES['portfolio_image']['name'];
        $explode_image_name = explode('.', $image_name);
        $extenstion = end($explode_image_name);
        $new_image_name = $id.'-'.rand(10,50).'-'.time().'-'.rand(50,100).'.'.$extenstion;
        $tmp_name = $_FILES['portfolio_image']['tmp_name'];
        $file_path = "uploads/portfolio_image/". $new_image_name;
        move_uploaded_file($tmp_name,$file_path);
        header('location: portfolio_add.php');        
    }

    if($flag){
        header('location: portfolio_add.php');
    }else{
        $portfolio_insert_query = "INSERT INTO `portfolio`(`portfolio_title`, `portfolio_header`, `portfolio_description`, `portfolio_image`, `portfolio_status`) VALUES ('$portfolio_title','$portfolio_header','$portfolio_description','$new_image_name','$portfolio_status')";
        $portfolio_insert_query_db = mysqli_query($db_connect ,$portfolio_insert_query);
        $_SESSION['portfolio_add'] = "Portfolio Add Successfully";
        header('location: portfolio_add.php');
    }
?>