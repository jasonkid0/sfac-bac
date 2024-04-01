<?php
require '../fpdf/fpdf.php';

class PDF extends FPDF
{

// Page header

}

$pdf = new PDF('P', 'mm', 'Legal');
//left top right
$pdf->SetMargins(10, 10, 10);
$pdf->AddPage();

// Logo(x axis, y axis, height, width)
$pdf->Image('../../assets/img/logos/logo.png', 50, 5, 15, 15);
// text color
$pdf->SetTextColor(255, 0, 0);
// font(font type,style,font size)
$pdf->SetFont('Arial', 'B', 18);
// Dummy cell
$pdf->Cell(50);
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(110, 5, 'Saint Francis of Assisi College', 0, 0, 'C');
// Line break
$pdf->Ln(5);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial', '', 10, 'C');
// dummy cell
$pdf->Cell(50);
// //cell(width,height,text,border,end line,[align])
$test = utf8_decode("Piñas");
$pdf->Cell(90, 3, 'Admiral Village, Talon, Las ' . $test . ' City', 0, 0, 'C');
// Line break
$pdf->Ln(8);
$pdf->SetFont('Arial', 'B', 10, 'C');
// dummy cell
$pdf->Cell(50);
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(103, 4, 'FOUR-YEAR CURRICULUM', 0, 0, 'C');
// Line break
$pdf->Ln(4);
$pdf->SetFont('Arial', 'B', 10, 'C');
// dummy cell
$pdf->Cell(50);
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(100, 4, 'FOR', 0, 0, 'C');
// Line break
$pdf->Ln(4);
$pdf->SetFont('Arial', 'B', 10, 'C');
// dummy cell
$pdf->Cell(50);
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(110, 4, 'BACHELOR OF SECONDARY EDUCATION', 0, 1, 'C');
$pdf->Cell(210, 4, 'Major in Social Studies', 0, 1, 'C');

// Line break

$pdf->SetFont('Arial', '', 10, 'C');
// dummy cell
$pdf->Cell(50);
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(110, 4, '(Effective Academic Year 2020-2021)', 0, 1, 'C');
// Line break
$pdf->Ln(4);

//dummy cells
$pdf->Cell(20, 5, '', 0, 1);
$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(20, 5, 'CODE', 0, 0);
$pdf->Cell(90, 5, 'Description', 0, 0, 'C');
$pdf->Cell(38, 5, 'UNITS', 0, 0, 'C');
$pdf->Cell(60, 5, 'Pre-Requisites', 0, 1);

$pdf->Ln(2);
$pdf->Cell(132, 3, '', 0, 0);
$pdf->Cell(11, 1, 'Lec', 0, 0, 'C');
$pdf->Cell(11, 1, 'Lab', 0, 0, 'C');
$pdf->Cell(11, 1, 'Total', 0, 1, 'C');

$pdf->Cell(45, 5, 'First Year, First Semester', 0, 1);
$pdf->SetFont('Arial', '', '9');
// SUBJECTS

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'CCGE', 0, 0);
$pdf->Cell(15, 4, '101', 0, 0);
$pdf->Cell(90, 4, 'Science, Technology and Society', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'CCGE', 0, 0);
$pdf->Cell(15, 4, '102', 0, 0);
$pdf->Cell(90, 4, 'Readings in Philippine History', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'CCGE', 0, 0);
$pdf->Cell(15, 4, '103', 0, 0);
$pdf->Cell(90, 4, 'Understanding the Self', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'CHCL', 0, 0);
$pdf->Cell(15, 4, '101', 0, 0);
$pdf->Cell(90, 4, 'Franciscan Orientation', 0, 0);
$pdf->Cell(10, 4, '1', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '1', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'TSED', 0, 0);
$pdf->Cell(15, 4, '101', 0, 0);
$pdf->Cell(90, 4, 'The Child and Adolescent Learners and Learning Principles', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MCSS', 0, 0);
$pdf->Cell(15, 4, '101', 0, 0);
$pdf->Cell(90, 4, 'Foundation of Social Studies', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MCSS', 0, 0);
$pdf->Cell(15, 4, '102', 0, 0);
$pdf->Cell(90, 4, 'Trends and Issues in Social Studies', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'PHED', 0, 0);
$pdf->Cell(15, 4, '101', 0, 0);
$pdf->Cell(90, 4, 'Gymnastics', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '2', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '2', 0, 1);

// LAST LINE PER SEM
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NSTP', 0, 0);
$pdf->Cell(15, 4, '1', 0, 0);
$pdf->Cell(90, 4, 'National Service Training Program 1', 0, 0);
$pdf->Cell(10, 4, '3', 'B', 0);
$pdf->Cell(9, 4, '0', 'B', 0);
$pdf->Cell(3, 4, '(3)', 'B', 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(32, 6, 'TOTAL', 0, 0);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '21', 0, 1);
$pdf->Cell(180, 1, '', 0, 1);

$pdf->Cell(200, 1, '', 'B', 0, 1);
$pdf->Ln(2);

$pdf->Cell(45, 5, 'First Year, Second Semester', 0, 1);
$pdf->SetFont('Arial', '', '9');
// SUBJECTS

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'CCGE', 0, 0);
$pdf->Cell(15, 4, '104', 0, 0);
$pdf->Cell(90, 4, 'Mathematics in the Modern World', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'CCGE', 0, 0);
$pdf->Cell(15, 4, '105', 0, 0);
$pdf->Cell(90, 4, 'The Contemporary World', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'ECGE', 0, 0);
$pdf->Cell(15, 4, '101', 0, 0);
$pdf->Cell(90, 4, 'Living in the I.T. Era', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, 'CCGE 101', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'CHCL', 0, 0);
$pdf->Cell(15, 4, '102', 0, 0);
$pdf->Cell(90, 4, 'Franciscan Core Values and Culture', 0, 0);
$pdf->Cell(10, 4, '1', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '1', 0, 0);
$pdf->Cell(10, 4, 'CHCL 101', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'TCED', 0, 0);
$pdf->Cell(15, 4, '102', 0, 0);
$pdf->Cell(90, 4, 'The Teaching Profession', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'PKED', 0, 0);
$pdf->Cell(15, 4, '105', 0, 0);
$pdf->Cell(90, 4, 'Facilitating Learner-Centered Teaching', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, 'TCED 101', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MCEL', 0, 0);
$pdf->Cell(15, 4, '102', 0, 0);
$pdf->Cell(90, 4, 'Places and Landscape in a Changing World', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'PHED', 0, 0);
$pdf->Cell(15, 4, '102', 0, 0);
$pdf->Cell(90, 4, 'Individual / Dual Sports', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '2', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '2', 0, 0);
$pdf->Cell(10, 4, 'PHED 101', 0, 1);

// LAST LINE PER SEM
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NSTP', 0, 0);
$pdf->Cell(15, 4, '2', 0, 0);
$pdf->Cell(90, 4, 'National Service and Training Program 2', 0, 0);
$pdf->Cell(10, 4, '3', 'B', 0);
$pdf->Cell(9, 4, '0', 'B', 0);
$pdf->Cell(3, 4, '(3)', 'B', 0);
$pdf->Cell(8, 4, '', 0, 0);
$pdf->Cell(10, 4, 'NSTP 1', 0, 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(32, 6, 'TOTAL', 0, 0);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '21', 0, 1);
$pdf->Cell(180, 1, '', 0, 1);

$pdf->Cell(200, 1, '', 'B', 0, 1);
$pdf->Ln(1);

$pdf->Cell(45, 5, 'Second Year, First Semester', 0, 1);
$pdf->SetFont('Arial', '', '9');
// SUBJECTS

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'CCGE', 0, 0);
$pdf->Cell(15, 4, '106', 0, 0);
$pdf->Cell(90, 4, 'Purposive Communication', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'ECGE', 0, 0);
$pdf->Cell(15, 4, '107', 0, 0);
$pdf->Cell(90, 4, 'Art Appreciation', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'ECGE', 0, 0);
$pdf->Cell(15, 4, '102', 0, 0);
$pdf->Cell(90, 4, 'The Entrepreneurial Mind', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, 'CCGE 104, CCGE 105', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'TCED', 0, 0);
$pdf->Cell(15, 4, '103', 0, 0);
$pdf->Cell(90, 4, 'The Teacher & the Community, School Cult & Org. Leadership', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'PKED', 0, 0);
$pdf->Cell(15, 4, '106', 0, 0);
$pdf->Cell(90, 4, 'Assessment in Learning 1', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MCSS', 0, 0);
$pdf->Cell(15, 4, '104', 0, 0);
$pdf->Cell(90, 4, 'Geography 1', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MCSS', 0, 0);
$pdf->Cell(15, 4, '105', 0, 0);
$pdf->Cell(90, 4, 'Geography 2', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MCSS', 0, 0);
$pdf->Cell(15, 4, '106', 0, 0);
$pdf->Cell(90, 4, 'Geography 3', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 1);

// LAST LINE PER SEM
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'PHED', 0, 0);
$pdf->Cell(15, 4, '103', 0, 0);
$pdf->Cell(90, 4, 'Team Sports', 0, 0);
$pdf->Cell(10, 4, '2', 'B', 0);
$pdf->Cell(10, 4, '0', 'B', 0);
$pdf->Cell(3, 4, '2', 'B', 0);
$pdf->Cell(7, 4, '', 0, 0);
$pdf->Cell(10, 4, 'PHED 101', 0, 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(32, 6, 'TOTAL', 0, 0);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '26', 0, 1);
$pdf->Cell(180, 1, '', 0, 1);

$pdf->Cell(200, 1, '', 'B', 0, 1);
$pdf->Ln(1);

$pdf->Cell(45, 5, 'Second Year, Second Semester', 0, 1);
$pdf->SetFont('Arial', '', '9');
// SUBJECTS

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'CCGE', 0, 0);
$pdf->Cell(15, 4, '108', 0, 0);
$pdf->Cell(90, 4, 'Ethics', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, 'CCGE 103', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'ECGE', 0, 0);
$pdf->Cell(15, 4, '103', 0, 0);
$pdf->Cell(90, 4, 'Reading Visual Art', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, 'CCGE 106, CCGE 107', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'RIZL', 0, 0);
$pdf->Cell(15, 4, '100', 0, 0);
$pdf->Cell(90, 4, 'Rizal\'s Life, Works and Writings', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, 'CCGE 102', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'TCED', 0, 0);
$pdf->Cell(15, 4, '104', 0, 0);
$pdf->Cell(90, 4, 'Foundation of Special and Inclusive Education', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'PKED', 0, 0);
$pdf->Cell(15, 4, '107', 0, 0);
$pdf->Cell(90, 4, 'Assessment in Learning 2', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, 'PKED 106', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MCSS', 0, 0);
$pdf->Cell(15, 4, '107', 0, 0);
$pdf->Cell(90, 4, 'Micro Economics', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MCSS', 0, 0);
$pdf->Cell(15, 4, '108', 0, 0);
$pdf->Cell(90, 4, 'Macro Economics', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MCSS', 0, 0);
$pdf->Cell(15, 4, '109', 0, 0);
$pdf->Cell(90, 4, 'World History 1', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'RESE', 0, 0);
$pdf->Cell(15, 4, '101', 0, 0);
$pdf->Cell(90, 4, 'Introduction to Research', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '1', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '1', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

// LAST LINE PER SEM
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'PHED', 0, 0);
$pdf->Cell(15, 4, '104', 0, 0);
$pdf->Cell(90, 4, 'Sports Management', 0, 0);
$pdf->Cell(10, 4, '2', 'B', 0);
$pdf->Cell(10, 4, '0', 'B', 0);
$pdf->Cell(3, 4, '2', 'B', 0);
$pdf->Cell(7, 4, '', 0, 0);
$pdf->Cell(10, 4, 'PHED 101', 0, 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(32, 6, 'TOTAL', 0, 0);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '27', 0, 1);
$pdf->Cell(180, 1, '', 0, 1);

$pdf->Cell(200, 1, '', 'B', 0, 1);
$pdf->Ln(1);

$pdf->Cell(45, 5, 'Third Year, First Semester', 0, 1);
$pdf->SetFont('Arial', '', '9');
// SUBJECTS

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'PKED', 0, 0);
$pdf->Cell(15, 4, '108', 0, 0);
$pdf->Cell(90, 4, 'Technology for Teaching and Learning 1', 0, 0);
$pdf->Cell(10, 4, '2', 0, 0);
$pdf->Cell(10, 4, '1', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'PKED', 0, 0);
$pdf->Cell(15, 4, '109', 0, 0);
$pdf->Cell(90, 4, 'The Teacher and the School Curriculum', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'PKED', 0, 0);
$pdf->Cell(15, 4, '110', 0, 0);
$pdf->Cell(90, 4, 'Building and Enhancing New Literacies Across the Curriculum', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'GEED', 0, 0);
$pdf->Cell(15, 4, '', 0, 0);
$pdf->Cell(90, 4, 'General Elective 1', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '3rd Year Standing', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MCSS', 0, 0);
$pdf->Cell(15, 4, '110', 0, 0);
$pdf->Cell(90, 4, 'World History 2', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, 'MCSS 109', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MCSS', 0, 0);
$pdf->Cell(15, 4, '111', 0, 0);
$pdf->Cell(90, 4, 'Asian Studies', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MCSS', 0, 0);
$pdf->Cell(15, 4, '112', 0, 0);
$pdf->Cell(90, 4, 'Socio-Cultural Anthropology', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MCSS', 0, 0);
$pdf->Cell(15, 4, '113', 0, 0);
$pdf->Cell(90, 4, 'Comparative Economic Planning', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

// LAST LINE PER SEM
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MCSS', 0, 0);
$pdf->Cell(15, 4, '114', 0, 0);
$pdf->Cell(90, 4, 'Comparative Government and Politics', 0, 0);
$pdf->Cell(10, 4, '3', 'B', 0);
$pdf->Cell(10, 4, '0', 'B', 0);
$pdf->Cell(3, 4, '3', 'B', 0);
$pdf->Cell(7, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(32, 6, 'TOTAL', 0, 0);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '27', 0, 1);
$pdf->Cell(180, 1, '', 0, 1);

$pdf->Ln(40);
$pdf->Cell(200, 1, '', 'B', 0, 1);
$pdf->Ln(2);

$pdf->Cell(45, 5, 'Third Year, Second Semester', 0, 1);
$pdf->SetFont('Arial', '', '9');
// SUBJECTS

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'LEMA', 0, 0);
$pdf->Cell(15, 4, '100', 0, 0);
$pdf->Cell(97, 4, 'Fundamentals of Leadership and Management', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'RESE', 0, 0);
$pdf->Cell(15, 4, '102', 0, 0);
$pdf->Cell(97, 4, 'Research in Social Studies', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, 'RESE 101', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'FRED', 0, 0);
$pdf->Cell(15, 4, '101', 0, 0);
$pdf->Cell(97, 4, 'The Franciscan Educator 1', 0, 0);
$pdf->Cell(10, 4, '1', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '1', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'GEED', 0, 0);
$pdf->Cell(15, 4, '', 0, 0);
$pdf->Cell(97, 4, 'General Elective 2', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '3RD YEAR STANDING', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MCSS', 0, 0);
$pdf->Cell(15, 4, '115', 0, 0);
$pdf->Cell(97, 4, 'Law-Related Studies', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MCSS', 0, 0);
$pdf->Cell(15, 4, '116', 0, 0);
$pdf->Cell(97, 4, 'Teaching Approaches in Secondary Social Studies', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MCSS', 0, 0);
$pdf->Cell(15, 4, '117', 0, 0);
$pdf->Cell(97, 4, 'Integrative Methods Teaching Social Science Discipline Basic Educ.', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MCSS', 0, 0);
$pdf->Cell(15, 4, '118', 0, 0);
$pdf->Cell(97, 4, 'Production of Social Studies Instructional Materials', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MCSS', 0, 0);
$pdf->Cell(15, 4, '119', 0, 0);
$pdf->Cell(97, 4, 'Assessment and Evaluation in the Social Sciences', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

// LAST LINE PER SEM
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MCSS', 0, 0);
$pdf->Cell(15, 4, '120', 0, 0);
$pdf->Cell(97, 4, 'Technology for Teaching and Learning 2', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, 'PKED 108, 105, 107', 0, 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(32, 6, 'TOTAL', 0, 0);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(20, 6, '28', 0, 1);
$pdf->Cell(180, 1, '', 0, 1);

$pdf->Cell(200, 1, '', 'B', 0, 1);
$pdf->Ln(1);

$pdf->Cell(45, 5, 'Fourth Year, First Semester', 0, 1);
$pdf->SetFont('Arial', '', '9');
// SUBJECTS

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'FRED', 0, 0);
$pdf->Cell(15, 4, '102', 0, 0);
$pdf->Cell(90, 4, 'The Franciscan Educator 2', 0, 0);
$pdf->Cell(10, 4, '1', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '1', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'ELED', 0, 0);
$pdf->Cell(15, 4, '111', 0, 0);
$pdf->SetFont('Arial', '', '6.5');
$pdf->Cell(90, 4, 'Field Study 1 (Observations of Teaching-Learning in Actual School Environment)', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'ELED', 0, 0);
$pdf->Cell(15, 4, '112', 0, 0);
$pdf->Cell(90, 4, 'Field Study 2 (Participation and Teaching Assistantship)', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(32, 6, 'TOTAL', 0, 0);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '7', 0, 1);
$pdf->Cell(180, 1, '', 0, 1);

$pdf->Cell(200, 1, '', 'B', 0, 1);
$pdf->Ln(1);

$pdf->Cell(45, 5, 'Fourth Year, Second Semester', 0, 1);
$pdf->SetFont('Arial', '', '9');
// SUBJECTS
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'TIED', 0, 0);
$pdf->Cell(15, 4, '113', 0, 0);
$pdf->Cell(90, 4, 'Teaching Internship', 0, 0);
$pdf->Cell(10, 4, '0', 'B', 0);
$pdf->Cell(10, 4, '6', 'B', 0);
$pdf->Cell(3, 4, '6', 'B', 0);
$pdf->Cell(7, 4, '', 0, 0);
$pdf->Cell(10, 4, 'ELED 111 & 112', 0, 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(32, 6, 'TOTAL', 0, 0);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '6', 0, 1);
$pdf->Cell(180, 1, '', 0, 1);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(200, 1, '', 'B', 0, 1);

$pdf->Ln(3);
$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(70, 5, '', 0, 0);
$pdf->Cell(84, 6, 'TOTAL NUMBER OF UNITS', 0, 0);
$pdf->Cell(32, 6, '169', 0, 1);

$pdf->SetFont('Arial', 'I', '10');
$pdf->Cell(73, 5, '', 0, 0);
$pdf->Cell(84, 6, '(Including 6 units NSTP)', 0, 0);

$pdf->Output();