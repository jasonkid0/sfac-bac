<?php
require '../../../includes/conn.php';
session_start();

if ($_SESSION['role'] != "Student") {
    $stud_id = $_SESSION['stud_id'];
}

if (isset($_POST['delete'])) {
    if (!empty($_POST['check'])) {
        $check = $_POST['check'];
        foreach ($check as $id) {
            $query = $db->query("DELETE FROM tbl_enrolled_subjects WHERE enrolled_subj_id = '$id'") or die($db->error);
            $_SESSION['delSubjects'] = true;
            if ($_SESSION['role'] == "Student") {
                header("location: ../enrollmentInfo.php");
            } else {
                header("location: ../enrollmentInfo.php?stud_id=" . $stud_id);
            }
        }
    } else {
        $_SESSION['FDSub'] = true;
        if ($_SESSION['role'] == "Student") {
            header("location: ../enrollmentInfo.php");
        } else {
            header("location: ../enrollmentInfo.php?stud_id=" . $stud_id);
        }
    }
}

if (isset($_POST['addSub'])) {

    if (!empty($_POST['index'])) {
        $index = $_POST['index'];
        $class_id = $_POST['class'];
        $subjects_id = $_POST['subjects'];
        $eay_id = $_POST['eay_id'];
        $t = true;
        foreach ($index as $i) {
            $query1 = $db->query("INSERT INTO tbl_enrolled_subjects (class_id, stud_id, subj_id, acad_year, semester) VALUES ('$class_id[$i]', '$_SESSION[stud_id]', '$subjects_id[$i]', '$_SESSION[AC]', '$_SESSION[S]')");
            if ($t == true) {
                // update the student curri for curriculum of a student
                $query2 = $db->query("UPDATE tbl_students SET curri = '$eay_id[$i]' WHERE stud_id = '$_SESSION[stud_id]'");
                $t = false;
            }
        }


        $_SESSION['SASub'] = true;
        if ($_SESSION['role'] == "Student") {
            header("location: ../enrollmentInfo.php");
        } else {
            header("location: ../enrollmentInfo.php?stud_id=" . $stud_id);
        }
    } else {
        $_SESSION['FASub'] = true;
        if ($_SESSION['role'] == "Student") {
            header("location: ../enrollmentInfo.php");
        } else {
            header("location: ../enrollmentInfo.php?stud_id=" . $stud_id);
        }
    }
}

// Not Student Role
if (isset($_POST['update'])) {
    $stud_id = $_SESSION['stud_id'];

    $getCourse = $db->query("SELECT course_id FROM tbl_students WHERE stud_id = '$stud_id'") or die($db->error);
    while ($row = $getCourse->fetch_array()) {
        $CCourse_id = $db->real_escape_string($_POST['course']);
        $query = $db->query("UPDATE tbl_students SET course_id = '$CCourse_id' WHERE stud_id = '$stud_id'") or die($db->error);
    }
    
    $schoology_username = $db->real_escape_string($_POST['schoology_username']);
    $schoology_password = $db->real_escape_string($_POST['schoology_password']);
    $course_id = $db->real_escape_string($_POST['course']);
    $year_id = $db->real_escape_string($_POST['level']);
    $status = $db->real_escape_string($_POST['status']);
    $bf = $db->real_escape_string($_POST['bfranciscano']);
    $transferee = $db->real_escape_string($_POST['transferee']);
    // $ay_id = $_SESSION['AC'];
    // $sem_id = $_SESSION['S'];
    // $date_enrolled = date("Y-m-d");
    // $remark = $db->real_escape_string("Pending");

    if (!empty($_POST['course']) && !empty($_POST['level']) && !empty($_POST['status'])) {
        $q = $db->query("UPDATE tbl_schoolyears SET schoology_password = '$schoology_password' ,schoology_username = '$schoology_username', year_id = '$year_id', course_id = '$course_id', status = '$status', bf = '$bf', transferee = '$transferee' WHERE stud_id = '$stud_id' AND ay_id = '$_SESSION[AC]' AND sem_id = '$_SESSION[S]'") or die($db->error);
        $_SESSION['successUpdate'] = true;
        header("location: ../enrollmentInfo.php?stud_id=" . $stud_id);
    } else {
        $_SESSION['fill-select'] = true;
        header("location: ../enrollmentInfo.php?stud_id=" . $stud_id);
    }
}