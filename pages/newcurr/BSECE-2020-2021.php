<?php
require ('../fpdf/fpdf.php');




class PDF extends FPDF
{

// Page header

}

$pdf = new PDF('P','mm','Legal');
//left top right
$pdf->SetMargins(10,10,10);
$pdf ->AddPage();

    // Logo(x axis, y axis, height, width)
    $pdf->Image('../../assets/img/logos/logo.png',50,5,15,15);
    // text color
    $pdf->SetTextColor(255,0,0);
    // font(font type,style,font size)
    $pdf->SetFont('Arial','B',18);
    // Dummy cell
    $pdf->Cell(50);
    // //cell(width,height,text,border,end line,[align])
    $pdf->Cell(110,5,'Saint Francis of Assisi College',0,0,'C');
    // Line break
    $pdf->Ln(5);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',10,'C');
    // dummy cell
    $pdf->Cell(50);
    // //cell(width,height,text,border,end line,[align])
    $test = utf8_decode("Pi�as");
    $pdf->Cell(90,3,'Admiral Village, Talo, Las ' .$test. ' City',0,0,'C');
    // Line break
    $pdf->Ln(8);
    $pdf->SetFont('Arial','B',10,'C');
    // dummy cell
    $pdf->Cell(50);
    // //cell(width,height,text,border,end line,[align])
    $pdf->Cell(103,4,'FOUR-YEAR CURRICULUM',0,0,'C');
    // Line break
    $pdf->Ln(4);
    $pdf->SetFont('Arial','B',10,'C');
    // dummy cell
    $pdf->Cell(50);
    // //cell(width,height,text,border,end line,[align])
    $pdf->Cell(100,4,'FOR',0,0,'C');
    // Line break
    $pdf->Ln(4);
    $pdf->SetFont('Arial','B',10,'C');
    // dummy cell
    $pdf->Cell(50);
    // //cell(width,height,text,border,end line,[align])
    $pdf->Cell(110,4,'BACHELOR OF SCIENCE IN ELECTRONICS ENGINEERING (BSECE)',0,1,'C');

    // Line break

    $pdf->SetFont('Arial','',10,'C');
    // dummy cell
    $pdf->Cell(50);
    // //cell(width,height,text,border,end line,[align])
    $pdf->Cell(110,4,'(Effective Academic Year 2020-2021)',0,1,'C');
     // Line break
    $pdf->Ln(4);
   

//dummy cells
$pdf ->Cell(20 ,5,'',0,1);
$pdf ->Cell(20 ,5,'',0,0);

$pdf->SetFont('Arial','B','10');
$pdf ->Cell(20 ,5,'CODE',0,0);
$pdf ->Cell(90 ,5,'Description',0,0,'C');
$pdf ->Cell(38 ,5,'UNITS',0,0,'C');
$pdf ->Cell(60 ,5,'Pre-Requisites',0,1);

$pdf->Ln(2);
$pdf->Cell(132, 3, '', 0, 0);
$pdf ->Cell(11 ,1,'Lec',0,0,'C');
$pdf ->Cell(11 ,1,'Lab',0,0,'C');
$pdf ->Cell(11 ,1,'Total',0,1,'C');




$pdf ->Cell(45 ,5,'First Year, First Semester',0,1);
$pdf->SetFont('Arial','','9');
// SUBJECTS

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'CCGE',0,0);
$pdf ->Cell(15 ,4,'101',0,0);
$pdf ->Cell(90 ,4,'Science, Technology and Society',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'CCGE',0,0);
$pdf ->Cell(15 ,4,'102',0,0);
$pdf ->Cell(90 ,4,'Readings in Philippine History',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'CCGE',0,0);
$pdf ->Cell(15 ,4,'103',0,0);
$pdf ->Cell(90 ,4,'Understanding the Self',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'CHCL',0,0);
$pdf ->Cell(15 ,4,'101',0,0);
$pdf ->Cell(90 ,4,'Franciscan Orientation',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'1',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'EMATH',0,0);
$pdf ->Cell(15 ,4,'101',0,0);
$pdf ->Cell(90 ,4,'Mathematics for Engineers',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(9 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'(3)',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'EMATH',0,0);
$pdf ->Cell(15 ,4,'102',0,0);
$pdf ->Cell(90 ,4,'Calculus 1',0,0);
$pdf->SetFont('Arial','','9');
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ECHEM',0,0);
$pdf ->Cell(15 ,4,'101',0,0);
$pdf ->Cell(90 ,4,'Chemistry for Engineers',0,0);
$pdf->SetFont('Arial','','9');
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(10 ,4,'4',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'PHED',0,0);
$pdf ->Cell(15 ,4,'101',0,0);
$pdf ->Cell(90 ,4,'Gymnastics',0,0);
$pdf->SetFont('Arial','','9');
$pdf ->Cell(10 ,4,'2',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'2',0,1);


// LAST LINE PER SEM
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'NSTP',0,0);
$pdf ->Cell(15 ,4,'1',0,0);
$pdf ->Cell(90 ,4,'National Service and Training Program 1',0,0);
$pdf ->Cell(10 ,4,'3','B',0);
$pdf ->Cell(10 ,4,'0','B',0);
$pdf ->Cell(3 ,4,'3','B',1);


$pdf ->Cell(20 ,5,'',0,0);

$pdf->SetFont('Arial','','10');
$pdf ->Cell(102 ,5,'',0,0);
$pdf ->Cell(32 ,6,'TOTAL',0,0);

$pdf->SetFont('Arial','B','10');
$pdf ->Cell(10 ,6,'22',0,1);
$pdf ->Cell(180 ,1,'',0,1);


$pdf->Ln(2);

$pdf ->Cell(45 ,5,'First Year, Second Semester',0,1);
$pdf->SetFont('Arial','','9');
// SUBJECTS

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'CCGE',0,0);
$pdf ->Cell(15 ,4,'104',0,0);
$pdf ->Cell(90 ,4,'Mathematics in the Modern World',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);


$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'CCGE',0,0);
$pdf ->Cell(15 ,4,'105',0,0);
$pdf ->Cell(90 ,4,'The Contemporary World',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ECGE',0,0);
$pdf ->Cell(15 ,4,'101',0,0);
$pdf ->Cell(90 ,4,'Living in the I.T. Era',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'CCGE 101',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'CHCL',0,0);
$pdf ->Cell(15 ,4,'102',0,0);
$pdf ->Cell(90 ,4,'Franciscan Core Values and Culture',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(10 ,4,'CHCL 101',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'EMATH',0,0);
$pdf ->Cell(15 ,4,'103',0,0);
$pdf ->Cell(90 ,4,'Calculus 2',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'EMATH 102',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'EMATH',0,0);
$pdf ->Cell(15 ,4,'104',0,0);
$pdf ->Cell(90 ,4,'Engineering Data Analysis',0,0);
$pdf->SetFont('Arial','','9');
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'EMATH 102',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'PHSYE',0,0);
$pdf ->Cell(15 ,4,'102',0,0);
$pdf ->Cell(90 ,4,'Physics for Engineers 1',0,0);
$pdf->SetFont('Arial','','9');
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(10 ,4,'4',0,0);
$pdf ->Cell(10 ,4,'EMATH 102',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'PHED',0,0);
$pdf ->Cell(15 ,4,'102',0,0);
$pdf ->Cell(90 ,4,'Individual / Dual Sports',0,0);
$pdf->SetFont('Arial','','9');
$pdf ->Cell(10 ,4,'2',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'2',0,0);
$pdf ->Cell(10 ,4,'PHED 101',0,1);


// LAST LINE PER SEM
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'NSTP',0,0);
$pdf ->Cell(15 ,4,'2',0,0);
$pdf ->Cell(90 ,4,'National Service and Training Program 2',0,0);
$pdf ->Cell(10 ,4,'3','B',0);
$pdf ->Cell(10 ,4,'0','B',0);
$pdf ->Cell(3 ,4,'3','B',0);
$pdf->Cell(8, 4, '', 0, 0);
$pdf ->Cell(10 ,4,'NSTP1',0,1);


$pdf ->Cell(20 ,5,'',0,0);

$pdf->SetFont('Arial','','10');
$pdf ->Cell(102 ,5,'',0,0);
$pdf ->Cell(32 ,6,'TOTAL',0,0);

$pdf->SetFont('Arial','B','10');
$pdf ->Cell(10 ,6,'25',0,1);
$pdf ->Cell(180 ,1,'',0,1);


$pdf->Ln(1);

$pdf ->Cell(45 ,5,'Second Year, First Semester',0,1);
$pdf->SetFont('Arial','','9');
// SUBJECTS

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ECEA',0,0);
$pdf ->Cell(15 ,4,'103',0,0);
$pdf ->Cell(90 ,4,'Material Science and Engineering ',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'ECHEM 101',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ECGE',0,0);
$pdf ->Cell(15 ,4,'102',0,0);
$pdf ->Cell(90 ,4,'The Entrepreneur Mind',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'CCGE 104, CCGE 105',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'CCGE',0,0);
$pdf ->Cell(15 ,4,'106',0,0);
$pdf ->Cell(90 ,4,'Purposive Communication',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'CCGE',0,0);
$pdf ->Cell(15 ,4,'107',0,0);
$pdf ->Cell(90 ,4,'Art Appreciation',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'EMATH',0,0);
$pdf ->Cell(15 ,4,'105',0,0);
$pdf ->Cell(90 ,4,'Differential Equation',0,0);
$pdf->SetFont('Arial','','9');
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'EMATH 103',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ECEA',0,0);
$pdf ->Cell(15 ,4,'101',0,0);
$pdf ->Cell(90 ,4,'Environmental Science and Engineering',0,0);
$pdf->SetFont('Arial','','9');
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ECAD',0,0);
$pdf ->Cell(15 ,4,'101',0,0);
$pdf ->Cell(90 ,4,'Computer -Aided Drafting',0,0);
$pdf->SetFont('Arial','','9');
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(10 ,4,'1',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'PHYS',0,0);
$pdf ->Cell(15 ,4,'103',0,0);
$pdf ->Cell(90 ,4,'Physics for Engineers 2',0,0);
$pdf->SetFont('Arial','','9');
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(10 ,4,'4',0,0);
$pdf ->Cell(10 ,4,'PHYSE 102',0,1);



// LAST LINE PER SEM
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'PHED',0,0);
$pdf ->Cell(15 ,4,'103',0,0);
$pdf ->Cell(90 ,4,'Team Sports',0,0);
$pdf ->Cell(10 ,4,'2','B',0);
$pdf ->Cell(10 ,4,'0','B',0);
$pdf ->Cell(3 ,4,'2','B',0);
$pdf->Cell(7, 4, '', 0, 0);
$pdf ->Cell(10 ,4,'PHED 101',0,1);


$pdf ->Cell(20 ,5,'',0,0);

$pdf->SetFont('Arial','','10');
$pdf ->Cell(102 ,5,'',0,0);
$pdf ->Cell(32 ,6,'TOTAL',0,0);

$pdf->SetFont('Arial','B','10');
$pdf ->Cell(10 ,6,'25',0,1);
$pdf ->Cell(180 ,1,'',0,1);


$pdf->Ln(1);

$pdf ->Cell(45 ,5,'Second Year, Second Semester',0,1);
$pdf->SetFont('Arial','','9');
// SUBJECTS

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'CCGE',0,0);
$pdf ->Cell(15 ,4,'108',0,0);
$pdf ->Cell(90 ,4,'Ethics',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'CCGE 103',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ECGE',0,0);
$pdf ->Cell(15 ,4,'103',0,0);
$pdf ->Cell(90 ,4,'Reading Visual Art',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'CCGE 107',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'RIZL',0,0);
$pdf ->Cell(15 ,4,'100',0,0);
$pdf ->Cell(90 ,4,'Rizal\'s Life, Works and Writings',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'CCGE 102',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ECEA',0,0);
$pdf ->Cell(15 ,4,'102',0,0);
$pdf ->Cell(90 ,4,'Computer Programming',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'2',0,0);
$pdf ->Cell(10 ,4,'2',0,1);


$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'EMEC ',0,0);
$pdf ->Cell(15 ,4,'102',0,0);
$pdf ->Cell(90 ,4,'Engineering Mechanics',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'PHYSYE 102',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ECEP',0,0);
$pdf ->Cell(15 ,4,'101',0,0);
$pdf ->Cell(90 ,4,'Advanced Engineering Mathematics',0,0);
$pdf->SetFont('Arial','','9');
$pdf ->Cell(10 ,4,'4',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'4',0,0);
$pdf ->Cell(10 ,4,'EMATH 105',0,1);


$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ECEA',0,0);
$pdf ->Cell(15 ,4,'105',0,0);
$pdf ->Cell(90 ,4,'Circuits 1',0,0);
$pdf->SetFont('Arial','','9');
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(10 ,4,'4',0,0);
$pdf ->Cell(10 ,4,'PYHS 103 ;EMATH 103',0,1);



// LAST LINE PER SEM
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'PHED',0,0);
$pdf ->Cell(15 ,4,'104',0,0);
$pdf ->Cell(90 ,4,'Team Sports',0,0);
$pdf ->Cell(10 ,4,'2','B',0);
$pdf ->Cell(10 ,4,'0','B',0);
$pdf ->Cell(3 ,4,'2','B',0);
$pdf->Cell(7, 4, '', 0, 0);
$pdf ->Cell(10 ,4,'PHED 101',0,1);


$pdf ->Cell(20 ,5,'',0,0);

$pdf->SetFont('Arial','','10');
$pdf ->Cell(102 ,5,'',0,0);
$pdf ->Cell(32 ,6,'TOTAL',0,0);

$pdf->SetFont('Arial','B','10');
$pdf ->Cell(10 ,6,'24',0,1);
$pdf ->Cell(180 ,1,'',0,1);


$pdf->Ln(1);
$pdf->SetFont('Arial','I','10');
$pdf ->Cell(1 ,5,'',0,0);
$pdf ->Cell(115 ,6,'Student must complete ALL General Education, Allied and Professional',0,0);
$pdf ->Cell(32 ,6,'courses from First and Second Year Courses',0,1);
$pdf ->Cell(1 ,5,'',0,0);
$pdf ->Cell(32 ,6,'before acceptance of enrollment to Third Year.',0,1);

$pdf->Ln(5);


$pdf ->Cell(45 ,5,'Third Year, First Semester',0,1);
$pdf->SetFont('Arial','','9');
// SUBJECTS

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ECEP',0,0);
$pdf ->Cell(15 ,4,'104',0,0);
$pdf ->Cell(90 ,4,'Numerical Methods',0,0);
$pdf ->Cell(10 ,4,'2',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'ECEP 101',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ECEP',0,0);
$pdf ->Cell(15 ,4,'105',0,0);
$pdf ->Cell(90 ,4,'Logic Circuits and Switching Theory',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(10 ,4,'4',0,0);
$pdf ->Cell(10 ,4,'CORRE .ECEP 106',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ECEP',0,0);
$pdf ->Cell(15 ,4,'106',0,0);
$pdf ->Cell(90 ,4,'Electronics 1 (Electronics Devices and Circuits)',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(10 ,4,'4',0,0);
$pdf ->Cell(10 ,4,'ECEA 105',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ECEP',0,0);
$pdf ->Cell(15 ,4,'103',0,0);
$pdf ->Cell(90 ,4,'Electromagnetics',0,0);
$pdf ->Cell(10 ,4,'4',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'4',0,0);
$pdf ->Cell(10 ,4,'EMATH 105',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ECEA',0,0);
$pdf ->Cell(15 ,4,'106',0,0);
$pdf ->Cell(90 ,4,'Circuits 2',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(10 ,4,'4',0,0);
$pdf ->Cell(10 ,4,'ECEA 101',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ECEA',0,0);
$pdf ->Cell(15 ,4,'107',0,0);
$pdf ->Cell(90 ,4,'Basic Thermodynamics',0,0);
$pdf ->Cell(10 ,4,'2',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'2',0,0);
$pdf ->Cell(10 ,4,'PHYSE 103',0,1);

// LAST LINE PER SEM
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ECEP',0,0);
$pdf ->Cell(15 ,4,'102',0,0);
$pdf ->Cell(90 ,4,'Signals, Spectra, Signal Processing',0,0);
$pdf ->Cell(10 ,4,'3','B',0);
$pdf ->Cell(10 ,4,'1','B',0);
$pdf ->Cell(3 ,4,'4','B',0);
$pdf->Cell(7, 4, '', 0, 0);
$pdf ->Cell(10 ,4,'ECEP 101',0,1);


$pdf ->Cell(20 ,5,'',0,0);

$pdf->SetFont('Arial','','10');
$pdf ->Cell(102 ,5,'',0,0);
$pdf ->Cell(32 ,6,'TOTAL',0,0);

$pdf->SetFont('Arial','B','10');
$pdf ->Cell(10 ,6,'25',0,1);
$pdf ->Cell(180 ,1,'',0,1);

$pdf->Ln(25);

$pdf ->Cell(45 ,5,'Third Year, Second Semester',0,1);
$pdf->SetFont('Arial','','9');
// SUBJECTS

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'LEMA',0,0);
$pdf ->Cell(15 ,4,'100',0,0);
$pdf ->Cell(90 ,4,'Fundamentals of Leadership and Management',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ECEP',0,0);
$pdf ->Cell(15 ,4,'107',0,0);
$pdf ->Cell(90 ,4,'Electronics 2 (Electronics Circuits and Design)',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(10 ,4,'4',0,0);
$pdf ->Cell(10 ,4,'ECEP 106',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ECEP',0,0);
$pdf ->Cell(15 ,4,'108',0,0);
$pdf ->Cell(90 ,4,'Communication 1 (Principles of Communication  Systems)',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(10 ,4,'4',0,0);
$pdf ->Cell(10 ,4,'CORRE. ECEP 107',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ECEP',0,0);
$pdf ->Cell(15 ,4,'109',0,0);
$pdf ->Cell(90 ,4,'Microprocessor and Microcontroller Systems',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(10 ,4,'4',0,0);
$pdf ->Cell(10 ,4,'ECEP 105',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ECEL',0,0);
$pdf ->Cell(15 ,4,'101',0,0);
$pdf ->Cell(90 ,4,'ECE Elective 1',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(10 ,4,'4',0,0);
$pdf ->Cell(10 ,4,'3rd yr. 2nd sem',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ECEA',0,0);
$pdf ->Cell(15 ,4,'104',0,0);
$pdf ->Cell(90 ,4,'Basic Occupational Health and Safety Engineering',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);


// LAST LINE PER SEM
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'EECO',0,0);
$pdf ->Cell(15 ,4,'102',0,0);
$pdf ->Cell(90 ,4,'Engineering Economics',0,0);
$pdf ->Cell(10 ,4,'3','B',0);
$pdf ->Cell(10 ,4,'0','B',0);
$pdf ->Cell(3 ,4,'3','B',0);
$pdf ->Cell(7 ,4,'',0,0);
$pdf ->Cell(10 ,4,'EMATH 104',0,1);

$pdf ->Cell(20 ,5,'',0,0);

$pdf->SetFont('Arial','','10');
$pdf ->Cell(102 ,5,'',0,0);
$pdf ->Cell(32 ,6,'TOTAL',0,0);

$pdf->SetFont('Arial','B','10');
$pdf ->Cell(10 ,6,'25',0,1);
$pdf ->Cell(180 ,1,'',0,1);

$pdf->Ln(1);
$pdf->SetFont('Arial','I','10');
$pdf ->Cell(1 ,5,'',0,0);
$pdf ->Cell(115 ,6,'Student must complete all required Third Year Courses Before acceptance of enrollment in PRAC 111',0,1);

$pdf->Ln(1);
$pdf->SetFont('Arial','B','10');
$pdf ->Cell(45 ,5,'Summer',0,1);
$pdf->SetFont('Arial','','10');
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'PRAC',0,0);
$pdf ->Cell(15 ,4,'111',0,0);
$pdf ->Cell(90 ,4,'Engineering Internship (240 hours)',0,0);
$pdf ->Cell(10 ,4,'3','B',0);
$pdf ->Cell(10 ,4,'0','B',0);
$pdf ->Cell(3 ,4,'3','B',0);
$pdf->Cell(7, 4, '', 0, 0);
$pdf ->Cell(10 ,4,'4th Yr. Standing',0,1);

$pdf ->Cell(20 ,5,'',0,0);

$pdf->SetFont('Arial','','10');
$pdf ->Cell(102 ,5,'',0,0);
$pdf ->Cell(32 ,6,'TOTAL',0,0);

$pdf->SetFont('Arial','B','10');
$pdf ->Cell(10 ,6,'3',0,1);
$pdf ->Cell(180 ,1,'',0,1);

$pdf->Ln(1);

$pdf ->Cell(45 ,5,'Fourth Year, First Semester',0,1);
$pdf->SetFont('Arial','','9');
// SUBJECTS

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ECEP',0,0);
$pdf ->Cell(15 ,4,'110',0,0);
$pdf ->Cell(90 ,4,'Methods of Research',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'EMATH 104',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ECEP',0,0);
$pdf ->Cell(15 ,4,'111',0,0);
$pdf ->Cell(90 ,4,'Electronics 3 (Electronics Systems and Design)',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(10 ,4,'4',0,0);
$pdf ->Cell(10 ,4,'CPEA 102/CPEN 107',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ECEP',0,0);
$pdf ->Cell(15 ,4,'112',0,0);
$pdf ->Cell(90 ,4,'Feedback and Control Systems',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(10 ,4,'4',0,0);
$pdf ->Cell(10 ,4,'ECEP 101',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ECEP',0,0);
$pdf ->Cell(15 ,4,'113',0,0);
$pdf ->Cell(90 ,4,'Communication 2 (Modulation and Coding Techniques)',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(10 ,4,'4',0,0);
$pdf ->Cell(10 ,4,'ECEP 108',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ECEP',0,0);
$pdf ->Cell(15 ,4,'115',0,0);
$pdf ->Cell(90 ,4,'ECE Design Project 1',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(10 ,4,'4TH YR STANDING',0,1);


$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ECEL',0,0);
$pdf ->Cell(15 ,4,'102',0,0);
$pdf ->Cell(90 ,4,'ECE Elective 2',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(10 ,4,'4',0,0);
$pdf ->Cell(10 ,4,'ECEL 101',0,1);

// LAST LINE PER SEM
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ECEL',0,0);
$pdf ->Cell(15 ,4,'103',0,0);
$pdf ->Cell(90 ,4,'ECE Elective 3',0,0);
$pdf ->Cell(10 ,4,'3','B',0);
$pdf ->Cell(10 ,4,'1','B',0);
$pdf ->Cell(3 ,4,'4','B',0);
$pdf->Cell(7, 4, '', 0, 0);
$pdf ->Cell(10 ,4,'ECEL 101',0,1);

$pdf ->Cell(20 ,5,'',0,0);

$pdf->SetFont('Arial','','10');
$pdf ->Cell(102 ,5,'',0,0);
$pdf ->Cell(32 ,6,'TOTAL',0,0);

$pdf->SetFont('Arial','B','10');
$pdf ->Cell(10 ,6,'24',0,1);
$pdf ->Cell(180 ,1,'',0,1);


$pdf->Ln(1);


$pdf ->Cell(45 ,5,'Fourth Year, Second Semester',0,1);
$pdf->SetFont('Arial','','9');
// SUBJECTS
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ECEA',0,0);
$pdf ->Cell(15 ,4,'108',0,0);
$pdf ->Cell(90 ,4,'Engineering Management',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'EECO 103',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ECEP',0,0);
$pdf ->Cell(15 ,4,'116',0,0);
$pdf ->Cell(90 ,4,'Communication 4 (Data Communications)',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(10 ,4,'4',0,0);
$pdf ->Cell(10 ,4,'ECEP 113',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ECEP',0,0);
$pdf ->Cell(15 ,4,'117',0,0);
$pdf ->Cell(90 ,4,'ECE Design Project 2',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'2',0,0);
$pdf ->Cell(10 ,4,'2',0,0);
$pdf ->Cell(10 ,4,'ECEP 113',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ECEP',0,0);
$pdf ->Cell(15 ,4,'118',0,0);
$pdf ->Cell(90 ,4,'ECE Laws,Contracts, Ethics and Standards',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ECEP',0,0);
$pdf ->Cell(15 ,4,'119',0,0);
$pdf ->Cell(90 ,4,'Seminars/ Colloquium',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(10 ,4,'1',0,1);



$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ETEC',0,0);
$pdf ->Cell(15 ,4,'104',0,0);
$pdf ->Cell(90 ,4,'Technopreneurship',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ECEP',0,0);
$pdf ->Cell(15 ,4,'117',0,0);
$pdf->SetFont('Arial','','8');
$pdf ->Cell(90 ,4,'Communication 3 (Transmission Media& Antenna System and Design)',0,0);
$pdf ->Cell(10 ,4,'3','B',0);
$pdf ->Cell(10 ,4,'1','B',0);
$pdf ->Cell(3 ,4,'4','B',0);
$pdf->Cell(7, 4, '', 0, 0);
$pdf ->Cell(10 ,4,'ECEP 113',0,1);

$pdf ->Cell(20 ,5,'',0,0);

$pdf->SetFont('Arial','','10');
$pdf ->Cell(102 ,5,'',0,0);
$pdf ->Cell(32 ,6,'TOTAL',0,0);

$pdf->SetFont('Arial','B','10');
$pdf ->Cell(10 ,6,'20',0,1);
$pdf ->Cell(180 ,1,'',0,1);

$pdf->SetFont('Arial','B','10');


$pdf->Ln(3);
$pdf->SetFont('Arial','B','10');
$pdf ->Cell(70 ,5,'',0,0);
$pdf ->Cell(84 ,6,'GRAND TOTAL NUMBER OF UNITS',0,0);
$pdf ->Cell(32 ,6,'193',0,1);



$pdf ->Output();
?>