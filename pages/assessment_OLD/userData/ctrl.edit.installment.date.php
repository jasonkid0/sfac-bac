<?php
require '../../../includes/conn.php';
session_start();
date_default_timezone_set('Asia/Manila');

$installment_id = $_GET['installment_id'];

if (isset($_POST['submit'])) {

    $sem_id = mysqli_real_escape_string($db, $_POST['sem_id']);
    $date_1 = mysqli_real_escape_string($db, $_POST['date_1']);
    $date_2 = mysqli_real_escape_string($db, $_POST['date_2']);
    $date_3 = mysqli_real_escape_string($db, $_POST['date_3']);
    $ay_id = mysqli_real_escape_string($db, $_POST['ay_id']);

    $updated_by = $_SESSION['name'].' - '. $_SESSION['role'];


    $check_dates = mysqli_query($db,"SELECT * FROM tbl_installment_dates WHERE sem_id = '$sem_id' AND date_1 = '$date_1' AND date_2 = '$date_2' AND date_3 = '$date_3' AND ay_id = '$ay_id'") or die (mysqli_error($db));

    if (mysqli_num_rows($check_dates) == 0) {

        $edit_installment_dates = mysqli_query($db,"UPDATE tbl_installment_dates SET date_1 = '$date_1', date_2 = '$date_2', date_3 = '$date_3', sem_id = '$sem_id', ay_id = '$ay_id' WHERE installment_id = $installment_id") or die (mysqli_error($db));
        $_SESSION['dates_updated'] = true;
        header('location: ../edit.installment.date.php?installment_id='.$installment_id);

    } else {
        $_SESSION['dates_exists'] = true;
        header('location: ../add.installment.date.php');
    }

}