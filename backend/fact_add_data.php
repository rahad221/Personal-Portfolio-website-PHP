<?php
    session_start();
    require_once('../db_connect.php');

    $feature_icon = htmlspecialchars(trim($_POST['feature_icon']));
    $feature_icon_value = htmlspecialchars(trim($_POST['feature_icon_value']));
    $fact_status = htmlspecialchars(trim($_POST['fact_status']));
    $feature_text = htmlspecialchars(trim($_POST['feature_text']));

    $flag = false;

    if($feature_icon){
        header('location: fact_add.php');
    }else{
        $_SESSION['feature_icon_error'] = "Enter Your Feature Icon";
        $flag = true;
    }
    if($feature_icon_value){
        header('location: fact_add.php');
    }else{
        $_SESSION['feature_icon_value_error'] = "Enter Your Feature Value";
        $flag = true;
    }
    if($feature_text){
        header('location: fact_add.php');
    }else{
        $_SESSION['feature_text_error'] = "Enter Your Feature Text";
        header('location: fact_add.php');
    }

    if($flag){
        header('location: fact_add.php');
    }else{
        $fact_insert_query = "INSERT INTO `fact`(`feature_icon`, `feature_value`, `fact_status`, `feature_text`) VALUES ('$feature_icon','$feature_icon_value','$fact_status', '$feature_text')";
        $fact_insert_query_db = mysqli_query($db_connect, $fact_insert_query);
        $_SESSION['fact_add'] = "Fact Add Successfully";
        header('location: fact_add.php');
    }
?>