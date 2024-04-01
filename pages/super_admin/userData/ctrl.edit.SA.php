<?php
require '../../../includes/conn.php';
session_start();

$sa_id = $_SESSION['userid'];

if (isset($_POST['saveImg'])) {

    if (!empty($_FILES['image']['tmp_name'])) {
        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

        $updateImg = mysqli_query($db, "UPDATE tbl_super_admins SET img = '$image' WHERE sa_id = '$sa_id'") or die(mysqli_error($db));
        $_SESSION['successImg'] = true;
        header("location: ../edit.SA.php");
    } else {
        $_SESSION['emptyImg'] = true;
        header("location: ../edit.SA.php");
    }
}

if (isset($_POST['save'])) {

    $name = mysqli_real_escape_string($db, $_POST['name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $username = mysqli_real_escape_string($db, $_POST['username']);

    $getAllUsername = mysqli_query($db, "SELECT username FROM tbl_admissions WHERE username = '$username' UNION ALL SELECT username FROM tbl_deans WHERE username = '$username' UNION ALL SELECT username FROM tbl_faculties WHERE username = '$username' UNION ALL SELECT username FROM tbl_admins WHERE username = '$username' UNION ALL SELECT username FROM tbl_students WHERE username = '$username' UNION ALL SELECT username FROM tbl_presidents WHERE username = '$username' UNION ALL SELECT username FROM tbl_accounting WHERE username = '$username' UNION ALL SELECT username FROM tbl_faculties_staff WHERE username = '$username'") or die(mysqli_error($db));
    $check = mysqli_num_rows($getAllUsername);

    if ($check == 0) {
        $q = $db->query("SELECT * FROM tbl_super_admins WHERE username = '$username'") or die($db->error);
        $check2 = mysqli_num_rows($q);
        while ($row = mysqli_fetch_array($q)) {
            $getID = $row['sa_id'];
        }
        if ($getID == $sa_id || $check2 < 1) {

            $updateInfo = mysqli_query($db, "UPDATE tbl_super_admins SET name = '$name', email='$email', username='$username' WHERE sa_id = '$sa_id'") or die(mysqli_error($db));
            $_SESSION['successUpdate'] = true;
            header("location: ../edit.SA.php");
        } else {
            $_SESSION['usernameExist'] = true;
            header("location: ../edit.SA.php");
        }
    } else {
        $_SESSION['usernameExist'] = true;
        header("location: ../edit.SA.php");
    }
}

if (isset($_POST['savePass'])) {

    $oldpassword = mysqli_real_escape_string($db, $_POST['oldPass']);

    $checkPass = mysqli_query($db, "SELECT * FROM tbl_super_admins WHERE sa_id = '$sa_id'");
    while ($row = mysqli_fetch_array($checkPass)) {
        $checkHashPass = password_verify($oldpassword, $row['password']);
        if ($checkHashPass == false) {
            $_SESSION['oldNotMatch'] = true;
            header("location: ../edit.SA.php");
        } elseif ($checkHashPass == true) {

            $password = mysqli_real_escape_string($db, $_POST['password']);
            $confirmPass = mysqli_real_escape_string($db, $_POST['confirmPass']);

            if ($password == $confirmPass) {
                $hashedPwd = password_hash($confirmPass, PASSWORD_DEFAULT);

                $updatePass = mysqli_query($db, " UPDATE tbl_super_admins SET password='$hashedPwd' WHERE sa_id = '$sa_id'") or die(mysqli_error($db));
                $_SESSION['successPass'] = true;
                header("location: ../edit.SA.php");
            } else {
                $_SESSION['newNotMatch'] = true;
                header("location: ../edit.SA.php");
            }
        }
    }
}