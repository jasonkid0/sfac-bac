<?php
session_start();
include '../../includes/head.php';
include '../../includes/session.php';
if (!empty($_GET['CID'])) {
    $_SESSION['back_CID'] = $_GET['CID'];
}
?>
<title>
    Class Schedules List | SFAC - Bacoor
</title>
</head>


<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">Class Schedules List</h6>
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
                                    <div class="col-md-12 ms-auto">
                                        <h5 class="mb-0">Subjects List</h5>

                                        <?php
                                        if ($_SESSION['role'] == "Adviser") {
                                            if (!empty($_GET['CID'])) {
                                                $query = $db->query("SELECT * FROM tbl_courses WHERE course_id = '$_GET[CID]' AND department_id = '$_SESSION[ADepartment_id]'") or die($db->error);
                                                while ($row2 = $query->fetch_array()) {
                                                    echo '<p class="text-sm mb-0">
                                                    Class Schedules List for ' . $row2['course'] . '
                                                </p>';
                                                }
                                            } else {
                                                echo '<p class="text-sm mb-0">
                                                    Note: Select Course to show Class Schedules List
                                                </p>';
                                            }
                                        } elseif ($_SESSION['role'] == "Registrar") {
                                            if (!empty($_GET['CID'])) {
                                                $query = $db->query("SELECT * FROM tbl_courses WHERE course_id = '$_GET[CID]'") or die($db->error);
                                                while ($row2 = $query->fetch_array()) {
                                                    echo '<p class="text-sm mb-0">
                                                    Class Schedules List for ' . $row2['course'] . '
                                                </p>';
                                                }
                                            } else {
                                                echo '<p class="text-sm mb-0">
                                                    Note: Select Course to show Class Schedules List
                                                </p>';
                                            }
                                        } ?>

                                    </div>
                                </div>
                                <div class="card mt-3">
                                    <div class="card-body border-radius-lg bg-gradient-dark p-3">
                                        <h6 class="mb-0 text-white">
                                            Course:
                                        </h6>
                                        <!-- <p class="text-white text-sm mb-4">
                                                    Have a question, concern, or comment
                                                    about security? Please contact us.
                                                </p> -->
                                        <div class="d-flex flex-wrap justify-content-center">
                                            <?php $getDepa = $db->query("SELECT * FROM tbl_departments RIGHT JOIN tbl_courses ON tbl_courses.department_id = tbl_departments.department_id") or die($db->error);
                                            while ($row = $getDepa->fetch_array()) {
                                                if ($_SESSION['role'] == "Adviser") {
                                                    if ($row['department_id'] == $_SESSION['ADepartment_id']) {
                                                        echo '
                                                        <a href="list.classSched.php?CID=' . $row['course_id'] . '" class="btn mt-2 mx-1 bg-gradient-light mb-0">' . $row['course_abv'] . '</a>
                                                        ';
                                                    }
                                                } elseif ($_SESSION['role'] == "Registrar") {
                                                    echo '
                                                    <a href="list.classSched.php?CID=' . $row['course_id'] . '" class="btn mt-2 mx-1 bg-gradient-light mb-0">' . $row['course_abv'] . '</a>
                                                    ';
                                                }
                                            } ?>
                                        </div>
                                    </div>
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
                                            Section</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Code</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Description</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Unit(s)</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Prerequisites</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Day</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Time</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Room</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            E.A.Y</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Instructor</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Special Tutorial</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Options</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $m = 0;
                                    if ($_SESSION['role'] == "Adviser") {
                                        if (!empty($_GET['CID'])) {
                                            $listSchedule = mysqli_query($db, "SELECT *, CONCAT(TS.faculty_firstname,' ', TS.faculty_lastname) AS fullname FROM tbl_schedules S
                                                LEFT JOIN tbl_subjects_new SN ON SN.subj_id = S.subj_id
                                                LEFT JOIN tbl_faculties_staff TS ON TS.faculty_id = S.faculty_id
                                                LEFT JOIN tbl_courses C ON C.course_id = SN.course_id
                                                LEFT JOIN tbl_effective_acadyear EA ON SN.eay_id = EA.eay_id
                                                WHERE SN.course_id = '$_GET[CID]' AND C.department_id = '$_SESSION[ADepartment_id]' AND acad_year IN ('$_SESSION[AC]') AND semester IN ('$_SESSION[S]')
                                                ORDER BY EA.eay DESC, class_id DESC") or die($db->error);
                                        } else {
                                            $listSchedule = mysqli_query($db, "SELECT *, CONCAT(TS.faculty_firstname,' ', TS.faculty_lastname) AS fullname FROM tbl_schedules S
                                                LEFT JOIN tbl_subjects_new SN ON SN.subj_id = S.subj_id
                                                LEFT JOIN tbl_faculties_staff TS ON TS.faculty_id = S.faculty_id
                                                LEFT JOIN tbl_courses C ON C.course_id = SN.course_id
                                                LEFT JOIN tbl_effective_acadyear EA ON SN.eay_id = EA.eay_id
                                                WHERE SN.course_id = '0' AND C.department_id = '0' AND acad_year IN ('$_SESSION[AC]') AND semester IN ('$_SESSION[S]')
                                                ORDER BY EA.eay DESC, class_id DESC") or die($db->error);
                                        }
                                    } elseif ($_SESSION['role'] == "Registrar") {
                                        if (!empty($_GET['CID'])) {
                                            $listSchedule = mysqli_query($db, "SELECT *, CONCAT(TS.faculty_firstname,' ', TS.faculty_lastname) AS fullname FROM tbl_schedules S
                                                LEFT JOIN tbl_subjects_new SN ON SN.subj_id = S.subj_id
                                                LEFT JOIN tbl_faculties_staff TS ON TS.faculty_id = S.faculty_id
                                                LEFT JOIN tbl_courses C ON C.course_id = SN.course_id
                                                LEFT JOIN tbl_effective_acadyear EA ON SN.eay_id = EA.eay_id
                                                WHERE SN.course_id = '$_GET[CID]' AND acad_year IN ('$_SESSION[AC]') AND semester IN ('$_SESSION[S]')
                                                ORDER BY EA.eay DESC, class_id DESC") or die($db->error);
                                        } else {
                                            $listSchedule = mysqli_query($db, "SELECT *, CONCAT(TS.faculty_firstname,' ', TS.faculty_lastname) AS fullname FROM tbl_schedules S
                                                LEFT JOIN tbl_subjects_new SN ON SN.subj_id = S.subj_id
                                                LEFT JOIN tbl_faculties_staff TS ON TS.faculty_id = S.faculty_id
                                                LEFT JOIN tbl_courses C ON C.course_id = SN.course_id
                                                LEFT JOIN tbl_effective_acadyear EA ON SN.eay_id = EA.eay_id
                                                WHERE SN.course_id = '0' AND acad_year IN ('$_SESSION[AC]') AND semester IN ('$_SESSION[S]')
                                                ORDER BY EA.eay DESC, class_id DESC") or die($db->error);
                                        }
                                    }


                                    while ($row = mysqli_fetch_array($listSchedule)) {
                                        $m++;
                                        $id = $row['class_id'];
                                    ?>
                                    <tr>


                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['section']; ?>
                                        </td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['subj_code']; ?></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['subj_desc']; ?></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['unit_total']; ?></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['prereq']; ?></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['day']; ?></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['time']; ?>
                                        </td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['room']; ?>
                                        </td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['eay']; ?>
                                        </td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['fullname']; ?>
                                        </td>
                                        <td class="text-sm font-weight-normal">
                                            <?php if ($row['special_tut'] == 1) {
                                                    echo 'Yes';
                                                } else {
                                                    echo 'No';
                                                } ?>
                                        </td>
                                        <td class="text-sm font-weight-normal">

                                            <a class="btn text-xs bg-gradient-primary" data-bs-toggle="modal"
                                                data-bs-target="#modal-sched<?php echo $id; ?>"><i
                                                    class="text-xs fas fa-edit"> </i>
                                                Edit</a>

                                           
                                            <!-- disable by using the "disabled" property in the delete button -->
                                            <?php if ($_SESSION['role'] != "Adviser") {
                                                    echo '<a class="btn btn-block bg-gradient-danger mb-3 text-xs disabled" data-bs-toggle="modal"
                                                    data-bs-target="#modal-notification'.$id.'"><i 
                                                        class="text-xs fas fa-trash-alt"></i> Delete</a>';
                                            } ?>

                                        </td>
                                    </tr>
                                    <div class="modal fade" id="modal-sched<?php echo $id; ?>" tabindex="-1"
                                        role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                                        <div class="modal-dialog modal-danger modal-dialog-centered modal-"
                                            role="document" style="max-width:850px !important;">
                                            <form action="offerData/ctrl.edit.classSched.php" method="POST">
                                                <div class=" modal-content">
                                                    <div class="modal-header bg-gray-100">
                                                        <h6 class="modal-title text-dark text-uppercase"
                                                            id="modal-title-notification">
                                                            <i class="far fa-edit"></i>
                                                            Edit Schedule
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
                                                                            <input class="form-control" hidden
                                                                                type="text" name="class_id" readonly
                                                                                value="<?php echo $id; ?>" />
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
                                                                                placeholder="(M/T/W/TH/F)" name="day"
                                                                                value="<?php echo $row['day']; ?>" />
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <label class="mt-3">Time</label>
                                                                            <input class="form-control" type="text"
                                                                                placeholder="(hh:mm am/pm)" name="time"
                                                                                value="<?php echo $row['time']; ?>" />
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <label class="mt-3">Room</label>
                                                                            <input class="form-control" type="text"
                                                                                placeholder="Enter Room" name="room"
                                                                                value="<?php echo $row['room']; ?>" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <label class="mt-3">Section</label>
                                                                            <input class="form-control" type="text"
                                                                                placeholder="Enter a Section"
                                                                                name="section"
                                                                                value="<?php echo $row['section']; ?>" />
                                                                        </div>
                                                                        <div class="col-sm-8">
                                                                            <label class="mt-3">Instructor</label>
                                                                            <select class="form-control multi"
                                                                                name="instr"
                                                                                id="multi_instr<?php echo $m; ?>">
                                                                                <?php if ($row['faculty_id'] > 0) {
                                                                                        $getTeachers = $db->query("SELECT *, CONCAT(faculty_lastname, ', ', faculty_firstname, ' ', faculty_middlename) AS fullname FROM tbl_faculties_staff WHERE faculty_id IN ('$row[faculty_id]')") or die($db->error);
                                                                                        while ($row4 = $getTeachers->fetch_array()) {
                                                                                            echo '<option selected value="' . $row4['faculty_id']  . '">' . $row4['fullname'] . '</option>';
                                                                                        }
                                                                                        $getTeachers = $db->query("SELECT *, CONCAT(faculty_lastname, ', ', faculty_firstname, ' ', faculty_middlename) AS fullname FROM tbl_faculties_staff WHERE faculty_id NOT IN ('$row[faculty_id]')") or die($db->error);
                                                                                        while ($row4 = $getTeachers->fetch_array()) {
                                                                                            echo '<option value="' . $row4['faculty_id']  . '">' . $row4['fullname'] . '</option>';
                                                                                        }
                                                                                    } else {
                                                                                        echo '<option value="" selected disabled>Select Instructor</option>';
                                                                                        $getTeachers = $db->query("SELECT *, CONCAT(faculty_lastname, ', ', faculty_firstname, ' ', faculty_middlename) AS fullname FROM tbl_faculties_staff") or die($db->error);
                                                                                        while ($row4 = $getTeachers->fetch_array()) {
                                                                                            echo '<option value="' . $row4['faculty_id']  . '">' . $row4['fullname'] . '</option>';
                                                                                        }
                                                                                    }
                                                                                    ?>

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
                                                                                    id="flexCheckDefault2" value="1"
                                                                                    <?php
                                                                                                                                                                                            if ($row['special_tut'] > 0) {
                                                                                                                                                                                                $ST = explode(" ", $row['special_tut']);
                                                                                                                                                                                                if (in_array("1", $ST)) {
                                                                                                                                                                                                    echo 'checked';
                                                                                                                                                                                                }
                                                                                                                                                                                            }
                                                                                                                                                                                            ?>>
                                                                            </div>
                                                                            
                                                                            <div class="form-check mt-3">
                                                                                <label>Classroom Full</label>
                                                                                <input class="form-check-input"
                                                                                    name="room_status[]" type="checkbox"
                                                                                    id="flexCheckDefault2" value="1"
                                                                                    <?php
                                                                                        if ($row['room_status'] > 0) {
                                                                                            $RS = explode(" ", $row['room_status']);
                                                                                            if (in_array("1", $RS)) {
                                                                                                echo 'checked';
                                                                                            }
                                                                                        }
                                                                                                                                                                                            ?>>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer bg-gray-100">
                                                        <button class="btn btn-white text-white bg-primary"
                                                            type="submit" name="update">Update
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-link text-black-50 btn-outline-dark ml-auto"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="modal-notification<?php echo $id; ?>" tabindex="-1"
                                        role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                                        <div class="modal-dialog modal-danger modal-dialog-centered modal-"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title text-danger" id="modal-title-notification"><i
                                                            class="fas fa-exclamation-triangle">
                                                        </i>
                                                        Warning
                                                    </h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="py-3 text-center">
                                                        <i class="fas fa-trash-alt text-9xl"></i>
                                                        <h4 class="text-gradient text-danger mt-4">
                                                            Delete Class Schedule!</h4>
                                                        <p>Are you sure you want to delete
                                                            <br>
                                                            <i><b><?php echo $row['subj_code']; ?></b></i>
                                                            ,<br>
                                                            <i><b><?php echo $row['subj_desc']; ?></b></i>?
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="offerData/ctrl.del.classSched.php?class_id=<?php echo $id; ?>"
                                                        class="btn btn-white text-white bg-danger">Delete</a>
                                                    <button type="button"
                                                        class="btn btn-link text-secondary btn-outline-dark ml-auto"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }
                                    ?>
                                </tbody>
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