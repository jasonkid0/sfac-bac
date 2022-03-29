<?php
require '../../../includes/conn.php';
session_start();

$account_id = $_SESSION['account_id'];

if (isset($_POST['saveImg'])) {
    if (!empty($_FILES['image']['tmp_name'])) {
        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $name  = $_SESSION['name'] . " <br> (" . $_SESSION['role'] . ")";

        $updateImg = mysqli_query($db, "UPDATE tbl_accounting SET img = '$image', updated_by = '$name', last_updated = CURRENT_TIMESTAMP WHERE account_id = '$account_id'") or die(mysqli_error($db));
        $_SESSION['successImg'] = true;
        header("location: ../edit.accounting.php?account_id=" . $account_id);
    } else {
        $_SESSION['emptyImg'] = true;
        header("location: ../edit.accounting.php?account_id=" . $account_id);
    }
}


if (isset($_POST['save'])) {

    $lname    = mysqli_real_escape_string($db, $_POST['lname']);
    $fname    = mysqli_real_escape_string($db, $_POST['fname']);
    $mname    = mysqli_real_escape_string($db, $_POST['mname']);
    $email    = mysqli_real_escape_string($db, $_POST['email']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $name  = $_SESSION['name'] . " <br> (" . $_SESSION['role'] . ")";

    $getAllUsername = mysqli_query($db, "SELECT username FROM tbl_admissions WHERE username = '$username' UNION ALL SELECT username FROM tbl_deans WHERE username = '$username' UNION ALL SELECT username FROM tbl_faculties WHERE username = '$username' UNION ALL SELECT username FROM tbl_admins WHERE username = '$username' UNION ALL SELECT username FROM tbl_students WHERE username = '$username' UNION ALL SELECT username FROM tbl_presidents WHERE username = '$username' UNION ALL SELECT username FROM tbl_super_admins WHERE username = '$username' UNION ALL SELECT username FROM tbl_faculties_staff WHERE username = '$username'") or die(mysqli_error($db));
    $check = mysqli_num_rows($getAllUsername);

    if ($check == 0) {
        $q = $db->query("SELECT * FROM tbl_accounting WHERE username = '$username'") or die($db->error);
        $check2 = mysqli_num_rows($q);
        while ($row = mysqli_fetch_array($q)) {
            $getID = $row['account_id'];
        }
        if ($getID == $account_id || $check2 < 1) {

            $updateInfo = mysqli_query($db, " UPDATE tbl_accounting SET account_lastname='$lname',account_firstname='$fname', account_middlename='$mname', email='$email', username='$username', updated_by = '$name', last_updated = CURRENT_TIMESTAMP WHERE account_id = '$account_id' ") or die(mysqli_error($db));
            $_SESSION['successUpdate'] = true;
            header("location: ../edit.accounting.php?account_id=" . $account_id);
        } else {
            $_SESSION['usernameExist'] = true;
            if ($_SESSION['role'] == "Super Administrator") {
                header("location: ../edit.accounting.php?account_id=" . $account_id);
            } else {
                header("location: ../edit.accounting.php");
            }
        }
    } else {
        $_SESSION['usernameExist'] = true;
        if ($_SESSION['role'] == "Super Administrator") {
            header("location: ../edit.accounting.php?account_id=" . $account_id);
        } else {
            header("location: ../edit.accounting.php");
        }
    }
}

if (isset($_POST['savePass'])) {

    if ($_SESSION['role'] == "Accounting") {

        $oldpassword = mysqli_real_escape_string($db, $_POST['oldPass']);

        $checkPass = mysqli_query($db, "SELECT * FROM tbl_accounting WHERE account_id = '$account_id'");
        while ($row = mysqli_fetch_array($checkPass)) {
            $checkHashPass = password_verify($oldpassword, $row['password']);
            if (false == $checkHashPass) {
                $_SESSION['oldNotMatch'] = true;
                header("location: ../edit.accounting.php");
            } elseif (true == $checkHashPass) {

                $password = mysqli_real_escape_string($db, $_POST['password']);
                $confirmPass = mysqli_real_escape_string($db, $_POST['confirmPass']);
                $name  = $_SESSION['name'] . " <br> (" . $_SESSION['role'] . ")";

                if ($password == $confirmPass) {
                    $hashedPwd = password_hash($confirmPass, PASSWORD_DEFAULT);

                    $updatePass = mysqli_query($db, " UPDATE tbl_accounting SET password='$hashedPwd' , updated_by = '$name', last_updated = CURRENT_TIMESTAMP WHERE account_id = '$account_id'") or die(mysqli_error($db));
                    $_SESSION['successPass'] = true;
                    header("location: ../edit.accounting.php");
                } else {
                    $_SESSION['newNotMatch'] = true;
                    header("location: ../edit.accounting.php");
                }
            }
        }
    } else {
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $confirmPass = mysqli_real_escape_string($db, $_POST['confirmPass']);
        $name  = $_SESSION['name'] . " <br> (" . $_SESSION['role'] . ")";

        if ($password == $confirmPass) {
            $hashedPwd = password_hash($confirmPass, PASSWORD_DEFAULT);

            $updatePass = mysqli_query($db, " UPDATE tbl_accounting SET password='$hashedPwd' , updated_by = '$name', last_updated = CURRENT_TIMESTAMP WHERE account_id = '$account_id'") or die(mysqli_error($db));
            $_SESSION['successPass'] = true;
            header("location: ../edit.accounting.php?account_id=" . $account_id);
        } else {
            $_SESSION['newNotMatch'] = true;
            header("location: ../edit.accounting.php?account_id=" . $account_id);
        }
    }
}