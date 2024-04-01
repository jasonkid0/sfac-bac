<?php
require '../../../includes/conn.php';
session_start();
date_default_timezone_set('Asia/Manila');

$nstp_id = $_GET['nstp_id'];

if (isset($_POST['submit'])) {

    $component = mysqli_real_escape_string($db, $_POST['component']);
    $component_value = mysqli_real_escape_string($db, $_POST['component_value']);
    $ay_id = mysqli_real_escape_string($db, $_POST['ay_id']);
    $year_id = mysqli_real_escape_string($db, $_POST['year_id']);

    $updated_by = $_SESSION['name'].' - '. $_SESSION['role'];


    $check_nstp = mysqli_query($db,"SELECT * FROM tbl_nstp_fees WHERE component = '$component' AND component_value = '$component_value' AND ay_id = '$ay_id' AND year_id = '$year_id'");

    if (mysqli_num_rows($check_nstp) == 0) {

        $edit_nstp = mysqli_query($db,"UPDATE tbl_nstp_fees SET component_value = '$component_value', component = '$component', ay_id = '$ay_id', year_id = '$year_id', updated_by = '$updated_by', last_updated = CURRENT_TIMESTAMP WHERE nstp_id = $nstp_id");
        
        $_SESSION['fee_updated'] = true;
        header('location: ../edit.nstp.php?nstp_id='.$nstp_id);

    } else {
        
        $_SESSION['fee_exists'] = true;
        header('location: ../edit.nstp.php?nstp_id='.$nstp_id);
    }

}