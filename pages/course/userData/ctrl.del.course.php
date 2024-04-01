<?php
require '../../../includes/conn.php';
session_start();

$get_id = $_GET['course_id'];

mysqli_query($db, "DELETE FROM tbl_courses WHERE course_id = '$get_id' ") or die(mysqli_error($db));
$_SESSION['successDel'] = true;
header("location: ../list.course.php");