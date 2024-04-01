<?php
require '../../../includes/conn.php';
session_start();

if (isset($_POST['submit'])) {

    $academic_year = mysqli_real_escape_string($db, $_POST['academic_year']);

    $addAcad =  mysqli_query($db,"INSERT INTO tbl_acadyears (academic_year) values ('$academic_year')")or die (mysqli_error($db));

    if ($addAcad == true) {
        $_SESSION['successYear'] = true;
        header("location: ../add.acad.year.php");
    } else {
        $_SESSION['fill'] = true;
        header("location: ../add.acad.year.php");
    }

       
    
}