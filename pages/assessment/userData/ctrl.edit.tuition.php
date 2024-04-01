<?php
require '../../../includes/conn.php';
session_start();
date_default_timezone_set('Asia/Manila');

$tf_id = $_GET['tf_id'];

if (isset($_POST['submit'])) {

    $course_id = mysqli_real_escape_string($db, $_POST['course_id']);
    $tuition_fee = mysqli_real_escape_string($db, $_POST['tuition_fee']);
    $ay_id = mysqli_real_escape_string($db, $_POST['ay_id']);
    $year_id = mysqli_real_escape_string($db, $_POST['year_id']);

    $updated_by = $_SESSION['name'].' - '. $_SESSION['role'];


    $check_tuition = mysqli_query($db,"SELECT * FROM tbl_tuition_fees WHERE course_id = '$course_id' AND tuition_fee = '$tuition_fee' AND ay_id = '$ay_id' AND year_id = '$year_id'");

    if (mysqli_num_rows($check_tuition) == 0) {

        $edit_tuition = mysqli_query($db,"UPDATE tbl_tuition_fees SET tuition_fee = '$tuition_fee', course_id = '$course_id', ay_id = '$ay_id', year_id = '$year_id', updated_by = '$updated_by', last_updated = CURRENT_TIMESTAMP WHERE tf_id = $tf_id");
        $_SESSION['fee_updated'] = true;
        header('location: ../edit.tuition.php?tf_id='.$tf_id);

    } else {
        $_SESSION['fee_exists'] = true;
        header('location: ../edit.tuition.php?tf_id='.$tf_id);

    }

}