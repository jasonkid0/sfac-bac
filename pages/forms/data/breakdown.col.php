<?php
require('../../fpdf/fpdf.php');
require '../../../includes/conn.php';



class PDF extends FPDF
{

    // Page header

    function Header()
    {
        require '../../../includes/conn.php';
        $getAAcadYear = $db->query("SELECT * FROM tbl_active_acads AC LEFT JOIN tbl_acadyears A ON A.ay_id = AC.ay_id");
        while ($row = $getAAcadYear->fetch_array()) {
            $_SESSION['AC'] = $row['academic_year'];
            $_SESSION['AYear'] = $row['ay_id'];
        }

        $getASem = $db->query("SELECT * FROM tbl_active_sem ASEM LEFT JOIN tbl_semesters S ON S.sem_id = ASEM.sem_id");
        while ($row = $getASem->fetch_array()) {
            $_SESSION['S'] = $row['semester'];
            $_SESSION['ASem'] = $row['sem_id'];
        }

        $date = new DateTime($_GET['date']);
        // Logo(x axis, y axis, height, width)
        // $this->Image('../../assets/images/auth/logo.jpg', 27, 13, 19, 19);
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
        $this->Cell(0, 2, 'Daily Enrollment Update', 0, 0, 'C');
        // Line break
        $this->Ln(4);
        $this->SetFont('Arial', 'B', 12);
        // //cell(width,height,text,border,end line,[align])
        $this->Cell(0, 4, 'HIGHER EDUCATION', 0, 1, 'C');
        // Line break
        $this->Ln(1);
        $this->SetFont('Arial', 'B', 14);
        // //cell(width,height,text,border,end line,[align])
        $this->Cell(0, 6,$_SESSION['S'] .' '. $_SESSION['AC'], 0, 1, 'C');
        $this->SetFont('Arial', 'B', 13);
        // //cell(width,height,text,border,end line,[align])
        $this->Cell(0, 6, $date->format("F j, Y"), 0, 1, 'C');
        $this->Ln(1);
        $this->SetTextColor(0, 0, 225);
        $this->Cell(0, 6, 'BACOOR CAMPUS', 0, 1, 'C');
        $this->SetFont('Arial', 'B', 10);
        $this->Ln(5);
        $this->Rect(5,11,205,320); // box
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
$pdf->SetMargins(5, 10, 5);
$pdf->AddPage();

$getAAcadYear = $db->query("SELECT * FROM tbl_active_acads AC LEFT JOIN tbl_acadyears A ON A.ay_id = AC.ay_id");
while ($row = $getAAcadYear->fetch_array()) {
    $_SESSION['AC'] = $row['academic_year'];
    $_SESSION['AYear'] = $row['ay_id'];
}

$getASem = $db->query("SELECT * FROM tbl_active_sem ASEM LEFT JOIN tbl_semesters S ON S.sem_id = ASEM.sem_id");
while ($row = $getASem->fetch_array()) {
    $_SESSION['S'] = $row['semester'];
    $_SESSION['ASem'] = $row['sem_id'];
}

$getPAcadYear = $db->query("SELECT * FROM tbl_acadyears WHERE academic_year < '$_SESSION[AC]' ORDER BY academic_year DESC LIMIT 1");
while ($row = $getPAcadYear->fetch_array()) {
    $_SESSION['PC'] = $row['academic_year'];
    $_SESSION['PYear'] = $row['ay_id'];
}

$date = $_GET['date'];

$pass_date = date('Y-m-d', strtotime($date. ' - 1 year'));

$past_enrollment_update_date = mysqli_query($db, "SELECT date FROM tbl_enrollment_update WHERE date <= '$pass_date' ORDER BY date DESC LIMIT 1") or die(mysqli_error($db));
$past = mysqli_fetch_array($past_enrollment_update_date);

$school = ['College']; /////////////////////////////////////////////////// change this if you want to add or remove another department/ level


// $pdf ->Rect(7,76,150,64); // box


$height = 65;

foreach ($school as $index) {

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetTextColor(240, 0, 0);  
$pdf->Cell(0, 5, $index, 0, 1);

// college
$pdf->SetTextColor(0, 0, 0);
$pdf->Ln(1);
$pdf->SetFont('Arial', '', 8);
$pdf ->Rect(5,$height,35,12);//box
$pdf->Cell(35, 12, 'PARTICULARS', 0, 0,'C');
$pdf ->Rect(40,$height,26,12);//box
$pdf->Cell(26, 12, 'SY 2021-2022', 0,0,'C'); // lalagyan ata year dito boi nice galeng
$pdf ->Rect(66,$height,26,12);//box
$pdf->Cell(26, 12, 'SY 2022-2023', 0, 0,'C'); // year
$pdf ->Rect(92,$height,20,12);//box
$pdf->Cell(20, 12, 'VARIANCE', 0, 0,'C');
//

$pdf->Cell(7, 12, '', 0, 0,'C');
$pdf ->Rect(120,$height,30,12); // line Tar
$pdf->Cell(30, 12, 'TARGET', 0, 0,'C');
$pdf ->Rect(150,$height,30,12); // line 
$pdf->Cell(30, 12, 'ENROLLEES', 0, 0,'C');
$pdf ->Rect(180,$height,30,12); // line v
$pdf->Cell(30, 12, 'VARIANCE', 0, 1,'C');

$target_status = mysqli_query($db, "SELECT SUM(target_new) as count_new, SUM(target_old) as count_old FROM tbl_target WHERE ay_id = '$_SESSION[AYear]'") or die(mysqli_error($db));
$row = mysqli_fetch_array($target_status);

$enrollment_status = mysqli_query($db, "SELECT status, SUM(CASE WHEN status = 'Old' THEN 1 ELSE 0 END) AS count_old, SUM(CASE WHEN status = 'New' THEN 1 ELSE 0 END) AS count_new FROM tbl_schoolyears
LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
WHERE remark = 'Approved'
AND sem_id = '$_SESSION[S]'
AND ay_id = '$_SESSION[AC]'");
$row2 = mysqli_fetch_array($enrollment_status);

$enrollment_update_status = mysqli_query($db, "SELECT SUM(daily_new) AS daily_new, SUM(daily_old) AS daily_old, SUM(walkin) AS walkin, SUM(online) AS online
FROM tbl_enrollment_update WHERE date = '$date'") or die(mysqli_error($db));
$row3 = mysqli_fetch_array($enrollment_update_status);

$enrollment_update_status = mysqli_query($db, "SELECT COALESCE(SUM(daily_new), 0) AS daily_new, COALESCE(SUM(daily_old), 0) AS daily_old, COALESCE(SUM(walkin), 0) AS walkin, COALESCE(SUM(online), 0) AS online
FROM tbl_enrollment_update WHERE date = '$past[date]'") or die(mysqli_error($db));
$row4 = mysqli_fetch_array($enrollment_update_status);



$pdf->SetFillColor(253, 218,13);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(18, 12, 'INQUIRIES', 1, 0,'C');
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(17,6,'Walk-in',1,0,'C');
$pdf->Cell(26,6,$row4['walkin'],1,0,'C');// data
$pdf->Cell(26,6,$row3['walkin'],1,0,'C');//
$pdf->Cell(20,6,$row3['walkin'] - $row4['walkin'],1,0,'C');//

$pdf->Cell(8, 12, '',0, 0,'C');
$pdf->Cell(10,6,'New',1,0,'C');
$pdf->Cell(20,6,$row['count_new'],1,0, 'C');//space
$pdf->Cell(10,6,'New',1,0,'C');// for col
$pdf->Cell(20,6,$row2['count_new'],1,0,'C',true);// data
$pdf->Cell(10,6,'New',1,0,'C');// for vari
$pdf->Cell(20,6,$row2['count_new'] - $row['count_new'],1,1,'C',true);// data

$pdf->SetFillColor(253, 218,13);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(18,2,'',0,0);
$pdf->Cell(17,6,'Online',1,0,'C');
$pdf->Cell(26,6,$row4['online'],1,0,'C');// data
$pdf->Cell(26,6,$row3['online'],1,0,'C');//
$pdf->Cell(20,6,$row3['online'] + $row4['online'],1,0,'C');//

$pdf->Cell(8,6,'',0,0,'C');//
$pdf->Cell(10,6,'Old',1,0,'C');
$pdf->Cell(20,6,$row['count_old'],1,0,'C');// data
$pdf->Cell(10,6,'Old',1,0,'C');
$pdf->Cell(20,6,$row2['count_old'],1,0,'C',true);// data
$pdf->Cell(10,6,'Old',1,0,'C');
$pdf->Cell(20,6,$row2['count_old'] - $row['count_old'],1,1,'C',true);// data


//
$pdf->SetFillColor(253, 218,13);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(18, 12, 'ENROLLEES', 1, 0,'C');
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(17,6,'Old',1,0,'C');
$pdf->Cell(26,6,$row4['daily_old'],1,0,'C');// data
$pdf->Cell(26,6,$row3['daily_old'],1,0,'C',true);//
$pdf->Cell(20,6,$row3['daily_old'] - $row4['daily_old'],1,0,'C');//
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(8,6,'',0,0,'C');//
$pdf->Cell(10,6,'TOTAL',1,0,'C');
$pdf->Cell(20,6,$row['count_new'] + $row['count_old'],1,0,'C');// data
$pdf->Cell(10,6,'TOTAL',1,0,'C');
$pdf->Cell(20,6,$row2['count_new'] + $row2['count_old'],1,0,'C',true);// data
$pdf->Cell(10,6,'TOTAL',1,0,'C');
$pdf->Cell(20,6,($row2['count_new'] - $row['count_new']) + ($row2['count_old'] - $row['count_old']),1,1,'C',true);// data

$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(18,2,'',0,0);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(17,6,'New',1,0,'C');
$pdf->Cell(26,6,$row4['daily_new'],1,0,'C');// data
$pdf->Cell(26,6,$row3['daily_new'],1,0,'C',true);//
$pdf->Cell(20,6,$row3['daily_new'] - $row4['daily_new'],1,1,'C');//


$height = $height + 43;
$pdf->Ln(1);

}

$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 15);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(205, 20, 'D  E  T  A  I  L  S', 1, 1,'C');

$height = $height + 25;

$pdf->Ln(7);

$pdf->SetFont('Arial', 'B', 9);
$pdf->SetFillColor(245, 0,0);
$pdf ->Rect(5,$height,35,12,true);//box
$pdf ->Rect(5,$height,35,12);//box
$pdf->SetFillColor(255, 0,0);
$pdf->Cell(35, 11.5, 'PARTICULARS', 0, 0,'C');

$pdf->SetFillColor(253, 218,13);
$pdf ->Rect(40,$height,34,12,true);//box
$pdf ->Rect(40,$height,34,12);//box
$pdf->Cell(34, 6, 'Final Enrollment', 0, 0,'C');
$pdf ->Rect(74,$height,34,12,true);//box
$pdf ->Rect(74,$height,34,12);//box

$pdf->Cell(34, 6, 'Targets/Levels', 0, 0,'C');
$pdf ->Rect(108,$height,34,12,true);//box
$pdf ->Rect(108,$height,34,12);//box
$pdf->Cell(34, 6, 'Enrollees', 0, 0,'C');
$pdf ->Rect(142,$height,34,12,true);//box
$pdf ->Rect(142,$height,34,12);//box
$pdf->Cell(34, 6, 'Total Enrollees', 0, 0,'C');
$pdf ->Rect(176,$height,34,12,true);//box
$pdf ->Rect(176,$height,34,12);//box
$pdf->Cell(34, 6, 'Total Reservation', 0, 1,'C');

// sy year
$pdf->SetFillColor(253, 218,13);
$pdf->Cell(35, 1, '', 0, 0, 'C');//space
$pdf->Cell(34, 1, 'SY ', 0, 0, 'C');
$pdf->Cell(34, 1, 'SY ', 0, 0, 'C');
$pdf->Cell(34, 1, 'for the day', 0, 0,'C');
$pdf->Cell(34, 1, 'S.Y.', 0, 0, 'C');
$pdf->Cell(34, 1, 'S.Y.', 0, 1, 'C');
$pdf->Ln(4);

$height = $height + 12;

// DET table  ------------------------

foreach ($school as $index) {


$pdf->SetFont('Arial', '', '9');
//$pdf ->Rect(6,170,30,12);//box
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFillColor(3,146,255);
// table new old tol. in col
$pdf ->Rect(5,$height,35,5,true);//box
$pdf ->Rect(5,$height,35,5);//box
$pdf->Cell(35, 5, $index, 0, 0,'C');
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFillColor(178, 190, 181);

$pdf ->Rect(40,$height,11,5,true);//box
$pdf ->Rect(40,$height,11,5);//box
$pdf->Cell(11,5,'New',0,0,'C');

$pdf ->Rect(51,$height,11,5,true);//box
$pdf ->Rect(51,$height,11,5);//box
$pdf->Cell(11,5,'Old',0,0,'C');

$pdf ->Rect(62,$height,12,5,true);//box
$pdf ->Rect(62,$height,12,5);//box
$pdf->Cell(12,5,'Total',0,0,'C');
//
$pdf ->Rect(74,$height,11,5,true);//box
$pdf ->Rect(74,$height,11,5);//box
$pdf->Cell(11,5,'New',0,0,'C');
$pdf->SetTextColor(0, 0, 0);
$pdf ->Rect(85,$height,11,5,true);//box
$pdf ->Rect(85,$height,11,5);//box
$pdf->Cell(11,5,'Old',0,0,'C');
$pdf ->Rect(96,$height,12,5,true);//box
$pdf ->Rect(96,$height,12,5);//box
$pdf->Cell(12,5,'Total',0,0,'C');
//
$pdf ->Rect(108,$height,11,5,true);//box
$pdf ->Rect(108,$height,11,5);//box
$pdf->Cell(11,5,'New',0,0,'C');
$pdf->SetTextColor(0, 0, 0);
$pdf ->Rect(119,$height,11,5,true);//box
$pdf ->Rect(119,$height,11,5);//box
$pdf->Cell(11,5,'Old',0,0,'C');
$pdf ->Rect(130,$height,12,5,true);//box
$pdf ->Rect(130,$height,12,5);//box
$pdf->Cell(12,5,'Total',0,0,'C');
//
$pdf ->Rect(142,$height,11,5,true);//box
$pdf ->Rect(142,$height,11,5);//box
$pdf->Cell(11,5,'New',0,0,'C');
$pdf->SetTextColor(0, 0, 0);
$pdf ->Rect(153,$height,11,5,true);//box
$pdf ->Rect(153,$height,11,5);//box
$pdf->Cell(11,5,'Old',0,0,'C');
$pdf ->Rect(164,$height,12,5,true);//box
$pdf ->Rect(164,$height,12,5);//box
$pdf->Cell(12,5,'Total',0,0,'C');
//
$pdf ->Rect(176,$height,11,5,true);//box
$pdf ->Rect(176,$height,11,5);//box
$pdf->Cell(11,5,'New',0,0,'C');
$pdf->SetTextColor(0, 0, 0);
$pdf ->Rect(187,$height,11,5,true);//box
$pdf ->Rect(187,$height,11,5);//box
$pdf->Cell(11,5,'Old',0,0,'C');
$pdf ->Rect(198,$height,12,5,true);//box
$pdf ->Rect(198,$height,12,5);//box
$pdf->Cell(12,5,'Total',0,1,'C');

$height = $height + 5;

$sub_target_new = 0;
$sub_target_old = 0;
$sub_target_total = 0;

$sub_past_enrollees_new = 0;
$sub_past_enrollees_old = 0;
$sub_past_enrollees_total = 0;

$sub_daily_new = 0;
$sub_daily_old = 0;
$sub_daily_total = 0;

$sub_enrollees_new = 0;
$sub_enrollees_old = 0;
$sub_enrollees_total = 0;

$sub_reservations_new = 0;
$sub_reservations_old = 0;
$sub_reservations_total = 0;

$department = mysqli_query($db, "SELECT * FROM tbl_departments WHERE department_id NOT IN ('7', '8', '9', '10')");
while ($row = mysqli_fetch_array($department)) {

$previous_enrollment_status = mysqli_query($db, "SELECT status, SUM(CASE WHEN status = 'Old' THEN 1 ELSE 0 END) AS count_old, SUM(CASE WHEN status = 'New' THEN 1 ELSE 0 END) AS count_new FROM tbl_schoolyears
LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
WHERE remark = 'Approved'
AND department_id = '$row[department_id]'
AND sem_id = '$_SESSION[S]'
AND ay_id = '$_SESSION[PC]'");

$enrollment_status = mysqli_query($db, "SELECT status, SUM(CASE WHEN status = 'Old' THEN 1 ELSE 0 END) AS count_old, SUM(CASE WHEN status = 'New' THEN 1 ELSE 0 END) AS count_new FROM tbl_schoolyears
LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
WHERE remark = 'Approved'
AND department_id = '$row[department_id]'
AND sem_id = '$_SESSION[S]'
AND ay_id = '$_SESSION[AC]'");

$target_status = mysqli_query($db, "SELECT * FROM tbl_target WHERE ay_id = '$_SESSION[AYear]' AND department_id = '$row[department_id]'") or die(mysqli_error($db));

$enrollment_update_status = mysqli_query($db, "SELECT * FROM tbl_enrollment_update WHERE date = '$date' AND department_id = '$row[department_id]'") or die(mysqli_error($db));

$pdf ->Rect(5,$height,35,5);//box
$pdf ->Rect(5,$height,35,5);//box
$pdf->Cell(35, 5, $row['dept_abv'], 0, 0,'C');
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFillColor(178, 190, 181);

$row2 = mysqli_fetch_array($previous_enrollment_status);

$sub_past_enrollees_new = $sub_past_enrollees_new + $row2['count_new'];
$sub_past_enrollees_old = $sub_past_enrollees_old + $row2['count_old'];
$sub_past_enrollees_total = $sub_past_enrollees_total + ($row2['count_new'] + $row2['count_old']);

$pdf ->Rect(40,$height,11,5);//box
$pdf ->Rect(40,$height,11,5);//box
$pdf->Cell(11,5,$row2['count_new'],0,0,'C');
$pdf ->Rect(51,$height,11,5);//box
$pdf ->Rect(51,$height,11,5);//box
$pdf->Cell(11,5,$row2['count_old'],0,0,'C');
$pdf ->Rect(62,$height,12,5, true);//box
$pdf ->Rect(62,$height,12,5);//box
$pdf->Cell(12,5,$row2['count_new'] + $row2['count_old'],0,0,'C');
//

$row2 = mysqli_fetch_array($target_status);

$sub_target_new = $sub_target_new + $row2['target_new'];
$sub_target_old = $sub_target_old + $row2['target_old'];
$sub_target_total = $sub_target_total + ($row2['target_new'] + $row2['target_old']);

$pdf ->Rect(74,$height,11,5);//box
$pdf ->Rect(74,$height,11,5);//box
$pdf->Cell(11,5,$row2['target_new'],0,0,'C');
$pdf->SetTextColor(0, 0, 0);
$pdf ->Rect(85,$height,11,5);//box
$pdf ->Rect(85,$height,11,5);//box
$pdf->Cell(11,5,$row2['target_old'],0,0,'C');
$pdf ->Rect(96,$height,12,5, true);//box
$pdf ->Rect(96,$height,12,5);//box
$pdf->Cell(12,5,$row2['target_new'] + $row2['target_old'],0,0,'C');
//

$row3 = mysqli_fetch_array($enrollment_update_status);

$sub_daily_new = $sub_daily_new + $row3['daily_new'];
$sub_daily_old = $sub_daily_old + $row3['daily_old'];
$sub_daily_total = $sub_daily_total + ($row3['daily_new'] + $row3['daily_old']);

$sub_reservations_new = $sub_reservations_new + $row3['reservations_new'];
$sub_reservations_old = $sub_reservations_old + $row3['reservations_old'];
$sub_reservations_total = $sub_reservations_total + ($row3['reservations_new'] + $row3['reservations_old']);

$pdf ->Rect(108,$height,11,5);//box
$pdf ->Rect(108,$height,11,5);//box
$pdf->Cell(11,5,$row3['daily_new'],0,0,'C');
$pdf->SetTextColor(0, 0, 0);
$pdf ->Rect(119,$height,11,5);//box
$pdf ->Rect(119,$height,11,5);//box
$pdf->Cell(11,5,$row3['daily_old'],0,0,'C');
$pdf ->Rect(130,$height,12,5, true);//box
$pdf ->Rect(130,$height,12,5);//box
$pdf->Cell(12,5,$row3['daily_new'] + $row3['daily_old'],0,0,'C');
//

$row2 = mysqli_fetch_array($enrollment_status);

$sub_enrollees_new = $sub_enrollees_new + $row2['count_new'];
$sub_enrollees_old = $sub_enrollees_old + $row2['count_old'];
$sub_enrollees_total = $sub_enrollees_total + ($row2['count_new'] + $row2['count_old']);

$pdf ->Rect(142,$height,11,5);//box
$pdf ->Rect(142,$height,11,5);//box
$pdf->Cell(11,5,$row2['count_new'],0,0,'C');
$pdf ->Rect(153,$height,11,5);//box
$pdf ->Rect(153,$height,11,5);//box
$pdf->Cell(11,5,$row2['count_old'],0,0,'C');
$pdf ->Rect(164,$height,12,5, true);//box
$pdf ->Rect(164,$height,12,5);//box
$pdf->Cell(12,5,$row2['count_new'] + $row2['count_old'],0,0,'C');
//

$pdf ->Rect(176,$height,11,5);//box
$pdf ->Rect(176,$height,11,5);//box
$pdf->Cell(11,5,$row3['reservations_new'],0,0,'C');
$pdf->SetTextColor(0, 0, 0);
$pdf ->Rect(187,$height,11,5);//box
$pdf ->Rect(187,$height,11,5);//box
$pdf->Cell(11,5,$row3['reservations_old'],0,0,'C');
$pdf ->Rect(198,$height,12,5, true);//box
$pdf ->Rect(198,$height,12,5);//box
$pdf->Cell(12,5,$row3['reservations_new'] + $row3['reservations_old'],0,1,'C');

$height = $height + 5;
}

///////////////////////////////////////////////////////////////////////////////
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFillColor(245, 0,0);
$pdf->SetFont('Arial', '', '9');
$pdf ->Rect(5,$height,35,5,true);//box
$pdf ->Rect(5,$height,35,5);//box
$pdf->Cell(35, 5, 'SUB-TOTAL', 0, 0,'C');
$pdf ->Rect(40,$height,11,5,true);//box
$pdf ->Rect(40,$height,11,5);//box
$pdf->Cell(11,5,$sub_past_enrollees_new,0,0,'C'); //DATA
$pdf ->Rect(51,$height,11,5,true);//box
$pdf ->Rect(51,$height,11,5);//box
$pdf->Cell(11,5,$sub_past_enrollees_old,0,0,'C');//DATA
$pdf ->Rect(62,$height,12,5,true);//box
$pdf ->Rect(62,$height,12,5);//box
$pdf->Cell(12,5,$sub_past_enrollees_total,0,0,'C');//DATA
//
$pdf ->Rect(74,$height,11,5,true);//box
$pdf ->Rect(74,$height,11,5);//box
$pdf->Cell(11,5,$sub_target_new,0,0,'C'); //DATA
$pdf ->Rect(85,$height,11,5,true);//box
$pdf ->Rect(85,$height,11,5);//box
$pdf->Cell(11,5,$sub_target_old,0,0,'C');//DATA
$pdf ->Rect(96,$height,12,5,true);//box
$pdf ->Rect(96,$height,12,5);//box
$pdf->Cell(12,5,$sub_target_total,0,0,'C');//DATA
//
$pdf ->Rect(108,$height,11,5,true);//box
$pdf ->Rect(108,$height,11,5);//box
$pdf->Cell(11,5,$sub_daily_new,0,0,'C'); //DATA
$pdf ->Rect(119,$height,11,5,true);//box
$pdf ->Rect(119,$height,11,5);//box
$pdf->Cell(11,5,$sub_daily_old,0,0,'C');//DATA
$pdf ->Rect(130,$height,12,5,true);//box
$pdf ->Rect(130,$height,12,5);//box
$pdf->Cell(12,5,$sub_daily_total,0,0,'C');//DATA
//
$pdf ->Rect(142,$height,11,5,true);//box
$pdf ->Rect(142,$height,11,5);//box
$pdf->Cell(11,5,$sub_enrollees_new,0,0,'C'); //DATA
$pdf ->Rect(153,$height,11,5,true);//box
$pdf ->Rect(153,$height,11,5);//box
$pdf->Cell(11,5,$sub_enrollees_old,0,0,'C');//DATA
$pdf ->Rect(164,$height,12,5,true);//box
$pdf ->Rect(164,$height,12,5);//box
$pdf->Cell(12,5,$sub_enrollees_total,0,0,'C');//DATA
//
$pdf ->Rect(176,$height,11,5,true);//box
$pdf ->Rect(176,$height,11,5);//box
$pdf->Cell(11,5,$sub_reservations_new,0,0,'C');//DATA
$pdf ->Rect(187,$height,11,5,true);//box
$pdf ->Rect(187,$height,11,5);//box
$pdf->Cell(11,5,$sub_reservations_old,0,0,'C');//DATA
$pdf ->Rect(198,$height,12,5,true);//box
$pdf ->Rect(198,$height,12,5);//box
$pdf->Cell(12,5,$sub_reservations_total,0,1,'C');//DATA

$height = $height + 5;

}
// total table ---------------------
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFillColor(253, 218,13);
$pdf->SetFont('Arial', '', '9');
$pdf ->Rect(5,$height,35,5,true);//box
$pdf ->Rect(5,$height,35,5);//box
$pdf->Cell(35, 5, 'TOTAL', 0, 0,'C');
$pdf->SetTextColor(0, 0, 0);
$pdf ->Rect(40,$height,11,5,true);//box
$pdf ->Rect(40,$height,11,5);//box
$pdf->Cell(11,5,'',0,0,'C'); //DATA
$pdf ->Rect(51,$height,11,5,true);//box
$pdf ->Rect(51,$height,11,5);//box
$pdf->Cell(11,5,'',0,0,'C');//DATA
$pdf ->Rect(62,$height,12,5,true);//box
$pdf ->Rect(62,$height,12,5);//box
$pdf->Cell(12,5,'',0,0,'C');//DATA
//
$pdf->SetTextColor(0, 0, 0);
$pdf ->Rect(74,$height,11,5,true);//box
$pdf ->Rect(74,$height,11,5);//box
$pdf->Cell(11,5,'',0,0,'C'); //DATA
$pdf ->Rect(85,$height,11,5,true);//box
$pdf ->Rect(85,$height,11,5);//box
$pdf->Cell(11,5,'',0,0,'C');//DATA
$pdf ->Rect(96,$height,12,5,true);//box
$pdf ->Rect(96,$height,12,5);//box
$pdf->Cell(12,5,'',0,0,'C');//DATA
//
$pdf->SetTextColor(0, 0, 0);
$pdf ->Rect(108,$height,11,5,true);//box
$pdf ->Rect(108,$height,11,5);//box
$pdf->Cell(11,5,'',0,0,'C'); //DATA
$pdf ->Rect(119,$height,11,5,true);//box
$pdf ->Rect(119,$height,11,5);//box
$pdf->Cell(11,5,'',0,0,'C');//DATA
$pdf ->Rect(130,$height,12,5,true);//box
$pdf ->Rect(130,$height,12,5);//box
$pdf->Cell(12,5,'',0,0,'C');//DATA
//
$pdf->SetTextColor(0, 0, 0);
$pdf ->Rect(142,$height,11,5,true);//box
$pdf ->Rect(142,$height,11,5);//box
$pdf->Cell(11,5,'',0,0,'C'); //DATA
$pdf ->Rect(153,$height,11,5,true);//box
$pdf ->Rect(153,$height,11,5);//box
$pdf->Cell(11,5,'',0,0,'C');//DATA
$pdf ->Rect(164,$height,12,5,true);//box
$pdf ->Rect(164,$height,12,5);//box
$pdf->Cell(12,5,'',0,0,'C');//DATA
//
$pdf ->Rect(176,$height,11,5,true);//box
$pdf ->Rect(176,$height,11,5);//box
$pdf->Cell(11,5,'',0,0,'C');//DATA
$pdf ->Rect(187,$height,11,5,true);//box
$pdf ->Rect(187,$height,11,5);//box
$pdf->Cell(11,5,'',0,0,'C');//DATA
$pdf ->Rect(198,$height,12,5,true);//box
$pdf ->Rect(198,$height,12,5);//box
$pdf->Cell(12,5,'',0,1,'C');//DATA

$height = $height + 17;


$pdf->Ln(2);
$pdf->SetFont('Arial', 'B', '9');
$pdf->SetTextColor(255,0,0);
$pdf->Cell(10, 4, '', 0, 0);//space tol
$pdf->Cell(15, 4, ' *NOTES / REMARKS', 0, 0,'C');

$pdf->SetTextColor(0,0,255);
$pdf->Cell(145, 4, '', 0, 0);//space tol
$pdf->Cell(8,5,'Email (Jpeg file) REPORT to: '. $height,0,1,'C');

$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(40, 3, '', 0, 0);//space 
$pdf->Cell(262,4,'1 Immediate Heads',0,0,'C');// data for REPORT TO
$pdf->Cell(115, 3, '', 0, 0);//space 
$pdf->Cell(8,4,'',0,1,'C'); // data for REPORT TO
$pdf->Cell(71,5,'',0,0,'C'); //DATA fOR REMARKS
$pdf->Cell(195,5,'2 Central Office',0,0,'C'); //DATA fOR REPORT TO
$pdf ->Rect(35,$height,115,0);// line
$pdf->Cell(33, 3, '', 0, 0);//space 
$pdf->Cell(8,4,'',0,0,'C');// data 
$pdf->Cell(122, 3, '', 0, 0);//space 
$pdf->Cell(8,4,'',0,1,'C'); // data for REPORT TO

$height = $height + 5;

$pdf ->Rect(35,$height,115,0);// line
$height = $height + 5;
$pdf->Cell(33, 3, '', 0, 0);//space 
$pdf->Cell(8,4,'',0,0,'C');// data for 
$pdf->Cell(-18,5,'',0,0,'C'); //DATA for Remarks
$pdf->Cell(296.5,5,'3 Dr. Edgardo A. Lu',0,0,'C'); //DATA for Report to
$pdf->Cell(129, 3, '', 0, 0);//space 
$pdf->Cell(8,4,'',0,1,'C'); // data for REPORT TO
$pdf->Cell(65,5,'',0,0,'C'); //DATA for Remarks
$pdf->Cell(215,5,'4 Dr. Gilbert C. Sibala',0,0,'C'); //DATA for Report to
$pdf ->Rect(35,$height,115,0);// line
$pdf->Cell(33, 3, '', 0, 0);//space 
$pdf->Cell(8,4,'',0,0,'C');// data for REMARKS
$pdf->Cell(124, 3, '', 0, 0);//space 
$pdf->Cell(8,4,'',0,1,'C'); // data for REPORT TO
$pdf->Cell(33, 3, '', 0, 0);//space 
$pdf->Cell(8,4,'',0,0,'C');
$pdf->Cell(120, 3, '', 0, 0);//space 
$pdf->Cell(8,4,'',0,1,'C'); // data for REPORT TO

$height = $height + 15;

$pdf->Ln(1);
$pdf->SetFont('Arial', 'B', '9');
$pdf->Cell(5, 2, '', 0, 0);//space tol
$pdf->Cell(15, 2, ' PREPARED BY:', 0, 0,'C');
$pdf->SetTextColor(0,0,255);
$pdf->Cell(150, 4, '', 0, 0);//space tol
$pdf->Cell(8,5,'Private Message / Messenger',0,1,'C');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial', 'B', '9');
$pdf->Cell(40, 3, '', 0, 0);//space 
$pdf->Cell(8,4,'',0,0,'C');// data for admission office
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(115, 3, '', 0, 0);//space 
$pdf->Cell(8,4,'',0,1,'C'); // data for messenger
$pdf->Cell(40, 3, '', 0, 0);//space 
$pdf->Cell(8,4,'Admission office',0,0,'C');
$pdf->Cell(115, 3, '', 0, 0);//space 
$pdf->Cell(8,4,'',0,1,'C'); // data for  messenger
$pdf ->Rect(30,$height,40,0);// line between admissin
$pdf->Cell(33, 3, '', 0, 0, 'C');//space 
$pdf->Cell(8,4,'',0,0);
$pdf->Cell(129, 3, '', 0, 0);//space 
$pdf->Cell(8,4,'',0,1,'C'); // data for messenger
$pdf->Cell(165, 3, '', 0, 0);//space 
$pdf->Cell(8,4,'',0,1,'C'); // data for messenger

$height = $height + 18;

$pdf->SetFont('Arial', 'B', '9');
$pdf->Cell(2, 2, '', 0, 0);//space tol
$pdf->Cell(15, 2, ' NOTED BY:', 0, 1,'C');
$pdf->Cell(40, 3, '', 0, 0);//space 
$pdf->Cell(8,4,'',0,1,'C');// data for  immediate head 
$pdf ->Rect(30,$height,40,0);// line between immediate head
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(90,4,'Immediate Head',0,0,'C');

$pdf->Output();
