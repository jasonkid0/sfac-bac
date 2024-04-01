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
    // $test = utf8_decode("");
    $pdf->Cell(50, 3, '', 0, 0); // for spacing
    $pdf->Cell(10,5,'96, Bayanan, City of Bacoor, Cavite',0,0,'C');
    // Line break
    $pdf->Ln(5);
    $pdf->SetFont('Arial','B',10,'C');
    $pdf->Cell(98, 3, '', 0, 0); // for spacing
    $pdf->Cell(15,4,'FOUR-YEAR CURRICULUM',0,0,'C');
    // Line break
    $pdf->Ln(4);
    $pdf->Cell(98, 3, '', 0, 0); // for spacing
    $pdf->Cell(10,4,'FOR',0,0,'C');
    // Line break
    $pdf->Ln(4);
    $pdf->SetFont('Arial','B',10,'C');
    $pdf->Cell(50);
    $pdf->Cell(110,4,'BACHELOR OF EARLY CHILDHOOD EDUCATION',0,1,'C');

    $pdf->SetFont('Arial','',10,'C');
    $pdf->Cell(50);
    $pdf->Cell(110,4,'(Effective Academic Year 2023-2024)',0,1,'C');
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
$pdf->Cell(15, 4, 'FILI', 0, 0);
$pdf->Cell(15, 4, '101', 0, 0);
$pdf->Cell(90, 4, 'Komunikasyon sa Akademikong Filipino', 0, 0);
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
$pdf->Cell(15, 4, 'TCHED', 0, 0);
$pdf->Cell(15, 4, '101', 0, 0);
$pdf->Cell(90, 4, 'The Child and Adolescent Learners and Learning Principles', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 1);
$pdf->Cell(5, 4, '', 0, 0);

$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MCEC', 0, 0);
$pdf->Cell(15, 4, '101', 0, 0);
$pdf->Cell(90, 4, 'Child Development', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 1);
$pdf->Cell(5, 4, '', 0, 0);

$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MCEC', 0, 0);
$pdf->Cell(15, 4, '102', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(90, 4, 'Health, Nutrition and Safety', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 1);
$pdf->Cell(5, 4, '', 0, 0);

$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'PATHFIT ', 0, 0);
$pdf->Cell(15, 4, '101', 0, 0);
$pdf->Cell(90, 4, 'Movement Competency Training', 0, 0);
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
$pdf->Cell(10, 6, '24', 0, 1);
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
$pdf->Cell(90, 4, 'Mathematic in Modern World', 0, 0);
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
$pdf->Cell(15, 4, 'FILI', 0, 0);
$pdf->Cell(15, 4, '102', 0, 0);
$pdf->Cell(90, 4, 'Pagbasa at Pagsulat Tungo sa Pananaliksik', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, 'FILI 101', 0, 1);

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
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, 'TCED 101', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MCEC', 0, 0);
$pdf->Cell(15, 4, '103', 0, 0);
$pdf->Cell(90, 4, 'Foundations of Early Childhood Education', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'PATHFIT ', 0, 0);
$pdf->Cell(15, 4, '102', 0, 0);
$pdf->Cell(90, 4, 'Exercise-Based Fitness Activities', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '2', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '2', 0, 0);
$pdf->Cell(10, 4, 'PATHFIT 101', 0, 1);

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
$pdf->Cell(10, 6, '24', 0, 1);
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
$pdf->Cell(15, 4, 'FILI', 0, 0);
$pdf->Cell(15, 4, '103', 0, 0);
$pdf->Cell(90, 4, 'Masining na Pagpapahayag', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, 'FILI 102', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'TCED', 0, 0);
$pdf->Cell(15, 4, '103', 0, 0);
$pdf->SetFont('Arial', '', '7.5');
$pdf->Cell(90, 4, 'The Teacher and The Community, School Culture and Org. Leadership', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->SetFont('Arial', '', '9');
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'PKED', 0, 0);
$pdf->Cell(15, 4, '106', 0, 0);
$pdf->Cell(90, 4, 'Assessment in Learning 1', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MCEC', 0, 0);
$pdf->Cell(15, 4, '104', 0, 0);
$pdf->Cell(90, 4, 'Play and Developmentally Appropriate Practices in ECEd', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MCEC', 0, 0);
$pdf->Cell(15, 4, '105', 0, 0);
$pdf->Cell(90, 4, 'Creative Arts, Music, and Movement in ECEd', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

// LAST LINE PER SEM
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'PATHFIT', 0, 0);
$pdf->Cell(15, 4, '103', 0, 0);
$pdf->Cell(90, 4, 'Individual/Dual Sports', 0, 0);
$pdf->Cell(10, 4, '2', 'B', 0);
$pdf->Cell(10, 4, '0', 'B', 0);
$pdf->Cell(3, 4, '2', 'B', 0);
$pdf->Cell(7, 4, '', 0, 0);
$pdf->SetFont('Arial', '', '8');
$pdf->Cell(10, 4, 'PATHFIT 101, PATHFIT 102', 0, 1);

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
$pdf->Cell(90, 4, 'Rizal Life, Wokrs, and Writings', 0, 0);
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
$pdf->Cell(15, 4, 'MCEC', 0, 0);
$pdf->Cell(15, 4, '106', 0, 0);
$pdf->Cell(90, 4, 'Numeracy Development', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MCEC', 0, 0);
$pdf->Cell(15, 4, '107', 0, 0);
$pdf->Cell(90, 4, 'Inclusive Education in Early Childhood Settings', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MCEC', 0, 0);
$pdf->Cell(15, 4, '108', 0, 0);
$pdf->Cell(90, 4, 'Children\'s Literature', 0, 0);
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
$pdf->Cell(15, 4, 'PATHFIT ', 0, 0);
$pdf->Cell(15, 4, '104', 0, 0);
$pdf->Cell(90, 4, 'Team Sports', 0, 0);
$pdf->Cell(10, 4, '2', 'B', 0);
$pdf->Cell(10, 4, '0', 'B', 0);
$pdf->Cell(3, 4, '2', 'B', 0);
$pdf->Cell(7, 4, '', 0, 0);
$pdf->SetFont('Arial', '', '8');
$pdf->Cell(10, 4, 'PATHFIT 101, PATHFIT 102', 0, 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(32, 6, 'TOTAL', 0, 0);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '27', 0, 1);
$pdf->Cell(180, 1, '', 0, 1);

$pdf->Cell(200, 1, '', 'B', 0, 1);
$pdf->Ln(2);

$pdf->Cell(45, 5, 'Third Year, First Semester', 0, 1);
$pdf->SetFont('Arial', '', '9');
// SUBJECTS

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'PKED', 0, 0);
$pdf->Cell(15, 4, '103', 0, 0);
$pdf->Cell(90, 4, 'Technology for Teaching and Learning', 0, 0);
$pdf->Cell(10, 4, '2', 0, 0);
$pdf->Cell(10, 4, '1', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'PKED', 0, 0);
$pdf->Cell(15, 4, '109', 0, 0);
$pdf->Cell(90, 4, 'The Teacher and The School Curriculum', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'PKED', 0, 0);
$pdf->Cell(15, 4, '110', 0, 0);
$pdf->Cell(90, 4, 'Building and Enchancing New Literacies Across the Curriculum', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 1);

$pdf->SetFont('Arial', '', '9');
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'GEED', 0, 0);
$pdf->Cell(15, 4, '100', 0, 0);
$pdf->Cell(90, 4, 'Teaching Multi-grade Classes', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, 'Third Year. Standing', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MCEC', 0, 0);
$pdf->Cell(15, 4, '109', 0, 0);
$pdf->Cell(90, 4, 'Assessment of Children\'s Development & Learning', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MCEC', 0, 0);
$pdf->Cell(15, 4, '110', 0, 0);
$pdf->SetFont('Arial', '', '8');
$pdf->Cell(90, 4, 'Content and Pedagogy in the MTB-MLE', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MCEC', 0, 0);
$pdf->Cell(15, 4, '111', 0, 0);
$pdf->Cell(90, 4, 'Social Studies in ECEd', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MCEC', 0, 0);
$pdf->Cell(15, 4, '112', 0, 0);
$pdf->SetFont('Arial', '', '6');
$pdf->Cell(90, 4, 'Technology for Teaching and Learning 2 - Utilization of Instructional Technology in ECEd', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, 'PKED 108', 0, 1);


// LAST LINE PER SEM
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MCEC', 0, 0);
$pdf->Cell(15, 4, '113', 0, 0);
$pdf->SetFont('Arial', '', '8');
$pdf->Cell(90, 4, 'Science in Early Childhood Education', 0, 0);
$pdf->SetFont('Arial', '', '9');
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

$pdf->Ln(50);
$pdf->Cell(200, 13, '', 'B', 0, 1);
$pdf->Ln(18);

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
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'RESE', 0, 0);
$pdf->Cell(15, 4, '102', 0, 0);
$pdf->Cell(90, 4, 'Research in Early Childhood Education', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, 'RESE 101', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'FRED', 0, 0);
$pdf->Cell(15, 4, '101', 0, 0);
$pdf->Cell(90, 4, 'The Franciscan Educator 1', 0, 0);
$pdf->Cell(10, 4, '1', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '1', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MCEC', 0, 0);
$pdf->Cell(15, 4, '114', 0, 0);
$pdf->Cell(90, 4, 'Early Childhood Education Curriculum Models', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, 'PKED 109', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MCEC', 0, 0);
$pdf->Cell(15, 4, '115', 0, 0);
$pdf->Cell(90, 4, 'Guiding Children\'s Behavior and Moral Development', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MCEC', 0, 0);
$pdf->Cell(15, 4, '116', 0, 0);
$pdf->Cell(90, 4, 'Infant and Toddler Programs', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MCEC', 0, 0);
$pdf->Cell(15, 4, '117', 0, 0);
$pdf->Cell(90, 4, 'Early Learning Environment', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MCEC', 0, 0);
$pdf->Cell(15, 4, '118', 0, 0);
$pdf->Cell(90, 4, 'Management of Early Childhood Education Programs', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MCEC', 0, 0);
$pdf->Cell(15, 4, '119', 0, 0);
$pdf->Cell(90, 4, 'Family, School and Community Partnership', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

// LAST LINE PER SEM
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MCEC', 0, 0);
$pdf->Cell(15, 4, '120', 0, 0);
$pdf->Cell(90, 4, 'Literacy Development', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, 'MCEC 110, PKED 110', 0, 1);


$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(32, 6, 'TOTAL', 0, 0);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '28', 0, 1);
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
$pdf->Cell(15, 4, 'PLIT', 0, 0);
$pdf->Cell(15, 4, '101', 0, 0);
$pdf->Cell(90, 4, 'Philippine Literature', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->SetFont('Arial', '', '7');
$pdf->Cell(15, 4, 'ELED', 0, 0);
$pdf->Cell(15, 4, '111', 0, 0);
$pdf->Cell(90, 4, 'Field Study 1 (Observations of Teaching-Learning in Actual School Environment', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);


// LAST LINE PER SEM
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'ELED', 0, 0);
$pdf->Cell(15, 4, '112', 0, 0);
$pdf->Cell(90, 4, 'Field Study 2 (Participation and Teaching Assistantship)', 0, 0);
$pdf->Cell(10, 4, '0', 'B', 0);
$pdf->Cell(10, 4, '3', 'B', 0);
$pdf->Cell(3, 4, '3', 'B', 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(32, 6, 'TOTAL', 0, 0);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '10', 0, 1);
$pdf->Cell(180, 1, '', 0, 1);

$pdf->Cell(200, 1, '', 'B', 0, 1);
$pdf->Ln(1);

$pdf->Cell(45, 5, 'Fourth Year, First Semester', 0, 1);
$pdf->SetFont('Arial', '', '9');
// SUBJECTS
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'WLIT', 0, 0);
$pdf->Cell(15, 4, '102', 0, 0);
$pdf->Cell(90, 4, 'World Literature', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

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
$pdf->Cell(10, 6, '9', 0, 1);
$pdf->Cell(180, 1, '', 0, 1);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(200, 1, '', 'B', 0, 1);

$pdf->Ln(3);
$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(70, 5, '', 0, 0);
$pdf->Cell(84, 6, 'TOTAL NUMBER OF UNITS', 0, 0);
$pdf->Cell(32, 6, '181', 0, 1);

$pdf->SetFont('Arial','I','10');
$pdf ->Cell(73 ,5,'',0,0);
$pdf ->Cell(84 ,6,'(Including 6 units NSTP)',0,0);

$pdf ->Output();
