<?php
include '../../../includes/conn.php';
session_start();

// Insert
if (isset($_POST['submit'])) {

    $eay = $db->real_escape_string($_POST['EAY']);

    $query = $db->query("INSERT INTO tbl_effective_acadyear (eay) VALUES ('$eay')") or die($db->error);
    $_SESSION['successEAY'] = true;
    header("location: ../effectiveAY.php");
}

// Delete
if (!empty($_GET['id'])) {

    $eay_id = $_GET['id'];
    $query = $db->query("DELETE FROM tbl_effective_acadyear WHERE eay_id = '$eay_id'") or die($db->error);
    $_SESSION['DEAY'] = true;
    header("location: ../effectiveAY.php");
}

// Edit 
if (isset($_POST['Usubmit'])) {

    $eay_id = $_SESSION['eay_id'];
    $eay = $db->real_escape_string($_POST['EAY']);
    $query = $db->query("UPDATE tbl_effective_acadyear SET eay = '$eay' WHERE eay_id = '$eay_id'") or die($db->error);
    $_SESSION['successUpdate'] = true;
    header("location: ../effectiveAY.php");
}