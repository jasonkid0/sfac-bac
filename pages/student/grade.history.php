<!-- Head -->
<?php
session_start();
include '../../includes/session.php';
include '../../includes/head.php';

$_POST['stud_id'] = $stud_id;

?>
<title>
    Student Grade History | SFAC - Bacoor
</title>
</head>
<!-- End Head -->


<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">Student History Grade</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row mb-0">
                <div class="col-lg-11 col-12 mx-auto">
                    <div class="card shadow shadow-xl mt-4">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-xl-4">
                                    <h5 class="mb-0">View History Grade</h5>
                                    <p class="text-sm mb-0">
                                        Please select semester and academic year.
                                    </p>
                                </div>
                                <div class="col-xl-8">
                                    <form method="POST" action="">
                                        <div class="row">
                                            <div class="col-md-6 mb-0">
                                                <label class="form-label mt-0">Semester</label>
                                                <select class="form-control" required name="semester" id="semester">
                                                    <option disabled selected value="">Select Semester</option>
                                                    <?php $getCourse = mysqli_query($db, "SELECT * FROM tbl_semesters");
                                                    while ($row = mysqli_fetch_array($getCourse)) {
                                                        echo '<option value="' . $row['semester'] . '">' . $row['semester'] . '</option>';
                                                    } ?>
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label mt-0">Academic Year</label>
                                                <select class="form-control" required name="academic_year"
                                                    id="year_lvl">
                                                    <option disabled selected value="">Select Year</option>
                                                    <?php $getYear = mysqli_query($db, "SELECT * FROM tbl_acadyears");
                                                    while ($row = mysqli_fetch_array($getYear)) {
                                                        echo '<option value="' . $row['academic_year'] . '">' . $row['academic_year'] . '</option>';
                                                    } ?>
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <button class="btn btn-icon btn-dark" style="margin-top: 1.9rem;"
                                                    type="submit" name="search">
                                                    <span class="btn-inner--text">View</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>




                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid py-4">
            <div class="row mb-6">
                <div class="col-lg-11 col-12 mx-auto">
                    <!-- Subjects List -->
                    <?php

                    if (isset($_POST['search'])) {

                        $academic_year = mysqli_real_escape_string($db, $_POST['academic_year']);
                        $semester = mysqli_real_escape_string($db, $_POST['semester']);

                    ?>

                    <div class="card shadow shadow-xl mt-4">

                        <!-- Card header -->
                        <div class="card-header">
                            <div class="d-lg-flex">
                                <div>
                                    <h5 class="mb-0">List of Subject's Grade</h5>
                                    <p class="text-sm mb-0">
                                        from <?php echo $semester .', '.$academic_year; ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <hr class="horizontal dark m-0">

                        <div class="table-responsive px-4 my-4">
                            <table class="table table-flush table-hover m-0 responsive nowrap" style="width: 100%;"
                                id="datatable-info">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Course Code</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Course Description</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Unit(s)</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Grade</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Remark</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                        $query01 = $db->query("SELECT * FROM tbl_enrolled_subjects ES
                                            LEFT JOIN tbl_schedules S ON S.class_id = ES.class_id
                                            LEFT JOIN tbl_students STUD ON STUD.stud_id = ES.stud_id
                                            LEFT JOIN tbl_subjects_new SN ON SN.subj_id = ES.subj_id
                                            WHERE ES.stud_id = '$stud_id' AND ES.acad_year = '$academic_year' AND ES.semester = '$semester'") or die($db->error);



                                        while ($row = $query01->fetch_array()) {

                                    ?>
                                    <tr>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['subj_code']; ?>
                                        </td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['subj_desc']; ?>
                                        </td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['unit_total']; ?>
                                        </td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['ofgrade']; ?>
                                        </td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['numgrade']; ?>
                                        </td>
                                    </tr>
                                    <?php

                                        }

                                    ?>
                                </tbody>
                                <tfoot>
                                    <?php $query02 = $db->query("SELECT SUM(unit_total) AS TU FROM tbl_enrolled_subjects ES
                                            LEFT JOIN tbl_subjects_new SN ON SN.subj_id = ES.subj_id
                                            WHERE ES.stud_id = '$stud_id' AND ES.acad_year = '$_SESSION[AC]' AND ES.semester = '$_SESSION[S]'") or die($db->error);

                                            while ($row = $query02->fetch_array()) { ?>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Total Units
                                        </th>
                                        <th></th>
                                        <th
                                            class="text-uppercase text-secondary text-xs font-weight-bolder opacity-9 p-2">
                                            <?php echo $row['TU']; ?>
                                        </th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    <?php } ?>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- End Subjects List -->
                    <?php } else {;
                    } ?>
                </div>
            </div>
            <!-- footer -->
            <?php include '../../includes/footer.php'; ?>
            <!-- End footer -->
        </div>

    </main>
    <!--   Core JS Files   -->
    <?php include '../../includes/scripts.php'; ?>
</body>

</html>