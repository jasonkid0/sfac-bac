<?php
require '../../../includes/conn.php';
require '../accountConn/conn.php';
session_start();
date_default_timezone_set('Asia/Manila');

$tf_id = $_GET['tf_id'];

$delete_tuition = mysqli_query($db, "DELETE FROM tbl_tuition_fees WHERE tf_id = '$tf_id'");

$_SESSION['successDel'] = true;
header("location: ../list.tuition.php");