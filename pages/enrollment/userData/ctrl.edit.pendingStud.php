<?php
include '../../../includes/conn.php';
session_start();
$date = date("Y-m-d");
// for empty values
// Adviser Approval 
if ($_SESSION['role'] == "Adviser" || $_SESSION['role'] == "Admission") {
    if (!empty($_GET['id'])) {
        // remark condition
        if ($_GET['remark'] == "Pending" || $_GET['remark'] == "Canceled") {
            // get id by URL
            $id = $_GET['id'];
            $action = "Checked";
            // query
            $query = $db->query("UPDATE tbl_schoolyears SET remark = '$action', last_update = '$date', updated_by = '$_SESSION[name]' WHERE sy_id = '$id'") or die($db->error);
            $query2 = $db->query("UPDATE tbl_notifications SET notif_status = 0 WHERE sy_id = '$id'") or die($db->error);
            $_SESSION['ACheck'] = true;
        } elseif ($_GET['remark'] == "Checked" || $_GET['remark'] == "Disapproved") {
            // get id by URL
            $id = $_GET['id'];
            $action = "Canceled";
            // query
            $query = $db->query("UPDATE tbl_schoolyears SET remark = '$action', last_update = '$date', updated_by = '$_SESSION[name]' WHERE sy_id = '$id' ") or die($db->error);
            $_SESSION['ACanceled'] = true;
            
        }
    $student = mysqli_query($db, "SELECT *, CONCAT(S.firstname, ' ', S.middlename, ' ', S.lastname) AS fullname FROM tbl_schoolyears SY LEFT JOIN tbl_students S USING(stud_id) WHERE sy_id = '$id'");
    $row = mysqli_fetch_array($student);
    $file = $row['fullname'] .", ".$id;
    $query = $db->query("INSERT INTO tbl_logs (updated_by, updated_at, action, item) VALUES ('$_SESSION[name]', '$date', '$action', '$file')") or die($db->error);
    header("location: ../pendingStud.php?search=" . $_GET['search']);
    }
    // REGISTRAR Approval 
} elseif ($_SESSION['role'] == "Registrar") {
    if (!empty($_GET['id'])) {
        // remark condition
        if ($_GET['remark'] == "Checked" || $_GET['remark'] == "Disapproved") {
            // get id by URL
            $id = $_GET['id'];
            $action = "Approved";
            // query
            $query = $db->query("UPDATE tbl_schoolyears SET remark = '$action', last_update = '$date', updated_by = '$_SESSION[name]' WHERE sy_id = '$id'") or die($db->error);
            $_SESSION['ACheck'] = true;
            
        } elseif ($_GET['remark'] == "Approved") {
            // get id by URL
            $id = $_GET['id'];
            $action = "Disapproved";
            // query
            $query = $db->query("UPDATE tbl_schoolyears SET remark = '$action', last_update = '$date', updated_by = '$_SESSION[name]' WHERE sy_id = '$id'") or die($db->error);
            $_SESSION['RDisapproved'] = true;
            
        }
    $student = mysqli_query($db, "SELECT *, CONCAT(S.firstname, ' ', S.middlename, ' ', S.lastname) AS fullname FROM tbl_schoolyears SY LEFT JOIN tbl_students S USING(stud_id) WHERE sy_id = '$id'");
    $row = mysqli_fetch_array($student);
    $file = $row['fullname'] .", ".$id;
    $query = $db->query("INSERT INTO tbl_logs (updated_by, updated_at, action, item) VALUES ('$_SESSION[name]', '$date', '$action', '$file')") or die($db->error);
    header("location: ../enrolledStud.php?search=" . $_GET['search']);
    }
}

