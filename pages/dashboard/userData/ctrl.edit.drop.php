<?php
include '../../../includes/conn.php';
session_start();

$get_id = $_GET['stud_id'];

$drop_id =  mysqli_real_escape_string($db, $_POST['drop_id']);
if (isset($_POST['drop_reason'])) {
    $drop_reason =  mysqli_real_escape_string($db, $_POST['drop_reason']);
} else {
    $drop_reason = "";
}

$select_subject = mysqli_query($db, "DELETE FROM tbl_enrolled_subjects WHERE stud_id = '$get_id' AND acad_year = '$_SESSION[AC]' AND semester = '$_SESSION[S]'");

$dropStud = mysqli_query($db,"UPDATE tbl_schoolyears SET remark = 'Dropped', drop_id = '$drop_id', other_reason = '$drop_reason' where stud_id = '$get_id' AND ay_id = '$_SESSION[AC]' AND sem_id = '$_SESSION[S]' ");

$_SESSION['Drop'] = true;
header("location: ../enrolledStud.php");