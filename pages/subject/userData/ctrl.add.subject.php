<?php
require '../../../includes/conn.php';
session_start();

if (isset($_POST['submit'])) {

    $subj_code = mysqli_real_escape_string($db, $_POST['subj_code']);
    $subj_desc = mysqli_real_escape_string($db, $_POST['subj_desc']);
    $unit_lec = mysqli_real_escape_string($db, $_POST['unit_lec']);
    $unit_lab = mysqli_real_escape_string($db, $_POST['unit_lab']);
    $unit_total = mysqli_real_escape_string($db, $_POST['unit_total']);
    $prereq = mysqli_real_escape_string($db, $_POST['prereq']);
    $course = mysqli_real_escape_string($db, $_POST['course']);
    $year = mysqli_real_escape_string($db, $_POST['year']);
    $sem = mysqli_real_escape_string($db, $_POST['semester']);
    $eay_id = mysqli_real_escape_string($db, $_POST['eay']);

    $checkSubj = mysqli_query($db, "SELECT * , tbl_courses.course_id FROM tbl_subjects_new LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_subjects_new.course_id WHERE subj_code = '$subj_code' AND subj_desc = '$subj_desc' AND tbl_subjects_new.course_id = '$course' AND eay_id = '$eay_id'") or die(mysqli_error($db));
    $resultCheck = mysqli_num_rows($checkSubj);

    if ($resultCheck == 0) {
        if (!empty($_POST['subj_code']) && !empty($_POST['unit_total']) && !empty($_POST['course']) && !empty($_POST['year']) && !empty($_POST['eay']) && !empty($_POST['semester'])) {
            $checkSubj = mysqli_query($db, "INSERT INTO tbl_subjects_new (subj_code,subj_desc, unit_lec, unit_lab, unit_total, prereq, course_id, year_id, sem_id, eay_id) VALUES ('$subj_code','$subj_desc', '$unit_lec','$unit_lab', '$unit_total', '$prereq', '$course', '$year', '$sem', '$eay_id')") or die(mysqli_error($db));
            $_SESSION['subjAdded'] = true;
            header('location: ../add.subject.php');
        } else {
            $_SESSION['AFill'] = true;
            header('location: ../add.subject.php');
        }
    } else {
        $_SESSION['subjExisting'] = true;
        header('location: ../add.subject.php');
    }
}