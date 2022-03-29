<?php
require '../../../includes/conn.php';
session_start();

if (isset($_POST['submit'])) {

    if (!empty($_FILES['image']['tmp_name'])) {

        $image       = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $faculty_no  = mysqli_real_escape_string($db, $_POST['faculty_no']);
        $position    = mysqli_real_escape_string($db, $_POST['position']);
        $department  = mysqli_real_escape_string($db, $_POST['department']);
        $role        = mysqli_real_escape_string($db, $_POST['role']);
        $status      = mysqli_real_escape_string($db, $_POST['status']);
        $email       = mysqli_real_escape_string($db, $_POST['email']);
        $lname       = mysqli_real_escape_string($db, $_POST['lname']);
        $fname       = mysqli_real_escape_string($db, $_POST['fname']);
        $mname       = mysqli_real_escape_string($db, $_POST['mname']);
        $username    = mysqli_real_escape_string($db, $_POST['username']);
        $password    = mysqli_real_escape_string($db, $_POST['password']);
        $confirmPass = mysqli_real_escape_string($db, $_POST['confirmPass']);

        $getAllUsername = mysqli_query($db, "SELECT username FROM tbl_admissions WHERE username = '$username' UNION ALL SELECT username FROM tbl_deans WHERE username = '$username' UNION ALL SELECT username FROM tbl_faculties WHERE username = '$username' UNION ALL SELECT username FROM tbl_admins WHERE username = '$username' UNION ALL SELECT username FROM tbl_students WHERE username = '$username' UNION ALL SELECT username FROM tbl_super_admins WHERE username = '$username' UNION ALL SELECT username FROM tbl_accounting WHERE username = '$username' UNION ALL SELECT username FROM tbl_faculties_staff WHERE username = '$username' UNION ALL SELECT username FROM tbl_presidents WHERE username = '$username'") or die(mysqli_error($db));
        $check = mysqli_num_rows($getAllUsername);
        if ($check == 0) {

            if (!empty($_POST['faculty_no']) && !empty($_POST['position']) && !empty($_POST['department']) && !empty($_POST['role']) && !empty($_POST['status'])) {

                if (!empty($_POST['username']) && !empty($_POST['password'])) {

                    if ($password == $confirmPass) {

                        $hashedPwd              = password_hash($confirmPass, PASSWORD_DEFAULT);
                        $insertAdviser          = mysqli_query($db, "INSERT INTO tbl_faculties (img, faculty_firstname, faculty_middlename, faculty_lastname, faculty_no, position, department_id , role, status, activation_code, email, username, password, created_at) VALUES ('$image', '$fname', '$mname', '$lname', '$faculty_no', '$position', '$department', '$role', '$status', '', '$email', '$username', '$hashedPwd', CURRENT_TIMESTAMP)") or die(mysqli_error($db));
                        $_SESSION['successAdd'] = true;
                        header("location: ../add.adviser.php");
                    } else {
                        $_SESSION['notMatch'] = true;
                        header("location: ../add.adviser.php");
                    }
                } else {
                    $_SESSION['fill'] = true;
                    header("location: ../add.adviser.php");
                }
            } else {
                $_SESSION['fill-Uinfo'] = true;
                header("location: ../add.adviser.php");
            }
        } else {
            $_SESSION['usernameExist'] = true;
            header("location: ../add.adviser.php");
        }
    }
}