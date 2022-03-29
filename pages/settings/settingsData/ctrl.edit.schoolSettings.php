<?php // School Settings
require '../../../includes/conn.php';
session_start();

if (isset($_POST['SchSave'])) {

    $schName = $db->real_escape_string($_POST['SchName']);
    $schCampus = $db->real_escape_string($_POST['SchCampus']);

    if (!empty($_FILES['Schfile']['tmp_name'])) {
        $logo = addslashes(file_get_contents($_FILES['Schfile']['tmp_name']));
        $SchUpdate = $db->query("UPDATE tbl_school_info SET school_name = '$schName', school_address = '$schCampus', school_logo = '$logo' WHERE school_id = 1") or die($db->error);
        $_SESSION['successUpdate'] = true;
    } else {
        $SchUpdate = $db->query("UPDATE tbl_school_info SET school_name = '$schName', school_address = '$schCampus' WHERE school_id = 1") or die($db->error);
        $_SESSION['successUpdate'] = true;
    }
    header("location: ../../dashboard/index.php");
}