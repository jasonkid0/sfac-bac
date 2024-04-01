<?php

require '../../../includes/conn.php';
require('../../fpdf/fpdf.php');


$or_id = $_GET['stud_id'];

class PDF extends FPDF
{

    // Page header

}
// Active Acadyear & Semester
$getAAcadYear = $db->query("SELECT * FROM tbl_active_acads AC LEFT JOIN tbl_acadyears A ON A.ay_id = AC.ay_id");
while ($row = $getAAcadYear->fetch_array()) {
    $_SESSION['AC'] = $row['academic_year'];
    $_SESSION['AYear'] = $row['ay_id'];
}
$getASem = $db->query("SELECT * FROM tbl_active_sem ASEM LEFT JOIN tbl_semesters S ON S.sem_id = ASEM.sem_id");
while ($row = $getASem->fetch_array()) {
    $_SESSION['S'] = $row['semester'];
    $_SESSION['ASem'] = $row['sem_id'];
}

$que = mysqli_query($db, "SELECT * FROM tbl_online_registrations
    LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_online_registrations.gender_id
    LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_online_registrations.course_id
    LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_online_registrations.year_id
    where tbl_online_registrations.or_id = '$or_id'");

$row = mysqli_fetch_array($que);

$pdf = new PDF('P', 'mm', 'letter');
//left top right
$pdf->SetMargins(10, 10, 10);
$pdf->AddPage();

// Logo(x axis, y axis, height, width)
$pdf->Image('../../../assets/img/logos/logo.png', 50, 8, 15, 15);
// text color
$pdf->SetTextColor(255, 0, 0);
// font(font type,style,font size)
$pdf->SetFont('Arial', 'B', 18);
// Dummy cell
$pdf->Cell(50);
$pdf->Rect(5, 5, 205, 260); // box 
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(110, 8, 'Saint Francis of Assisi College', 0, 1, 'C');

$pdf->Ln(1);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(95, 5, '', 0, 0, 'C');
$pdf->Cell(17, 3, '98 Bayanan, City of Bacoor, Cavite ', 0, 1, 'C');
$pdf->Cell(95, 5, '', 0, 0, 'C');
$pdf->Cell(17, 5, 'Telephone no. 502-6305 ', 0, 0, 'C');

$pdf->Ln(2);
$pdf->Rect(175, 10, 30, 30);// box
$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 5, '', 0, 0, 'C');
$pdf->Cell(340, 3, 'ID PICTURE', 0, 1, 'C');

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(95, 5, '', 0, 0,'C');
$pdf->Cell(13, 5, 'COLLEGE DEPARTMENT', 0, 1, 'C');

$pdf->Ln(1);
$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(95, 5, '', 0, 0);
$pdf->Cell(13, 5, 'APPLICATION FOR ADMISSION', 0, 1, 'C');

$pdf->SetFont('Arial', 'B', 11);
$pdf->SetFillColor(255, 0,0); // COLOR PER BOX red
$pdf->Rect(5, 42, 205, 6,true);// box
$pdf->Rect(5, 42, 205, 6);// box
$pdf->SetTextColor(255, 255,255); // color white text
$pdf->Cell(95, 9, '', 0, 0);// for spacing
$pdf->Cell(13, 13, 'ENTRY INFORMATION', 0, 1, 'C');

$pdf->SetTextColor(0,0,0); // color black text

$date = date("F j, Y");

$pdf->Ln(1);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(1, 4, '', 0, 0); // spacing
$pdf->Cell(32, 3, 'Date of Application ', 0, 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(35, 3, $date, 'B', 0, 'C'); // for data
$pdf->Cell(65, 4, '', 0, 0); // spacing
$pdf->Cell(32, 3, 'ACADEMIC YEAR ', 0, 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(26, 3, $_SESSION['AC'], 'B', 1, 'C'); // for data

$pdf->Ln(3);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(1, 4, '', 0, 0); // spacing
$pdf->Cell(25, 3, 'Application as ', 0, 0);
$pdf->Cell(10, 3, '', 'B', 0, 'L'); // line
$pdf->Cell(25, 3, 'Freshman', 0, 0);
$pdf->Cell(10, 3, '', 'B', 0, 'L'); // line
$pdf->Cell(25, 3, 'Teansferee', 0, 0);
$pdf->Cell(10, 3, '', 'B', 0, 'L'); // line
$pdf->Cell(25, 3, 'Second Course', 0, 0);
$pdf->Cell(15, 4, '', 0, 0); // spacing
$pdf->Cell(25, 3, 'Year Level', 0, 1);

$pdf->Ln(2);
$pdf->Cell(1, 4, '', 0, 0); // spacing
$pdf->Cell(25, 3, 'School Term ', 0, 0);
$pdf->Cell(10, 3, '', 'B', 0, 'L'); // line
$pdf->Cell(25, 3, '1st', 0, 0);
$pdf->Cell(10, 3, '', 'B', 0, 'L'); // line
$pdf->Cell(25, 3, '2nd', 0, 0);
$pdf->Cell(10, 3, '', 'B', 0, 'L'); // line
$pdf->Cell(25, 3, 'Summer', 0, 0);
$pdf->Cell(15, 4, '', 0, 0); // spacing
// box im year level
$pdf->SetFillColor(0, 0,0); // COLOR PER BOX gray
// if ($row['year_id'] == '1')
$pdf->Rect(150, 62, 4, 4,  ($row['year_id'] == 1) ? true : false);// box
$pdf->Rect(165, 62, 4, 4,  ($row['year_id'] == 2) ? true : false);// box
$pdf->Rect(180, 62, 4, 4,  ($row['year_id'] == 3) ? true : false);// box
$pdf->Rect(195, 62, 4, 4,  ($row['year_id'] == 4) ? true : false);// box
$pdf->Cell(15, 3, 'I', 0, 0);
$pdf->Cell(15, 3, 'II', 0, 0);
$pdf->Cell(15, 3, 'III', 0, 0);
$pdf->Cell(15, 3, 'IV', 0, 1);

$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(65, 4, '', 0, 0); // spacing
$pdf->Cell(25, 3, 'COURSE/PROGRAM APPLIED FOR:', 0, 1);

$pdf->Ln(2);
$pdf->SetFont('Arial', '', 9);
$pdf->Rect(10, 76, 5, 4,  ($row['course_id'] == 1) ? true : false);// box
$pdf->Cell(8, 5, '', 0, 0); // spacing
$pdf->Cell(5, 5, 'Bachelor of Science in Computer Science', 0, 0);
$pdf->Rect(132, 76, 5, 4,  ($row['course_id'] == 17) ? true : false);// box
$pdf->Cell(115, 5, '', 0, 0); // spacing
$pdf->Cell(20, 5, 'Bachelor in Early Childhood Education', 0, 1);
$pdf->Rect(10, 81, 5, 4,  ($row['course_id'] == 15) ? true : false);// box
$pdf->Cell(8, 5, '', 0, 0); // spacing
$pdf->Cell(5, 5, 'Bachelor of Science in Hospitality Management', 0, 0);
$pdf->Rect(132, 81, 5, 4,  ($row['course_id'] == 11 || $row['course_id'] == 10 || $row['course_id'] == 12) ? true : false);// box
$pdf->Cell(115, 5, '', 0, 0); // spacing
$pdf->Cell(5, 5, 'Bachelor in Secondary Education', 0, 1);
$pdf->Rect(10, 86, 5, 4,  ($row['course_id'] == 3 || $row['course_id'] == 25 || $row['course_id'] == 26) ? true : false);// box
$pdf->Cell(8, 5, '', 0, 0); // spacing
$pdf->Cell(5, 5, 'Bachelor of Science in Business Administration', 0, 0);
$pdf->Cell(115, 5, '', 0, 0); // spacing
$pdf->Cell(5, 5, 'Major in Mathematics', 0, 1);
$pdf->Cell(8, 5, '', 0, 0); // spacing
$pdf->Cell(5, 5, 'Major in Financial Management', 0, 0);
$pdf->Cell(115, 5, '', 0, 0); // spacing
$pdf->Cell(5, 5, 'Major in English', 0, 1);
$pdf->Cell(8, 5, '', 0, 0); // spacing
$pdf->Cell(5, 5, 'Major in Marketing Management', 0, 0);
$pdf->Cell(115, 5, '', 0, 0); // spacing
$pdf->Cell(5, 5, 'Major in Filipino', 0, 1);
$pdf->Cell(8, 5, '', 0, 0); // spacing
$pdf->Cell(5, 5, 'Major in Operations Management', 0, 0);
$pdf->Rect(132, 101, 5, 4,  ($row['course_id'] == 18) ? true : false);// box
$pdf->Cell(115, 5, '', 0, 0); // spacing
$pdf->Cell(5, 5, 'Bachelor in Physical Education', 0, 1);
$pdf->Rect(10, 106, 5, 4,  ($row['course_id'] == 19) ? true : false);// box
$pdf->Cell(8, 5, '', 0, 0); // spacing
$pdf->Cell(5, 5, 'Bachelor in Elementary Education', 0, 0);
$pdf->Rect(132, 106, 5, 4);// box
$pdf->Cell(115, 5, '', 0, 0); // spacing
$pdf->Cell(5, 5, 'Supplimental/Cross-Enroll', 0, 1);

$pdf->Ln(1);
$pdf->SetFont('Arial', 'B', 11);
$pdf->SetFillColor(255, 0,0); // COLOR PER BOX red
$pdf->Rect(5, 115, 205, 6,true);// box
$pdf->Rect(5, 115, 205, 6);// box
$pdf->SetTextColor(255, 255,255); // color white text
$pdf->Cell(95, 9, '', 0, 0);// for spacing
$pdf->Cell(13, 13, 'PERSONAL DATA', 0, 1, 'C');

$pdf->SetTextColor(0,0,0); // color black text
$pdf->SetFillColor(0, 0,0); // COLOR PER BOX red
$pdf->Ln(1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(13, 4, 'Name:', 0, 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(36, 4, $row['lastname'], 'B', 0, 'C'); // for data sa name
$pdf->Cell(40, 4,$row['firstname'], 'B', 0, 'C');// for data
$pdf->Cell(40, 4,$row['middlename'], 'B', 0, 'C');// for data
$pdf->Cell(4, 2, '', 0, 0);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(15, 3, 'Sex', 0, 0);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Rect(162, 125, 5, 4,  ($row['gender_id'] == 1) ? true : false);// box
$pdf->Cell(12, 4, '', 0, 0); // spacing
$pdf->Cell(15, 3, 'Male ', 0, 1);

$pdf->Ln(2);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(15, 4, '', 0, 0, 'C');
$pdf->Cell(28, 3, 'Surname', 0, 0, 'C');
$pdf->Cell(45, 3, 'First Name', 0, 0, 'C');
$pdf->Cell(45, 3, 'Middle Name', 0, 0, 'C');
$pdf->Rect(162, 130, 5, 4,  ($row['gender_id'] == 2) ? true : false);// box
$pdf->Cell(27, 4, '', 0, 0); // spacing
$pdf->Cell(15, 3, 'Female ', 0, 1);

$pdf->Ln(4);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(25, 4, 'Home Address: ', 0, 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(170, 4, $row['address'], 'B', 1, 'L'); // for data

$pdf->Ln(2);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(23, 4, 'Telephone No. ', 0, 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(40, 4, '', 'B', 0, 'L'); // for data

$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(8, 4, '', 0, 0, 'C');
$pdf->Cell(18, 4, 'Mobile No. ', 0, 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(40, 4, $row['contact'], 'B', 0, 'L'); // for data

$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(6, 4, '', 0, 0, 'C');
$pdf->Cell(13, 4, 'Email ', 0, 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(47, 4, $row['email'], 'B', 1, 'L'); // for data

$pdf->Ln(2);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(23, 4, 'Date of Birth. ', 0, 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(40, 4, $row['birthdate'], 'B', 0, 'L'); // for data

$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(8, 4, '', 0, 0, 'C');
$pdf->Cell(23, 4, 'Place of Birth', 0, 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(35, 4, $row['birthplace'], 'B', 0, 'L'); // for data

$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(6, 4, '', 0, 0, 'C');
$pdf->Cell(13, 4, 'Age ', 0, 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(47, 4, $row['age'], 'B', 1, 'L'); // for data

$pdf->Ln(2);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(23, 4, 'Civil Status ', 0, 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(40, 4, $row['civilstatus'], 'B', 0, 'L'); // for data

$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(8, 4, '', 0, 0, 'C');
$pdf->Cell(23, 4, 'Citizenship', 0, 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(35, 4, $row['citizenship'], 'B', 0, 'L'); // for data

$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(5, 4, '', 0, 0, 'C');
$pdf->Cell(14, 4, 'Religion ', 0, 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(47, 4, $row['religion'], 'B', 1, 'L'); // for data

$pdf->Ln(2);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(1, 4, '', 0, 0, 'C');
$pdf->Cell(42, 4, 'If married, name of spouse', 0, 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(152, 4, '', 'B', 1, 'L'); // for data

$pdf->Ln(1);
$pdf->SetFont('Arial', 'B', 11);
$pdf->SetFillColor(255, 0,0); // COLOR PER BOX red
$pdf->Rect(5, 168, 205, 6,true);// box
$pdf->Rect(5, 168, 205, 6);// box
$pdf->SetTextColor(255, 255,255); // color white text
$pdf->Cell(95, 8, '', 0, 0);// for spacing
$pdf->Cell(13, 9, 'FAMILY BACKGROUND', 0, 1, 'C');

$pdf->SetTextColor(0,0,0); // color black text
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(66, 7, '', 1, 0, 'C');
$pdf->Cell(66, 7, 'FATHER', 1, 0, 'C');
$pdf->Cell(66, 7, 'MOTHER', 1, 1, 'C');

$pdf->Cell(66, 7, 'NAME', 1, 0, 'C');
$pdf->Cell(66, 7, $row['ffirstname'] .' '. $row['fmiddlename'] .'. '. $row['flastname'], 1, 0, 'C');
$pdf->Cell(66, 7,  $row['mfirstname'] .' '. $row['mmiddlename'] .'. '. $row['mlastname'], 1, 1, 'C');

$pdf->Cell(66, 7, 'Contact Numbers', 1, 0, 'C');
$pdf->Cell(66, 7, '', 1, 0, 'C');
$pdf->Cell(66, 7, '', 1, 1, 'C');

$pdf->Cell(66, 7, 'Occupation', 1, 0, 'C');
$pdf->Cell(66, 7, $row['foccupation'], 1, 0, 'C');
$pdf->Cell(66, 7, $row['moccupation'], 1, 1, 'C');


$pdf->Ln(5);
$pdf->Cell(70, 4, 'GUARDIANS NAME(if not living with parents)', 0, 0);
$pdf->Cell(65, 4, $row['gfirstname'] .' '. $row['gmiddlename'] .'. '. $row['glastname'], 'B', 0, 'C');
$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(18, 4, 'Relationship', 0, 0);
$pdf->Cell(37, 4, $row['relationship'], 'B', 1, 'C');
$pdf->Ln(3);
$pdf->Cell(39, 4, 'Guardian\'s Contact Number', 0, 0);
$pdf->Cell(96, 4, '', 'B', 1, 'L');
$pdf->Ln(3);
$pdf->Cell(39, 4, 'Guardian\'s Mailing Address', 0, 0);
$pdf->Cell(155, 4, $row['gaddress'], 'B', 1, 'L');

$pdf->AddPage();
$pdf->Rect(5, 8, 205, 260); // box

$pdf->Ln(1);
$pdf->SetFont('Arial', 'B', 11);
$pdf->SetFillColor(255, 0,0); // COLOR PER BOX red
$pdf->Rect(5, 8, 205, 6,true);// box
$pdf->Rect(5, 8, 205, 6);// box
$pdf->SetTextColor(255, 255,255); // color white text
$pdf->Cell(95, 9, '', 0, 0);// for spacing
$pdf->Cell(13, 1, 'BROTHER\'S AND SISTER\'S (eldest to youngest)', 0, 1, 'C');

$pdf->Ln(4);
$pdf->SetTextColor(0,0,0); // color black text
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(48, 7, 'NAME', 1, 0, 'C');
$pdf->Cell(18, 7, 'AGE', 1, 0, 'C');
$pdf->Cell(37, 7, 'CIVIL STATUS', 1, 0, 'C');
$pdf->Cell(43, 7, 'SCHOOL', 1, 0, 'C');
$pdf->Cell(53, 7, 'EDUCATIONAL BACKGROUND', 1, 1, 'C');

$pdf->Cell(48, 7, '', 1, 0, 'C');
$pdf->Cell(18, 7, '', 1, 0, 'C');
$pdf->Cell(37, 7, '', 1, 0, 'C');
$pdf->Cell(43, 7, '', 1, 0, 'C');
$pdf->Cell(53, 7, '', 1, 1, 'C');

$pdf->Cell(48, 7, '', 1, 0, 'C');
$pdf->Cell(18, 7, '', 1, 0, 'C');
$pdf->Cell(37, 7, '', 1, 0, 'C');
$pdf->Cell(43, 7, '', 1, 0, 'C');
$pdf->Cell(53, 7, '', 1, 1, 'C');

$pdf->Cell(48, 7, '', 1, 0, 'C');
$pdf->Cell(18, 7, '', 1, 0, 'C');
$pdf->Cell(37, 7, '', 1, 0, 'C');
$pdf->Cell(43, 7, '', 1, 0, 'C');
$pdf->Cell(53, 7, '', 1, 1, 'C');

$pdf->Cell(48, 7, '', 1, 0, 'C');
$pdf->Cell(18, 7, '', 1, 0, 'C');
$pdf->Cell(37, 7, '', 1, 0, 'C');
$pdf->Cell(43, 7, '', 1, 0, 'C');
$pdf->Cell(53, 7, '', 1, 1, 'C');

$pdf->Cell(48, 7, '', 1, 0, 'C');
$pdf->Cell(18, 7, '', 1, 0, 'C');
$pdf->Cell(37, 7, '', 1, 0, 'C');
$pdf->Cell(43, 7, '', 1, 0, 'C');
$pdf->Cell(53, 7, '', 1, 1, 'C');

$pdf->Cell(48, 7, '', 1, 0, 'C');
$pdf->Cell(18, 7, '', 1, 0, 'C');
$pdf->Cell(37, 7, '', 1, 0, 'C');
$pdf->Cell(43, 7, '', 1, 0, 'C');
$pdf->Cell(53, 7, '', 1, 1, 'C');

$pdf->Ln(1);
$pdf->SetFont('Arial', 'B', 11);
$pdf->SetFillColor(255, 0,0); // COLOR PER BOX red
$pdf->Rect(5, 67, 205, 6,true);// box
$pdf->Rect(5, 67, 205, 6);// box
$pdf->SetTextColor(255, 255,255); // color white text
$pdf->Cell(95, 8, '', 0, 0);// for spacing
$pdf->Cell(13, 8, 'EDUCATIONAL BACKGROUND', 0, 1, 'C');
$pdf->SetTextColor(0,0,0); // color black text

$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(85, 4, '', 0, 0, 'C'); // space
$pdf->Cell(23, 4, 'Grade School', 0, 1);
$pdf->SetFont('Arial', '', 9);
$pdf->Rect(5, 78, 205, 11);// box
$pdf->Cell(27, 6, 'Name of School', 0, 0);
$pdf->Cell(78, 5, '', 'B', 0, 'C'); // for data
$pdf->Cell(20, 6, 'School Year:', 0, 0);
$pdf->Cell(65, 5, '', 'B', 1, 'C'); // for data
$pdf->Cell(27, 6, 'School Address', 0, 0);
$pdf->Cell(78, 5, '', 'B', 1, 'C'); // for data

$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(85, 4, '', 0, 0, 'C'); // space
$pdf->Cell(23, 4, 'High School', 0, 1);
$pdf->SetFont('Arial', '', 9);
$pdf->Rect(5, 97, 205, 11);// box
$pdf->Cell(27, 6, 'Name of School', 0, 0);
$pdf->Cell(78, 5, $row['hs'], 'B', 0, 'C'); // for data
$pdf->Cell(20, 6, 'School Year:', 0, 0);
$pdf->Cell(65, 5, $row['hsSY'], 'B', 1, 'C'); // for data
$pdf->Cell(27, 6, 'School Address', 0, 0);
$pdf->Cell(78, 5, $row['hsAddress'], 'B', 1, 'C'); // for data

$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(85, 4, '', 0, 0, 'C'); // space
$pdf->Cell(23, 4, 'Senior High School', 0, 1);
$pdf->SetFont('Arial', '', 9);
$pdf->Rect(5, 116, 205, 11);// box
$pdf->Cell(27, 6, 'Name of School', 0, 0);
$pdf->Cell(78, 5, '', 'B', 0, 'C'); // for data
$pdf->Cell(20, 6, 'School Year:', 0, 0);
$pdf->Cell(65, 5, '', 'B', 1, 'C'); // for data
$pdf->Cell(27, 6, 'School Address', 0, 0);
$pdf->Cell(78, 5, '', 'B', 1, 'C'); // for data

$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(85, 4, '', 0, 0, 'C'); // space
$pdf->Cell(23, 4, 'College', 0, 1);
$pdf->SetFont('Arial', '', 9);
$pdf->Rect(5, 135, 205, 11);// box
$pdf->Cell(27, 6, 'Name of School', 0, 0);
$pdf->Cell(78, 5, '', 'B', 0, 'C'); // for data
$pdf->Cell(20, 6, 'School Year:', 0, 0);
$pdf->Cell(65, 5, '', 'B', 1, 'C'); // for data
$pdf->Cell(27, 6, 'School Address', 0, 0);
$pdf->Cell(78, 5, '', 'B', 0, 'C'); // for data
$pdf->Cell(27, 6, 'Course and Major', 0, 0);
$pdf->Cell(58, 5, '', 'B', 1, 'C'); // for data
$pdf->Output();
