<?php
require '../../../includes/conn.php';
// 
session_start();
date_default_timezone_set('Asia/Manila');

$acc_id = $_SESSION['userid'];
$assessed_id = $_GET['assessed_id'];

if (isset($_POST['submit'])) {

    $getUserName = mysqli_query($db, "SELECT *, CONCAT(tbl_accounting.account_lastname, ', ', tbl_accounting.account_firstname) AS fullname FROM tbl_accounting WHERE account_id = '$acc_id'");
    while ($row = mysqli_fetch_array($getUserName)) {
        $fullname = $row['fullname'];
    }

    $payment = mysqli_real_escape_string($db, $_POST['payment']);

    $updated_by = $_SESSION['name'] .' - '. $_SESSION['role'];

    if (isset($_POST['discounts'])) {
        $discounts_array = $_POST['discounts'];
    }

    if (isset($_POST['lab'])) {
        $lab_array = $_POST['lab'];
    }

    $index_array = array();

    if (isset($_POST['index'])) {
        $temp_array = $_POST['index'];

        foreach ($temp_array as $index) {
            if ($index != null) {
                array_push($index_array, $index);
            }
        }
    }

    $lab_value = implode(",",$lab_array);
    $discount_value = implode(",",$discounts_array);
    $index_value = implode(",",$index_array);

    if ($payment == 'cash') {
        $status = 'Paid';
    } else {
        $status = 'Unpaid';
    }

        if (!empty($discounts_array)) {

            $add_assessment = mysqli_query($db, "UPDATE tbl_assessed_tf SET disc_id = '$discount_value', lab_id = '$lab_value', lab_units = '$index_value', payment = '$payment', status = '$status', last_updated = CURRENT_TIMESTAMP, updated_by = '$updated_by' WHERE assessed_id = '$assessed_id'") or die(mysqli_error($db));

            
            $_SESSION['assessment_updated'] = true;
            header('location:../assessment.fee.php?assessed_id='.$assessed_id);

        } elseif (empty($discounts_array)) {

            $add_assessment = mysqli_query($db, "UPDATE tbl_assessed_tf SET lab_id = '$lab_value', lab_units = '$index_value', payment = '$payment', status = '$status', last_updated = CURRENT_TIMESTAMP, updated_by = '$updated_by' WHERE assessed_id = '$assessed_id'") or die(mysqli_error($db));

            $_SESSION['assessment_updated'] = true;
            header('location:../assessment.fee.php?assessed_id='.$assessed_id);

        } 
 
}