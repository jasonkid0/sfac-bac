<?php
require '../../../includes/conn.php';
session_start();

$subj_id = $_SESSION['subj_id'];

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

    // query for same subject
    $checkSubj = mysqli_query($db, "SELECT * , tbl_courses.course_id FROM tbl_subjects_new LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_subjects_new.course_id WHERE subj_code = '$subj_code' AND subj_desc = '$subj_desc' AND tbl_subjects_new.course_id = '$course' AND eay_id = '$eay_id'") or die(mysqli_error($db));
    $resultCheck = mysqli_num_rows($checkSubj);

    // if subject is exist get num_rows
    $get_classCode = $db->query("SELECT * FROM tbl_schedules WHERE subj_id = '$subj_id'");
    $result_classCode = $get_classCode->num_rows;

    if ($resultCheck == 0) {
        if (!empty($_POST['subj_code']) && !empty($_POST['unit_total']) && !empty($_POST['course']) && !empty($_POST['year']) && !empty($_POST['eay']) && !empty($_POST['semester'])) {
            $checkSubj = mysqli_query($db, "UPDATE tbl_subjects_new SET subj_code = '$subj_code', subj_desc = '$subj_desc', unit_lec = '$unit_lec', unit_lab = '$unit_lab', unit_total = '$unit_total', prereq = '$prereq', course_id = '$course', year_id = '$year', sem_id = '$sem', eay_id = '$eay_id' WHERE subj_id = '$subj_id'") or die(mysqli_error($db));

            // to edit the class_code 
            if ($result_classCode > 0) {
                $edit_classCode = $db->query("UPDATE tbl_schedules SET class_code = '$subj_code' WHERE subj_id = '$subj_id'");
            }

            $_SESSION['subjUpdate'] = true;
            header("location: ../edit.subject.php?subj_id=" . $subj_id);
        } else {
            $_SESSION['AFill'] = true;
            header('location: ../add.subject.php');
        }
    } else {
        $_SESSION['subjExisting'] = true;
        header("location: ../edit.subject.php?subj_id=" . $subj_id);
    }
}