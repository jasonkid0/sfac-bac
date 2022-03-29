<?php
require '../../../includes/conn.php';
session_start();

if (isset($_POST['submit'])) {

    $semester = mysqli_real_escape_string($db, $_POST['semester']);
    $academic_year = mysqli_real_escape_string($db, $_POST['academic_year']);


    if ($semester == true && $academic_year == true) {
        $updateSem = mysqli_query($db, "UPDATE tbl_active_sem SET sem_id = '$semester' WHERE active_sem_id = '1' ") or die(mysqli_error($db));
        $updateAcad = mysqli_query($db, "UPDATE tbl_active_acads SET ay_id = '$academic_year' WHERE active_acad_id = '1'  ") or die(mysqli_error($db));
        $_SESSION['successCalendar'] = true;
        header("location: ../set.acad.calendar.php");
    } else {
        $_SESSION['fill-select'] = true;
        header("location: ../set.acad.calendar.php");
    }
}