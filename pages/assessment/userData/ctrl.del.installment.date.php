<?php
require '../../../includes/conn.php';

session_start();
date_default_timezone_set('Asia/Manila');

$installment_id = $_GET['installment_id'];

$delete_installment_date = mysqli_query($db, "DELETE FROM tbl_installment_dates WHERE installment_id = '$installment_id'");

$_SESSION['successDel'] = true;
header("location: ../list.installment.date.php");