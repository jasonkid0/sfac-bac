<?php
session_start();
if (empty($_SESSION['role'])) {
    header("location: ./../../login/sign-in.php");
} else if (empty($_GET['stud_id'])) {
    header("location: ./../../error/error-404.php");
}
require '../../../includes/conn.php';
require('../../fpdf/fpdf.php');
// 

$stud_id = $_GET['stud_id'];

if ($_SESSION['role'] == "Student") {
    $stud_id = $_SESSION['stud_id'];
}

// Active Acadyear & Semester
$getAAcadYear = $db->query("SELECT * FROM tbl_active_acads AC LEFT JOIN tbl_acadyears A ON A.ay_id = AC.ay_id") or die($db->error);
while ($row = $getAAcadYear->fetch_array()) {
    $_SESSION['AC'] = $row['academic_year'];
    $_SESSION['AYear'] = $row['ay_id'];
}
$getASem = $db->query("SELECT * FROM tbl_active_sem ASEM LEFT JOIN tbl_semesters S ON S.sem_id = ASEM.sem_id") or die($db->error);
while ($row = $getASem->fetch_array()) {
    $_SESSION['S'] = $row['semester'];
    $_SESSION['ASem'] = $row['sem_id'];
}

class PDF extends FPDF
{

    // Page header

}

$pdf = new PDF('L', 'mm', array(165, 139));


$pdf->SetLeftMargin(13);
$pdf->SetRightMargin(10);
$pdf->SetAutoPageBreak(true, 8);
$pdf->AddPage();




// Logo(x axis, y axis, height, width)
$pdf->Image('../../../assets/img/logos/logo.png', 33, 9, 10, 10);
// text color


// font(font type,style,font size)
$pdf->SetFont('Arial', 'B', 9);
// Dummy cell

// //cell(width,height,text,border,end line,[align])
//     if ($_SESSION['userid'] != $_GET['stud_id']) {
//   header("location: ../404/404.php");
// }

$que = mysqli_query($db, "SELECT *,tbl_year_levels.year_id,tbl_schoolyears.sy_id FROM tbl_schoolyears
    LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
    LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
    LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
    LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id
    where tbl_schoolyears.stud_id = '$stud_id' and tbl_schoolyears.ay_id = '$_SESSION[AC]' and tbl_schoolyears.sem_id = '$_SESSION[S]'");

$ro = mysqli_fetch_array($que);

$pdf->SetY(5);
$pdf->Cell(30, 4, $ro['status'] . ' - Student', 0, 1);
$pdf->SetTextColor(255, 0, 0);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(151, 5, 'SAINT FRANCIS OF ASSISI COLLEGE', 0, 1, 'C');


// Line break
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial', '', 11, 'C');
// dummy cell
// //cell(width,height,text,border,end line,[align])
$test = utf8_decode("Piñas");
$pdf->Cell(151, 5, 'Las ' . $test . '- Taguig - Cavite - Alabang - Laguna', 0, 1, 'C');
// Line break
$pdf->Ln(2);
$pdf->SetFont('Arial', '', 11);
// dummy cell
// //cell(width,height,text,border,end line,[align])

$query = mysqli_query($db, "SELECT *,tbl_year_levels.year_id,tbl_schoolyears.sy_id FROM tbl_schoolyears
    LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
    LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
    LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
    LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id
    where tbl_schoolyears.stud_id = '$stud_id' and tbl_schoolyears.ay_id = '$_SESSION[AC]' and tbl_schoolyears.sem_id = '$_SESSION[S]'");
$row = mysqli_fetch_array($query);
$course_id = $row['course_id'];
$pdf->Cell(13, 4, 'Name:', 0, 0);
$lastname = utf8_decode($row['lastname']);
$firstname = utf8_decode($row['firstname']);
$middlename = utf8_decode($row['middlename']);
$pdf->Cell(35, 4, $lastname, 'B', 0, 'C');
$pdf->Cell(35, 4, $firstname, 'B', 0, 'C');
$pdf->Cell(35, 4, $middlename, 'B', 0, 'C');
$pdf->Cell(5);
$pdf->Cell(0, 4, $row['gender'], 'B', 1, 'C');

$pdf->Ln(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(13, 3, '', 0, 0);
$pdf->Cell(35, 3, '(Family Name)', 0, 0, 'C');
$pdf->Cell(35, 3, '(First Name)', 0, 0, 'C');
$pdf->Cell(35, 3, '(Middle Name)', 0, 0, 'C');
$pdf->Cell(5);
$pdf->Cell(0, 3, 'Gender', 0, 1, 'C');

$pdf->Ln(1);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(18, 4, 'Student No.', 0, 0);
$pdf->Cell(23, 4, $row['stud_no'], 'B', 0, 'C');
$pdf->Cell(2);
$pdf->Cell(20, 4, 'School Year:', 0, 0);
$pdf->Cell(20, 4, $_SESSION['AC'], 'B', 0, 'C');
$pdf->Cell(2);
$pdf->Cell(10, 4, 'Date:', 0, 0);
$pdf->Cell(20, 4, $row['date_enrolled'], 'B', 0, 'C');
$pdf->Cell(5);
$pdf->Cell(0, 4, 'Sem/Term:', 0, 1);

if ($_SESSION['S'] == 'First Semester') {
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(120, 4, '', 0, 0);
    $pdf->Cell(3, 3, '', 1, 0, 'C', true);
    $pdf->Cell(0, 3, '1st Semester', 0, 1);

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(20, 6, 'COURSE:', 'T,L,B', 0);
    $pdf->Cell(48, 6, $row['course_abv'], 'T,B', 0, 'R');
    $pdf->Cell(47, 6, $row['year_abv'], 'T,R,B', 0, 'L');
    $pdf->Cell(5);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(3, 3, '', 1, 0, 'C');
    $pdf->Cell(0, 3, '2nd Semester', 0, 1);

    $pdf->Cell(115, 3, '', 0, 0, 'C');
    $pdf->Cell(5);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(3, 3, '', 1, 0, 'C');
    $pdf->Cell(0, 3, 'Summer', 0, 1);
} elseif ($_SESSION['S'] == 'Second Semester') {
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(120, 4, '', 0, 0);
    $pdf->Cell(3, 3, '', 1, 0, 'C');
    $pdf->Cell(0, 3, '1st Semester', 0, 1);

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(20, 6, 'COURSE:', 'T,L,B', 0);
    $pdf->Cell(95, 6, $row['course_abv'] . ' ' . $row['year_abv'], 'T,R,B', 0, 'C');
    $pdf->Cell(5);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(3, 3, '', 1, 0, 'C', true);
    $pdf->Cell(0, 3, '2nd Semester', 0, 1);

    $pdf->Cell(115, 3, '', 0, 0, 'C');
    $pdf->Cell(5);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(3, 3, '', 1, 0, 'C');
    $pdf->Cell(0, 3, 'Summer', 0, 1);
} elseif ($_SESSION['S'] == 'Summer') {
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(120, 4, '', 0, 0);
    $pdf->Cell(3, 3, '', 1, 0, 'C');
    $pdf->Cell(0, 3, '1st Semester', 0, 1);

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(20, 6, 'COURSE:', 'T,L,B', 0);
    $pdf->Cell(95, 6, $row['course_abv'] . ' ' . $row['year_abv'], 'T,R,B', 0, 'C');
    $pdf->Cell(5);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(3, 3, '', 1, 0, 'C');
    $pdf->Cell(0, 3, '2nd Semester', 0, 1);

    $pdf->Cell(115, 3, '', 0, 0, 'C');
    $pdf->Cell(5);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(3, 3, '', 1, 0, 'C', true);
    $pdf->Cell(0, 3, 'Summer', 0, 1);
}

$pdf->Ln(4);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(40, 4, 'COURSE NUMBER', 'T,L', 0, 'C');
$pdf->Cell(10, 7, 'Units', 'T,L,B', 0, 'C');
$pdf->Cell(13, 7, 'Days', 'T,L,B', 0, 'C');
$pdf->Cell(22, 7, 'Time', 'T,L,B', 0, 'C');
$pdf->Cell(10, 7, 'Room', 'T,L,R,B', 0, 'C');
$pdf->Cell(17, 4, 'Final', 'T', 0, 'C');
$pdf->Cell(0, 7, 'Professor', 1, 0, 'C');
$pdf->Cell(0, 4, '', 0, 1);

$pdf->Cell(40, 3, '(SUBJECTS)', 'L,B', 0, 'C');
$pdf->Cell(55, 3, '', 0, 0);
$pdf->Cell(17, 3, 'Rating', 'B', 0, 'C');


//SUBJECT LIST HERE

$pdf->SetXY(13, 52);
$sql = mysqli_query($db, "SELECT *,CONCAT(tbl_faculties_staff.faculty_lastname, ', ', tbl_faculties_staff.faculty_firstname, ' ', tbl_faculties_staff.faculty_middlename)  as fullname, tbl_students.stud_id,tbl_subjects_new.subj_id,tbl_schedules.class_id,tbl_faculties_staff.faculty_id FROM tbl_enrolled_subjects
    LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
    LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id
    LEFT JOIN tbl_schedules ON tbl_schedules.class_id = tbl_enrolled_subjects.class_id
    LEFT JOIN tbl_faculties_staff ON tbl_faculties_staff.faculty_id = tbl_schedules.faculty_id
    WHERE tbl_enrolled_subjects.stud_id = '$stud_id' AND tbl_subjects_new.course_id = '$course_id' AND tbl_enrolled_subjects.acad_year = '$_SESSION[AC]' AND tbl_enrolled_subjects.semester = '$_SESSION[S]' ORDER BY enrolled_subj_id ASC") or die(mysqli_error($db));
$pdf->SetFont('Arial', '', '9');
$y = $pdf->Gety();
$xy = 3.5;
$i = 1;
while ($row1 = mysqli_fetch_array($sql)) {
    $pdf->SetXY(13, $y + $xy);
    $pdf->Cell(3, 3.5, $i, 0, 0, 'L');
    $pdf->Cell(37, 3.5, $row1['subj_code'], 0, 0, 'C');
    $pdf->Cell(10, 3.5, $row1['unit_total'], 0, 0, 'C');
    $fontsize = 9;
    $tempFontSize = $fontsize;
    $cellwidth = 13;
    while ($pdf->GetStringWidth($row1['day']) > $cellwidth) {
        $pdf->SetFontSize($tempFontSize -= 0.1);
    }
    $pdf->Cell(13, 3.5, $row1['day'], 0, 0, 'C');
    $pdf->SetFont('Arial', '', '9');
    $fontsize = 9;
    $tempFontSize = $fontsize;
    $cellwidth = 18;
    while ($pdf->GetStringWidth($row1['time']) > $cellwidth) {
        $pdf->SetFontSize($tempFontSize -= 0.1);
    }
    $pdf->Cell(22, 3.5, $row1['time'], 0, 0, 'C');
    $pdf->SetFont('Arial', '', '9');
    $fontsize = 9;
    $tempFontSize = $fontsize;
    $cellwidth = 10;
    while ($pdf->GetStringWidth($row1['room']) > $cellwidth) {
        $pdf->SetFontSize($tempFontSize -= 0.1);
    }
    $pdf->Cell(10, 3.5, $row1['room'], 0, 0, 'C');
    $pdf->SetFont('Arial', '', '9');
    $pdf->Cell(17, 3.5, '', 0, 0, 'C');
    $fontsize = 9;
    $tempFontSize = $fontsize;
    $cellwidth = 25;
    while ($pdf->GetStringWidth($row1['fullname']) > $cellwidth) {
        $pdf->SetFontSize($tempFontSize -= 0.1);
    }
    $pdf->Cell(30, 3.5, $row1['fullname'], 0, 0, 'C');
    $pdf->SetFont('Arial', '', '9');

    $xy += 3.5;
    $i++;
}



$pdf->Rect(13, 54, 40, 51);
$pdf->Rect(63, 54, 13, 51);
$pdf->Rect(98, 54, 10, 51);
$pdf->Rect(125, 54, 30, 51);

$pdf->SetXY(13, 100);
$pdf->Cell(0, 1, '', 1, 0);

$pdf->SetXY(13, 105);
$pdf->Cell(19, 4.5, 'No. of class', 'L,T', 0, 'C');
// $p = mysqli_fetch_array(mysqli_query($db,"SELECT count(subj_id) as subj FROM tbl_enrolled_subjects where stud_id = '$stud_id' AND tbl_enrolled_subjects.acad_year = '$_SESSION[AC]' AND tbl_enrolled_subjects.semester = '$_SESSION[S]'")) or die(mysqli_error($db)); 
//=================ENABLE THIS $p FOR ISSUANCE OF CLASS CARD=================================
$pdf->Cell(12, 8, '', 1, 0, 'C'); //REPLACE '' WITH $p['subj'] TO AUTOMATICALLY ADD CLASS CARD ISSUED
$pdf->Cell(17, 4.5, 'Total', 'T', 0, 'C');
$pdf->Cell(15, 4.5, 'Total Fees', 'L,T', 0, 'C');
$pdf->Cell(40, 4.5, 'Adviser\'s Signature', 'R,L,T', 0, 'C');
$pdf->Cell(0, 4.5, 'VERIFIED BY:', 'R,T', 1, 'C');

$pdf->Cell(19, 3.5, 'cards issued:', 'L,B', 0, 'C');
$pdf->Cell(12, 3.5, '', 0, 0, 'C');
$pdf->Cell(17, 3.5, 'Units/Load', 'B', 0, 'C');
$pdf->Cell(15, 3.5, '(PhP)', 'L,B', 0, 'C');
$pdf->Cell(40, 3.5, 'Over Printed Name', 'R,L', 0, 'C');
$pdf->Cell(0, 3.5, '', 'R', 1, 'C');

$query1 = mysqli_query($db, "SELECT SUM(unit_total) as UN FROM tbl_enrolled_subjects LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id where tbl_enrolled_subjects.stud_id = '$stud_id' AND tbl_subjects_new.course_id = '$course_id' and tbl_enrolled_subjects.acad_year = '$_SESSION[AC]' and tbl_enrolled_subjects.semester = '$_SESSION[S]' ORDER BY tbl_enrolled_subjects.subj_id");
$sum = $query1->fetch_array();
$pdf->Cell(19, 7, 'Issued by:', 'L,B', 0, 'C');
$pdf->Cell(12, 7, '', 'B,L,R', 0, 'C');
$pdf->Cell(17, 7, $sum['UN'], 'B', 0, 'C');
$pdf->Cell(15, 7, '', 'L,B', 0, 'C');
$pdf->Cell(40, 7, '', 'R,L,B', 0, 'C');
$pdf->Cell(0, 4, '', 'R', 1, 'C');


$pdf->Cell(103);
$pdf->Cell(0, 3, 'Dean/Chairperson', 'R,B', 1, 'C');

$pdf->Ln(3);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(100, 8, 'DEAN\'S COPY', 0, 0, 'C');

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(1, 4, '', 0, 0);
$pdf->Cell(15, 8, 'Academics.', 0, 0, '');
$pdf->SetTextColor(255, 0, 0);
$pdf->SetFont('Arial', 'BI', 10);
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(15, 8, 'And beyond', 0, 0, '');



//=========================ACCOUNTING'S COPY==========================

$pdf->SetLeftMargin(13);
$pdf->SetRightMargin(10);
$pdf->SetAutoPageBreak(true, 8);
$pdf->AddPage();

// Logo(x axis, y axis, height, width)
$pdf->Image('../../../assets/img/logos/logo.png', 33, 9, 10, 10);
// text color
$pdf->SetFont('Arial', 'B', 9);
// Dummy cell

// //cell(width,height,text,border,end line,[align])
$que = mysqli_query($db, "SELECT *,tbl_year_levels.year_id,tbl_schoolyears.sy_id FROM tbl_schoolyears
    LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
    LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
    LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
    LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id
    where tbl_schoolyears.stud_id = '$stud_id' and tbl_schoolyears.ay_id = '$_SESSION[AC]' and tbl_schoolyears.sem_id = '$_SESSION[S]'");
$ro = mysqli_fetch_array($que);
$course_id = $ro['course_id'];
$pdf->SetY(6);
$pdf->Cell(30, 4, $ro['status'] . ' - Student', 0, 1);
$pdf->SetTextColor(255, 0, 0);
// font(font type,style,font size)
$pdf->SetFont('Arial', 'B', 11);
// Dummy cell
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(151, 5, 'SAINT FRANCIS OF ASSISI COLLEGE', 0, 1, 'C');
// Line break
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial', '', 11, 'C');
// dummy cell
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(151, 5, 'Las ' . $test . '- Taguig - Cavite - Alabang - Laguna', 0, 1, 'C');
// Line break
$pdf->Ln(2);
$pdf->SetFont('Arial', '', 11);
// dummy cell
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(13, 4, 'Name:', 0, 0);
$lastname = utf8_decode($row['lastname']);
$firstname = utf8_decode($row['firstname']);
$middlename = utf8_decode($row['middlename']);
$pdf->Cell(35, 4, $lastname, 'B', 0, 'C');
$pdf->Cell(35, 4, $firstname, 'B', 0, 'C');
$pdf->Cell(35, 4, $middlename, 'B', 0, 'C');
$pdf->Cell(5);
$pdf->Cell(0, 4, $row['gender'], 'B', 1, 'C');

$pdf->Ln(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(13, 3, '', 0, 0);
$pdf->Cell(35, 3, '(Family Name)', 0, 0, 'C');
$pdf->Cell(35, 3, '(First Name)', 0, 0, 'C');
$pdf->Cell(35, 3, '(Middle Name)', 0, 0, 'C');
$pdf->Cell(5);
$pdf->Cell(0, 3, 'Gender', 0, 1, 'C');

$pdf->Ln(1);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(18, 4, 'Student No.', 0, 0);
$pdf->Cell(23, 4, $row['stud_no'], 'B', 0, 'C');
$pdf->Cell(2);
$pdf->Cell(20, 4, 'School Year:', 0, 0);
$pdf->Cell(20, 4, $_SESSION['AC'], 'B', 0, 'C');
$pdf->Cell(2);
$pdf->Cell(10, 4, 'Date:', 0, 0);
$pdf->Cell(20, 4, $row['date_enrolled'], 'B', 0, 'C');
$pdf->Cell(5);
$pdf->Cell(0, 4, 'Sem/Term:', 0, 1);
if ($_SESSION['S'] == 'First Semester') {
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(120, 4, '', 0, 0);
    $pdf->Cell(3, 3, '', 1, 0, 'C', true);
    $pdf->Cell(0, 3, '1st Semester', 0, 1);

    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(20, 6, 'COURSE:', 1, 0);
    $pdf->Cell(70, 6, $row['course_abv'] . ' ' . $row['year_abv'], 'T,R,B', 0, 'C');
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(25, 3, 'Year Level', 'T,R,B', 0, 'C');
    $pdf->Cell(5);
    $pdf->Cell(3, 3, '', 1, 0, 'C');
    $pdf->Cell(0, 3, '2nd Semester', 0, 1);

    $pdf->Cell(90, 3, '', 0, 0, 'C');
    $pdf->Cell(25, 3, '', 'R,B', 0, 'C');
    $pdf->Cell(5);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(3, 3, '', 1, 0, 'C');
    $pdf->Cell(0, 3, 'Summer', 0, 1);
} elseif ($_SESSION['S'] == 'Second Semester') {
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(120, 4, '', 0, 0);
    $pdf->Cell(3, 3, '', 1, 0, 'C');
    $pdf->Cell(0, 3, '1st Semester', 0, 1);

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(20, 6, 'COURSE:', 1, 0);
    $pdf->Cell(70, 6, $row['course_abv'] . ' ' . $row['year_abv'], 'T,R,B', 0, 'C');
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(25, 3, 'Year Level', 'T,R,B', 0, 'C');
    $pdf->Cell(5);
    $pdf->Cell(3, 3, '', 1, 0, 'C', true);
    $pdf->Cell(0, 3, '2nd Semester', 0, 1);

    $pdf->Cell(90, 3, '', 0, 0, 'C');
    $pdf->Cell(25, 3, '', 'R,B', 0, 'C');
    $pdf->Cell(5);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(3, 3, '', 1, 0, 'C');
    $pdf->Cell(0, 3, 'Summer', 0, 1);
} elseif ($_SESSION['S'] == 'Summer') {
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(120, 4, '', 0, 0);
    $pdf->Cell(3, 3, '', 1, 0, 'C');
    $pdf->Cell(0, 3, '1st Semester', 0, 1);

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(20, 6, 'COURSE:', 1, 0);
    $pdf->Cell(70, 6, $row['course_abv'] . ' ' . $row['year_abv'], 'T,R,B', 0, 'C');
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(25, 3, 'Year Level', 'T,R,B', 0, 'C');
    $pdf->Cell(5);
    $pdf->Cell(3, 3, '', 1, 0, 'C');
    $pdf->Cell(0, 3, '2nd Semester', 0, 1);

    $pdf->Cell(90, 3, '', 0, 0, 'C');
    $pdf->Cell(25, 3, '', 'R,B', 0, 'C');
    $pdf->Cell(5);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(3, 3, '', 1, 0, 'C', true);
    $pdf->Cell(0, 3, 'Summer', 0, 1);
}


$pdf->Ln(1);
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(37, 0.5, '', 'T,L,R', 0, 'C');
$pdf->Cell(15, 0.5, '', 'T,L,R', 0, 'C');
$pdf->Cell(15, 0.5, '', 'T,L,R', 0, 'C');
$pdf->Cell(15, 0.5, '', 'T,L,R', 0, 'C');
$pdf->Cell(20, 0.5, '', 'T,L,R', 0, 'C');
$pdf->Cell(20, 0.5, '', 'T,L,R', 0, 'C');
$pdf->Cell(20, 0.5, '', 'T,L,R', 1, 'C');

$pdf->Cell(37, 3, 'COURSE NUMBER', 'L,R', 0, 'C');
$pdf->Cell(15, 6, 'DAYS', 'L,R,B', 0, 'C');
$pdf->Cell(18, 6, 'TIME', 'L,R,B', 0, 'C');
$pdf->Cell(12, 6, 'ROOM', 'L,R,B', 0, 'C');
$pdf->Cell(20, 3, 'FEES', 'L,R,B', 0, 'C');
$pdf->Cell(20, 3, 'Amount', 'L,R,B', 0, 'C');
$pdf->Cell(20, 3, 'Adj. Amt.', 'L,R,B', 1, 'C');

$pdf->Cell(37, 3, '(SUBJECTS)', 'L,R,B', 0, 'C');
$pdf->Cell(45);

$total_miscell = 0;

$miscell = mysqli_query($db, "SELECT * FROM tbl_miscellaneous_fees WHERE ay_id = '$_SESSION[AYear]'") or die (mysqli_error($db));
while ($row4 = mysqli_fetch_array($miscell)) {

    $total_miscell = $total_miscell + $row4['miscellaneous'];

}


$pdf->Cell(20, 3, 'Miscellaneous', 'L,R,B', 0);
$pdf->Cell(20, 3, number_format($total_miscell, 2), 'L,R,B', 0);
$pdf->Cell(20, 3, '', 'L,R,B', 1);

//==========================================CODE FOR SUBJECT========================================
$pdf->SetXY(13, 48.5);
$sql2 = mysqli_query($db, "SELECT *,CONCAT(tbl_faculties_staff.faculty_lastname, ', ', tbl_faculties_staff.faculty_firstname, ' ', tbl_faculties_staff.faculty_middlename)  as fullname, tbl_students.stud_id,tbl_subjects_new.subj_id,tbl_schedules.class_id,tbl_faculties_staff.faculty_id FROM tbl_enrolled_subjects
    LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
    LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id
    LEFT JOIN tbl_schedules ON tbl_schedules.class_id = tbl_enrolled_subjects.class_id
    LEFT JOIN tbl_faculties_staff ON tbl_faculties_staff.faculty_id = tbl_schedules.faculty_id
    WHERE tbl_enrolled_subjects.stud_id = '$stud_id' AND tbl_subjects_new.course_id = '$course_id' AND tbl_enrolled_subjects.acad_year = '$_SESSION[AC]' AND tbl_enrolled_subjects.semester = '$_SESSION[S]' ORDER BY enrolled_subj_id ASC") or die(mysqli_error($db));
$pdf->SetFont('Arial', '', '9');
$y = $pdf->Gety();
$xy = 3;
$i = 1;
while ($row2 = mysqli_fetch_array($sql2)) {
    $pdf->SetFont('Arial', '', '9');
    $pdf->SetXY(13, $y + $xy);
    $pdf->Cell(3, 3, $i, 0, 0, 'L'); //ndi pa tapos d2 tumigil
    $fontsize = 9;
    $tempFontSize = $fontsize;
    $cellwidth = 16;
    while ($pdf->GetStringWidth($row2['subj_code']) > $cellwidth) {
        $pdf->SetFontSize($tempFontSize -= 0.1);
    }
    $pdf->Cell(34, 3, $row2['subj_code'], 0, 0, 'C'); //ndi pa tapos d2 tumigil
    $fontsize = 9;
    $tempFontSize = $fontsize;
    $cellwidth = 13;
    while ($pdf->GetStringWidth($row2['day']) > $cellwidth) {
        $pdf->SetFontSize($tempFontSize -= 0.1);
    }
    $pdf->Cell(15, 3, $row2['day'], 0, 0, 'C'); //ndi pa tapos d2 tumigil
    $pdf->SetFont('Arial', '', '8.5');
    $pdf->Cell(18, 3, $row2['time'], 0, 0, 'C'); //ndi pa tapos d2 tumigil
    $pdf->Cell(12, 3, $row2['room'], 0, 0, 'C'); //ndi pa tapos d2 tumigil
    $xy += 3;
    $i++;
}


$pdf->Rect(13, 51.5, 37, 37);
$pdf->Rect(50, 51.5, 15, 37);
$pdf->Rect(65, 51.5, 18, 37);
$pdf->Rect(83, 51.5, 12, 37);

$assessment = mysqli_query($db, "SELECT * FROM tbl_assessed_tf  LEFT JOIN tbl_tuition_fees ON tbl_tuition_fees.tf_id = tbl_assessed_tf.tf_id WHERE stud_id = '$row[stud_id]' AND sem_id = '$_SESSION[ASem]' AND tbl_assessed_tf.ay_id = '$_SESSION[AYear]'") or die (mysqli_error($db));
while ($sql = mysqli_fetch_array($assessment)) {

    $tuition_per_unit = $sql['tuition_fee'];

    $f_fee = $sum['UN'] * $tuition_per_unit;

    $discount_array = explode(",",$sql['disc_id']);
    $lab_array = explode(",",$sql['lab_id']);
    $units_array = explode(",",$sql['lab_units']);
    $nstp_array = explode(",",$sql['nstp_id']);
    $nstp_units_array = explode(",",$sql['nstp_units']);

$pdf->SetXY(95, 51.5);
$pdf->SetFont('Arial', '', '7');
$pdf->Cell(20, 3, 'Tuition', 'L,R,B', 0);
$pdf->Cell(20, 3, number_format($f_fee, 2), 'L,R,B', 0);

$total_fee = $f_fee;
foreach ($discount_array as $discount_value) {

    $discounts = mysqli_query($db, "SELECT discount_desc, percent, discount, discount_status FROM tbl_discounts WHERE disc_id = '$discount_value'") or die (mysqli_error($db));
    while ($row3 = mysqli_fetch_array($discounts)) {

        if ($row3['discount_status'] == 1) {
                            
        } else {    

        if ($row3['percent'] == 1) {
            $percent_value = number_format(floor((($row3['discount'] / 100) * $total_fee) * 100)/ 100, 2, '.', ''); //this took forever king ina
            $total_fee = $total_fee - $percent_value;

        } else {
            
            $total_fee = $total_fee - $row3['discount'];

        }
        }
    }}

$pdf->Cell(20, 3, number_format($total_fee, 2).' /w discounts', 'L,R,B', 1);

$pdf->SetX(95);
$i = 0;
$total_lab = 0;
foreach ($lab_array as $lab_values) {
    $lab = mysqli_query($db, "SELECT * FROM tbl_lab_fees WHERE lab_id = '$lab_values'") or die (mysqli_error($db));
    while ($row5 = mysqli_fetch_array($lab)) {
    $lab_product = $units_array[$i] * $row5['lab'];
    $total_lab = $total_lab + $lab_product;
    }
    $i++;
}

$i = 0;
$total_nstp = 0;
foreach ($nstp_array as $nstp_values) {
    $nstp = mysqli_query($db, "SELECT * FROM tbl_nstp_fees WHERE nstp_id = '$nstp_values'") or die (mysqli_error($db));
    while ($row5 = mysqli_fetch_array($nstp)) {
    $nstp_product = $nstp_units_array[$i] * $row5['component_value'];
    $total_nstp = $total_nstp + $nstp_product;
    }
    $i++;
}

$pdf->Cell(20, 3, 'Laboratory', 'L,R,B', 0);
$pdf->Cell(20, 3, number_format($total_lab, 2), 'L,R,B', 0);
$pdf->Cell(20, 3, '', 'L,R,B', 1);

$pdf->SetX(95);
$pdf->Cell(20, 3, 'NSTP', 'L,R,B', 0);
$pdf->Cell(20, 3, number_format($total_nstp, 2), 'L,R,B', 0);
$pdf->Cell(20, 3, '', 'L,R,B', 1);

$pdf->SetX(95);
$pdf->Cell(20, 3, 'Other Fees', 'L,R,B', 0);
$pdf->Cell(20, 3, '', 'L,R,B', 0);
$pdf->Cell(20, 3, '', 'L,R,B', 1);

$pdf->SetX(95);
$pdf->Cell(20, 3, 'TOTAL', 'L,R,B', 0);
$pdf->Cell(20, 3, number_format(($total_fee + $total_miscell + $total_lab + $total_nstp), 2), 'L,R,B', 0);
$pdf->Cell(20, 3, '', 'L,R,B', 1);

}
$pdf->SetX(95);
$pdf->SetFont('Arial', '', 5);
$pdf->Cell(60, 3, 'ABOVE FEES SUBJECT TO CORRECTION', 'L,R', 1, 'C');

$pdf->SetX(95);
$pdf->Cell(60, 3, 'CHECK BASIS OF ASSESSMENT BELOW', 'L,R', 1, 'C');

$pdf->SetX(95);
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(15);
$pdf->Cell(5, 3, '', 1, 0, 'C');
$pdf->Cell(0, 3, 'Cash Basis', 0, 1);

$pdf->SetX(95);
$pdf->Cell(15);
$pdf->Cell(5, 3, '', 1, 0, 'C');
$pdf->Cell(0, 3, 'Installment Basis', 0, 1);

$pdf->SetX(95);
$pdf->SetFont('Arial', '', 6);
$pdf->Cell(0, 3, 'Enrollment Good Only For This Semester', 0, 1, 'C');

$pdf->Rect(95, 72.5, 60, 9);

$pdf->SetXY(95, 81.5);
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(36, 3.5, 'Amount Paid', 'R', 0);
$pdf->Cell(24, 3.5, '', 'R', 1);

$pdf->SetX(95);


$pdf->Cell(36, 3.5, '', 'R,B', 0);
$pdf->Cell(24, 3.5, 'Cashier', 'R,B', 1, 'C');

$pdf->Cell(0, 1, '', 1, 1);

$pdf->Cell(22, 3, 'Checked by:', 'L', 0, 'C');
$pdf->Cell(22, 3, 'Total Loads/Units', 'L', 0, 'C');
$pdf->Cell(38, 3, 'Verified by:', 'L,R', 1, 'C');

$pdf->Cell(22, 3, '', 'L', 0);
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(22, 6, $sum['UN'], 'L', 0, 'C');
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(38, 3, '', 'L,R', 1);

$pdf->Cell(22, 3, 'Adviser', 'L', 0, 'C');
$pdf->Cell(22);
$pdf->Cell(38, 3, 'Dean/Chairperson', 'L,R', 1, 'C');

$pdf->Cell(82, 5, 'CHANGE OF SUBJECT/LOAD', 1, 1, 'C');

$pdf->Cell(33, 5, 'Subject/s Added', 1, 0, 'C');
$pdf->Cell(8, 5, 'Units', 1, 0, 'C');
$pdf->Cell(33, 5, 'Subject/s Dropped', 1, 0, 'C');
$pdf->Cell(8, 5, 'Units', 1, 1, 'C');

$pdf->Cell(33, 5, '', 1, 0, 'C');
$pdf->Cell(8, 5, '', 1, 0, 'C');
$pdf->Cell(33, 5, '', 1, 0, 'C');
$pdf->Cell(8, 5, '', 1, 1, 'C');

$pdf->Cell(33, 5, '', 1, 0, 'C');
$pdf->Cell(8, 5, '', 1, 0, 'C');
$pdf->Cell(33, 5, '', 1, 0, 'C');
$pdf->Cell(8, 5, '', 1, 1, 'C');

$pdf->Cell(33, 5, '', 1, 0, 'C');
$pdf->Cell(8, 5, '', 1, 0, 'C');
$pdf->Cell(33, 5, '', 1, 0, 'C');
$pdf->Cell(8, 5, '', 1, 1, 'C');

$pdf->SetXY(95, 90.5);
$pdf->SetFont('Arial', 'B', 7);
$pdf->Cell(0, 5, 'ACCOUNTING STAMP & REMARKS', 0, 1);


$pdf->Rect(95, 89.5, 60, 34);

$pdf->SetXY(13, 123);

$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(100, 8, 'ACCOUNTING\'S COPY', 0, 0, 'C'); //END ACCOUNTING'S COPY==============================

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(1, 4, '', 0, 0);
$pdf->Cell(15, 8, 'Academics.', 0, 0, '');
$pdf->SetTextColor(255, 0, 0);
$pdf->SetFont('Arial', 'BI', 10);
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(15, 8, 'And beyond', 0, 1, '');

//==================================REGISTRAR'S COPY=====================================
$pdf->SetLeftMargin(4);
$pdf->SetRightMargin(10);
$pdf->SetAutoPageBreak(true, 8);
$pdf->AddPage();

// font(font type,style,font size)

$pdf->Image('../../../assets/img/logos/logo.png', 33, 9, 10, 10);
// Dummy cell
$pdf->Cell(49, 5, '', 0, 0);
$pdf->SetFont('Arial', 'B', 9);
// Dummy cell

// //cell(width,height,text,border,end line,[align])
$que = mysqli_query($db, "SELECT *,tbl_year_levels.year_id,tbl_schoolyears.sy_id FROM tbl_schoolyears
    LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
    LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
    LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
    LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id
    where tbl_schoolyears.stud_id = '$stud_id' and tbl_schoolyears.ay_id = '$_SESSION[AC]' and tbl_schoolyears.sem_id = '$_SESSION[S]'");
$ro = mysqli_fetch_array($que);
$pdf->SetY(5);
$pdf->Cell(30, 4, $ro['status'] . ' - Student', 0, 1);
$pdf->SetTextColor(255, 0, 0);
$pdf->SetFont('Arial', 'B', 11);
// //cell(width,height,text,border,end line,[align])
$pdf->SetX(10);
$pdf->Cell(0, 5, 'SAINT FRANCIS OF ASSISI COLLEGE', 0, 1, 'C');
// Line break
$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(0, 0, 0);
// dummy cell
$pdf->Cell(42, 4, '', 0, 0);
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(80, 4, 'Las ' . $test . ' - Taguig - Cavite - Alabang - Laguna', 0, 0);
// Line break
$pdf->Ln(7);




//cell(width,height,text,border,end line,[align])
// $pdf->Image('../../assets/img/deptevaluator.png',5.5,60,5,37);
$pdf->Cell(7, 76.5, '', 1, 0);
$pdf->Cell(13, 5, ' Name:', 0, 0);
$pdf->SetFont('Arial', '', '10');
$lastname = utf8_decode($row['lastname']);
$firstname = utf8_decode($row['firstname']);
$middlename = utf8_decode($row['middlename']);
$pdf->Cell(35, 4, $lastname, 'B', 0, 'C');
$pdf->Cell(35, 4, $firstname, 'B', 0, 'C');
$pdf->Cell(35, 4, $middlename, 'B', 0, 'C');

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(2, 5, ' ', 0, 0);

$pdf->Cell(0, 5, $row['gender'], 'B', 1, 'C'); //end of line

//dummy cells
$pdf->Cell(20, 5, '', 0, 0);
$pdf->SetFont('Arial', '', '8');
$pdf->Cell(35, 3, '(Family Name)', 0, 0, 'C');
$pdf->Cell(35, 3, '(First Name)', 0, 0, 'C');
$pdf->Cell(35, 3, '(Middle Name)', 0, 0, 'C');
$pdf->Cell(2, 5, ' ', 0, 0);
$pdf->Cell(0, 3, 'Gender', 0, 1, 'C');
$pdf->Ln(2);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(8, 5, '', 0, 0);
$pdf->Cell(15, 3, 'Student No.', 0, 0);
$pdf->Cell(5, 3, '', 0, 0);
$pdf->Cell(22, 3, $row['stud_no'], 'B', 0);
$pdf->Cell(18, 3, 'School Year:', 0, 0);
$pdf->Cell(5, 3, '', 0, 0);
$pdf->Cell(20, 3, $_SESSION['AC'], 'B', 0);
$pdf->Cell(5, 3, 'Date:', 0, 0);
$pdf->Cell(5, 3, '', 0, 0);
$pdf->Cell(20, 3, $row['date_enrolled'], 'B', 0);
$pdf->Cell(15, 3, 'Sem/Term:', 0, 1);

if ($_SESSION['S'] == 'First Semester') {
    $pdf->Cell(129, 3, '', 0, 0);
    $pdf->Cell(3, 3, '', 1, 0, 'C', true);
    $pdf->SetFont('Arial', '', '8');
    $pdf->Cell(0, 3, '1st Semester', 0, 1);

    //COURSE
    $pdf->Cell(9, 6, '', 0, 0);
    $pdf->SetFont('Arial', 'B', '10');
    $pdf->Cell(20, 6, 'COURSE:', 'L,B,T', 0);
    $pdf->Cell(94, 6, $row['course_abv'] . ' ' . $row['year_abv'], 'B,T,R', 0, 'C');

    $pdf->Cell(6, 6, '', 0, 0);
    $pdf->Cell(3, 3, '', 1, 0);
    $pdf->SetFont('Arial', '', '8');
    $pdf->Cell(0, 3, '2nd Semester', 0, 1);
    $pdf->Cell(129, 3, '', 0, 0);
    $pdf->Cell(3, 3, '', 1, 0);
    $pdf->Cell(0, 3, 'Summer', 0, 1);
} elseif ($_SESSION['S'] == 'Second Semester') {
    $pdf->Cell(129, 3, '', 0, 0);
    $pdf->Cell(3, 3, '', 1, 0);
    $pdf->SetFont('Arial', '', '8');
    $pdf->Cell(0, 3, '1st Semester', 0, 1);

    //COURSE
    $pdf->Cell(9, 6, '', 0, 0);
    $pdf->SetFont('Arial', 'B', '10');
    $pdf->Cell(20, 6, 'COURSE:', 'L,B,T', 0);
    $pdf->Cell(94, 6, $row['course_abv'] . ' ' . $row['year_abv'], 'B,T,R', 0, 'C');

    $pdf->Cell(6, 6, '', 0, 0);
    $pdf->Cell(3, 3, '', 1, 0, 'C', true);
    $pdf->SetFont('Arial', '', '8');
    $pdf->Cell(0, 3, '2nd Semester', 0, 1);
    $pdf->Cell(129, 3, '', 0, 0);
    $pdf->Cell(3, 3, '', 1, 0);
    $pdf->Cell(0, 3, 'Summer', 0, 1);
} elseif ($_SESSION['S'] == 'Summer') {
    $pdf->Cell(129, 3, '', 0, 0);
    $pdf->Cell(3, 3, '', 1, 0);
    $pdf->SetFont('Arial', '', '8');
    $pdf->Cell(0, 3, '1st Semester', 0, 1);

    //COURSE
    $pdf->Cell(9, 6, '', 0, 0);
    $pdf->SetFont('Arial', 'B', '10');
    $pdf->Cell(20, 6, 'COURSE:', 'L,B,T', 0);
    $pdf->Cell(94, 6, $row['course_abv'] . ' ' . $row['year_abv'], 'B,T,R', 0, 'C');

    $pdf->Cell(6, 6, '', 0, 0);
    $pdf->Cell(3, 3, '', 1, 0);
    $pdf->SetFont('Arial', '', '8');
    $pdf->Cell(0, 3, '2nd Semester', 0, 1);
    $pdf->Cell(129, 3, '', 0, 0);
    $pdf->Cell(3, 3, '', 1, 0, 'C', true);
    $pdf->Cell(0, 3, 'Summer', 0, 1);
}


$pdf->Cell(0, 3, '', 0, 1);
$pdf->Cell(9, 5, '', 0, 0);
$pdf->Cell(44, 4, 'COURSE NUMBER', 'T,L,R', 0, 'C');
$pdf->Cell(10, 8, 'Units', 1, 0, 'C');
$pdf->Cell(15, 8, 'Days', 1, 0, 'C');
$pdf->Cell(18, 8, 'Time', 1, 0, 'C');
$pdf->Cell(12.5, 8, 'Room', 1, 0, 'C');
$pdf->Cell(15, 4, 'Final', 'T', 0, 'C');
$pdf->Cell(0, 8, 'Professor', 1, 0, 'C');
$pdf->Cell(0, 4, '', 0, 1);
$pdf->Cell(9, 3, '', 0, 0);
$pdf->Cell(44, 4, '(SUBJECTS)', 'L,B', 0, 'C');
$pdf->Cell(55.5, 4, '', 0, 0);
$pdf->Cell(15, 4, 'Rating', 'L,B', 1, 'C');


//=====================================CODE FOR SUBJECTS=====================================
$pdf->SetXY(13, 52);

$sql3 = mysqli_query($db, "SELECT *,CONCAT(tbl_faculties_staff.faculty_lastname, ', ', tbl_faculties_staff.faculty_firstname, ' ', tbl_faculties_staff.faculty_middlename)  as fullname, tbl_students.stud_id,tbl_subjects_new.subj_id,tbl_schedules.class_id,tbl_faculties_staff.faculty_id FROM tbl_enrolled_subjects
    LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
    LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id
    LEFT JOIN tbl_schedules ON tbl_schedules.class_id = tbl_enrolled_subjects.class_id
    LEFT JOIN tbl_faculties_staff ON tbl_faculties_staff.faculty_id = tbl_schedules.faculty_id
    WHERE tbl_enrolled_subjects.stud_id = '$stud_id' AND tbl_subjects_new.course_id = '$course_id' AND tbl_enrolled_subjects.acad_year = '$_SESSION[AC]' AND tbl_enrolled_subjects.semester = '$_SESSION[S]' ORDER BY enrolled_subj_id ASC") or die(mysqli_error($db));
$pdf->SetFont('Arial', '', '9');
$y = $pdf->Gety();
$xy = 3.5;
$i = 1;
while ($row3 = mysqli_fetch_array($sql3)) {
    $pdf->SetFont('Arial', '', '9');
    $pdf->SetXY(13, $y + $xy);
    $pdf->Cell(3, 3.5, $i, 0, 0, 'L');
    $pdf->Cell(41, 3.5, $row3['subj_code'], 0, 0, 'C');
    $pdf->Cell(10, 3.5, $row3['unit_total'], 0, 0, 'C');
    $fontsize = 9;
    $tempFontSize = $fontsize;
    $cellwidth = 13;
    while ($pdf->GetStringWidth($row3['day']) > $cellwidth) {
        $pdf->SetFontSize($tempFontSize -= 0.1);
    }
    $pdf->Cell(15, 3.5, $row3['day'], 0, 0, 'C');
    $pdf->SetFont('Arial', '', '9');
    $pdf->Cell(17.5, 3.5, $row3['time'], 0, 0, 'C');
    $pdf->Cell(12.5, 3.5, $row3['room'], 0, 0, 'C');
    $pdf->Cell(15, 3.5, '', 0, 0, 'C');
    $fontsize = 9;
    $tempFontSize = $fontsize;
    $cellwidth = 25;
    while ($pdf->GetStringWidth($row3['fullname']) > $cellwidth) {
        $pdf->SetFontSize($tempFontSize -= 0.1);
    }
    $pdf->Cell(28, 3.5, $row3['fullname'], 0, 1, 'C');
    $xy += 3.5;
    $i++;
}



$pdf->Rect(13, 55, 44, 42.5);
$pdf->Rect(57, 55, 10, 42.5);
$pdf->Rect(67, 55, 15, 42.5);
$pdf->Rect(82, 55, 18, 42.5);
$pdf->Rect(100, 55, 12.5, 42.5);
$pdf->Rect(112.5, 55, 15, 42.5);
$pdf->Rect(127.5, 55, 27.5, 42.5);
$pdf->SetXY(13, 97.5);
$pdf->Cell(0, 1, '', 1, 1);
$pdf->SetFont('Arial', '', '8');
$pdf->Cell(0, 5, 'ENROLLMENT GOOD FOR THIS SEMESTER', 0, 1, 'C');

$pdf->Cell(24, 3.5, 'No. of Class', 'L,T,R', 0, 'C');
$pdf->Cell(15, 7, '', 1, 0, 'C');
$pdf->Cell(22, 3.5, 'Total', 'L,T,R', 0, 'C');
$pdf->Cell(42, 3.5, 'Checked by (Enrolling Adviser)', 'L,T,R', 0, 'L');
$pdf->Cell(0, 3.5, 'APPROVED BY:', 'L,T,R', 1, 'C');
$pdf->Cell(24, 3.5, 'cards issued', 'L,B,R', 0, 'C');
$pdf->Cell(15, 7, '', 0, 0, 'C');
$pdf->Cell(22, 3.5, 'Units/Loads', 'L,B,R', 0, 'C');
$pdf->Cell(42, 3.5, '', 'L,B,R', 0, 'C');
$pdf->Cell(0, 3.5, '', 'L,R', 1, 'C');

$pdf->Cell(24, 7, 'Issued by:', '1', 0, 'C');
$pdf->Cell(15, 7, '', 1, 0, 'C');
$pdf->Cell(22, 7, $sum['UN'], 1, 0, 'C');
$pdf->Cell(42, 3.5, 'Verified by: (Dean)', 'L,T,R', 0, 'L');
$pdf->Cell(0, 3.5, '', 'L,R', 1, 'C');

$pdf->Cell(61, 7, '', 0, 0, 'C');
$pdf->Cell(42, 3.5, '', 'L,B,R', 0, 'C');
$pdf->Cell(0, 3.5, 'OIC, Registrar', 'L,B,R', 1, 'C');

$pdf->Cell(0, 5, '', 0, 1);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(100, 5, 'REGISTRAR\'S COPY', 0, 0, 'C');

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(1, 4, '', 0, 0);
$pdf->Cell(15, 8, 'Academics.', 0, 0, '');
$pdf->SetTextColor(255, 0, 0);
$pdf->SetFont('Arial', 'BI', 10);
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(15, 8, 'And beyond', 0, 1, '');

//==================================END OF REGISTRAR'S COPY==================================


//===================================STUDENT'S COPY===================================
$pdf->SetLeftMargin(4);
$pdf->SetRightMargin(10);
$pdf->SetTopMargin(8);
$pdf->SetAutoPageBreak(true, 8);
$pdf->AddPage();

$pdf->Image('../../../assets/img/logos/logo.png', 33, 9, 10, 10);
// text color
$pdf->SetFont('Arial', 'B', 9);
// Dummy cell

// //cell(width,height,text,border,end line,[align])
$que = mysqli_query($db, "SELECT *,tbl_year_levels.year_id,tbl_schoolyears.sy_id FROM tbl_schoolyears
    LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
    LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
    LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
    LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id
    where tbl_schoolyears.stud_id = '$stud_id' and tbl_schoolyears.ay_id = '$_SESSION[AC]' and tbl_schoolyears.sem_id = '$_SESSION[S]'");
$ro = mysqli_fetch_array($que);
$pdf->SetY(5);
$pdf->Cell(30, 4, $ro['status'] . ' - Student', 0, 1);
$pdf->SetTextColor(255, 0, 0);
// font(font type,style,font size)
$pdf->SetFont('Arial', 'B', 11);
// Dummy cell
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(9);
$pdf->Cell(151, 5, 'SAINT FRANCIS OF ASSISI COLLEGE', 0, 1, 'C');
// Line break
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial', '', 11, 'C');
// dummy cell
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(9);
$pdf->Cell(151, 5, 'Las ' . $test . '- Taguig - Cavite - Alabang - Laguna', 0, 1, 'C');
// Line break
$pdf->Ln(2);
$pdf->SetFont('Arial', '', 11);




//cell(width,height,text,border,end line,[align])
//student name
$pdf->Cell(15, 5, 'Name:', 0, 0);
$pdf->SetFont('Arial', '', '10');
$lastname = utf8_decode($row['lastname']);
$firstname = utf8_decode($row['firstname']);
$middlename = utf8_decode($row['middlename']);
$pdf->Cell(35, 4, $lastname, 'B', 0, 'C');
$pdf->Cell(35, 4, $firstname, 'B', 0, 'C');
$pdf->Cell(35, 4, $middlename, 'B', 0, 'C');

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(5, 5, ' ', 0, 0);

$pdf->Cell(0, 5, $row['gender'], 'B', 1, 'C'); //end of line

//dummy cells
$pdf->Cell(15, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '8');
$pdf->Cell(35, 3, '(Family Name)', 0, 0, 'C');
$pdf->Cell(35, 3, '(First Name)', 0, 0, 'C');
$pdf->Cell(35, 3, '(Middle Name)', 0, 0, 'C');
$pdf->Cell(5, 5, ' ', 0, 0);
$pdf->Cell(0, 3, 'Gender', 0, 1, 'C');
$pdf->Cell(15, 3, 'Student No.', 10, 0);
$pdf->Cell(5, 3, '', 0, 0);
$pdf->Cell(30, 3, $row['stud_no'], 'B', 0, 'C');
$pdf->Cell(15, 3, 'School Year:', 0, 0);
$pdf->Cell(5, 3, '', 0, 0);
$pdf->Cell(20, 3, $_SESSION['AC'], 'B', 0, 'C');
$pdf->Cell(5, 3, 'Date:', 0, 0);
$pdf->Cell(5, 3, '', 0, 0);
$pdf->Cell(20, 3, $row['date_enrolled'], 'B', 0, 'C');
$pdf->Cell(15, 3, 'Sem/Term:', 0, 1);

if ($_SESSION['S'] == 'First Semester') {
    $pdf->Cell(126, 3, '1. Subjects below with erasures of alterations will not be honored and no class card will be issued.', 0, 0);
    $pdf->Cell(1, 3, '', 0, 0);
    $pdf->Cell(3, 3, '', 1, 0, 'C', true);
    $pdf->Cell(5, 3, '1st Semester', 0, 1);
    $pdf->Cell(126, 3, '2. For closed or dissolved sections, secure the form from the Registrar\'s office for proper adjustment.', 0, 0);
    $pdf->Cell(1, 3, '', 0, 0);
    $pdf->Cell(3, 3, '', 1, 0);
    $pdf->Cell(5, 3, '2nd Semester', 0, 1);
    $pdf->Cell(126, 3, '3. Submit your class card when you report to class and present the CE to your prof ./Inst. for initial.', 0, 0);
    $pdf->Cell(1, 3, '', 0, 0);
    $pdf->Cell(3, 3, '', 1, 0);
    $pdf->Cell(5, 3, 'Summer', 0, 1);
    $pdf->Cell(0, 1, '', 1, 1);
} elseif ($_SESSION['S'] == 'Second Semester') {
    $pdf->Cell(126, 3, '1. Subjects below with erasures of alterations will not be honored and no class card will be issued.', 0, 0);
    $pdf->Cell(1, 3, '', 0, 0);
    $pdf->Cell(3, 3, '', 1, 0);
    $pdf->Cell(5, 3, '1st Semester', 0, 1);
    $pdf->Cell(126, 3, '2. For closed or dissolved sections, secure the form from the Registrar\'s office for proper adjustment.', 0, 0);
    $pdf->Cell(1, 3, '', 0, 0);
    $pdf->Cell(3, 3, '', 1, 0, 'C', true);
    $pdf->Cell(5, 3, '2nd Semester', 0, 1);
    $pdf->Cell(126, 3, '3. Submit your class card when you report to class and present the CE to your prof ./Inst. for initial.', 0, 0);
    $pdf->Cell(1, 3, '', 0, 0);
    $pdf->Cell(3, 3, '', 1, 0);
    $pdf->Cell(5, 3, 'Summer', 0, 1);
    $pdf->Cell(0, 1, '', 1, 1);
} elseif ($_SESSION['S'] == 'Summer') {
    $pdf->Cell(126, 3, '1. Subjects below with erasures of alterations will not be honored and no class card will be issued.', 0, 0);
    $pdf->Cell(1, 3, '', 0, 0);
    $pdf->Cell(3, 3, '', 1, 0);
    $pdf->Cell(5, 3, '1st Semester', 0, 1);
    $pdf->Cell(126, 3, '2. For closed or dissolved sections, secure the form from the Registrar\'s office for proper adjustment.', 0, 0);
    $pdf->Cell(1, 3, '', 0, 0);
    $pdf->Cell(3, 3, '', 1, 0);
    $pdf->Cell(5, 3, '2nd Semester', 0, 1);
    $pdf->Cell(126, 3, '3. Submit your class card when you report to class and present the CE to your prof ./Inst. for initial.', 0, 0);
    $pdf->Cell(1, 3, '', 0, 0);
    $pdf->Cell(3, 3, '', 1, 0, 'C', true);
    $pdf->Cell(5, 3, 'Summer', 0, 1);
    $pdf->Cell(0, 1, '', 1, 1);
}

$linebreak = '\n';
$pdf->Cell(35, 4, 'COURSE NUMBER', 'L', 0, 'C');
$pdf->Cell(10, 8, 'Units', 1, 0, 'C');
$pdf->Cell(15, 8, 'Days', 1, 0, 'C');
$pdf->Cell(29.5, 8, 'Time', 1, 0, 'C');
$pdf->Cell(12.5, 8, 'Room', 1, 0, 'C');
$pdf->Cell(15, 4, 'Final', 0, 0, 'C');
$pdf->Cell(34, 8, 'Professor', 1, 0, 'C');
$pdf->Cell(0, 4, '', 0, 1);
$pdf->Cell(35, 4, '(SUBJECTS)', 'L,B', 0, 'C');
$pdf->Cell(27, 4, '', 0, 0);
$pdf->Cell(15, 4, '', 0, 0);
$pdf->Cell(12.5, 4, '', 0, 0);
$pdf->Cell(12.5, 4, '', 0, 0);
$pdf->Cell(15, 4, 'Rating', 'L,B', 1, 'C');



//xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxCODE FOR SUBJECTSxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
$pdf->SetXY(4, 47);
$sql4 = mysqli_query($db, "SELECT *,CONCAT(tbl_faculties_staff.faculty_lastname, ', ', tbl_faculties_staff.faculty_firstname, ' ', tbl_faculties_staff.faculty_middlename)  as fullname, tbl_students.stud_id,tbl_subjects_new.subj_id,tbl_schedules.class_id,tbl_faculties_staff.faculty_id FROM tbl_enrolled_subjects
    LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
    LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id
    LEFT JOIN tbl_schedules ON tbl_schedules.class_id = tbl_enrolled_subjects.class_id
    LEFT JOIN tbl_faculties_staff ON tbl_faculties_staff.faculty_id = tbl_schedules.faculty_id
    WHERE tbl_enrolled_subjects.stud_id = '$stud_id' AND tbl_subjects_new.course_id = '$course_id' AND tbl_enrolled_subjects.acad_year = '$_SESSION[AC]' AND tbl_enrolled_subjects.semester = '$_SESSION[S]'
     ORDER BY enrolled_subj_id ASC") or die(mysqli_error($db));
$pdf->SetFont('Arial', '', '6.5');
$y = $pdf->Gety();
$xy = 3;
$i = 1;
while ($row4 = mysqli_fetch_array($sql4)) {
    $pdf->SetXY(4, $y + $xy);
    $pdf->Cell(3, 3, $i, 0, 0, 'L');
    $pdf->SetFont('Arial', '', '7.5');
    $pdf->Cell(32, 3, $row4['subj_code'], 0, 0, 'C');
    $pdf->Cell(10, 3, $row4['unit_total'], 0, 0, 'C');
    $fontsize = 9;
    $tempFontSize = $fontsize;
    $cellwidth = 14;
    while ($pdf->GetStringWidth($row4['day']) > $cellwidth) {
        $pdf->SetFontSize($tempFontSize -= 0.1);
    }
    $pdf->Cell(15, 3, $row4['day'], 0, 0, 'C');
    $pdf->SetFont('Arial', '', '6.5');
    $pdf->Cell(29.5, 3, $row4['time'], 0, 0, 'C');
    $pdf->Cell(12.5, 3, $row4['room'], 0, 0, 'C');
    $pdf->Cell(15, 3, '', 0, 0, 'C');
    $pdf->Cell(35, 3, $row4['fullname'], 0, 1, 'C');
    $xy += 3;
    $i++;
}


// x, y, width, height
// Rectangle Course Number
$pdf->Rect(4, 50, 35, 37);
// Rectangle units
$pdf->Rect(39, 50, 10, 37);
// Rectangle Days
$pdf->Rect(49, 50, 15, 37);
// Rectangle Time
$pdf->Rect(64, 50, 29.5, 37);
//rectangle room
$pdf->Rect(93.5, 50, 12.5, 37);
//rectangle final rating
$pdf->Rect(106, 50, 15, 37);
// rectangle professor
$pdf->Rect(121, 50, 34, 37);
$pdf->SetXY(4, 87);
$pdf->Cell(0, 37.5, '', 1, 1);
$pdf->SetXY(4, 86);
$pdf->Cell(0, 1, '', 1, 1);

$pdf->SetFont('Arial', '', 6);
//number of class card
$pdf->Rect(4, 87.5, 16, 5);
$pdf->SetXY(4, 88);
$pdf->MultiCell(17, 2, 'No of class cards issued:', 0, 'L');
$pdf->Rect(20, 87.5, 15, 5);
$pdf->SetXY(20, 87.5);
$pdf->SetFont('Arial', '', 8);
// $count = mysqli_fetch_array(mysqli_query($db,"SELECT count(tbl_enrolled_subjects.subj_id) as count FROM tbl_enrolled_subjects LEFT JOIN tbl_subjects ON tbl_subjects.subj_id = tbl_enrolled_subjects.subj_id where tbl_enrolled_subjects.stud_id = '$stud_id' and tbl_enrolled_subjects.acad_year = '$_SESSION[AC]' and tbl_enrolled_subjects.semester = '$_SESSION[S]' ORDER BY tbl_enrolled_subjects.subj_id"));
$pdf->Cell(15, 5, '', 1, 0, 'C');
$pdf->SetXY(4, 92.5);
//issued by
$pdf->SetFont('Arial', '', 5);
$pdf->Cell(9, 5, 'Issued by:', '1', '1', 'L');
$pdf->Rect(13, 92.5, 22, 5);

//course
$pdf->SetXY(35, 87.5);
$pdf->MultiCell(22, 2, 'Course', 1, 'C');
$pdf->SetXY(35, 89.5);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(22, 8, $row['course_abv'] . ' ' . $row['year_abv'], 1, 1, 'C');

//total units
$pdf->SetFont('Arial', '', 5);
$pdf->SetXY(57, 87.5);
$pdf->Cell(15, 2, 'Total Units', 1, 0, 'C');
$pdf->SetXY(57, 89.5);
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(15, 8, $sum['UN'], 1, 0, 'C');
$pdf->SetFont('Arial', '', 5);


//Checked by:
$pdf->SetXY(72, 87.5);
$pdf->Cell(22, 2, 'Checked by:', 0, 0, 'C');
$pdf->Cell(32, 2.5, 'Miscellaneous', 1, 0);
$pdf->Cell(29, 2.5, number_format($total_miscell, 2), 1, 1);
$pdf->SetXY(72, 90);
$pdf->Cell(22, 6, '', 0, 0, 'C');
$pdf->Cell(32, 2.5, 'Tuition', 1, 0);
$pdf->Cell(29, 2.5, number_format($total_fee, 2), 1, 1);
$pdf->SetXY(94, 92.5);
$pdf->Cell(32, 2.5, 'Laboratories', 1, 0);
$pdf->Cell(29, 2.5, number_format($total_lab, 2), 1, 1);
$pdf->SetXY(72, 95);
$pdf->Cell(22, 2, '', 0, 0, 'C');
$pdf->Cell(32, 2.5, 'NSTP', 1, 0);
$pdf->Cell(29, 2.5, number_format($total_nstp, 2), 1, 1);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(90, 5, 'CHANGE OF SUBJECT(S)/LOAD', 1, 0, 'C');
$pdf->SetFont('Arial', '', 6);
$pdf->Cell(32, 2.5, 'Other Fees', 1, 0);
$pdf->Cell(29, 2.5, '', 1, 1);
$pdf->SetXY(94, 100);
$pdf->Cell(32, 2.5, 'TOTAL', 1, 0, 'C');
$pdf->Cell(29, 2.5, number_format(($total_fee + $total_miscell + $total_lab + $total_nstp), 2), 1, 1);

$pdf->Cell(31, 3, 'Added', 1, 0, 'C');
$pdf->Cell(15, 3, 'Units', 1, 0, 'C');
$pdf->Cell(29, 3, 'Dropped', 1, 0, 'C');
$pdf->Cell(15, 3, 'Units', 1, 0, 'C');

$pdf->SetFont('Arial', '', 5);
$pdf->Cell(61, 3, 'ABOVE FEES SUBJECT TO CORREECTION', 1, 1, 'C');
$pdf->Cell(31, 3, '', 1, 0, 'C');
$pdf->Cell(15, 3, '', 1, 0, 'C');
$pdf->Cell(29, 3, '', 1, 0, 'C');
$pdf->Cell(15, 3, '', 1, 0, 'C');
$pdf->Cell(61, 3, 'CHECK BASIS OF ASSESSMENT BELOW', 'R', 1, 'C');
$pdf->Cell(31, 3, '', 1, 0, 'C');
$pdf->Cell(15, 3, '', 1, 0, 'C');
$pdf->Cell(29, 3, '', 1, 0, 'C');
$pdf->Cell(15, 3, '', 1, 0, 'C');
$pdf->Cell(12, 3, '', 'R', 0);
$pdf->Cell(5, 3, '', 1, 0);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(15, 3, 'Cash Basis', 0, 0, 'L');
$pdf->Cell(29, 3, '', 'R', 1, 'C');
$pdf->Cell(31, 3, '', 1, 0, 'C');
$pdf->Cell(15, 3, '', 1, 0, 'C');
$pdf->Cell(29, 3, '', 1, 0, 'C');
$pdf->Cell(15, 3, '', 1, 0, 'C');
$pdf->Cell(12, 3, '', 'R', 0);
$pdf->Cell(5, 3, '', 1, 0);
$pdf->Cell(15, 3, 'Installment Basis', 0, 0, 'L');
$pdf->Cell(29, 3, '', 'R', 1, 'C');
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(46, 3, 'REMARKS', 'L', 0, 'C');
$pdf->SetFont('Arial', '', 6);
$pdf->Cell(22, 3, 'Student\'s', 'L', 0, 'L');
$pdf->Cell(22, 3, 'Dean\'s', 'L,R', 0, 'L');
$pdf->Cell(61, 3, 'Enrollment Good Only For This Semester', 'B,R', 1, 'C');
$pdf->Cell(46, 3, '', 'L', 0, 'C');
$pdf->Cell(22, 2.5, 'Signature', 'L', 0, 'L');
$pdf->Cell(22, 2.5, 'Signature', 'L,R', 0, 'L');
$pdf->Cell(32, 2.5, 'Amount Paid', 'L,R', 0, 'L');
$pdf->Cell(29, 2.5, '', 'L,R', 1, 'L');
$pdf->Cell(46, 3, '', 'L,B', 0, 'C');
$pdf->Cell(22, 3, '', 'L,B', 0, 'L');
$pdf->Cell(22, 3, '', 'L,R,B', 0, 'L');
$pdf->Cell(32, 3, '', 'L,R,B', 0, 'L');
$pdf->Cell(29, 3, 'Cashier', 'L,R,B', 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetXY(4, 125);
$pdf->Cell(100, 5, 'STUDENT\'S COPY', 0, 0, 'C');

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(1, 4, '', 0, 0);
$pdf->Cell(15, 5, 'Academics.', 0, 0, '');
$pdf->SetTextColor(255, 0, 0);
$pdf->SetFont('Arial', 'BI', 10);
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(15, 5, 'And beyond', 0, 1, '');





//left right top
//=============================================================================DEAN'S BACK
//=============================================================================DEAN'S BACK
//=============================================================================DEAN'S BACK
//=============================================================================DEAN'S BACK
//=============================================================================DEAN'S BACK
$pdf->SetTextColor(1, 0, 0);
$pdf->SetLeftMargin(4);
$pdf->SetRightMargin(10);
$pdf->SetAutoPageBreak(true, 8);
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 12);


$pdf->Cell(0, 5, 'INFORMATION', 'B', 1, 'C');
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(27, 4, 'NAME', 0, 0, 'C');
$pdf->Cell(27, 4, 'SURNAME', 0, 0, 'C');
$pdf->Cell(27, 4, 'FIRST NAME', 0, 0, 'C');
$pdf->Cell(27, 4, 'MIDDLE NAME', 'R', 1, 'C');
$pdf->Cell(27, 3, '', 'B', 0, 'C');
$pdf->Cell(27, 3, $row['lastname'], 'B', 0, 'C');
$pdf->Cell(27, 3, $row['firstname'], 'B', 0, 'C');
$pdf->Cell(27, 3, $row['middlename'], 'B', 1, 'C');
$pdf->Cell(108, 4, 'Present Address', 0, 1, 'L');
$pdf->Cell(108, 3, $row['address'], 'B', 1, 'C');
$pdf->Cell(68, 4, 'Home Address', 'R', 0, 'L');
$pdf->Cell(40, 4, 'Contact Number', 0, 1, 'L');
$fontsize = 8;
$tempFontSize = $fontsize;
$cellwidth = 68;
while ($pdf->GetStringWidth($row['address']) > $cellwidth) {
    $pdf->SetFontSize($tempFontSize -= 0.1);
}
$pdf->Cell(68, 3, $row['address'], 'R,B', 0, 'C');
$pdf->SetFontSize(8);
$pdf->Cell(40, 3, $row['contact'], 'B', 1, 'C');
$pdf->Cell(16, 4, 'Age', 'R', 0, 'L');
$pdf->Cell(22, 4, 'Gender', 'R', 0, 'L');
$pdf->Cell(30, 4, 'Civil Status', 'R', 0, 'L');
$pdf->Cell(40, 4, 'Nationality', 0, 1, 'L');
$pdf->Cell(16, 3, $row['age'], 'R,B', 0, 'C');
$pdf->Cell(22, 3, $row['gender'], 'R,B', 0, 'C');
$pdf->Cell(30, 3, $row['civilstatus'], 'R,B', 0, 'C');
$pdf->Cell(40, 3, $row['citizenship'], 'B', 1, 'C');
$pdf->Cell(68, 4, 'Place of Birth', 'R', 0, 'L');
$pdf->Cell(40, 4, 'Date of Birth', 0, 1, 'L');
$pdf->Cell(68, 3, $row['birthplace'], 'R,B', 0, 'C');
$pdf->Cell(40, 3, $row['birthdate'], 'B', 1, 'C');

$pdf->Cell(45, 4, 'Religion', 'R', 0, 'L');
$pdf->Cell(63, 4, 'Email Address', 0, 1, 'L');
$pdf->Cell(45, 3, $row['religion'], 'B,R', 0, 'C');
$tempFontSize = $fontsize;
$cellwidth = 50;
while ($pdf->GetStringWidth($row['email']) > $cellwidth) {
    $pdf->SetFontSize($tempFontSize -= 0.1);
}
$pdf->Cell(63, 3, $row['email'], 'R,B', 0, 'C');
$pdf->Cell(13, 3, '', 'B', 0, 'C');
$pdf->Cell(18, 3, '', 'B', 0, 'C');
$pdf->Cell(32, 3, '', 'B', 1, 'C');
$pdf->SetXY(112, 13);
$pdf->Cell(43, 42, '2x2 ID Pic', 1, 1, 'C');


$pdf->Cell(68, 4, 'High School From Which Graduated', 'R', 0, 'L');
$pdf->Cell(35, 4, 'Date', 'R', 0, 'L');
$pdf->Cell(48, 4, 'ACR. No. (For Alien)', 'R', 1, 'L');
$fontsize = 8;
$tempFontSize = $fontsize;
$cellwidth = 68;
while ($pdf->GetStringWidth($row['hs']) > $cellwidth) {
    $pdf->SetFontSize($tempFontSize -= 0.1);
}
$pdf->Cell(68, 3, $row['hs'], 'B,R', 0, 'C');
$pdf->SetFontSize(8);
$pdf->Cell(35, 3, $row['hsSY'], 'B,R', 0, 'C');
$pdf->Cell(48, 3, '', 'R', 1, 'C');


$pdf->Cell(103, 4, 'School Last Attended', 'R', 0, 'L');
$pdf->Cell(48, 4, '', 'R', 1, 'L');

$pdf->Cell(103, 3, $row['lastschool'], 'B,R', 0, 'C');
$pdf->Cell(48, 3, '', 'R', 1, 'C');

$pdf->Cell(38, 4, 'How Supported', 'R', 0, 'L');
$pdf->Cell(65, 4, 'Credential Submitted', 'R', 0, 'L');
$pdf->Cell(48, 4, '', 'R', 1, 'L');

$pdf->Cell(38, 3, '', 'B,R', 0, 'C');
$pdf->Cell(7, 3, '', 1, 0, 'C');
$pdf->Cell(15, 3, 'Form 138', 'B', 0, 'L');
$pdf->Cell(6.5, 3, '', 1, 0, 'C');
$pdf->Cell(15, 3, 'HD', 'B', 0, 'L');
$pdf->Cell(6.5, 3, '', 1, 0, 'C');
$pdf->Cell(15, 3, 'TR', 'B,R', 0, 'L');
$pdf->Cell(48, 3, '', 'R', 1, 'L');

$pdf->Cell(103, 4, 'Extra-Curricular Activities', 'R', 0, 'L');
$pdf->Cell(48, 4, '', 'B,R', 1, 'C');

$pdf->Cell(103, 3, '', 'B,R', 0, 'C');
$pdf->Cell(48, 3, 'NSTP STAMP', 'R', 1, 'L');

$pdf->Cell(53, 4, 'Name of Father', 'R', 0, 'L');
$pdf->Cell(50, 4, 'Name of Mother', 'R', 0, 'L');
$pdf->Cell(48, 4, '', 'R', 1, 'C');
$pdf->Cell(53, 4, $row['ffirstname'] . ' ' . $row['fmiddlename'] . ' ' . $row['flastname'], 'B,R', 0, 'C');
$pdf->Cell(50, 4, $row['mfirstname'] . ' ' . $row['mmiddlename'] . ' ' . $row['mlastname'], 'B,R', 0, 'C');
$pdf->Cell(48, 4, '', 'R', 1, 'C');

$pdf->Cell(53, 4, 'Name of Guardian', 'R', 0, 'L');
$pdf->Cell(50, 4, 'Relationship', 'R', 0, 'L');
$pdf->Cell(48, 4, '', 'R', 1, 'C');
$pdf->Cell(53, 4, $row['gfirstname'] . ' ' . $row['gmiddlename'] . ' ' . $row['glastname'], 'B,R', 0, 'C');
$pdf->Cell(50, 4, $row['relationship'], 'B,R', 0, 'C');
$pdf->Cell(48, 4, '', 'R', 1, 'C');

$pdf->Cell(68, 4, 'Address of Guardian', 'R', 0, 'L');
$pdf->Cell(35, 4, 'Occupation', 'R', 0, 'L');
$pdf->Cell(48, 4, '', 'R', 1);
$fontsize = 8;
$tempFontSize = $fontsize;
$cellwidth = 68;
while ($pdf->GetStringWidth($row['gaddress']) > $cellwidth) {
    $pdf->SetFontSize($tempFontSize -= 0.1);
}
$pdf->Cell(68, 3, $row['gaddress'], 'B,R', 0, 'C');
$pdf->SetFontSize(8);
$pdf->Cell(35, 3, $row['goccupation'], 'B,R', 0, 'C');
$pdf->Cell(48, 3, '', 'R', 1, 'C');

$pdf->Cell(103, 4, 'Semester and Year Last Enrolled in this College', 'R', 0, 'L');
$pdf->Cell(48, 4, '', 'R', 1, 'L');

$pdf->Cell(103, 3, '', 'B,R', 0, 'C');
$pdf->Cell(48, 3, '', 'B,R', 1, 'C');

$pdf->Cell(103, 4, 'I hereby certify that I have taken and passed the pre-requisites of the subject(s)', 'R', 0, 'R');
$pdf->Cell(48, 4, 'Amount Paid:', 'R', 1, 'L');

$pdf->Cell(103, 3, 'I have Enrolled in.', 'R', 0, 'L');
$pdf->Cell(48, 3, '', 'R', 1, 'C');

$pdf->Cell(53, 4, '', 0, 0);
$pdf->Cell(50, 4, '', 'B,R', 0, 'L');
$pdf->Cell(48, 4, '', 'B,R', 1, 'L');

$pdf->Cell(53, 4, '', 0, 0);
$pdf->Cell(50, 4, '(Signature of Student)', 'R', 0, 'C');
$pdf->Cell(48, 4, 'Cashier', 'R', 1, 'C');



//===============================================================================ACCOUNTING'S BACK
//===============================================================================ACCOUNTING'S BACK
//===============================================================================ACCOUNTING'S BACK
//===============================================================================ACCOUNTING'S BACK
//===============================================================================ACCOUNTING'S BACK
//===============================================================================ACCOUNTING'S BACK
$pdf->SetLeftMargin(5);
$pdf->SetRightMargin(10);
$pdf->SetAutoPageBreak(true, 8);
$pdf->AddPage();

// //cell(width,height,text,border,end line,[align])
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 6, 'INFORMATION', 0, 1, 'C');

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 5, 'The student should fill in the information desired below and sign the promisory note.', 'B', 1, 'C');

$pdf->SetFont('Arial', '', 9);
$pdf->Cell(9, 5, 'Name', 'L', 0);
$pdf->Cell(25, 5, '', 0, 0);
$pdf->Cell(25, 5, '', 0, 0);
$pdf->Cell(25, 5, '', 'R', 0);
//Gender
$pdf->Cell(33, 5, 'Gender', 'R', 0);

//Citizenship
$pdf->Cell(33, 5, 'Citizenship', 'R', 1);

//cell for NAMES
$pdf->Cell(9, 5, '', 'L', 0);
$pdf->Cell(25, 5, $row['lastname'], 0, 0, 'C');
$pdf->Cell(25, 5, $row['firstname'], 0, 0, 'C');
$pdf->Cell(25, 5, $row['middlename'], 'R', 0, 'C');
//function for GENDER
$pdf->Cell(33, 10, $row['gender'], 'R', 0, 'C');
//function for CITIZENSHIP
$pdf->Cell(33, 10, $row['citizenship'], 'R', 0, 'C');
$pdf->Cell(10, 5, '', 'L', 1);


$pdf->Cell(9, 5, '', 'L', 0);
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(25, 5, '(Surname)', 0, 0, 'C');
$pdf->Cell(25, 5, '(First Name)', 0, 0, 'C');
$pdf->Cell(25, 5, '(Middle Name)', 'R', 0, 'C');
$pdf->Cell(4, 5, '', 'L', 1);

//City address
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(.1, 5.5, '', 'L', 0);
$pdf->Cell(83.8, 5.5, 'City Address', 'T', 0);
$pdf->Cell(.1, 5.5, '', 'R', 0);
$pdf->Cell(65.9, 5.5, 'Email Address', 'T', 0);
$pdf->Cell(.1, 5.5, '', 'R', 1);

$pdf->Cell(.1, 6, '', 'L', 0);
//CITY ADDRESS FUNCTION
$pdf->SetFont('Arial', '', 8);
$fontsize = 8;
$tempFontSize = $fontsize;
$cellwidth = 83.9;
while ($pdf->GetStringWidth($row['address']) > $cellwidth) {
    $pdf->SetFontSize($tempFontSize -= 0.1);
}
$pdf->Cell(83.9, 6, $row['address'], 'B', 0, 'C');

$pdf->SetFontSize(8);
$tempFontSize = $fontsize;
$cellwidth = 50;
while ($pdf->GetStringWidth($row['email']) > $cellwidth) {
    $pdf->SetFontSize($tempFontSize -= 0.1);
}

$pdf->Cell(.1, 6, $row['email'], 'L', 0);
//PROV ADD FUNCTION
$pdf->Cell(65.8, 6, '', 'B', 0, 'C');
$pdf->Cell(.1, 6, '', 'R', 1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(.1, 16, '', 'L', 0);
$pdf->Cell(14.9, 16, 'Guardian', 'B', 0);

//GUARDIAN FUNCTION
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(68.9, 16, $row['gfirstname'] . ' ' . $row['gmiddlename'] . ' ' . $row['glastname'], 'B', 0, 'C');

$pdf->Cell(.1, 16, '', 'R', 0);
$pdf->SetFont('Arial', '', 8);

$pdf->Cell(66, 8, 'Address of Guardian', 'R', 1, 'C');
//guiardian add function



$pdf->Cell(84, 8, '', 0, 0, 'C');
$fontsize = 8;
$tempFontSize = $fontsize;
$cellwidth = 65.9;
while ($pdf->GetStringWidth($row['address']) > $cellwidth) {
    $pdf->SetFontSize($tempFontSize -= 0.1);
}
$pdf->Cell(65.9, 8, $row['gaddress'], 'B', 0, 'C');
$pdf->SetFontSize(8);
$pdf->Cell(.1, 8, '', 'R', 1);

$pdf->Cell(83.9, 6, 'Address of High School from where graduated', 'L', 0);
$pdf->Cell(.1, 6, '', 'R', 0);

$pdf->Cell(66, 6, 'Semester and year last enrolled in this college', 'R', 1);
//function add of HS
$fontsize = 8;
$tempFontSize = $fontsize;
$cellwidth = 83.9;
while ($pdf->GetStringWidth($row['hsAddress']) > $cellwidth) {
    $pdf->SetFontSize($tempFontSize -= 0.1);
}
$pdf->Cell(83.9, 6, $row['hsAddress'], 'L', 0);
$pdf->SetFontSize(8);
$pdf->Cell(.1, 6, '', 'R', 0);

//function sem and year
$pdf->Cell(66, 6, '', 'R', 1);
$pdf->Cell(150, 6, '', 'T', 1);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 7, 'PROMISSORY NOTE', 0, 1, 'C');
$pdf->Ln(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(150, 5, 'I hereby acknowledge that I will abide by the rules and regulations of SFAC concerning fees. Being allowed solely', 0, 1);
$pdf->Cell(150, 5, 'for my convenience to pay my tuition and other fees by installment, I hereby promise to pay on demand the full', 0, 1);
$pdf->Cell(150, 5, 'unpaid balance of my account for the entire semester or school term, as the case may be, even if I should stop ', 0, 1);
$pdf->Cell(150, 5, 'studying or transfer to another school before the end of the semester or school term', 0, 1);


$pdf->Cell(150, 4, '', 0, 1);
$pdf->Cell(70, 6, '', 'B', 0);
$pdf->Cell(40, 6, '', 0, 0);
$pdf->Cell(40, 6, '', 'B', 1);

$pdf->SetFont('Arial', '', 7);

$pdf->Cell(70, 6, 'Signature Over Printed Name', 0, 0, 'C');
$pdf->Cell(40, 6, '', 0, 0);
$pdf->Cell(40, 6, 'Date Signed', 0, 0, 'C');





//=============================================================================REGISTRAR'S BACK
//=============================================================================REGISTRAR'S BACK
//=============================================================================REGISTRAR'S BACK
//=============================================================================REGISTRAR'S BACK
//=============================================================================REGISTRAR'S BACK
$pdf->SetLeftMargin(4);
$pdf->SetRightMargin(10);
$pdf->SetAutoPageBreak(true, 8);
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 12);


$pdf->Cell(0, 5, 'INFORMATION', 'B', 1, 'C');
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(27, 4, 'NAME', 0, 0, 'C');
$pdf->Cell(27, 4, 'SURNAME', 0, 0, 'C');
$pdf->Cell(27, 4, 'FIRST NAME', 0, 0, 'C');
$pdf->Cell(27, 4, 'MIDDLE NAME', 'R', 1, 'C');
$pdf->Cell(27, 3, '', 'B', 0, 'C');
$pdf->Cell(27, 3, $row['lastname'], 'B', 0, 'C');
$pdf->Cell(27, 3, $row['firstname'], 'B', 0, 'C');
$pdf->Cell(27, 3, $row['middlename'], 'B', 1, 'C');
$pdf->Cell(108, 4, 'Present Address', 0, 1, 'L');
$pdf->Cell(108, 3, $row['address'], 'B', 1, 'C');
$pdf->Cell(68, 4, 'Home Address', 'R', 0, 'L');
$pdf->Cell(40, 4, 'Contact Number', 0, 1, 'L');
$fontsize = 8;
$tempFontSize = $fontsize;
$cellwidth = 68;
while ($pdf->GetStringWidth($row['address']) > $cellwidth) {
    $pdf->SetFontSize($tempFontSize -= 0.1);
}
$pdf->Cell(68, 3, $row['address'], 'R,B', 0, 'C');
$pdf->SetFontSize(8);
$pdf->Cell(40, 3, $row['contact'], 'B', 1, 'C');
$pdf->Cell(16, 4, 'Age', 'R', 0, 'L');
$pdf->Cell(22, 4, 'Gender', 'R', 0, 'L');
$pdf->Cell(30, 4, 'Civil Status', 'R', 0, 'L');
$pdf->Cell(40, 4, 'Nationality', 0, 1, 'L');
$pdf->Cell(16, 3, $row['age'], 'R,B', 0, 'C');
$pdf->Cell(22, 3, $row['gender'], 'R,B', 0, 'C');
$pdf->Cell(30, 3, $row['civilstatus'], 'R,B', 0, 'C');
$pdf->Cell(40, 3, $row['citizenship'], 'B', 1, 'C');
$pdf->Cell(68, 4, 'Place of Birth', 'R', 0, 'L');
$pdf->Cell(40, 4, 'Date of Birth', 0, 1, 'L');
$pdf->Cell(68, 3, $row['birthplace'], 'R,B', 0, 'C');
$pdf->Cell(40, 3, $row['birthdate'], 'B', 1, 'C');

$pdf->Cell(45, 4, 'Religion', 'R', 0, 'L');
$pdf->Cell(63, 4, 'Email Address', 0, 1, 'L');
$pdf->Cell(45, 3, $row['religion'], 'B,R', 0, 'C');
$tempFontSize = $fontsize;
$cellwidth = 50;
while ($pdf->GetStringWidth($row['email']) > $cellwidth) {
    $pdf->SetFontSize($tempFontSize -= 0.1);
}
$pdf->Cell(63, 3, $row['email'], 'R,B', 0, 'C');
$pdf->Cell(13, 3, '', 'B', 0, 'C');
$pdf->Cell(18, 3, '', 'B', 0, 'C');
$pdf->Cell(32, 3, '', 'B', 1, 'C');
$pdf->SetXY(112, 13);
$pdf->Cell(43, 42, '2x2 ID Pic', 1, 1, 'C');


$pdf->Cell(68, 4, 'High School From Which Graduated', 'R', 0, 'L');
$pdf->Cell(35, 4, 'Date', 'R', 0, 'L');
$pdf->Cell(48, 4, 'ACR. No. (For Alien)', 'R', 1, 'L');
$fontsize = 8;
$tempFontSize = $fontsize;
$cellwidth = 68;
while ($pdf->GetStringWidth($row['hs']) > $cellwidth) {
    $pdf->SetFontSize($tempFontSize -= 0.1);
}
$pdf->Cell(68, 3, $row['hs'], 'B,R', 0, 'C');
$pdf->SetFontSize(8);
$pdf->Cell(35, 3, $row['hsSY'], 'B,R', 0, 'C');
$pdf->Cell(48, 3, '', 'R', 1, 'C');


$pdf->Cell(103, 4, 'School Last Attended', 'R', 0, 'L');
$pdf->Cell(48, 4, '', 'R', 1, 'L');

$pdf->Cell(103, 3, $row['lastschool'], 'B,R', 0, 'C');
$pdf->Cell(48, 3, '', 'R', 1, 'C');

$pdf->Cell(38, 4, 'How Supported', 'R', 0, 'L');
$pdf->Cell(65, 4, 'Credential Submitted', 'R', 0, 'L');
$pdf->Cell(48, 4, '', 'R', 1, 'L');

$pdf->Cell(38, 3, '', 'B,R', 0, 'C');
$pdf->Cell(7, 3, '', 1, 0, 'C');
$pdf->Cell(15, 3, 'Form 138', 'B', 0, 'L');
$pdf->Cell(6.5, 3, '', 1, 0, 'C');
$pdf->Cell(15, 3, 'HD', 'B', 0, 'L');
$pdf->Cell(6.5, 3, '', 1, 0, 'C');
$pdf->Cell(15, 3, 'TR', 'B,R', 0, 'L');
$pdf->Cell(48, 3, '', 'R', 1, 'L');

$pdf->Cell(103, 4, 'Extra-Curricular Activities', 'R', 0, 'L');
$pdf->Cell(48, 4, '', 'B,R', 1, 'C');

$pdf->Cell(103, 3, '', 'B,R', 0, 'C');
$pdf->Cell(48, 3, 'NSTP STAMP', 'R', 1, 'L');

$pdf->Cell(53, 4, 'Name of Father', 'R', 0, 'L');
$pdf->Cell(50, 4, 'Name of Mother', 'R', 0, 'L');
$pdf->Cell(48, 4, '', 'R', 1, 'C');
$pdf->Cell(53, 4, $row['ffirstname'] . ' ' . $row['fmiddlename'] . ' ' . $row['flastname'], 'B,R', 0, 'C');
$pdf->Cell(50, 4, $row['mfirstname'] . ' ' . $row['mmiddlename'] . ' ' . $row['mlastname'], 'B,R', 0, 'C');
$pdf->Cell(48, 4, '', 'R', 1, 'C');

$pdf->Cell(53, 4, 'Name of Guardian', 'R', 0, 'L');
$pdf->Cell(50, 4, 'Relationship', 'R', 0, 'L');
$pdf->Cell(48, 4, '', 'R', 1, 'C');
$pdf->Cell(53, 4, $row['gfirstname'] . ' ' . $row['gmiddlename'] . ' ' . $row['glastname'], 'B,R', 0, 'C');
$pdf->Cell(50, 4, $row['relationship'], 'B,R', 0, 'C');
$pdf->Cell(48, 4, '', 'R', 1, 'C');

$pdf->Cell(68, 4, 'Address of Guardian', 'R', 0, 'L');
$pdf->Cell(35, 4, 'Occupation', 'R', 0, 'L');
$pdf->Cell(48, 4, '', 'R', 1);
$fontsize = 8;
$tempFontSize = $fontsize;
$cellwidth = 65;
while ($pdf->GetStringWidth($row['gaddress']) > $cellwidth) {
    $pdf->SetFontSize($tempFontSize -= 0.1);
}
$pdf->Cell(68, 3, $row['gaddress'], 'B,R', 0, 'C');
$pdf->SetFontSize(8);
$pdf->Cell(35, 3, $row['goccupation'], 'B,R', 0, 'C');
$pdf->Cell(48, 3, '', 'R', 1, 'C');

$pdf->Cell(103, 4, 'Semester and Year Last Enrolled in this College', 'R', 0, 'L');
$pdf->Cell(48, 4, '', 'R', 1, 'L');

$pdf->Cell(103, 3, '', 'B,R', 0, 'C');
$pdf->Cell(48, 3, '', 'B,R', 1, 'C');

$pdf->Cell(103, 4, 'I hereby certify that I have taken and passed the pre-requisites of the subject(s)', 'R', 0, 'R');
$pdf->Cell(48, 4, 'Amount Paid:', 'R', 1, 'L');

$pdf->Cell(103, 3, 'I have Enrolled in.', 'R', 0, 'L');
$pdf->Cell(48, 3, '', 'R', 1, 'C');

$pdf->Cell(53, 4, '', 0, 0);
$pdf->Cell(50, 4, '', 'B,R', 0, 'L');
$pdf->Cell(48, 4, '', 'B,R', 1, 'L');

$pdf->Cell(53, 4, '', 0, 0);
$pdf->Cell(50, 4, '(Signature of Student)', 'R', 0, 'C');
$pdf->Cell(48, 4, 'Cashier', 'R', 1, 'C');

//============================================================================STUDENT'S BACK
//============================================================================STUDENT'S BACK
//============================================================================STUDENT'S BACK
//============================================================================STUDENT'S BACK
//============================================================================STUDENT'S BACK
//============================================================================STUDENT'S BACK
$pdf->SetFont('Arial', 'B', 4.5);
$pdf->SetTopMargin(13);
$pdf->SetLeftMargin(13);
$pdf->AddPage();
$pdf->Cell(0, 2.3, 'RULES CONCERNING FEES:', 0, 1, 'L');
$pdf->Cell(0, 2.3, '', 0, 1, 'L');
$pdf->Cell(0, 2.3, 'PAYMENT OF FEES:', 0, 1, 'L');
$pdf->SetFont('Arial', '', 4.5);
$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, 'All fees are computed on the semestral or school term basis and are payable in upon registration. The total fees may be paid by installment under the terms', 0, 1, 'L');
$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, 'but is should not be interpreted, however, that the fees are payable on the month-to-month basis:', 0, 1, 'L');
$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, '1. Down payment 40% of the total fees to be paid upon registration.', 0, 1, 'L');
$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, '2. Second installment 70% of the total fees to be paid on or beore the first periodic examination', 0, 1, 'L');
$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, '3. Third installment 100% of the total fees to be paid on or before the mid semestral examination.', 0, 1, 'L');
$pdf->Cell(0, 2.3, '', 0, 1, 'L');
$pdf->SetFont('Arial', 'B', 4.5);
$pdf->Cell(0, 2.3, 'DISCOUNT PRIVILEGE:', 0, 1, 'L');

$pdf->SetFont('Arial', '', 4.5);
$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, 'Discount on tuition fee only, may be given under the following conditions.', 0, 1, 'L');

$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, '1. 5% discount is given if the total fees is paid in full upon registration,', 0, 1, 'L');
$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, '2. 5%, 10%, 15%, 20%, and 25% is given to second, third, fourth, fifth, and six brothers/sisters respectively', 0, 1, 'L');
$pdf->Cell(0, 2.3, '', 0, 1, 'L');

$pdf->SetFont('Arial', 'B', 4.5);
$pdf->Cell(0, 2.3, 'ADJUSTMENT OF FEES DUE TO WITHDRAWAL OF ENROLLMENT:', 0, 1, 'L');

$pdf->SetFont('Arial', '', 4.5);
$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, 'Section VI, paragrap 137 & 139 of Manual of Regulations of Private Schools, Seventh Edition, 1970 of the Bureau of Private Schools, which is quoted below govern the refund or', 0, 1, 'L');

$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, 'adjustment of fees:', 0, 1, 'L');

$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, '"137, When a student registers in a school, it is understood that he is enrolling for the entire school year for elementary and secondary courses, and for the entire semester for the collegiate', 0, 1, 'L');

$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, 'courses. A student who transfers on otherwise withdraws, In writing, within two weeks after the beginning of classes and who has already paid the pertinent tuition and other school fees', 0, 1, 'L');

$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, 'in full on any length longer than one month may be charged ten percent (10%) of the total amount due for the term if the withdraws within the first week of classes, or twenty percent (20%)', 0, 1, 'L');

$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, 'if within the second week of classes, regardless of whether or not he has actually attended classes. The student may be charged all the school fees in full if the withdraw anytime after the', 0, 1, 'L');

$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, 'second week of classes. However, if the transfer on withdrawal is due to a justifiable reason, the student shall be charged the pertinent fees up to an including the last month of', 0, 1, 'L');

$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, '"139. Full refund of fees shall be made for any course or level which has been discontinued by the school or not', 0, 1, 'L');

$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, 'credited by the office thru no fault of the student."', 0, 1, 'L');

$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, 'The fees paid for registration and identification card are not refundable.', 0, 1, 'L');
$pdf->Cell(0, 2.3, '', 0, 1, 'L');

$pdf->SetFont('Arial', 'B', 4.5);
$pdf->Cell(0, 2.3, 'NON-PAYMENT OF ACCOUNT:', 0, 1, 'L');

$pdf->SetFont('Arial', '', 4.5);
$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, 'The administration reserves the right to suspend or drop from the rolls any student who has not paid in full his/her financial obligations on or before the scheduled dated of the third', 0, 1, 'L');

$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, 'periodic examination. It is also reserves the right to withhold from a student the issuance of report card (form 138), honorable dismissal, certification, or other on other records, unless the', 0, 1, 'L');

$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, 'student has fully settled his/her financial obligation or property with the collage.', 0, 1, 'L');

$pdf->Cell(0, 2.3, '', 0, 1, 'L');


$pdf->SetFont('Arial', 'B', 4.5);
$pdf->Cell(0, 2.3, 'CHANGE OF SUBJECT, LOAD, SECTION OR COURSE:', 0, 1, 'L');

$pdf->SetFont('Arial', '', 4.5);
$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, 'Any student who have desires to change his subkect load section, or course must secure an application from the Registrar\'s Office accomplish it and have it approved by the Registrar\'s Office', 0, 1, 'L');

$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, 'within seven days after the first day of classes in order to entitle him to the corresponding adjustment fees.', 0, 1, 'L');


$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, 'If the dropping of any subjects is made after the said period, even if it is approved by the Registrar, the student is no longer entitled to the corresponding reduction fees.', 0, 1, 'L');

$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, 'If the change in the subject load or section is recommended by the Registrar or proper authorities, corresponding adjustment of fees will be made regardless of the date when affected.', 0, 1, 'L');

$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, 'Except when the change of subject load, section, or course is recommended by the Registrar or proper authorities application thereof shall no longer be entertained after seven (7) days from', 0, 1, 'L');

$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, 'start of classes', 0, 1, 'L');

$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, 'During the summer term, application for change of subkect load shall no longer be entertained after three (3) days from the start of the classes.', 0, 1, 'L');

$pdf->Cell(0, 2.3, '', 0, 1, 'L');

$pdf->SetFont('Arial', 'B', 5);
$pdf->Cell(0, 2.3, 'PLEASE RECORD YOUR PAYMENTS BELOW FOR REFERENCES', 0, 1, 'L');

$pdf->SetFont('Arial', '', 5);
$pdf->Cell(29, 3, 'Date', 1, 0, 'C');
$pdf->Cell(24, 3, 'O.R. No.', 1, 0, 'C');
$pdf->Cell(22, 3, 'Amount Paid', 1, 0, 'C');
$pdf->Cell(24, 3, 'Date', 1, 0, 'C');
$pdf->Cell(21, 3, 'O.R. No.', 1, 0, 'C');
$pdf->Cell(23, 3, 'Amount Paid', 1, 1, 'C');

$pdf->Cell(29, 3, '', 1, 0, 'C');
$pdf->Cell(24, 3, '', 1, 0, 'C');
$pdf->Cell(22, 3, '', 1, 0, 'C');
$pdf->Cell(24, 3, '', 1, 0, 'C');
$pdf->Cell(21, 3, '', 1, 0, 'C');
$pdf->Cell(23, 3, '', 1, 1, 'C');
$pdf->Cell(29, 3, '', 1, 0, 'C');
$pdf->Cell(24, 3, '', 1, 0, 'C');
$pdf->Cell(22, 3, '', 1, 0, 'C');
$pdf->Cell(24, 3, '', 1, 0, 'C');
$pdf->Cell(21, 3, '', 1, 0, 'C');
$pdf->Cell(23, 3, '', 1, 1, 'C');
$pdf->Cell(29, 3, '', 1, 0, 'C');
$pdf->Cell(24, 3, '', 1, 0, 'C');
$pdf->Cell(22, 3, '', 1, 0, 'C');
$pdf->Cell(24, 3, '', 1, 0, 'C');
$pdf->Cell(21, 3, '', 1, 0, 'C');
$pdf->Cell(23, 3, '', 1, 1, 'C');
$pdf->Cell(29, 3, '', 1, 0, 'C');
$pdf->Cell(24, 3, '', 1, 0, 'C');
$pdf->Cell(22, 3, '', 1, 0, 'C');
$pdf->Cell(24, 3, '', 1, 0, 'C');
$pdf->Cell(21, 3, '', 1, 0, 'C');
$pdf->Cell(23, 3, '', 1, 1, 'C');
$pdf->Cell(29, 3, '', 1, 0, 'C');
$pdf->Cell(24, 3, '', 1, 0, 'C');
$pdf->Cell(22, 3, '', 1, 0, 'C');
$pdf->Cell(24, 3, '', 1, 0, 'C');
$pdf->Cell(21, 3, '', 1, 0, 'C');
$pdf->Cell(23, 3, '', 1, 1, 'C');
$pdf->Cell(29, 3, '', 1, 0, 'C');
$pdf->Cell(24, 3, '', 1, 0, 'C');
$pdf->Cell(22, 3, '', 1, 0, 'C');
$pdf->Cell(24, 3, '', 1, 0, 'C');
$pdf->Cell(21, 3, '', 1, 0, 'C');
$pdf->Cell(23, 3, '', 1, 1, 'C');

$pdf->Output();