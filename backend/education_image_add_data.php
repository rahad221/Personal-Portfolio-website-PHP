<?php
    session_start();
    require_once('../db_connect.php');

    $education_description = htmlspecialchars(trim($_POST['education_description']));
    $education_status = htmlspecialchars(trim($_POST['education_status']));

    $flag = false;

    if($education_description){
        header("location: education_image_add.php");
    }else{
        $_SESSION['education_description_error'] = "Enter Your Education Descrioption";
        header("location: education_image_add.php");
    }
    if($_FILES['education_image']['name'] !== ''){
        $education_image_name = $_FILES['education_image']['name'];
        $explode_image_name = explode('.', $education_image_name);
        $extenstion = end($explode_image_name);
        $new_education_image_name = time().'.'.$extenstion;
        $tamp_name = $_FILES['education_image']['tmp_name'];
        $file_path = "uploads/education_image/". $new_education_image_name;
        move_uploaded_file($tamp_name, $file_path);
        header("location: education_image_add.php");
    }

    if($flag){
        header("location: education_image_add.php");
    }else{
        $educaton_image_insert_query = "INSERT INTO `educations`(`education_image`, `education_description`, `education_status`) VALUES ('$new_education_image_name','$education_description','$education_status')";
        $educaton_image_insert_query_db = mysqli_query($db_connect, $educaton_image_insert_query);
        $_SESSION['education_add'] = "Education Add Successfully";
        header("location: education_image_add.php");
    }
?>