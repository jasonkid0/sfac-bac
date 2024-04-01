<?php
require '../../../includes/conn.php';
session_start();
date_default_timezone_set('Asia/Manila');

if (isset($_POST['submit'])) {

    $lab_desc = mysqli_real_escape_string($db, $_POST['lab_desc']);
    $lab = mysqli_real_escape_string($db, $_POST['lab']);
    $ay_id = mysqli_real_escape_string($db, $_POST['ay_id']);
    $year_id = mysqli_real_escape_string($db, $_POST['year_id']);

    $updated_by = $_SESSION['name'].' - '. $_SESSION['role'];


    $check_lab = mysqli_query($db,"SELECT * FROM tbl_lab_fees WHERE lab_desc = '$lab_desc' AND lab = '$lab' AND ay_id = '$ay_id' AND year_id = '$year_id'");

    if (mysqli_num_rows($check_lab) == 0) {

        $add_lab = mysqli_query($db,"INSERT INTO tbl_lab_fees (lab, lab_desc, ay_id, year_id, updated_by, created_at, last_updated) VALUES ('$lab',  '$lab_desc', '$ay_id', '$year_id', '$updated_by', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)");

        $_SESSION['fee_success'] = true;
        header('location: ../add.lab.php');
        
    } else {

        $_SESSION['fee_exists'] = true;
        header('location: ../add.lab.php');
    }

}