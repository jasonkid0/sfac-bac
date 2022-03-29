<?php
require '../../../includes/conn.php';
session_start();

$get_id = $_GET['or_id'];

mysqli_query($db, "DELETE FROM tbl_online_registrations WHERE or_id = '$get_id' ") or die(mysqli_error($db));
$_SESSION['successDel'] = true;
header("location: ../list.inquiry.php");