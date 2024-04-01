<?php
require '../../../includes/conn.php';
require '../accountConn/conn.php';
session_start();
date_default_timezone_set('Asia/Manila');

$get_id = $_GET['disc_id'];

mysqli_query($db, "DELETE FROM tbl_discounts WHERE disc_id = '$get_id' ") or die(mysqli_error($db));
$_SESSION['successDel'] = true;
header("location: ../list.discount.php");