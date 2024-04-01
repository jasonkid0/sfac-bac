<?php
include '../../../includes/conn.php';
session_start();

$id = $_GET['id'];

$q = $db->query("DELETE FROM tbl_schoolyears WHERE sy_id = '$id'") or die($db->error);
$_SESSION['successDel'] = true;
if ($_SESSION['role'] == "Adviser") {
    header("location: ../pendingStud.php?search=" . $_GET['search']);
} elseif ($_SESSION['role'] == "Registrar") {
    header("location: ../enrolledStud.php");
}