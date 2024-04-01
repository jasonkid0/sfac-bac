<?php
include '../../../includes/conn.php';
session_start();
date_default_timezone_set('Asia/Manila');

if (isset($_POST['submit'])) {

    $year         = mysqli_real_escape_string($db, $_POST['years']);
    $course       = mysqli_real_escape_string($db, $_POST['courses']);
    $gender       = mysqli_real_escape_string($db, $_POST['gender']);
    $lastname     = mysqli_real_escape_string($db, $_POST['lastname']);
    $firstname    = mysqli_real_escape_string($db, $_POST['firstname']);
    $middlename   = mysqli_real_escape_string($db, $_POST['middlename']);
    $address      = mysqli_real_escape_string($db, $_POST['address']);
    $birthdate    = mysqli_real_escape_string($db, $_POST['birthdate']);
    $birthplace   = mysqli_real_escape_string($db, $_POST['birthplace']);
    $age          = mysqli_real_escape_string($db, $_POST['age']);
    $religion     = mysqli_real_escape_string($db, $_POST['religion']);
    $citizenship  = mysqli_real_escape_string($db, $_POST['citizenship']);
    $civilstatus  = mysqli_real_escape_string($db, $_POST['civilstatus']);
    $contact      = mysqli_real_escape_string($db, $_POST['contact']);
    $email        = mysqli_real_escape_string($db, $_POST['email']);
    $lastschool   = mysqli_real_escape_string($db, $_POST['lastschool']);
    $info   = mysqli_real_escape_string($db, $_POST['info']);
    $last_school_type   = mysqli_real_escape_string($db, $_POST['last_school_type']);
    $last_level   = mysqli_real_escape_string($db, $_POST['last_level']);
    $date = date('Y-m-d h:i:s');
    // $flastname    = mysqli_real_escape_string($db, $_POST['flastname']);
    // $ffirstname   = mysqli_real_escape_string($db, $_POST['ffirstname']);
    // $fmiddlename  = mysqli_real_escape_string($db, $_POST['fmiddlename']);
    // $fage         = mysqli_real_escape_string($db, $_POST['fage']);
    // $foccupation  = mysqli_real_escape_string($db, $_POST['foccupation']);
    // $mlastname    = mysqli_real_escape_string($db, $_POST['mlastname']);
    // $mfirstname   = mysqli_real_escape_string($db, $_POST['mfirstname']);
    // $mmiddlename  = mysqli_real_escape_string($db, $_POST['mmiddlename']);
    // $mage         = mysqli_real_escape_string($db, $_POST['mage']);
    // $moccupation  = mysqli_real_escape_string($db, $_POST['moccupation']);
    // $familyincome = mysqli_real_escape_string($db, $_POST['familyincome']);
    // $nosiblings   = mysqli_real_escape_string($db, $_POST['nosiblings']);
    // $glastname    = mysqli_real_escape_string($db, $_POST['glastname']);
    // $gfirstname   = mysqli_real_escape_string($db, $_POST['gfirstname']);
    // $gmiddlename  = mysqli_real_escape_string($db, $_POST['gmiddlename']);
    // $relationship = mysqli_real_escape_string($db, $_POST['relationship']);
    // $gaddress     = mysqli_real_escape_string($db, $_POST['gaddress']);

    // $elem         = mysqli_real_escape_string($db, $_POST['elem']);
    // $elemSY       = mysqli_real_escape_string($db, $_POST['elemSY']);
    // $elemAddress  = mysqli_real_escape_string($db, $_POST['elemAddress']);

    // $hs           = mysqli_real_escape_string($db, $_POST['hs']);
    // $hsSY         = mysqli_real_escape_string($db, $_POST['hsSY']);
    // $hsAddress    = mysqli_real_escape_string($db, $_POST['hsAddress']);
    
    // $courseYear  = mysqli_real_escape_string($db, $_POST['course-year']);
    // $lastSY       = mysqli_real_escape_string($db, $_POST['lastSY']);
    // $lastAddress  = mysqli_real_escape_string($db, $_POST['lastAddress']);

    $acadYear = mysqli_query($db, "SELECT * FROM tbl_active_acads LEFT JOIN tbl_acadyears ON tbl_acadyears.ay_id = tbl_active_acads.ay_id");

    while ($rowYear = mysqli_fetch_array($acadYear)) {
        $acad_year = $rowYear['academic_year'];
    }

    $acadSem = mysqli_query($db, "SELECT * FROM tbl_active_sem LEFT JOIN tbl_semesters ON tbl_semesters.sem_id = tbl_active_sem.sem_id");

    while ($rowSem = mysqli_fetch_array($acadSem)) {
        $semester = $rowSem['semester'];
    }

    $inquiryData = mysqli_query($db, "INSERT INTO tbl_online_registrations (info_id, admit_type, year_id, course_id, gender_id, lastname, firstname, middlename, address, birthdate, birthplace, age, religion, citizenship, civilstatus, contact, email, lastschool, acad_year, semester, status, created_at, updated_at, last_level, last_school_type) VALUES ($info, 'NEW STUDENT', '$year', '$course', '$gender', '$lastname', '$firstname', '$middlename', '$address', '$birthdate', '$birthplace', '$age', '$religion', '$citizenship', '$civilstatus', '$contact', '$email', '$lastschool', '$acad_year', '$semester', 'Pending', '$date', '$date', '$last_level', '$last_school_type') ") or die(mysqli_error($db));
    $_SESSION['inquiryComplete'] = true;
    header("location: ../online.enrollment.php");
}