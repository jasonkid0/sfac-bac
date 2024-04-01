<?php
require '../../../includes/conn.php';
// require '../accountConn/conn.php';
session_start();
date_default_timezone_set('Asia/Manila');


if (isset($_GET['assessed_id'])) {

    $status = $_GET['status'];
    $assessed_id = $_GET['assessed_id'];

    $edit_payment = mysqli_query($db, "UPDATE tbl_assessed_tf SET status = '$status' WHERE assessed_id = '$assessed_id'");

    $_SESSION['payment_updated'] = true;
    header('location: ../list.assessment.php');

} else {

    $select_status = mysqli_query($acc, "SELECT * FROM tbl_assessed_tf WHERE ay_id = '$_SESSION[AYear]' AND payment IN ('installment')");
    while ($row1 = mysqli_fetch_array($select_status)) {

    $paid = 0;

    $select_dates = mysqli_query($acc, "SELECT * FROM tbl_installment_dates WHERE ay_id = '$_SESSION[AYear]'");
    $date_array = [];
    while ($row = mysqli_fetch_array($select_dates)) {
        $date_array[] = $row['date_1'];
        $date_array[] = $row['date_2'];
        $date_array[] = $row['date_3'];
    }

        $current_date = new DateTime(date('d-m-Y'));

        foreach  ($date_array as $date_value) {
            $date = new DateTime($date_value);
            

                $select_paid = mysqli_query($acc,"SELECT * FROM tbl_payments_status WHERE payment_date = '$date_value' AND assessed_id = '$row1[assessed_id]'") or die (mysqli_error($acc));
                if (mysqli_num_rows($select_paid) != 0) {
                    $paid++;
                } else {
                }
        }

        if ($paid != 3) {
            $select_unpaid = mysqli_query($acc, "UPDATE tbl_assessed_tf SET status = 'Unpaid' WHERE assessed_id ='$row1[assessed_id]'");
        } else {
            $select_unpaid = mysqli_query($acc, "UPDATE tbl_assessed_tf SET status = 'Paid' WHERE assessed_id ='$row1[assessed_id]'");
        }
        
    }

    header('location: ../edit.payment.type.php');

}



