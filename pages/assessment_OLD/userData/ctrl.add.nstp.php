<?php
require '../../../includes/conn.php';
session_start();
date_default_timezone_set('Asia/Manila');

if (isset($_POST['submit'])) {

    $component = mysqli_real_escape_string($db, $_POST['component']);
    $component_value = mysqli_real_escape_string($db, $_POST['component_value']);
    $ay_id = mysqli_real_escape_string($db, $_POST['ay_id']);
    $year_id = mysqli_real_escape_string($db, $_POST['year_id']);

    $updated_by = $_SESSION['name'].' - '. $_SESSION['role'];


    $check_nstp = mysqli_query($db,"SELECT * FROM tbl_nstp_fees WHERE component = '$component' AND component_value = '$component_value' AND ay_id = '$ay_id' AND year_id = '$year_id'");

    if (mysqli_num_rows($check_nstp) == 0) {

        $add_nstp = mysqli_query($db,"INSERT INTO tbl_nstp_fees (component_value, component, ay_id, year_id, updated_by, created_at, last_updated) VALUES ('$component_value',  '$component', '$ay_id', '$year_id', '$updated_by', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)");
        $_SESSION['fee_success'] = true;
        header('location: ../add.nstp.php');
        
    } else {

        $_SESSION['fee_exists'] = true;
        header('location: ../add.nstp.php');
    }

}