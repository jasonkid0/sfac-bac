<?php
require '../../../includes/conn.php';
session_start();

if (isset($_POST['submit'])) {

   $course     = mysqli_real_escape_string($db, $_POST['course']);
   $course_abv = mysqli_real_escape_string($db, $_POST['course_abv']);
   $department = mysqli_real_escape_string($db, $_POST['department']);

   $listCourse = mysqli_query($db, "SELECT *
    FROM tbl_courses AS cour
    LEFT JOIN tbl_departments AS dep ON dep.department_id = cour.department_id
    WHERE cour.course = '$course' AND cour.course_abv = '$course_abv' AND cour.department_id = '$department'") or die(mysqli_error($db));
   $resultCheck = mysqli_num_rows($listCourse);
   if (0 == $resultCheck) {
      $addCour               = mysqli_query($db, "INSERT INTO tbl_courses (course,course_abv, department_id) VALUES ('$course','$course_abv', '$department')") or die(mysqli_error($db));
      $_SESSION['courAdded'] = true;
      header('location: ../add.course.php');
   } else {
      $_SESSION['courExist'] = true;
      header('location: ../add.course.php');
   }
}