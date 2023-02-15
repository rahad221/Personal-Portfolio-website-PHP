<?php
    session_start();
    require_once('../db_connect.php');

    $id = $_GET['id'];
    $course_delete_query = "DELETE FROM `course` WHERE id = $id";
    $course_delete_query_db = mysqli_query($db_connect, $course_delete_query);
    $_SESSION['delete_done'] = "Course Delete Successfuly";
    header('location: education_list.php');
?>