<?php
require '../../../includes/conn.php';
// require '../accountConn/conn.php';
session_start();
date_default_timezone_set('Asia/Manila');

$acc_id = $_SESSION['userid'];
$stud_id = $_GET['stud_id'];

if (isset($_POST['submit'])) {

    $getUserName = mysqli_query($db, "SELECT *, CONCAT(tbl_accounting.account_lastname, ', ', tbl_accounting.account_firstname) AS fullname FROM tbl_accounting WHERE account_id = '$acc_id'");
    while ($row = mysqli_fetch_array($getUserName)) {
        $fullname = $row['fullname'];
    }

    $tf_id = mysqli_real_escape_string($db, $_POST['tf_id']);
    $payment = mysqli_real_escape_string($db, $_POST['payment']);
    $nstp = mysqli_real_escape_string($db, $_POST['nstp']);

    $updated_by = $fullname .' - '. $_SESSION['role'];

    if (isset($_POST['discounts'])) {
        $discounts_array = $_POST['discounts'];
    }

    if (isset($_POST['lab'])) {
        $lab_array = $_POST['lab'];
    }

    $lab_units_array = array();

    if (isset($_POST['lab_units'])) {
        $temp_array = $_POST['lab_units'];

        foreach ($temp_array as $index) {
            if ($index != null) {
                array_push($lab_units_array, $index);
            }
        }
    }

    $nstp_units_array = array();

    if (isset($_POST['nstp_units'])) {
        $temp_array = $_POST['nstp_units'];

        foreach ($temp_array as $index) {
            if ($index != null) {
                array_push($nstp_units_array, $index);
            }
        }
    }

    $lab_value = implode(",",$lab_array);
    $discount_value = implode(",",$discounts_array);
    $lab_unit_value = implode(",",$lab_units_array);
    $nstp_unit_value = implode(",",$nstp_units_array);

    
    if ($payment == 'cash') {
        $status = 'Paid';
    } else {
        $status = 'Unpaid';
    }
 

        if (!empty($discounts_array)) {

            $add_assessment = mysqli_query($db, "INSERT INTO tbl_assessed_tf (ay_id, sem_id, disc_id, nstp_id, nstp_units, lab_id, lab_units, stud_id, payment, tf_id, status, created_at, last_updated, updated_by ) VALUES ('$_SESSION[AYear]','$_SESSION[ASem]','$discount_value', '$nstp', '$nstp_unit_value', '$lab_value', '$lab_unit_value', '$stud_id', '$payment', '$tf_id', '$status', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '$updated_by')") or die(mysqli_error($db));

        } elseif (empty($discounts_array)) {

            $add_assessment = mysqli_query($db, "INSERT INTO tbl_assessed_tf (ay_id, sem_id, nstp_id, nstp_units, lab_id, lab_units, stud_id, payment, tf_id, status, created_at, last_updated, updated_by ) VALUES ('$_SESSION[AYear]','$_SESSION[ASem]', '$nstp', '$nstp_unit_value', '$lab_value', '$lab_unit_value', '$stud_id', '$payment', '$tf_id', '$status', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '$updated_by')") or die(mysqli_error($db));

        }

        $assessment = mysqli_query($db,"SELECT * FROM tbl_assesed_tf WHERE stud_id = '$stud_id' AND ay_id = '$_SESSION[AYear]' AND sem_id = '$_SESSION[ASem]'");
        $row = mysqli_fetch_array($assessment);
        $_SESSION['assessment_success'] = true;
        // header('location:../assessment.fee.php?assessed_id='.$row['assessed_id']);
}