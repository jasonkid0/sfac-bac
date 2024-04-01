<?php
include '../../../includes/conn.php';
session_start();
$stud_id = $_SESSION['stud_id'];

if (isset($_POST['submit'])) {

    // $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $stud_no      = mysqli_real_escape_string($db, $_POST['stud_no']);
    $course       = mysqli_real_escape_string($db, $_POST['courses']);
    $gender       = mysqli_real_escape_string($db, $_POST['gender']);
    $lastname     = mysqli_real_escape_string($db, $_POST['lastname']);
    $firstname    = mysqli_real_escape_string($db, $_POST['firstname']);
    $middlename   = mysqli_real_escape_string($db, $_POST['middlename']);
    $address      = mysqli_real_escape_string($db, $_POST['address']);
    $birthdate    = mysqli_real_escape_string($db, $_POST['birthdate']);
    $birthplace   = mysqli_real_escape_string($db, $_POST['birthplace']);
    $age          = mysqli_real_escape_string($db, $_POST['age']);
    $religion     = mysqli_real_escape_string($db, $_POST['religion']);
    $citizenship  = mysqli_real_escape_string($db, $_POST['citizenship']);
    $civilstatus  = mysqli_real_escape_string($db, $_POST['civilstatus']);
    $contact      = mysqli_real_escape_string($db, $_POST['contact']);
    $email        = mysqli_real_escape_string($db, $_POST['email']);
    $flastname    = mysqli_real_escape_string($db, $_POST['flastname']);
    $ffirstname   = mysqli_real_escape_string($db, $_POST['ffirstname']);
    $fmiddlename  = mysqli_real_escape_string($db, $_POST['fmiddlename']);
    $fage         = mysqli_real_escape_string($db, $_POST['fage']);
    $foccupation  = mysqli_real_escape_string($db, $_POST['foccupation']);
    $mlastname    = mysqli_real_escape_string($db, $_POST['mlastname']);
    $mfirstname   = mysqli_real_escape_string($db, $_POST['mfirstname']);
    $mmiddlename  = mysqli_real_escape_string($db, $_POST['mmiddlename']);
    $mage         = mysqli_real_escape_string($db, $_POST['mage']);
    $moccupation  = mysqli_real_escape_string($db, $_POST['moccupation']);
    $familyincome = mysqli_real_escape_string($db, $_POST['familyincome']);
    $nosiblings   = mysqli_real_escape_string($db, $_POST['nosiblings']);
    $glastname    = mysqli_real_escape_string($db, $_POST['glastname']);
    $gfirstname   = mysqli_real_escape_string($db, $_POST['gfirstname']);
    $gmiddlename  = mysqli_real_escape_string($db, $_POST['gmiddlename']);
    $goccupation  = mysqli_real_escape_string($db, $_POST['goccupation']);
    $relationship = mysqli_real_escape_string($db, $_POST['relationship']);
    $gaddress     = mysqli_real_escape_string($db, $_POST['gaddress']);
    $elem         = mysqli_real_escape_string($db, $_POST['elem']);
    $elemSY       = mysqli_real_escape_string($db, $_POST['elemSY']);
    $elemAddress  = mysqli_real_escape_string($db, $_POST['elemAddress']);
    $hs           = mysqli_real_escape_string($db, $_POST['hs']);
    $hsSY         = mysqli_real_escape_string($db, $_POST['hsSY']);
    $hsAddress    = mysqli_real_escape_string($db, $_POST['hsAddress']);
    $lastschool   = mysqli_real_escape_string($db, $_POST['lastschool']);
    $course_year  = mysqli_real_escape_string($db, $_POST['course-year']);
    $lastSY       = mysqli_real_escape_string($db, $_POST['lastSY']);
    $lastAddress  = mysqli_real_escape_string($db, $_POST['lastAddress']);
    $updated_by = $_SESSION['name'] . " <br> (" . $_SESSION['role'] . ")";


    // check Student number
    $result = $db->query("SELECT * FROM tbl_students WHERE stud_no = '$stud_no'") or die($db->error);
    $count = $result->num_rows;
    while ($row = $result->fetch_array()) {
        $checkStud = $row['stud_id'];
    }
    // check schoolyear course
    $result2 = $db->query("SELECT * FROM tbl_schoolyears WHERE stud_id = '$stud_id' AND ay_id = '$_SESSION[AC]' AND sem_id = '$_SESSION[S]'") or die($db->error);
    $count2 = $result2->num_rows;

    if ($count < 1 || $checkStud == $stud_id) {
        if ('Registrar' == $_SESSION['role'] || $_SESSION['role'] == 'Adviser' || $_SESSION['role'] == 'Super Administrator') {
            $query = mysqli_query($db, "UPDATE tbl_students SET stud_no = '$stud_no', course_id = '$course', gender_id = '$gender', lastname = '$lastname', firstname = '$firstname', middlename = '$middlename', address = '$address', birthdate = '$birthdate', birthplace = '$birthplace', age = '$age', religion = '$religion', citizenship = '$citizenship', civilstatus = '$civilstatus', contact = '$contact', email = '$email', flastname = '$flastname', ffirstname = '$ffirstname',fmiddlename = '$fmiddlename', fage = '$fage', foccupation = '$foccupation', mlastname = '$mlastname', mfirstname = '$mfirstname', mmiddlename = '$mmiddlename', mage ='$mage', moccupation = '$moccupation', familyincome = '$familyincome', nosiblings = '$nosiblings', glastname = '$glastname', gfirstname = '$gfirstname', gmiddlename = '$gmiddlename', goccupation = '$goccupation', relationship = '$relationship', gaddress = '$gaddress', elem = '$elem', elemSY = '$elemSY', elemAddress = '$elemAddress', hs = '$hs', hsSY = '$hsSY', hsAddress = '$hsAddress', lastschool = '$lastschool', course_year = '$course_year', lastSY = '$lastSY', lastAddress = '$lastAddress', updated_by = '$updated_by', last_updated = CURRENT_TIMESTAMP WHERE stud_id = '$stud_id' ") or die(mysqli_error($db));
            if ($count2 > 0) {
                $query2 = $db->query("UPDATE tbl_schoolyears SET course_id = '$course' WHERE stud_id = '$stud_id' AND ay_id = '$_SESSION[AC]' AND sem_id = '$_SESSION[S]'") or die($db->error);
            }
            $_SESSION['successUpdate'] = true;
            header("location: ../edit.student.php?stud_id=" . $stud_id);
        } else {
            $query = mysqli_query($db, "UPDATE tbl_students SET course_id = '$course', gender_id = '$gender', lastname = '$lastname', firstname = '$firstname', middlename = '$middlename', address = '$address', birthdate = '$birthdate', birthplace = '$birthplace', age = '$age', religion = '$religion', citizenship = '$citizenship', civilstatus = '$civilstatus', contact = '$contact', email = '$email', flastname = '$flastname', ffirstname = '$ffirstname',fmiddlename = '$fmiddlename', fage = '$fage', foccupation = '$foccupation', mlastname = '$mlastname', mfirstname = '$mfirstname', mmiddlename = '$mmiddlename', mage ='$mage', moccupation = '$moccupation', familyincome = '$familyincome', nosiblings = '$nosiblings', glastname = '$glastname', gfirstname = '$gfirstname', gmiddlename = '$gmiddlename', goccupation = '$goccupation', relationship = '$relationship', gaddress = '$gaddress', elem = '$elem', elemSY = '$elemSY', elemAddress = '$elemAddress', hs = '$hs', hsSY = '$hsSY', hsAddress = '$hsAddress', lastschool = '$lastschool', course_year = '$course_year', lastSY = '$lastSY', lastAddress = '$lastAddress', updated_by = '$updated_by', last_updated = CURRENT_TIMESTAMP WHERE stud_id = '$stud_id' ") or die(mysqli_error($db));
            $_SESSION['successUpdate'] = true;
            header("location: ../edit.student.php");
        }
    } else {
        $_SESSION['stud_noExist'] = true;
        if ($_SESSION['role'] == "Registrar" || $_SESSION['role'] == 'Adviser' || $_SESSION['role'] == 'Super Administrator') {
            header("location: ../edit.student.php?stud_id=" . $stud_id);
        } else {
            header("location: ../edit.student.php");
        }
    }
}


if (isset($_POST['saveImg'])) {

    if (!empty($_FILES['image']['tmp_name'])) {
        $image   = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $updated_by = $_SESSION['name'] . " <br> (" . $_SESSION['role'] . ")";
        
        if ($_FILES['image']['size'] < 1000000) {
        $query1 = mysqli_query($db, "UPDATE tbl_students SET img = '$image', updated_by = '$updated_by', last_updated = CURRENT_TIMESTAMP WHERE stud_id = '$stud_id' ") or die(mysqli_error($db));
        $_SESSION['successImg'] = true;
        } else {
            $_SESSION['ImgSizeError'] = true;
        }
        if ($_SESSION['role'] == "Registrar" || $_SESSION['role'] == 'Adviser' || $_SESSION['role'] == 'Super Administrator') {
            header("location: ../edit.student.php?stud_id=" . $stud_id);
        } else {
            header("location: ../edit.student.php");
        }
    } else {
        $_SESSION['emptyImg'] = true;
        if ($_SESSION['role'] == "Registrar" || $_SESSION['role'] == 'Adviser' || $_SESSION['role'] == 'Super Administrator') {
            header("location: ../edit.student.php?stud_id=" . $stud_id);
        } else {
            header("location: ../edit.student.php");
        }
    }
}


if (isset($_POST['save_account'])) {

    $username     = mysqli_real_escape_string($db, $_POST['username']);
    $password     = mysqli_real_escape_string($db, $_POST['password']);
    $hashedPwd    = password_hash($password, PASSWORD_DEFAULT);
    $updated_by = $_SESSION['name'] . " <br> (" . $_SESSION['role'] . ")";


    $getAllUsername = mysqli_query($db, "SELECT username FROM tbl_admissions WHERE username = '$username' UNION ALL SELECT username FROM tbl_deans WHERE username = '$username' UNION ALL SELECT username FROM tbl_faculties WHERE username = '$username' UNION ALL SELECT username FROM tbl_admins WHERE username = '$username' UNION ALL SELECT username FROM tbl_presidents WHERE username = '$username' UNION ALL SELECT username FROM tbl_super_admins WHERE username = '$username' UNION ALL SELECT username FROM tbl_accounting WHERE username = '$username' UNION ALL SELECT username FROM tbl_faculties_staff WHERE username = '$username'") or die(mysqli_error($db));
    $check = mysqli_num_rows($getAllUsername);

    if ($check == 0) {
        $q = $db->query("SELECT * FROM tbl_students WHERE username = '$username'") or die($db->error);
        $check2 = mysqli_num_rows($q);
        while ($row = mysqli_fetch_array($q)) {
            $getID = $row['stud_id'];
        }
        if ($getID == $stud_id || $check2 < 1) {

            $query = $db->query("UPDATE tbl_students SET username = '$username', password = '$hashedPwd' , updated_by = '$updated_by', last_updated = CURRENT_TIMESTAMP WHERE stud_id = '$stud_id'") or die($db->error);
            $_SESSION['successUpdate'] = true;
            if ($_SESSION['role'] == "Registrar" || $_SESSION['role'] == 'Adviser' || $_SESSION['role'] == 'Super Administrator') {
                header("location: ../edit.student.php?stud_id=" . $stud_id);
            } else {
                header("location: ../edit.student.php");
            }
        } else {
            $_SESSION['usernameExist'] = true;
            if ($_SESSION['role'] == "Registrar" || $_SESSION['role'] == 'Adviser' || $_SESSION['role'] == 'Super Administrator') {
                header("location: ../edit.student.php?stud_id=" . $stud_id);
            } else {
                header("location: ../edit.student.php");
            }
        }
    } else {
        $_SESSION['usernameExist'] = true;
        if ($_SESSION['role'] == "Registrar" || $_SESSION['role'] == 'Adviser' || $_SESSION['role'] == 'Super Administrator') {
            header("location: ../edit.student.php?stud_id=" . $stud_id);
        } else {
            header("location: ../edit.student.php");
        }
    }
}