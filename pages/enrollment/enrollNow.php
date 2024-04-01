<!-- Head -->
<?php
session_start();
include '../../includes/session.php';
include '../../includes/head.php';

$_SESSION['stud_id'] = $stud_id;

$q = $db->query("SELECT * FROM tbl_schoolyears SY WHERE stud_id = '$stud_id' AND ay_id = '$_SESSION[AC]' AND sem_id = '$_SESSION[S]'") or die($db->error);
$count = $q->num_rows;

if ($count > 0) {
    header('location: enrollmentInfo.php');
}

?>
<title>
    Enroll Now | SFAC - Bacoor
</title>
</head>
<!-- End Head -->


<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">Enroll Now</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row mb-9">
                <div class="col-lg-9 col-12 mx-auto">
                    <div class="card card-body mt-4 shadow-sm">
                        <h5 class="mb-0">Enrollment Form</h5>
                        <p class="text-sm mb-0">Please fill out all fields!</p>
                        <hr class="horizontal dark my-3">
                        <form method="POST" action="userData/ctrl.enrollNow.php">
                            <?php $getStud = $db->query("SELECT *, CONCAT(S.firstname, ' ', S.middlename, ' ', S.lastname) AS fullname FROM tbl_students S WHERE stud_id = '$stud_id' ") or die($db->error);
                            while ($row = $getStud->fetch_array()) { ?>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Student Code</label>
                                    <input class="form-control" type="text" placeholder="Student Code" required
                                        name="stud_no" id="stud_no" readonly value="<?php echo $row['stud_no']; ?>" />
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
                                        <option value="" selected disabled>Select Course</option>
                                        <?php
                                            if ($row['course_id'] == 0) {
                                                $getCourse = $db->query("SELECT * FROM tbl_courses");
                                                while ($row2 = $getCourse->fetch_array()) {
                                                    echo '<option value="' . $row2['course_id'] . '">' .
                                                        $row2['course'] . '</option>';
                                                }
                                            } else {
                                                $getCourse = $db->query("SELECT * FROM tbl_courses WHERE course_id IN ('$row[course_id]')");
                                                while ($row1 = $getCourse->fetch_array()) {
                                                    echo '<option value="' . $row1['course_id'] . '">' .
                                                        $row1['course'] . '</option>';
                                                }
                                            } ?>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label class="mt-3">Year Level</label>
                                    <select class="form-control" name="level" id="year_lvl">
                                        <option value="" selected disabled>Select Year Level</option>
                                        <?php $getYlevel = $db->query("SELECT * FROM tbl_year_levels");
                                            while ($row1 = $getYlevel->fetch_array()) {
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
                                        <option value="" selected disabled>Select Status</option>
                                        <option value="New">New Student</option>
                                        <option value="Old">Old Student</option>
                                    </select>
                                </div>
                            </div>


                            <div class="d-flex justify-content-end mt-4">
                                <button class="btn bg-gradient-dark text-white m-0 ms-2" type="submit" title="Send"
                                    name="submit">Enroll Now</button>
                            </div>
                            <?php } ?>
                        </form>
                    </div>
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