<?php
require '../../../includes/conn.php';
session_start();
date_default_timezone_set('Asia/Manila');

$miscell_id = $_GET['miscell_id'];

if (isset($_POST['submit'])) {

    $miscell_desc = mysqli_real_escape_string($db, $_POST['miscell_desc']);
    $miscellaneous = mysqli_real_escape_string($db, $_POST['miscellaneous']);
    $ay_id = mysqli_real_escape_string($db, $_POST['ay_id']);

    $updated_by = $_SESSION['name'].' - '. $_SESSION['role'];


    $check_miscell = mysqli_query($db,"SELECT * FROM tbl_miscellaneous_fees WHERE miscell_desc = '$miscell_desc' AND miscellaneous = '$miscellaneous' AND ay_id = '$ay_id'");

    if (mysqli_num_rows($check_miscell) == 0) {

        $edit_miscell = mysqli_query($db,"UPDATE tbl_miscellaneous_fees SET miscellaneous = '$miscellaneous', miscell_desc = '$miscell_desc', ay_id = '$ay_id', updated_by = '$updated_by', last_updated = CURRENT_TIMESTAMP WHERE miscell_id = $miscell_id");

        $_SESSION['fee_updated'] = true;
        header('location: ../edit.miscell.php?miscell_id='.$miscell_id);

    } else {

        $_SESSION['fee_exists'] = true;
        header('location: ../edit.miscell.php?miscell_id='.$miscell_id);
    }

}