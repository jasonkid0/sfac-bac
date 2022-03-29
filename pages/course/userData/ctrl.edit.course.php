<?php
require '../../../includes/conn.php';
session_start();

$id = $_SESSION['course_id'];

if (isset($_POST['update'])) {

 $course     = mysqli_real_escape_string($db, $_POST['course']);
 $course_abv = mysqli_real_escape_string($db, $_POST['course_abv']);
 $department = mysqli_real_escape_string($db, $_POST['department']);

 $listCourse = mysqli_query($db, "SELECT *
    FROM tbl_courses AS cour
    LEFT JOIN tbl_departments AS dep ON dep.department_id = cour.department_id
    WHERE cour.course = '$course' AND cour.course_abv = '$course_abv' AND cour.department_id = '$department'") or die(mysqli_error($db));
 $resultCheck = mysqli_num_rows($listCourse);
 if (0 == $resultCheck) {
  $updateCour                = mysqli_query($db, "UPDATE tbl_courses SET course = '$course', course_abv = '$course_abv', department_id = '$department' WHERE course_id = '$id'") or die(mysqli_error($db));
  $_SESSION['successUpdate'] = true;
  header('location: ../edit.course.php?course_id=' . $id);
 } else {
  $_SESSION['courExist'] = true;
  header('location: ../edit.course.php?course_id=' . $id);
 }

}