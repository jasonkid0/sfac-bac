<?php
include '../../../includes/conn.php';
session_start();

if (isset($_POST['submit']) && !empty($_SESSION['username']) && !empty($_SESSION['code'])) {
    // username
    $username = $_SESSION['username'];

    // input element | Password
    $password = $db->real_escape_string($_POST['password']);
    $con_password = $db->real_escape_string($_POST['con_password']);

    // password comparison
    if ($password != $con_password) {
        $_SESSION['not_match'] = true;
        header("location: ../change_password.php");
        exit();
    } else {
        // to sign-in.php
        $_SESSION['password'] = $password;

        // hashing
        $hashed_password = password_hash($con_password, PASSWORD_DEFAULT);

        // user role
        $super_admin = $db->query("SELECT * FROM tbl_super_admins WHERE username = '$username'");
        $numrow  = $super_admin->num_rows;

        $dean    = $db->query("SELECT * FROM tbl_deans WHERE username = '$username'");
        $numrow1 = $dean->num_rows;

        $admission = $db->query("SELECT * FROM tbl_admissions WHERE username = '$username'");
        $numrow2   = $admission->num_rows;

        $accounting = $db->query("SELECT * FROM tbl_accounting WHERE username = '$username'");
        $numrow3    = $accounting->num_rows;

        $admin   = $db->query("SELECT * FROM tbl_admins WHERE username = '$username'");
        $numrow4 = $admin->num_rows;

        $adviser = $db->query("SELECT * FROM tbl_faculties WHERE username = '$username'");
        $numrow5 = $adviser->num_rows;

        $student = $db->query("SELECT * FROM tbl_students WHERE username = '$username'");
        $numrow6 = $student->num_rows;

        $president = $db->query("SELECT * FROM tbl_presidents WHERE username = '$username'");
        $numrow7 = $president->num_rows;

        $teacher = $db->query("SELECT * FROM tbl_faculties_staff WHERE username = '$username'");
        $numrow8 = $teacher->num_rows;

        // Update Password
        if ($numrow > 0) {
            $query1 = $db->query("UPDATE tbl_super_admins SET password = '$hashed_password' WHERE username = '$username'");
        } elseif ($numrow1 > 0) {
            $query1 = $db->query("UPDATE tbl_deans SET password = '$hashed_password' WHERE username = '$username'");
        } elseif ($numrow2 > 0) {
            $query1 = $db->query("UPDATE tbl_admissions SET password = '$hashed_password' WHERE username = '$username'");
        } elseif ($numrow3 > 0) {
            $query1 = $db->query("UPDATE tbl_accounting SET password = '$hashed_password' WHERE username = '$username'");
        } elseif ($numrow4 > 0) {
            $query1 = $db->query("UPDATE tbl_admins SET password = '$hashed_password' WHERE username = '$username'");
        } elseif ($numrow5 > 0) {
            $query1 = $db->query("UPDATE tbl_faculties SET password = '$hashed_password' WHERE username = '$username'");
        } elseif ($numrow6 > 0) {
            $query1 = $db->query("UPDATE tbl_students SET password = '$hashed_password' WHERE username = '$username'");
        } elseif ($numrow7 > 0) {
            $query1 = $db->query("UPDATE tbl_presidents SET password = '$hashed_password' WHERE username = '$username'");
        } elseif ($numrow8 > 0) {
            $query1 = $db->query("UPDATE tbl_faculties_staff SET password = '$hashed_password' WHERE username = '$username'");
        }
        $_SESSION['confirm'] = true;
        header("location: ctrl.sign-in.php");
    }
}