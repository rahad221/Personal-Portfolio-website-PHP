<?php
    session_start();
    require_once('../db_connect.php');

    $course_name = htmlspecialchars(trim($_POST['course_name']));
    $course_Year = htmlspecialchars(trim($_POST['course_Year']));
    $course_percent = htmlspecialchars(trim($_POST['course_percent']));
    $course_status = htmlspecialchars(trim($_POST['course_status']));
    $id = $_POST['id'];

    $flag = false;

    if($course_name){
        $remove_space = str_replace(" ", "", $course_name);
        if(ctype_alpha($remove_space)){
            $_SESSION['old_course_name'] = $course_name;
        }else{
            $_SESSION['course_name_error'] = "Enter Your Wrong Type Course Name";
            $flag = true;
        }
    }else{
        $_SESSION['course_name_error'] = "Enter Your Course Name";
        $flag = true;
    }
    if($course_Year){
        header('location: education_update.php');
    }else{
        $_SESSION['course_year_error'] = "Enter Your Course Year";
        $flag = true;
    }
    if($course_percent){
        header('location: education_update.php');
    }else{
        $_SESSION['course_percent_error'] = "Enter Your Course Percent";
        $flag = true;
    }

    if($flag){
        header("location: education_update.php?id={$id}");
    }else{
        $course_update_query = "UPDATE `course` SET `course_name`='$course_name',`course_Year`='$course_Year',`course_percent`='$course_percent',`course_status`='$course_status' WHERE id=$id";
        $course_update_query_db = mysqli_query($db_connect, $course_update_query);
        $_SESSION['education_update'] = "Course Update Successfully";
        header("location: education_update.php?id={$id}");
    }
?>