<?php
    session_start();
    require_once('../db_connect.php');

    $service_title = htmlspecialchars(trim($_POST['service_title']));
    $service_icon = htmlspecialchars(trim($_POST['service_icon']));
    $service_description = htmlspecialchars(trim($_POST['service_description']));
    $service_status = htmlspecialchars(trim($_POST['service_status']));

    $flag = false;

    if($service_title){
        $_SESSION['old_service_title'] = $service_title;
    }else{
        $_SESSION['service_title_error'] = "Enter Your Service Title";
        $flag = true;
    }

    if($service_icon){
        $_SESSION['old_service_icon'] = $service_icon;
    }else{
        $_SESSION['service_icon_error'] = "Enter Your Service Icon";
        $flag = true;
    }

    if($service_description){
        $_SESSION['old_service_description'] = $service_description;
    }else{
        $_SESSION['service_description_error'] = "Enter Your Service Desription";
        $flag = true;
    }

    if($service_status){
        $_SESSION['old_service_status'] = $service_status;
    }else{
        $_SESSION['service_status_error'] = "Enter Your Service Status";
        $flag = true;
    }

    if ($flag) {
        header('location: service_add.php');
    }else{
        $service_add_query = "INSERT INTO `service`(`service_title`, `service_icon`, `service_description`, `service_status`) VALUES ('$service_title','$service_icon','$service_description','$service_status')";
        $service_add_query_db = mysqli_query($db_connect, $service_add_query);
        $_SESSION['service_add'] = "Service Add Successfully";
        header('location: service_add.php');
    }
?>