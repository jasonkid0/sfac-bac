<!-- Head -->
<?php
session_start();
include '../../includes/session.php';
include '../../includes/head.php';
// to get ID
if ($_SESSION['role'] == "Adviser" || $_SESSION['role'] == "Registrar" || $_SESSION['role'] == "Admission") {
    $stud_id = $_GET['stud_id'];
}
// for ctrl function
$_SESSION['stud_id'] = $stud_id;
// for students | if student Not enrolled
if ($_SESSION['role'] == "Student") {
    $q = $db->query("SELECT * FROM tbl_schoolyears SY WHERE stud_id = '$stud_id' AND ay_id = '$_SESSION[AC]' AND sem_id = '$_SESSION[S]'") or die($db->error);
    $count = $q->num_rows;

    if ($count == 0) {
        header('location: enrollNow.php');
    }
}

?>
<title>
    Enrollment Information | SFAC - Bacoor
</title>
</head>
<!-- End Head -->


<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">Enrollment Information</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row mb-6">
                <div class="col-lg-11 col-12 mx-auto">
                    <!-- Student Only -->
                    <?php if ($_SESSION['role'] == "Student") { ?>
                    <div class="page-header min-height-300 border-radius-xl mt-4"
                        style="background-image: url('../../assets/img/curved-images/sfac.png'); background-position-y: 90%;">
                        <span class="mask bg-gradient-danger opacity-4"></span>
                    </div>
                    <div class="card card-body blur shadow-blur mx-4 mt-n5 overflow-hidden">
                        <div class="row gx-4 justify-content-evenly">
                            <?php $getSY = $db->query("SELECT *, CONCAT(S.firstname, ' ', S.middlename, ' ', S.lastname) AS fullname FROM tbl_schoolyears SY
                                    LEFT JOIN tbl_year_levels YL ON YL.year_id = SY.year_id
                                    LEFT JOIN tbl_students S ON S.stud_id = SY.stud_id
                                    LEFT JOIN tbl_courses C ON C.course_id = SY.course_id
                                    WHERE SY.stud_id = '$stud_id' AND ay_id = '$_SESSION[AC]' AND sem_id = '$_SESSION[S]'") or die($db->error);
                                while ($row = $getSY->fetch_array()) {
                                    $course_id = $row['course_id'];
                                    $_SESSION['stud_curri'] = $row['curri'];
                                    $remark = $row['remark'];
                                    $sy_id = $row['sy_id'];
                                ?>

                            <!-- Profile -->
                            <div class="col-auto my-2">
                                <div class="h-100">
                                    <h6 class="mb-1">
                                        <?php echo $row['stud_no']; ?>
                                    </h6>
                                    <p class="mb-0 font-weight-bold text-xs text-center">
                                        Student No.
                                    </p>
                                </div>
                            </div>

                            <div class="col-auto my-2">
                                <div class="h-100">
                                    <h6 class="mb-1">
                                        <?php echo $row['fullname']; ?>
                                    </h6>
                                    <p class="mb-0 font-weight-bold text-xs text-center">
                                        Fullname
                                    </p>
                                </div>
                            </div>
                            <div class="col-auto my-2">
                                <div class="h-100">
                                    <h6 class="mb-1">
                                        <?php echo $row['course_abv']; ?>
                                    </h6>
                                    <p class="mb-0 font-weight-bold text-xs text-center">
                                        Course
                                    </p>
                                </div>
                            </div>
                            <div class="col-auto my-2">
                                <div class="h-100">
                                    <h6 class="mb-1">
                                        <?php echo $row['year_level']; ?>
                                    </h6>
                                    <p class="mb-0 font-weight-bold text-xs text-center">
                                        Year Level
                                    </p>
                                </div>
                            </div>
                            <div class="col-auto my-2">
                                <div class="h-100">
                                    <h6 class="mb-1">
                                        <?php echo $row['ay_id']; ?>
                                    </h6>
                                    <p class="mb-0 font-weight-bold text-xs text-center">
                                        A.Y.
                                    </p>
                                </div>
                            </div>
                            <div class="col-auto my-2">
                                <div class="h-100">
                                    <h6 class="mb-1">
                                        <?php echo $row['sem_id']; ?>
                                    </h6>
                                    <p class="mb-0 font-weight-bold text-xs text-center">
                                        Semester
                                    </p>
                                </div>
                            </div>
                            <div class="col-auto my-2">
                                <div class="h-100">
                                    <h6 class="mb-1">
                                        <?php echo $row['status']; ?>
                                    </h6>
                                    <p class="mb-0 font-weight-bold text-xs text-center">
                                        Type
                                    </p>
                                </div>
                            </div>
                            <div class="col-auto my-2">
                                <div class="h-100">
                                    <?php if ($row['remark'] == "Pending") {
                                                echo '<p class="badge badge-warning badge-sm mb-2">';
                                            } elseif ($row['remark'] == "Canceled" || $row['remark'] == "Disapproved") {
                                                echo '<p class="badge badge-danger badge-sm mb-2">';
                                            } else {
                                                echo '<p class="badge badge-success badge-sm mb-2">';
                                            } ?>
                                    <?php echo $row['remark']; ?>
                                    </p>
                                    <p class="mb-0 font-weight-bold text-xs text-center ">
                                        Status
                                    </p>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="row gx-4 justify-content-evenly">
                            <div class="col-auto my-2">
                                <div class="h-100">
                                    <h6 class="mb-1">
                                        <?php echo (empty($row['schoology_username']) == true)? '-' : $row['schoology_username']; ?>
                                    </h6>
                                    <p class="mb-0 font-weight-bold text-xs text-center">
                                        Schoology Username
                                    </p>
                                </div>
                            </div>
                            <div class="col-auto my-2">
                                <div class="h-100">
                                    <h6 class="mb-1">
                                        <?php echo (empty($row['schoology_password']) == true)? '-' : $row['schoology_password'];?>
                                    </h6>
                                    <p class="mb-0 font-weight-bold text-xs text-center">
                                        Schoology Password
                                    </p>
                                </div>
                            </div>
                            <p class="my-2"><b>Note:</b> Any Schoology account concerns, please refer to the <b>Registrar's Office.</b></p>
                        </div>
                    </div> <!-- End Profile -->
                    <!-- End Student Only -->
                    <?php } else { ?>
                    <!-- Enrollment info. -->
                    <div class="card card-body mt-4 shadow-sm">
                        <h5 class="mb-0">Enrollment Form</h5>
                        <p class="text-sm mb-0">Student Information</p>
                        <hr class="horizontal dark my-3">
                        <form method="POST" action="userData/ctrl.enrollmentInfo.php">
                            <?php $getStud = $db->query("SELECT *, CONCAT(S.firstname, ' ', S.middlename, ' ', S.lastname) AS fullname FROM tbl_schoolyears SY 
                            LEFT JOIN tbl_students S USING(stud_id)
                            WHERE stud_id = '$stud_id' AND ay_id = '$_SESSION[AC]' AND sem_id = '$_SESSION[S]'") or die($db->error);
                                while ($row = $getStud->fetch_array()) {
                                    $course_id = $row['course_id']; 
                                    $_SESSION['stud_curri'] = $row['curri']; ?>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Student Code</label>
                                    <input class="form-control" type="text" placeholder="Student Code" required
                                        name="stud_no" readonly value="<?php echo $row['stud_no']; ?>" />
                                </div>

                                <div class="col-sm-8">
                                    <label>Fullname</label>
                                    <input class="form-control" type="text"
                                        placeholder="Please fill out all fields in Personal Info" required
                                        name="username" readonly
                                        <?php if (!empty($row['firstname']) && !empty($row['lastname'])) {
                                                                                                                                                                                    echo 'value="' . $row['fullname'] . '"';
                                                                                                                                                                                } ?> />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-8">
                                    <label class="mt-3">Course</label>
                                    <select class="form-control" name="course" id="department">
                                        <?php
                                                $getCourse = $db->query("SELECT * FROM tbl_courses WHERE course_id IN ('$row[course_id]')");
                                                while ($row1 = $getCourse->fetch_array()) {
                                                    echo '<option selected disabled value="' . $row1['course_id'] . '">' .
                                                        $row1['course'] . '</option>';
                                                }

                                                $getCourse1 = $db->query("SELECT * FROM tbl_courses WHERE course_id NOT IN ('$row[course_id]')");
                                                while ($row1 = $getCourse1->fetch_array()) {
                                                    echo '<option value="' . $row1['course_id'] . '">' .
                                                        $row1['course'] . '</option>';
                                                }
                                                ?>
                                    </select>
                                </div>

                                <div class="col-sm-4">
                                    <label class="mt-3">Year Level</label>
                                    <select class="form-control" name="level" id="year_lvl">
                                        <?php $getYlevel = $db->query("SELECT * FROM tbl_year_levels WHERE year_id IN ('$row[year_id]')") or die($db->error);
                                                while ($row1 = $getYlevel->fetch_array()) {
                                                    echo '<option selected disabled value="' . $row1['year_id'] . '">' .
                                                        $row1['year_level'] . '</option>';
                                                }

                                                $getYlevel1 = $db->query("SELECT * FROM tbl_year_levels WHERE year_id NOT IN ('$row[year_id]')") or die($db->error);
                                                while ($row1 = $getYlevel1->fetch_array()) {
                                                    echo '<option value="' . $row1['year_id'] . '">' .
                                                        $row1['year_level'] . '</option>';
                                                } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-sm-4">
                                    <label class="mt-3">Status</label>
                                    <select class="form-control" name="status" id="status">
                                        <?php
                                                if ($row['status'] == "New") {
                                                    echo '<option selected disabled value="New">New Student</option>
                                                         <option value="Old">Old Student</option>
                                                         ';
                                                } elseif ($row['status'] == "Old") {
                                                    echo '<option selected disabled value="Old">Old Student</option>
                                                    <option value="New">New Student</option>
                                                      ';
                                                } else {
                                                    echo '<option value="New">New Student</option>
                                                    <option value="Old">Old Student</option>
                                                    ';
                                                }
                                                ?>
                                    </select>
                                </div>

                                <div class="col-sm-4">
                                    <label class="mt-3">Transferee</label>
                                    <select class="form-select" name="transferee" id="curri">
                                        <?php if ($row['transferee'] == "No" || empty($row['transferee'])) {
                                                    echo '<option value="Yes">Yes</option>
                                           <option selected value="No">No</option>';
                                                } else {
                                                    echo '<option selected value="Yes">Yes</option>
                                                    <option value="No">No</option>';
                                                } ?>


                                    </select>
                                </div>

                                <div class="col-sm-4">
                                    <label class="mt-3">Balik Franciscano</label>
                                    <select class="form-select" name="bfranciscano" id="dep">
                                        <?php if ($row['bf'] == "No" || empty($row['bf'])) {
                                                    echo '<option value="Yes">Yes</option>
                                           <option selected value="No">No</option>';
                                                } else {
                                                    echo '<option selected value="Yes">Yes</option>
                                                    <option value="No">No</option>';
                                                } ?>


                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="mt-3">Schoology Username</label>
                                    <input class="form-control" type="text" placeholder="Username" 
                                        name="schoology_username" value="<?php echo $row['schoology_username']; ?>" <?php echo ($_SESSION['role'] == 'Registrar' || $_SESSION['role'] == "Admission") ? : 'readonly';?>/>
                                </div>

                                <div class="col-sm-6">
                                    <label class="mt-3">Schoology Password</label>
                                    <input class="form-control" type="text" placeholder="Password" 
                                        name="schoology_password" value="<?php echo $row['schoology_password']; ?>" <?php echo ($_SESSION['role'] == 'Registrar' || $_SESSION['role'] == "Admission") ? : 'readonly';?>/>
                                </div>
                            </div>
                            <div class="row">
                                <p class="ml-3 mt-3"><b>Note:</b> Any Schoology account concerns, please refer to the <b>Registrar's Office.</b></p>
                            </div>
                            <div class="d-flex justify-content-end mt-4">
                                <button class="btn bg-gradient-primary m-0 ms-2" type="submit" title="Send"
                                    name="update">Update</button>
                            </div>
                            <?php } ?>
                        </form>
                    </div>
                    <?php } ?>
                    <!-- End Enrollment info. -->

                    <!-- Subjects List -->
                    <div class="card shadow shadow-xl mt-4">
                        <form action="userData/ctrl.enrollmentInfo.php" method="POST">
                            <!-- Card header -->
                            <div class="card-header">
                                <div class="d-lg-flex">
                                    <div>
                                        <h5 class="mb-0">List of your Enrolled Subject(s)</h5>
                                        <p class="text-sm mb-0">
                                            Verify carefully your subject/s to be Enrolled
                                        </p>
                                    </div>
                                    <div class="ms-auto my-auto mt-lg-0 mt-4 ">
                                        <div class="ms-auto my-auto">
                                            <?php if ($_SESSION['role'] == "Student" && $remark == "Pending") {
                                                echo '<button type="button" class="btn bg-gradient-dark btn-sm mb-0"
                                                data-bs-toggle="modal" data-bs-target="#addSub"><i
                                                    class="fas fa-plus text-sm"> </i>
                                                Add Subjects
                                            </button>';
                                            } elseif ($_SESSION['role'] == "Adviser" || $_SESSION['role'] == "Registrar" || $_SESSION['role'] == "Admission") {
                                                echo '<button type="button" class="btn bg-gradient-dark btn-sm mb-0"
                                                data-bs-toggle="modal" data-bs-target="#addSub"><i
                                                    class="fas fa-plus text-sm"> </i>
                                                Add Subjects
                                            </button>';
                                            } ?>
                                            </button>
                                            <div class="modal fade" id="addSub" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog mt-lg-5" style="max-width:1100px !important;">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="longModal">
                                                                Subjects List</h5>
                                                            <i class="fas fa-book-open ms-3"></i>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <script>
                                                                function selectYear() {
                                                                    if (document.getElementById('first_year').checked) {
                                                                        $('input.year_I').each(function() {
                                                                            this.checked = true;
                                                                        });
                                                                    } else {
                                                                        $('input.year_I').each(function() {
                                                                            this.checked = false;
                                                                        });
                                                                    }

                                                                    if (document.getElementById('second_year').checked) {
                                                                        $('input.year_II').each(function() {
                                                                            this.checked = true;
                                                                        });
                                                                    } else {
                                                                        $('input.year_II').each(function() {
                                                                            this.checked = false;
                                                                        });
                                                                    }

                                                                    if (document.getElementById('third_year').checked) {
                                                                        $('input.year_III').each(function() {
                                                                            this.checked = true;
                                                                        });
                                                                    } else {
                                                                        $('input.year_III').each(function() {
                                                                            this.checked = false;
                                                                        });
                                                                    }

                                                                    if (document.getElementById('fourth_year').checked) {
                                                                        $('input.year_IV').each(function() {
                                                                            this.checked = true;
                                                                        });
                                                                    } else {
                                                                        $('input.year_IV').each(function() {
                                                                            this.checked = false;
                                                                        });
                                                                    }
                                                                }
                                                            </script>
                                                        <div class="form-check mx-4 my-4">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <input class="form-check-input" name="" id="first_year" onclick="selectYear()" type="checkbox" >First Year
                                                                </div>
                                                                <div class="col">
                                                                    <input class="form-check-input" name="" id="second_year" onclick="selectYear()" type="checkbox" >Second Year
                                                                </div>
                                                                <div class="col">
                                                                    <input class="form-check-input" name="" id="third_year" onclick="selectYear()" type="checkbox" >Third Year
                                                                </div>
                                                                <div class="col">
                                                                    <input class="form-check-input" name="" id="fourth_year" onclick="selectYear()" type="checkbox" >Fourth Year
                                                                </div>
                                                            </div>
                                                        </div>
                                                            <div class="table-responsive px-3 my-3">
                                                                <table
                                                                    class="table table-flush table-hover m-0 responsive nowrap"
                                                                    style="width: 100%;" id="datatable-simple">
                                                                    <thead class="thead-light">
                                                                        <tr>
                                                                            <th
                                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                                                Course Code</th>
                                                                            <th
                                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                                                Course Description</th>
                                                                            <th
                                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                                                Program</th>
                                                                            <th
                                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                                                Year Level</th>
                                                                            <th
                                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                                                Semester</th>
                                                                            <th
                                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                                                Unit(s)</th>
                                                                            <th
                                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                                                Prerequisites</th>
                                                                            <th
                                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                                                Section</th>
                                                                            <th
                                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                                                Room</th>
                                                                            <th
                                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                                                Day</th>
                                                                            <th
                                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                                                Time</th>
                                                                            <th
                                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                                                Curri</th>
                                                                            
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php $i = -1;
                                                                        $query1 = $db->query("SELECT * FROM tbl_schedules S
                                                                            LEFT JOIN tbl_subjects_new SN ON SN.subj_id = S.subj_id
                                                                            LEFT JOIN tbl_courses C ON C.course_id = SN.course_id
                                                                            LEFT JOIN tbl_year_levels YL ON YL.year_id = SN.year_id
                                                                            LEFT JOIN tbl_semesters SEM ON SEM.sem_id = SN.sem_id
                                                                            LEFT JOIN tbl_effective_acadyear EA ON SN.eay_id = EA.eay_id
                                                                            WHERE S.subj_id NOT IN (SELECT ES.subj_id FROM tbl_enrolled_subjects ES WHERE ES.stud_id = '$stud_id' AND ES.acad_year = '$_SESSION[AC]' AND ES.semester = '$_SESSION[S]') AND C.course_id = '$course_id' AND acad_year = '$_SESSION[AC]' AND S.semester = '$_SESSION[S]' AND S.room_status NOT IN (1)
                                                                            ORDER BY YL.year_id, SEM.sem_id") or die($db->error);
                                                                        while ($row2 = $query1->fetch_array()) {
                                                                            $i++; ?>
                                                                        <tr>
                                                                            <td class="text-sm font-weight-normal">
                                                                                <input type="text" hidden name="class[]"
                                                                                    value="<?php echo $row2['class_id']; ?>">
                                                                                <input type="text" hidden
                                                                                    name="eay_id[]"
                                                                                    value="<?php echo $row2['eay_id']; ?>">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input year_<?php echo $row2['year_abv']?>"
                                                                                        name="index[]" type="checkbox"
                                                                                        value="<?php echo $i; ?>"
                                                                                        id="flexCheckDefault1" 
                                                                                        <?php


                                                                                                                                                                                                        $remarks = $db->query("SELECT remarks FROM tbl_enrolled_subjects WHERE subj_id = '$row2[subj_id]' AND stud_id = '$stud_id'");
                                                                                                                                                                                                        $get_remarks = $remarks->fetch_array();
                                                                                                                                                                                                        if (!empty($get_remarks)) {
                                                                                                                                                                                                            if ($get_remarks['remarks'] == "Passed" || $get_remarks['remarks'] == "INC") {
                                                                                                                                                                                                                echo "disabled";
                                                                                                                                                                                                            }
                                                                                                                                                                                                        }

                                                                                                                                                                                                        ?>>
                                                                                    <?php echo $row2['subj_code']; ?>
                                                                                </div>
                                                                                <input type="text" hidden
                                                                                    name="subjects[]"
                                                                                    value="<?php echo $row2['subj_id']; ?>" >
                                                                            </td>
                                                                            <td class="text-sm font-weight-normal">
                                                                                <?php echo $row2['subj_desc']; ?>
                                                                            </td>
                                                                            <td class="text-sm font-weight-normal">
                                                                                <?php echo $row2['course_abv']; ?>
                                                                            </td>
                                                                            <td class="text-sm font-weight-normal">
                                                                                <?php echo $row2['year_level']; ?>
                                                                            </td>
                                                                            <td class="text-sm font-weight-normal">
                                                                                <?php echo $row2['semester']; ?>
                                                                            </td>
                                                                            <td class="text-sm font-weight-normal">
                                                                                <?php echo $row2['unit_total']; ?>
                                                                            </td>
                                                                            <td class="text-sm font-weight-normal">
                                                                                <?php echo $row2['prereq']; ?>
                                                                            </td>
                                                                            <td class="text-sm font-weight-normal">
                                                                                <?php echo $row2['section']; ?>
                                                                            </td>
                                                                            <td class="text-sm font-weight-normal">
                                                                                <?php echo $row2['room']; ?>
                                                                            </td>
                                                                            <td class="text-sm font-weight-normal">
                                                                                <?php echo $row2['day']; ?>
                                                                            </td>
                                                                            <td class="text-sm font-weight-normal">
                                                                                <?php echo $row2['time']; ?>
                                                                            </td>
                                                                            <td class="text-sm font-weight-normal">
                                                                                <?php echo $row2['eay']; ?>
                                                                            </td>
                                                                            
                                                                            
                                                                        </tr>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button"
                                                                class="btn bg-gradient-secondary btn-sm"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" name="addSub"
                                                                class="btn bg-gradient-dark btn-sm">Add</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if ($_SESSION['role'] == "Student" && $remark == "Pending") {
                                                echo '<button class="btn bg-gradient-danger btn-sm export mb-0 mt-sm-0 mt-0"
                                                data-type="csv" type="submit" name="delete"><i
                                                    class="fas fa-trash text-sm">
                                                </i> Delete</button>';
                                            } elseif ($_SESSION['role'] == "Adviser" || $_SESSION['role'] == "Registrar" || $_SESSION['role'] == "Admission") {
                                                echo '<button class="btn bg-gradient-danger btn-sm export mb-0 mt-sm-0 mt-0"
                                                data-type="csv" type="submit" name="delete"><i
                                                    class="fas fa-trash text-sm">
                                                </i> Delete</button>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="horizontal dark m-0">
                            <script>
                                function selectAll() {
                                    if (document.getElementById('select').checked) {
                                        $('input.cb').each(function() {
                                            this.checked = true;
                                        });
                                    } else {
                                        $('input.cb').each(function() {
                                            this.checked = false;
                                        });
                                    }
                                }

                                // $(document).ready(function() {
                                //     $('#select').click(function() {
                                //         $('input.cb').each(function() {
                                //             this.checked = true;
                                //         });
                                //     })
                                // });

                            </script>
                            <div class="form-check mx-4 my-4">
                                <input class="form-check-input" name="" type="checkbox" onclick=selectAll() id="select">Select All
                            </div>
                            <div class="table-responsive px-4 my-4">
                                <table class="table table-flush table-hover m-0 responsive nowrap" style="width: 100%;"
                                    id="datatable-info">
                                    <thead class="thead-light">
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                Course Code</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                Course Description</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                Unit(s)</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                Section</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                Day</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                Time</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                Room</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                Curriculum</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query01 = $db->query("SELECT * FROM tbl_enrolled_subjects ES
                                            LEFT JOIN tbl_schedules S ON S.class_id = ES.class_id
                                            LEFT JOIN tbl_students STUD ON STUD.stud_id = ES.stud_id
                                            LEFT JOIN tbl_subjects_new SN ON SN.subj_id = ES.subj_id
                                            LEFT JOIN tbl_effective_acadyear EA ON SN.eay_id = EA.eay_id
                                            WHERE ES.stud_id = '$stud_id' AND ES.acad_year = '$_SESSION[AC]' AND ES.semester = '$_SESSION[S]' AND SN.course_id = '$course_id'
                                            ORDER BY enrolled_subj_id ASC") or die($db->error);
                                        while ($row = $query01->fetch_array()) { ?>
                                        <tr>
                                            <td class="text-sm font-weight-normal">

                                                <?php if ($_SESSION['role'] == "Student" && $remark == "Pending") {
                                                        echo '<div class="form-check"> <input class="form-check-input cb" name="check[]" type="checkbox"
                                                        value="' . $row['enrolled_subj_id'] . '"
                                                        id="flexCheckDefault2">' . $row['subj_code'] . '
                                                </div>';
                                                    } elseif ($_SESSION['role'] == "Registrar" || $_SESSION['role'] == "Adviser" || $_SESSION['role'] == "Admission") {
                                                        echo '<div class="form-check"> <input class="form-check-input cb" name="check[]" type="checkbox"
                                                        value="' . $row['enrolled_subj_id'] . '"
                                                        id="flexCheckDefault2">' . $row['subj_code'] . '
                                                </div>';
                                                    } else {
                                                        echo $row['subj_code'];
                                                    } ?>

                                            </td>
                                            <td class="text-sm font-weight-normal">
                                                <?php echo $row['subj_desc']; ?>
                                            </td>
                                            <td class="text-sm font-weight-normal">
                                                <?php echo $row['unit_total']; ?>
                                            </td>
                                            <td class="text-sm font-weight-normal">
                                                <?php echo $row['section']; ?>
                                            </td>
                                            <td class="text-sm font-weight-normal">
                                                <?php echo $row['day']; ?>
                                            </td>
                                            <td class="text-sm font-weight-normal">
                                                <?php echo $row['time']; ?>
                                            </td>
                                            <td class="text-sm font-weight-normal">
                                                <?php echo $row['room']; ?>
                                            <td class="text-sm font-weight-normal">
                                                <?php echo $row['eay']; ?>
                                            </td>
                                        </tr>
                                        <!-- Modal Delete -->
                                        <!-- <div class="modal fade" id="modal-notification"
                                                    tabindex="-1" role="dialog" aria-labelledby="modal-notification"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-danger modal-dialog-centered modal-"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h6 class="modal-title text-danger"
                                                                    id="modal-title-notification"><i
                                                                        class="fas fa-exclamation-triangle"> </i>
                                                                    Warning
                                                                </h6>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="py-3 text-center">
                                                                    <i class="fas fa-trash-alt text-9xl"></i>
                                                                    <h4 class="text-gradient text-danger mt-4">
                                                                        Delete Account!</h4>
                                                                    <p>Are you sure you want to delete
                                                                        <br>
                                                                        <i><b>Name</b></i>?
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="#"
                                                                    class="btn btn-white text-white bg-danger">Delete</a>
                                                                <button type="button"
                                                                    class="btn btn-link text-secondary btn-outline-dark ml-auto"
                                                                    data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <?php $query02 = $db->query("SELECT SUM(unit_total) AS TU FROM tbl_enrolled_subjects ES
                                            LEFT JOIN tbl_subjects_new SN ON SN.subj_id = ES.subj_id
                                            WHERE ES.stud_id = '$stud_id' AND ES.acad_year = '$_SESSION[AC]' AND ES.semester = '$_SESSION[S]' AND SN.course_id = '$course_id'") or die($db->error);
                                        while ($row = $query02->fetch_array()) { ?>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
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
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        <?php } ?>
                                    </tfoot>
                                </table>
                            </div>
                        </form>
                    </div>
                    <!-- End Subjects List -->

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