<?php
require '../../../includes/conn.php';
session_start();
date_default_timezone_set('Asia/Manila');

$get_id = $_GET['assessed_id'];

mysqli_query($db, "DELETE FROM tbl_assessed_tf WHERE assessed_id = '$get_id' ") or die(mysqli_error($db));
$_SESSION['successDel'] = true;
header("location: ../list.assessment.php");