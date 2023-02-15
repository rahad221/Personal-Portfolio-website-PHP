<?php
    session_start();
    require_once('../db_connect.php');

    $feature_icon = htmlspecialchars(trim($_POST['feature_icon']));
    $feature_icon_value = htmlspecialchars(trim($_POST['feature_icon_value']));
    $fact_status = htmlspecialchars(trim($_POST['fact_status']));
    $feature_text = htmlspecialchars(trim($_POST['feature_text']));
    $feature_id = htmlspecialchars(trim($_POST['id']));

    $flag = false;

    if($feature_icon){
        header('location: fact_update.php');
    }else{
        $_SESSION['feature_icon_error'] = "Enter Your Feature Icon";
        $flag = true;
    }
    if($feature_icon_value){
        header('location: fact_update.php');
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
        $fact_insert_query = "UPDATE `fact` SET `feature_icon`='$feature_icon',`feature_value`='$feature_icon_value', `feature_text`='$feature_text',`fact_status`='$fact_status' WHERE id=$feature_id";
        $fact_insert_query_db = mysqli_query($db_connect, $fact_insert_query);
        $_SESSION['update_success'] = "Feature Update Successfully";
        header("location: fact_update.php?id={$feature_id}");
    }
?>