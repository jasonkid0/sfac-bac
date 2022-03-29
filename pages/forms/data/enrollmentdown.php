<?php
session_start();
require('../../fpdf/fpdf.php');



class PDF extends FPDF
{

    // Page header

    function Header()
    {
        // Logo(x axis, y axis, height, width)
        $this->Image('../../../assets/img/logos/logo.png', 27, 13, 19, 19);
        // font(font type,style,font size)
        $this->SetFont('Times', 'B', 28);
        $this->SetTextColor(240, 0, 0);
        // Dummy cell
        $this->Cell(50);
        // //cell(width,height,text,border,end line,[align])
        $this->Cell(110, 15, 'Saint Francis of Assisi College', 0, 1, 'C');
        $this->Ln(1);
        $this->SetTextColor(0, 0, 0);
        $this->SetFont('Arial', 'B', 11.5);
        $test = utf8_decode("");
        $this->Cell(200, 2, 'Daily Enrollment Update', 0, 0, 'C');
        // Line break
        $this->Ln(4);
        $this->SetFont('Arial', 'B', 12);
        // //cell(width,height,text,border,end line,[align])
        $this->Cell(0, 4, 'HIGHER EDUCATION', 0, 1, 'C');
        // Line break
        $this->Ln(1);
        $this->SetFont('Arial', 'B', 14);
        // //cell(width,height,text,border,end line,[align])
        $this->Cell(0, 6, 'School Year', 0, 1, 'C');
        $this->Ln(1);
        $this->SetTextColor(0, 0, 225);
        $this->Cell(0, 6, 'COLLEGE MAIN CAMPUS', 0, 1, 'C');
        $this->SetFont('Arial', 'B', 10);
        $this->Ln(5);
        $this->Rect(5, 11, 205, 320); // box
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-25);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        $this->SetTextColor(255, 0, 0);
        // Page number
        $this->Cell(0, 5, '', 0, 1, 'C');
        $this->SetFont('Arial', '', 8);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(0, 5, '', 0, 0, 'R');
    }
}

$pdf = new PDF('P', 'mm', 'Legal');
//left top right
$pdf->SetMargins(6, 10, 7);
$pdf->AddPage();
// $pdf ->Rect(7,76,150,64); // box
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetTextColor(240, 0, 0);
$pdf->Cell(0, 5, 'College', 0, 1);

// college
$pdf->SetTextColor(0, 0, 0);
$pdf->Ln(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(0.1, 4, '', 0, 0);
$pdf->Rect(6, 59, 35, 12); //box
$pdf->Cell(35, 12, 'PARTICULARS', 0, 0, 'C');
$pdf->Rect(41, 59, 32, 12); //box
$pdf->Cell(32, 12, 'FINALS S.Y(inquiries)', 0, 0, 'C'); // lalagyan ata year dito boi nice galeng
$pdf->Rect(73, 59, 21, 12); //box
$pdf->Cell(21, 12, 'SY', 0, 0, 'C'); // year
$pdf->Rect(94, 59, 20, 12); //box
$pdf->Cell(5, 2, '', 0, 0);
$pdf->Cell(10, 12, 'VARIANCE', 0, 0, 'C');
//

$pdf->Rect(120, 68, 22, 0); // line Tar
$pdf->Rect(120, 70, 22, 0); // line tar
$pdf->Cell(10, 2, '', 0, 0);
$pdf->Cell(25, 12, 'TARGET', 0, 0, 'C');
$pdf->Rect(150, 68, 33, 0); // line 
$pdf->Rect(150, 70, 33, 0); // line col
$pdf->Cell(10, 2, '', 0, 0);
$pdf->Cell(25, 12, 'COLLEGE ENROLLEES', 0, 0, 'C');
$pdf->Rect(187, 68, 18, 0); // line v
$pdf->Rect(187, 70, 18, 0); // line v
$pdf->Cell(9, 2, '', 0, 0);
$pdf->Cell(17, 12, 'VARIANCE', 0, 1, 'C');


$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(18, 18, 'INQUIRIES', 1, 0, 'C');
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(17, 6, 'Walk-in', 1, 0, 'C');
$pdf->Cell(32, 6, '', 1, 0, 'C'); // data
$pdf->Cell(21, 6, '', 1, 0, 'C'); //
$pdf->Cell(20, 6, '', 1, 0, 'C'); //
$pdf->Cell(17, 6, 'New', 0, 0, 'C');
$pdf->Cell(1, 2, '', 0, 0); //space
$pdf->Cell(9, 6, '', 0, 0, 'C'); // data
$pdf->Cell(9, 2, '', 0, 0); //space
$pdf->Cell(9, 6, 'New', 0, 0, 'C'); // for col
$pdf->Cell(3, 2, '', 0, 0); //space
$pdf->Cell(12, 6, '', 0, 0, 'C'); // data
$pdf->Cell(9, 2, '', 0, 0); //space
$pdf->Cell(9, 6, 'New', 0, 0, 'C'); // for vari
$pdf->Cell(3, 2, '', 0, 0); //space
$pdf->Cell(12, 6, '', 0, 1, 'C'); // data

$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(18, 2, '', 0, 0);
$pdf->Cell(17, 6, 'BF', 1, 0, 'C');
$pdf->Cell(32, 6, '', 1, 0, 'C'); // data
$pdf->Cell(21, 6, '', 1, 0, 'C'); //
$pdf->Cell(20, 6, '', 1, 0, 'C'); //
$pdf->Cell(17, 6, 'BF', 0, 0, 'C');
$pdf->Cell(12, 6, '', 0, 0, 'C'); // data
$pdf->Cell(3, 2, '', 0, 0); //space
$pdf->Cell(17, 6, 'BF', 0, 0, 'C');
$pdf->Cell(12, 6, '', 0, 0, 'C'); // data
$pdf->Cell(3, 2, '', 0, 0); //space
$pdf->Cell(17, 6, 'BF', 0, 0, 'C');
$pdf->Cell(12, 6, '', 0, 1, 'C'); // data

$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(18, 2, '', 0, 0);
$pdf->Cell(17, 6, 'Online', 1, 0, 'C');
$pdf->Cell(32, 6, '', 1, 0, 'C'); // data
$pdf->Cell(21, 6, '', 1, 0, 'C'); //
$pdf->Cell(20, 6, '', 1, 0, 'C'); //
$pdf->Cell(17, 6, 'Old', 0, 0, 'C');
$pdf->Cell(12, 6, '', 0, 0, 'C'); // data
$pdf->Cell(3, 2, '', 0, 0); //space
$pdf->Cell(17, 6, 'Old', 0, 0, 'C');
$pdf->Cell(12, 6, '', 0, 0, 'C'); // data
$pdf->Cell(3, 2, '', 0, 0); //space
$pdf->Cell(17, 6, 'Old', 0, 0, 'C');
$pdf->Cell(12, 6, '', 0, 1, 'C'); // data


//
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(18, 18, 'ENROLLEES', 1, 0, 'C');
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(17, 6, 'Walk-in', 1, 0, 'C');
$pdf->Cell(32, 6, '', 1, 0, 'C'); // data
$pdf->Cell(21, 6, '', 1, 0, 'C'); //
$pdf->Cell(20, 6, '', 1, 0, 'C'); //
$pdf->SetFont('Arial', 'B', 8);
$pdf->Rect(129, 89, 13, 0); // line Tol
$pdf->Cell(17, 6, 'TOTAL', 0, 0, 'C');
$pdf->Cell(12, 6, '', 0, 0, 'C'); // data
$pdf->Rect(160, 89, 13, 0); // line Tol
$pdf->Cell(17, 6, 'TOTAL', 0, 0, 'C');
$pdf->Cell(12, 6, '', 0, 0, 'C'); // data
$pdf->Rect(190, 89, 13, 0); // line Tol
$pdf->Cell(17, 6, 'TOTAL', 0, 0, 'C');
$pdf->Cell(12, 6, '', 0, 1, 'C'); // data

$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(18, 2, '', 0, 0);
$pdf->Cell(17, 6, 'BF', 1, 0, 'C');
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(32, 6, '', 1, 0, 'C'); // data
$pdf->Cell(21, 6, '', 1, 0, 'C'); //
$pdf->Cell(20, 6, '', 1, 1, 'C'); //
$pdf->Cell(18, 2, '', 0, 0);
$pdf->Cell(17, 6, 'Online', 1, 0, 'C');
$pdf->Cell(32, 6, '', 1, 0, 'C'); // data
$pdf->Cell(21, 6, '', 1, 0, 'C'); //
$pdf->Cell(20, 6, '', 1, 1, 'C'); //


// grad school
$pdf->Ln(1);
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetTextColor(240, 0, 0);
$pdf->Cell(0, 5, 'GRADUATE SCHOOL', 0, 1);

$pdf->SetTextColor(0, 0, 0);
$pdf->Ln(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(0.1, 4, '', 0, 0);
$pdf->Rect(6, 114, 35, 12); //box
$pdf->Cell(35, 12, 'PARTICULARS', 0, 0, 'C');
$pdf->Rect(41, 114, 32, 12); //box
$pdf->Cell(32, 12, ' S.Y', 0, 0, 'C'); // lalagyan ata year dito boi nice galeng
$pdf->Rect(73, 114, 21, 12); //box
$pdf->Cell(21, 12, 'SY', 0, 0, 'C'); // year
$pdf->Rect(94, 114, 20, 12); //box
$pdf->Cell(5, 2, '', 0, 0);
$pdf->Cell(10, 12, 'VARIANCE', 0, 0, 'C');
//

$pdf->Rect(120, 123, 22, 0); // line Tar
$pdf->Rect(120, 126, 22, 0); // line tar
$pdf->Cell(10, 2, '', 0, 0);
$pdf->Cell(25, 12, 'TARGET', 0, 0, 'C');
$pdf->Rect(150, 123, 33, 0); // line 
$pdf->Rect(150, 126, 33, 0); // line col
$pdf->Cell(10, 2, '', 0, 0);
$pdf->Cell(25, 12, 'Grad School Enrollees', 0, 0, 'C');
$pdf->Rect(187, 123, 18, 0); // line v
$pdf->Rect(187, 126, 18, 0); // line v
$pdf->Cell(9, 2, '', 0, 0);
$pdf->Cell(17, 12, 'VARIANCE', 0, 1, 'C');



$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(18, 18, 'INQUIRIES', 1, 0, 'C');
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(17, 6, 'Walk-in', 1, 0, 'C');
$pdf->Cell(32, 6, '', 1, 0, 'C'); // data
$pdf->Cell(21, 6, '', 1, 0, 'C'); //
$pdf->Cell(20, 6, '', 1, 0, 'C'); //
$pdf->Cell(17, 6, 'New', 0, 0, 'C');
$pdf->Cell(1, 2, '', 0, 0); //space
$pdf->Cell(9, 6, '', 0, 0, 'C'); // data
$pdf->Cell(9, 2, '', 0, 0); //space
$pdf->Cell(9, 6, 'New', 0, 0, 'C'); // for col
$pdf->Cell(3, 2, '', 0, 0); //space
$pdf->Cell(12, 6, '', 0, 0, 'C'); // data
$pdf->Cell(9, 2, '', 0, 0); //space
$pdf->Cell(9, 6, 'New', 0, 0, 'C'); // for vari
$pdf->Cell(3, 2, '', 0, 0); //space
$pdf->Cell(12, 6, '', 0, 1, 'C'); // data

$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(18, 2, '', 0, 0);
$pdf->Cell(17, 6, 'BF', 1, 0, 'C');
$pdf->Cell(32, 6, '', 1, 0, 'C'); // data
$pdf->Cell(21, 6, '', 1, 0, 'C'); //
$pdf->Cell(20, 6, '', 1, 0, 'C'); //
$pdf->Cell(17, 6, 'BF', 0, 0, 'C');
$pdf->Cell(12, 6, '', 0, 0, 'C'); // data
$pdf->Cell(3, 2, '', 0, 0); //space
$pdf->Cell(17, 6, 'BF', 0, 0, 'C');
$pdf->Cell(12, 6, '', 0, 0, 'C'); // data
$pdf->Cell(3, 2, '', 0, 0); //space
$pdf->Cell(17, 6, 'BF', 0, 0, 'C');
$pdf->Cell(12, 6, '', 0, 1, 'C'); // data


$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(18, 2, '', 0, 0);
$pdf->Cell(17, 6, 'Online', 1, 0, 'C');
$pdf->Cell(32, 6, '', 1, 0, 'C'); // data
$pdf->Cell(21, 6, '', 1, 0, 'C'); //
$pdf->Cell(20, 6, '', 1, 0, 'C'); //
$pdf->Cell(17, 6, 'Old', 0, 0, 'C');
$pdf->Cell(12, 6, '', 0, 0, 'C'); // data
$pdf->Cell(3, 2, '', 0, 0); //space
$pdf->Cell(17, 6, 'Old', 0, 0, 'C');
$pdf->Cell(12, 6, '', 0, 0, 'C'); // data
$pdf->Cell(3, 2, '', 0, 0); //space
$pdf->Cell(17, 6, 'Old', 0, 0, 'C');
$pdf->Cell(12, 6, '', 0, 1, 'C'); // data


//
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(18, 18, 'ENROLLEES', 1, 0, 'C');
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(17, 6, 'Walk-in', 1, 0, 'C');
$pdf->Cell(32, 6, '', 1, 0, 'C'); // data
$pdf->Cell(21, 6, '', 1, 0, 'C'); //
$pdf->Cell(20, 6, '', 1, 0, 'C'); //
$pdf->SetFont('Arial', 'B', 8);
$pdf->Rect(129, 145, 13, 0); // line Tol
$pdf->Cell(17, 6, 'TOTAL', 0, 0, 'C');
$pdf->Cell(12, 6, '', 0, 0, 'C'); // data
$pdf->Rect(160, 145, 13, 0); // line Tol
$pdf->Cell(17, 6, 'TOTAL', 0, 0, 'C');
$pdf->Cell(12, 6, '', 0, 0, 'C'); // data
$pdf->Rect(190, 145, 13, 0); // line Tol
$pdf->Cell(17, 6, 'TOTAL', 0, 0, 'C');
$pdf->Cell(12, 6, '', 0, 1, 'C'); // data

$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(18, 2, '', 0, 0);
$pdf->Cell(17, 6, 'BF', 1, 0, 'C');
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(32, 6, '', 1, 0, 'C'); // data
$pdf->Cell(21, 6, '', 1, 0, 'C'); //
$pdf->Cell(20, 6, '', 1, 0, 'C'); //
$pdf->Cell(27, 2, '', 0, 0); //space
$pdf->Cell(17, 6, '', 0, 0, 'C'); // lalagyan ata dito boi yung pinaka total ng lahat
$pdf->Cell(12, 6, '', 0, 1, 'C'); // data
$pdf->Cell(18, 2, '', 0, 0);
$pdf->Cell(17, 6, 'Online', 1, 0, 'C');
$pdf->Cell(32, 6, '', 1, 0, 'C'); // data
$pdf->Cell(21, 6, '', 1, 0, 'C'); //
$pdf->Cell(20, 6, '', 1, 1, 'C'); //

$pdf->Ln(2);
$pdf->SetFont('Arial', 'B', 15);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(100, 2, '', 0, 0); //space
$pdf->Cell(20, 5, 'D  E  T  A  I  L  S', 0, 1, 'C');

$pdf->Ln(1);

$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(0.1, 4, '', 0, 0);
$pdf->Rect(6, 170, 30, 12); //box
$pdf->SetFillColor(255, 0, 0);
$pdf->Cell(30, 11.5, 'PARTICULARS', 0, 0, 'C', true);
$pdf->Cell(3, 4, '', 0, 0);
$pdf->SetFillColor(253, 218, 13);
$pdf->Rect(36, 170, 35, 12, true); //box
$pdf->Cell(30, 8, 'Final Enrollment', 0, 0, 'C');
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Rect(71, 170, 38, 12, true); //box
$pdf->Cell(30, 8, 'Targets/Levels', 0, 0, 'C');
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Rect(109, 170, 35, 12, true); //box
$pdf->Cell(30, 8, 'Enrollees', 0, 0, 'C');
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Rect(144, 170, 35, 12, true); //box
$pdf->Cell(30, 8, 'Total Enrollees', 0, 0, 'C');
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Rect(179, 170, 31, 12, true); //box
$pdf->Cell(30, 8, 'Total Reservation', 0, 1, 'C');

// sy year
$pdf->SetFillColor(253, 218, 13);
$pdf->Cell(38, 4, '', 0, 0); //space
$pdf->Cell(10, 3, 'SY ', 0, 0);
$pdf->Cell(5, 3, '', 0, 0, 'C'); // data year
$pdf->Cell(18, 4, '', 0, 0); //space
$pdf->Cell(10, 3, 'SY ', 0, 0);
$pdf->Cell(8, 3, ' ', 0, 0, 'C'); // data year
$pdf->Cell(23, 4, '', 0, 0);
$pdf->Cell(10, 3, ' for the day', 0, 0, 'C');
$pdf->Cell(20, 4, '', 0, 0);
$pdf->Cell(10, 3, 'S.Y. ', 0, 0);
$pdf->Cell(5, 3, ' ', 0, 0, 'C'); // data year
$pdf->Cell(20, 4, '', 0, 0);
$pdf->Cell(10, 3, 'S.Y. ', 0, 0);
$pdf->Cell(5, 3, ' ', 0, 1, 'C'); // data year
$pdf->Ln(1);


// DET table  ------------------------
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(0.1, 4, '', 0, 0);
//$pdf ->Rect(6,170,30,12);//box
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFillColor(30, 144, 255);
// table new old tol. in col
$pdf->Cell(30, 5, 'College', 0, 0, 'C', true);
$pdf->SetTextColor(0, 0, 0);
$pdf->Rect(36, 182, 12, 5); //box
$pdf->Cell(9, 6, 'New', 0, 0, 'C');
$pdf->Cell(5, 4, '', 0, 0); //space old
$pdf->Rect(48, 182, 11, 5); //box
$pdf->Cell(9, 6, 'Old', 0, 0, 'C');
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(59, 182, 12, 5); //box
$pdf->Cell(9, 6, 'Total', 0, 0, 'C');
//
$pdf->Rect(71, 182, 9, 5); //box
$pdf->Cell(9, 6, 'New', 0, 0, 'C');
$pdf->Cell(5, 4, '', 0, 0); //space old
$pdf->Rect(80, 182, 9, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 6, 'BF', 0, 0, 'C');
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(89, 182, 10, 5); //box
$pdf->Cell(7, 6, 'Old', 0, 0, 'C');
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(99, 182, 10, 5); //box
$pdf->Cell(9, 6, 'Total', 0, 0, 'C');
//
$pdf->Rect(109, 182, 9, 5); //box
$pdf->Cell(7, 6, 'New', 0, 0, 'C');
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(118, 182, 8, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 6, 'BF', 0, 0, 'C');
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(126, 182, 9, 5); //box
$pdf->Cell(7, 6, 'Old', 0, 0, 'C');
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(135, 182, 9, 5); //box
$pdf->Cell(9, 6, 'Total', 0, 0, 'C');
//
$pdf->Rect(144, 182, 8, 5); //box
$pdf->Cell(6.5, 6, 'New', 0, 0, 'C');
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(152, 182, 8, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 6, 'BF', 0, 0, 'C');
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(160, 182, 9, 5); //box
$pdf->Cell(7, 6, 'Old', 0, 0, 'C');
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(169, 182, 10, 5); //box
$pdf->Cell(8, 6, 'Total', 0, 0, 'C');
//
$pdf->Rect(179, 182, 7.5, 5); //box
$pdf->Cell(1, 4, '', 0, 0); //space
$pdf->Cell(6, 6, 'New', 0, 0, 'C');
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(187, 182, 7, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(2, 6, 'BF', 0, 0, 'C');
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(194, 182, 7, 5); //box
$pdf->Cell(6, 6, 'Old', 0, 0, 'C');
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(201, 182, 9, 5); //box
$pdf->Cell(8, 6, 'Total', 0, 1, 'C');

// TABLE WITH DATA --------------------------
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(0.1, 4, '', 0, 0);
//$pdf ->Rect(6,170,30,12);//box
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFillColor(0, 0, 0);
// table new old tol. in col
$pdf->Rect(5, 187, 31, 5); //box
$pdf->Cell(30, 4, 'NURSING', 0, 0, 'C');
$pdf->SetTextColor(0, 0, 0);
$pdf->Rect(36, 187, 12, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(5, 4, '', 0, 0); //space old
$pdf->Rect(48, 187, 11, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(59, 187, 12, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(71, 187, 9, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(5, 4, '', 0, 0); //space old
$pdf->Rect(80, 187, 9, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(89, 187, 10, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(99, 187, 10, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(109, 187, 9, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(118, 187, 8, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(126, 187, 9, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(135, 187, 9, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(144, 187, 8, 5); //box
$pdf->Cell(6.5, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(152, 187, 8, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(160, 187, 9, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(169, 187, 10, 5); //box
$pdf->Cell(8, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(179, 187, 7.5, 5); //box
$pdf->Cell(1, 4, '', 0, 0); //space
$pdf->Cell(6, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(187, 187, 7, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(2, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(194, 187, 7, 5); //box
$pdf->Cell(6, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(201, 187, 9, 5); //box
$pdf->Cell(8, 5, '', 0, 1, 'C'); //DATA
// ----------------------------------
$pdf->SetFont('Arial', '', '9');
$pdf->Rect(5, 192, 31, 5); //box
$pdf->Cell(30, 4, 'HRM', 0, 0, 'C');
$pdf->SetTextColor(0, 0, 0);
$pdf->Rect(36, 192, 12, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(5, 4, '', 0, 0); //space old
$pdf->Rect(48, 192, 11, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(59, 192, 12, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(71, 192, 9, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(5, 4, '', 0, 0); //space old
$pdf->Rect(80, 192, 9, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(89, 192, 10, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(99, 192, 10, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(109, 192, 9, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(118, 192, 8, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(126, 192, 9, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(135, 192, 9, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(144, 192, 8, 5); //box
$pdf->Cell(6.5, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(152, 192, 8, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(160, 192, 9, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(169, 192, 10, 5); //box
$pdf->Cell(8, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(179, 192, 7.5, 5); //box
$pdf->Cell(1, 4, '', 0, 0); //space
$pdf->Cell(6, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(187, 192, 7, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(2, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(194, 192, 7, 5); //box
$pdf->Cell(6, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(201, 192, 9, 5); //box
$pdf->Cell(8, 5, '', 0, 1, 'C'); //DATA

// --------------------------------
$pdf->SetFont('Arial', '', '9');
$pdf->Rect(5, 197, 31, 5); //box
$pdf->Cell(30, 4, 'BSBA', 0, 0, 'C');
$pdf->SetTextColor(0, 0, 0);
$pdf->Rect(36, 197, 12, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(5, 4, '', 0, 0); //space old
$pdf->Rect(48, 197, 11, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(59, 197, 12, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(71, 197, 9, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(5, 4, '', 0, 0); //space old
$pdf->Rect(80, 197, 9, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(89, 197, 10, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(99, 197, 10, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(109, 197, 9, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(118, 197, 8, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(126, 197, 9, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(135, 197, 9, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(144, 197, 8, 5); //box
$pdf->Cell(6.5, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(152, 197, 8, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(160, 197, 9, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(169, 197, 10, 5); //box
$pdf->Cell(8, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(179, 197, 7.5, 5); //box
$pdf->Cell(1, 4, '', 0, 0); //space
$pdf->Cell(6, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(187, 197, 7, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(2, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(194, 197, 7, 5); //box
$pdf->Cell(6, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(201, 197, 9, 5); //box
$pdf->Cell(8, 5, '', 0, 1, 'C'); //DATA
// --------------------------------
$pdf->SetFont('Arial', '', '9');
$pdf->Rect(5, 202, 31, 5); //box
$pdf->Cell(30, 4, 'BSCS', 0, 0, 'C');
$pdf->SetTextColor(0, 0, 0);
$pdf->Rect(36, 202, 12, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(5, 4, '', 0, 0); //space old
$pdf->Rect(48, 202, 11, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(59, 202, 12, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(71, 202, 9, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(5, 4, '', 0, 0); //space old
$pdf->Rect(80, 202, 9, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(89, 202, 10, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(99, 202, 10, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(109, 202, 9, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(118, 202, 8, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(126, 202, 9, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(135, 202, 9, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(144, 202, 8, 5); //box
$pdf->Cell(6.5, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(152, 202, 8, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(160, 202, 9, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(169, 202, 10, 5); //box
$pdf->Cell(8, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(179, 202, 7.5, 5); //box
$pdf->Cell(1, 4, '', 0, 0); //space
$pdf->Cell(6, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(187, 202, 7, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(2, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(194, 202, 7, 5); //box
$pdf->Cell(6, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(201, 202, 9, 5); //box
$pdf->Cell(8, 5, '', 0, 1, 'C'); //DATA
// --------------------------------
$pdf->SetFont('Arial', '', '9');
$pdf->Rect(5, 207, 31, 5); //box
$pdf->Cell(30, 4, 'ENGINEERING', 0, 0, 'C');
$pdf->SetTextColor(0, 0, 0);
$pdf->Rect(36, 207, 12, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(5, 4, '', 0, 0); //space old
$pdf->Rect(48, 207, 11, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(59, 207, 12, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(71, 207, 9, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(5, 4, '', 0, 0); //space old
$pdf->Rect(80, 207, 9, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(89, 207, 10, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(99, 207, 10, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(109, 207, 9, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(118, 207, 8, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(126, 207, 9, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(135, 207, 9, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(144, 207, 8, 5); //box
$pdf->Cell(6.5, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(152, 207, 8, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(160, 207, 9, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(169, 207, 10, 5); //box
$pdf->Cell(8, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(179, 207, 7.5, 5); //box
$pdf->Cell(1, 4, '', 0, 0); //space
$pdf->Cell(6, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(187, 207, 7, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(2, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(194, 207, 7, 5); //box
$pdf->Cell(6, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(201, 207, 9, 5); //box
$pdf->Cell(8, 5, '', 0, 1, 'C'); //DATA
// --------------------------------
$pdf->SetFont('Arial', '', '9');
$pdf->Rect(5, 212, 31, 5); //box
$pdf->Cell(30, 4, 'BSED', 0, 0, 'C');
$pdf->SetTextColor(0, 0, 0);
$pdf->Rect(36, 212, 12, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(5, 4, '', 0, 0); //space old
$pdf->Rect(48, 212, 11, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(59, 212, 12, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(71, 212, 9, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(5, 4, '', 0, 0); //space old
$pdf->Rect(80, 212, 9, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(89, 212, 10, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(99, 212, 10, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(109, 212, 9, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(118, 212, 8, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(126, 212, 9, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(135, 212, 9, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(144, 212, 8, 5); //box
$pdf->Cell(6.5, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(152, 212, 8, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(160, 212, 9, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(169, 212, 10, 5); //box
$pdf->Cell(8, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(179, 212, 7.5, 5); //box
$pdf->Cell(1, 4, '', 0, 0); //space
$pdf->Cell(6, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(187, 212, 7, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(2, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(194, 212, 7, 5); //box
$pdf->Cell(6, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(201, 212, 9, 5); //box
$pdf->Cell(8, 5, '', 0, 1, 'C'); //DATA
// --------------------------------
$pdf->SetFont('Arial', '', '9');
$pdf->Rect(5, 217, 31, 5); //box
$pdf->Cell(30, 4, 'BEED', 0, 0, 'C');
$pdf->SetTextColor(0, 0, 0);
$pdf->Rect(36, 217, 12, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(5, 4, '', 0, 0); //space old
$pdf->Rect(48, 217, 11, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(59, 217, 12, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(71, 217, 9, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(5, 4, '', 0, 0); //space old
$pdf->Rect(80, 217, 9, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(89, 217, 10, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(99, 217, 10, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(109, 217, 9, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(118, 217, 8, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(126, 217, 9, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(135, 217, 9, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(144, 217, 8, 5); //box
$pdf->Cell(6.5, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(152, 217, 8, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(160, 217, 9, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(169, 217, 10, 5); //box
$pdf->Cell(8, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(179, 217, 7.5, 5); //box
$pdf->Cell(1, 4, '', 0, 0); //space
$pdf->Cell(6, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(187, 217, 7, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(2, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(194, 217, 7, 5); //box
$pdf->Cell(6, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(201, 217, 9, 5); //box
$pdf->Cell(8, 5, '', 0, 1, 'C'); //DATA
// --------------------------------
$pdf->SetFont('Arial', '', '9');
$pdf->Rect(5, 222, 31, 5); //box
$pdf->Cell(30, 4, 'PSYCHOLOGY', 0, 0, 'C');
$pdf->SetTextColor(0, 0, 0);
$pdf->Rect(36, 222, 12, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(5, 4, '', 0, 0); //space old
$pdf->Rect(48, 222, 11, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(59, 222, 12, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(71, 222, 9, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(5, 4, '', 0, 0); //space old
$pdf->Rect(80, 222, 9, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(89, 222, 10, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(99, 222, 10, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(109, 222, 9, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(118, 222, 8, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(126, 222, 9, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(135, 222, 9, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(144, 222, 8, 5); //box
$pdf->Cell(6.5, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(152, 222, 8, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(160, 222, 9, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(169, 222, 10, 5); //box
$pdf->Cell(8, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(179, 222, 7.5, 5); //box
$pdf->Cell(1, 4, '', 0, 0); //space
$pdf->Cell(6, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(187, 222, 7, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(2, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(194, 222, 7, 5); //box
$pdf->Cell(6, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(201, 222, 9, 5); //box
$pdf->Cell(8, 5, '', 0, 1, 'C'); //DATA
// --------------------------------
$pdf->SetFont('Arial', '', '9');
$pdf->Rect(5, 227, 31, 5); //box
$pdf->Cell(30, 4, 'TCP', 0, 0, 'C');
$pdf->SetTextColor(0, 0, 0);
$pdf->Rect(36, 227, 12, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(5, 4, '', 0, 0); //space old
$pdf->Rect(48, 227, 11, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(59, 227, 12, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(71, 227, 9, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(5, 4, '', 0, 0); //space old
$pdf->Rect(80, 227, 9, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(89, 227, 10, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(99, 227, 10, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(109, 227, 9, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(118, 227, 8, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(126, 227, 9, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(135, 227, 9, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(144, 227, 8, 5); //box
$pdf->Cell(6.5, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(152, 227, 8, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(160, 227, 9, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(169, 227, 10, 5); //box
$pdf->Cell(8, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(179, 227, 7.5, 5); //box
$pdf->Cell(1, 4, '', 0, 0); //space
$pdf->Cell(6, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(187, 227, 7, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(2, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(194, 227, 7, 5); //box
$pdf->Cell(6, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(201, 227, 9, 5); //box
$pdf->Cell(8, 5, '', 0, 1, 'C'); //DATA
// ------------------------------------------ SUBTOTAL
$pdf->SetFillColor(245, 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Rect(5, 232, 31, 5); //box
$pdf->Cell(30, 4, 'SUB-TOTAL', 0, 0, 'C', true);
$pdf->SetTextColor(0, 0, 0);
$pdf->Rect(36, 232, 12, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(5, 4, '', 0, 0); //space old
$pdf->Rect(48, 232, 11, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(59, 232, 12, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(71, 232, 9, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(5, 4, '', 0, 0); //space old
$pdf->Rect(80, 232, 9, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(89, 232, 10, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(99, 232, 10, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(109, 232, 9, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(118, 232, 8, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(126, 232, 9, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(135, 232, 9, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(144, 232, 8, 5); //box
$pdf->Cell(6.5, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(152, 232, 8, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(160, 232, 9, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(169, 232, 10, 5); //box
$pdf->Cell(8, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(179, 232, 8, 5); //box
$pdf->Cell(1, 4, '', 0, 0); //space
$pdf->Cell(6, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(187, 232, 7, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(2, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(194, 232, 7, 5); //box
$pdf->Cell(6, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(201, 232, 9, 5); //box
$pdf->Cell(8, 5, '', 0, 1, 'C'); //DATA
//-------- grad tab
$pdf->SetFillColor(30, 144, 255);
$pdf->SetFont('Arial', '', '8.5');
$pdf->Rect(5, 237, 31, 5); //box
$pdf->Cell(30, 4, 'GRADUATE SCHOOL', 0, 0, 'C', true);
$pdf->SetFont('Arial', '', '9');
$pdf->SetTextColor(0, 0, 0);
$pdf->Rect(36, 237, 12, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(5, 4, '', 0, 0); //space old
$pdf->Rect(48, 237, 11, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(59, 237, 12, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(71, 237, 9, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(5, 4, '', 0, 0); //space old
$pdf->Rect(80, 237, 9, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(89, 237, 10, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(99, 237, 10, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(109, 237, 9, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(118, 237, 8, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(126, 237, 9, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(135, 237, 9, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(144, 237, 8, 5); //box
$pdf->Cell(6.5, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(152, 237, 8, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(160, 237, 9, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(169, 237, 10, 5); //box
$pdf->Cell(8, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(179, 237, 8, 5); //box
$pdf->Cell(1, 4, '', 0, 0); //space
$pdf->Cell(6, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(187, 237, 7, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(2, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(194, 237, 7, 5); //box
$pdf->Cell(6, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(201, 237, 9, 5); //box
$pdf->Cell(8, 5, '', 0, 1, 'C'); //DATA
//
//$pdf->SetFillColor(173, 216,230);
$pdf->SetFont('Arial', '', '8.5');
$pdf->Rect(5, 242, 31, 5); //box
$pdf->Cell(30, 4, 'MAED', 0, 0, 'C',);
$pdf->SetFont('Arial', '', '9');
$pdf->SetTextColor(0, 0, 0);
$pdf->Rect(36, 242, 12, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(5, 4, '', 0, 0); //space old
$pdf->Rect(48, 242, 11, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(59, 242, 12, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(71, 242, 9, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(5, 4, '', 0, 0); //space old
$pdf->Rect(80, 242, 9, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(89, 242, 10, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(99, 242, 10, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(109, 242, 9, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(118, 242, 8, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(126, 242, 9, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(135, 242, 9, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(144, 242, 8, 5); //box
$pdf->Cell(6.5, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(152, 242, 8, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(160, 242, 9, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(169, 242, 10, 5); //box
$pdf->Cell(8, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(179, 242, 8, 5); //box
$pdf->Cell(1, 4, '', 0, 0); //space
$pdf->Cell(6, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(187, 242, 7, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(2, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(194, 242, 7, 5); //box
$pdf->Cell(6, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(201, 242, 9, 5); //box
$pdf->Cell(8, 5, '', 0, 1, 'C'); //DATA
//
$pdf->SetFont('Arial', '', '9');
$pdf->Rect(5, 247, 31, 5); //box
$pdf->Cell(30, 4, 'MBA', 0, 0, 'C');
$pdf->SetFont('Arial', '', '9');
$pdf->SetTextColor(0, 0, 0);
$pdf->Rect(36, 247, 12, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(5, 4, '', 0, 0); //space old
$pdf->Rect(48, 247, 11, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(59, 247, 12, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(71, 247, 9, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(5, 4, '', 0, 0); //space old
$pdf->Rect(80, 247, 9, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(89, 247, 10, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(99, 247, 10, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(109, 247, 9, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(118, 247, 8, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(126, 247, 9, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(135, 247, 9, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(144, 247, 8, 5); //box
$pdf->Cell(6.5, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(152, 247, 8, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(160, 247, 9, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(169, 247, 10, 5); //box
$pdf->Cell(8, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(179, 247, 8, 5); //box
$pdf->Cell(1, 4, '', 0, 0); //space
$pdf->Cell(6, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(187, 247, 7, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(2, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(194, 247, 7, 5); //box
$pdf->Cell(6, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(201, 247, 9, 5); //box
$pdf->Cell(8, 5, '', 0, 1, 'C'); //DATA
//
$pdf->SetFont('Arial', '', '9');
$pdf->Rect(5, 252, 31, 5); //box
$pdf->SetFillColor(245, 0, 0);
$pdf->Cell(30, 4, 'Sub-Total', 0, 0, 'C', true);
$pdf->SetFont('Arial', '', '9');
$pdf->SetTextColor(0, 0, 0);
$pdf->Rect(36, 252, 12, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(5, 4, '', 0, 0); //space old
$pdf->Rect(48, 252, 11, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(59, 252, 12, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(71, 252, 9, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(5, 4, '', 0, 0); //space old
$pdf->Rect(80, 252, 9, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(89, 252, 10, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(99, 252, 10, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(109, 252, 9, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(118, 252, 8, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(126, 252, 9, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(135, 252, 9, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(144, 252, 8, 5); //box
$pdf->Cell(6.5, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(152, 252, 8, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(160, 252, 9, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(169, 252, 10, 5); //box
$pdf->Cell(8, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(179, 252, 8, 5); //box
$pdf->Cell(1, 4, '', 0, 0); //space
$pdf->Cell(6, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(187, 252, 7, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(2, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(194, 252, 7, 5); //box
$pdf->Cell(6, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(201, 252, 9, 5); //box
$pdf->Cell(8, 5, '', 0, 1, 'C'); //DATA
// total table ---------------------
$pdf->SetFont('Arial', '', '8.5');
$pdf->Rect(5, 257, 31, 5); //box
$pdf->SetFillColor(255, 215, 0);
$pdf->Cell(30, 4, 'TOTAL', 0, 0, 'C', true);
$pdf->SetFont('Arial', '', '9');
$pdf->SetTextColor(0, 0, 0);
$pdf->Rect(36, 257, 12, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(5, 4, '', 0, 0); //space old
$pdf->Rect(48, 257, 11, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(59, 257, 12, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(71, 257, 9, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(5, 4, '', 0, 0); //space old
$pdf->Rect(80, 257, 9, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(89, 257, 10, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(99, 257, 10, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(109, 257, 9, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(118, 257, 8, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(126, 257, 9, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(135, 257, 9, 5); //box
$pdf->Cell(9, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(144, 257, 8, 5); //box
$pdf->Cell(6.5, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(152, 257, 8, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(3, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(160, 257, 9, 5); //box
$pdf->Cell(7, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(169, 257, 10, 5); //box
$pdf->Cell(8, 5, '', 0, 0, 'C'); //DATA
//
$pdf->Rect(179, 257, 8, 5); //box
$pdf->Cell(1, 4, '', 0, 0); //space
$pdf->Cell(6, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(187, 257, 7, 5); //box
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(1, 4, '', 0, 0); //space bf
$pdf->Cell(2, 5, '', 0, 0, 'C'); //DATA
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(3, 4, '', 0, 0); //space old
$pdf->Rect(194, 257, 7, 5); //box
$pdf->Cell(6, 5, '', 0, 0, 'C'); //DATA
$pdf->Cell(2, 4, '', 0, 0); //space tol
$pdf->Rect(201, 257, 9, 5); //box
$pdf->Cell(8, 5, '', 0, 1, 'C'); //DATA


$pdf->Ln(2);
$pdf->SetFont('Arial', 'B', '9');
$pdf->SetTextColor(255, 0, 0);
$pdf->Cell(10, 4, '', 0, 0); //space tol
$pdf->Cell(15, 4, ' *NOTES / REMARKS', 0, 0, 'C');

$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(145, 4, '', 0, 0); //space tol
$pdf->Cell(8, 5, 'Email (Jpeg file) REPORT to: ', 0, 1, 'C');

$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(40, 3, '', 0, 0); //space 
$pdf->Cell(8, 4, '', 0, 0, 'C'); // data for REMARKS
$pdf->Cell(115, 3, '', 0, 0); //space 
$pdf->Cell(8, 4, '', 0, 1, 'C'); // data for REPORT TO
$pdf->Rect(35, 278, 115, 0); // line
$pdf->Cell(33, 3, '', 0, 0); //space 
$pdf->Cell(8, 4, '', 0, 0, 'C'); // data for REMARKS
$pdf->Cell(122, 3, '', 0, 0); //space 
$pdf->Cell(8, 4, '', 0, 1, 'C'); // data for REPORT TO

$pdf->Rect(35, 282, 115, 0); // line
$pdf->Cell(33, 3, '', 0, 0); //space 
$pdf->Cell(8, 4, '', 0, 0, 'C'); // data for REMARKS
$pdf->Cell(129, 3, '', 0, 0); //space 
$pdf->Cell(8, 4, '', 0, 1, 'C'); // data for REPORT TO
$pdf->Rect(35, 286, 115, 0); // line
$pdf->Cell(33, 3, '', 0, 0); //space 
$pdf->Cell(8, 4, '', 0, 0, 'C'); // data for REMARKS
$pdf->Cell(124, 3, '', 0, 0); //space 
$pdf->Cell(8, 4, '', 0, 1, 'C'); // data for REPORT TO
$pdf->Cell(33, 3, '', 0, 0); //space 
$pdf->Cell(8, 4, '', 0, 0, 'C');
$pdf->Cell(120, 3, '', 0, 0); //space 
$pdf->Cell(8, 4, '', 0, 1, 'C'); // data for REPORT TO

$pdf->Ln(1);
$pdf->SetFont('Arial', 'B', '9');
$pdf->Cell(5, 2, '', 0, 0); //space tol
$pdf->Cell(15, 2, ' PREPARED BY:', 0, 0, 'C');
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(150, 4, '', 0, 0); //space tol
$pdf->Cell(8, 5, 'Private Message / Messenger', 0, 1, 'C');
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial', 'B', '9');
$pdf->Cell(40, 3, '', 0, 0); //space 
$pdf->Cell(8, 4, '', 0, 0, 'C'); // data for admission office
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(115, 3, '', 0, 0); //space 
$pdf->Cell(8, 4, '', 0, 1, 'C'); // data for messenger
$pdf->Cell(40, 3, '', 0, 0); //space 
$pdf->Cell(8, 4, 'Admission office', 0, 0, 'C');
$pdf->Cell(115, 3, '', 0, 0); //space 
$pdf->Cell(8, 4, '', 0, 1, 'C'); // data for  messenger
$pdf->Rect(30, 300, 40, 0); // line between admissin
$pdf->Cell(33, 3, '', 0, 0); //space 
$pdf->Cell(8, 4, '', 0, 0,);
$pdf->Cell(129, 3, '', 0, 0); //space 
$pdf->Cell(8, 4, '', 0, 1, 'C'); // data for messenger
$pdf->Cell(165, 3, '', 0, 0); //space 
$pdf->Cell(8, 4, '', 0, 1, 'C'); // data for messenger

$pdf->SetFont('Arial', 'B', '9');
$pdf->Cell(2, 2, '', 0, 0); //space tol
$pdf->Cell(15, 2, ' NOTED BY:', 0, 1, 'C');
$pdf->Cell(40, 3, '', 0, 0); //space 
$pdf->Cell(8, 4, '', 0, 1, 'C'); // data for  immediate head 
$pdf->Rect(30, 318, 40, 0); // line between immediate head
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(90, 4, 'Immediate Head', 0, 0, 'C');

$pdf->Output();