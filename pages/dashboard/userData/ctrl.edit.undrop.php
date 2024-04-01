<?php
include '../../../includes/conn.php';
session_start();

$get_id = $_GET['stud_id'];

$dropStud = mysqli_query($db,"UPDATE tbl_schoolyears SET remark = 'Approved' where stud_id = '$get_id' AND ay_id = '$_SESSION[AC]' AND sem_id = '$_SESSION[S]'");

$_SESSION['ACheck'] = true;
header("location: ../dropped.php");