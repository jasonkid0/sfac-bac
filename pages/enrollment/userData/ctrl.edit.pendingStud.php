<?php
include '../../../includes/conn.php';
session_start();

// for empty values
// Adviser Approval 
if ($_SESSION['role'] == "Adviser") {
    if (!empty($_GET['id'])) {
        // remark condition
        if ($_GET['remark'] == "Pending" || $_GET['remark'] == "Canceled") {
            // get id by URL
            $id = $_GET['id'];
            $check = "Checked";
            // query
            $query = $db->query("UPDATE tbl_schoolyears SET remark = '$check' WHERE sy_id = '$id'") or die($db->error);
            $query2 = $db->query("UPDATE tbl_notifications SET notif_status = 0 WHERE sy_id = '$id'") or die($db->error);
            $_SESSION['ACheck'] = true;
            header("location: ../pendingStud.php?search=" . $_GET['search']);
        } elseif ($_GET['remark'] == "Checked" || $_GET['remark'] == "Disapproved") {
            // get id by URL
            $id = $_GET['id'];
            $cancel = "Canceled";
            // query
            $query = $db->query("UPDATE tbl_schoolyears SET remark = '$cancel' WHERE sy_id = '$id'") or die($db->error);
            $_SESSION['ACanceled'] = true;
            header("location: ../pendingStud.php?search=" . $_GET['search']);
        }
    }
    // REGISTRAR Approval 
} elseif ($_SESSION['role'] == "Registrar") {
    if (!empty($_GET['id'])) {
        // remark condition
        if ($_GET['remark'] == "Checked" || $_GET['remark'] == "Disapproved") {
            // get id by URL
            $id = $_GET['id'];
            $check = "Approved";
            // query
            $query = $db->query("UPDATE tbl_schoolyears SET remark = '$check' WHERE sy_id = '$id'") or die($db->error);
            $_SESSION['ACheck'] = true;
            header("location: ../enrolledStud.php?search=" . $_GET['search']);
        } elseif ($_GET['remark'] == "Approved") {
            // get id by URL
            $id = $_GET['id'];
            $disapproved = "Disapproved";
            // query
            $query = $db->query("UPDATE tbl_schoolyears SET remark = '$disapproved' WHERE sy_id = '$id'") or die($db->error);
            $_SESSION['RDisapproved'] = true;
            header("location: ../enrolledStud.php?search=" . $_GET['search']);
        }
    }
}