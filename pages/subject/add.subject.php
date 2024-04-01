<?php
session_start();
include '../../includes/head.php';
include '../../includes/session.php';
?>
<title>
    Add New Subjects | SFAC - Bacoor
</title>
</head>

<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">Add New Subject</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row mb-10">
                <div class="col-lg-9 col-12 mx-auto">
                    <div class="card card-body mt-4 shadow-sm">
                        <h5 class="font-weight-bolder mb-0">Add Subject</h5>
                        <p class="text-sm mb-0">Subject Details</p>
                        <hr class="horizontal dark my-3">
                        <form method="POST" enctype="multipart/form-data" action="userData/ctrl.add.subject.php">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Subject Code</label>
                                    <input class="form-control" type="text" placeholder="Subject Code"
                                        name="subj_code" />
                                </div>
                                <div class="col-sm-8">
                                    <label>Subject Description</label>
                                    <input class="form-control" type="text" placeholder="Subject Description"
                                        name="subj_desc" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <label class="mt-3">Course</label>
                                    <select class="form-control" name="course" id="department">
                                        <option value="" disabled selected>Select Course
                                        </option>
                                        <?php $query = $db->query("SELECT * FROM tbl_courses");
                                        while ($row = $query->fetch_array()) {
                                            echo '<option value="' . $row['course_id'] . '">' . $row['course'] . '</option>';
                                        } ?>

                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <label class="mt-3">Lecture Units</label>
                                    <input class="form-control" type="text" placeholder="Enter no. of units"
                                        name="unit_lec" />
                                </div>
                                <div class="col-sm-4">
                                    <label class="mt-3">Laboratory Units</label>
                                    <input class="form-control" type="text" placeholder="Enter no. of units"
                                        name="unit_lab" />
                                </div>
                                <div class="col-sm-4">
                                    <label class="mt-3">Total Units</label>
                                    <input class="form-control" type="text" placeholder="Enter no. of units"
                                        name="unit_total" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="mt-3">Pre Requisite</label>
                                    <input class="form-control" type="text" placeholder="Enter pre requisite"
                                        name="prereq" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="mt-3">Year Level</label>
                                    <select class="form-control" name="year" id="year_lvl">
                                        <option value="" disabled selected>Select Year Level
                                        </option>
                                        <?php $getYear = mysqli_query($db, "SELECT * FROM tbl_year_levels");
                                        while ($row = mysqli_fetch_array($getYear)) {
                                        ?>
                                        <option value="<?php echo $row['year_id']; ?>">
                                            <?php echo $row['year_level'];
                                        } ?></option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="mt-3">Semester</label>
                                    <select class="form-control" name="semester" id="semester">
                                        <option value="" disabled selected>Select Semester
                                        </option>
                                        <?php $getSem = mysqli_query($db, "SELECT * FROM tbl_semesters");
                                        while ($row = mysqli_fetch_array($getSem)) {
                                        ?>
                                        <option value="<?php echo $row['sem_id']; ?>">
                                            <?php echo $row['semester'];
                                        } ?></option>
                                    </select>
                                </div>

                                <div class="col-sm-6">
                                    <label class="mt-3">Effective Academic Year</label>
                                    <select class="form-control" name="eay" id="academic_year">
                                        <option value="" disabled selected>Select Effective Academic Year
                                        </option>
                                        <?php $getEAY = mysqli_query($db, "SELECT * FROM tbl_effective_acadyear");
                                        while ($row = mysqli_fetch_array($getEAY)) {
                                        ?>
                                        <option value="<?php echo $row['eay_id']; ?>">
                                            <?php echo $row['eay'];
                                        } ?></option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mt-4">
                                <button class="btn bg-gradient-dark text-white m-0 ms-2" type="submit" title="Send"
                                    name="submit">Add
                                    Subject</button>
                            </div>
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