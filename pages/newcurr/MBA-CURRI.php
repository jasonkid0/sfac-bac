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
$pdf->Cell(90, 3, '045 Admiral Village, Talon III, Las Pinas City', 0, 0, 'C');
// Line break
$pdf->Ln(8);
$pdf->SetFont('Arial', 'B', 10, 'C');
// dummy cell
$pdf->Cell(50);
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(90, 4, 'MASTER IN BUSINESS ADMINISTRATION', 0, 0, 'C');
// Line break
$pdf->Ln(4);
$pdf->SetFont('Arial', '', 10, 'C');
// dummy cell
$pdf->Cell(50);
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(90, 4, 'Curriculum 2018', 0, 0, 'C');
// Line break
$pdf->Ln(4);
$pdf->SetFont('Arial', '', 10, 'C');
// dummy cell
$pdf->Cell(50);
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(90, 4, '(For Non-Business Undegraduate)', 0, 1, 'C');

// Line break
$pdf->Ln(4);

//dummy cells
$pdf->Cell(20, 5, '', 0, 1);
$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(20, 5, 'COURSE CODE', 0, 0);
$pdf->Cell(90, 5, 'COURSE TITLE', 0, 0, 'C');
$pdf->Cell(15, 5, 'UNITS', 0, 0, 'C');
$pdf->Cell(15, 5, 'PRE-REQ', 0, 0, 'C');

//YEAR , SEMESTER
$pdf->Cell(10, 5, '', 0, 1);
$pdf->Cell(10, 5, '', 0, 1);
$pdf->Cell(10, 5, '', 0, 0);

$pdf->Cell(45, 5, 'First Trimester', 0, 1);
$pdf->SetFont('Arial', '', '9');
// SUBJECTS

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MBM', 0, 0);
$pdf->Cell(15, 4, '104', 0, 0);
$pdf->Cell(90, 4, 'Basic Accounting', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MBM', 0, 0);
$pdf->Cell(15, 4, '304', 0, 0);
$pdf->Cell(90, 4, 'Introduction to Management Communication', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

// LAST LINE PER SEM

$pdf->Cell(15, 4, '', 0, 0);
$pdf->Cell(15, 4, '', 0, 0);
$pdf->Cell(90, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(9, 4, '', 'B', 0);
$pdf->Cell(7, 4, '', 'B', 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '10');

$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(13, 6, 'TOTAL', 0, 0);
$pdf->Cell(10, 6, '6', 0, 1);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '', 0, 1);
$pdf->Cell(180, 6, '', 0, 1);

//YEAR , SEMESTER
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(45, 5, 'Second Trimester', 0, 1);

// SUBJECTS
$pdf->SetFont('Arial', '', '9');

// SUBJECTS

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MBM', 0, 0);
$pdf->Cell(15, 4, '204', 0, 0);
$pdf->Cell(90, 4, 'Numeracy and Computer Literacy', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MBM', 0, 0);
$pdf->Cell(15, 4, '404', 0, 0);
$pdf->Cell(90, 4, 'Entrepreneurship', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

// LAST LINE PER SEM

$pdf->Cell(15, 4, '', 0, 0);
$pdf->Cell(15, 4, '', 0, 0);
$pdf->Cell(90, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(9, 4, '', 'B', 0);
$pdf->Cell(7, 4, '', 'B', 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '10');

$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(13, 6, 'TOTAL', 0, 0);
$pdf->Cell(10, 6, '6', 0, 1);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '', 0, 1);
$pdf->Cell(180, 6, '', 0, 1);

//YEAR , SEMESTER
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(45, 5, 'Third Trimester', 0, 1);
$pdf->SetFont('Arial', '', '9');

// SUBJECTS
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MBM', 0, 0);
$pdf->Cell(15, 4, '101', 0, 0);
$pdf->Cell(90, 4, 'Organization and Management', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MBM', 0, 0);
$pdf->Cell(15, 4, '102', 0, 0);
$pdf->Cell(90, 4, 'Marketing Management', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MBM', 0, 0);
$pdf->Cell(15, 4, '103', 0, 0);
$pdf->Cell(90, 4, 'Asian Business Environment with Business Ethics', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

// LAST LINE PER SEM

$pdf->Cell(15, 4, '', 0, 0);
$pdf->Cell(15, 4, '', 0, 0);
$pdf->Cell(90, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(9, 4, '', 'B', 0);
$pdf->Cell(7, 4, '', 'B', 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '10');

$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(13, 6, 'TOTAL', 0, 0);
$pdf->Cell(10, 6, '9', 0, 1);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '', 0, 1);
$pdf->Cell(180, 6, '', 0, 1);

//YEAR , SEMESTER
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(45, 5, 'Fourth Trimester', 0, 1);
$pdf->SetFont('Arial', '', '9');

// SUBJECTS
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MBM', 0, 0);
$pdf->Cell(15, 4, '201', 0, 0);
$pdf->Cell(90, 4, 'Quantitative Techniques for Decision-Making', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MBM', 0, 0);
$pdf->Cell(15, 4, '202', 0, 0);
$pdf->Cell(90, 4, 'Advanced Research Methods and Case Study Analysis', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MBM', 0, 0);
$pdf->Cell(15, 4, '203', 0, 0);
$pdf->Cell(90, 4, 'Managerial Accounting', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

// LAST LINE PER SEM

$pdf->Cell(15, 4, '', 0, 0);
$pdf->Cell(15, 4, '', 0, 0);
$pdf->Cell(90, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(9, 4, '', 'B', 0);
$pdf->Cell(7, 4, '', 'B', 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '10');

$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(13, 6, 'TOTAL', 0, 0);
$pdf->Cell(10, 6, '9', 0, 1);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '', 0, 1);
$pdf->Cell(180, 6, '', 0, 1);

//YEAR , SEMESTER
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(45, 5, 'Fifth Trimester', 0, 1);
$pdf->SetFont('Arial', '', '9');

// SUBJECTS
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MBM', 0, 0);
$pdf->Cell(15, 4, '301', 0, 0);
$pdf->Cell(90, 4, 'Financial Management', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, 'MBM 203', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MBM', 0, 0);
$pdf->Cell(15, 4, '302', 0, 0);
$pdf->Cell(90, 4, 'Advanced Production and Operation Management', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, 'MBM 201', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MBM', 0, 0);
$pdf->Cell(15, 4, '303', 0, 0);
$pdf->Cell(90, 4, 'Corporate and Business Planning and Strategy', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, 'MBM 103', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

// LAST LINE PER SEM

$pdf->Cell(15, 4, '', 0, 0);
$pdf->Cell(15, 4, '', 0, 0);
$pdf->Cell(90, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(9, 4, '', 'B', 0);
$pdf->Cell(7, 4, '', 'B', 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '10');

$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(13, 6, 'TOTAL', 0, 0);
$pdf->Cell(10, 6, '9', 0, 1);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '', 0, 1);
$pdf->Cell(180, 6, '', 0, 1);

//YEAR , SEMESTER
$pdf->Cell(10, 5, '', 0, 1);
$pdf->Cell(10, 5, '', 0, 1);
$pdf->Cell(10, 5, '', 0, 0);

$pdf->Cell(45, 5, 'Sixth Trimester', 0, 1);
$pdf->SetFont('Arial', '', '9');
// SUBJECTS
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MBM', 0, 0);
$pdf->Cell(15, 4, '401', 0, 0);
$pdf->Cell(90, 4, 'Economic Analysis', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, 'MBM 301', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MBM', 0, 0);
$pdf->Cell(15, 4, '402', 0, 0);
$pdf->Cell(90, 4, 'Business Research Project **', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

// LAST LINE PER SEM

$pdf->Cell(15, 4, '', 0, 0);
$pdf->Cell(15, 4, '', 0, 0);
$pdf->Cell(90, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(9, 4, '', 'B', 0);
$pdf->Cell(7, 4, '', 'B', 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '10');

$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(13, 6, 'TOTAL', 0, 0);
$pdf->Cell(10, 6, '6', 0, 1);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '', 0, 1);
$pdf->Cell(180, 6, '', 0, 1);
$pdf->Cell(180, 6, '', 0, 1);

//YEAR , SEMESTER
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(45, 5, 'Seventh Trimester', 0, 1);
$pdf->SetFont('Arial', '', '9');

// SUBJECTS
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MBM', 0, 0);
$pdf->Cell(15, 4, '403', 0, 0);
$pdf->Cell(90, 4, 'Practinum in Business Management *', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(15, 4, '', 0, 0);
$pdf->Cell(15, 4, '', 0, 0);
$pdf->Cell(90, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(9, 4, '', 'B', 0);
$pdf->Cell(7, 4, '', 'B', 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '10');

$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(13, 6, 'TOTAL', 0, 0);
$pdf->Cell(10, 6, '3', 0, 1);
$pdf->Cell(102, 5, '', 0, 0);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '', 0, 1);
$pdf->Cell(180, 6, '', 0, 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '10');

$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(25, 6, 'TOTAL UNITS', 0, 0);
$pdf->Cell(10, 6, '36', 0, 1);
$pdf->Cell(102, 5, '', 0, 0);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '', 0, 1);
$pdf->Cell(180, 6, '', 0, 1);
$pdf->Cell(180, 6, '', 0, 1);

$pdf->Ln(4);
$pdf->SetFont('Arial', 'B', 10, 'C');

// dummy cell
$pdf->Cell(50);
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(1, 1, 'Note:', 0, 1, 'C');
// Line break
$pdf->Ln(4);
$pdf->SetFont('Arial', '', 10, 'C');
// dummy cell
$pdf->Cell(50);
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(90, 4, '(1) Preparatory Courses must be passed before acceptance to the', 0, 1, 'C');

$pdf->SetFont('Arial', '', 10, 'C');
// dummy cell
$pdf->Cell(50);
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(90, 4, 'Masters Program Courses.', 0, 1, 'C');

$pdf->Ln(4);
$pdf->SetFont('Arial', '', 10, 'C');
// dummy cell
$pdf->Cell(50);
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(90, 4, '(2) * Course can be taken after passing the Comprehensive Examination,', 0, 1, 'C');

$pdf->SetFont('Arial', '', 10, 'C');
// dummy cell
$pdf->Cell(50);
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(90, 4, 'and Business Research Project Presentation', 0, 1, 'C');

$pdf->Ln(4);
$pdf->SetFont('Arial', '', 10, 'C');
// Line break
$pdf->Ln(4);
$pdf->SetFont('Arial', '', 10, 'C');
// dummy cell
$pdf->Cell(50);
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(90, 4, '** Course can be taken after passing foundation and major courses', 0, 1, 'C');

$pdf->Output();