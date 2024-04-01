<?php
include '../../../includes/conn.php';
session_start();

//  submit button
if (isset($_POST['update'])) {

    $class_id = $db->real_escape_string($_POST['class_id']);
    $subj_code = $db->real_escape_string($_POST['subj_code']);
    $subj_id = $db->real_escape_string($_POST['subj_id']);
    $day  = $db->real_escape_string($_POST['day']);
    $time = $db->real_escape_string($_POST['time']);
    $room = $db->real_escape_string($_POST['room']);
    $section = $db->real_escape_string($_POST['section']);
    $special_tut = $_POST['special_tut'];
    $room_status = $_POST['room_status'];
    $instructor = $db->real_escape_string($_COOKIE['instructor']);

    // required fields
    if (!empty($_POST['day']) and !empty($_POST['time']) and !empty($_POST['room'])) {
        // Invalid same content
        if ($_COOKIE['instructor'] > 0) {
            $check = $db->query("SELECT * FROM tbl_schedules WHERE class_code = '$subj_code' AND subj_id = '$subj_id' AND faculty_id = '$instructor' AND day = '$day' AND time = '$time' AND room = '$room' AND section = '$section' AND acad_year = '$_SESSION[AC]' AND semester = '$_SESSION[S]' AND special_tut = '$special_tut[0]' AND room_status = '$room_status[0]'") or die($db->error);
        } else {
            $check = $db->query("SELECT * FROM tbl_schedules WHERE class_code = '$subj_code' AND subj_id = '$subj_id' AND day = '$day' AND time = '$time' AND room = '$room' AND section = '$section' AND acad_year = '$_SESSION[AC]' AND semester = '$_SESSION[S]' AND special_tut = '$special_tut[0]' AND room_status = '$room_status[0]'") or die($db->error);
        }
        $count = $check->num_rows;
        if ($count == 0) {
            // update Data
            if ($_COOKIE['instructor'] > 0) {
                $query = $db->query("UPDATE tbl_schedules SET faculty_id = '$instructor', day = '$day' , time = '$time', room = '$room', section = '$section', special_tut = '$special_tut[0]' , room_status = '$room_status[0]' WHERE class_id = '$class_id'") or die($db->error);
            } else {
                $query = $db->query("UPDATE tbl_schedules SET day = '$day' , time = '$time', room = '$room', section = '$section', special_tut = '$special_tut[0]', room_status = '$room_status[0]' WHERE class_id = '$class_id'") or die($db->error);
            }

            $_SESSION['successUpdate'] = true;
            unset($_COOKIE['instructor']);
            header("location: ../list.classSched.php?CID=" . $_SESSION['back_CID']);
        } else {
            $_SESSION['exist_schedule'] = true;
            unset($_COOKIE['instructor']);
            header("location: ../list.classSched.php?CID=" . $_SESSION['back_CID']);
        }
    } else {
        $_SESSION['AFill'] = true;
        unset($_COOKIE['instructor']);
        header("location: ../list.classSched.php?CID=" . $_SESSION['back_CID']);
    }
}