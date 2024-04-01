<!--
=========================================================
* Soft UI Dashboard - v1.0.3
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!-- Head -->
<?php
session_start();
include '../../includes/session.php';
// End Session 
include '../../includes/head.php';
?>
<title>
    Dashboard | SFAC-BACOOR
</title>
</head>
<!-- End Head -->


<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">Dashboard</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->

        <!-- Start Container -->
        
        <?php if ($_SESSION['role'] == "OSA") { ?>
        <div class="container-fluid py-4 mb-4">
            <!-- first row -->
            <div class="row">
                <!-- Enrolled students -->
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card bg-white shadow move-on-hover">
                        <div class="overflow-hidden position-relative border-radius-lg bg-cover p-3"
                            style="background-image: url('../../assets/img/curved-images/curved3.jpg')">
                            <span class="mask bg-gradient-light opacity-3"><i
                                    class="fas fa-users text-7xl p-1"></i></span>
                            <div class="card-body position-relative z-index-2 p-1">
                                <div class="text-center">
                                    <h6 class="mb-0 text-dark font-weight-bold mb-2">
                                        Enrolled Students
                                    </h6>

                                    <?php
                                        $ESCount = mysqli_query($db, "SELECT COUNT(SY.sy_id) FROM tbl_schoolyears SY WHERE remark IN ('Approved') AND ay_id = '$_SESSION[AC]' AND sem_id = '$_SESSION[S]'") or die($db->error);
                                        $actualCount = mysqli_fetch_array($ESCount);
                                        ?>
                                    <h3 class="text-dark text-center mb-0 mt-n2" id="state1"
                                        countTo="<?php echo $actualCount[0]; ?>">
                                    </h3>
                                    <p class="text-sm mb-0 text-dark">Students</p>


                                </div>
                            </div>
                            <hr class="horizontal dark m-0">
                            <div class="row">
                                     
                                        <div class="col text-center">
                                         <a href="#" class="position-relative w-100 text-center py-1" data-bs-toggle="tooltip"
                                         data-bs-placement="top" title="Show More">
                                         <i class="fas fa-chevron-down text-dark"></i>
                                        </a>
                                        </div>
                                     </div>
                        </div>
                    </div>
                </div>
                <!-- End Enrolled Students -->
         <?php }?>
        
        <!-- REGISTRAR, ADMISSION -->
        <?php if ($_SESSION['role'] != "Student"& ($_SESSION['role'] != "OSA")) { ?>
        <div class="container-fluid py-4 mb-4">
            <!-- first row -->
            <div class="row">
                <!-- Enrolled students -->
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card bg-white shadow move-on-hover">
                        <div class="overflow-hidden position-relative border-radius-lg bg-cover p-3"
                            style="background-image: url('../../assets/img/curved-images/curved3.jpg')">
                            <span class="mask bg-gradient-light opacity-3"><i
                                    class="fas fa-users text-7xl p-1"></i></span>
                            <div class="card-body position-relative z-index-2 p-1">
                                <div class="text-center">
                                    <h6 class="mb-0 text-dark font-weight-bold mb-2">
                                        Enrolled Students
                                    </h6>

                                    <?php
                                        $ESCount = mysqli_query($db, "SELECT COUNT(SY.sy_id) FROM tbl_schoolyears SY WHERE remark IN ('Approved') AND ay_id = '$_SESSION[AC]' AND sem_id = '$_SESSION[S]'") or die($db->error);
                                        $actualCount = mysqli_fetch_array($ESCount);
                                        ?>
                                    <h3 class="text-dark text-center mb-0 mt-n2" id="state1"
                                        countTo="<?php echo $actualCount[0]; ?>">
                                    </h3>
                                    <p class="text-sm mb-0 text-dark">Students</p>


                                </div>
                            </div>
                            <hr class="horizontal dark m-0">
                            <div class="row">
                                     <div class="col"></div>
                                        <div class="col text-center">
                                         <a href="enrolledStud.php" class="position-relative w-100 text-center py-1" data-bs-toggle="tooltip"
                                         data-bs-placement="top" title="Show More">
                                         <i class="fas fa-chevron-down text-dark"></i>
                                        </a>
                                        </div>
                                        <div class="col text-left">
                                        <a href="chart.php?dep=All" class="position-relative w-100 text-left py-1" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Show Chart">
                                        <i class="fas fa-chart-area text-dark"></i>
                                       </a>
                                        </div>
                                     </div>
                        </div>
                    </div>
                </div>
                <!-- End Enrolled Students -->

                <!-- New Student -->
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card bg-white shadow move-on-hover">
                        <div class="overflow-hidden position-relative border-radius-lg bg-cover p-3"
                            style="background-image: url('../../assets/img/curved-images/curved3.jpg')">
                            <span class="mask bg-gradient-light opacity-3"><i
                                    class="fas fa-user-friends text-7xl p-1"></i></span>
                            <div class="card-body position-relative z-index-2 p-1">
                                <div class="text-center">
                                    <h6 class="mb-0 text-dark font-weight-bold mb-2">
                                        New Students
                                    </h6>

                                    <?php
                                        $NESCount = mysqli_query($db, "SELECT COUNT(SY.sy_id) FROM tbl_schoolyears SY WHERE remark IN ('Approved') AND status IN ('New') AND ay_id = '$_SESSION[AC]' AND sem_id = '$_SESSION[S]'") or die($db->error);
                                        $actualCount = mysqli_fetch_array($NESCount);
                                        ?>
                                    <h3 class="text-dark text-center mb-0 mt-n2" id="state2"
                                        countTo="<?php echo $actualCount[0]; ?>">
                                    </h3>
                                    <p class="text-sm mb-0 text-dark">Students</p>


                                </div>
                            </div>
                            <hr class="horizontal dark m-0">
                            <div class="row">
                                     <div class="col"></div>
                                        <div class="col text-center">
                                         <a href="enrolledNewStud.php" class="position-relative w-100 text-center py-1" data-bs-toggle="tooltip"
                                         data-bs-placement="top" title="Show More">
                                         <i class="fas fa-chevron-down text-dark"></i>
                                        </a>
                                        </div>
                                        <div class="col text-left">
                                        <a href="chart.php?dep=New" class="position-relative w-100 text-left py-1" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Show Chart">
                                        <i class="fas fa-chart-area text-dark"></i>
                                       </a>
                                        </div>
                                     </div>
                        </div>
                    </div>
                </div>
                <!-- End New Students -->

                <!-- Old students -->
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card bg-white shadow move-on-hover">
                        <div class="overflow-hidden position-relative border-radius-lg bg-cover p-3"
                            style="background-image: url('../../assets/img/curved-images/curved3.jpg')">
                            <span class="mask bg-gradient-light opacity-3"><i
                                    class="fas fa-user-friends text-7xl p-1"></i></span>
                            <div class="card-body position-relative z-index-2 p-1">
                                <div class="text-center">
                                    <h6 class="mb-0 text-dark font-weight-bold mb-2">
                                        Old Students
                                    </h6>

                                    <?php
                                        $OESCount = mysqli_query($db, "SELECT COUNT(SY.sy_id) AS total FROM tbl_schoolyears SY WHERE remark IN ('Approved') AND status IN ('Old') AND ay_id = '$_SESSION[AC]' AND sem_id = '$_SESSION[S]'") or die($db->error);
                                        $actualCount = mysqli_fetch_array($OESCount);
                                        ?>
                                    <h3 class="text-dark text-center mb-0 mt-n2" id="state3"
                                        countTo="<?php echo $actualCount[0]; ?>">
                                    </h3>
                                    <p class="text-sm mb-0 text-dark">Students</p>


                                </div>
                            </div>
                            <hr class="horizontal dark m-0">
                            <div class="row">
                                     <div class="col"></div>
                                        <div class="col text-center">
                                         <a href="enrolledOldStud.php" class="position-relative w-100 text-center py-1" data-bs-toggle="tooltip"
                                         data-bs-placement="top" title="Show More">
                                         <i class="fas fa-chevron-down text-dark"></i>
                                        </a>
                                        </div>
                                        <div class="col text-left">
                                        <a href="chart.php?dep=Old" class="position-relative w-100 text-left py-1" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Show Chart">
                                        <i class="fas fa-chart-area text-dark"></i>
                                       </a>
                                        </div>
                                     </div>
                        </div>
                    </div>
                </div>
                <!-- End Old Students -->

                <!-- transferee -->
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card bg-white shadow move-on-hover">
                        <div class="overflow-hidden position-relative border-radius-lg bg-cover p-3"
                            style="background-image: url('../../assets/img/curved-images/curved3.jpg')">
                            <span class="mask bg-gradient-light opacity-3"><i
                                    class="fas fa-exchange-alt text-7xl p-1"></i></span>
                            <div class="card-body position-relative z-index-2 p-1">
                                <div class="text-center">
                                    <h6 class="mb-0 text-dark font-weight-bold mb-2">
                                        Transferee
                                    </h6>

                                    <?php
                                        $ETSCount = mysqli_query($db, "SELECT COUNT(SY.sy_id) AS total FROM tbl_schoolyears SY WHERE remark = 'Approved' AND transferee = 'Yes' AND ay_id = '$_SESSION[AC]' AND sem_id = '$_SESSION[S]'") or die($db->error);
                                        $actualCount = mysqli_fetch_array($ETSCount);
                                        ?>
                                    <h3 class="text-dark text-center mb-0 mt-n2" id="state4"
                                        countTo="<?php echo $actualCount[0]; ?>">
                                    </h3>
                                    <p class="text-sm mb-0 text-dark">Students</p>


                                </div>
                            </div>
                            <hr class="horizontal dark m-0">
                            <div class="row">
                                     <div class="col"></div>
                                        <div class="col text-center">
                                         <a href="" class="position-relative w-100 text-center py-1" data-bs-toggle="tooltip"
                                         data-bs-placement="top" title="Show More">
                                         <i class="fas fa-chevron-down text-dark"></i>
                                        </a>
                                        </div>
                                        <div class="col text-left">
                                        </div>
                                     </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- transferee -->
            <!-- second row -->
            <div class="row">
                <!-- Pending Enrollees -->
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card bg-white shadow move-on-hover">
                        <div class="overflow-hidden position-relative border-radius-lg bg-cover p-3"
                            style="background-image: url('../../assets/img/curved-images/curved3.jpg')">
                            <span class="mask bg-gradient-light opacity-3"><i
                                    class="fas fa-user-clock text-7xl p-1"></i></span>
                            <div class="card-body position-relative z-index-2 p-1">
                                <div class="text-center">
                                    <h6 class="mb-0 text-dark font-weight-bold mb-2">
                                        Pending Enrollees
                                    </h6>

                                    <?php
                                        $OESCount = mysqli_query($db, "SELECT COUNT(SY.sy_id) AS total FROM tbl_schoolyears SY WHERE remark IN ('Pending', 'Canceled') AND ay_id = '$_SESSION[AC]' AND sem_id = '$_SESSION[S]'") or die($db->error);
                                        $actualCount = mysqli_fetch_array($OESCount);
                                        ?>
                                    <h3 class="text-dark text-center mb-0 mt-n2" id="state5"
                                        countTo="<?php echo $actualCount[0]; ?>">
                                    </h3>
                                    <p class="text-sm mb-0 text-dark">Students</p>


                                </div>
                            </div>
                            <hr class="horizontal dark m-0">
                            <div class="text-center">
                                <a href="pendingStud.php" class="position-relative w-100 text-center py-1"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Show More">
                                    <i class="fas fa-chevron-down text-dark"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Pending Enrollees -->

                <!-- Online Inquiry -->
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card bg-white shadow move-on-hover">
                        <div class="overflow-hidden position-relative border-radius-lg bg-cover p-3"
                            style="background-image: url('../../assets/img/curved-images/curved3.jpg')">
                            <span class="mask bg-gradient-light opacity-3"><i
                                    class="fas fa-globe-asia text-7xl p-1"></i></span>
                            <div class="card-body position-relative z-index-2 p-1">
                                <div class="text-center">
                                    <h6 class="mb-0 text-dark font-weight-bold mb-2">
                                        Online Inquiry
                                    </h6>

                                    <?php
                                        $orCount = mysqli_query($db, "SELECT COUNT(or_id) FROM tbl_online_registrations WHERE status IN ('Pending') AND acad_year = '$_SESSION[AC]' AND semester = '$_SESSION[S]'") or die($db->error);
                                        $actualCount = mysqli_fetch_array($orCount);
                                        ?>
                                    <h3 class="text-dark text-center mb-0 mt-n2" id="state6"
                                        countTo="<?php echo $actualCount[0]; ?>">
                                    </h3>
                                    <p class="text-sm mb-0 text-dark">Students</p>


                                </div>
                            </div>
                            <hr class="horizontal dark m-0">
                            <div class="text-center">
                                <a href="../inquiry/list.inquiry.php" class="position-relative w-100 text-center py-1"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Show More">
                                    <i class="fas fa-chevron-down text-dark"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Online Inquiry -->
                <!-- balik franciscano -->
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card bg-white shadow move-on-hover">
                        <div class="overflow-hidden position-relative border-radius-lg bg-cover p-3"
                            style="background-image: url('../../assets/img/curved-images/curved3.jpg')">
                            <span class="mask bg-gradient-light opacity-3"><i
                                    class="fas fa-user-friends text-7xl p-1"></i></span>
                            <div class="card-body position-relative z-index-2 p-1">
                                <div class="text-center">
                                    <h6 class="mb-0 text-dark font-weight-bold mb-2">
                                        Balik Franciscano
                                    </h6>

                                    <?php
                                        $bfCount = mysqli_query($db, "SELECT COUNT(sy_id) FROM tbl_schoolyears WHERE bf = 'Yes' AND remark = 'Approved' AND sem_id = '$_SESSION[S]' AND ay_id = '$_SESSION[AC]' ") or die($db->error);
                                        $actualCount = mysqli_fetch_array($bfCount);
                                        ?>
                                    <h3 class="text-dark text-center mb-0 mt-n2" id="state7"
                                        countTo="<?php echo $actualCount[0]; ?>">
                                    </h3>
                                    <p class="text-sm mb-0 text-dark">Students</p>


                                </div>
                            </div>
                            <hr class="horizontal dark m-0">
                            <div class="text-center">
                                <a href="balik_franciscano.php" class="position-relative w-100 text-center py-1"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Show More">
                                    <i class="fas fa-chevron-down text-dark"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End balik franciscano -->

                <!-- Dropped Students -->
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card bg-white shadow move-on-hover">
                        <div class="overflow-hidden position-relative border-radius-lg bg-cover p-3"
                            style="background-image: url('../../assets/img/curved-images/curved3.jpg')">
                            <span class="mask bg-gradient-light opacity-3"><i
                                    class="fas fa-user-slash text-7xl p-1"></i></span>
                            <div class="card-body position-relative z-index-2 p-1">
                                <div class="text-center">
                                    <h6 class="mb-0 text-dark font-weight-bold mb-2">
                                        Dropped Students
                                    </h6>

                                    <?php
                                        $DSCount = mysqli_query($db, "SELECT COUNT(SY.sy_id) AS total FROM tbl_schoolyears SY WHERE remark IN ('Dropped') AND ay_id = '$_SESSION[AC]' AND sem_id = '$_SESSION[S]'") or die($db->error);
                                        $actualCount = mysqli_fetch_array($DSCount);
                                        ?>
                                    <h3 class="text-dark text-center mb-0 mt-n2" id="state8"
                                        countTo="<?php echo $actualCount[0]; ?>">
                                    </h3>
                                    <p class="text-sm mb-0 text-dark">Students</p>


                                </div>
                            </div>
                            <hr class="horizontal dark m-0">
                            <div class="text-center">
                                <a href="dropped.php" class="position-relative w-100 text-center py-1" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Show More">
                                    <i class="fas fa-chevron-down text-dark"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Dropped Students -->
            </div>
            <!-- third row  -->
            <div class="row">
                <?php
                    // icon
                    $icon1 = '<i class="fas fa-laptop-code text-7xl p-1"></i>';
                    $icon2 = '<i class="fas fa-chart-line text-7xl p-1"></i>';
                    $icon3 = '<i class="fas fa-chalkboard-teacher text-7xl p-1"></i>';
                    $icon4 = '<i class="fas fa-utensils text-7xl p-1"></i>';
                    $icon5 = '<i class="fas fa-sort-amount-up text-7xl p-1"></i>';
                    $icon6 = '<i class="fas fa-user-friends text-7xl p-1"></i>';
                    $icon7 = '<i class="fas fa-calculator text-7xl p-1"></i>';
                    $icon8 = '<i class="fas fa-first-aid text-7xl p-1"></i>';

                    // title
                    $Dep1 = 'SCS';
                    $Dep2 = 'SBA';
                    $Dep3 = 'SELA';
                    $Dep4 = 'SHM';
                    $Dep5 = 'Bridging';
                    $Dep6 = 'LA';
                    $Dep7 = 'SENG';
                    $Dep8 = 'SON';

                    $c = 0; // count
                    $prev_widget = 9; // number of 1st and 2nd row widget
                    $getAllDepartment = $db->query("SELECT * FROM tbl_departments");
                    while ($row = $getAllDepartment->fetch_array()) {
                        $c++;
                        $prev_widget++;
                        echo '
                        <div class="col-xl-3 col-sm-6 mb-3">
                            <div class="card bg-white shadow move-on-hover">
                                <div class="overflow-hidden position-relative border-radius-lg bg-cover p-3"
                                    style="background-image: url(../../assets/img/curved-images/curved3.jpg)">
                                    <span class="mask bg-gradient-light opacity-3">' . ${"icon$c"} . '</span>
                                    <div class="card-body position-relative z-index-2 p-1">
                                        <div class="text-center">
                                            <h6 class="mb-0 text-dark font-weight-bold mb-2">
                                            Enrolled Students in <br> (' . ${"Dep$c"} . ')
                                            </h6>
                                            ';
                        $getStud = $db->query("SELECT * FROM tbl_schoolyears S LEFT JOIN tbl_courses C USING(course_id) WHERE remark IN ('Approved') AND department_id = '$row[department_id]'  AND ay_id = '$_SESSION[AC]' AND sem_id = '$_SESSION[S]'");
                        $actualCount = $getStud->num_rows;
                        
                        $getStud = $db->query("SELECT * FROM tbl_schoolyears S LEFT JOIN tbl_courses C USING(course_id) WHERE status='New' AND remark IN ('Approved') AND department_id = '$row[department_id]'  AND ay_id = '$_SESSION[AC]' AND sem_id = '$_SESSION[S]'");
                        $actualCountnew = $getStud->num_rows;
                        
                        $getStud = $db->query("SELECT * FROM tbl_schoolyears S LEFT JOIN tbl_courses C USING(course_id) WHERE status='Old' AND remark IN ('Approved') AND department_id = '$row[department_id]'  AND ay_id = '$_SESSION[AC]' AND sem_id = '$_SESSION[S]'");
                        $actualCountold = $getStud->num_rows;
                        echo '      
                                            <h3 class="text-dark text-center mb-0 mt-n2" id="state' . $prev_widget . '"
                                                countTo="' . $actualCount . '">
                                            </h3>
                                            <p class="text-dark text-center"> <b>New:</b> '. $actualCountnew .' <b>Old:</b> '. $actualCountold .'</p>
                                                <p class="text-sm mb-0 text-dark">Students</p>
                                         </div>
                                     </div>
                                     <hr class="horizontal dark m-0">
                                     <div class="row">
                                     <div class="col"></div>
                                        <div class="col text-center">
                                         <a href="' . ${"Dep$c"} . '.php" class="position-relative w-100 text-center py-1" data-bs-toggle="tooltip"
                                         data-bs-placement="top" title="Show More">
                                         <i class="fas fa-chevron-down text-dark"></i>
                                        </a>
                                        </div>
                                        <div class="col text-left">
                                        <a href="chart.php?dep=' . $row['department_id'] . '" class="position-relative w-100 text-left py-1" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Show Chart">
                                        <i class="fas fa-chart-area text-dark"></i>
                                       </a>
                                        </div>
                                     </div>
                                </div>
                            </div>
                        </div>';
                    } ?>

            </div>
        </div>
        <!-- End Container -->
        <!-- STUDENT -->
        <?php } elseif ($_SESSION['role'] == "Student") {
        ?>
        <div class="container-fluid py-4 mb-12">
            <!-- first row -->
            <div class="row">
                <!--Student Courses | Enrolled students -->
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card bg-white shadow move-on-hover">
                        <div class="overflow-hidden position-relative border-radius-lg bg-cover p-3"
                            style="background-image: url('../../assets/img/curved-images/curved14.jpg')">
                            <span class="mask bg-gradient-light opacity-6"></span>
                            <div class="card-body position-relative z-index-2 p-1">
                                <div class="text-center">
                                    <h6 class="mb-0 text-dark font-weight-bold mb-2">
                                        <?php $course = $db->query("SELECT * FROM tbl_students LEFT JOIN tbl_courses USING(course_id) WHERE stud_id = '$stud_id'") or die($db->error);
                                            while ($row = $course->fetch_array()) {
                                                $DCourse_abv = $row['course_abv'];
                                                if ($row['course_id'] > 0) {
                                                    echo $row['course_abv'] . ' Students';
                                                } else {
                                                    echo 'Students';
                                                }
                                            } ?>
                                    </h6>

                                    <?php
                                        $SCount = mysqli_query($db, "SELECT COUNT(SY.sy_id) FROM tbl_schoolyears SY LEFT JOIN tbl_courses C USING(course_id) WHERE remark IN ('Approved') AND course_abv IN ('$DCourse_abv') AND ay_id = '$_SESSION[AC]' AND sem_id = '$_SESSION[S]'") or die($db->error);
                                        $actualCount = mysqli_fetch_array($SCount);
                                        ?>
                                    <h3 class="text-dark text-center mb-0 mt-n2" id="state1"
                                        countTo="<?php echo $actualCount[0]; ?>">
                                    </h3>
                                    <p class="text-sm mb-0 text-dark">Students</p>


                                </div>
                            </div>
                            <hr class="horizontal dark m-0">
                            <div class="text-center">
                                <a href="" class="position-relative w-100 text-center py-1" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Show More">
                                    <i class="fas fa-chevron-down text-dark"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Student Courses | Enrolled students -->
                <!-- Subjects Enrolled -->
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card bg-white shadow move-on-hover">
                        <div class="overflow-hidden position-relative border-radius-lg bg-cover p-3"
                            style="background-image: url('../../assets/img/curved-images/curved14.jpg')">
                            <span class="mask bg-gradient-light opacity-6"></span>
                            <div class="card-body position-relative z-index-2 p-1">
                                <div class="text-center">
                                    <h6 class="mb-0 text-dark font-weight-bold mb-2">
                                        Enrolled Subjects
                                    </h6>

                                    <?php
                                        if (!empty($SCourse_id)) {
                                            $ESubCount = mysqli_query($db, "SELECT COUNT(ES.enrolled_subj_id) FROM tbl_enrolled_subjects ES LEFT JOIN tbl_subjects_new SN USING(subj_id) WHERE stud_id IN ('$stud_id') AND acad_year = '$_SESSION[AC]' AND semester = '$_SESSION[S]' AND course_id IN ('$SCourse_id')") or die($db->error);
                                            $actualSubCount = mysqli_fetch_array($ESubCount);
                                        }

                                        ?>
                                    <h3 class="text-dark text-center mb-0 mt-n2" id="state2"
                                        countTo="<?php echo $actualSubCount[0]; ?>">
                                    </h3>
                                    <p class="text-sm mb-0 text-dark">Subjects</p>


                                </div>
                            </div>
                            <hr class="horizontal dark m-0">
                            <div class="text-center">
                                <a href="../enrollment/enrollmentInfo.php"
                                    class="position-relative w-100 text-center py-1" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Show More">
                                    <i class="fas fa-chevron-down text-dark"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Subjects Enrolled -->

            </div>
        </div>
        <?php } ?>
        <!-- End Container -->
        <!-- footer -->
        <?php include '../../includes/footer.php'; ?>
        <!-- End footer -->
        </div>
    </main>


    <!-- School Settings -->
    <?php if ($_SESSION['role'] == "Registrar" || $_SESSION['role'] == "Super Administrator") { ?>
    <div class="fixed-plugin">
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2" data-bs-toggle="tooltip"
            data-bs-placement="top" title="Settings" data-container="body">
            <i class="fa fa-cog py-2"> </i>
        </a>
        <div class="card shadow-lg ">
            <div class="card-header pb-0 pt-3">
                <div class="float-start">
                    <h5 class="mt-3 mb-0">Settings</h5>
                    <p>School Information</p>
                </div>
                <div class="float-end mt-4">
                    <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                        <i class="fa fa-close"></i>
                    </button>
                </div>
                <!-- End Toggle Button -->
            </div>
            <hr class="horizontal dark my-1">
            <div class="card-body pt-sm-3 pt-0">
                <!-- Inputs -->
                <form method="POST" enctype="multipart/form-data"
                    action="../settings/settingsData/ctrl.edit.schoolSettings.php">
                    <?php $getSchool_info = $db->query("SELECT * FROM tbl_school_info") or die($db->error);
                        while ($row = $getSchool_info->fetch_array()) {
                            echo ' <h6 class="mb-0">School Name</h6>
                <input name="SchName" class="form-control" type="text" placeholder="School Name"
                    value="' . $row['school_name'] . '">

                <div class="mt-3">
                    <h6 class="mb-0">Campus</h6>
                    <input name="SchCampus" class="form-control" type="text" placeholder="Campus"
                        value="' . $row['school_address'] . '">
                </div>';
                        } ?>

                    <hr class="horizontal dark mt-4">

                    <h6 class="mt-4 text-sm">School Logo</h6>

                    <label for="schFile" class="btn btn-outline-secondary form-control dropzone" id="dropzone">
                        <div class="fallback">
                            <input id="schFile" name="Schfile" type="file" accept="image/jpeg, image/png" hidden />
                            <span class="font-weight-bolder"><i class="far fa-file-image"> </i>&nbsp; Upload
                                Image</span> <br><br>
                            <p id="schImage" class="font-weight-bolder text-sm"></p>
                            <script>
                            $(document).ready(function() {
                                $('input[type="file"]').change(function(e) {
                                    var schFile = e.target.files[0].name;
                                    $("#schImage").text(schFile);

                                });
                            });
                            </script>
                        </div>
                    </label>
                    <!-- END Inputs -->
                    <div class="col-12 button-row d-flex mt-3">
                        <button type="submit" name="SchSave" class="btn bg-gradient-light  ms-auto">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <?php } ?>
    <!-- End School Settings -->
    <!--   Core JS Files   -->
    <?php include '../../includes/scripts.php'; ?>
</body>

</html>