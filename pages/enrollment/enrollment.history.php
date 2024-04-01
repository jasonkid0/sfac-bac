        <?php
        session_start();
        include '../../includes/head.php';
        include '../../includes/session.php';
        ?>
        <title>
            Enrollment History | SFAC - Bacoor
        </title>
        </head>

        <body class="g-sidenav-show  bg-gray-100">
            <?php include '../../includes/sidebar.php'; ?>
            <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
                <!-- Navbar -->
                <?php include '../../includes/navbar-title.php'; ?>
                <h6 class="font-weight-bolder mb-0">Enrollment History</h6>
                <?php include '../../includes/navbar.php'; ?>
                <!-- End Navbar -->

                <div class="container-fluid py-4">
                    <div class="row mb-10">
                        <div class="col-lg-9 col-12 mx-auto">
                            <div class="card card-body mt-4 shadow-sm">
                                <h5 class="mb-0">Enrollment History</h5>
                                <p class="text-sm mb-0">Select Semester and Academic Year (All fields must be filled.)</p>
                                <hr class="horizontal dark my-3">
                                <form method="GET" action="../forms/data/masterlist.php">


                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Semester</label>
                                            <select class="form-control" required name="semester" id="semester">
                                                    <option disabled selected value="">Select Semester</option>
                                                    <?php $getCourse = mysqli_query($db, "SELECT * FROM tbl_semesters");
                                                    while ($row = mysqli_fetch_array($getCourse)) {
                                                        echo '<option value="' . $row['semester'] . '">' . $row['semester'] . '</option>';
                                                    } ?>
                                                    </option>
                                                </select>
                                        </div>

                                        <div class="col-sm-6">
                                            <label>Academic Year</label>
                                            <select class="form-control" required name="academic_year"
                                                    id="courses">
                                                    <option disabled selected value="">Select Year</option>
                                                    <?php $getYear = mysqli_query($db, "SELECT * FROM tbl_acadyears");
                                                    while ($row = mysqli_fetch_array($getYear)) {
                                                        echo '<option value="' . $row['academic_year'] . '">' . $row['academic_year'] . '</option>';
                                                    } ?>
                                                    </option>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Year Level</label>
                                            <select class="form-control" required name="year_level" id="year_lvl">
                                                    <option disabled selected value="">Select Year Level</option>
                                                    <option value="All">All</option>
                                                    <?php $getCourse = mysqli_query($db, "SELECT * FROM tbl_year_levels");
                                                    while ($row = mysqli_fetch_array($getCourse)) {
                                                        echo '<option value="' . $row['year_level'] . '">' . $row['year_level'] . '</option>';
                                                    } ?>
                                                    </option>
                                                </select>
                                        </div>

                                        <div class="col-sm-6">
                                            <label>Student Type</label>
                                            <select class="form-control" required name="student_type"
                                                    id="gender">
                                                    <option disabled selected value="">Select Student Type</option>
                                                    <option value="All">All</option>
                                                    <option value="New">New</option>
                                                    <option value="Old">Old</option>
                                                </select>
                                        </div>
                                    </div>


                                    <div class="d-flex justify-content-end mt-4">
                                        <button class="btn bg-gradient-dark text-white m-0 ms-2" type="submit"
                                            title="Send" name="submit">Generate Masterlist</button>
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