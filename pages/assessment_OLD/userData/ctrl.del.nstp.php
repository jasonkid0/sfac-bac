<?php
require '../../../includes/conn.php';
require '../accountConn/conn.php';
session_start();
date_default_timezone_set('Asia/Manila');

$nstp_id = $_GET['nstp_id'];

$delete_nstp = mysqli_query($db, "DELETE FROM tbl_nstp_fees WHERE nstp_id = '$nstp_id'");

$_SESSION['successDel'] = true;
header("location: ../list.nstp.php");