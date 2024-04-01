<?php

session_start();
require '../../../includes/conn.php';
include '../../../includes/session.php';
require('../../fpdf/fpdf.php');


if (isset($_GET['semester'])) {
    $semester = $_GET['semester'];
    $academic_year = $_GET['academic_year'];
    
} else {
    $semester = $_SESSION['S'];
    $academic_year = $_SESSION['AC'];
    
}

class PDF extends FPDF
{

// Page header

function Header()
{   
    if (isset($_GET['semester'])) {
    $semester = $_GET['semester'];
    $academic_year = $_GET['academic_year'];
    
    } else {
        $semester = $_SESSION['S'];
        $academic_year = $_SESSION['AC'];
    
}
 
    // Logo(x axis, y axis, height, width)
    $this->Image('../../../assets/img/logos/logo.png',11,6,10, 10);
    // font(font type,style,font size)
    $this->SetFont('Times','B',16);
    $this->SetTextColor(255,0,0);
    // Dummy cell
    // //cell(width,height,text,border,end line,[align])
    $this->Cell(110,5,'Saint Francis of Assisi College',0,1,'C');
    $this->SetTextColor(0,0,0);
    $this->SetFont('Arial','',9);
    // dummy cell
    
    // //cell(width,height,text,border,end line,[align])
    $test = utf8_decode("Piñas");
    $this->Cell(97,5,'96 Bayanan, City of Bacoor',0,1,'C');
    // Line break
    $this->Ln(2);
    $this->SetFont('Arial','B',12);
    // //cell(width,height,text,border,end line,[align])
    $this->Cell(97,5,'COLLEGE DEPARTMENT',0,1,'C');
    $this->SetFont('Arial','B',12);
    $this->Cell(97,5,$semester.' '.$academic_year,0,1,'C');
    $this->SetFont('Arial','B',12);
    // //cell(width,height,text,border,end line,[align])
    
    $this->Cell(97,5,$_GET['term'] . " Examination Permit",0,1,'C');
    
    $this->Ln(1);

}


// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-5);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    $this->SetTextColor(255,0,0);
    // Page number
    $this->Cell(0,5,'',0,1,'C');
    $this->SetFont('Arial','',8);
    $this->SetTextColor(0,0,0);
    $this->Cell(0,5,"",0,0,'R');
}


}




$pdf = new PDF('P','mm',array(107.95,139.7));
//left top right
$pdf->SetMargins(5,8,5,5);
$page_number = 0;

if ($_GET['print_for'] == "all") {
    $deptAll = mysqli_query($db, "SELECT * FROM tbl_departments");
} else {
    $deptAll = mysqli_query($db, "SELECT * FROM tbl_departments WHERE department_id = '$_GET[print_for]'");
}

while ($displayPerDept = mysqli_fetch_array($deptAll)) {

    $query = mysqli_query($db, "SELECT *,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname FROM tbl_schoolyears 
    LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
    LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
    LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
    LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id
    where ay_id = '$academic_year' and tbl_courses.department_id='$displayPerDept[department_id]' and sem_id = '$semester' and remark= 'Approved' ORDER BY tbl_courses.course, tbl_schoolyears.year_id, lastname") or die(mysqli_error($db));

if (empty(mysqli_num_rows($query))) {

    continue;

} else {
    
    

while ($row= mysqli_fetch_array ($query)) { 
    $pdf ->AddPage();
    $pdf->Ln(1);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(15,5,"Name: ",0,0);
    $pdf->SetFont('Arial','',12);

    $fontsize = 12;
    $tempFontSize = $fontsize;
    $cellwidth = 80;
    $fullname = utf8_decode($row['fullname']);

    while ($pdf->GetStringWidth($fullname) > $cellwidth){
        $pdf->SetFontSize($tempFontSize -= 0.1);
    }
    

    $pdf->Cell(82,5,utf8_decode($fullname),0,1);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(20,5,"Course: ",0,0);
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(28,5,$row['course_abv'],0,0);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(30,5,"Date Issued: ", 0,0);
    $pdf->SetFont('Arial','',12);
    
    $fontsize = 12;
    $tempFontSize = $fontsize;
    $cellwidth = 19;
    $date = date("Y-m-d");
    
    while ($pdf->GetStringWidth($date) > $cellwidth){
        $pdf->SetFontSize($tempFontSize -= 0.1);
    }
    
    $pdf->Cell(19,5,$date,0,1);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(20,5,"OR No.: ",0,0);
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(28,5,"",0,0);
    
    $name = $_SESSION['name'];
    $fontsize = 12;
    $tempFontSize = $fontsize;
    $cellwidth = 19;
    
    while ($pdf->GetStringWidth($name) > $cellwidth){
        $pdf->SetFontSize($tempFontSize -= 0.1);
    }
    
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(30,5,"Issued By: ", 0,0);
    $pdf->SetFont('Arial','',12);
    
    $pdf->Cell(19,5,$name,0,1);
    $pdf->SetFont('Arial','',9);

    $pdf->Ln(3);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(10,5,"Code",1,0,'C');
    $pdf->Cell(42,5,"Description",1,0,'C');
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(10,5,"Units",1,0,'C');
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(20,5,"Signiture",1,0,'C');
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(15,5,"Remarks",1,1,'C');

    $select_course = mysqli_query($db, "SELECT *,CONCAT(tbl_faculties_staff.faculty_lastname, ', ', tbl_faculties_staff.faculty_firstname, ' ', tbl_faculties_staff.faculty_middlename)  as fullname, tbl_students.stud_id,tbl_subjects_new.subj_id,tbl_schedules.class_id,tbl_faculties_staff.faculty_id FROM tbl_enrolled_subjects
    LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
    LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id
    LEFT JOIN tbl_schedules ON tbl_schedules.class_id = tbl_enrolled_subjects.class_id
    LEFT JOIN tbl_faculties_staff ON tbl_faculties_staff.faculty_id = tbl_schedules.faculty_id
    WHERE tbl_enrolled_subjects.stud_id = '$row[stud_id]' AND tbl_subjects_new.course_id = '$row[course_id]' AND tbl_enrolled_subjects.acad_year = '$academic_year' AND tbl_enrolled_subjects.semester = '$semester' ORDER BY enrolled_subj_id ASC");

    $y = $pdf->Gety();
    while ($row1 = mysqli_fetch_array($select_course)) {
        $pdf->SetXY(5, $y);
        $pdf->SetFont('Arial','',12);
        
        $fontsize = 12;
        $tempFontSize = $fontsize;
        $cellwidth = 9;
        $subject_code = utf8_decode($row1['subj_code']);
    
        while ($pdf->GetStringWidth($subject_code) > $cellwidth){
            $pdf->SetFontSize($tempFontSize -= 0.1);
        }
        
        $pdf->Cell(10,5,$subject_code,1,0,'C');
        
        $fontsize = 12;
        $tempFontSize = $fontsize;
        $cellwidth = 41;
        $subject = utf8_decode($row1['subj_desc']);
    
        while ($pdf->GetStringWidth($subject) > $cellwidth){
            $pdf->SetFontSize($tempFontSize -= 0.1);
        }
        
        $pdf->Cell(42,5,$subject,1,0,'C');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(10,5,$row1['unit_total'],1,0,'C');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(20,5,"",1,0,'C');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(15,5,"",1,1,'C');
        
        $y = $y + 5;

    }
    $boxes = (115 - $y)/5;
    
    for ($x = 1; $x < $boxes; $x++) {
        
        $pdf->SetXY(5, $y);
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(10,5,"",1,0,'C');
        $pdf->Cell(42,5,"",1,0,'C');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(10,5,"",1,0,'C');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(20,5,"",1,0,'C');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(15,5,"",1,1,'C');
        
        $y = $y + 5;
        
    }
    
    $page_number ++;
    $pdf->SetXY(92, $y+3);
    $pdf->SetFont('Arial','B',7);
    $pdf->Cell(10,3,"page ". $page_number,0,0,'C');
    
    
}

}

}

$pdf ->Output();
?>