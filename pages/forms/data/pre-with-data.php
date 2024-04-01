<?php
session_start();
require '../../../includes/conn.php';
include '../../../includes/session.php';
require ('../../fpdf/fpdf.php');

$stud_id = $_GET['stud_id'];

if ($_SESSION['role'] == "Student") {
    $stud_id = $_SESSION['stud_id'];
}



$query = mysqli_query($db,"SELECT * FROM tbl_students LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
    LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_students.course_id
    where stud_id = $stud_id");
    $row = mysqli_fetch_array($query);

class PDF extends FPDF
{

// Page header

function Header()
{   
    // Logo(x axis, y axis, height, width)
    $this->Image('../../../assets/img/logos/logo.png',27,3,19,19);
    // font(font type,style,font size)
    $this->SetFont('Times','B',30);
    $this->SetTextColor(255,0,0);
    // Dummy cell
    $this->Cell(50);
    // //cell(width,height,text,border,end line,[align])
    $this->Cell(110,5,'Saint Francis of Assisi College',0,0,'C');
    // Line break
    $this->Ln(9);
    $this->SetTextColor(0,0,0);
    $this->SetFont('Arial','',10);
    // dummy cell
    $this->Cell(50);
    // //cell(width,height,text,border,end line,[align])
    $test = utf8_decode("Piñas");
    $this->Cell(90,3,'Admiral Village, Talon, Las ' .$test. ' City',0,0,'C');
    // Line break
    $this->Ln(11);
    $this->SetFont('Arial','B',14);
    // //cell(width,height,text,border,end line,[align])
    $this->Cell(190,4,'COLLEGE DEPARTMENT',0,0,'C');
    // Line break
    $this->Ln(6);
    $this->SetFont('Arial','B',14);
    // //cell(width,height,text,border,end line,[align])
    $this->Cell(190,8,'PRE-ENROLLMENT FORM',0,1,'C');

}


// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-25);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    $this->SetTextColor(255,0,0);
    // Page number
    $this->Cell(0,5,'',0,1,'C');
    $this->SetFont('Arial','',8);
    $this->SetTextColor(0,0,0);
    $this->Cell(0,5,'',0,0,'R');
}


}

$pdf = new PDF('P','mm','Legal');
//left top right
$pdf->SetMargins(10,10,10);
$pdf ->AddPage();

$pdf->SetFont('Arial','','10');

// $pdf->Image('../../assets/img/peso.png',55,134,6,6);
$pdf ->Cell(40 ,5,'',0,0);
if ($_SESSION['S'] == "First Semester") {
    $semester = "First";
} elseif ($_SESSION['S'] == "Second Semester") {
    $semester = "Second";
} else {
    $semester = "Summer";
}
$pdf ->Cell(25 ,5,$semester,'B',0,'C');
$pdf ->Cell(45 ,5,'Semester, Academic Year',0,0,'C');
$pdf ->Cell(53 ,5,$_SESSION['AC'],'B',0,'C');

//Rect(float x, float y, float w, float h [, string style])
$pdf ->SetLineWidth(1);
$pdf ->Rect(8,51,203,93);
//cell(width,height,text,border,end line,[align])

$pdf ->SetLineWidth(.2);
$pdf->Ln(10);
$pdf->SetFont('Arial','','10.5');
$pdf ->Cell(23 ,5,'Student No.:',0,0); 
$pdf->SetFont('Arial','','11');
$pdf ->Cell(47 ,5,$row['stud_no'],'B',0,'C');//stud_no
$pdf->SetFont('Arial','','10.5');
$pdf ->Cell(16 ,5,'Course:',0,0);
$pdf->SetFont('Arial','','11');
$fontsize = 11;
$tempFontSize = $fontsize;
$cellwidth = 112;
while ($pdf->GetStringWidth($row['course']) > $cellwidth){
    $pdf->SetFontSize($tempFontSize -= 0.1);
}
$pdf ->Cell($cellwidth ,5,$row['course'],'B',0,'C');//course


$pdf->Ln(4);

$pdf ->Cell(20 ,3,'',0,1);

$pdf->SetFont('Arial','','10.5');
$pdf ->Cell(30 ,5,'Student Name:',0,0); 
$pdf->SetFont('Arial','','11');

$studfirst = utf8_decode($row['firstname']);
$studmiddle = utf8_decode($row['middlename']);
$studlast = utf8_decode($row['lastname']);


$pdf ->Cell(56 ,5,$studlast,'B',0,'C');//lastname
$pdf ->Cell(56 ,5,$studfirst,'B',0,'C');//firstname
$pdf ->Cell(56 ,5,$studmiddle,'B',1,'C');//middlename
$pdf ->Ln(1);
$pdf ->Cell(50 ,3,'',0,0); 
$pdf->SetFont('Arial','','8');
$pdf ->Cell(56 ,3,'Surname',0,0);
$pdf ->Cell(56 ,3,'First Name',0,0);
$pdf ->Cell(56 ,3,'Middle Name',0,1);


$pdf ->Cell(20 ,1,'',0,1);
//ADDRESS
$pdf->SetFont('Arial','','10.5');
$pdf ->Cell(18 ,5,'Address:',0,0); 
$pdf->SetFont('Arial','','11');
$fontsize = 11;
$tempFontSize = $fontsize;
$cellwidth = 180;
$address = utf8_decode($row['address']);

while ($pdf->GetStringWidth($address) > $cellwidth){
    $pdf->SetFontSize($tempFontSize -= 0.1);
}
$pdf ->Cell(180 ,5,$address,'B',1,'C');//address

$pdf ->Cell(20 ,3,'',0,1);

$pdf->SetFont('Arial','','10.5');
$pdf ->Cell(25 ,5,'Date of Birth:',0,0); 
$pdf->SetFont('Arial','','11');
$pdf ->Cell(35 ,5,$row['birthdate'],'B',0,'C');//birthdate
$pdf->SetFont('Arial','','10.5');
$pdf ->Cell(25 ,5,'Place of Birth:',0,0);
$pdf->SetFont('Arial','','11');
$fontsize = 11;
$tempFontSize = $fontsize;
$cellwidth = 48;
$birthplace = utf8_decode($row['birthplace']);

while ($pdf->GetStringWidth($birthplace) > $cellwidth){
    $pdf->SetFontSize($tempFontSize -= 0.1);
}
$pdf ->Cell(48 ,5,$birthplace,'B',0,'C');//birthplace
$pdf->SetFont('Arial','','10.5');
$pdf ->Cell(10 ,5,'Age:',0,0);
$pdf->SetFont('Arial','','11');
$pdf ->Cell(15 ,5,$row['age'],'B',0,'');//age
$pdf->SetFont('Arial','','10.5');
$pdf ->Cell(15 ,5,'Gender:',0,0);
$pdf->SetFont('Arial','','11');
$pdf ->Cell(25 ,5,$row['gender'],'B',1,'C');//gender
//end of line;



$pdf ->Cell(20 ,3,'',0,1);
$pdf->SetFont('Arial','','10.5');
$pdf ->Cell(30 ,5,'Contact Number:',0,0); 
$pdf->SetFont('Arial','','11');
$pdf ->Cell(33 ,5,$row['contact'],'B',0,'C');//contact
$pdf->SetFont('Arial','','10.5');
$pdf ->Cell(22 ,5,'Civil Status:',0,0);
$pdf->SetFont('Arial','','11');
$pdf ->Cell(21 ,5,$row['civilstatus'],'B',0,'C');//civil status
$pdf->SetFont('Arial','','10.5');
$pdf ->Cell(16 ,5,'Religion:',0,0);
$pdf->SetFont('Arial','','11');
$pdf ->Cell(31 ,5,$row['religion'],'B',0,''); //religion
$pdf->SetFont('Arial','','10.5');
$pdf ->Cell(19 ,5,'Nationality:',0,0);
$pdf->SetFont('Arial','','11');
$pdf ->Cell(26 ,5,$row['citizenship'],'B',1,'C');//citizenship


$pdf ->Cell(20 ,3,'',0,1);
//HIGHSCHOOL & ACADYEAR
$pdf->SetFont('Arial','','10.5');
$pdf ->Cell(49 ,5,'Highschool Graduated From:',0,0); 
$pdf->SetFont('Arial','','11');
$fontsize = 11;
$tempFontSize = $fontsize;
$cellwidth = 92;
while ($pdf->GetStringWidth($row['hs']) > $cellwidth){
    $pdf->SetFontSize($tempFontSize -= 0.1);
}
$pdf ->Cell(92 ,5,$row['hs'],'B',0,'C');//hs
$pdf->SetFont('Arial','','10.5');
$pdf ->Cell(30 ,5,'Year Graduated:',0,0);
$pdf->SetFont('Arial','','11');
$pdf ->Cell(27 ,5,$row['hsSY'],'B',1,'C'); //end of line;hsSY

$pdf ->Cell(20 ,3,'',0,1);

$pdf->SetFont('Arial','','10.5');
$pdf ->Cell(37 ,5,'School Last Attended:',0,0); 
$pdf->SetFont('Arial','','11');
$fontsize = 11;
$tempFontSize = $fontsize;
$cellwidth = 91;
while ($pdf->GetStringWidth($row['lastschool']) > $cellwidth){
    $pdf->SetFontSize($tempFontSize -= 0.1);
}
$pdf ->Cell(91 ,5,$row['lastschool'],'B',0,'C');//lastschool
$pdf->SetFont('Arial','','10.5');
$pdf ->Cell(35 ,5,' ACR No.(For Allien) :',0,0);
$pdf->SetFont('Arial','B','11');
$pdf ->Cell(35 ,5,'','B',1,'C'); 
//end of line;

$pdf ->Cell(20 ,3,'',0,1);

$pdf->SetFont('Arial','','10.5');
$pdf ->Cell(29 ,5,'Name of Father:',0,0); 
$pdf->SetFont('Arial','','11');
$fathername = utf8_decode($row['flastname'].', '.$row['ffirstname'].' '.$row['fmiddlename']);
$pdf ->Cell(70 ,5,$fathername,'B',0,'C');//father's name
$pdf->SetFont('Arial','','10.5');
$pdf ->Cell(29 ,5,'Name of Mother:',0,0);
$pdf->SetFont('Arial','','11');
$mothername = utf8_decode($row['mlastname'].', '.$row['mfirstname'].' '.$row['mmiddlename']);
$pdf ->Cell(70 ,5,$mothername,'B',1,'C');//mother's name


$pdf ->Cell(20 ,3,'',0,1);
$pdf->SetFont('Arial','','10.5');
$pdf ->Cell(34 ,5,'Name of Guardian:',0,0); 
$pdf->SetFont('Arial','','11');
$guardianname = utf8_decode($row['glastname'].', '.$row['gfirstname'].' '.$row['gmiddlename']);
$fontsize = 11;
$tempFontSize = $fontsize;
$cellwidth = 49;
while ($pdf->GetStringWidth($guardianname) > $cellwidth){
    $pdf->SetFontSize($tempFontSize -= 0.1);
}

$pdf ->Cell(49 ,5,$guardianname,'B',0,'C');//guardian name
$pdf->SetFont('Arial','','10.5');
$pdf ->Cell(22 ,5,'Relationship:',0,0);
$pdf->SetFont('Arial','','11');
$pdf ->Cell(31 ,5,$row['relationship'],'B',0,'C');//relationship
$pdf->SetFont('Arial','','10.5');
$pdf ->Cell(22 ,5,'Occupation:',0,0);
$pdf->SetFont('Arial','','11');
$pdf ->Cell(40 ,5,'','B',1,'C');//occupation

$pdf ->Cell(20 ,3,'',0,1);

$pdf->SetFont('Arial','','10.5');
$pdf ->Cell(37 ,5,'Address of Guardian:',0,0); 
$pdf->SetFont('Arial','','11');
$fontsize = 11;
$tempFontSize = $fontsize;
$cellwidth = 82;
while ($pdf->GetStringWidth($row['gaddress']) > $cellwidth){
    $pdf->SetFontSize($tempFontSize -= 0.1);
}
$pdf ->Cell(82 ,5,$row['gaddress'],'B',0,'C');//gaddress
$pdf->SetFont('Arial','','10.5');
$pdf ->Cell(37 ,5,'Occupation Number:',0,0);
$pdf->SetFont('Arial','B','11');
$pdf ->Cell(42 ,5,'','B',1,'C');//occupation number


$pdf ->Cell(20 ,3,'',0,1);

$pdf->SetFont('Arial','','10.5');
$pdf ->Cell(40 ,5,'Monthly Family Income:',0,0); 
$pdf->SetFont('Arial','','11');
$pdf ->Cell(62 ,5,$row['familyincome'],'B',0,'C');//familyincome
$pdf->SetFont('Arial','','10.5');
$pdf ->Cell(33 ,5,'     No. of Siblings:',0,0);
$pdf->SetFont('Arial','','11');
$pdf ->Cell(42 ,5,$row['nosiblings'],'B',1,'C');//nosiblings

//END STUDENT DETAILS;



$pdf ->Cell(20 ,6,'',0,1);

$pdf ->Cell(14 ,5,'NOTE:',0,0);
$pdf ->Cell(8 ,5,'',0,0);
$pdf->SetFont('Arial','I','10.8');
$pdf ->Cell(180 ,5,'Use this form in writing your schedule of subjects from the class scheduled posted on the bulletin board.',0,0);
$pdf ->Cell(20 ,5,'',0,1);
$pdf ->Cell(14 ,5,'',0,0);
$pdf ->Cell(8 ,5,'',0,0);
$pdf ->Cell(180 ,5,'You may choose any subjects from different courses provided that the description / title are the same.',0,1);
$pdf ->Cell(20 ,4,'',0,1);
$pdf->SetFont('Arial','B','12');
$pdf ->Cell(200 ,5,'S U B J E C T S',0,1,'C');
$pdf ->Cell(200 ,2,'',0,1);
$pdf->SetFont('Arial','B','11');
$pdf ->Cell(20 ,5,'CODE',0,0,'C');
$pdf ->Cell(3 ,5,'',0,0,'C');
$pdf ->Cell(75 ,5,'DESCRIPTION',0,0,'C');
$pdf ->Cell(3 ,5,'',0,0,'C');
$pdf ->Cell(19 ,5,'UNITS',0,0,'C');
$pdf ->Cell(3 ,5,'',0,0,'C');
$pdf ->Cell(23 ,5,'TIME',0,0,'C');
$pdf ->Cell(3 ,5,'',0,0,'C');
$pdf ->Cell(23 ,5,'DAY',0,0,'C');
$pdf ->Cell(3 ,5,'',0,0,'C');
$pdf ->Cell(23 ,5,'ROOM',0,1,'C');




//INSERT SUBJECT ENROLLED BY STUDENTS

$pdf->SetXY(10,163);
$pdf->SetFont('Arial','','9');



$sql = mysqli_query($db,"SELECT *, tbl_students.stud_id,tbl_subjects_new.subj_id,tbl_schedules.class_id FROM tbl_enrolled_subjects
    LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
    LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id
    LEFT JOIN tbl_schedules ON tbl_schedules.class_id = tbl_enrolled_subjects.class_id
    
    WHERE tbl_enrolled_subjects.stud_id = '$_GET[stud_id]' AND tbl_enrolled_subjects.acad_year = '$_SESSION[AC]' AND tbl_enrolled_subjects.semester = '$_SESSION[S]' ORDER BY subj_code")or die(mysqli_error($db));
    $y = $pdf->Gety();
    $xy = 7;

    while($row1 = mysqli_fetch_array($sql))

    {
$fontsize = 9;
$tempFontSize = $fontsize;
$cellwidth = 75;
while ($pdf->GetStringWidth($row1['subj_desc']) > $cellwidth){
    $pdf->SetFontSize($tempFontSize -= 0.1);
}
        $pdf ->SetXY(10,$y+$xy);
        $pdf ->Cell(20 ,7,$row1['subj_code'],0,0,'C');
        $pdf ->Cell(3 ,7,'',0,0,'C');
        $pdf ->Cell(75 ,7,$row1['subj_desc'],0,0,'C');
        $pdf ->Cell(3 ,7,'',0,0,'C');
        $pdf ->Cell(19 ,7,$row1['unit_total'],0,0,'C');
        $pdf ->Cell(3 ,7,'',0,0,'C');
        $pdf ->Cell(23 ,7,$row1['time'],0,0,'C');
        $pdf ->Cell(3 ,7,'',0,0,'C');
        $pdf ->Cell(23 ,7,$row1['day'],0,0,'C');
        $pdf ->Cell(3 ,7,'',0,0,'C');
        $pdf ->Cell(23 ,7,$row1['room'],0,1,'C');
        $xy += 7;
    }



//CODE
$pdf->Line(10,177,30,177);
$pdf->Line(33,177,108,177);
$pdf->Line(111,177,130,177);
$pdf->Line(133,177,156,177);
$pdf->Line(159,177,182,177);
$pdf->Line(185,177,208,177);

$pdf->Line(10,184,30,184);
$pdf->Line(33,184,108,184);
$pdf->Line(111,184,130,184);
$pdf->Line(133,184,156,184);
$pdf->Line(159,184,182,184);
$pdf->Line(185,184,208,184);

$pdf->Line(10,191,30,191);
$pdf->Line(33,191,108,191);
$pdf->Line(111,191,130,191);
$pdf->Line(133,191,156,191);
$pdf->Line(159,191,182,191);
$pdf->Line(185,191,208,191);

$pdf->Line(10,198,30,198);
$pdf->Line(33,198,108,198);
$pdf->Line(111,198,130,198);
$pdf->Line(133,198,156,198);
$pdf->Line(159,198,182,198);
$pdf->Line(185,198,208,198);

$pdf->Line(10,205,30,205);
$pdf->Line(33,205,108,205);
$pdf->Line(111,205,130,205);
$pdf->Line(133,205,156,205);
$pdf->Line(159,205,182,205);
$pdf->Line(185,205,208,205);

$pdf->Line(10,212,30,212);
$pdf->Line(33,212,108,212);
$pdf->Line(111,212,130,212);
$pdf->Line(133,212,156,212);
$pdf->Line(159,212,182,212);
$pdf->Line(185,212,208,212);

$pdf->Line(10,219,30,219);
$pdf->Line(33,219,108,219);
$pdf->Line(111,219,130,219);
$pdf->Line(133,219,156,219);
$pdf->Line(159,219,182,219);
$pdf->Line(185,219,208,219);

$pdf->Line(10,226,30,226);
$pdf->Line(33,226,108,226);
$pdf->Line(111,226,130,226);
$pdf->Line(133,226,156,226);
$pdf->Line(159,226,182,226);
$pdf->Line(185,226,208,226);

$pdf->Line(10,233,30,233);
$pdf->Line(33,233,108,233);
$pdf->Line(111,233,130,233);
$pdf->Line(133,233,156,233);
$pdf->Line(159,233,182,233);
$pdf->Line(185,233,208,233);

$pdf->Line(10,240,30,240);
$pdf->Line(33,240,108,240);
$pdf->Line(111,240,130,240);
$pdf->Line(133,240,156,240);
$pdf->Line(159,240,182,240);
$pdf->Line(185,240,208,240);

$pdf->Line(10,247,30,247);
$pdf->Line(33,247,108,247);
$pdf->Line(111,247,130,247);
$pdf->Line(133,247,156,247);
$pdf->Line(159,247,182,247);
$pdf->Line(185,247,208,247);

$pdf->Line(10,254,30,254);
$pdf->Line(33,254,108,254);
$pdf->Line(111,254,130,254);
$pdf->Line(133,254,156,254);
$pdf->Line(159,254,182,254);
$pdf->Line(185,254,208,254);

$query1 = mysqli_query($db,"SELECT SUM(unit_total) as UN FROM tbl_enrolled_subjects
LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
    LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id
    LEFT JOIN tbl_schedules ON tbl_schedules.class_id = tbl_enrolled_subjects.class_id
    
 WHERE tbl_enrolled_subjects.stud_id = '$_GET[stud_id]' AND tbl_enrolled_subjects.acad_year = '$_SESSION[AC]' AND tbl_enrolled_subjects.semester = '$_SESSION[S]' ORDER BY subj_code")or die(mysqli_error($db));

$sum = $query1->fetch_array();

$pdf->SetY(254);
$pdf->SetFont('Arial','B','9');
$pdf ->Cell(20 ,7,'',0,0,'C');
$pdf ->Cell(3 ,7,'',0,0,'C');
$pdf ->Cell(75 ,7,'TOTAL UNITS',0,0,'R');
$pdf ->Cell(3 ,7,'',0,0,'C');
$pdf ->Cell(19 ,7,$sum['UN'],0,0,'C');
$pdf ->Cell(3 ,7,'',0,0,'C');

$pdf->SetY(263);

$pdf->SetFont('Arial','I','10');
$pdf ->Cell(200 ,5,'I hereby declare that all pre - requisite subjects were already taken and passed in accordance with the curriculum prescribed by',0,1);
$pdf ->Cell(200 ,5,'Saint Francis of Assisi College and the Commision on Higher Education.',0,1,'C');


$pdf ->Cell(20 ,5,'',0,1);

$pdf->SetFont('Arial','','10.5');
$pdf ->Cell(20 ,5,'',0,0);
$pdf ->Cell(90 ,5,'Verified by:',0,0);
$pdf ->Cell(90 ,5,'Verified by:',0,1);
$pdf ->Cell(20 ,10,'',0,0);
$pdf ->Cell(70 ,10,'','B',0);
$pdf ->Cell(20 ,10,'',0,0);
$pdf ->Cell(70 ,10,'','B',0);
$pdf ->Cell(20 ,10,'',0,1);
$pdf ->Cell(20 ,5,'',0,0);
$pdf ->Cell(70 ,5,'Student\'s Signature',0,0,'C');
$pdf ->Cell(20 ,5,'',0,0);
$pdf ->Cell(70 ,5,'Program Coordinator',0,0,'C');
$pdf ->Cell(20 ,5,'',0,1);

$pdf ->Cell(20 ,5,'',0,0);
$pdf ->Cell(15 ,5,'Date:',0,0);
$pdf ->Cell(55 ,5,'','B',0);
$pdf ->Cell(20 ,5,'',0,0);
$pdf ->Cell(15 ,5,'Date:',0,0);
$pdf ->Cell(55 ,5,'','B',0);
$pdf ->Cell(20 ,5,'',0,1);
$pdf ->Cell(200 ,5,'',0,1);
$pdf ->Cell(20 ,5,'',0,0);
$pdf ->Cell(70 ,5,'Approved by:',0,0);
$pdf ->Cell(20 ,5,'',0,0);
$pdf ->Cell(70 ,5,'Approved by:',0,0);
$pdf ->Cell(20 ,5,'',0,1);

$pdf ->Cell(20 ,10,'',0,0);
$pdf ->Cell(70 ,10,'','B',0);
$pdf ->Cell(20 ,5,'',0,0);
$pdf ->Cell(70 ,5,'',0,0,'C');
$pdf ->Cell(20 ,5,'',0,1);

$pdf ->Cell(20 ,10,'',0,0);
$pdf ->Cell(70 ,10,'',0,0);
$pdf ->Cell(20 ,5,'',0,0);
$pdf ->Cell(70 ,5,'','B',0,'C');
$pdf ->Cell(20 ,5,'',0,1);

$pdf ->Cell(20 ,5,'',0,0);
$pdf ->Cell(70 ,5,'Enrollment Adviser',0,0,'C');
$pdf ->Cell(20 ,5,'',0,0);
$pdf ->Cell(70 ,5,'College Dean',0,0,'C');
$pdf ->Cell(20 ,5,'',0,1);

$pdf ->Cell(20 ,5,'',0,0);
$pdf ->Cell(15 ,5,'Date:',0,0);
$pdf ->Cell(55 ,5,'','B',0);
$pdf ->Cell(20 ,5,'',0,0);
$pdf ->Cell(15 ,5,'Date:',0,0);
$pdf ->Cell(55 ,5,'','B',0);
$pdf ->Cell(20 ,5,'',0,0);

$pdf ->Output();
?>
