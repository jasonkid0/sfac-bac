<?php
require '../fpdf/fpdf.php';

class PDF extends FPDF
{

// Page header

}

$pdf = new PDF('P', 'mm', 'Legal');
//left top right
$pdf->SetRightMargin(10);
$pdf->SetAutoPageBreak(true, 8);
$pdf->AddPage();

// Logo(x axis, y axis, height, width)
$pdf->Image('../../assets/img/logos/logo.png', 50, 5, 15, 15);
// text color
$pdf->SetTextColor(255, 0, 0);
// font(font type,style,font size)
$pdf->SetFont('Arial', 'B', 12);
// Dummy cell
$pdf->Cell(50);
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(90, 5, 'Saint Francis of Assisi College', 0, 0, 'C');
// Line break
$pdf->Ln(4);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial', '', 8, 'C');
// dummy cell
$pdf->Cell(50);
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(90, 3, '96, Bayanan, City of Bacoor, Cavite', 0, 0, 'C');
// Line break
$pdf->Ln(6);
$pdf->SetFont('Arial', 'B', 8, 'C');
// dummy cell
$pdf->Cell(50);
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(90, 3, 'FOUR-YEAR CURRICULUM', 0, 1, 'C');
// Line break

$pdf->SetFont('Arial', 'B', 8, 'C');
// dummy cell
$pdf->Cell(50);
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(90, 3, 'FOR', 0, 1, 'C');
// Line break

$pdf->SetFont('Arial', 'B', 8, 'C');
// dummy cell
$pdf->Cell(50);
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(90, 3, 'BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION', 0, 1, 'C');
$pdf->Cell(50);
$pdf->Cell(90, 3, 'major in MARKETING MANAGEMENT (BSBA-MM)', 0, 1, 'C');
// Line break

// Line break

$pdf->SetFont('Arial', '', 8, 'C');
// dummy cell
$pdf->Cell(50);
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(90, 3, '(Effective Academic Year 2020-2021)', 0, 1, 'C');
// Line break
$pdf->Ln(1);

//cell(width,height,text,border,end line,[align])
//student name
$pdf->Cell(15, 4, 'Name:', 0, 0);
$pdf->SetFont('Arial', 'B', '8');
$pdf->Cell(115, 4, '', 'B', 0); //end of line

//student no
$pdf->SetFont('Arial', '', '8');
$pdf->Cell(25, 4, 'Student No:', 0, 0);
$pdf->SetFont('Arial', 'B', '8');
$pdf->Cell(30, 4, '', 'B', 0); //end of line

//dummy cells
$pdf->Cell(20, 4, '', 0, 1);
$pdf->Cell(20, 4, '', 0, 0);

$pdf->SetFont('Arial', 'B', '8');
$pdf->Cell(20, 6, 'CODE', 0, 0);
$pdf->Cell(90, 6, 'Description', 0, 0, 'C');
$pdf->Cell(34, 6, 'UNITS', 0, 0, 'C');
$pdf->Cell(60, 6, 'Pre-Requisites', 0, 1);

$pdf->SetFont('Arial', 'BI', '9');
//YEAR , SEMESTER
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(45, 4, 'First Year, First Semester', 0, 0);

$pdf->SetFont('Arial', '', '8');
// UNITS
$pdf->Cell(78, 4, '', 0, 0);
$pdf->Cell(10, 4, 'LEC', 0, 0);
$pdf->Cell(10, 4, 'LAB', 0, 0);
$pdf->Cell(10, 4, 'TOTAL', 0, 1);
$pdf->SetFont('Arial', '', '8.5');
// SUBJECTS

$pdf->Cell(5, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '', 'B', 0);
$pdf->Cell(15, 3.7, 'CCGE', 0, 0);
$pdf->Cell(15, 3.7, '101', 0, 0);
$pdf->Cell(90, 3.7, 'Science, Technology and Society', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(10, 3.7, '0', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 1);

$pdf->Cell(5, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '', 'B', 0);
$pdf->Cell(15, 3.7, 'CCGE', 0, 0);
$pdf->Cell(15, 3.7, '102', 0, 0);
$pdf->Cell(90, 3.7, 'Reading in Philippine History', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(10, 3.7, '0', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 1);

$pdf->Cell(5, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '', 'B', 0);
$pdf->Cell(15, 3.7, 'CCGE', 0, 0);
$pdf->Cell(15, 3.7, '103', 0, 0);
$pdf->Cell(90, 3.7, 'Understanding the Self', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(10, 3.7, '0', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 1);

$pdf->Cell(5, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '', 'B', 0);
$pdf->Cell(15, 3.7, 'CHCL', 0, 0);
$pdf->Cell(15, 3.7, '101', 0, 0);
$pdf->Cell(90, 3.7, 'Franciscan Orientation', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(10, 3.7, '0', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 1);

$pdf->Cell(5, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '', 'B', 0);
$pdf->Cell(15, 3.7, 'BUSC', 0, 0);
$pdf->Cell(15, 3.7, '101', 0, 0);
$pdf->Cell(90, 3.7, 'Operation Management (TQM)', 0, 0);
$pdf->Cell(10, 3.7, '1', 0, 0);
$pdf->Cell(10, 3.7, '0', 0, 0);
$pdf->Cell(10, 3.7, '1', 0, 1);

$pdf->Cell(5, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '', 'B', 0);
$pdf->Cell(15, 3.7, 'BMGT', 0, 0);
$pdf->Cell(15, 3.7, '101', 0, 0);
$pdf->Cell(90, 3.7, 'Basic Microeconomics', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(10, 3.7, '0', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 1);

$pdf->Cell(5, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '', 'B', 0);
$pdf->Cell(15, 3.7, 'PHED', 0, 0);
$pdf->Cell(15, 3.7, '101', 0, 0);
$pdf->Cell(90, 3.7, 'Gymnastics', 0, 0);
$pdf->Cell(10, 3.7, '2', 0, 0);
$pdf->Cell(10, 3.7, '0', 0, 0);
$pdf->Cell(10, 3.7, '2', 0, 1);

// LAST LINE PER SEM
$pdf->Cell(5, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '', 'B', 0);
$pdf->Cell(15, 3.7, 'NSTP', 0, 0);
$pdf->Cell(15, 3.7, '1', 0, 0);
$pdf->Cell(90, 3.7, 'National Service Training Program 1', 0, 0);
$pdf->Cell(10, 3.7, '3', 'B', 0);
$pdf->Cell(9, 3.7, '0', 'B', 0);
$pdf->Cell(7, 3.7, '(3)', 'B', 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '9');
$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(32, 6, 'TOTAL', 0, 0);
$pdf->SetFont('Arial', 'B', '9');
$pdf->Cell(10, 6, '18', 0, 0);
$pdf->Cell(180, 6, '', 0, 1);

$pdf->SetFont('Arial', 'BI', '9');
//YEAR , SEMESTER
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(45, 5, 'First Year, Second Semester', 0, 1);

$pdf->SetFont('Arial', '', '8.5');

// SUBJECTS

$pdf->Cell(5, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '', 'B', 0);
$pdf->Cell(15, 3.7, 'CCGE', 0, 0);
$pdf->Cell(15, 3.7, '104', 0, 0);
$pdf->Cell(90, 3.7, 'Mathematics in Modern World', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(10, 3.7, '0', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(20, 3.7, 'CCGE 101', 0, 1);

$pdf->Cell(5, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '', 'B', 0);
$pdf->Cell(15, 3.7, 'CCGE', 0, 0);
$pdf->Cell(15, 3.7, '105', 0, 0);
$pdf->Cell(90, 3.7, 'The Contemporary World', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(10, 3.7, '0', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(20, 3.7, '', 0, 1);

$pdf->Cell(5, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '', 'B', 0);
$pdf->Cell(15, 3.7, 'ECGE', 0, 0);
$pdf->Cell(15, 3.7, '101', 0, 0);
$pdf->Cell(90, 3.7, 'Living in the I.T Era', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(10, 3.7, '0', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 1);

$pdf->Cell(5, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '', 'B', 0);
$pdf->Cell(15, 3.7, 'CHCL', 0, 0);
$pdf->Cell(15, 3.7, '102', 0, 0);
$pdf->Cell(90, 3.7, 'Franciscan Core Values and Culture', 0, 0);
$pdf->Cell(10, 3.7, '1', 0, 0);
$pdf->Cell(10, 3.7, '0', 0, 0);
$pdf->Cell(10, 3.7, '1', 0, 0);
$pdf->Cell(20, 3.7, 'CHCL 101', 0, 1);

$pdf->Cell(5, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '', 'B', 0);
$pdf->Cell(15, 3.7, 'BUSC', 0, 0);
$pdf->Cell(15, 3.7, '102', 0, 0);
$pdf->Cell(90, 3.7, 'Strategic Management', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(10, 3.7, '0', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(20, 3.7, 'BUSC 101', 0, 1);

$pdf->Cell(5, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '', 'B', 0);
$pdf->Cell(15, 3.7, 'BMGT', 0, 0);
$pdf->Cell(15, 3.7, '102', 0, 0);
$pdf->Cell(90, 3.7, 'Business Law (Obligation and Contracts)', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(10, 3.7, '0', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(20, 3.7, '', 0, 1);

$pdf->Cell(5, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '', 'B', 0);
$pdf->Cell(15, 3.7, 'PHED', 0, 0);
$pdf->Cell(15, 3.7, '102', 0, 0);
$pdf->Cell(90, 3.7, 'Individual/ Dual Sports', 0, 0);
$pdf->Cell(10, 3.7, '2', 0, 0);
$pdf->Cell(10, 3.7, '0', 0, 0);
$pdf->Cell(10, 3.7, '2', 0, 0);
$pdf->Cell(20, 3.7, 'PHED 101', 0, 1);

// LAST LINE PER SEM
$pdf->Cell(5, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '', 'B', 0);
$pdf->Cell(15, 3.7, 'NSTP', 0, 0);
$pdf->Cell(15, 3.7, '2', 0, 0);
$pdf->Cell(90, 3.7, 'National Service Training Program 2', 0, 0);
$pdf->Cell(10, 3.7, '3', 'B', 0);
$pdf->Cell(9, 3.7, '0', 'B', 0);
$pdf->Cell(11, 3.7, '(3)', 'B', 0);
$pdf->Cell(20, 3.7, 'NSTP 1', 0, 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '9');
$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(32, 6, 'TOTAL', 0, 0);
$pdf->SetFont('Arial', 'B', '9');
$pdf->Cell(10, 6, '18', 0, 0);
$pdf->Cell(180, 6, '', 0, 1);

$pdf->SetFont('Arial', 'BI', '9');
//YEAR , SEMESTER
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(45, 5, 'Second Year, First Semester', 0, 1);

// SUBJECTS
$pdf->SetFont('Arial', '', '8.5');

$pdf->Cell(5, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '', 'B', 0);
$pdf->Cell(15, 3.7, 'CCGE', 0, 0);
$pdf->Cell(15, 3.7, '106', 0, 0);
$pdf->Cell(90, 3.7, 'Purposive Communication', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(10, 3.7, '0', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(20, 3.7, '', 0, 1);

$pdf->Cell(5, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '', 'B', 0);
$pdf->Cell(15, 3.7, 'CCGE', 0, 0);
$pdf->Cell(15, 3.7, '107', 0, 0);
$pdf->Cell(90, 3.7, 'Art Appreciation', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(10, 3.7, '0', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(20, 3.7, 'CCGE 104, CCGE 105', 0, 1);

$pdf->Cell(5, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '', 'B', 0);
$pdf->Cell(15, 3.7, 'ECGE', 0, 0);
$pdf->Cell(15, 3.7, '102', 0, 0);
$pdf->Cell(90, 3.7, 'The Entrepreneurial Mind', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(10, 3.7, '0', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 1);

$pdf->Cell(5, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '', 'B', 0);
$pdf->Cell(15, 3.7, 'BMGT', 0, 0);
$pdf->Cell(15, 3.7, '103', 0, 0);
$pdf->Cell(90, 3.7, 'Income Taxation', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(10, 3.7, '0', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(20, 3.7, 'BMGT 102', 0, 1);

$pdf->SetFont('Arial', '', '8.5');
$pdf->Cell(5, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '', 'B', 0);
$pdf->Cell(15, 3.7, 'BMGT', 0, 0);
$pdf->Cell(15, 3.7, '104', 0, 0);
$pdf->Cell(90, 3.7, 'Social Responsibility and Good Governnace', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(10, 3.7, '0', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 1);

$pdf->Cell(5, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '', 'B', 0);
$pdf->Cell(15, 3.7, 'MMGT', 0, 0);
$pdf->Cell(15, 3.7, '101', 0, 0);
$pdf->Cell(90, 3.7, 'Professional Salesmanship', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(10, 3.7, '0', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 1);

$pdf->Cell(5, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '', 'B', 0);
$pdf->Cell(15, 3.7, 'PHED', 0, 0);
$pdf->Cell(15, 3.7, '103', 0, 0);
$pdf->Cell(90, 3.7, 'Team Sports', 0, 0);
$pdf->Cell(10, 3.7, '2', 'B', 0);
$pdf->Cell(10, 3.7, '0', 'B', 0);
$pdf->Cell(10, 3.7, '2', 'B', 0);
$pdf->Cell(20, 3.7, 'PHED 101', 0, 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '9');
$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(32, 6, 'TOTAL', 0, 0);
$pdf->SetFont('Arial', 'B', '9');
$pdf->Cell(10, 6, '20', 0, 0);
$pdf->Cell(180, 6, '', 0, 1);

$pdf->SetFont('Arial', 'BI', '9');
//YEAR , SEMESTER
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(45, 5, 'Second Year, Second Semester', 0, 1);
$pdf->SetFont('Arial', '', '8.5');

// SUBJECTS

$pdf->Cell(5, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '', 'B', 0);
$pdf->Cell(15, 3.7, 'CCGE', 0, 0);
$pdf->Cell(15, 3.7, '108', 0, 0);
$pdf->Cell(90, 3.7, 'Ethics', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(10, 3.7, '0', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(20, 3.7, 'CCGE 103', 0, 1);

$pdf->Cell(5, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '', 'B', 0);
$pdf->Cell(15, 3.7, 'ECGE', 0, 0);
$pdf->Cell(15, 3.7, '103', 0, 0);
$pdf->Cell(90, 3.7, 'Reading Visual Art', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(10, 3.7, '0', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->SetFont('Arial', '', '8');
$pdf->Cell(20, 3.7, 'CCGE 106, CCGE 107', 0, 1);

$pdf->SetFont('Arial', '', '8.5');
$pdf->Cell(5, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '', 'B', 0);
$pdf->Cell(15, 3.7, 'RIZL', 0, 0);
$pdf->Cell(15, 3.7, '100', 0, 0);
$pdf->Cell(90, 3.7, 'Rizal\'s Life, Works & Writings', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(10, 3.7, '0', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(20, 3.7, 'CCGE 102', 0, 1);

$pdf->Cell(5, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '', 'B', 0);
$pdf->Cell(15, 3.7, 'BMGT', 0, 0);
$pdf->Cell(15, 3.7, '105', 0, 0);
$pdf->Cell(90, 3.7, 'Human Resource Management', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(10, 3.7, '0', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(20, 3.7, 'BUSC 101', 0, 1);

$pdf->Cell(5, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '', 'B', 0);
$pdf->Cell(15, 3.7, 'MMGT', 0, 0);
$pdf->Cell(15, 3.7, '102', 0, 0);
$pdf->Cell(90, 3.7, 'Marketing Management', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(10, 3.7, '0', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(20, 3.7, 'MMGT 101', 0, 1);

$pdf->Cell(5, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '', 'B', 0);
$pdf->Cell(15, 3.7, 'MMGT', 0, 0);
$pdf->Cell(15, 3.7, '103', 0, 0);
$pdf->Cell(90, 3.7, 'Distribution Management', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(10, 3.7, '0', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(20, 3.7, 'MMGT 101', 0, 1);

$pdf->Cell(5, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '', 'B', 0);
$pdf->Cell(15, 3.7, 'PHED', 0, 0);
$pdf->Cell(15, 3.7, '104', 0, 0);
$pdf->Cell(90, 5, 'Sports Management', 0, 0);
$pdf->Cell(10, 3.7, '2', 'B', 0);
$pdf->Cell(10, 3.7, '0', 'B', 0);
$pdf->Cell(10, 3.7, '2', 'B', 0);
$pdf->Cell(20, 3.7, 'PHED 101', 0, 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '9');
$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(32, 6, 'TOTAL', 0, 0);
$pdf->SetFont('Arial', 'B', '9');
$pdf->Cell(10, 6, '20', 0, 0);
$pdf->Cell(180, 6, '', 0, 1);

$pdf->SetFont('Arial', 'BI', '9');
//YEAR, SEMESTER
$pdf->Cell(20, 5, '', 0, 0);
$pdf->Cell(10, 5, 'Third Year, First Semester', 0, 1);

// SUBJECTS
$pdf->SetFont('Arial', '', '8.5');

$pdf->Cell(5, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '', 'B', 0);
$pdf->Cell(15, 3.7, 'BMGT', 0, 0);
$pdf->Cell(15, 3.7, '106', 0, 0);
$pdf->Cell(90, 3.7, 'International Business Agreements', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(10, 3.7, '0', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(20, 3.7, '3rd Year Standing', 0, 1);

$pdf->Cell(5, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '', 'B', 0);
$pdf->Cell(15, 3.7, 'MMGT', 0, 0);
$pdf->Cell(15, 3.7, '104', 0, 0);
$pdf->Cell(90, 3.7, 'Advertising', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(10, 3.7, '0', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(20, 3.7, 'MMGT 102', 0, 1);

$pdf->Cell(5, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '', 'B', 0);
$pdf->Cell(15, 3.7, 'MMGT', 0, 0);
$pdf->Cell(15, 3.7, '105', 0, 0);
$pdf->Cell(90, 3.7, 'Marketing Research', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(10, 3.7, '0', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(20, 3.7, 'MMGT 102', 0, 1);

$pdf->Cell(5, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '', 'B', 0);
$pdf->Cell(15, 3.7, 'MELE', 0, 0);
$pdf->Cell(15, 3.7, '101', 0, 0);
$pdf->Cell(90, 3.7, 'Consumer Behavior', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(10, 3.7, '0', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(20, 3.7, '3rd Year Standing', 0, 1);

$pdf->Cell(5, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '', 'B', 0);
$pdf->Cell(15, 3.7, 'MELE', 0, 0);
$pdf->Cell(15, 3.7, '102', 0, 0);
$pdf->Cell(90, 3.7, 'Services Marketing', 0, 0);
$pdf->Cell(10, 3.7, '3', 'B', 0);
$pdf->Cell(10, 3.7, '0', 'B', 0);
$pdf->Cell(10, 3.7, '3', 'B', 0);
$pdf->Cell(20, 3.7, '3rd Year Standing', 0, 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '9');
$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(32, 6, 'TOTAL', 0, 0);
$pdf->SetFont('Arial', 'B', '9');
$pdf->Cell(10, 6, '15', 0, 0);
$pdf->Cell(180, 6, '', 0, 1);

$pdf->SetFont('Arial', 'BI', '9');
//YEAR, SEMESTER
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(45, 5, 'Third Year, Second Semester', 0, 1);

// SUBJECTS

$pdf->SetFont('Arial', '', '8.5');
$pdf->Cell(5, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '', 'B', 0);
$pdf->Cell(15, 3.7, 'LEMA', 0, 0);
$pdf->Cell(15, 3.7, '100', 0, 0);
$pdf->Cell(90, 3.7, 'Fundamentals of Leadership and Management', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(10, 3.7, '0', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(20, 3.7, '3rd Year Standing', 0, 1);

$pdf->Cell(5, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '', 'B', 0);
$pdf->Cell(15, 3.7, 'MMGT', 0, 0);
$pdf->Cell(15, 3.7, '106', 0, 0);
$pdf->Cell(90, 3.7, 'Product Mangement', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(10, 3.7, '0', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(20, 3.7, 'MMGT 102', 0, 1);

$pdf->Cell(5, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '', 'B', 0);
$pdf->Cell(15, 3.7, 'FMGT', 0, 0);
$pdf->Cell(15, 3.7, '107', 0, 0);
$pdf->Cell(90, 3.7, 'Retail Management', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(10, 3.7, '0', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(20, 3.7, 'MMGT 105', 0, 1);

$pdf->Cell(5, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '', 'B', 0);
$pdf->Cell(15, 3.7, 'BMGT', 0, 0);
$pdf->Cell(15, 3.7, '107', 0, 0);
$pdf->Cell(90, 3.7, 'Business Research 1', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(10, 3.7, '0', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(20, 3.7, 'MMGT 105', 0, 1);

$pdf->Cell(5, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '', 'B', 0);
$pdf->Cell(15, 3.7, 'MELE', 0, 0);
$pdf->Cell(15, 3.7, '103', 0, 0);
$pdf->Cell(90, 3.7, 'Franchising', 0, 0);
$pdf->Cell(10, 3.7, '3', 'B', 0);
$pdf->Cell(10, 3.7, '0', 'B', 0);
$pdf->Cell(10, 3.7, '3', 'B', 0);
$pdf->Cell(20, 3.7, '', 0, 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '9');
$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(32, 6, 'TOTAL', 0, 0);
$pdf->SetFont('Arial', 'B', '9');
$pdf->Cell(10, 6, '15', 0, 0);
$pdf->Cell(180, 6, '', 0, 1);

$pdf->SetFont('Arial', 'BI', '9');
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(45, 5, 'Fourth Year, First Semester', 0, 1);

// SUBJECTS

$pdf->SetFont('Arial', '', '8.5');
$pdf->Cell(5, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '', 'B', 0);
$pdf->Cell(15, 3.7, 'NTRN', 0, 0);
$pdf->Cell(15, 3.7, '101', 0, 0);
$pdf->Cell(90, 3.7, 'Pre-Internship', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(10, 3.7, '0', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(20, 3.7, '4th Year Standing', 0, 1);

$pdf->Cell(5, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '', 'B', 0);
$pdf->Cell(15, 3.7, 'BMGT', 0, 0);
$pdf->Cell(15, 3.7, '108', 0, 0);
$pdf->Cell(90, 3.7, 'Business Research 2 (Thesis Writing)', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(10, 3.7, '0', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(20, 3.7, 'BMGT 107', 0, 1);

$pdf->Cell(5, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '', 'B', 0);
$pdf->Cell(15, 3.7, 'MMGT', 0, 0);
$pdf->Cell(15, 3.7, '110', 0, 0);
$pdf->Cell(90, 3.7, 'Pricing Strategy', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(10, 3.7, '0', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(20, 3.7, 'MMGT 107', 0, 1);

$pdf->Cell(5, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '', 'B', 0);
$pdf->Cell(15, 3.7, 'MELE', 0, 0);
$pdf->Cell(15, 3.7, '104', 0, 0);
$pdf->Cell(90, 3.7, 'Special Topics in Marketing Management', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(10, 3.7, '0', 0, 0);
$pdf->Cell(10, 3.7, '3', 0, 0);
$pdf->Cell(20, 3.7, '4th Year Standing', 0, 1);

$pdf->Cell(5, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '', 'B', 0);
$pdf->Cell(15, 3.7, 'MELE', 0, 0);
$pdf->Cell(15, 3.7, '105', 0, 0);
$pdf->Cell(90, 3.7, 'Sales Management', 0, 0);
$pdf->Cell(10, 3.7, '3', 'B', 0);
$pdf->Cell(10, 3.7, '0', 'B', 0);
$pdf->Cell(10, 3.7, '3', 'B', 0);
$pdf->Cell(20, 3.7, '4th Year Standing', 0, 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '9');
$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(32, 6, 'TOTAL', 0, 0);
$pdf->SetFont('Arial', 'B', '9');
$pdf->Cell(10, 6, '15', 0, 0);
$pdf->Cell(180, 6, '', 0, 1);

//YEAR, SEMESTER
$pdf->SetFont('Arial', 'BI', '9');
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(45, 5, 'Fourth Year, Second Semester', 0, 1);

// SUBJECTS

$pdf->SetFont('Arial', '', '8.5');
$pdf->Cell(5, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '', 'B', 0);
$pdf->Cell(15, 3.7, 'NTRN', 0, 0);
$pdf->Cell(15, 3.7, '102', 0, 0);
$pdf->Cell(90, 3.7, 'Internship (600 hours)', 0, 0);
$pdf->Cell(10, 3.7, '0', 'B', 0);
$pdf->Cell(10, 3.7, '12', 'B', 0);
$pdf->Cell(10, 3.7, '12', 'B', 0);
$pdf->Cell(20, 3.7, 'NTRN 101', 0, 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '9');
$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(33, 6, 'TOTAL', 0, 0);
$pdf->SetFont('Arial', 'B', '9');
$pdf->Cell(10, 6, '12', 0, 0);
$pdf->Cell(180, 6, '', 0, 1);

$pdf->Cell(20, 5, '', 0, 1);

$pdf->SetFont('Arial', 'B', '9');
$pdf->Cell(95, 3.7, '', 0, 0);
$pdf->Cell(34, 3.7, 'TOTAL NUMBER OF UNITS', 0, 0, 'C');
$pdf->Cell(16, 3.7, '', 0, 0);
$pdf->Cell(9, 3.7, '', 0, 0);
$pdf->Cell(10, 3.7, '154', '', 1, 0);

$pdf->SetFont('Arial', 'I', '9');
$pdf->Cell(95, 3.5, '', 0, 0);
$pdf->Cell(34, 3.5, '(Including 6 units NSTP)', 0, 0, 'C');

$pdf->Output();