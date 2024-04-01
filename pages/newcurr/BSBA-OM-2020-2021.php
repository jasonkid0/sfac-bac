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
$pdf->Cell(90, 3, '96, Bayanan, City of Bacoor, Cavite', 0, 0, 'C');
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
$pdf->Cell(110, 4, 'BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION', 0, 1, 'C');
$pdf->Cell(210, 4, 'major in MARKETING OPERATIONS MANAGEMENT (BSBA-OM)', 0, 1, 'C');

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
$pdf->Cell(15, 4, 'BUSC', 0, 0);
$pdf->Cell(15, 4, '101', 0, 0);
$pdf->Cell(90, 4, 'Operations Management (TQM)', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'BMGT', 0, 0);
$pdf->Cell(15, 4, '101', 0, 0);
$pdf->Cell(90, 4, 'Basic Microeconomics', 0, 0);
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
$pdf->Cell(90, 4, 'National Service and Training Program 1', 0, 0);
$pdf->Cell(10, 4, '3', 'B', 0);
$pdf->Cell(9, 4, '0', 'B', 0);
$pdf->Cell(3, 4, '(3)', 'B', 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(32, 6, 'TOTAL', 0, 0);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '18', 0, 1);
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
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, 'CCGE 101', 0, 1);

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
$pdf->Cell(10, 4, '3', 0, 1);

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
$pdf->Cell(15, 4, 'BUSC', 0, 0);
$pdf->Cell(15, 4, '102', 0, 0);
$pdf->Cell(90, 4, 'Strategic Management', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, 'BUSC 101', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'BMGT', 0, 0);
$pdf->Cell(15, 4, '102', 0, 0);
$pdf->Cell(90, 4, 'Business Law (Obligation and Contracts)', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 1);

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
$pdf->Cell(10, 4, 'NSTP1', 0, 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(32, 6, 'TOTAL', 0, 0);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '18', 0, 1);
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
$pdf->Cell(15, 4, 'CCGE', 0, 0);
$pdf->Cell(15, 4, '107', 0, 0);
$pdf->Cell(90, 4, 'Art Appreciation', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, 'CCGE 104, CCGE 105', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'ECGE', 0, 0);
$pdf->Cell(15, 4, '102', 0, 0);
$pdf->Cell(90, 4, 'The Entrepreneurial Mind', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'BMGT', 0, 0);
$pdf->Cell(15, 4, '103', 0, 0);
$pdf->Cell(90, 4, 'Income Taxation', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, 'BMGT 102', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'BMGT', 0, 0);
$pdf->Cell(15, 4, '104', 0, 0);
$pdf->Cell(90, 4, 'Social Responsibility and Good Governance', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MMGT', 0, 0);
$pdf->Cell(15, 4, '101', 0, 0);
$pdf->Cell(90, 4, 'Professional Salesmanship', 0, 0);
$pdf->SetFont('Arial', '', '9');
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
$pdf->Cell(10, 6, '20', 0, 1);
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
$pdf->Cell(15, 4, 'BMGT', 0, 0);
$pdf->Cell(15, 4, '105', 0, 0);
$pdf->Cell(90, 4, 'Human Resource Management', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, 'BUSC 101', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MMGT', 0, 0);
$pdf->Cell(15, 4, '102', 0, 0);
$pdf->Cell(90, 4, 'Marketing Management', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, 'MMGT 101', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MMGT', 0, 0);
$pdf->Cell(15, 4, '103', 0, 0);
$pdf->Cell(90, 4, 'Distribution Management', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, 'MMGT 101', 0, 1);

// LAST LINE PER SEM
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'PHED', 0, 0);
$pdf->Cell(15, 4, '104', 0, 0);
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
$pdf->Cell(10, 6, '20', 0, 1);
$pdf->Cell(180, 1, '', 0, 1);

$pdf->Cell(200, 1, '', 'B', 0, 1);
$pdf->Ln(1);

$pdf->Cell(45, 5, 'Third Year, First Semester', 0, 1);
$pdf->SetFont('Arial', '', '9');
// SUBJECTS

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'BMGT', 0, 0);
$pdf->Cell(15, 4, '106', 0, 0);
$pdf->Cell(90, 4, 'International Business Agreements', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '3rd Year Standing', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MMGT', 0, 0);
$pdf->Cell(15, 4, '104', 0, 0);
$pdf->Cell(90, 4, 'Advertising', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, 'MMGT 102', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MMGT', 0, 0);
$pdf->Cell(15, 4, '105', 0, 0);
$pdf->Cell(90, 4, 'Marketing Research*', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, 'MMGT 102', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MELE', 0, 0);
$pdf->Cell(15, 4, '101', 0, 0);
$pdf->Cell(90, 4, 'Consumer Behavior', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '3rd Year Standing', 0, 1);

// LAST LINE PER SEM
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MELE', 0, 0);
$pdf->Cell(15, 4, '102', 0, 0);
$pdf->Cell(90, 4, 'Services Marketing', 0, 0);
$pdf->Cell(10, 4, '3', 'B', 0);
$pdf->Cell(10, 4, '0', 'B', 0);
$pdf->Cell(3, 4, '3', 'B', 0);
$pdf->Cell(7, 4, '', 0, 0);
$pdf->Cell(10, 4, '3rd Year Standing', 0, 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(32, 6, 'TOTAL', 0, 0);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '15', 0, 1);
$pdf->Cell(180, 1, '', 0, 1);

$pdf->Cell(200, 1, '', 'B', 0, 1);
$pdf->Ln(2);

$pdf->Cell(45, 5, 'Third Year, Second Semester', 0, 1);
$pdf->SetFont('Arial', '', '9');
// SUBJECTS

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'LEMA', 0, 0);
$pdf->Cell(15, 4, '100', 0, 0);
$pdf->Cell(90, 4, 'Fundamentals of Leadership and Management', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '3rd Year Standing', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MMGT', 0, 0);
$pdf->Cell(15, 4, '106', 0, 0);
$pdf->Cell(90, 4, 'Product Management', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, 'MMGT 104', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MMGT', 0, 0);
$pdf->Cell(15, 4, '107', 0, 0);
$pdf->Cell(90, 4, 'Retail Management', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, 'MMGT 105', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'BMGT', 0, 0);
$pdf->Cell(15, 4, '107', 0, 0);
$pdf->Cell(90, 4, 'Business Research 1', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, 'MMGT105', 0, 1);

// LAST LINE PER SEM
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MELE', 0, 0);
$pdf->Cell(15, 4, '103', 0, 0);
$pdf->Cell(90, 4, 'Franchising', 0, 0);
$pdf->Cell(10, 4, '3', 'B', 0);
$pdf->Cell(10, 4, '0', 'B', 0);
$pdf->Cell(3, 4, '3', 'B', 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(32, 6, 'TOTAL', 0, 0);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '15', 0, 1);
$pdf->Cell(180, 1, '', 0, 1);

$pdf->Cell(200, 1, '', 'B', 0, 1);
$pdf->Ln(50);
$pdf->Cell(200, 1, '', 'B', 0, 1);
$pdf->Ln(2);

$pdf->Cell(45, 8, 'Fourth Year, First Semester', 0, 1);
$pdf->SetFont('Arial', '', '9');
// SUBJECTS

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NTRN', 0, 0);
$pdf->Cell(15, 4, '101', 0, 0);
$pdf->Cell(90, 4, 'Pre-Internship', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '4th Yr. Standing', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'BMGT', 0, 0);
$pdf->Cell(15, 4, '108', 0, 0);
$pdf->Cell(90, 4, 'Business Research 2 (Thesis Writing)', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, 'BMGT 107', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MMGT', 0, 0);
$pdf->Cell(15, 4, '110', 0, 0);
$pdf->Cell(90, 4, 'Pricing Strategy', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, 'MMGT 107', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MELE', 0, 0);
$pdf->Cell(15, 4, '104', 0, 0);
$pdf->Cell(90, 4, 'Special Topics in Marketing Management', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '4th Yr. Standing', 0, 1);

// LAST LINE PER SEM
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MELE', 0, 0);
$pdf->Cell(15, 4, '105', 0, 0);
$pdf->Cell(90, 4, 'Sales Management', 0, 0);
$pdf->Cell(10, 4, '3', 'B', 0);
$pdf->Cell(10, 4, '0', 'B', 0);
$pdf->Cell(3, 4, '3', 'B', 0);
$pdf->Cell(7, 4, '', 0, 0);
$pdf->Cell(10, 4, '4th Yr. Standing', 0, 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(32, 6, 'TOTAL', 0, 0);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '15', 0, 1);
$pdf->Cell(180, 1, '', 0, 1);

$pdf->Cell(200, 1, '', 'B', 0, 1);
$pdf->Ln(1);

$pdf->Cell(45, 5, 'Fourth Year, First Semester', 0, 1);
$pdf->SetFont('Arial', '', '9');
// SUBJECTS
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NTRN', 0, 0);
$pdf->Cell(15, 4, '102', 0, 0);
$pdf->Cell(90, 4, 'Internship (600 hours)', 0, 0);
$pdf->Cell(10, 4, '0', 'B', 0);
$pdf->Cell(10, 4, '12', 'B', 0);
$pdf->Cell(3, 4, '12', 'B', 0);
$pdf->Cell(7, 4, '', 0, 0);
$pdf->Cell(10, 4, 'NTRN 101', 0, 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(32, 6, 'TOTAL', 0, 0);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '12', 0, 1);
$pdf->Cell(180, 1, '', 0, 1);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(200, 1, '', 'B', 0, 1);

$pdf->Ln(3);
$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(70, 5, '', 0, 0);
$pdf->Cell(84, 6, 'TOTAL NUMBER OF UNITS', 0, 0);
$pdf->Cell(32, 6, '139', 0, 1);

$pdf->SetFont('Arial', 'I', '10');
$pdf->Cell(73, 5, '', 0, 0);
$pdf->Cell(84, 6, '(Including 6 units NSTP)', 0, 0);

$pdf->Output();