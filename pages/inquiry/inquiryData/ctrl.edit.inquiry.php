<?php
include '../../../includes/conn.php';
session_start();

$or_id = $_SESSION['or_id'];

if (isset($_POST['submit'])) {

    // Profile data
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
    $lastschool   = mysqli_real_escape_string($db, $_POST['lastschool']);
    $last_school_type   = mysqli_real_escape_string($db, $_POST['last_school_type']);
    $last_level   = mysqli_real_escape_string($db, $_POST['last_level']);
    // $flastname    = mysqli_real_escape_string($db, $_POST['flastname']);
    // $ffirstname   = mysqli_real_escape_string($db, $_POST['ffirstname']);
    // $fmiddlename  = mysqli_real_escape_string($db, $_POST['fmiddlename']);
    // $fage         = mysqli_real_escape_string($db, $_POST['fage']);
    // $foccupation  = mysqli_real_escape_string($db, $_POST['foccupation']);
    // $mlastname    = mysqli_real_escape_string($db, $_POST['mlastname']);
    // $mfirstname   = mysqli_real_escape_string($db, $_POST['mfirstname']);
    // $mmiddlename  = mysqli_real_escape_string($db, $_POST['mmiddlename']);
    // $mage         = mysqli_real_escape_string($db, $_POST['mage']);
    // $moccupation  = mysqli_real_escape_string($db, $_POST['moccupation']);
    // $familyincome = mysqli_real_escape_string($db, $_POST['familyincome']);
    // $nosiblings   = mysqli_real_escape_string($db, $_POST['nosiblings']);
    // $glastname    = mysqli_real_escape_string($db, $_POST['glastname']);
    // $gfirstname   = mysqli_real_escape_string($db, $_POST['gfirstname']);
    // $gmiddlename  = mysqli_real_escape_string($db, $_POST['gmiddlename']);
    // $relationship = mysqli_real_escape_string($db, $_POST['relationship']);
    // $gaddress     = mysqli_real_escape_string($db, $_POST['gaddress']);

    // $elem         = mysqli_real_escape_string($db, $_POST['elem']);
    // $elemSY       = mysqli_real_escape_string($db, $_POST['elemSY']);
    // $elemAddress  = mysqli_real_escape_string($db, $_POST['elemAddress']);

    // $hs           = mysqli_real_escape_string($db, $_POST['hs']);
    // $hsSY         = mysqli_real_escape_string($db, $_POST['hsSY']);
    // $hsAddress    = mysqli_real_escape_string($db, $_POST['hsAddress']);
    
    // $courseYear  = mysqli_real_escape_string($db, $_POST['course-year']);
    // $lastSY       = mysqli_real_escape_string($db, $_POST['lastSY']);
    // $lastAddress  = mysqli_real_escape_string($db, $_POST['lastAddress']);
    // Account Details
    $username     = mysqli_real_escape_string($db, $_POST['username']);
    $password     = mysqli_real_escape_string($db, $_POST['password']);

    // Check Studno
    $studNoCheck = mysqli_query($db, "SELECT * FROM tbl_students WHERE stud_no = '$stud_no'") or die(mysqli_error($db));
    while ($row = mysqli_fetch_array($studNoCheck)) {
        $studNoResult = $row['stud_no'];
    }
    if (!empty($studNoResult)) {
        $_SESSION['stud_noExist'] = true;
        header("location: ../edit.inquiry.php?or_id=" . $or_id);
    } else {
        // If Username Exist
        $getAllUsername = mysqli_query($db, "SELECT username FROM tbl_admissions WHERE username = '$username' UNION ALL SELECT username FROM tbl_deans WHERE username = '$username' UNION ALL SELECT username FROM tbl_faculties WHERE username = '$username' UNION ALL SELECT username FROM tbl_admins WHERE username = '$username' UNION ALL SELECT username FROM tbl_students WHERE username = '$username' UNION ALL SELECT username FROM tbl_super_admins WHERE username = '$username' UNION ALL SELECT username FROM tbl_accounting WHERE username = '$username' UNION ALL SELECT username FROM tbl_faculties_staff WHERE username = '$username' UNION ALL SELECT username FROM tbl_presidents WHERE username = '$username'") or die(mysqli_error($db));
        $check = mysqli_num_rows($getAllUsername);
        if ($check == 0) {

            $update = mysqli_query($db, "UPDATE tbl_online_registrations SET status = 'Approved'  WHERE or_id = '$or_id'");

            $hashedPwd    = password_hash($password, PASSWORD_DEFAULT);

            $inquiryData = mysqli_query($db, "INSERT INTO tbl_students (img, stud_no, course_id, gender_id, lastname, firstname, middlename, address, birthdate, birthplace, age, religion, citizenship, civilstatus, contact, email, lastschool, username, password, curri, created_at, last_updated, updated_by, last_level, last_school_type) VALUES ('', '$stud_no', '$course', '$gender', '$lastname', '$firstname', '$middlename', '$address', '$birthdate', '$birthplace', '$age', '$religion', '$citizenship', '$civilstatus', '$contact', '$email', '$lastschool','$username', '$hashedPwd','',CURRENT_TIMESTAMP,'','', '$last_level', '$last_school_type') ") or die(mysqli_error($db));
            $_SESSION['inquiryAdmitted'] = true;
            header("location: ../list.inquiry.php");
        } else {
            $_SESSION['usernameExist'] = true;
            header("location: ../edit.inquiry.php?or_id=" . $or_id);
        }
    }
}

// flastname, ffirstname, fmiddlename, fage, foccupation, mlastname, mfirstname, mmiddlename, mage, moccupation, familyincome, nosiblings, glastname, gfirstname, gmiddlename, relationship, gaddress, elem, elemSY, elemAddress, hs, hsSY, hsAddress, lastschool, course_year, lastSY, lastAddress, activation_code,

// '$flastname', '$ffirstname', '$fmiddlename', '$fage', '$foccupation', '$mlastname', '$mfirstname', '$mmiddlename', '$mage', '$moccupation', '$familyincome', '$nosiblings', '$glastname', '$gfirstname', '$gmiddlename', '$relationship', '$gaddress', '$elem', '$elemSY', '$elemAddress', '$hs', '$hsSY', '$hsAddress', '$lastschool', '$courseYear', '$lastSY', '$lastAddress', '',