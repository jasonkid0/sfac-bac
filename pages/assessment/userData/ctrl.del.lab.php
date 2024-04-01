<?php
require '../../../includes/conn.php';

session_start();
date_default_timezone_set('Asia/Manila');

$lab_id = $_GET['lab_id'];

$delete_lab = mysqli_query($db, "DELETE FROM tbl_lab_fees WHERE lab_id = '$lab_id'");

$_SESSION['successDel'] = true;
header("location: ../list.lab.php");