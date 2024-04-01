<?php
require '../../../includes/conn.php';
session_start();
date_default_timezone_set('Asia/Manila');


if (isset($_POST['submit'])) {

    $ay_id = mysqli_real_escape_string($db, $_POST['ay_id']);
    $sem_id = mysqli_real_escape_string($db, $_POST['sem_id']);

    $date_1 = mysqli_real_escape_string($db, $_POST['date_1']);
    $date_2 = mysqli_real_escape_string($db, $_POST['date_2']);
    $date_3 = mysqli_real_escape_string($db, $_POST['date_3']);

    $check_dates = mysqli_query($db,"SELECT * FROM tbl_installment_dates WHERE date_1 = '$date_1' AND date_2 = '$date_2' AND date_3 = '$date_3' AND ay_id = '$ay_id' AND sem_id = '$sem_id'");

    if (mysqli_num_rows($check_dates) == 0) {
        $addPaymentDate = mysqli_query($db, "INSERT INTO tbl_installment_dates (date_1, date_2, date_3, ay_id, sem_id) VALUES ('$date_1', '$date_2', '$date_3', '$ay_id', '$sem_id')");
        $_SESSION['dates_success'] = true;
        header('location: ../add.installment.date.php');
        
    } else {
        $_SESSION['dates_exists'] = true;
        header('location: ../add.installment.date.php');

    }


}