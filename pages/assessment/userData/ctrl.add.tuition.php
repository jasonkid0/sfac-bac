<?php
require '../../../includes/conn.php';
session_start();
date_default_timezone_set('Asia/Manila');

if (isset($_POST['submit'])) {

    $tuition_fee = mysqli_real_escape_string($db, $_POST['tuition_fee']);
    $ay_id = mysqli_real_escape_string($db, $_POST['ay_id']);
    $year_id = mysqli_real_escape_string($db, $_POST['year_id']);
    $course_id = mysqli_real_escape_string($db, $_POST['course_id']);

    $updated_by = $_SESSION['name'].' - '. $_SESSION['role'];


    $check_tuition = mysqli_query($db,"SELECT * FROM tbl_tuition_fees WHERE course_id = '$course_id' AND ay_id = '$ay_id' AND year_id = '$year_id'");

    if (mysqli_num_rows($check_tuition) == 0) {

        $add_tuition = mysqli_query($db,"INSERT INTO tbl_tuition_fees (tuition_fee, course_id, ay_id, year_id, updated_by, created_at, last_updated) VALUES ('$tuition_fee', '$course_id', '$ay_id', '$year_id', '$updated_by', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)");
        $_SESSION['fee_success'] = true;
        header('location: ../add.tuition.php');
        
    } else {

        $_SESSION['fee_exists'] = true;
        header('location: ../add.tuition.php');
    }

}