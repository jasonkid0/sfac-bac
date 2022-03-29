<?php
require '../../../includes/conn.php';
session_start();

$get_id = $_GET['pres_id'];

mysqli_query($db, "DELETE FROM tbl_presidents WHERE pres_id = '$get_id' ") or die(mysqli_error($db));
$_SESSION['successDel'] = true;
header("location: ../list.pres.php");