<?php
    session_start();
    require_once('../db_connect.php');

    $id = $_SESSION['auth_id'];
    $testimonial_heading = htmlspecialchars(trim($_POST['testimonial_heading']));
    $testimonial_description = htmlspecialchars(trim($_POST['testimonial_description']));
    $testimonial_name = htmlspecialchars(trim($_POST['testimonial_name']));
    $testimonial_title = htmlspecialchars(trim($_POST['testimonial_title']));
    $testimonial_status = htmlspecialchars(trim($_POST['testimonial_status']));

    $flag = false;

    if($testimonial_heading){
        header('location: testimonial_add.php');
    }else{
        $_SESSION['testimonial_heading_error'] = "Enter Your Testimonial Heading";
        $flag = true;
    }
    if($testimonial_description){
        header('location: testimonial_add.php');
    }else{
        $_SESSION['testimonial_description_error'] = "Enter Your Testimonial Description";
        $flag = true;
    }
    if($testimonial_name){
        header('location: testimonial_add.php');
    }else{
        $_SESSION['testimonial_name_error']  = "Enter Your Testimonial Name";
        $flag = true;
    }
    if($testimonial_title){
        header('location: testimonial_add.php');
    }else{
        $_SESSION['testimonial_title_error'] = "Enter Your Testimonial Title";
        $flag = true;
    }
    if($_FILES['testimonial_image']['name'] !== ''){
        $image_name = $_FILES['testimonial_image']['name'];
        $explode_image_name = explode('.', $image_name);
        $extenstion = end($explode_image_name);
        $new_image_name = $id.'-'.rand(10,50).'-'.time().'-'.rand(50,100).'.'.$extenstion;
        $tmp_name = $_FILES['testimonial_image']['tmp_name'];
        $file_path = "uploads/testimonial_image/". $new_image_name;
        move_uploaded_file($tmp_name,$file_path);
        header('location: portfolio_add.php');        
    }

    if($flag){
        header('location: testimonial_add.php');
    }else{
        $testimonial_insert_query = "INSERT INTO `testimonial`(`t_head`, `t_image`, `t_decs`, `t_name`, `t_title`, `t_status`) VALUES ('$testimonial_heading','$new_image_name','$testimonial_description','$testimonial_name','$testimonial_title','$testimonial_status')";
        $testimonial_insert_query_db = mysqli_query($db_connect, $testimonial_insert_query);
        $_SESSION['testimonial_add'] = "Testimonial Add Successfully";
        header('location: testimonial_add.php');
    }
?>