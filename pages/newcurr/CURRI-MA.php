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
$pdf->Cell(90, 4, '8003097 / 4686331', 0, 0, 'C');
// Line break
$pdf->Ln(4);
$pdf->SetFont('Arial', 'B', 10, 'C');
// dummy cell
$pdf->Cell(50);
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(90, 4, 'GRADUATE SCHOOL OF BUSINESS MANAGEMENT AND EDUCATION', 0, 0, 'C');
// Line break
$pdf->Ln(4);
$pdf->SetFont('Arial', 'B', 10, 'C');
// dummy cell
$pdf->Cell(50);
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(90, 4, 'Master of Arts in Education (MAED)', 0, 1, 'C');

// Line break

$pdf->SetFont('Arial', '', 10, 'C');
// dummy cell
$pdf->Cell(50);
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(90, 4, 'Major in Educational Management', 0, 1, 'C');
// Line break
$pdf->Ln(4);

//dummy cells
$pdf->Cell(20, 5, '', 0, 1);
$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(20, 5, 'COURSE CODE', 0, 0);
$pdf->Cell(90, 5, 'Course Description', 0, 0, 'C');
$pdf->Cell(15, 5, 'No. of Units', 0, 0, 'C');

//YEAR , SEMESTER
$pdf->Cell(10, 5, '', 0, 1);
$pdf->Cell(10, 5, '', 0, 1);
$pdf->Cell(10, 5, '', 0, 0);

$pdf->Cell(45, 5, 'BASIC COURSE (Required Units: 9)', 0, 1);
$pdf->SetFont('Arial', '', '9');
// SUBJECTS

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'EDUC', 0, 0);
$pdf->Cell(15, 4, '501', 0, 0);
$pdf->Cell(90, 4, 'Educational Statistics', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'EDUC', 0, 0);
$pdf->Cell(15, 4, '502', 0, 0);
$pdf->Cell(90, 4, 'Methods of Research', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'EDUC', 0, 0);
$pdf->Cell(15, 4, '503', 0, 0);
$pdf->Cell(90, 4, 'Foundation of Education', 0, 0);
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
$pdf->Cell(180, 6, '', 0, 1);

//YEAR , SEMESTER
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(45, 5, 'MAJOR COURSES (Required Units: 15)', 0, 1);

// SUBJECTS
$pdf->SetFont('Arial', '', '9');

// SUBJECTS

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'EDMA', 0, 0);
$pdf->Cell(15, 4, '531', 0, 0);
$pdf->Cell(90, 4, 'Modern Trends & Practices in Education ', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'EDMA', 0, 0);
$pdf->Cell(15, 4, '532', 0, 0);
$pdf->Cell(90, 4, 'Principles and Technique Services', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'EDMA', 0, 0);
$pdf->Cell(15, 4, '533', 0, 0);
$pdf->Cell(90, 4, 'Curriculum Development', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'EDMA', 0, 0);
$pdf->Cell(15, 4, '534', 0, 0);
$pdf->Cell(90, 4, 'Financial Management of Schools', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'EDMA', 0, 0);
$pdf->Cell(15, 4, '535', 0, 0);
$pdf->Cell(90, 4, 'Personnel Management', 0, 0);
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
$pdf->Cell(10, 6, '15', 0, 1);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '', 0, 1);
$pdf->Cell(180, 6, '', 0, 1);
$pdf->Cell(180, 6, '', 0, 1);

//YEAR , SEMESTER
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(45, 5, 'ELECTIVES COURSES (Required Units - 6 Choices of (2) two courses', 0, 1);
$pdf->SetFont('Arial', '', '9');

// SUBJECTS
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'EDUC', 0, 0);
$pdf->Cell(15, 4, '512', 0, 0);
$pdf->Cell(90, 4, 'Computers in Education', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'EDUC', 0, 0);
$pdf->Cell(15, 4, '513', 0, 0);
$pdf->Cell(90, 4, 'Legal Aspects of Education', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'EDUC', 0, 0);
$pdf->Cell(15, 4, '521', 0, 0);
$pdf->Cell(90, 4, 'Measurement and Evaluation', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'EDUC', 0, 0);
$pdf->Cell(15, 4, '522', 0, 0);
$pdf->Cell(90, 4, 'Human Behavior in Organization', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'EDUC', 0, 0);
$pdf->Cell(15, 4, '524', 0, 0);
$pdf->Cell(90, 4, 'Education Planning', 0, 0);
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
$pdf->Cell(10, 6, '15', 0, 1);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '', 0, 1);
$pdf->Cell(180, 6, '', 0, 1);
$pdf->Cell(180, 6, '', 0, 1);

//YEAR , SEMESTER
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(45, 5, '(Required Units: 3)', 0, 1);
$pdf->SetFont('Arial', '', '9');

// SUBJECTS
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'EDUC', 0, 0);
$pdf->Cell(15, 4, '555', 0, 0);
$pdf->Cell(90, 4, 'Seminar in Thesis Writing', 0, 0);
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
$pdf->Cell(10, 6, '3', 0, 1);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '', 0, 1);
$pdf->Cell(180, 6, '', 0, 1);
$pdf->Cell(180, 6, '', 0, 1);

//YEAR , SEMESTER
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(45, 5, '(Required Units: 6)', 0, 1);
$pdf->SetFont('Arial', '', '9');

// SUBJECTS
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'EDUC', 0, 0);
$pdf->Cell(15, 4, '600', 0, 0);
$pdf->Cell(90, 4, 'Thesis Writing', 0, 0);
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
$pdf->Cell(10, 6, '39', 0, 1);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '', 0, 1);
$pdf->Cell(180, 6, '', 0, 1);
$pdf->Cell(180, 6, '', 0, 1);

$pdf->Cell(50);
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(200, 4, 'CYNTHIA J. BUSTAMANTE, M.A.Ed.', 0, 0, 'C');
// Line break
$pdf->Ln(4);
$pdf->SetFont('Arial', '', 10, 'C');
// dummy cell
$pdf->Cell(50);
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(200, 2, 'Program Director', 0, 1, 'C');

$pdf->Output();