<?php
include '../../../includes/conn.php';
session_start();

$id = $_GET['class_id'];

$query = $db->query("DELETE FROM tbl_schedules WHERE class_id = '$id'") or die($db->error);
$_SESSION['SDCSched'] = true;
header("location: ../list.classSched.php?CID=" . $_SESSION['back_CID']);