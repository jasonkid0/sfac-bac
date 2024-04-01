<?php
include '../../../includes/conn.php';
session_start();

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../PHPMailer/src/Exception.php';
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';

if (isset($_POST['submit']) && !empty($_SESSION['username'])) {
    // username
    $username = $_SESSION['username'];
    // input element | name
    $first = $db->real_escape_string($_POST['fi']);
    $second = $db->real_escape_string($_POST['se']);
    $third = $db->real_escape_string($_POST['th']);
    $fourth = $db->real_escape_string($_POST['fo']);
    $fifth = $db->real_escape_string($_POST['fif']);
    $sixth = $db->real_escape_string($_POST['si']);

    // merge | verfication code
    $code = $first . $second . $third . $fourth . $fifth . $sixth;
    if (!empty($code)) {

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

        // compare the code
        if ($numrow > 0) {
            while ($row = $super_admin->fetch_array()) {
                if ($row['activation_code'] != $code) {
                    $_SESSION['error_code'] = true;
                    header("location: ../verification.php");
                    exit();
                } else {
                    $_SESSION['code'] = $code;
                    header("location: ../change_password.php");
                }
            }
        } elseif ($numrow1 > 0) {
            while ($row = $dean->fetch_array()) {
                if ($row['activation_code'] != $code) {
                    $_SESSION['error_code'] = true;
                    header("location: ../verification.php");
                    exit();
                } else {
                    $_SESSION['code'] = $code;
                    header("location: ../change_password.php");
                }
            }
        } elseif ($numrow2 > 0) {
            while ($row = $admission->fetch_array()) {
                if ($row['activation_code'] != $code) {
                    $_SESSION['error_code'] = true;
                    header("location: ../verification.php");
                    exit();
                } else {
                    $_SESSION['code'] = $code;
                    header("location: ../change_password.php");
                }
            }
        } elseif ($numrow3 > 0) {
            while ($row = $accounting->fetch_array()) {
                if ($row['activation_code'] != $code) {
                    $_SESSION['error_code'] = true;
                    header("location: ../verification.php");
                    exit();
                } else {
                    $_SESSION['code'] = $code;
                    header("location: ../change_password.php");
                }
            }
        } elseif ($numrow4 > 0) {
            while ($row = $admin->fetch_array()) {
                if ($row['activation_code'] != $code) {
                    $_SESSION['error_code'] = true;
                    header("location: ../verification.php");
                    exit();
                } else {
                    $_SESSION['code'] = $code;
                    header("location: ../change_password.php");
                }
            }
        } elseif ($numrow5 > 0) {
            while ($row = $adviser->fetch_array()) {
                if ($row['activation_code'] != $code) {
                    $_SESSION['error_code'] = true;
                    header("location: ../verification.php");
                    exit();
                } else {
                    $_SESSION['code'] = $code;
                    header("location: ../change_password.php");
                }
            }
        } elseif ($numrow6 > 0) {
            while ($row = $student->fetch_array()) {
                if ($row['activation_code'] != $code) {
                    $_SESSION['error_code'] = true;
                    header("location: ../verification.php");
                    exit();
                } else {
                    $_SESSION['code'] = $code;
                    header("location: ../change_password.php");
                }
            }
        } elseif ($numrow7 > 0) {
            while ($row = $president->fetch_array()) {
                if ($row['activation_code'] != $code) {
                    $_SESSION['error_code'] = true;
                    header("location: ../verification.php");
                    exit();
                } else {
                    $_SESSION['code'] = $code;
                    header("location: ../change_password.php");
                }
            }
        } elseif ($numrow8 > 0) {
            while ($row = $teacher->fetch_array()) {
                if ($row['activation_code'] != $code) {
                    $_SESSION['error_code'] = true;
                    header("location: ../verification.php");
                    exit();
                } else {
                    $_SESSION['code'] = $code;
                    header("location: ../change_password.php");
                }
            }
        } else {
            $_SESSION['invalid_email'] = true;
            header("location: ../reset_password.php");
            exit();
        }
    } else {
        $_SESSION['empty_code'] = true;
        header('location: ../verification.php');
    }
} elseif (!empty($_GET['send']) && !empty($_SESSION['username'])) {

    // username | radio button
    $username = $db->real_escape_string($_SESSION['username']);

    // email | SESSION
    $email = $db->real_escape_string($_SESSION['email']);


    // Insert or Update random number for activation code
    $randNum = rand(100000, 999999);

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

    // Update or Insert random number
    if ($numrow > 0) {
        $query1 = $db->query("UPDATE tbl_super_admins SET activation_code = '$randNum' WHERE username = '$username'");
    } elseif ($numrow1 > 0) {
        $query1 = $db->query("UPDATE tbl_deans SET activation_code = '$randNum' WHERE username = '$username'");
    } elseif ($numrow2 > 0) {
        $query1 = $db->query("UPDATE tbl_admissions SET activation_code = '$randNum' WHERE username = '$username'");
    } elseif ($numrow3 > 0) {
        $query1 = $db->query("UPDATE tbl_accounting SET activation_code = '$randNum' WHERE username = '$username'");
    } elseif ($numrow4 > 0) {
        $query1 = $db->query("UPDATE tbl_admins SET activation_code = '$randNum' WHERE username = '$username'");
    } elseif ($numrow5 > 0) {
        $query1 = $db->query("UPDATE tbl_faculties SET activation_code = '$randNum' WHERE username = '$username'");
    } elseif ($numrow6 > 0) {
        $query1 = $db->query("UPDATE tbl_students SET activation_code = '$randNum' WHERE username = '$username'");
    } elseif ($numrow7 > 0) {
        $query1 = $db->query("UPDATE tbl_presidents SET activation_code = '$randNum' WHERE username = '$username'");
    } elseif ($numrow8 > 0) {
        $query1 = $db->query("UPDATE tbl_faculties_staff SET activation_code = '$randNum' WHERE username = '$username'");
    } else {
        $_SESSION['invalid_email'] = true;
        header("location: ../reset_password.php");
        exit();
    }


    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'sfacbacoor1981@gmail.com';                     //SMTP username
        $mail->Password   = '03132804Jason';                               //SMTP password 
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('sfacbacoor1981@gmail.com', 'SFAC-Bacoor');
        $mail->addAddress($email);     //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Reset Password | Verification Code';
        $mail->Body    = '
            Hello ' . $username . '<br><br>
            Verification Code: <strong><h2>' . $randNum . '</h2></strong>
            This 6-digit is to reset the Password of your account. Please copy and enter it in the request code. <br><br>
            SFAC-Bacoor Representatives will never ask for this code. For your protection, please do not share this code with anyone.<br><br>
            Thanks,<br>
            Saint Francis of Assisi College - Bacoor<br>
            All rights reserved.';
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();
        $_SESSION['username'] = $username;
        $_SESSION['sent_code'] = true;
        header("location: ../verification.php");
    } catch (Exception $e) {
        echo "HI" . $email . "Please contact the Administrator of SFAC - Bacoor";
    }
} else {
    header("location: ../reset_password.php");
}