<?php
require '../../../includes/conn.php';
session_start();
$stud_id = $_SESSION['stud_id'];

if (isset($_POST['stud_no'])) {

    $course_id = $db->real_escape_string($_POST['course']);
    $year_id = $db->real_escape_string($_POST['level']);
    $status = $db->real_escape_string($_POST['status']);
    $ay_id = $_SESSION['AC'];
    $sem_id = $_SESSION['S'];
    $date_enrolled = date("Y-m-d");
    $remark = $db->real_escape_string("Pending");

    if (!empty($_POST['course']) && !empty($_POST['level']) && !empty($_POST['status'])) {
        $q = $db->query("INSERT INTO tbl_schoolyears (ay_id, year_id, sem_id, course_id, stud_id, date_enrolled, status, remark) VALUES ('$ay_id', '$year_id', '$sem_id', '$course_id', '$stud_id', '$date_enrolled', '$status', '$remark')") or die($db->error);

        // update course_id on tbl_students
        if ($q) {
            $query = $db->query("UPDATE tbl_students SET course_id = '$course_id' WHERE stud_id = '$stud_id'") or die($db->error);
            sleep(2);
        }

        $q2 = $db->query("INSERT INTO tbl_notifications (sy_id) SELECT sy_id FROM tbl_schoolyears WHERE stud_id = '$stud_id' AND ay_id = '$ay_id' AND sem_id = '$sem_id'");
        if ($q2) {
            $_SESSION['enroll_success'] = true;
            unset($_POST['stud_no']);
            header("location: ../enrollmentInfo.php");
        } else {
            $q2 = $db->query("INSERT INTO tbl_notifications (sy_id) SELECT sy_id FROM tbl_schoolyears WHERE stud_id = '$stud_id' AND ay_id = '$ay_id' AND sem_id = '$sem_id'") or die($db->error);
            $_SESSION['enroll_success'] = true;
            unset($_POST['stud_no']);
            header("location: ../enrollmentInfo.php");
        }
    } else {
        $_SESSION['fill-select'] = true;
        unset($_POST['stud_no']);
        header("location: ../enrollNow.php");
    }
    unset($_POST['stud_no']);
}