<?php
require '../../../includes/conn.php';
// 
session_start();
date_default_timezone_set('Asia/Manila');

if (isset($_POST['submit'])) {
    $stud_no = mysqli_real_escape_string($db, $_POST['stud_no']);


    $stud_check = mysqli_query($db,"SELECT stud_no FROM tbl_schoolyears
    LEFT JOIN tbl_students ON tbl_schoolyears.stud_id = tbl_students.stud_id WHERE stud_no = '$stud_no'") or die (mysqli_error($db)); //checks if the student is existing

    $stud_nerolled = mysqli_query($db,"SELECT stud_no, tbl_schoolyears.stud_id FROM tbl_schoolyears
    LEFT JOIN tbl_students ON tbl_schoolyears.stud_id = tbl_students.stud_id WHERE stud_no = '$stud_no' AND sem_id = '$_SESSION[S]' AND ay_id = '$_SESSION[AC]' AND remark = 'Approved' ") or die (mysqli_error($db)); // checks if the student is enrolled

    $assess_check = mysqli_query($db,"SELECT * FROM tbl_assessed_tf WHERE stud_id = '$stud_id' AND ay_id = '$_SESSION[AYear]' AND sem_id = '$_SESSION[ASem]'") or die (mysqli_error($acc)); // checks if the student has already an assessment

    if (mysqli_num_rows($stud_nerolled) != 0 && mysqli_num_rows($stud_check) != 0 && mysqli_num_rows($assess_check) == 0) {
        while ($id = mysqli_fetch_array($stud_nerolled)) {
            header('location:../add.assessment.php?stud_id='. $id['stud_id']);
        }
    } elseif (mysqli_num_rows($stud_check) == 0) {
        $_SESSION['stud_not_exists'] = true;
        header('location:../search.student.php');

    } elseif (mysqli_num_rows($stud_nerolled)  == 0) {
        $_SESSION['stud_not_exists'] = true;
        header('location:../search.student.php');
        
    } elseif (mysqli_num_rows($assess_check)  != 0) {
        $_SESSION['assessment_exists'] = true;
        header('location:../search.student.php');

    } 
}
?>