<?php
require '../../../includes/conn.php';
session_start();

if (isset($_POST['submit'])) {

    $date = mysqli_escape_string($db, $_POST['date']);

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

    $walkin_array = [];

    if (isset($_POST['walkin'])) {
        $temp_array = $_POST['walkin'];

        foreach ($temp_array as $index) {
            if ($index != null) {
                array_push($walkin_array, $index);
            } else {
                array_push($walkin_array, 0);
            }
        }
    }

    $online_array = [];

    if (isset($_POST['online'])) {
        $temp_array = $_POST['online'];

        foreach ($temp_array as $index) {
            if ($index != null) {
                array_push($online_array, $index);
            } else {
                array_push($online_array, 0);
            }
        }
    }

    $daily_new_array = [];

    if (isset($_POST['daily_new'])) {
        $temp_array = $_POST['daily_new'];

        foreach ($temp_array as $index) {
            if ($index != null) {
                array_push($daily_new_array, $index);
            } else {
                array_push($daily_new_array, 0);
            }
        }
    }

    $daily_old_array = [];

    if (isset($_POST['daily_old'])) {
        $temp_array = $_POST['daily_old'];

        foreach ($temp_array as $index) {
            if ($index != null) {
                array_push($daily_old_array, $index);
            } else {
                array_push($daily_old_array, 0);
            }
        }
    }

    $reservations_new_array = [];

    if (isset($_POST['reservations_new'])) {
        $temp_array = $_POST['reservations_new'];

        foreach ($temp_array as $index) {
            if ($index != null) {
                array_push($reservations_new_array, $index);
            } else {
                array_push($reservations_new_array, 0);
            }
        }
    }

    $reservations_old_array = [];

    if (isset($_POST['reservations_old'])) {
        $temp_array = $_POST['reservations_old'];

        foreach ($temp_array as $index) {
            if ($index != null) {
                array_push($reservations_old_array, $index);
            } else {
                array_push($reservations_old_array, 0);
            }
        }
    }

    $check_date = mysqli_query($db, "SELECT date FROM tbl_enrollment_update WHERE date = '$date' GROUP BY date");
    $result = mysqli_num_rows($check_date);

    if ($result == 0) {

    $i = 0;

        foreach ($department_id_array as $index) {

            $add_enrollees = mysqli_query($db, "INSERT INTO tbl_enrollment_update
            (department_id, walkin, online, daily_new, daily_old, reservations_new, reservations_old, date)
            VALUES ('$index', '$walkin_array[$i]', '$online_array[$i]', '$daily_new_array[$i]', '$daily_old_array[$i]', '$reservations_new_array[$i]', '$reservations_old_array[$i]', '$date')");

            $i++;
        }

        $_SESSION['enroll_success'] = true;
        header("location: ../add.enrollment.update.php");

    } else {

        $_SESSION['updates_exists'] = true;
        header("location: ../add.enrollment.update.php");
        
    }


    
    
}