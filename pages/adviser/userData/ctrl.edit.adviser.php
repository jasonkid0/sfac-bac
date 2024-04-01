<?php
require '../../../includes/conn.php';
session_start();
$faculty_id = $_SESSION['faculty_id'];

if (isset($_POST['saveImg'])) {

    if (!empty($_FILES['image']['tmp_name'])) {
        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $updated_by = $_SESSION['name'] . " <br> (" . $_SESSION['role'] . ")";

        $updateImg = mysqli_query($db, "UPDATE tbl_faculties SET img = '$image', updated_by = '$updated_by', last_updated = CURRENT_TIMESTAMP WHERE faculty_id = '$faculty_id'") or die(mysqli_error($db));
        $_SESSION['successImg'] = true;
        header("location: ../edit.adviser.php?faculty_id=" . $faculty_id);
    } else {
        $_SESSION['emptyImg'] = true;
        header("location: ../edit.adviser.php?faculty_id=" . $faculty_id);
    }
}

if (isset($_POST['save'])) {

    $faculty_no = mysqli_real_escape_string($db, $_POST['faculty_no']);
    $department_id = mysqli_real_escape_string($db, $_POST['department']);
    $role = mysqli_real_escape_string($db, $_POST['role']);
    $position = mysqli_real_escape_string($db, $_POST['position']);
    $status = mysqli_real_escape_string($db, $_POST['status']);
    $lname = mysqli_real_escape_string($db, $_POST['lname']);
    $fname = mysqli_real_escape_string($db, $_POST['fname']);
    $mname = mysqli_real_escape_string($db, $_POST['mname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $username = mysqli_real_escape_string($db, $_POST['username']);;
    $updated_by = $_SESSION['name'] . " <br> (" . $_SESSION['role'] . ")";

    $getAllUsername = mysqli_query($db, "SELECT username FROM tbl_admissions WHERE username = '$username' UNION ALL SELECT username FROM tbl_deans WHERE username = '$username' UNION ALL SELECT username FROM tbl_super_admins WHERE username = '$username' UNION ALL SELECT username FROM tbl_admins WHERE username = '$username' UNION ALL SELECT username FROM tbl_students WHERE username = '$username' UNION ALL SELECT username FROM tbl_presidents WHERE username = '$username' UNION ALL SELECT username FROM tbl_accounting WHERE username = '$username' UNION ALL SELECT username FROM tbl_faculties_staff WHERE username = '$username'") or die(mysqli_error($db));
    $check = mysqli_num_rows($getAllUsername);

    if ($check == 0) {
        $q = $db->query("SELECT * FROM tbl_faculties WHERE username = '$username'") or die($db->error);
        $check2 = mysqli_num_rows($q);
        while ($row = mysqli_fetch_array($q)) {
            $getID = $row['faculty_id'];
        }
        if ($getID == $faculty_id || $check2 < 1) {
            $updateInfo = mysqli_query($db, " UPDATE tbl_faculties SET faculty_lastname='$lname',faculty_firstname='$fname', faculty_middlename='$mname', faculty_no = '$faculty_no', position = '$position', department_id = '$department_id', role = '$role', status = '$status', email='$email', username='$username', updated_by = '$updated_by', last_updated = CURRENT_TIMESTAMP WHERE faculty_id = '$faculty_id'") or die(mysqli_error($db));
            $_SESSION['successUpdate'] = true;
            if ($_SESSION['role'] == "Super Administrator") {
                header("location: ../edit.adviser.php?faculty_id=" . $faculty_id);
            } else {
                header("location: ../edit.adviser.php");
            }
        } else {
            $_SESSION['usernameExist'] = true;
            if ($_SESSION['role'] == "Super Administrator") {
                header("location: ../edit.adviser.php?faculty_id=" . $faculty_id);
            } else {
                header("location: ../edit.adviser.php");
            }
        }
    } else {
        $_SESSION['usernameExist'] = true;
        if ($_SESSION['role'] == "Super Administrator") {
            header("location: ../edit.adviser.php?faculty_id=" . $faculty_id);
        } else {
            header("location: ../edit.adviser.php");
        }
    }
}

if (isset($_POST['savePass'])) {

    if ($_SESSION['role'] == "Adviser") {

        $oldpassword = mysqli_real_escape_string($db, $_POST['oldPass']);

        $checkPass = mysqli_query($db, "SELECT * FROM tbl_faculties WHERE faculty_id = '$faculty_id'");
        while ($row = mysqli_fetch_array($checkPass)) {
            $checkHashPass = password_verify($oldpassword, $row['password']);
            if ($checkHashPass == false) {
                $_SESSION['oldNotMatch'] = true;
                header("location: ../edit.adviser.php");
            } elseif ($checkHashPass == true) {

                $password = mysqli_real_escape_string($db, $_POST['password']);
                $confirmPass = mysqli_real_escape_string($db, $_POST['confirmPass']);
                $updated_by = $_SESSION['name'] . " <br> (" . $_SESSION['role'] . ")";

                if ($password == $confirmPass) {
                    $hashedPwd = password_hash($confirmPass, PASSWORD_DEFAULT);

                    $updatePass = mysqli_query($db, "UPDATE tbl_faculties SET password='$hashedPwd', updated_by = '$updated_by', last_updated = CURRENT_TIMESTAMP WHERE faculty_id = '$faculty_id'") or die(mysqli_error($db));
                    $_SESSION['successPass'] = true;
                    header("location: ../edit.adviser.php");
                } else {
                    $_SESSION['newNotMatch'] = true;
                    header("location: ../edit.adviser.php");
                }
            }
        }
    } else {

        $password = mysqli_real_escape_string($db, $_POST['password']);
        $confirmPass = mysqli_real_escape_string($db, $_POST['confirmPass']);
        $updated_by = $_SESSION['name'] . " <br> (" . $_SESSION['role'] . ")";

        if ($password == $confirmPass) {
            $hashedPwd = password_hash($confirmPass, PASSWORD_DEFAULT);

            $updatePass = mysqli_query($db, "UPDATE tbl_faculties SET password='$hashedPwd', updated_by = '$updated_by', last_updated = CURRENT_TIMESTAMP WHERE faculty_id = '$faculty_id'") or die(mysqli_error($db));
            $_SESSION['successPass'] = true;
            header("location: ../edit.adviser.php?faculty_id=" . $faculty_id);
        } else {
            $_SESSION['newNotMatch'] = true;
            header("location: ../edit.adviser.php?faculty_id=" . $faculty_id);
        }
    }
}