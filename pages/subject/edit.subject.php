<?php
session_start();
include '../../includes/head.php';
include '../../includes/session.php';

$subj_id = $_GET['subj_id'];
$_SESSION['subj_id'] = $subj_id;
?>
<title>
    Edit Subjects | SFAC - Bacoor
</title>
</head>

<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">Edit Subject</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row mb-10">
                <div class="col-lg-9 col-12 mx-auto">
                    <div class="card card-body mt-4 shadow-sm">
                        <h5 class="font-weight-bolder mb-0">Edit Subject</h5>
                        <p class="text-sm mb-0">Subject Details</p>
                        <hr class="horizontal dark my-3">
                        <form method="POST" enctype="multipart/form-data" action="userData/ctrl.edit.subject.php">
                            <?php
                            $editSubject = mysqli_query($db, "SELECT * FROM tbl_subjects_new
                                        LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_subjects_new.course_id
                                        LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_subjects_new.year_id
                                        LEFT JOIN tbl_semesters ON tbl_semesters.sem_id = tbl_subjects_new.sem_id
                                        WHERE subj_id = '$subj_id'");

                            while ($row1 = mysqli_fetch_array($editSubject)) {


                            ?>
                            <div class="row">
                                <div class="col-sm-5">
                                    <label>Subject Code</label>
                                    <input class="form-control" type="text" placeholder="Subject Code" name="subj_code"
                                        value="<?php echo $row1['subj_code']; ?>" />
                                </div>
                                <div class="col-sm-7">
                                    <label>Subject Description</label>
                                    <input class="form-control" type="text" placeholder="Subject Description"
                                        name="subj_desc" value="<?php echo $row1['subj_desc']; ?>" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <label class="mt-3">Course</label>
                                    <select class="form-control" name="course" id="courses">
                                        <?php
                                            if ($row1['course_id'] > 0) {
                                                $getCourse = $db->query("SELECT * FROM tbl_courses WHERE course_id IN ('$row1[course_id]')") or die($db->error);
                                                while ($row = $getCourse->fetch_array()) {
                                                    echo '<option selected value="' . $row['course_id'] . '">' . $row['course'] . '</option>';
                                                }
                                                $getCourse = $db->query("SELECT * FROM tbl_courses WHERE course_id NOT IN ('$row1[course_id]')") or die($db->error);
                                                while ($row = $getCourse->fetch_array()) {
                                                    echo '<option value="' . $row['course_id'] . '">' . $row['course'] . '</option>';
                                                }
                                            } else {
                                                echo '<option value="" selected disabled>Select Course</option>';
                                                $getCourse = $db->query("SELECT * FROM tbl_courses") or die($db->error);
                                                while ($row = $getCourse->fetch_array()) {
                                                    echo '<option value="' . $row['course_id'] . '">' . $row['course'] . '</option>';
                                                }
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <label class="mt-3">Lecture Units</label>
                                    <input class="form-control" type="text" placeholder="Enter no. of units"
                                        name="unit_lec" value="<?php echo $row1['unit_lec']; ?>" />
                                </div>
                                <div class="col-sm-4">
                                    <label class="mt-3">Laboratory Units</label>
                                    <input class="form-control" type="text" placeholder="Enter no. of units"
                                        name="unit_lab" value="<?php echo $row1['unit_lab']; ?>" />
                                </div>
                                <div class="col-sm-4">
                                    <label class="mt-3">Total Units</label>
                                    <input class="form-control" type="text" placeholder="Enter no. of units"
                                        name="unit_total" value="<?php echo $row1['unit_total']; ?>" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="mt-3">Pre Requisite</label>
                                    <input class="form-control" type="text" placeholder="Enter pre requisite"
                                        name="prereq" value="<?php echo $row1['prereq']; ?>" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="mt-3">Year Level</label>
                                    <select class="form-control" name="year" id="year_lvl">
                                        <?php
                                            if ($row1['year_id'] > 0) {
                                                $getCourse = $db->query("SELECT * FROM tbl_year_levels WHERE year_id IN ('$row1[year_id]')") or die($db->error);
                                                while ($row = $getCourse->fetch_array()) {
                                                    echo '<option selected value="' . $row['year_id'] . '">' . $row['year_level'] . '</option>';
                                                }
                                                $getCourse = $db->query("SELECT * FROM tbl_year_levels WHERE year_id NOT IN ('$row1[year_id]')") or die($db->error);
                                                while ($row = $getCourse->fetch_array()) {
                                                    echo '<option value="' . $row['year_id'] . '">' . $row['year_level'] . '</option>';
                                                }
                                            } else {
                                                echo '<option value="" selected disabled>Select Year Level</option>';
                                                $getCourse = $db->query("SELECT * FROM tbl_year_levels") or die($db->error);
                                                while ($row = $getCourse->fetch_array()) {
                                                    echo '<option value="' . $row['year_id'] . '">' . $row['year_level'] . '</option>';
                                                }
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="mt-3">Semester</label>
                                    <select class="form-control" name="semester" id="semester">
                                        <?php
                                            if ($row1['sem_id'] > 0) {
                                                $getCourse = $db->query("SELECT * FROM tbl_semesters WHERE sem_id IN ('$row1[sem_id]')") or die($db->error);
                                                while ($row = $getCourse->fetch_array()) {
                                                    echo '<option selected value="' . $row['sem_id'] . '">' . $row['semester'] . '</option>';
                                                }
                                                $getCourse = $db->query("SELECT * FROM tbl_semesters WHERE sem_id NOT IN ('$row1[sem_id]')") or die($db->error);
                                                while ($row = $getCourse->fetch_array()) {
                                                    echo '<option value="' . $row['sem_id'] . '">' . $row['semester'] . '</option>';
                                                }
                                            } else {
                                                echo '<option value="" selected disabled>Select Semester</option>';
                                                $getCourse = $db->query("SELECT * FROM tbl_semesters") or die($db->error);
                                                while ($row = $getCourse->fetch_array()) {
                                                    echo '<option value="' . $row['sem_id'] . '">' . $row['semester'] . '</option>';
                                                }
                                            }
                                            ?>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label class="mt-3">Effective Academic Year</label>
                                    <select class="form-control" name="eay" id="academic_year">
                                        <?php
                                            if ($row1['eay_id'] > 0) {
                                                $getCourse = $db->query("SELECT * FROM tbl_effective_acadyear WHERE eay_id IN ('$row1[eay_id]')") or die($db->error);
                                                while ($row = $getCourse->fetch_array()) {
                                                    echo '<option selected value="' . $row['eay_id'] . '">' . $row['eay'] . '</option>';
                                                }
                                                $getCourse = $db->query("SELECT * FROM tbl_effective_acadyear WHERE eay_id NOT IN ('$row1[eay_id]')") or die($db->error);
                                                while ($row = $getCourse->fetch_array()) {
                                                    echo '<option value="' . $row['eay_id'] . '">' . $row['eay'] . '</option>';
                                                }
                                            } else {
                                                echo '<option value="" selected disabled>Select Effective Academic Year</option>';
                                                $getCourse = $db->query("SELECT * FROM tbl_effective_acadyear") or die($db->error);
                                                while ($row = $getCourse->fetch_array()) {
                                                    echo '<option value="' . $row['eay_id'] . '">' . $row['eay'] . '</option>';
                                                }
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mt-4">
                                <button class="btn bg-gradient-dark text-white m-0 ms-2" type="submit" title="Send"
                                    name="submit">Edit
                                    Subject</button>
                            </div>
                        </form>
                    </div>
                    <?php } ?>
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