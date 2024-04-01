<?php
session_start();
include '../../includes/head.php';
include '../../includes/session.php';
?>
<title>
    Add Course | SFAC - Bacoor
</title>
</head>

<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">Add Course</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row mb-10">
                <div class="col-lg-9 col-12 mx-auto">
                    <div class="card card-body mt-4 shadow-sm">
                        <h5 class="font-weight-bolder mb-0">Add Course</h5>
                        <p class="text-sm mb-0">Course Details</p>
                        <hr class="horizontal dark my-3">
                        <form method="POST" enctype="multipart/form-data" action="userData/ctrl.add.course.php">

                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Course Name</label>
                                    <input class="form-control" type="text" placeholder="Course Name" name="course" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="mt-3">Course Abbrev.</label>
                                    <input class="form-control" type="text" placeholder="Course Abbreviation"
                                        name="course_abv" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="mt-3">Department</label>
                                    <select class="form-control" name="department" id="department">
                                        <option value="" disabled selected>Select Department
                                        </option>
                                        <?php $getDept = mysqli_query($db, "SELECT * FROM tbl_departments");
                                        while ($row = mysqli_fetch_array($getDept)) {
                                        ?>
                                        <option value="<?php echo $row['department_id']; ?>">
                                            <?php echo $row['department_name'];
                                        } ?></option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mt-4">
                                <button class="btn bg-gradient-dark text-white m-0 ms-2" type="submit"
                                    title="Add Course" name="submit">Add
                                    Course</button>
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