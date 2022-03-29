<?php
require '../../../includes/conn.php';
session_start();

if (isset($_POST['signin']) || isset($_SESSION['confirm'])) {

    // forgot password | confirmation
    if (isset($_SESSION['confirm'])) {
        $username = $db->real_escape_string($_SESSION['username']);
        $password = $db->real_escape_string($_SESSION['password']);
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        unset($_SESSION['confirm']);
        unset($_SESSION['email']);
    } else {
        // sign in
        $username = $db->real_escape_string($_POST['username']);
        $password = $db->real_escape_string($_POST['password']);
    }

    // role 
    $super_admin = mysqli_query($db, "SELECT * FROM tbl_super_admins WHERE username = '$username'");
    $numrow      = mysqli_num_rows($super_admin);

    $dean    = mysqli_query($db, "SELECT * FROM tbl_deans WHERE username = '$username'");
    $numrow1 = mysqli_num_rows($dean);

    $admission = mysqli_query($db, "SELECT * FROM tbl_admissions WHERE username = '$username'");
    $numrow2   = mysqli_num_rows($admission);

    $accounting = mysqli_query($db, "SELECT * FROM tbl_accounting WHERE username = '$username'");
    $numrow3    = mysqli_num_rows($accounting);

    $admin   = mysqli_query($db, "SELECT * FROM tbl_admins WHERE username = '$username'");
    $numrow4 = mysqli_num_rows($admin);

    $adviser = mysqli_query($db, "SELECT * FROM tbl_faculties WHERE username = '$username'");
    $numrow5 = mysqli_num_rows($adviser);

    $student = mysqli_query($db, "SELECT * FROM tbl_students WHERE username = '$username'");
    $numrow6 = mysqli_num_rows($student);

    $president = mysqli_query($db, "SELECT * FROM tbl_presidents WHERE username = '$username'");
    $numrow7 = mysqli_num_rows($president);

    $teacher = mysqli_query($db, "SELECT * FROM tbl_faculties_staff WHERE username = '$username'");
    $numrow8 = mysqli_num_rows($teacher);



    if ($numrow > 0) {
        while ($row = mysqli_fetch_array($super_admin)) {
            $hashedPwdCheck = password_verify($password, $row['password']);
            if ($hashedPwdCheck == false) {
                $_SESSION['sessionP'] = true;
                header("location: ../sign-in.php");
                exit();
            } elseif ($hashedPwdCheck == true) {
                $_SESSION['role'] = "Super Administrator";
                $_SESSION['userid'] = $row['sa_id'];
                $_SESSION['name'] = $row['name'];
            }
            header("location: ../../dashboard/index.php");
        }
    } elseif ($numrow1 > 0) {
        while ($row = mysqli_fetch_array($dean)) {
            $hashedPwdCheck = password_verify($password, $row['password']);
            if ($hashedPwdCheck == false) {
                $_SESSION['sessionP'] = true;
                header("location: ../sign-in.php");
                exit();
            } elseif ($hashedPwdCheck == true) {
                $_SESSION['role'] = "Dean";
                $_SESSION['userid'] = $row['dean_id'];
                $_SESSION['name'] = $row['dean_lastname'] . ", " . $row['dean_firstname'];
            }
            header("location: ../../dashboard/index.php");
        }
    } elseif ($numrow2 > 0) {
        while ($row = mysqli_fetch_array($admission)) {
            $hashedPwdCheck = password_verify($password, $row['password']);
            if ($hashedPwdCheck == false) {
                $_SESSION['sessionP'] = true;
                header("location: ../sign-in.php");
                exit();
            } elseif ($hashedPwdCheck == true) {
                $_SESSION['role'] = "Admission";
                $_SESSION['userid'] = $row['admission_id'];
                $_SESSION['name'] = $row['admission_lastname'] . ", " . $row['admission_firstname'];
            }
            header("location: ../../dashboard/index.php");
        }
    } elseif ($numrow3 > 0) {
        while ($row = mysqli_fetch_array($accounting)) {
            $hashedPwdCheck = password_verify($password, $row['password']);
            if ($hashedPwdCheck == false) {
                $_SESSION['sessionP'] = true;
                header("location: ../sign-in.php");
                exit();
            } elseif ($hashedPwdCheck == true) {
                $_SESSION['role'] = "Accounting";
                $_SESSION['userid'] = $row['account_id'];
            }
            header("location: ../../dashboard/index.php");
        }
    } elseif ($numrow4 > 0) {
        while ($row = mysqli_fetch_array($admin)) {
            $hashedPwdCheck = password_verify($password, $row['password']);
            if ($hashedPwdCheck == false) {
                $_SESSION['sessionP'] = true;
                header("location: ../sign-in.php");
                exit();
            } elseif ($hashedPwdCheck == true) {
                $_SESSION['role'] = "Registrar";
                $_SESSION['userid'] = $row['admin_id'];
                $_SESSION['name'] = $row['admin_lastname'] . ", " . $row['admin_firstname'];
            }
            header("location: ../../dashboard/index.php");
        }
    } elseif ($numrow5 > 0) {
        while ($row = mysqli_fetch_array($adviser)) {
            $hashedPwdCheck = password_verify($password, $row['password']);
            if ($hashedPwdCheck == false) {
                $_SESSION['sessionP'] = true;
                header("location: ../sign-in.php");
                exit();
            } elseif ($hashedPwdCheck == true) {
                $_SESSION['role'] = "Adviser";
                $_SESSION['userid'] = $row['faculty_id'];
                $_SESSION['name'] = $row['faculty_lastname'] . ", " . $row['faculty_firstname'];
            }
            header("location: ../../dashboard/index.php");
        }
    } elseif ($numrow6 > 0) {
        while ($row = mysqli_fetch_array($student)) {
            $hashedPwdCheck = password_verify($password, $row['password']);
            if (false == $hashedPwdCheck) {
                $_SESSION['sessionP'] = true;
                header("location: ../sign-in.php");
                exit();
            } elseif (true == $hashedPwdCheck) {
                $_SESSION['role']   = "Student";
                $_SESSION['userid'] = $row['stud_id'];
                $_SESSION['name']   = $row['lastname'] . ", " . $row['firstname'];
            }
            header("location: ../../dashboard/index.php");
        }
    } elseif ($numrow7 > 0) {
        while ($row = mysqli_fetch_array($president)) {
            $hashedPwdCheck = password_verify($password, $row['password']);
            if (false == $hashedPwdCheck) {
                $_SESSION['sessionP'] = true;
                header("location: ../sign-in.php");
                exit();
            } elseif (true == $hashedPwdCheck) {
                $_SESSION['role']   = "President";
                $_SESSION['userid'] = $row['pres_id'];
                $_SESSION['name']   = $row['lastname'] . ", " . $row['firstname'];
            }
            header("location: ../../dashboard/index.php");
        }
    } elseif ($numrow8 > 0) {
        while ($row = mysqli_fetch_array($teacher)) {
            $hashedPwdCheck = password_verify($password, $row['password']);
            if (false == $hashedPwdCheck) {
                $_SESSION['sessionP'] = true;
                header("location: ../sign-in.php");
                exit();
            } elseif (true == $hashedPwdCheck) {

                $_SESSION['role']   = "Teacher";
                $_SESSION['userid'] = $row['faculty_id'];
                $_SESSION['name']   = $row['lastname'] . ", " . $row['firstname'];
            }
            header("location: ../../dashboard/index.php");
        }
    } else {
        $_SESSION['sessionUP'] = true;
        header("location: ../sign-in.php");
        exit();
    }
}