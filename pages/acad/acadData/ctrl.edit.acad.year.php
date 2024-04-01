<?php
require '../../../includes/conn.php';
session_start();

$ay_id = $_SESSION['ay_id'];

if (isset($_POST['submit'])) {

 $academic_year = mysqli_real_escape_string($db, $_POST['academic_year']);

 $checkAcadYear = mysqli_query($db, "SELECT * FROM tbl_acadyears WHERE academic_year = '$academic_year'") or die(mysqli_error($db));

 $resultCheck = mysqli_num_rows($checkAcadYear);

 if (0 == $resultCheck) {
  $addAcad =  mysqli_query($db,"UPDATE tbl_acadyears SET academic_year = '$academic_year' WHERE ay_id = '$ay_id'")or die (mysqli_error($db));

  $_SESSION['yearUpdated'] = true;
  header('location: ../edit.acad.year.php?ay_id=' . $ay_id);
 } else {
  $_SESSION['yearExist'] = true;
  header('location: ../edit.acad.year.php?ay_id=' . $ay_id);
 }

}