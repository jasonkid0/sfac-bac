<?php
require 'conn.php';

// Active Acadyear & Semester
$getAAcadYear = $db->query("SELECT * FROM tbl_active_acads AC LEFT JOIN tbl_acadyears A ON A.ay_id = AC.ay_id") or die($db->error);
while ($row = $getAAcadYear->fetch_array()) {
    $_SESSION['AC'] = $row['academic_year'];
    $_SESSION['AYear'] = $row['ay_id'];
}
$getASem = $db->query("SELECT * FROM tbl_active_sem ASEM LEFT JOIN tbl_semesters S ON S.sem_id = ASEM.sem_id") or die($db->error);
while ($row = $getASem->fetch_array()) {
    $_SESSION['S'] = $row['semester'];
    $_SESSION['ASem'] = $row['sem_id'];
}

// sign in 
if (!empty($_SESSION['role'])) {
    if ($_SESSION['role'] == "Super Administrator") {
        $sa_id = $_SESSION['userid'];
        if ($sa_id == false) {
            header("location: ../login/sign-in.php");
            exit();
        }
    } elseif ($_SESSION['role'] == "Dean") {
        $dean_id = $_SESSION['userid'];
        if ($dean_id == false) {
            header("location: ../login/sign-in.php");
            exit();
        }
    } elseif ($_SESSION['role'] == "Admission") {
        $admission_id = $_SESSION['userid'];
        if ($admission_id == false) {
            header("location: ../login/sign-in.php");
            exit();
        }
    } elseif ($_SESSION['role'] == "Accounting") {
        $account_id = $_SESSION['userid'];
        if ($account_id == false) {
            header("location: ../login/sign-in.php");
            exit();
        }
    } elseif ($_SESSION['role'] == "Registrar") {
        $admin_id = $_SESSION['userid'];
        if ($admin_id == false) {
            header("location: ../login/sign-in.php");
            exit();
        }
    } elseif ($_SESSION['role'] == "Adviser") {
        $faculty_id = $_SESSION['userid'];
        // Adviser
        $getDepartment = $db->query("SELECT * FROM tbl_faculties WHERE faculty_id = '$faculty_id'") or die($db->error);
        while ($row = $getDepartment->fetch_array()) {
            $_SESSION['ADepartment_id'] = $row['department_id'];
        }
        if ($faculty_id == false) {
            header("location: ../login/sign-in.php");
            exit();
        }
    } elseif ("President" == $_SESSION['role']) {
        $pres_id = $_SESSION['userid'];
        if (false == $pres_id) {
            header("location: ../login/sign-in.php");
            exit();
        }
    } elseif ("Teacher" == $_SESSION['role']) {
        $facultyStaff_id = $_SESSION['userid'];
        if (false == $facultyStaff_id) {
            header("location: ../login/sign-in.php");
            exit();
        }
    } elseif ("Student" == $_SESSION['role']) {
        $stud_id = $_SESSION['userid'];
        $getStudCourse = $db->query("SELECT * FROM tbl_schoolyears WHERE stud_id = '$stud_id' AND ay_id = '$_SESSION[AC]' AND sem_id = '$_SESSION[S]'") or die($db->error);
        while ($row = $getStudCourse->fetch_array()) {
            $SCourse_id = $row['course_id'];
        }
        if (false == $stud_id) {
            header("location: ../login/sign-in.php");
            exit();
        }
    } else {
        session_destroy();
        header("location: ../login/sign-in.php");
        exit();
    }
} else {
    header("location: ../login/sign-in.php");
    exit();
}