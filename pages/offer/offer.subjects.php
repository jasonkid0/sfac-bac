<?php
session_start();
include '../../includes/head.php';
include '../../includes/session.php';
if (!empty($_GET['eay'])) {
    $_SESSION['back_eay'] = $_GET['eay'];
}
if (!empty($_GET['CID'])) {
    $_SESSION['back_CID'] = $_GET['CID'];
}
?>
<title>
    Offer Subjects | SFAC - Bacoor
</title>
</head>


<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">Offer Subjects</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row mb-5">
                <div class="col-12">
                    <div class="card shadow shadow-xl">
                        <!-- Card header -->
                        <div class="card-header">
                            <form method="GET">
                                <div class="row">
                                    <div class="col-md-7 ms-auto">
                                        <h5 class="mb-0">Subjects List</h5>

                                        <?php
                                        if ($_SESSION['role'] == "Adviser") {
                                            if (!empty($_GET['CID'])) {
                                                $query = $db->query("SELECT * FROM tbl_courses WHERE course_id = '$_GET[CID]' AND department_id = '$_SESSION[ADepartment_id]'") or die($db->error);
                                                while ($row2 = $query->fetch_array()) {
                                                    echo '<p class="text-sm mb-0">
                                                    Offer/Open Subjects for ' . $row2['course'] . '
                                                </p>';
                                                }
                                            }
                                        } elseif ($_SESSION['role'] == "Registrar") {
                                            if (!empty($_GET['CID'])) {
                                                $query = $db->query("SELECT * FROM tbl_courses WHERE course_id = '$_GET[CID]'") or die($db->error);
                                                while ($row2 = $query->fetch_array()) {
                                                    echo '<p class="text-sm mb-0">
                                                    Offer/Open Subjects for ' . $row2['course'] . '
                                                </p>';
                                                }
                                            }
                                        } ?>

                                    </div>

                                    <div class="col-md-3 px-0 g-0 mt-3 my-lg-0">
                                        <div class="my-auto">
                                            <select class="form-control" name="eay" id="academic_year">
                                                <?php
                                                // URl error 
                                                $getEAY1 = $db->query("SELECT * FROM tbl_effective_acadyear WHERE eay = '$_GET[eay]'") or die($db->error);
                                                $count = $getEAY1->num_rows;
                                                if (!empty($_GET['eay']) && $count > 0) {
                                                    $getEAY = $db->query("SELECT * FROM tbl_effective_acadyear WHERE eay IN ('$_GET[eay]')") or die($db->error);
                                                    while ($row = $getEAY->fetch_array()) {
                                                        echo '<option selected value="' . $row['eay'] . '">' . $row['eay'] . '</option>';
                                                    }
                                                    $getEAY2 = $db->query("SELECT * FROM tbl_effective_acadyear WHERE eay NOT IN ('$_GET[eay]') ORDER BY eay DESC") or die($db->error);
                                                    while ($row = $getEAY2->fetch_array()) {
                                                        echo '<option value="' . $row['eay'] . '">' . $row['eay'] . '</option>';
                                                    }
                                                } else {
                                                    echo '<option selected  value="">Select a year
                                                        </option>';
                                                    $getEAY3 = $db->query("SELECT * FROM tbl_effective_acadyear ORDER BY eay DESC") or die($db->error);
                                                    while ($row = $getEAY3->fetch_array()) {
                                                        echo '<option value="' . $row['eay'] . '">' . $row['eay'] . '</option>';
                                                    }
                                                } ?>
                                            </select>
                                            <?php
                                            if ($_SESSION['role'] == "Adviser") {
                                                if (!empty($_GET['CID'])) {
                                                    $getCour = $db->query("SELECT * FROM tbl_courses WHERE course_id = '$_GET[CID]' AND department_id = '$_SESSION[ADepartment_id]'") or die($db->error);
                                                    $count1 = $getCour->num_rows;
                                                    if (!empty($_GET['CID']) && $count1 > 0) {
                                                        echo '<input hidden type="text" name="CID" value="' . $_GET['CID'] . '">';
                                                    }
                                                }
                                            } elseif ($_SESSION['role'] == "Registrar") {
                                                if (!empty($_GET['CID'])) {
                                                    $getCour = $db->query("SELECT * FROM tbl_courses WHERE course_id = '$_GET[CID]'") or die($db->error);
                                                    $count1 = $getCour->num_rows;
                                                    if (!empty($_GET['CID']) && $count1 > 0) {
                                                        echo '<input hidden type="text" name="CID" value="' . $_GET['CID'] . '">';
                                                    }
                                                }
                                            } ?>

                                        </div>
                                    </div>
                                    <div class="col-md-2 px-0 g-0 text-center mt-0 mt-md-3 my-lg-0">
                                        <button type="submit" class="btn bg-gradient-dark"><i class="fas fa-eye">
                                            </i>
                                            &nbsp;Show</button>
                                    </div>
                                </div>
                                <div id="divRes">

                                </div>
                            </form>
                        </div>
                        <hr class="horizontal dark m-0">
                        <div class="table-responsive px-4 my-4">
                            <table class="table table-flush table-hover m-0 responsive nowrap" id="datatable-basic"
                                style="width: 100%;">
                                <thead class="thead-light">
                                    <tr>

                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Course Code</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Course Description</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Abbr</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Unit(s)</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Prerequisites</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Curriculum</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Level</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Semester</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Option</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $m = 0;
                                    if (!empty($_GET['CID']) && $count1 > 0) {
                                        if (!empty($_GET['eay'])) {
                                            $listSubjects = mysqli_query($db, "SELECT * FROM tbl_subjects_new SN
                                            LEFT JOIN tbl_year_levels YL ON YL.year_id = SN.year_id
                                            LEFT JOIN tbl_semesters S ON S.sem_id = SN.sem_id
                                            LEFT JOIN tbl_effective_acadyear EA ON EA.eay_id = SN.eay_id
                                            LEFT JOIN tbl_courses C USING(course_id)
                                            WHERE SN.course_id = '$_GET[CID]' AND eay = '$_GET[eay]' AND SN.sem_id = '$_SESSION[ASem]'") or die($db->error);
                                        } else {
                                            $listSubjects = mysqli_query($db, "SELECT * FROM tbl_subjects_new SN
                                                LEFT JOIN tbl_year_levels YL ON YL.year_id = SN.year_id
                                                LEFT JOIN tbl_semesters S ON S.sem_id = SN.sem_id
                                                LEFT JOIN tbl_effective_acadyear EA ON EA.eay_id = SN.eay_id
                                                LEFT JOIN tbl_courses C USING(course_id)
                                                WHERE SN.course_id = '$_GET[CID]' AND eay = '0' AND SN.sem_id = '$_SESSION[ASem]'") or die($db->error);
                                        }
                                    } else {
                                        $listSubjects = mysqli_query($db, "SELECT * FROM tbl_subjects_new SN
                                                LEFT JOIN tbl_year_levels YL ON YL.year_id = SN.year_id
                                                LEFT JOIN tbl_semesters S ON S.sem_id = SN.sem_id
                                                LEFT JOIN tbl_effective_acadyear EA ON EA.eay_id = SN.eay_id
                                                LEFT JOIN tbl_courses C USING(course_id)
                                                WHERE SN.course_id = '0' AND eay = '0' AND SN.sem_id = '$_SESSION[ASem]'") or die($db->error);
                                    }

                                    while ($row = mysqli_fetch_array($listSubjects)) {
                                        $m++;
                                        $id = $row['subj_id'];
                                    ?>
                                    <tr>


                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['subj_code']; ?>
                                        </td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['subj_desc']; ?></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['course_abv']; ?></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['unit_total']; ?></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['prereq']; ?></td>
                                            <td class="text-sm font-weight-normal"><?php echo $row['eay']; ?></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['year_level']; ?></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['semester']; ?>
                                        </td>
                                        <td class="text-sm font-weight-normal">

                                            <a class="btn btn-block mb-0 text-xs p-3"
                                                style="background-color: #003754; color: #fff" data-bs-toggle="modal"
                                                data-bs-target="#modal-sched<?php echo $id; ?>"><i class="fas fa-plus">
                                                </i>
                                                Schedule</a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="modal-sched<?php echo $id; ?>" tabindex="-1"
                                        role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                                        <div class="modal-dialog modal-danger modal-dialog-centered modal-"
                                            role="document" style="max-width:850px !important;">
                                            <form action="offerData/ctrl.offer.subjects.php" method="POST">
                                                <div class=" modal-content">
                                                    <div class="modal-header bg-gray-100">
                                                        <h6 class="modal-title text-dark text-uppercase"
                                                            id="modal-title-notification">
                                                            <i class="fas fa-calendar-plus"></i>
                                                            Add Schedule
                                                        </h6>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="py-2">
                                                            <div class="row mb-2">
                                                                <div class="col-lg-11 col-12 mx-auto">
                                                                    <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <label>Subject Code</label>
                                                                            <input class="form-control" type="text"
                                                                                placeholder="Subject Code"
                                                                                name="subj_code" readonly
                                                                                value="<?php echo $row['subj_code'] ?>" />
                                                                            <input class="form-control" hidden
                                                                                type="text" name="subj_id"
                                                                                value="<?php echo $row['subj_id'] ?>" />
                                                                        </div>
                                                                        <div class="col-sm-7">
                                                                            <label>Subject
                                                                                Description</label>
                                                                            <input class="form-control" type="text"
                                                                                placeholder="Subject Description"
                                                                                name="subj_desc" readonly
                                                                                value="<?php echo $row['subj_desc'] ?>" />
                                                                        </div>
                                                                        <div class="col-sm-2">
                                                                            <label>Unit(s)</label>
                                                                            <input class="form-control" type="text"
                                                                                placeholder="Total Unit(s)"
                                                                                name="unit_total" readonly
                                                                                value="<?php echo $row['unit_total'] ?>" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <label class="mt-3">Day</label>
                                                                            <input class="form-control" type="text"
                                                                                placeholder="(M/T/W/TH/F)" name="day" />
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <label class="mt-3">Time</label>
                                                                            <input class="form-control" type="text"
                                                                                placeholder="(hh:mm am/pm)"
                                                                                name="time" />
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <label class="mt-3">Room</label>
                                                                            <input class="form-control" type="text"
                                                                                placeholder="Enter Room" name="room" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <label class="mt-3">Section</label>
                                                                            <input class="form-control" type="text"
                                                                                placeholder="Enter a Section"
                                                                                name="section" />
                                                                        </div>
                                                                        <div class="col-sm-8">
                                                                            <label class="mt-3">Instructor</label>
                                                                            <select class="form-control multi"
                                                                                name="instr"
                                                                                id="multi_instr<?php echo $m; ?>">
                                                                                <option value="" selected disabled>
                                                                                    Select Instructor
                                                                                </option>
                                                                                <?php $getTeachers = $db->query("SELECT *, CONCAT(faculty_lastname, ', ', faculty_firstname, ' ', faculty_middlename) AS fullname FROM tbl_faculties_staff") or die($db->error);
                                                                                    while ($row4 = $getTeachers->fetch_array()) {
                                                                                        echo '<option value="' . $row4['faculty_id']  . '">' . $row4['fullname'] . '</option>';
                                                                                    } ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-check mt-3">
                                                                                <label>Special
                                                                                    Tutorial</label>
                                                                                <input class="form-check-input"
                                                                                    name="special_tut[]" type="checkbox"
                                                                                    id="flexCheckDefault2" value="1">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer bg-gray-100">
                                                        <button class="btn btn-white text-white bg-dark" type="submit"
                                                            name="add">Add
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-link text-secondary btn-outline-dark ml-auto"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <?php }
                                    ?>
                                </tbody>
                                <?php if (!empty($_GET['eay']) && $count > 0 && !empty($_GET['CID']) && $count1 > 0) { ?>
                                <tfoot>
                                    <tr>
                                        <th class="text-sm font-weight-normal">
                                            <a class="btn btn-block mb-0 text-xs p-3"
                                                style="background-color: #156348; color: #fff" data-bs-toggle="modal"
                                                data-bs-target="#modal-petitioned"><i class="fas fa-plus"> </i>
                                                Petitioned Subject</a>
                                        </th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    <div class="modal fade" id="modal-petitioned" tabindex="-1" role="dialog"
                                        aria-labelledby="modal-notification" aria-hidden="true">
                                        <div class="modal-dialog modal-danger modal-dialog-centered modal-"
                                            role="document" style="max-width:850px !important;">
                                            <form action="offerData/ctrl.offer.subjects.php" method="POST">
                                                <div class=" modal-content">
                                                    <div class="modal-header bg-gray-100">
                                                        <h6 class="modal-title text-dark text-uppercase"
                                                            id="modal-title-notification">
                                                            <i class="fas fa-calendar-plus"></i>
                                                            Add Petitioned Subject
                                                        </h6>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="py-2">
                                                            <div class="row mb-2">
                                                                <div class="col-lg-11 col-12 mx-auto">
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <label class="mt-3">Subject</label>
                                                                            <select class="form-control multi_sub"
                                                                                name="subj_id" id="dep">
                                                                                <option value="" selected disabled>
                                                                                    Select Subject
                                                                                </option>
                                                                                <?php
                                                                                    if (!empty($_GET['eay'])) {
                                                                                        $petitioned = mysqli_query($db, "SELECT * FROM tbl_subjects_new SN
                                            LEFT JOIN tbl_year_levels YL ON YL.year_id = SN.year_id
                                            LEFT JOIN tbl_semesters S ON S.sem_id = SN.sem_id
                                            LEFT JOIN tbl_effective_acadyear EA ON EA.eay_id = SN.eay_id
                                            WHERE course_id = '$_GET[CID]' AND eay = '$_GET[eay]' AND SN.sem_id NOT IN ('$_SESSION[ASem]')") or die($db->error);
                                                                                    } else {
                                                                                        $petitioned = mysqli_query($db, "SELECT * FROM tbl_subjects_new SN
                                                LEFT JOIN tbl_year_levels YL ON YL.year_id = SN.year_id
                                                LEFT JOIN tbl_semesters S ON S.sem_id = SN.sem_id
                                                LEFT JOIN tbl_effective_acadyear EA ON EA.eay_id = SN.eay_id
                                                WHERE course_id = '$_GET[CID]' AND eay = '0' AND SN.sem_id NOT IN ('$_SESSION[ASem]')") or die($db->error);
                                                                                    }

                                                                                    while ($row = mysqli_fetch_array($petitioned)) {
                                                                                        echo '<option value="' . $row['subj_id'] . '">' . $row['subj_code'] . '&nbsp;&nbsp; (' . $row['subj_desc'] . ') &nbsp;&nbsp;- &nbsp;&nbsp;' . $row['semester'] . '
                                                                                        </option>';
                                                                                    }

                                                                                    ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <label class="mt-3"> Day</label>
                                                                            <input class="form-control" type="text"
                                                                                placeholder="(M/T/W/TH/F)" name="day" />
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <label class="mt-3">Time</label>
                                                                            <input class="form-control" type="text"
                                                                                placeholder="(hh:mm am/pm)"
                                                                                name="time" />
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <label class="mt-3">Room</label>
                                                                            <input class="form-control" type="text"
                                                                                placeholder="Enter Room" name="room" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <label class="mt-3">Section</label>
                                                                            <input class="form-control" type="text"
                                                                                placeholder="Enter a Section"
                                                                                name="section" />
                                                                        </div>
                                                                        <div class="col-sm-8">
                                                                            <label class="mt-3">Instructor</label>
                                                                            <select class="form-control multi_inst"
                                                                                name="inst" id="status">
                                                                                <option value="" selected disabled>
                                                                                    Select Instructor
                                                                                </option>
                                                                                <?php $getTeachers = $db->query("SELECT *, CONCAT(faculty_lastname, ', ', faculty_firstname, ' ', faculty_middlename) AS fullname FROM tbl_faculties_staff") or die($db->error);
                                                                                    while ($row4 = $getTeachers->fetch_array()) {
                                                                                        echo '<option value="' . $row4['faculty_id']  . '">' . $row4['fullname'] . '</option>';
                                                                                    } ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer bg-gray-100">
                                                        <button class="btn btn-white text-white bg-dark" type="submit"
                                                            name="add_petitioned">Add
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-link text-secondary btn-outline-dark ml-auto"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </tfoot>
                                <?php } ?>
                            </table>
                        </div>
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