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

    $check_date = mysqli_query($db, "SELECT ay_id FROM tbl_target WHERE ay_id = '$ay_id' GROUP BY ay_id");
    $result = mysqli_num_rows($check_date);

    if ($result == 0) {

    $i = 0;

        foreach ($department_id_array as $index) {

            $add_enrollees = mysqli_query($db, "INSERT INTO tbl_target
            (department_id, target_new, target_old, ay_id)
            VALUES ('$index', '$target_new_array[$i]', '$target_old_array[$i]', '$ay_id')");

            $i++;
        }

        $_SESSION['enroll_success'] = true;
        header("location: ../add.target.php");

    } else {

        $_SESSION['target_exists'] = true;
        header("location: ../add.target.php");
        
    }


    
    
}