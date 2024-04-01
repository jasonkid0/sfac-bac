<?php
session_start();
include '../../includes/head.php';
// include 'accountConn/conn.php';
include '../../includes/session.php';

$assessed_id = $_GET['assessed_id'];

?>
<title>
    Edit New Assessment | SFAC - Bacoor
</title>
</head>

<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">Edit Assessment</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row mb-10">
                <div class="col-lg-9 col-12 mx-auto">
                    <div class="card card-body mt-4 shadow-sm">
                        <h5 class="font-weight-bolder mb-0">Edit Assessment</h5>
                        <p class="text-sm mb-0">Assessment Details</p>
                        <hr class="horizontal dark my-3">
                        <form method="POST" enctype="multipart/form-data" action="userData/ctrl.edit.assessment.php?assessed_id=<?php echo $assessed_id?>">
                            <?php
                                    $assessment_info = mysqli_query($db, "SELECT * FROM tbl_assessed_tf
                                    LEFT JOIN tbl_tuition_fees ON tbl_tuition_fees.tf_id = tbl_assessed_tf.tf_id
                                    WHERE assessed_id = $assessed_id") or die (mysqli_error($db));

                                    while ($row1 = mysqli_fetch_array($assessment_info)) {

                                        $student_info = mysqli_query($db, "SELECT * , CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname FROM tbl_schoolyears
                                        LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                        LEFT JOIN tbl_courses ON tbl_schoolyears.course_id = tbl_courses.course_id
                                        LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id
                                        LEFT JOIN tbl_acadyears ON tbl_acadyears.academic_year = tbl_schoolyears.ay_id
                                        LEFT JOIN tbl_semesters ON tbl_semesters.semester = tbl_schoolyears.sem_id
                                        WHERE tbl_schoolyears.stud_id = '$row1[stud_id]' AND tbl_acadyears.ay_id = '$row1[ay_id]' AND tbl_semesters.sem_id = '$row1[sem_id]'") or die (mysqli_error($db));

                                        while ($row3 = mysqli_fetch_array($student_info)) {
            
                                        $unittotal = mysqli_query($db, "SELECT SUM(unit_total) AS total_unit FROM tbl_enrolled_subjects
                                        LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id
                                        WHERE tbl_enrolled_subjects.stud_id = '$row1[stud_id]' AND tbl_enrolled_subjects.acad_year = '$row3[academic_year]' AND tbl_enrolled_subjects.semester = '$row3[semester]'") or die (mysqli_error($db));

                                        while ($row2 = mysqli_fetch_array($unittotal)) {
                                            $total_unit = $row2['total_unit'];
                                        }
                                        
                                        $discount_array = explode(",",$row1['disc_id']);
                                        $lab_array = explode(",",$row1['lab_id']);
                                        $units = explode(",",$row1['lab_units']);
                                        $nstp_array = explode(",",$row1['nstp_id']);
                                        $nstp_units = explode(",",$row1['nstp_units']);
                                    
                                        $total_tuition =($row1['tuition_fee'] * $total_unit);
                    
                            ?>
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Student Name</label>
                                        <input class="form-control" type="text" value="<?php echo $row3['fullname'];?>"
                                            name="discount_desc" disabled />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="mt-3">Semester</label>
                                        <select class="form-control" id="semester" disabled>
                                            <?php $getEAY = mysqli_query($db, "SELECT * FROM tbl_semesters WHERE sem_id = '$row1[sem_id]'");
                                            while ($row = mysqli_fetch_array($getEAY)) {
                                            ?>
                                            <option selected value="<?php echo $row['sem_id']; ?>">
                                                <?php echo $row['semester'];?>
                                            </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <input type="text" name="ay_id" value="<?php echo $ay_id; ?>" hidden>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="mt-3">Academic Year</label>
                                        <select class="form-control" id="academic_year" disabled>
                                            <?php $getEAY = mysqli_query($db, "SELECT * FROM tbl_acadyears WHERE ay_id = '$row1[ay_id]'");
                                            while ($row = mysqli_fetch_array($getEAY)) {
                                            ?>
                                            <option selected value="<?php echo $row['ay_id']; ?>">
                                                <?php echo $row['academic_year'];?>
                                            </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="mt-3">Year Level and Course</label>
                                        <input class="form-control" type="text" value="<?php echo $row3['year_level'].' - '. $row3['course_abv'];?>"
                                            name="discount" disabled/>
                                        
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="mt-3">Total Unit</label>
                                        <input class="form-control" type="text" value="<?php echo $total_unit;?>"
                                            name="discount" disabled/>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="mt-3">Tuition Fee per Unit</label>
                                        <input class="form-control" type="text" value="Php <?php echo number_format($row1['tuition_fee'], 2);?>"
                                            name="discount" disabled/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="mt-3">Total Tuition Fee</label>
                                        <input class="form-control" type="text" value="Php <?php echo number_format($total_tuition, 2);?>"
                                            name="discount" disabled/>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="mt-3">Payment</label>
                                        <select class="form-control" id="gender" name="payment">
                                            <option value="<?php echo $row1['payment'];?>"><?php echo ucfirst($row1['payment']);?></option>
                                            <?php
                                                $payments_info = mysqli_query($db, "SELECT * FROM tbl_payments WHERE NOT payment = '$row1[payment]'");
                                                while ($row = mysqli_fetch_array($payments_info)) {
                                            ?>
                                            <option value="<?php echo $row['payment']?>"><?php echo ucfirst($row['payment'])?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="mt-3">Laboratories</label>
                                        <?php
                                            $i = 0;
                                            $lab_info = mysqli_query($db,"SELECT lab_id, lab, lab_desc FROM tbl_lab_fees WHERE year_id = '$row3[year_id]' AND ay_id = '$row1[ay_id]'");
                                            while ($row5 = mysqli_fetch_array($lab_info)) {

                                        ?>
                                        <div class="form-check">
                                            <div class="row">
                                            <div class="col-sm-4">
                                            <input class="form-check-input" type="checkbox" value="<?php echo $row5['lab_id']?>" name="lab[]" <?php echo (in_array($row5['lab_id'], $lab_array) ? 'checked ': '');?>>
                                            <label><?php echo $row5['lab_desc']?></label>
                                            </div>
                                            <div class="col-sm-3">
                                            <input class="form-control form-control-sm" name="index[]" type="number" placeholder="no. of units" <?php echo (in_array($row5['lab_id'], $lab_array) ? 'value="'.$units[$i].'"' .$i++: '');?>> 
                                            </div>
                                            </div>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="mt-3">NSTP</label>
                                        <?php
                                            $i = 0;
                                            $nstp_info = mysqli_query($db,"SELECT * FROM tbl_nstp_fees WHERE year_id = '$row1[year_id]' AND ay_id = '$row1[ay_id]'");
                                            while ($row5 = mysqli_fetch_array($nstp_info)) {
                                        ?>
                                        <div class="form-check">
                                            <div class="row">
                                            <div class="col-sm-4">
                                            <input class="form-check-input" type="checkbox" value="<?php echo $row5['nstp_id']?>" name="nstp[]" <?php echo (in_array($row5['nstp_id'], $nstp_array) ? 'checked ': '');?>>
                                            <label><?php echo $row5['component']?></label>
                                            </div>
                                            <div class="col-sm-3">
                                            <input class="form-control form-control-sm" name="index_nstp[]" type="number" placeholder="no. of units" <?php echo (in_array($row5['nstp_id'], $nstp_array) ? 'value="'.$nstp_units[$i].'"' .$i++: '');?>> 
                                            </div>
                                            </div>
                                        </div>
                                        <?php
                                        $i++;
                                        }
                                        ?>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="mt-3">Discounts</label>
                                        
                                            <?php
                                                $selectDiscount = mysqli_query($db, "SELECT disc_id ,discount, discount_desc, percent FROM tbl_discounts WHERE ay_id = '$row1[ay_id]'");
                                                while ($row4 = mysqli_fetch_array($selectDiscount)) {

                                            ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="<?php echo $row4['disc_id'];?>" name="discounts[]" <?php echo (in_array($row4['disc_id'], $discount_array) ? 'checked' : '');?>>
                                            <label><?php echo $row4['discount_desc'];?> - <?php echo ($row4['percent']== 1 ? $row4['discount'].'%' : 'Php '.number_format($row4['discount'], 2));?></label>
                                        </div>
                                            <?php
                                                }
                                            ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="d-flex justify-content-end mt-4">
                                <button class="btn bg-gradient-dark text-white m-0 ms-2" type="submit" title="Send"
                                    name="submit">Edit
                                    Assessment</button>
                            </div>
                            <?php
                                }}
                            ?>
                        </form>
                    </div>
                </div>
            </div>
            <?php include '../../includes/footer.php'; ?>
            <!-- End footer -->
        </div>
    </main>
    <!--   Core JS Files   -->
    <?php include '../../includes/scripts.php'; ?>
</body>

</html>