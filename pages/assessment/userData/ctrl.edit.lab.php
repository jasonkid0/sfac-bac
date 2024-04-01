<?php
require '../../../includes/conn.php';
session_start();
date_default_timezone_set('Asia/Manila');

$lab_id = $_GET['lab_id'];

if (isset($_POST['submit'])) {

    $lab_desc = mysqli_real_escape_string($db, $_POST['lab_desc']);
    $lab = mysqli_real_escape_string($db, $_POST['lab']);
    $ay_id = mysqli_real_escape_string($db, $_POST['ay_id']);
    $year_id = mysqli_real_escape_string($db, $_POST['year_id']);

    $updated_by = $_SESSION['name'].' - '. $_SESSION['role'];


    $check_lab = mysqli_query($db,"SELECT * FROM tbl_lab_fees WHERE lab_desc = '$lab_desc' AND lab = '$lab' AND ay_id = '$ay_id' AND year_id = '$year_id'");

    if (mysqli_num_rows($check_lab) == 0) {

        $edit_lab = mysqli_query($db,"UPDATE tbl_lab_fees SET lab = '$lab', lab_desc = '$lab_desc', ay_id = '$ay_id', year_id = '$year_id', updated_by = '$updated_by', last_updated = CURRENT_TIMESTAMP WHERE lab_id = $lab_id");

        $_SESSION['fee_updated'] = true;
        header('location: ../edit.lab.php?lab_id='.$lab_id);

    } else {

        $_SESSION['fee_exists'] = true;
        header('location: ../edit.lab.php?lab_id='.$lab_id);

    }

}