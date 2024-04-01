<?php
include "../../../includes/conn.php";
session_start();
if (isset($_POST['submit'])) {

    $dep = mysqli_real_escape_string($db, $_POST['department']);

    $getData = mysqli_query($db, "SELECT * FROM tbl_departments WHERE department_name = '$dep'") or die(mysqli_error($db));
    $num = mysqli_num_rows($getData);

    if ($num > 0) {
        $_SESSION['depExist'] = true;
        header("location: ../add.department.php");
    } else {
        $q = mysqli_query($db, "INSERT INTO tbl_departments (department_name) VALUES ('$dep')");
        $_SESSION['successAddDep'] = true;
        header("location: ../add.department.php");
    }
}