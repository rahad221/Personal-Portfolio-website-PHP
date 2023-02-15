<?php
    session_start();
    require_once('../db_connect.php');

    $education_description = htmlspecialchars(trim($_POST['education_description']));
    $education_status = htmlspecialchars(trim($_POST['education_status']));
    $education_image = $_FILES['education_image'];
    $id = $_POST['id'];

    $flag = false;

    if($education_description){
        header("location: education_image_add.php");
    }else{
        $_SESSION['education_description_error'] = "Enter Your Education Descrioption";
        header("location: education_image_update.php");
    }
    if($_FILES['education_image']['name'] !== ''){
        $education_image_query = "SELECT * FROM `educations` WHERE id = $id";
        $education_image_query_db = mysqli_query($db_connect, $education_image_query);
        $education_image_name = mysqli_fetch_assoc($education_image_query_db)['education_image'];
        $file_path = "uploads/education_image/". $education_image_name;
        unlink($file_path);
        $education_image_name = $_FILES['education_image']['name'];
        $explode_image_name = explode('.', $education_image_name);
        $extenstion = end($explode_image_name);
        $new_education_image_name = time().'.'.$extenstion;
        $tamp_name = $_FILES['education_image']['tmp_name'];
        $file_path = "uploads/education_image/". $new_education_image_name;
        move_uploaded_file($tamp_name, $file_path);
        $education_image_update_query = "UPDATE `educations` SET `education_image`='$new_education_image_name',`education_description`='$education_description',`education_status`='$education_status' WHERE id = $id";
        $education_image_update_query_db = mysqli_query($db_connect, $education_image_update_query);
        header("location: education_image_update.php?id={$id}");
    }else{
        $education_image_update_query = "UPDATE `educations` SET `education_description`='$education_description',`education_status`='$education_status' WHERE id = $id";
        $education_image_update_query_db = mysqli_query($db_connect, $education_image_update_query);
        $_SESSION['education_update'] = "Education Update Successfully";
        header("location: education_image_update.php?id={$id}");
    }

    if($flag){
        header("location: education_image_update.php?id={$id}");
    }
?>