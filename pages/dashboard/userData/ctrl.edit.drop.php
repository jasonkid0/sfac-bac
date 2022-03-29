<?php
include '../../../includes/conn.php';
session_start();

$get_id = $_GET['stud_id'];

$dropStud = mysqli_query($db,"UPDATE tbl_schoolyears SET remark = 'Dropped' where stud_id = '$get_id' ");

$_SESSION['Drop'] = true;
header("location: ../enrolledStud.php");