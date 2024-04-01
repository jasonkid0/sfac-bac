<?php
require '../../../includes/conn.php';
session_start();

if (isset($_POST['submit'])) {

    if (!empty($_FILES['image']['tmp_name'])) {

        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $lname = mysqli_real_escape_string($db, $_POST['lname']);
        $fname = mysqli_real_escape_string($db, $_POST['fname']);
        $mname = mysqli_real_escape_string($db, $_POST['mname']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $confirmPass = mysqli_real_escape_string($db, $_POST['confirmPass']);

        $getAllUsername = mysqli_query($db, "SELECT username FROM tbl_admissions WHERE username = '$username' UNION ALL SELECT username FROM tbl_deans WHERE username = '$username' UNION ALL SELECT username FROM tbl_faculties WHERE username = '$username' UNION ALL SELECT username FROM tbl_admins WHERE username = '$username' UNION ALL SELECT username FROM tbl_students WHERE username = '$username' UNION ALL SELECT username FROM tbl_super_admins WHERE username = '$username' UNION ALL SELECT username FROM tbl_accounting WHERE username = '$username' UNION ALL SELECT username FROM tbl_faculties_staff WHERE username = '$username' UNION ALL SELECT username FROM tbl_presidents WHERE username = '$username'") or die(mysqli_error($db));
        $check = mysqli_num_rows($getAllUsername);
        if ($check == 0) {
            if (!empty($_POST['username']) && !empty($_POST['password'])) {
                if ($password == $confirmPass) {
                    $hashedPwd = password_hash($confirmPass, PASSWORD_DEFAULT);
                    $insertAccounting = mysqli_query($db, "INSERT INTO tbl_accounting(img, account_firstname, account_middlename, account_lastname, activation_code, email, username, password, created_at) VALUES ('$image', '$fname', '$mname', '$lname', '', '$email', '$username', '$hashedPwd', CURRENT_TIMESTAMP)") or die(mysqli_error($db));
                    $_SESSION['successAdd'] = true;
                    header("location: ../add.accounting.php");
                } else {
                    $_SESSION['notMatch'] = true;
                    header("location: ../add.accounting.php");
                }
            } else {
                $_SESSION['fill'] = true;
                header("location: ../add.accounting.php");
            }
        } else {
            $_SESSION['usernameExist'] = true;
            header("location: ../add.accounting.php");
        }
    }
}