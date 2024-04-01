<?php
require '../../../includes/conn.php';
session_start();

$get_id = $_GET['dean_id'];

mysqli_query($db, "DELETE FROM tbl_deans WHERE dean_id = '$get_id' ") or die(mysqli_error($db));
$_SESSION['successDel'] = true;
header("location: ../list.dean.php");