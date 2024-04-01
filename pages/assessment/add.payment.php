<?php
session_start();
include '../../includes/head.php';
// include 'accountConn/conn.php';
include '../../includes/session.php';

$stud_no = $_GET['stud_no'];

?>
<title>
    Add Payments Status | SFAC - Bacoor
</title>
</head>

<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">Add Payments Status</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row mb-10">
                <div class="col-lg-6 col-12 mx-auto">
                    <div class="card card-body mt-4 shadow-sm">
                    <?php
                            $studInfo = mysqli_query($db, "SELECT *,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname FROM tbl_schoolyears 
                            LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                            LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id 
                            WHERE tbl_students.stud_no = '$stud_no' AND ay_id = '$_SESSION[AC]' AND sem_id = '$_SESSION[S]' AND remark = 'Approved'") or die (mysqli_error($db));
                            while ($row1 = mysqli_fetch_array($studInfo)) {

                                $stud_id = $row1['stud_id'];

                                $unittotal = mysqli_query($db, "SELECT SUM(unit_total) AS total_unit FROM tbl_enrolled_subjects
                                LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id
                                WHERE tbl_enrolled_subjects.stud_id = '$row1[stud_id]' AND tbl_enrolled_subjects.acad_year = '$_SESSION[AC]' AND tbl_enrolled_subjects.semester = '$_SESSION[S]'") or die (mysqli_error($db));

                                while ($row2 = mysqli_fetch_array($unittotal)) {
                                    $total_unit = $row2['total_unit'];
                                }
                        ?>
                        <h5 class="font-weight-bolder mb-0">Add Payments Status for <b><?php echo $row1['fullname'];?></b></h5>
                        <p class="text-sm mb-0">Assessment Fee Info</p>
                        <hr class="horizontal dark my-3">
                        <?php
                                $assessmentInfo = mysqli_query($acc, "SELECT * FROM tbl_assessed_tf
                                LEFT JOIN tbl_tuition_fees ON tbl_tuition_fees.tf_id = tbl_assessed_tf.tf_id
                                WHERE stud_no = '$stud_no'  AND tbl_assessed_tf.ay_id = '$_SESSION[AYear]' AND year_id = '$row1[year_id]'") or die (mysqli_error($acc));
                                while ($row = mysqli_fetch_array($assessmentInfo)) {
                                    $assessed_id = $row['assessed_id'];

                                    $selectInstallmentDate = mysqli_query($acc, "SELECT * FROM tbl_installment_dates WHERE ay_id = '$_SESSION[AYear]' AND sem_id = '$_SESSION[ASem]'");

                                    $date_array = [];
                                    while ($row = mysqli_fetch_array($selectInstallmentDate)) {

                                        $date_array[] = ($row['date_1']);
                                        $date_array[] = ($row['date_2']);
                                        $date_array[] = ($row['date_3']);

                                    }

                            ?>
                        
                            <div class="row">
                                <div class="col-sm-6">
                                    <p><b>Course and Year Level: </b><?php echo $row1['course_abv']?></p>
                                </div>
                            </div>
                            <?php
                                foreach ($date_array as $date_value) {

                                    $date = new DateTime($date_value);

                                    $paymentCheck1 = mysqli_query($acc,"SELECT * FROM tbl_payments_status
                                    LEFT JOIN tbl_assessed_tf ON tbl_assessed_tf.assessed_id = tbl_payments_status.assessed_id
                                    WHERE tbl_payments_status.stud_no = '$stud_no' and payment_date = '$date_value' AND tbl_payments_status.ay_id = '$_SESSION[AYear]'") or die (mysqli_error($acc));
                                    
                                    if (mysqli_num_rows($paymentCheck1) == 0) {
                            ?>
                            <form method="POST" enctype="multipart/form-data" action="userData/ctrl.add.payment.php?stud_no=<?php echo $stud_no?>&assessed_id=<?php echo $assessed_id;?>">
                            <div class="row justify-content-center">
                                <div class="col-sm-6">
                                    <label class="mt-3">Due Date</label>
                                    <input type="text" class="form-control" disabled value = "<?php echo $date->format('M d, Y'); ?>">
                                    <input type="hidden"  name="payment_date" value="<?php echo $date_value;?>">
                                    
                                </div>
                                <div class="col-sm-2">
                                        <button class="btn bg-gradient-dark text-white m-0 ms-2 mt-5" type="submit"
                                    name="submit">Paid</button>
                                </div>
                            </div>
                            </form>
                            <?php
                                }
                                }
                                $paymentCheck = mysqli_query($acc,"SELECT * FROM tbl_payments_status
                                LEFT JOIN tbl_assessed_tf ON tbl_assessed_tf.assessed_id = tbl_payments_status.assessed_id
                                WHERE tbl_payments_status.stud_no = '$stud_no' AND tbl_payments_status.ay_id = '$_SESSION[AYear]'");

                                if (mysqli_num_rows($paymentCheck) != 0) {
                            ?>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p><b>Paid Installments</b></p>
                                </div>
                            </div>
                            <?php
                                }
                                while ($row2 = mysqli_fetch_array($paymentCheck)) {
                                    $date_payment = new DateTime($row2['created_at']);
                                    $date = new DateTime($row2['payment_date']);
                            ?>
                            <div class="row">
                                <div class="col-sm-6 mt-2">
                                    <p><b>Date of Payment: </b><?php echo $date_payment->format('M d, Y');?></p>
                                </div>
                            </div>
                            <form method="POST" enctype="multipart/form-data" action="userData/ctrl.add.payment.php?stud_no=<?php echo $stud_no?>&assessed_id=<?php echo $assessed_id;?>">
                            <div class="row justify-content-center mb-2">
                                <div class="col-sm-6">
                                    <label>Due Date</label>
                                    <input type="text" class="form-control" disabled value = "<?php echo $date->format('M d, Y'); ?>">
                                    
                                </div>
                                <div class="col-sm-2">
                                        <button class="btn bg-gradient-dark text-white m-0 ms-2 mt-4" type="submit" disabled
                                    name="submit">Paid</button>
                                </div>
                            </div>
                            </form>
                            <?php
                                }
                            ?>
                        
                        <div class="d-flex justify-content-end mt-4">
                                <a class="btn bg-gradient-dark text-white m-0 ms-2" type="submit" href="list.assessment.php"
                                    name="submit">Finish
                                    </a>
                        </div>
                        <?php
                            }}
                        ?>
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