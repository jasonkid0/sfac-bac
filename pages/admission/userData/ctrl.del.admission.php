<?php
require '../../../includes/conn.php';
session_start();

$get_id = $_GET['admission_id'];

mysqli_query($db, "DELETE FROM tbl_admissions WHERE admission_id = '$get_id' ") or die(mysqli_error($db));
$_SESSION['successDel'] = true;
header("location: ../list.admission.php");