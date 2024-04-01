<?php
require '../../../includes/conn.php';
session_start();

if (isset($_POST['submit'])) {

    $ay_id = mysqli_escape_string($db, $_POST['ay_id']);

    $department_id_array = [];

    if (isset($_POST['department_id'])) {
        $temp_array = $_POST['department_id'];

        foreach ($temp_array as $index) {
            if ($index != null) {
                array_push($department_id_array, $index);
            } else {
                array_push($department_id_array, 0);
            }
        }
    }

    $target_new_array = [];

    if (isset($_POST['target_new'])) {
        $temp_array = $_POST['target_new'];

        foreach ($temp_array as $index) {
            if ($index != null) {
                array_push($target_new_array, $index);
            } else {
                array_push($target_new_array, 0);
            }
        }
    }

    $target_old_array = [];

    if (isset($_POST['target_old'])) {
        $temp_array = $_POST['target_old'];

        foreach ($temp_array as $index) {
            if ($index != null) {
                array_push($target_old_array, $index);
            } else {
                array_push($target_old_array, 0);
            }
        }
    }

  

    $i = 0;

        foreach ($department_id_array as $index) {

            $edit_enrollees = mysqli_query($db, "UPDATE tbl_target SET target_new = '$target_new_array[$i]', target_old = '$target_old_array[$i]' WHERE department_id = '$index' AND ay_id = '$ay_id'");

            $i++;
        }

        $_SESSION['enroll_success'] = true;
        header("location: ../edit.target.php?ay_id=". $ay_id);

    
}