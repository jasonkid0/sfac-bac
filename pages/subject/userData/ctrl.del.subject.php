<?php
require '../../../includes/conn.php';
session_start();

$get_id = $_GET['subj_id'];

mysqli_query($db, "DELETE FROM tbl_subjects_new WHERE subj_id = '$get_id' ") or die(mysqli_error($db));
$_SESSION['successDel'] = true;
header("location: ../list.subject.php");