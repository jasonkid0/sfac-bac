<?php
require '../../../includes/conn.php';

session_start();
date_default_timezone_set('Asia/Manila');

$acc_id = $_SESSION['userid'];

if (isset($_POST['submit'])) {
    $get_acc_name = mysqli_query($db,"SELECT *, CONCAT(tbl_accountings.accounting_lname, ', ', tbl_accountings.accounting_fname, ' ', tbl_accountings.accounting_mname) AS fullname FROM tbl_accountings WHERE acc_id = '$acc_id'");
    $row = mysqli_fetch_array($get_acc_name);

    $assessed_id = $_GET['assessed_id'];
    $stud_no = $_GET['stud_no'];

    $payment_date = mysqli_real_escape_string($acc, $_POST['payment_date']);
    $updated_by = $row['fullname'] .' - '. $_SESSION['role'];

    $addPayment = mysqli_query($acc,"INSERT INTO tbl_payments_status (stud_no, assessed_id, ay_id, payment_date,  created_at, last_updated, updated_by) VALUES ('$stud_no', '$assessed_id', '$_SESSION[AYear]','$payment_date', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '$updated_by')") or die (mysqli_error($acc));

    header('location: ../add.payment.php?stud_no='.$stud_no);


}