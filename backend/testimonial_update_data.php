<?php
    session_start();
    require_once('../db_connect.php');

    $id = $_SESSION['auth_id'];
    $testimonial_heading = htmlspecialchars(trim($_POST['testimonial_heading']));
    $testimonial_description = htmlspecialchars(trim($_POST['testimonial_description']));
    $testimonial_name = htmlspecialchars(trim($_POST['testimonial_name']));
    $testimonial_title = htmlspecialchars(trim($_POST['testimonial_title']));
    $testimonial_status = htmlspecialchars(trim($_POST['testimonial_status']));
    $testimonial_image = $_FILES['testimonial_image'];
    $testimonial_id = htmlspecialchars(trim($_POST['id']));

    $flag = false;

    if($testimonial_heading){
        header('location: testimonial_update.php');
    }else{
        $_SESSION['testimonial_heading_error'] = "Enter Your Testimonial Heading";
        $flag = true;
    }
    if($testimonial_description){
        header('location: testimonial_update.php');
    }else{
        $_SESSION['testimonial_description_error'] = "Enter Your Testimonial Description";
        $flag = true;
    }
    if($testimonial_name){
        header('location: testimonial_update.php');
    }else{
        $_SESSION['testimonial_name_error']  = "Enter Your Testimonial Name";
        $flag = true;
    }
    if($testimonial_title){
        header('location: testimonial_update.php');
    }else{
        $_SESSION['testimonial_title_error'] = "Enter Your Testimonial Title";
        $flag = true;
    }
    if($testimonial_image['name']){
        $testimonial_image_query_name = "SELECT `t_image` FROM `testimonial` WHERE id=$testimonial_id";
        $testimonial_image_query_name_db = mysqli_query($db_connect, $testimonial_image_query_name);
        $testimonial_image_name = mysqli_fetch_assoc($testimonial_image_query_name_db)['t_image'];
        $filepath = "./uploads/testimonial_image/$testimonial_image_name";
        unlink($filepath);
        $image_name = $_FILES['testimonial_image']['name'];
        $explode_image_name = explode('.', $image_name);
        $extenstion = end($explode_image_name);
        $new_image_name = $id.'-'.rand(10,50).'-'.time().'-'.rand(50,100).'.'.$extenstion;
        $tmp_name = $_FILES['testimonial_image']['tmp_name'];
        $file_path = "uploads/testimonial_image/". $new_image_name;
        move_uploaded_file($tmp_name,$file_path);
        $testimonial_update_query = "UPDATE `testimonial` SET `t_head`='$testimonial_heading',`t_image`='$new_image_name',`t_decs`='$testimonial_description',`t_name`='$testimonial_name',`t_title`='$testimonial_title',`t_status`='$testimonial_status' WHERE id=$testimonial_id";
        $testimonial_update_query_db = mysqli_query($db_connect, $testimonial_update_query);
        $_SESSION['testimonial_add'] = "Testimonial Update Successfully";
        header("location: testimonial_update.php?id={$testimonial_id}");        
    }else{
        $testimonial_update_query = "UPDATE `testimonial` SET `t_head`='$testimonial_heading',`t_decs`='$testimonial_description',`t_name`='$testimonial_name',`t_title`='$testimonial_title',`t_status`='$testimonial_status' WHERE id=$testimonial_id";
        $testimonial_update_query_db = mysqli_query($db_connect, $testimonial_update_query);
        $_SESSION['testimonial_add'] = "Testimonial Update Successfully";
        header("location: testimonial_update.php?id={$testimonial_id}");
    }

    if($flag){
        header("location: testimonial_update.php?id={$testimonial_id}");
    }
?>