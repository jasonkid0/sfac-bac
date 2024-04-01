<?php
session_start();
include '../../includes/head.php';
// include 'accountConn/conn.php';
include '../../includes/session.php';


?>
<title>
    Add Tuition Fee | SFAC - Bacoor
</title>
</head>

<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">Add Tuition Fee</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row mb-10">
                <div class="col-lg-9 col-12 mx-auto">
                    <div class="card card-body mt-4 shadow-sm">
                        <h5 class="font-weight-bolder mb-0">Tuition Fee</h5>
                        <p class="text-sm mb-0">Tuition Fee Details</p>
                        <hr class="horizontal dark my-3">
                        <form method="POST" enctype="multipart/form-data" action="userData/ctrl.add.tuition.php">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Course</label>
                                    <select class="form-control" name="course_id" id="courses">
                                        <option value="" disabled selected>Select Course
                                        </option>
                                        <?php $get_course = mysqli_query($db, "SELECT * FROM tbl_courses");
                                        while ($row = mysqli_fetch_array($get_course)) {
                                        ?>
                                        <option value="<?php echo $row['course_id']; ?>">
                                            <?php echo $row['course_abv'];
                                        } ?></option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label>Year Level</label>
                                    <select class="form-control" name="year_id" id="year_lvl">
                                        <option value="" disabled selected>Select Year Level
                                        </option>
                                        <?php $get_year = mysqli_query($db, "SELECT * FROM tbl_year_levels");
                                        while ($row = mysqli_fetch_array($get_year)) {
                                        ?>
                                        <option value="<?php echo $row['year_id']; ?>">
                                            <?php echo $row['year_level'];
                                        } ?></option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label>Fee per Unit</label>
                                    <input class="form-control" type="text" placeholder="0.00"
                                        name="tuition_fee" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="mt-3">Academic Year</label>
                                    <select class="form-control" name="ay_id" id="academic_year">
                                        <option value="" disabled selected>Select Academic Year
                                        </option>
                                        <?php $getEAY = mysqli_query($db, "SELECT * FROM tbl_acadyears");
                                        while ($row = mysqli_fetch_array($getEAY)) {
                                        ?>
                                        <option value="<?php echo $row['ay_id']; ?>">
                                            <?php echo $row['academic_year'];
                                        } ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-4">
                                <button class="btn bg-gradient-dark text-white m-0 ms-2" type="submit" title="Send"
                                    name="submit">Add
                                    Tuition Fee</button>
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