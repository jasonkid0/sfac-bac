<?php
require '../../../includes/conn.php';
// 
session_start();
date_default_timezone_set('Asia/Manila');

$disc_id = $_GET['disc_id'];

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

    if ($resultCheck == 0) {

        $insert_discount = mysqli_query($db, "UPDATE tbl_discounts SET ay_id = '$ay_id', discount = '$discount', discount_desc = '$discount_desc', percent = '$percent', discount_status = '$discount_status', updated_by = '$updated_by' WHERE disc_id = '$disc_id'") or die(mysqli_error($db));
        
        $_SESSION['discount_updated'] = true;
        header('location: ../edit.discount.php?disc_id='.$disc_id);
     
    } else {
        $_SESSION['discount_exists'] = true;
        header('location: ../edit.discount.php?disc_id='.$disc_id);
    }
}