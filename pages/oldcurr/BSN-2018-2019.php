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
$pdf->Cell(90, 3, '045 Admiral Village, Talon III, Las ' . $test . ' City', 0, 0, 'C');
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
$pdf->Cell(110, 4, 'BACHELOR OF SCIENCE IN NURSING', 0, 1, 'C');
$pdf->Cell(210, 4, 'CMO 15 Series of 2017', 0, 1, 'C');

// Line break

$pdf->SetFont('Arial', '', 10, 'C');
// dummy cell
$pdf->Cell(50);
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(110, 4, '(Academic Year 2018-2019)', 0, 1, 'C');
// Line break
$pdf->Ln(4);

//dummy cells
$pdf->Cell(20, 5, '', 0, 1);
$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(20, 5, 'CODE', 0, 0);
$pdf->Cell(90, 5, 'Description', 0, 0, 'C');
$pdf->Cell(40, 5, 'UNITS', 0, 0, 'C');
$pdf->Cell(60, 5, 'Pre-Requisites', 0, 1);

$pdf->Ln(2);
$pdf->Cell(132, 5, '', 0, 0);
$pdf->Cell(9, 1, 'Lec', 0, 0, 'C');
$pdf->Cell(9, 1, 'Lab', 0, 0, 'C');
$pdf->Cell(9, 1, 'RLE', 0, 0, 'C');
$pdf->Cell(9, 1, 'Total', 0, 1, 'C');

$pdf->Ln(2);
$pdf->Cell(150, 5, '', 0, 0);
$pdf->SetFont('Arial', 'B', '8');
$pdf->Cell(5, 1, 'SL', 0, 0, 'C');
$pdf->Cell(5, 1, 'C', 0, 0, 'C');


$pdf->Ln(1);
$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(45, 5, 'First Year, First Semester', 0, 1);
$pdf->SetFont('Arial', '', '9');
// SUBJECTS

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'CCGE', 0, 0);
$pdf->Cell(15, 4, '101', 0, 0);
$pdf->Cell(90, 4, 'Science, Technology and Society', 0, 0);
$pdf->Cell(7, 4, '3', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '3', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'CCGE', 0, 0);
$pdf->Cell(15, 4, '102', 0, 0);
$pdf->Cell(90, 4, 'Readings in Philippine History', 0, 0);
$pdf->Cell(7, 4, '3', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '3', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'FILI', 0, 0);
$pdf->Cell(15, 4, '101', 0, 0);
$pdf->Cell(90, 4, 'KOMFIL (Kontekstwalisadong Komunikasyon sa Filipino)', 0, 0);
$pdf->Cell(7, 4, '3', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '3', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'CHCL', 0, 0);
$pdf->Cell(15, 4, '101', 0, 0);
$pdf->Cell(90, 4, 'Franciscan Orientation', 0, 0);
$pdf->Cell(7, 4, '1', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(6, 4, '0', 0, 0);
$pdf->Cell(7, 4, '(1)', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MC', 0, 0);
$pdf->Cell(15, 4, '101', 0, 0);
$pdf->Cell(90, 4, 'Biochemistry ', 0, 0);
$pdf->Cell(7, 4, '3', 0, 0);
$pdf->Cell(7, 4, '2', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '5', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MC', 0, 0);
$pdf->Cell(15, 4, '102', 0, 0);
$pdf->Cell(90, 4, 'Anatomy and Physiology ', 0, 0);
$pdf->Cell(7, 4, '3', 0, 0);
$pdf->Cell(7, 4, '2', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '5', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM ', 0, 0);
$pdf->Cell(15, 4, '100', 0, 0);
$pdf->Cell(90, 4, 'Theoretical Foundation of Nursing', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(7, 4, '3', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '3', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NSTP', 0, 0);
$pdf->Cell(15, 4, '1', 0, 0);
$pdf->Cell(89, 4, 'National Service Training Program 1', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(8, 4, '(3)', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '3', 0, 1);




// LAST LINE PER SEM
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'PE', 0, 0);
$pdf->Cell(15, 4, '101', 0, 0);
$pdf->Cell(89, 4, 'Physical Activity Towards Health and Fitness I', 0, 0);
$pdf->Cell(8, 4, '(3)', 'B', 0);
$pdf->Cell(7, 4, '0', 'B', 0);
$pdf->Cell(7, 4, '0', 'B', 0);
$pdf->Cell(6, 4, '0', 'B', 0);
$pdf->Cell(7, 4, '(3)', 'B', 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(40, 6, 'TOTAL', 0, 0);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '24', 0, 1);
$pdf->Cell(180, 1, '', 0, 1);

$pdf->Cell(200, 1, '', 'B', 0, 1);
$pdf->Ln(2);

$pdf->Cell(45, 5, 'First Year, Second Semester', 0, 1);
$pdf->SetFont('Arial', '', '9');
// SUBJECTS

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'FILI', 0, 0);
$pdf->Cell(15, 4, '102', 0, 0);
$pdf->Cell(90, 4, 'FILDIS (Filipino sa Iba\'t ibang Disiplina) ', 0, 0);
$pdf->Cell(7, 4, '3', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '3', 0, 0);
$pdf->Cell(10, 4, 'CCGE 101', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'WLIT', 0, 0);
$pdf->Cell(15, 4, '100', 0, 0);
$pdf->Cell(90, 4, 'World Literature ', 0, 0);
$pdf->Cell(7, 4, '3', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '3', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'CHCL', 0, 0);
$pdf->Cell(15, 4, '102', 0, 0);
$pdf->Cell(90, 4, 'Franciscan Core Values and Culture ', 0, 0);
$pdf->Cell(7, 4, '1', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(6, 4, '0', 0, 0);
$pdf->Cell(7, 4, '(1)', 0, 1);


$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MC', 0, 0);
$pdf->Cell(15, 4, '103', 0, 0);
$pdf->Cell(90, 4, 'Microbiology and Parasitology', 0, 0);
$pdf->Cell(7, 4, '3', 0, 0);
$pdf->Cell(7, 4, '1', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '4', 0, 0);
$pdf->Cell(10, 4, 'MC 101', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM ', 0, 0);
$pdf->Cell(15, 4, '101 L', 0, 0);
$pdf->Cell(90, 4, 'Health Assessment ', 0, 0);
$pdf->Cell(7, 4, '3', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '3', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM ', 0, 0);
$pdf->Cell(15, 4, '101 RLE', 0, 0);
$pdf->Cell(90, 4, 'Health Assessment', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '2', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '2', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM ', 0, 0);
$pdf->Cell(15, 4, '102', 0, 0);
$pdf->Cell(90, 4, 'Health Education', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(7, 4, '3', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '3', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM ', 0, 0);
$pdf->Cell(15, 4, '103 L', 0, 0);
$pdf->Cell(90, 4, 'Fundamentals of Nursing Practice', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(7, 4, '3', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '3', 0, 0);
$pdf->Cell(10, 4, 'MC 101', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, '', 0, 0);
$pdf->Cell(15, 4, '103 RLE', 0, 0);
$pdf->Cell(90, 4, 'Fundamentals of Nursing Practice ', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '2', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '2', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NSTP', 0, 0);
$pdf->Cell(15, 4, '12', 0, 0);
$pdf->Cell(89, 4, 'National Service Training Program 2', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(8, 4, '(3)', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(6, 4, '0', 0, 0);
$pdf->Cell(8, 4, '(3)', 0, 0);
$pdf->Cell(10, 4, 'NSTP 1', 0, 1);

// LAST LINE PER SEM
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'PE', 0, 0);
$pdf->Cell(15, 4, '102', 0, 0);
$pdf->Cell(90, 4, 'Physical Activity Towards Health and Fitness II ', 0, 0);
$pdf->Cell(7, 4, '2', 'B', 0);
$pdf->Cell(7, 4, '0', 'B', 0);
$pdf->Cell(7, 4, '0', 'B', 0);
$pdf->Cell(7, 4, '0', 'B', 0);
$pdf->Cell(7, 4, '2', 'B', 0);
$pdf->Cell(10, 4, 'PE 101', 0, 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(40, 6, 'TOTAL', 0, 0);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '25', 0, 1);
$pdf->Cell(180, 1, '', 0, 1);

$pdf->Cell(200, 1, '', 'B', 0, 1);
$pdf->Ln(1);

$pdf->Cell(45, 5, 'Second Year, First Semester', 0, 1);
$pdf->SetFont('Arial', '', '9');
// SUBJECTS

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM', 0, 0);
$pdf->Cell(15, 4, '104 L', 0, 0);
$pdf->Cell(90, 4, 'Community Health Nursing I (Individual and Family as Clients) ', 0, 0);
$pdf->Cell(7, 4, '2', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '2', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM', 0, 0);
$pdf->Cell(15, 4, '104 RLE', 0, 0);
$pdf->Cell(90, 4, 'Community Health Nursing I (Individual and Family as Clients) ', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '1', 0, 0);
$pdf->Cell(7, 4, '1', 0, 0);
$pdf->Cell(7, 4, '2', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM ', 0, 0);
$pdf->Cell(15, 4, '105', 0, 0);
$pdf->Cell(90, 4, 'Nutrition and Diet Therapy', 0, 0);
$pdf->Cell(7, 4, '2', 0, 0);
$pdf->Cell(7, 4, '1', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '3', 0, 0);
$pdf->SetFont('Arial', '', '7.5');
$pdf->Cell(7, 4, 'MC 101; MC 102; MC 103 ', 0, 1);

$pdf->SetFont('Arial', '', '9');
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM ', 0, 0);
$pdf->Cell(15, 4, '106', 0, 0);
$pdf->Cell(90, 4, 'Pharmacology', 0, 0);
$pdf->Cell(7, 4, '3', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '3', 0, 0);
$pdf->SetFont('Arial', '', '7.5');
$pdf->Cell(7, 4, 'MC 101; MC 102; MC 103 ', 0, 1);

$pdf->SetFont('Arial', '', '9');
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM ', 0, 0);
$pdf->Cell(15, 4, '107 L', 0, 0);
$pdf->Cell(90, 4, 'Care of Mother, Child, and Adolescent (Well Client) ', 0, 0);
$pdf->Cell(7, 4, '4', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '4', 0, 0);
$pdf->SetFont('Arial', '', '7.5');
$pdf->Cell(7, 4, 'NCM 101; NCM 102', 0, 1);

$pdf->SetFont('Arial', '', '9');
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM ', 0, 0);
$pdf->Cell(15, 4, '107 RLE', 0, 0);
$pdf->Cell(90, 4, 'Care of Mother, Child, and Adolescent (Well Client) ', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '2', 0, 0);
$pdf->Cell(7, 4, '3', 0, 0);
$pdf->Cell(7, 4, '5', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'CCGE', 0, 0);
$pdf->Cell(15, 4, '103', 0, 0);
$pdf->Cell(90, 4, 'Understanding the Self', 0, 0);
$pdf->Cell(7, 4, '3', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '3', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'CCGE', 0, 0);
$pdf->Cell(15, 4, '104', 0, 0);
$pdf->Cell(90, 4, 'Mathematics in the Modern World ', 0, 0);
$pdf->Cell(7, 4, '3', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '3', 0, 1);

// LAST LINE PER SEM
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'PE', 0, 0);
$pdf->Cell(15, 4, '103', 0, 0);
$pdf->Cell(90, 4, '(PATH-Fit) Physical Activity Towards Health and Fitness III', 0, 0);
$pdf->Cell(7, 4, '2', 'B', 0);
$pdf->Cell(7, 4, '0', 'B', 0);
$pdf->Cell(7, 4, '0', 'B', 0);
$pdf->Cell(7, 4, '0', 'B', 0);
$pdf->Cell(7, 4, '2', 'B', 0);
$pdf->Cell(10, 4, 'PE 101', 0, 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(40, 6, 'TOTAL', 0, 0);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '27', 0, 1);
$pdf->Cell(180, 1, '', 0, 1);

$pdf->Cell(200, 1, '', 'B', 0, 1);
$pdf->Ln(5);

$pdf->Cell(45, 5, 'Second Year, Second Semester', 0, 1);
$pdf->SetFont('Arial', '', '9');
// SUBJECTS

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM', 0, 0);
$pdf->Cell(15, 4, '109', 0, 0);
$pdf->Cell(90, 4, 'Health Ethics', 0, 0);
$pdf->Cell(7, 4, '3', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '3', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM ', 0, 0);
$pdf->Cell(15, 4, '110L', 0, 0);
$pdf->Cell(90, 4, 'Care of Mother and Child at-risk or with Problems', 0, 0);
$pdf->Cell(7, 4, '6', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '6', 0, 0);
$pdf->SetFont('Arial', '', '8');
$pdf->Cell(7, 4, 'NCM 104; NCM 107', 0, 1);

$pdf->SetFont('Arial', '', '9');
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM ', 0, 0);
$pdf->Cell(15, 4, '110RLE', 0, 0);
$pdf->Cell(90, 4, 'Care of Mother and Child at-risk or with Problems', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '1', 0, 0);
$pdf->Cell(7, 4, '5', 0, 0);
$pdf->Cell(7, 4, '6', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM ', 0, 0);
$pdf->Cell(15, 4, '111', 0, 0);
$pdf->Cell(90, 4, 'Nursing Informatics', 0, 0);
$pdf->Cell(7, 4, '2', 0, 0);
$pdf->Cell(7, 4, '1', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '3', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'CCGE', 0, 0);
$pdf->Cell(15, 4, '105', 0, 0);
$pdf->Cell(90, 4, 'The Contemporary World ', 0, 0);
$pdf->Cell(7, 4, '3', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '3', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'CCGE', 0, 0);
$pdf->Cell(15, 4, '106', 0, 0);
$pdf->Cell(90, 4, 'Purposive Communication', 0, 0);
$pdf->Cell(7, 4, '3', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '3', 0, 1);

// LAST LINE PER SEM
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'PE', 0, 0);
$pdf->Cell(15, 4, '104', 0, 0);
$pdf->Cell(90, 4, '(PATH-Fit) Physical Activity Towards Health and Fitness IV', 0, 0);
$pdf->Cell(7, 4, '2', 'B', 0);
$pdf->Cell(7, 4, '0', 'B', 0);
$pdf->Cell(7, 4, '0', 'B', 0);
$pdf->Cell(7, 4, '0', 'B', 0);
$pdf->Cell(7, 4, '2', 'B', 0);
$pdf->Cell(10, 4, 'PE 101', 0, 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(40, 6, 'TOTAL', 0, 0);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '26', 0, 1);
$pdf->Cell(180, 1, '', 0, 1);

$pdf->Cell(200, 3, '', 'B', 0, 1);
$pdf->Ln(5);

$pdf->Cell(45, 5, 'Third Year, First Semester', 0, 1);
$pdf->SetFont('Arial', '', '9');
// SUBJECTS

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM', 0, 0);
$pdf->Cell(15, 4, '112', 0, 0);
$pdf->Cell(90, 4, 'Nursing Research 1 ', 0, 0);
$pdf->Cell(7, 4, '2', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '1', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '3', 0, 0);
$pdf->SetFont('Arial', '', '8');
$pdf->Cell(7, 4, 'CCGE 104; NCM 110', 0, 1);

$pdf->SetFont('Arial', '', '9');
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM', 0, 0);
$pdf->Cell(15, 4, '113 L', 0, 0);
//
$pdf->Cell(90, 1, '', 0, 0);
$pdf->Cell(7, 4, '8', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '1', 0, 0);
$pdf->Cell(7, 4, '5', 0, 0);
$pdf->Cell(7, 4, '8', 0, 0);
$pdf->Cell(7, 4, 'NCM 109', 0, 0);
//
$y = $pdf->GetY();
$pdf->SetXY(55,$y);
$pdf->MultiCell(90,3,'Care of Clients with Problems in Oxygenation, Fluid and
Electrolytes,Infectious, Inflammatory and Immunologic
Response, Cellular Aberrations, Acute and Chronic',0,1);

$pdf->Ln(2);
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM', 0, 0);
$pdf->Cell(15, 4, '113 RLE', 0, 0);
//
$pdf->Cell(90, 1, '', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '1', 0, 0);
$pdf->Cell(7, 4, '5', 0, 0);
$pdf->Cell(7, 4, '6', 0, 0);
//
$y = $pdf->GetY();
$pdf->SetXY(55,$y);
$pdf->MultiCell(90,3,'Care of Clients with Problems in Oxygenation, Fluid and
Electrolytes,Infectious, Inflammatory and Immunologic
Response, Cellular Aberrations, Acute and Chronic',0,1);

$pdf->Ln(0.5);
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM ', 0, 0);
$pdf->Cell(15, 4, '114 L', 0, 0);
$pdf->Cell(90, 4, 'Community Health Nursing 2', 0, 0);
$pdf->Cell(7, 4, '2', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '2', 0, 0);
$pdf->Cell(7, 4, 'NCM 109', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM ', 0, 0);
$pdf->Cell(15, 4, '114 RLE', 0, 0);
$pdf->Cell(90, 4, 'Community Health Nursing 2', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '1', 0, 0);
$pdf->Cell(7, 4, '1', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM ', 0, 0);
$pdf->Cell(15, 4, '115', 0, 0);
$pdf->Cell(90, 4, 'Care of Older Person ', 0, 0);
$pdf->Cell(7, 4, '2', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '1', 0, 0);
$pdf->Cell(7, 4, '3', 0, 1);

// LAST LINE PER SEM
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'CCGE', 0, 0);
$pdf->Cell(15, 4, '107', 0, 0);
$pdf->Cell(90, 4, 'Art Appreciation ', 0, 0);
$pdf->Cell(7, 4, '2', 'B', 0);
$pdf->Cell(7, 4, '0', 'B', 0);
$pdf->Cell(7, 4, '0', 'B', 0);
$pdf->Cell(7, 4, '0', 'B', 0);
$pdf->Cell(7, 4, '2', 'B', 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(40, 6, 'TOTAL', 0, 0);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '26', 0, 1);
$pdf->Cell(180, 1, '', 0, 1);

$pdf->Ln(70);
$pdf->Cell(200, 15, '', 'B', 0, 1);
$pdf->Ln(20);

$pdf->Cell(45, 5, 'Third Year, Second Semester', 0, 1);
$pdf->SetFont('Arial', '', '9');

// SUBJECTS

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM ', 0, 0);
$pdf->Cell(15, 4, '116', 0, 0);
$pdf->Cell(90, 4, 'Nursing Research 2', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '2', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '2', 0, 0);
$pdf->Cell(7, 4, 'NCM 111', 0, 1);

$pdf->Ln(2);
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM ', 0, 0);
$pdf->Cell(15, 4, '117 L', 0, 0);
//
$pdf->Cell(90, 1, '', 0, 0);
$pdf->Cell(7, 4, '5', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '5', 0, 0);
$pdf->Cell(7, 4, 'NCM 112', 0, 0);
$y = $pdf->GetY();
$pdf->SetXY(55,$y);
$pdf->MultiCell(90,3,'Care of Clients with Problems in Nutrition, Gastro-intestinal,
Metabolism and Endocrine, Perception and Coordination)',0,1);

$pdf->Ln(2);
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM ', 0, 0);
$pdf->Cell(15, 4, '117 RLE', 0, 0);
//
$pdf->Cell(90, 4, '', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '1', 0, 0);
$pdf->Cell(7, 4, '3', 0, 0);
$pdf->Cell(7, 4, '4', 0, 0);
$pdf->Cell(1, 4, '', 0, 0);
$y = $pdf->GetY();
$pdf->SetXY(55,$y);
$pdf->MultiCell(90,3,'Care of Clients with Problems in Nutrition, Gastro-intestinal,
Metabolism and Endocrine, Perception and Coordination',0,1);


$pdf->Ln(2);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM', 0, 0);
$pdf->Cell(15, 4, '118 L', 0, 0);
$pdf->Cell(90, 4, 'Care of Clients with Maladaptive Patterns of Behavior', 0, 0);
$pdf->Cell(7, 4, '4', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '4', 0, 0);
$pdf->Cell(7, 4, 'NCM 112', 0, 1);

$pdf->SetFont('Arial', '', '9');
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM', 0, 0);
$pdf->Cell(15, 4, '118 RLE', 0, 0);
$pdf->Cell(90, 4, 'Care of Clients with Maladaptive Patterns of Behavior', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '1', 0, 0);
$pdf->Cell(7, 4, '3', 0, 0);
$pdf->Cell(7, 4, '4', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'CGEN', 0, 0);
$pdf->Cell(15, 4, '108', 0, 0);
$pdf->Cell(90, 4, 'Ethics', 0, 0);
$pdf->Cell(7, 4, '3', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '3', 0, 1);

// LAST LINE PER SEM
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'RIZAL', 0, 0);
$pdf->Cell(15, 4, '100', 0, 0);
$pdf->Cell(90, 4, 'Life, Works and Writings of Rizal', 0, 0);
$pdf->Cell(7, 4, '3', 'B', 0);
$pdf->Cell(7, 4, '0', 'B', 0);
$pdf->Cell(7, 4, '0', 'B', 0);
$pdf->Cell(7, 4, '0', 'B', 0);
$pdf->Cell(7, 4, '3', 'B', 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(40, 6, 'TOTAL', 0, 0);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '25', 0, 1);
$pdf->Cell(180, 1, '', 0, 1);

$pdf->Cell(200, 1, '', 'B', 0, 1);
$pdf->Ln(1);

$pdf->Cell(45, 5, 'Fourth Year, First Semester', 0, 1);
$pdf->SetFont('Arial', '', '9');
// SUBJECTS

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM ', 0, 0);
$pdf->Cell(15, 4, '119 L', 0, 0);
$pdf->Cell(90, 4, '', 0, 0);
$pdf->Cell(7, 4, '4', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '4', 0, 0);
$pdf->Cell(7, 4, 'NCM 116', 0, 0);
$y = $pdf->GetY();
$pdf->SetXY(55,$y);
$pdf->MultiCell(80,4,'Care of Clients with Life Threatening  Conditions, Acutely Ill/ Multi-Organ Problems, High Acuity and Emergency Situation (Acute and Chronic)',0,1);

$pdf->Ln(2);
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM ', 0, 0);
$pdf->Cell(15, 4, '119 RLE', 0, 0);
$pdf->Cell(90, 4, '', 0, 0);
$pdf->Cell(7, 4, '4', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '4', 0, 0);
$y = $pdf->GetY();
$pdf->SetXY(55,$y);
$pdf->MultiCell(75,3,'Care of Clients with Life Threatening  Conditions, Acutely Ill/ Multi-Organ Problems, High Acuity and Emergency Situation (Acute and Chronic)
',0,1);

$pdf->Ln(2);
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM ', 0, 0);
$pdf->Cell(15, 4, '120 L', 0, 0);
$pdf->Cell(90, 4, 'Nursing Leadership and Management', 0, 0);
$pdf->Cell(7, 4, '4', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '4', 0, 0);
$pdf->Cell(7, 4, 'NCM 116; NCM 117', 0, 1);

// LAST LINE PER SEM
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM ', 0, 0);
$pdf->Cell(15, 4, '120 RLE', 0, 0);
$pdf->Cell(90, 4, 'Nursing Leadership and Management', 0, 0);
$pdf->Cell(7, 4, '0', 'B', 0);
$pdf->Cell(7, 4, '0', 'B', 0);
$pdf->Cell(7, 4, '0', 'B', 0);
$pdf->Cell(7, 4, '3', 'B', 0);
$pdf->Cell(7, 4, '3', 'B', 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(40, 6, 'TOTAL', 0, 0);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '16', 0, 1);
$pdf->Cell(180, 1, '', 0, 1);

$pdf->Cell(200, 1, '', 'B', 0, 1);
$pdf->Ln(1);

$pdf->Cell(45, 5, 'Fourth Year, Second Semester', 0, 1);
$pdf->SetFont('Arial', '', '9');
// SUBJECTS
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM ', 0, 0);
$pdf->Cell(15, 4, '121 L', 0, 0);
$pdf->Cell(90, 4, 'Disaster Nursing', 0, 0);
$pdf->Cell(7, 4, '2', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '2', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM ', 0, 0);
$pdf->Cell(15, 4, '121 RLE', 0, 0);
$pdf->Cell(90, 4, 'Disaster Nursing', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '1', 0, 0);
$pdf->Cell(7, 4, '0', 0, 0);
$pdf->Cell(7, 4, '1', 0, 1);

// LAST LINE PER SEM
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM ', 0, 0);
$pdf->Cell(15, 4, '122', 0, 0);
$pdf->SetFont('Arial', '', '8.5');
$pdf->Cell(90, 4, 'Intensive Nursing Practicum (Hospital and Community Settings)', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(7, 4, '0', 'B', 0);
$pdf->Cell(7, 4, '0', 'B', 0);
$pdf->Cell(7, 4, '0', 'B', 0);
$pdf->Cell(7, 4, '8', 'B', 0);
$pdf->Cell(7, 4, '8', 'B', 0);
$pdf->SetFont('Arial', '', '8');
$pdf->Cell(10, 4, 'NCM 118; NCM 119', 0, 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(40, 6, 'TOTAL', 0, 0);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '11', 0, 1);
$pdf->Cell(180, 1, '', 0, 1);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(200, 1, '', 'B', 0, 1);



$pdf->Output();