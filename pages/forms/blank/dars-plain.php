<?php
require ('../fpdf/fpdf.php');




class PDF extends FPDF
{

// Page header

}

$pdf = new PDF('L','mm',array(165,139));


$pdf->SetLeftMargin(13);
$pdf->SetRightMargin(10);
$pdf->SetAutoPageBreak(true, 8);
$pdf ->AddPage();




    // Logo(x axis, y axis, height, width)
    $pdf->Image('../../assets/img/logo.png',33,9,10,10);
    // text color
    $pdf->SetTextColor(255,0,0);
    // font(font type,style,font size)
    $pdf->SetFont('Arial','B',11);
    // Dummy cell
    // //cell(width,height,text,border,end line,[align])
    $pdf->Cell(151,5,'SAINT FRANCIS OF ASSISI COLLEGE',0,1,'C');
    // Line break
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',11,'C');
    // dummy cell
    // //cell(width,height,text,border,end line,[align])
    $test = utf8_decode("Piñas");
    $pdf->Cell(151,5,'Las ' .$test. '- Taguig - Cavite - Alabang - Laguna',0,1,'C');
    // Line break
    $pdf->Ln(2);
    $pdf->SetFont('Arial','',11);
    // dummy cell
    // //cell(width,height,text,border,end line,[align])
    $pdf->Cell(13,4,'Name:',0,0);
    $pdf->Cell(35,4,'','B',0,'C');
    $pdf->Cell(35,4,'','B',0,'C');
    $pdf->Cell(35,4,'','B',0,'C');
    $pdf->Cell(5);
    $pdf->Cell(0,4,'','B',1,'C');

    $pdf->Ln(1);
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(13,3,'',0,0);
    $pdf->Cell(35,3,'(Family Name)',0,0,'C');
    $pdf->Cell(35,3,'(First Name)',0,0,'C');
    $pdf->Cell(35,3,'(Middle Name)',0,0,'C');
    $pdf->Cell(5);
    $pdf->Cell(0,3,'Gender',0,1,'C');

    $pdf->Ln(1);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(18,4,'Student No.',0,0);
    $pdf->Cell(23,4,'','B',0,'C');
    $pdf->Cell(2);
    $pdf->Cell(20,4,'School Year:',0,0);
    $pdf->Cell(20,4,'','B',0,'C');
    $pdf->Cell(2);
    $pdf->Cell(10,4,'Date:',0,0);
    $pdf->Cell(20,4,'','B',0,'C');
    $pdf->Cell(5);
    $pdf->Cell(0,4,'Sem/Term:',0,1);

    $pdf->SetFont('Arial','',8);
    $pdf->Cell(120,4,'',0,0);
    $pdf->Cell(3,3,'',1,0,'C');
    $pdf->Cell(0,3,'1st Semester',0,1);

    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(30,6,'COURSE:','T,L,B',0);
    $pdf->Cell(85,6,'','T,R,B',0,'C');
    $pdf->Cell(5);
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(3,3,'',1,0,'C');
    $pdf->Cell(0,3,'2nd Semester',0,1);

    $pdf->Cell(115,3,'',0,0,'C');
    $pdf->Cell(5);
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(3,3,'',1,0,'C');
    $pdf->Cell(0,3,'Summer',0,1);

    $pdf->Ln(4);
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(40,4,'COURSE NUMBER','T,L',0,'C');
    $pdf->Cell(15,7,'Units','T,L,B',0,'C');
    $pdf->Cell(15,7,'Days','T,L,B',0,'C');
    $pdf->Cell(15,7,'Time','T,L,B',0,'C');
    $pdf->Cell(10,7,'Room','T,L,R,B',0,'C');
    $pdf->Cell(17,4,'Final','T',0,'C');
    $pdf->Cell(0,7,'Professor',1,0,'C');
    $pdf->Cell(0,4,'',0,1);

    $pdf->Cell(40,3,'(SUBJECTS)','L,B',0,'C');
    $pdf->Cell(55,3,'',0,0);
    $pdf->Cell(17,3,'Rating','B',0,'C');


//SUBJECT LIST HERE
    $pdf->Rect(13,55,40,50);
    $pdf->Rect(68,55,15,50);
    $pdf->Rect(98,55,10,50);
    $pdf->Rect(125,55,30,50);

    $pdf->SetXY(13,100);
    $pdf->Cell(0,1,'',1,0);

    $pdf->SetXY(13,105);
    $pdf->Cell(18,4.5,'No. of class','L,T',0,'C');
    $pdf->Cell(15,8,'',1,0,'C');
    $pdf->Cell(15,4.5,'Total','T',0,'C');
    $pdf->Cell(15,4.5,'Total Fees','L,T',0,'C');
    $pdf->Cell(40,4.5,'Adviser\'s Signature','R,L,T',0,'C');
    $pdf->Cell(0,4.5,'VERIFIED BY:','R,T',1,'C');

    $pdf->Cell(18,3.5,'cards issued:','L,B',0,'C');
    $pdf->Cell(15,3.5,'',0,0,'C');
    $pdf->Cell(15,3.5,'Units/Load','B',0,'C');
    $pdf->Cell(15,3.5,'(PhP)','L,B',0,'C');
    $pdf->Cell(40,3.5,'Over Printed Name','R,L',0,'C');
    $pdf->Cell(0,3.5,'','R',1,'C');

    $pdf->Cell(18,7,'cards issued:','L,B',0,'C');
    $pdf->Cell(15,7,'','B,L,R',0,'C');
    $pdf->Cell(15,7,'','B',0,'C');
    $pdf->Cell(15,7,'','L,B',0,'C');
    $pdf->Cell(40,7,'Raquel C. Carolino','R,L,B',0,'C');
    $pdf->Cell(0,4,'','R',1,'C');

    $pdf->Cell(103);
    $pdf->Cell(0,3,'Dean/Chairperson','R,B',1,'C');

    $pdf->Ln(3);
    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(100,8,'DEAN\'S COPY',0,0,'C');

    $pdf->SetFont('Arial','B',10);
    $pdf ->Cell(1 ,4,'',0,0);
    $pdf->Cell(15,8,'Academics.',0,0,'');
    $pdf->SetTextColor(255,0,0);
    $pdf->SetFont('Arial','BI',10);
    $pdf ->Cell(5 ,4,'',0,0);
    $pdf->Cell(15,8,'And beyond',0,0,'');



    $pdf->SetLeftMargin(13);
    $pdf->SetRightMargin(10);
    $pdf->SetAutoPageBreak(true, 8);
    $pdf ->AddPage();

    // Logo(x axis, y axis, height, width)
    $pdf->Image('../../assets/img/logo.png',33,9,10,10);
    // text color
    $pdf->SetTextColor(255,0,0);
    // font(font type,style,font size)
    $pdf->SetFont('Arial','B',11);
    // Dummy cell
    // //cell(width,height,text,border,end line,[align])
    $pdf->Cell(151,5,'SAINT FRANCIS OF ASSISI COLLEGE',0,1,'C');
    // Line break
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',11,'C');
    // dummy cell
    // //cell(width,height,text,border,end line,[align])
    $test = utf8_decode("Piñas");
    $pdf->Cell(151,5,'Las ' .$test. '- Taguig - Cavite - Alabang - Laguna',0,1,'C');
    // Line break
    $pdf->Ln(2);
    $pdf->SetFont('Arial','',11);
    // dummy cell
    // //cell(width,height,text,border,end line,[align])
    $pdf->Cell(13,4,'Name:',0,0);
    $pdf->Cell(35,4,'','B',0,'C');
    $pdf->Cell(35,4,'','B',0,'C');
    $pdf->Cell(35,4,'','B',0,'C');
    $pdf->Cell(5);
    $pdf->Cell(0,4,'','B',1,'C');

    $pdf->Ln(1);
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(13,3,'',0,0);
    $pdf->Cell(35,3,'(Family Name)',0,0,'C');
    $pdf->Cell(35,3,'(First Name)',0,0,'C');
    $pdf->Cell(35,3,'(Middle Name)',0,0,'C');
    $pdf->Cell(5);
    $pdf->Cell(0,3,'Gender',0,1,'C');

    $pdf->Ln(1);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(18,4,'Student No.',0,0);
    $pdf->Cell(23,4,'','B',0,'C');
    $pdf->Cell(2);
    $pdf->Cell(20,4,'School Year:',0,0);
    $pdf->Cell(20,4,'','B',0,'C');
    $pdf->Cell(2);
    $pdf->Cell(10,4,'Date:',0,0);
    $pdf->Cell(20,4,'','B',0,'C');
    $pdf->Cell(5);
    $pdf->Cell(0,4,'Sem/Term:',0,1);

    $pdf->SetFont('Arial','',8);
    $pdf->Cell(120,4,'',0,0);
    $pdf->Cell(3,3,'',1,0,'C');
    $pdf->Cell(0,3,'1st Semester',0,1);

    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(20,6,'COURSE:',1,0);
    $pdf->Cell(70,6,'','T,R,B',0,'C');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(25,3,'Year Level','T,R,B',0,'C');
    $pdf->Cell(5);
    $pdf->Cell(3,3,'',1,0,'C');
    $pdf->Cell(0,3,'2nd Semester',0,1);

    $pdf->Cell(90,3,'',0,0,'C');
    $pdf->Cell(25,3,'','R,B',0,'C');
    $pdf->Cell(5);
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(3,3,'',1,0,'C');
    $pdf->Cell(0,3,'Summer',0,1);

    $pdf->Ln(1);
    $pdf->SetFont('Arial','',7);
    $pdf->Cell(37,0.5,'','T,L,R',0,'C');
    $pdf->Cell(15,0.5,'','T,L,R',0,'C');
    $pdf->Cell(15,0.5,'','T,L,R',0,'C');
    $pdf->Cell(15,0.5,'','T,L,R',0,'C');
    $pdf->Cell(20,0.5,'','T,L,R',0,'C');
    $pdf->Cell(20,0.5,'','T,L,R',0,'C');
    $pdf->Cell(20,0.5,'','T,L,R',1,'C');

    $pdf->Cell(37,3,'COURSE NUMBER','L,R',0,'C');
    $pdf->Cell(15,6,'DAYS','L,R,B',0,'C');
    $pdf->Cell(15,6,'TIME','L,R,B',0,'C');
    $pdf->Cell(15,6,'ROOM','L,R,B',0,'C');
    $pdf->Cell(20,3,'FEES','L,R,B',0,'C');
    $pdf->Cell(20,3,'Amount','L,R,B',0,'C');
    $pdf->Cell(20,3,'Adj. Amt.','L,R,B',1,'C');

    $pdf->Cell(37,3,'(SUBJECTS)','L,R,B',0,'C');
    $pdf->Cell(45);
    $pdf->Cell(20,3,'Miscellaneous','L,R,B',0);
    $pdf->Cell(20,3,'','L,R,B',0);
    $pdf->Cell(20,3,'','L,R,B',1);

    $pdf->Rect(13,51.5,37,37);
    $pdf->Rect(50,51.5,15,37);
    $pdf->Rect(65,51.5,15,37);
    $pdf->Rect(80,51.5,15,37);

    $pdf->SetXY(95,51.5);
    $pdf->Cell(20,3,'Tuition','L,R,B',0);
    $pdf->Cell(20,3,'','L,R,B',0);
    $pdf->Cell(20,3,'','L,R,B',1);

    $pdf->SetX(95);
    $pdf->Cell(20,3,'Laboratory','L,R,B',0);
    $pdf->Cell(20,3,'','L,R,B',0);
    $pdf->Cell(20,3,'','L,R,B',1);

    $pdf->SetX(95);
    $pdf->Cell(20,3,'NSTP','L,R,B',0);
    $pdf->Cell(20,3,'','L,R,B',0);
    $pdf->Cell(20,3,'','L,R,B',1);

    $pdf->SetX(95);
    $pdf->Cell(20,3,'Other Fees','L,R,B',0);
    $pdf->Cell(20,3,'','L,R,B',0);
    $pdf->Cell(20,3,'','L,R,B',1);

    $pdf->SetX(95);
    $pdf->Cell(20,3,'TOTAL','L,R,B',0);
    $pdf->Cell(20,3,'','L,R,B',0);
    $pdf->Cell(20,3,'','L,R,B',1);


    $pdf->SetX(95);
    $pdf->SetFont('Arial','',5);
    $pdf->Cell(60,3,'ABOVE FEES SUBJECT TO CORRECTION','L,R',1,'C');

    $pdf->SetX(95);
    $pdf->Cell(60,3,'CHECK BASIS OF ASSESSMENT BELOW','L,R',1,'C');

    $pdf->SetX(95);
    $pdf->SetFont('Arial','',7);
    $pdf->Cell(15);
    $pdf->Cell(5,3,'',1,0,'C');
    $pdf->Cell(0,3,'Cash Basis',0,1);

    $pdf->SetX(95);
    $pdf->Cell(15);
    $pdf->Cell(5,3,'',1,0,'C');
    $pdf->Cell(0,3,'Installment Basis',0,1);

    $pdf->SetX(95);
    $pdf->SetFont('Arial','',6);
    $pdf->Cell(0,3,'Enrollment Good Only For This Semester',0,1,'C');

    $pdf->Rect(95,72.5,60,9);

    $pdf->SetXY(95,81.5);
    $pdf->SetFont('Arial','',7);
    $pdf->Cell(36,3.5,'Amount Paid','R',0);
    $pdf->Cell(24,3.5,'','R',1);
    
    $pdf->SetX(95);


    $pdf->Cell(36,3.5,'','R,B',0);
    $pdf->Cell(24,3.5,'Cashier','R,B',1,'C');

    $pdf->Cell(0,1,'',1,1);

    $pdf->Cell(22,3,'Checked by:','L',0,'C');
    $pdf->Cell(22,3,'Total Loads/Units','L',0,'C');
    $pdf->Cell(38,3,'Verified by:','L,R',1,'C');

    $pdf->Cell(22,3,'','L',0);
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(22,6,'','L',0,'C');
    $pdf->SetFont('Arial','',7);
    $pdf->Cell(38,3,'','L,R',1);

    $pdf->Cell(22,3,'Adviser','L',0,'C');
    $pdf->Cell(22);
    $pdf->Cell(38,3,'Dean/Chairperson','L,R',1,'C');

    $pdf->Cell(82,5,'CHANGE OF SUBJECT/LOAD',1,1,'C');

    $pdf->Cell(33,5,'Subject/s Added',1,0,'C');
    $pdf->Cell(8,5,'Units',1,0,'C');
    $pdf->Cell(33,5,'Subject/s Dropped',1,0,'C');
    $pdf->Cell(8,5,'Units',1,1,'C');

    $pdf->Cell(33,5,'',1,0,'C');
    $pdf->Cell(8,5,'',1,0,'C');
    $pdf->Cell(33,5,'',1,0,'C');
    $pdf->Cell(8,5,'',1,1,'C');

    $pdf->Cell(33,5,'',1,0,'C');
    $pdf->Cell(8,5,'',1,0,'C');
    $pdf->Cell(33,5,'',1,0,'C');
    $pdf->Cell(8,5,'',1,1,'C');

    $pdf->Cell(33,5,'',1,0,'C');
    $pdf->Cell(8,5,'',1,0,'C');
    $pdf->Cell(33,5,'',1,0,'C');
    $pdf->Cell(8,5,'',1,1,'C');

    $pdf->SetXY(95,90.5);
    $pdf->SetFont('Arial','B',7);
    $pdf->Cell(0,5,'ACCOUNTING STAMP & REMARKS',0,1);
    

    $pdf->Rect(95,89.5,60,34);

    $pdf->SetXY(13,123);

    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(100,8,'ACCOUNTING\'S COPY',0,0,'C');

    $pdf->SetFont('Arial','B',10);
    $pdf ->Cell(1 ,4,'',0,0);
    $pdf->Cell(15,8,'Academics.',0,0,'');
    $pdf->SetTextColor(255,0,0);
    $pdf->SetFont('Arial','BI',10);
    $pdf ->Cell(5 ,4,'',0,0);
    $pdf->Cell(15,8,'And beyond',0,1,'');

$pdf->SetLeftMargin(4);
$pdf->SetRightMargin(10);
$pdf->SetAutoPageBreak(true, 8);
$pdf ->AddPage();
$pdf->SetTextColor(1,0,0);

    // font(font type,style,font size)
    $pdf->SetFont('Arial','B',10);
    // Dummy cell
    $pdf->Cell(49,5,'',0,0);
    // //cell(width,height,text,border,end line,[align])
    $pdf->Cell(70,5,'SAINT FRANCIS OF ASSISI COLLEGE',0,1);
    // Line break
    $pdf->SetFont('Arial','',10,'C');
    // dummy cell
    $pdf->Cell(42,4,'',0,0);
    // //cell(width,height,text,border,end line,[align])
    $test = utf8_decode('Piñas');
    $pdf->Cell(80,4,'Las ' .$test. ' - Taguig - Cavite - Alabang - Laguna',0,0);
    // Line break
    $pdf->Ln(7);
   



//cell(width,height,text,border,end line,[align])
// $pdf->Image('../../img/deptevaluator.png',5.5,60,5,37);
$pdf->Image('../../assets/img/logo.png',33,9,10,10);
$pdf ->Cell(7,76.5,'',1,0);     
$pdf ->Cell(13 ,5,' Name:',0,0); 
$pdf->SetFont('Arial','B','10');
$pdf ->Cell(110 ,5,'','B',0); //end of line

$pdf->SetFont('Arial','','10');
$pdf ->Cell(2 ,5,' ',0,0);

$pdf ->Cell(0 ,5,'','B',1); //end of line

//dummy cells
$pdf ->Cell(27 ,5,'',0,0);
$pdf->SetFont('Arial','','8');
$pdf ->Cell(35 ,3,'(Family Name)',0,0);
$pdf ->Cell(35 ,3,'(First Name)',0,0,'C');
$pdf ->Cell(35 ,3,'(Middle Name)',0,0,'C');
$pdf ->Cell(20 ,3,'Gender',0,1,'C');
$pdf->Ln(2);
$pdf->SetFont('Arial','','9');
$pdf ->Cell(8 ,5,'',0,0);
$pdf ->Cell(15 ,3,'Student No.',10,0);
$pdf ->Cell(5,3,'',0,0);
$pdf ->Cell(22,3,'','B',0);
$pdf ->Cell(18 ,3,'School Year:',0,0);
$pdf ->Cell(5,3,'',0,0);
$pdf ->Cell(20,3,'','B',0);
$pdf ->Cell(5 ,3,'Date:',0,0);
$pdf ->Cell(5,3,'',0,0);
$pdf ->Cell(20,3,'','B',0);
$pdf ->Cell(15 ,3,'Sem/Term:',0,1);

$pdf ->Cell(129,3,'',0,0);
$pdf ->Cell(3,3,'',1,0);
$pdf->SetFont('Arial','','8');
$pdf ->Cell(0,3,'1st Semester',0,1);

//COURSE
$pdf ->Cell(9,6,'',0,0);
$pdf->SetFont('Arial','B','10');
$pdf ->Cell(55,6,'COURSE','L,B,T',0);
$pdf ->Cell(59,6,'','B,T,R',0);

$pdf ->Cell(6,6,'',0,0);
$pdf ->Cell(3,3,'',1,0);
$pdf->SetFont('Arial','','8');
$pdf ->Cell(0,3,'2nd Semester',0,1);
$pdf ->Cell(129,3,'',0,0);
$pdf ->Cell(3,3,'',1,0);
$pdf ->Cell(0,3,'3rd Semester',0,1);

$pdf ->Cell(0,3,'',0,1);
$pdf ->Cell(9,5,'',0,0);
$pdf ->Cell(44,4,'COURSE NUMBER','T,L,R',0,'C');
$pdf ->Cell(15,8,'Units',1,0,'C');
$pdf ->Cell(15,8,'Days',1,0,'C');
$pdf ->Cell(12.5,8,'Time',1,0,'C');
$pdf ->Cell(12.5,8,'Room',1,0,'C');
$pdf ->Cell(15,4,'Final','T',0,'C');
$pdf ->Cell(0,8,'Professor',1,0,'C');
$pdf ->Cell(0,4,'',0,1);
$pdf ->Cell(9,3,'',0,0);
$pdf ->Cell(44 ,4,'(SUBJECTS)','L,B',0,'C');
$pdf ->Cell(55,4,'',0,0);
$pdf ->Cell(15,4,'Rating','L,B',1,'C');
$pdf ->Cell(9,3,'',0,0);
$pdf ->Cell(44,42.5,'',1,0);
$pdf ->Cell(15,42.5,'',1,0);
$pdf ->Cell(15,42.5,'',1,0);
$pdf ->Cell(12.5,42.5,'',1,0);
$pdf ->Cell(12.5,42.5,'',1,0);
$pdf ->Cell(15,42.5,'',1,0);
$pdf ->Cell(0,42.5,'',1,1);
$pdf ->Cell(9,1,'',0,0);
$pdf ->Cell(0,1,'',1,1);

$pdf ->Cell(0,5,'ENROLLMENT GOOD FOR THIS SEMESTER',0,1,'C');

$pdf ->Cell(24,3.5,'No. of Class','L,T,R',0,'C');
$pdf ->Cell(15,7,'',1,0,'C');
$pdf ->Cell(22,3.5,'Total','L,T,R',0,'C');
$pdf ->Cell(42,3.5,'Checked by (Enrolling Adviser)','L,T,R',0,'L');
$pdf ->Cell(0,3.5,'APPROVED BY:','L,T,R',1,'C');
$pdf ->Cell(24,3.5,'cards issued','L,B,R',0,'C');
$pdf ->Cell(15,7,'',0,0,'C');
$pdf ->Cell(22,3.5,'Units/Loads','L,B,R',0,'C');
$pdf ->Cell(42,3.5,'','L,B,R',0,'C');
$pdf ->Cell(0,3.5,'','L,R',1,'C');

$pdf ->Cell(24,7,'Issued by:','1',0,'C');
$pdf ->Cell(15,7,'',1,0,'C');
$pdf ->Cell(22,7,'',1,0,'C');
$pdf ->Cell(42,3.5,'Verified by: (Dean)','L,T,R',0,'L');
$pdf ->Cell(0,3.5,'','L,R',1,'C');

$pdf ->Cell(61,7,'',0,0,'C');
$pdf ->Cell(42,3.5,'','L,B,R',0,'C');
$pdf ->Cell(0,3.5,'OIC, Registrar','L,B,R',1,'C');

$pdf ->Cell(0,5,'',0,1);
$pdf ->SetFont('Arial','B',12);
$pdf ->Cell(100,5,'REGISTRAR\'S COPY',0,0,'C');

    $pdf->SetFont('Arial','B',10);
    $pdf ->Cell(1 ,4,'',0,0);
    $pdf->Cell(15,8,'Academics.',0,0,'');
    $pdf->SetTextColor(255,0,0);
    $pdf->SetFont('Arial','BI',10);
    $pdf ->Cell(5 ,4,'',0,0);
    $pdf->Cell(15,8,'And beyond',0,1,'');



$pdf->SetLeftMargin(4);
$pdf->SetRightMargin(10);
$pdf->SetTopMargin(8);
$pdf->SetAutoPageBreak(true, 8);
$pdf ->AddPage();

    // Logo(x axis, y axis, height, width)
    $pdf->Image('../../assets/img/logo.png',31,10,8,8);
    // text color
    $pdf->SetTextColor(255,0,0);
    // font(font type,style,font size)
    $pdf->SetFont('Arial','B',10);
    // Dummy cell
    $pdf->Cell(36);
    // //cell(width,height,text,border,end line,[align])
    $pdf->Write(10,'SAINT FRANCIS OF ASSISI COLLEGE');
    // Line break
    $pdf->Ln(5);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',10,'C');
    // dummy cell
    $pdf->Cell(33,10,'',0,0);
    // //cell(width,height,text,border,end line,[align])
    $test = utf8_decode('Piñas');
    $pdf->Write(13,'Las ' .$test. '- Taguig - Cavite - Alabang - Laguna');
    // Line break
    $pdf->Ln(7);
   



//cell(width,height,text,border,end line,[align])
//student name
$pdf ->Cell(15 ,5,'Name:',0,0); 
$pdf->SetFont('Arial','B','10');
$pdf ->Cell(110 ,5,'','B',0); //end of line

$pdf->SetFont('Arial','','10');
$pdf ->Cell(5 ,5,' ',0,0);

$pdf ->Cell(15 ,5,'','B',0); //end of line

//dummy cells
$pdf ->Cell(20 ,5,'',0,1);
$pdf ->Cell(20 ,5,'',0,0);

$pdf->SetFont('Arial','','8');
$pdf ->Cell(35 ,3,'(Family Name)',0,0);
$pdf ->Cell(35 ,3,'(First Name)',0,0,'C');
$pdf ->Cell(33 ,3,'(Middle Name)',0,0,'C');
$pdf ->Cell(30 ,3,'Gender',0,1,'C');
$pdf ->Cell(15 ,3,'Student No.',10,0);
$pdf ->Cell(5,3,'',0,0);
$pdf ->Cell(30,3,'','B',0);
$pdf ->Cell(15 ,3,'School Year:',0,0);
$pdf ->Cell(5,3,'',0,0);
$pdf ->Cell(20,3,'','B',0);
$pdf ->Cell(5 ,3,'Date:',0,0);
$pdf ->Cell(5,3,'',0,0);
$pdf ->Cell(20,3,'','B',0);
$pdf ->Cell(15 ,3,'Sem/Term:',0,1);
$pdf ->Cell(126 ,3,'1. Subjects below with erasures of alterations will not be honored and no class card will be issued.',0,0);
$pdf ->Cell(1,3,'',0,0);
$pdf ->Cell(3,3,'',1,0);
$pdf ->Cell(5,3,'1st Semester',0,1);
$pdf ->Cell(126 ,3,'2. For closed or dissolved sections, secure the form from the Registrar\'s office for proper adjustment.',0,0);
$pdf ->Cell(1,3,'',0,0);
$pdf ->Cell(3,3,'',1,0);
$pdf ->Cell(5,3,'2nd Semester',0,1);
$pdf ->Cell(126 ,3,'3. Submit your class card when you report to class and present the CE to your prof ./Inst. for initial.',0,0);
$pdf ->Cell(1,3,'',0,0);
$pdf ->Cell(3,3,'',1,0);
$pdf ->Cell(5,3,'Summer',0,1);
$pdf ->Cell(0,1,'',1,1);

$linebreak = '\n';
$pdf ->Cell(53,4,'COURSE NUMBER','L',0,'C');
$pdf ->Cell(15,8,'Units',1,0,'C');
$pdf ->Cell(15,8,'Days',1,0,'C');
$pdf ->Cell(12.5,8,'Time',1,0,'C');
$pdf ->Cell(12.5,8,'Room',1,0,'C');
$pdf ->Cell(15,4,'Final',0,0,'C');
$pdf ->Cell(28,8,'Professor',1,0,'C');
$pdf ->Cell(0,4,'',0,1);
$pdf ->Cell(53,4,'(SUBJECTS)','L,B',0,'C');
$pdf ->Cell(15,4,'',0,0);
$pdf ->Cell(15,4,'',0,0);
$pdf ->Cell(12.5,4,'',0,0);
$pdf ->Cell(12.5,4,'',0,0);
$pdf ->Cell(15,4,'Rating','L,B',1,'C');

// x, y, width, height
// Rectangle Course Number
$pdf ->Rect(4,49,53,37);
// Rectangle units
$pdf ->Rect(57,49,15,37);
// Rectangle Days
$pdf ->Rect(72,49,15,37);
// Rectangle Time
$pdf ->Rect(87,49,12.5,37);
//rectangle room
$pdf ->Rect(99.5,49,12.5,37);
//rectangle final rating
$pdf ->Rect(112,49,15,37);
// rectangle professor
$pdf ->Rect(127,49,28,37);
$pdf ->Cell(0,37.5,'',1,1);
$pdf ->Cell(0,1,'',1,1);

$pdf -> SetFont('Arial','',6);
//number of class card
$pdf ->Rect(4,87.5,16,5);
$pdf ->MultiCell(17,2,'No of class cards issued:',0,'L');
$pdf ->Rect(20,87.5,15,5);
$pdf ->SetXY(4,92.5);
//issued by
$pdf ->SetFont('Arial','',5);
$pdf ->Cell(9,5,'Issued by:','1','1','L');
$pdf ->Rect(13,92.5,22,5);

//course
$pdf ->SetXY(35,87.5);
$pdf ->MultiCell(22,2,'Course',1,'C');
$pdf ->SetXY(35,89.5);
$pdf ->Cell(22,8,'',1,1);

//total units
$pdf ->SetXY(57,87.5);
$pdf ->Cell(15,2,'Total Units',1,0,'C');
$pdf ->SetXY(57,89.5);
$pdf ->Cell(15,8,'',1,0);


//Checked by:
$pdf ->SetXY(72,87.5);
$pdf ->Cell(22,2,'Checked by:',0,0,'C');
$pdf ->Cell(32,2.5,'Miscellaneous',1,0);
$pdf ->Cell(29,2.5,'',1,1);
$pdf ->SetXY(72,90);
$pdf ->Cell(22,6,'',0,0,'C');
$pdf ->Cell(32,2.5,'Tuition',1,0);
$pdf ->Cell(29,2.5,'',1,1);
$pdf ->SetXY(94,92.5);
$pdf ->Cell(32,2.5,'Laboratories',1,0);
$pdf ->Cell(29,2.5,'',1,1);
$pdf ->SetXY(72,95);
$pdf ->Cell(22,2,'',0,0,'C');
$pdf ->Cell(32,2.5,'NSTP',1,0);
$pdf ->Cell(29,2.5,'',1,1);
$pdf ->SetFont('Arial','',9);
$pdf ->Cell(90,5,'CHANGE OF SUBJECT(S)/LOAD',1,0,'C');
$pdf ->SetFont('Arial','',6);
$pdf ->Cell(32,2.5,'Other Fees',1,0);
$pdf ->Cell(29,2.5,'',1,1);
$pdf ->SetXY(94,100);
$pdf ->Cell(32,2.5,'TOTAL',1,0,'C');
$pdf ->Cell(29,2.5,'',1,1);

$pdf ->Cell(31,3,'Added',1,0,'C');
$pdf ->Cell(15,3,'Units',1,0,'C');
$pdf ->Cell(29,3,'Dropped',1,0,'C');
$pdf ->Cell(15,3,'Units',1,0,'C');

$pdf ->SetFont('Arial','',5);
$pdf ->Cell(61,3,'ABOVE FEES SUBJECT TO CORREECTION',1,1,'C');
$pdf ->Cell(31,3,'',1,0,'C');
$pdf ->Cell(15,3,'',1,0,'C');
$pdf ->Cell(29,3,'',1,0,'C');
$pdf ->Cell(15,3,'',1,0,'C');
$pdf ->Cell(61,3,'CHECK BASIS OF ASSESSMENT BELOW','R',1,'C');
$pdf ->Cell(31,3,'',1,0,'C');
$pdf ->Cell(15,3,'',1,0,'C');
$pdf ->Cell(29,3,'',1,0,'C');
$pdf ->Cell(15,3,'',1,0,'C');
$pdf ->Cell(12,3,'','R',0);
$pdf ->Cell(5,3,'',1,0);
$pdf ->SetFont('Arial','',8);
$pdf ->Cell(15,3,'Cash Basis',0,0,'L');
$pdf ->Cell(29,3,'','R',1,'C');
$pdf ->Cell(31,3,'',1,0,'C');
$pdf ->Cell(15,3,'',1,0,'C');
$pdf ->Cell(29,3,'',1,0,'C');
$pdf ->Cell(15,3,'',1,0,'C');
$pdf ->Cell(12,3,'','R',0);
$pdf ->Cell(5,3,'',1,0);
$pdf ->Cell(15,3,'Installment Basis',0,0,'L');
$pdf ->Cell(29,3,'','R',1,'C');
$pdf ->SetFont('Arial','',8);
$pdf ->Cell(46,3,'REMARKS','L',0,'C');
$pdf ->SetFont('Arial','',6);
$pdf ->Cell(22,3,'Student\'s','L',0,'L');
$pdf ->Cell(22,3,'Dean\'s','L,R',0,'L');
$pdf ->Cell(61,3,'Enrollment Good Only For This Semester','B,R',1,'C');
$pdf ->Cell(46,3,'','L',0,'C');
$pdf ->Cell(22,2.5,'Signature','L',0,'L');
$pdf ->Cell(22,2.5,'Signature','L,R',0,'L');
$pdf ->Cell(32,2.5,'Amount Paid','L,R',0,'L');
$pdf ->Cell(29,2.5,'','L,R',1,'L');
$pdf ->Cell(46,3,'','L,B',0,'C');
$pdf ->Cell(22,3,'','L,B',0,'L');
$pdf ->Cell(22,3,'','L,R,B',0,'L');
$pdf ->Cell(32,3, '' ,'L,R,B',0,'L');
$pdf ->Cell(29,3,'Cashier','L,R,B',1,'C');
$pdf ->SetFont('Arial','B',12);
$pdf ->Cell(100,5,'STUDENT\'S COPY',0,0,'C');

$pdf->SetFont('Arial','B',10);
    $pdf ->Cell(1 ,4,'',0,0);
    $pdf->Cell(15,8,'Academics.',0,0,'');
    $pdf->SetTextColor(255,0,0);
    $pdf->SetFont('Arial','BI',10);
    $pdf ->Cell(5 ,4,'',0,0);
    $pdf->Cell(15,8,'And beyond',0,1,'');
$pdf ->ln(5);


//left right top
$pdf->SetLeftMargin(4);
$pdf->SetRightMargin(10);
$pdf->SetAutoPageBreak(true, 8);
$pdf ->AddPage();
$pdf->SetTextColor(1,0,0);


$pdf ->SetFont('Arial','B',12);


$pdf ->Cell(0,5,'INFORMATION','B',1,'C');
$pdf ->SetFont('Arial','',8);
$pdf ->Cell(27,4,'NAME',0,0,'C');
$pdf ->Cell(27,4,'SURNAME',0,0,'C');
$pdf ->Cell(27,4,'FIRST NAME',0,0,'C');
$pdf ->Cell(27,4,'MIDDLE NAME','R',1,'C');
$pdf ->Cell(27,3,'','B',0,'C');
$pdf ->Cell(27,3,'','B',0,'C');
$pdf ->Cell(27,3,'','B',0,'C');
$pdf ->Cell(27,3,'','B',1,'C');
$pdf ->Cell(108,4,'Present Address',0,1,'L');
$pdf ->Cell(108,3,'','B',1,'C');
$pdf ->Cell(68,4,'Home Address','R',0,'L');
$pdf ->Cell(40,4,'Contact Number',0,1,'L');
$pdf ->Cell(68,3,'','R,B',0,'C');
$pdf ->Cell(40,3,'','B',1,'C');
$pdf ->Cell(16,4,'Age','R',0,'L');
$pdf ->Cell(22,4,'Gender','R',0,'L');
$pdf ->Cell(30,4,'Civil Status','R',0,'L');
$pdf ->Cell(40,4,'Nationality',0,1,'L');
$pdf ->Cell(16,3,'','R,B',0,'C');
$pdf ->Cell(22,3,'','R,B',0,'C');
$pdf ->Cell(30,3,'','R,B',0,'C');
$pdf ->Cell(40,3,'','B',1,'C');
$pdf ->Cell(68,4,'Place of Birth','R',0,'L');
$pdf ->Cell(40,4,'Date of Birth',0,1,'L');
$pdf ->Cell(68,3,'','R,B',0,'C');
$pdf ->Cell(40,3,'','B',1,'C');

$pdf ->Cell(45,4,'Religion','R',0,'L');
$pdf ->Cell(63,4,'Email Address',0,1,'L');
$pdf ->Cell(45,3,'','B,R',0,'C');
$pdf ->Cell(13,3,'','B',0,'C');
$pdf ->Cell(18,3,'','B',0,'C');
$pdf ->Cell(32,3,'','B',1,'C');
$pdf ->SetXY(112,15);
$pdf ->Cell(43,42,'2x2 ID Pic',1,1,'C');


$pdf ->Cell(68,4,'High School From Which Graduated','R',0,'L');
$pdf ->Cell(35,4,'Date','R',0,'L');
$pdf ->Cell(48,4,'ACR. No. (For Alien)','R',1,'L');

$pdf ->Cell(68,3,'','B,R',0,'C');
$pdf ->Cell(35,3,'','B,R',0,'C');
$pdf ->Cell(48,3,'','R',1,'C');


$pdf ->Cell(103,4,'School Last Attended','R',0,'L');
$pdf ->Cell(48,4,'','R',1,'L');

$pdf ->Cell(103,3,'','B,R',0,'C');
$pdf ->Cell(48,3,'','R',1,'C');

$pdf ->Cell(38,4,'How Supported','R',0,'L');
$pdf ->Cell(65,4,'Credential Submitted','R',0,'L');
$pdf ->Cell(48,4,'','R',1,'L');

$pdf ->Cell(38,3,'','B,R',0,'C');
$pdf ->Cell(7,3,'',1,0,'C');
$pdf ->Cell(15,3,'Form 138','B',0,'L');
$pdf ->Cell(6.5,3,'',1,0,'C');
$pdf ->Cell(15,3,'HD','B',0,'L');
$pdf ->Cell(6.5,3,'',1,0,'C');
$pdf ->Cell(15,3,'TR','B,R',0,'L');
$pdf ->Cell(48,3,'','R',1,'L');

$pdf ->Cell(103,4,'Extra-Curricular Activities','R',0,'L');
$pdf ->Cell(48,4,'','B,R',1,'C');

$pdf ->Cell(103,3,'','B,R',0,'C');
$pdf ->Cell(48,3,'NSTP STAMP','R',1,'L');

$pdf ->Cell(53,4,'Name of Father','R',0,'L');
$pdf ->Cell(50,4,'Name of Mother','R',0,'L');
$pdf ->Cell(48,4,'','R',1,'C');
$pdf ->Cell(53,4,'','B,R',0,'C');
$pdf ->Cell(50,4,'','B,R',0,'C');
$pdf ->Cell(48,4,'','R',1,'C');

$pdf ->Cell(53,4,'Name of Guardian','R',0,'L');
$pdf ->Cell(50,4,'Relationship','R',0,'L');
$pdf ->Cell(48,4,'','R',1,'C');
$pdf ->Cell(53,4,'','B,R',0,'C');
$pdf ->Cell(50,4,'','B,R',0,'C');
$pdf ->Cell(48,4,'','R',1,'C');

$pdf ->Cell(68,4,'Address of Guardian','R',0,'L');
$pdf ->Cell(35,4,'Occupation','R',0,'L');
$pdf ->Cell(48,4,'','R',1);

$pdf ->Cell(68,3,'','B,R',0,'C');
$pdf ->Cell(35,3,'','B,R',0,'C');
$pdf ->Cell(48,3,'','R',1,'C');

$pdf ->Cell(103,4,'Semester and Year Last Enrolled in this College','R',0,'L');
$pdf ->Cell(48,4,'','R',1,'L');

$pdf ->Cell(103,3,'','B,R',0,'C');
$pdf ->Cell(48,3,'','B,R',1,'C');

$pdf ->Cell(103,4,'I hereby certify that I have taken and passed the pre-requisites of the subject(s)','R',0,'R');
$pdf ->Cell(48,4,'Amount Paid:','R',1,'L');

$pdf ->Cell(103,3,'I have Enrolled in.','R',0,'L');
$pdf ->Cell(48,3,'','R',1,'C');

$pdf ->Cell(53,4,'',0,0);
$pdf ->Cell(50,4,'','B,R',0,'L');
$pdf ->Cell(48,4,'','B,R',1,'L');

$pdf ->Cell(53,4,'',0,0);
$pdf ->Cell(50,4,'(Signature of Student)','R',0,'C');
$pdf ->Cell(48,4,'Cashier','R',1,'C');




    $pdf->SetLeftMargin(5);
    $pdf->SetRightMargin(10);
    $pdf->SetAutoPageBreak(true, 8);
    $pdf ->AddPage();

// //cell(width,height,text,border,end line,[align])
    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(0,6,'INFORMATION',0,1,'C');

    $pdf->SetFont('Arial','',10);
    $pdf->Cell(0,5,"The student should fill in the information desired below and sign the promisory note.",'B',1,'C');
    
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(9,5,"Name",'L',0);
    $pdf->Cell(25,5,"",0,0);
    $pdf->Cell(25,5,"",0,0);
    $pdf->Cell(25,5,"",'R',0);
    //Gender
    $pdf->Cell(33,5,"Gender",'R',0);

    //Citizenship
    $pdf->Cell(33,5,"Citizenship",'R',1);

    //cell for NAMES
    $pdf->Cell(9,5,"",'L',0);
    $pdf->Cell(25,5,"",0,0,'C');
    $pdf->Cell(25,5,"",0,0,'C');
    $pdf->Cell(25,5,"",'R',0,'C');
    //function for GENDER
    $pdf->Cell(33,10,"",'R',0,'C');
    //function for CITIZENSHIP
    $pdf->Cell(33,10,"",'R',0,'C');
    $pdf->Cell(10,5,"",'L',1);


    $pdf->Cell(9,5,"",'L',0);
    $pdf->SetFont('Arial','',7);
    $pdf->Cell(25,5,"(Surname)",0,0,'C');
    $pdf->Cell(25,5,"(First Name)",0,0,'C');
    $pdf->Cell(25,5,"(Middle Name)",'R',0,'C');
    $pdf->Cell(4,5,"",'L',1);

    //City address
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(.1,5.5,"",'L',0);
    $pdf->Cell(83.8,5.5,"City Address",'T',0);
    $pdf->Cell(.1,5.5,"",'R',0);
    $pdf->Cell(65.9,5.5,"Email Address",'T',0);
    $pdf->Cell(.1,5.5,"",'R',1);

    $pdf->Cell(.1,6,"",'L',0);
    //CITY ADDRESS FUNCTION
    $pdf->SetFont('Arial','',5.5);
    
    $pdf->Cell(83.9,6,"",'B',0,'C');
    $pdf->Cell(.1,6,"",'L',0);
    //PROV ADD FUNCTION
    $pdf->Cell(65.8,6,"",'B',0,'C');
    $pdf->Cell(.1,6,"",'R',1);

    $pdf->SetFont('Arial','',8);
    $pdf->Cell(.1,16,"",'L',0);
    $pdf->Cell(14.9,16,"Guardian",'B',0);
    
    //GUARDIAN FUNCTION
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(68.9,16,"",'B',0,'C');

    $pdf->Cell(.1,16,"",'R',0);
    $pdf->SetFont('Arial','',8);

    $pdf->Cell(15,8,"Address",0,0,'C');
    //guiardian add function
    $pdf ->Cell(51,8,"",'R',1);

    
    $pdf->Cell(84,8,"",0,0,'C');
    $pdf ->Cell(65.9,8,"of Guardian",'B',0);
    $pdf ->Cell(.1,8,"",'R',1);

    $pdf->Cell(83.9,6,"Address of High School from where graduated",'L',0);
    $pdf ->Cell(.1,6,"",'R',0);

    $pdf->Cell(66,6,"Semester and year last enrolled in this college",'R',1);
    //function add of HS
    $pdf->Cell(83.9,6,"",'L',0);
    $pdf ->Cell(.1,6,"",'R',0);
    
    //function sem and year
    $pdf->Cell(66,6,"",'R',1);
    $pdf->Cell(150,6,"",'T',1);

    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(0,7,'PROMISSORY NOTE',0,1,'C');
    $pdf->Ln(1);
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(150,5,"I hereby acknowledge that I will abide by the rules and regulations of SFAC concerning fees. Being allowed solely",0,1);
    $pdf->Cell(150,5,"for my convenience to pay my tuition and other fees by installment, I hereby promise to pay on demand the full",0,1);
    $pdf->Cell(150,5,"unpaid balance of my account for the entire semester or school term, as the case may be, even if I should stop ",0,1);
    $pdf->Cell(150,5,"studying or transfer to another school before the end of the semester or school term",0,1);
    

    $pdf->Cell(150,4,"",0,1);
    $pdf->Cell(70,6,"",'B',0);
    $pdf->Cell(40,6,"",0,0);
    $pdf->Cell(40,6,"",'B',1);

    $pdf->SetFont('Arial','',7);
    
    $pdf->Cell(70,6,"Signature Over Printed Name",0,0,'C');
    $pdf->Cell(40,6,"",0,0);
    $pdf->Cell(40,6,"Date Signed",0,0,'C');


    $pdf->Ln(10);


    $pdf ->SetFont('Arial','B',12);


    $pdf ->Cell(0,5,'INFORMATION','B',1,'C');
    $pdf ->SetFont('Arial','',8);
    $pdf ->Cell(27,4,'NAME',0,0,'C');
    $pdf ->Cell(27,4,'SURNAME',0,0,'C');
    $pdf ->Cell(27,4,'FIRST NAME',0,0,'C');
    $pdf ->Cell(27,4,'MIDDLE NAME','R',1,'C');
    $pdf ->Cell(27,3,'','B',0,'C');
    $pdf ->Cell(27,3,'','B',0,'C');
    $pdf ->Cell(27,3,'','B',0,'C');
    $pdf ->Cell(27,3,'','B',1,'C');
    $pdf ->Cell(108,4,'Present Address',0,1,'L');
    $pdf ->Cell(108,3,'','B',1,'C');
    $pdf ->Cell(68,4,'Home Address','R',0,'L');
    $pdf ->Cell(40,4,'Contact Number',0,1,'L');
    $pdf ->Cell(68,3,'','R,B',0,'C');
    $pdf ->Cell(40,3,'','B',1,'C');
    $pdf ->Cell(16,4,'Age','R',0,'L');
    $pdf ->Cell(22,4,'Gender','R',0,'L');
    $pdf ->Cell(30,4,'Civil Status','R',0,'L');
    $pdf ->Cell(40,4,'Nationality',0,1,'L');
    $pdf ->Cell(16,3,'','R,B',0,'C');
    $pdf ->Cell(22,3,'','R,B',0,'C');
    $pdf ->Cell(30,3,'','R,B',0,'C');
    $pdf ->Cell(40,3,'','B',1,'C');
    $pdf ->Cell(68,4,'Place of Birth','R',0,'L');
    $pdf ->Cell(40,4,'Date of Birth',0,1,'L');
    $pdf ->Cell(68,3,'','R,B',0,'C');
    $pdf ->Cell(40,3,'','B',1,'C');
    
    $pdf ->Cell(45,4,'Religion','R',0,'L');
    $pdf ->Cell(63,4,'Email Address',0,1,'L');
    $pdf ->Cell(45,3,'','B,R',0,'C');
    $pdf ->Cell(13,3,'','B',0,'C');
    $pdf ->Cell(18,3,'','B',0,'C');
    $pdf ->Cell(32,3,'','B',1,'C');
    $pdf ->SetXY(113,15);
    $pdf ->Cell(43,42,'2x2 ID Pic',1,1,'C');
    
    
    $pdf ->Cell(68,4,'High School From Which Graduated','R',0,'L');
    $pdf ->Cell(35,4,'Date','R',0,'L');
    $pdf ->Cell(48,4,'ACR. No. (For Alien)','R',1,'L');
    
    $pdf ->Cell(68,3,'','B,R',0,'C');
    $pdf ->Cell(35,3,'','B,R',0,'C');
    $pdf ->Cell(48,3,'','R',1,'C');
    
    
    $pdf ->Cell(103,4,'School Last Attended','R',0,'L');
    $pdf ->Cell(48,4,'','R',1,'L');
    
    $pdf ->Cell(103,3,'','B,R',0,'C');
    $pdf ->Cell(48,3,'','R',1,'C');
    
    $pdf ->Cell(38,4,'How Supported','R',0,'L');
    $pdf ->Cell(65,4,'Credential Submitted','R',0,'L');
    $pdf ->Cell(48,4,'','R',1,'L');
    
    $pdf ->Cell(38,3,'','B,R',0,'C');
    $pdf ->Cell(7,3,'',1,0,'C');
    $pdf ->Cell(15,3,'Form 138','B',0,'L');
    $pdf ->Cell(6.5,3,'',1,0,'C');
    $pdf ->Cell(15,3,'HD','B',0,'L');
    $pdf ->Cell(6.5,3,'',1,0,'C');
    $pdf ->Cell(15,3,'TR','B,R',0,'L');
    $pdf ->Cell(48,3,'','R',1,'L');
    
    $pdf ->Cell(103,4,'Extra-Curricular Activities','R',0,'L');
    $pdf ->Cell(48,4,'','B,R',1,'C');
    
    $pdf ->Cell(103,3,'','B,R',0,'C');
    $pdf ->Cell(48,3,'NSTP STAMP','R',1,'L');
    
    $pdf ->Cell(53,4,'Name of Father','R',0,'L');
    $pdf ->Cell(50,4,'Name of Mother','R',0,'L');
    $pdf ->Cell(48,4,'','R',1,'C');
    $pdf ->Cell(53,4,'','B,R',0,'C');
    $pdf ->Cell(50,4,'','B,R',0,'C');
    $pdf ->Cell(48,4,'','R',1,'C');
    
    $pdf ->Cell(53,4,'Name of Guardian','R',0,'L');
    $pdf ->Cell(50,4,'Relationship','R',0,'L');
    $pdf ->Cell(48,4,'','R',1,'C');
    $pdf ->Cell(53,4,'','B,R',0,'C');
    $pdf ->Cell(50,4,'','B,R',0,'C');
    $pdf ->Cell(48,4,'','R',1,'C');
    
    $pdf ->Cell(68,4,'Address of Guardian','R',0,'L');
    $pdf ->Cell(35,4,'Occupation','R',0,'L');
    $pdf ->Cell(48,4,'','R',1);
    
    $pdf ->Cell(68,3,'','B,R',0,'C');
    $pdf ->Cell(35,3,'','B,R',0,'C');
    $pdf ->Cell(48,3,'','R',1,'C');
    
    $pdf ->Cell(103,4,'Semester and Year Last Enrolled in this College','R',0,'L');
    $pdf ->Cell(48,4,'','R',1,'L');
    
    $pdf ->Cell(103,3,'','B,R',0,'C');
    $pdf ->Cell(48,3,'','B,R',1,'C');
    
    $pdf ->Cell(103,4,'I hereby certify that I have taken and passed the pre-requisites of the subject(s)','R',0,'R');
    $pdf ->Cell(48,4,'Amount Paid:','R',1,'L');
    
    $pdf ->Cell(103,3,'I have Enrolled in.','R',0,'L');
    $pdf ->Cell(48,3,'','R',1,'C');
    
    $pdf ->Cell(53,4,'',0,0);
    $pdf ->Cell(50,4,'','B,R',0,'L');
    $pdf ->Cell(48,4,'','B,R',1,'L');
    
    $pdf ->Cell(53,4,'',0,0);
    $pdf ->Cell(50,4,'(Signature of Student)','R',0,'C');
    $pdf ->Cell(48,4,'Cashier','R',1,'C');



$pdf ->SetFont('Arial','B',4.5);
$pdf->SetTopMargin(13);
$pdf->SetLeftMargin(13);
$pdf ->Cell(0,2.3,'RULES CONCERNING FEES:',0,1,'L');
$pdf ->Cell(0,2.3,'',0,1,'L');
$pdf ->Cell(0,2.3,'PAYMENT OF FEES:',0,1,'L');
$pdf ->SetFont('Arial','',4.5);
$pdf ->Cell(7,2.3,'',0,0);
$pdf ->Cell(0,2.3,'All fees are computed on the semestral or school term basis and are payable in upon registration. The total fees may be paid by installment under the terms',0,1,'L');
$pdf ->Cell(7,2.3,'',0,0);
$pdf ->Cell(0,2.3,'but is should not be interpreted, however, that the fees are payable on the month-to-month basis:',0,1,'L');
$pdf ->Cell(7,2.3,'',0,0);
$pdf ->Cell(0,2.3,'1. Down payment 40% of the total fees to be paid upon registration.',0,1,'L');
$pdf ->Cell(7,2.3,'',0,0);
$pdf ->Cell(0,2.3,'2. Second installment 70% of the total fees to be paid on or beore the first periodic examination',0,1,'L');
$pdf ->Cell(7,2.3,'',0,0);
$pdf ->Cell(0,2.3,'3. Third installment 100% of the total fees to be paid on or before the mid semestral examination.',0,1,'L');
$pdf ->Cell(0,2.3,'',0,1,'L');
$pdf ->SetFont('Arial','B',4.5);
$pdf ->Cell(0,2.3,'DISCOUNT PRIVILEGE:',0,1,'L');

$pdf ->SetFont('Arial','',4.5);
$pdf ->Cell(7,2.3,'',0,0);
$pdf ->Cell(0,2.3,'Discount on tuition fee only, may be given under the following conditions.',0,1,'L');

$pdf ->Cell(7,2.3,'',0,0);
$pdf ->Cell(0,2.3,'1. 5% discount is given if the total fees is paid in full upon registration,',0,1,'L');
$pdf ->Cell(7,2.3,'',0,0);
$pdf ->Cell(0,2.3,'2. 5%, 10%, 15%, 20%, and 25% is given to second, third, fourth, fifth, and six brothers/sisters respectively',0,1,'L');
$pdf ->Cell(0,2.3,'',0,1,'L');

$pdf ->SetFont('Arial','B',4.5);
$pdf ->Cell(0,2.3,'ADJUSTMENT OF FEES DUE TO WITHDRAWAL OF ENROLLMENT:',0,1,'L');

$pdf ->SetFont('Arial','',4.5);
$pdf ->Cell(7,2.3,'',0,0);
$pdf ->Cell(0,2.3,'Section VI, paragrap 137 & 139 of Manual of Regulations of Private Schools, Seventh Edition, 1970 of the Bureau of Private Schools, which is quoted below govern the refund or',0,1,'L');

$pdf ->Cell(7,2.3,'',0,0);
$pdf ->Cell(0,2.3,'adjustment of fees:',0,1,'L');

$pdf ->Cell(7,2.3,'',0,0);
$pdf ->Cell(0,2.3,'"137, When a student registers in a school, it is understood that he is enrolling for the entire school year for elementary and secondary courses, and for the entire semester for the collegiate',0,1,'L');

$pdf ->Cell(7,2.3,'',0,0);
$pdf ->Cell(0,2.3,'courses. A student who transfers on otherwise withdraws, In writing, within two weeks after the beginning of classes and who has already paid the pertinent tuition and other school fees',0,1,'L');

$pdf ->Cell(7,2.3,'',0,0);
$pdf ->Cell(0,2.3,'in full on any length longer than one month may be charged ten percent (10%) of the total amount due for the term if the withdraws within the first week of classes, or twenty percent (20%)',0,1,'L');

$pdf ->Cell(7,2.3,'',0,0);
$pdf ->Cell(0,2.3,'if within the second week of classes, regardless of whether or not he has actually attended classes. The student may be charged all the school fees in full if the withdraw anytime after the',0,1,'L');

$pdf ->Cell(7,2.3,'',0,0);
$pdf ->Cell(0,2.3,'second week of classes. However, if the transfer on withdrawal is due to a justifiable reason, the student shall be charged the pertinent fees up to an including the last month of',0,1,'L');

$pdf ->Cell(7,2.3,'',0,0);
$pdf ->Cell(0,2.3,'"139. Full refund of fees shall be made for any course or level which has been discontinued by the school or not',0,1,'L');

$pdf ->Cell(7,2.3,'',0,0);
$pdf ->Cell(0,2.3,'credited by the office thru no fault of the student."',0,1,'L');

$pdf ->Cell(7,2.3,'',0,0);
$pdf ->Cell(0,2.3,'The fees paid for registration and identification card are not refundable.',0,1,'L');
$pdf ->Cell(0,2.3,'',0,1,'L');

$pdf ->SetFont('Arial','B',4.5);
$pdf ->Cell(0,2.3,'NON-PAYMENT OF ACCOUNT:',0,1,'L');

$pdf ->SetFont('Arial','',4.5);
$pdf ->Cell(7,2.3,'',0,0);
$pdf ->Cell(0,2.3,'The administration reserves the right to suspend or drop from the rolls any student who has not paid in full his/her financial obligations on or before the scheduled dated of the third',0,1,'L');

$pdf ->Cell(7,2.3,'',0,0);
$pdf ->Cell(0,2.3,'periodic examination. It is also reserves the right to withhold from a student the issuance of report card (form 138), honorable dismissal, certification, or other on other records, unless the',0,1,'L');

$pdf ->Cell(7,2.3,'',0,0);
$pdf ->Cell(0,2.3,'student has fully settled his/her financial obligation or property with the collage.',0,1,'L');

$pdf ->Cell(0,2.3,'',0,1,'L');


$pdf ->SetFont('Arial','B',4.5);
$pdf ->Cell(0,2.3,'CHANGE OF SUBJECT, LOAD, SECTION OR COURSE:',0,1,'L');

$pdf ->SetFont('Arial','',4.5);
$pdf ->Cell(7,2.3,'',0,0);
$pdf ->Cell(0,2.3,'Any student who have desires to change his subkect load section, or course must secure an application from the Registrar\'s Office accomplish it and have it approved by the Registrar\'s Office',0,1,'L');

$pdf ->Cell(7,2.3,'',0,0);
$pdf ->Cell(0,2.3,'within seven days after the first day of classes in order to entitle him to the corresponding adjustment fees.',0,1,'L');


$pdf ->Cell(7,2.3,'',0,0);
$pdf ->Cell(0,2.3,'If the dropping of any subjects is made after the said period, even if it is approved by the Registrar, the student is no longer entitled to the corresponding reduction fees.',0,1,'L');

$pdf ->Cell(7,2.3,'',0,0);
$pdf ->Cell(0,2.3,'If the change in the subject load or section is recommended by the Registrar or proper authorities, corresponding adjustment of fees will be made regardless of the date when affected.',0,1,'L');

$pdf ->Cell(7,2.3,'',0,0);
$pdf ->Cell(0,2.3,'Except when the change of subject load, section, or course is recommended by the Registrar or proper authorities application thereof shall no longer be entertained after seven (7) days from',0,1,'L');

$pdf ->Cell(7,2.3,'',0,0);
$pdf ->Cell(0,2.3,'start of classes',0,1,'L');

$pdf ->Cell(7,2.3,'',0,0);
$pdf ->Cell(0,2.3,'During the summer term, application for change of subkect load shall no longer be entertained after three (3) days from the start of the classes.',0,1,'L');

$pdf ->Cell(0,2.3,'',0,1,'L');

$pdf ->SetFont('Arial','B',5);
$pdf ->Cell(0,2.3,'PLEASE RECORD YOUR PAYMENTS BELOW FOR REFERENCES',0,1,'L');

$pdf ->SetFont('Arial','',5);
$pdf ->Cell(29,3,'Date',1,0,'C');
$pdf ->Cell(24,3,'O.R. No.',1,0,'C');
$pdf ->Cell(22,3,'Amount Paid',1,0,'C');
$pdf ->Cell(24,3,'Date',1,0,'C');
$pdf ->Cell(21,3,'O.R. No.',1,0,'C');
$pdf ->Cell(23,3,'Amount Paid',1,1,'C');

$pdf ->Cell(29,3,'',1,0,'C');
$pdf ->Cell(24,3,'',1,0,'C');
$pdf ->Cell(22,3,'',1,0,'C');
$pdf ->Cell(24,3,'',1,0,'C');
$pdf ->Cell(21,3,'',1,0,'C');
$pdf ->Cell(23,3,'',1,1,'C');
$pdf ->Cell(29,3,'',1,0,'C');
$pdf ->Cell(24,3,'',1,0,'C');
$pdf ->Cell(22,3,'',1,0,'C');
$pdf ->Cell(24,3,'',1,0,'C');
$pdf ->Cell(21,3,'',1,0,'C');
$pdf ->Cell(23,3,'',1,1,'C');
$pdf ->Cell(29,3,'',1,0,'C');
$pdf ->Cell(24,3,'',1,0,'C');
$pdf ->Cell(22,3,'',1,0,'C');
$pdf ->Cell(24,3,'',1,0,'C');
$pdf ->Cell(21,3,'',1,0,'C');
$pdf ->Cell(23,3,'',1,1,'C');
$pdf ->Cell(29,3,'',1,0,'C');
$pdf ->Cell(24,3,'',1,0,'C');
$pdf ->Cell(22,3,'',1,0,'C');
$pdf ->Cell(24,3,'',1,0,'C');
$pdf ->Cell(21,3,'',1,0,'C');
$pdf ->Cell(23,3,'',1,1,'C');
$pdf ->Cell(29,3,'',1,0,'C');
$pdf ->Cell(24,3,'',1,0,'C');
$pdf ->Cell(22,3,'',1,0,'C');
$pdf ->Cell(24,3,'',1,0,'C');
$pdf ->Cell(21,3,'',1,0,'C');
$pdf ->Cell(23,3,'',1,1,'C');
$pdf ->Cell(29,3,'',1,0,'C');
$pdf ->Cell(24,3,'',1,0,'C');
$pdf ->Cell(22,3,'',1,0,'C');
$pdf ->Cell(24,3,'',1,0,'C');
$pdf ->Cell(21,3,'',1,0,'C');
$pdf ->Cell(23,3,'',1,1,'C');

$pdf ->Output();
?>