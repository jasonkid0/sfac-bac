<?php

session_start();
require '../../../includes/conn.php';
include '../../../includes/session.php';
require'../../fpdf/fpdf.php';


if (isset($_GET['semester'])) {
    $semester = $_GET['semester'];
    $academic_year = $_GET['academic_year'];
    $student_type = $_GET['student_type'];
    $year_level = $_GET['year_level'];
    
} else {
    $semester = $_SESSION['S'];
    $academic_year = $_SESSION['AC'];
    $student_type = "All";
    $year_level = "All";
    
}

class PDF extends FPDF
{

// Page header

function Header()
{   
    if (isset($_GET['semester'])) {
    $semester = $_GET['semester'];
    $academic_year = $_GET['academic_year'];
    $student_type = $_GET['student_type'];
    $year_level = $_GET['year_level'];
    
} else {
    $semester = $_SESSION['S'];
    $academic_year = $_SESSION['AC'];
    $student_type = "All";
    $year_level = "All";
    
}
    // Logo(x axis, y axis, height, width)
    $this->Image('../../../assets/img/logos/logo.png',27,3,19,19);
    // font(font type,style,font size)
    $this->SetFont('Times','B',28);
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
    
    // //cell(width,height,text,border,end line,[align])
    $test = utf8_decode("Piñas");
    $this->Cell(0,3,'96 Bayanan, City of Bacoor',0,0,'C');
    // Line break
    $this->Ln(4);
    $this->SetFont('Arial','B',12);
    // //cell(width,height,text,border,end line,[align])
    $this->Cell(0,4,'COLLEGE DEPARTMENT',0,0,'C');
    // Line break
    $this->Ln(8);
    $this->SetFont('Arial','B',14);
    // //cell(width,height,text,border,end line,[align])
    $this->Cell(0,6,'Master List',0,1,'C');
    $this->SetFont('Arial','B',10);
    $this->Cell(0,4,$semester.' '.$academic_year,0,1,'C');
    $this->Ln(5);

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


$deptAll = mysqli_query($db, "SELECT * FROM tbl_departments");

while ($displayPerDept = mysqli_fetch_array($deptAll)) {
    
    if ($student_type == "All" && $year_level == "All") {

    $query = mysqli_query($db, "SELECT *,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname FROM tbl_schoolyears 
    LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
    LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
    LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
    LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id
    where ay_id = '$academic_year' and tbl_courses.department_id='$displayPerDept[department_id]' and sem_id = '$semester' and remark= 'Approved' ORDER BY tbl_courses.course, tbl_schoolyears.year_id, lastname") or die(mysqli_error($db));
    
    } else {
        if ($student_type != "All" && $year_level == "All") {
            $query = mysqli_query($db, "SELECT *,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname FROM tbl_schoolyears 
            LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
            LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
            LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
            LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id
            where tbl_schoolyears.status = '$student_type' AND ay_id = '$academic_year' and tbl_courses.department_id='$displayPerDept[department_id]' and sem_id = '$semester' and remark= 'Approved' ORDER BY tbl_courses.course, tbl_schoolyears.year_id, lastname") or die(mysqli_error($db));
    
        } else {
            $query = mysqli_query($db, "SELECT *,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname FROM tbl_schoolyears 
            LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
            LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
            LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
            LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id
            where tbl_year_levels.year_level = '$year_level' AND ay_id = '$academic_year' and tbl_courses.department_id='$displayPerDept[department_id]' and sem_id = '$semester' and remark= 'Approved' ORDER BY tbl_courses.course, tbl_schoolyears.year_id, lastname") or die(mysqli_error($db));
    
        }
    }

if (empty(mysqli_num_rows($query))) {

    continue;

} else {

$pdf ->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,5,"$displayPerDept[department_name]",0,1);
$pdf->Cell(0,3,"",0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(85,5,"Name",1,0);
$pdf->Cell(51,5,"LSA",1,0);
$pdf->Cell(30,5,"Course",1,0);
$pdf->Cell(30,5,"Year Level",1,1);
$pdf->SetFont('Arial','',9);
$x = 1;

while ($row= mysqli_fetch_array ($query)) {   
    $pdf->Cell(6,5,$x,0,0);

    $fontsize = 9;
    $tempFontSize = $fontsize;
    $cellwidth = 85;
    $fullname = utf8_decode($row['fullname']);

    while ($pdf->GetStringWidth($fullname) > $cellwidth){
        $pdf->SetFontSize($tempFontSize -= 0.1);
    }
    $pdf->Cell(85,5,strtoupper($fullname),0,0);
    $pdf->SetFont('Arial','',9);

    $fontsize = 9;
    $tempFontSize = $fontsize;
    $cellwidth = 45;
    $lastschool = utf8_decode($row['lastschool']);

    while ($pdf->GetStringWidth($lastschool) > $cellwidth){
        $pdf->SetFontSize($tempFontSize -= 0.1);
    }
    $pdf->Cell(45,5,utf8_decode($lastschool),0,0);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(6,5,'',0,0);
    
    $pdf->Cell(30,5,$row['course_abv'],0,0);
    $pdf->Cell(30,5,$row['year_abv'],0,1);
    
    $x++;

}

}

}


$pdf ->Output();
?>