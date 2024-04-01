<?php
require '../../../includes/conn.php';
// require '../accountConn/conn.php';
session_start();
date_default_timezone_set('Asia/Manila');

$acc_id = $_SESSION['userid'];

if (isset($_POST['submit'])) {

    $discount = mysqli_real_escape_string($db, $_POST['discount']);
    $discount_desc = mysqli_real_escape_string($db, $_POST['discount_desc']);
    $ay_id = mysqli_real_escape_string($db, $_POST['ay_id']);
    $percent = mysqli_real_escape_string($db, $_POST['percent']);
    $discount_status = mysqli_real_escape_string($db, $_POST['discount_status']);
    $updated_by = $_SESSION['name'] .' - '. $_SESSION['role'];

    $check_discount = mysqli_query($db, "SELECT * FROM tbl_discounts WHERE ay_id = '$ay_id' AND discount = '$discount' AND discount_desc = '$discount_desc' AND percent = '$percent' AND discount_status = '$discount_status'") or die(mysqli_error($db));
    $result = mysqli_num_rows($check_discount);

    if ($result == 0) {

        $insert_discount = mysqli_query($db, "INSERT INTO tbl_discounts (ay_id ,discount, discount_desc, percent, discount_status, created_at, last_updated, updated_by) VALUES ('$ay_id', '$discount', '$discount_desc', '$percent', '$discount_status', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '$updated_by')") or die(mysqli_error($db));
        
        $_SESSION['discount_success'] = true;
        header('location: ../add.discount.php');
     
    } else {
        $_SESSION['discount_exists'] = true;
        header('location: ../add.discount.php');
    }
}