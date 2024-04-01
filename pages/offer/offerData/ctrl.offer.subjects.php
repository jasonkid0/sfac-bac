<?php
include '../../../includes/conn.php';
session_start();

//  submit button
if (isset($_POST['add'])) {

    $subj_code = $db->real_escape_string($_POST['subj_code']);
    $subj_id = $db->real_escape_string($_POST['subj_id']);
    $day  = $db->real_escape_string($_POST['day']);
    $time = $db->real_escape_string($_POST['time']);
    $room = $db->real_escape_string($_POST['room']);
    $section = $db->real_escape_string($_POST['section']);
    $special_tut = $_POST['special_tut'];
    $instructor = $db->real_escape_string($_COOKIE['instructor']);

    // required fields
    if (!empty($_POST['day']) and !empty($_POST['time']) and !empty($_POST['room'])) {
        // Invalid same content
        $check = $db->query("SELECT * FROM tbl_schedules WHERE class_code = '$subj_code' AND subj_id = '$subj_id' AND faculty_id = '$instructor' AND day = '$day' AND time = '$time' AND room = '$room' AND section = '$section' AND acad_year = '$_SESSION[AC]' AND semester = '$_SESSION[S]' AND special_tut = '$special_tut'") or die($db->error);
        $count = $check->num_rows;
        if ($count == 0) {
            // insert Data
            $query = $db->query("INSERT INTO tbl_schedules (class_code, subj_id, faculty_id, day, time, room, section, acad_year, semester, special_tut, room_status) VALUES ('$subj_code', '$subj_id', '$instructor', '$day' , '$time', '$room', '$section', '$_SESSION[AC]', '$_SESSION[S]', '$special_tut[0]', 0)") or die($db->error);
            $_SESSION['SASched'] = true;
            unset($_COOKIE['instructor']);
            header("location: ../offer.subjects.php?eay=" . $_SESSION['back_eay'] . "&CID=" . $_SESSION['back_CID']);
        } else {
            $_SESSION['exist_schedule'] = true;
            unset($_COOKIE['instructor']);
            header("location: ../offer.subjects.php?eay=" . $_SESSION['back_eay'] . "&CID=" . $_SESSION['back_CID']);
        }
    } else {
        $_SESSION['AFill'] = true;
        unset($_COOKIE['instructor']);
        header("location: ../offer.subjects.php?eay=" . $_SESSION['back_eay'] . "&CID=" . $_SESSION['back_CID']);
    }
}

// submit button for petitioned
if (isset($_POST['add_petitioned'])) {

    // to get Subject_code
    $getSubj_code = $db->query("SELECT subj_code FROM tbl_subjects_new WHERE subj_id = '$_COOKIE[subj_id]'") or die($db->error);
    while ($row = $getSubj_code->fetch_array()) {
        $subj_c = $row['subj_code'];
    }

    $subj_code = $db->real_escape_string($subj_c);
    $subj_id = $db->real_escape_string($_COOKIE['subj_id']);
    $day  = $db->real_escape_string($_POST['day']);
    $time = $db->real_escape_string($_POST['time']);
    $room = $db->real_escape_string($_POST['room']);
    $section = $db->real_escape_string($_POST['section']);
    // $special_tut = $db->real_escape_string($_POST['special_tut']);
    $instructor = $db->real_escape_string($_COOKIE['inst']);

    // required fields
    if (!empty($_POST['day']) && !empty($_POST['time']) && !empty($_POST['room']) && !empty($_COOKIE['subj_id'])) {
        // Invalid same content
        $check = $db->query("SELECT * FROM tbl_schedules WHERE class_code = '$subj_code' AND subj_id = '$subj_id' AND faculty_id = '$instructor' AND day = '$day' AND time = '$time' AND room = '$room' AND section = '$section' AND acad_year = '$_SESSION[AC]' AND semester = '$_SESSION[S]' AND special_tut = '$special_tut'") or die($db->error);
        $count = $check->num_rows;
        if ($count == 0) {
            // insert Data
            $query = $db->query("INSERT INTO tbl_schedules (class_code, subj_id, faculty_id, day, time, room, section, acad_year, semester, room_status) VALUES ('$subj_code', '$subj_id', '$instructor', '$day' , '$time', '$room', '$section', '$_SESSION[AC]', '$_SESSION[S]', 0)") or die($db->error);
            $_SESSION['SASched'] = true;
            unset($_COOKIE['instructor']);
            header("location: ../offer.subjects.php?eay=" . $_SESSION['back_eay'] . "&CID=" . $_SESSION['back_CID']);
        } else {
            $_SESSION['exist_schedule'] = true;
            unset($_COOKIE['instructor']);
            header("location: ../offer.subjects.php?eay=" . $_SESSION['back_eay'] . "&CID=" . $_SESSION['back_CID']);
        }
    } else {
        $_SESSION['AFill'] = true;
        unset($_COOKIE['instructor']);
        header("location: ../offer.subjects.php?eay=" . $_SESSION['back_eay'] . "&CID=" . $_SESSION['back_CID']);
    }
}