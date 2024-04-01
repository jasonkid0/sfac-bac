<?php
require '../../../includes/conn.php';
session_start();
date_default_timezone_set('Asia/Manila');

if (isset($_POST['submit'])) {

    $miscell_desc = mysqli_real_escape_string($db, $_POST['miscell_desc']);
    $miscellaneous = mysqli_real_escape_string($db, $_POST['miscellaneous']);
    $ay_id = mysqli_real_escape_string($db, $_POST['ay_id']);

    $updated_by = $_SESSION['name'].' - '. $_SESSION['role'];


    $check_miscell = mysqli_query($db,"SELECT * FROM tbl_miscellaneous_fees WHERE miscell_desc = '$miscell_desc' AND miscellaneous = '$miscellaneous' AND ay_id = '$ay_id'");

    if (mysqli_num_rows($check_miscell) == 0) {

        $add_miscell = mysqli_query($db,"INSERT INTO tbl_miscellaneous_fees (miscellaneous, miscell_desc, ay_id, updated_by, created_at, last_updated) VALUES ('$miscellaneous',  '$miscell_desc', '$ay_id', '$updated_by', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)");
        $_SESSION['fee_success'] = true;
        header('location: ../add.miscell.php');
        
    } else {

        $_SESSION['fee_exists'] = true;
        header('location: ../add.miscell.php');
    }

}