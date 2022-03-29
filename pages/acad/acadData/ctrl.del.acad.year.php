<?php
require '../../../includes/conn.php';
session_start();

$get_id = $_GET['ay_id'];

mysqli_query($db, "DELETE FROM tbl_acadyears WHERE ay_id = '$get_id' ") or die(mysqli_error($db));
$_SESSION['yearDelete'] = true;
header("location: ../list.acad.year.php");