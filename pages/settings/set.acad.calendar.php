<?php
session_start();
include '../../includes/head.php';
include '../../includes/session.php';

?>
<title>
    Set Academic Years & Semester | SFAC - Bacoor
</title>
</head>


<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">Set New Academic Calendar</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->


        <div class="container-fluid py-4">
            <div class="row mb-10">
                <div class="col-lg-9 col-12 mx-auto">
                    <div class="card card-body mt-4 shadow-sm">
                        <h6 class="mb-0">Set Academic Year and Semester</h6>
                        <p class="text-sm mb-0">you want to Activate</p>
                        <hr class="horizontal dark my-3">
                        <form method="POST" enctype="multipart/form-data"
                            action="settingsData/ctrl.update.calendar.php">
                            <div class="row justify-content-center">
                                <div class="col-12 col-sm-6">
                                    <label>Academic Year</label>
                                    <select class="form-control" name="academic_year" id="academic_year">

                                        <option value="" disabled selected>Select Academic Year
                                        </option>
                                        <?php $getYear = $db->query("SELECT * FROM tbl_acadyears ORDER BY academic_year DESC") or die($db->error());
                                        while ($row2 = $getYear->fetch_array()) {

                                            if (!empty($row2['academic_year'])) {
                                                echo '<option value="' . $row2['ay_id'] . '">'
                                                    . $row2['academic_year'] . '</option>';
                                            }
                                        };
                                        ?>
                                    </select>
                                </div>

                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                    <label>Semester</label>
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
                            </div>


                            <div class="d-flex justify-content-end mt-4">
                                <button type="submit" name="submit"
                                    class="btn bg-gradient-primary text-white m-0 ms-2">Activate</button>
                            </div>

                        </form>
                        <!-- <form method="POST" action="depData/ctrl.add.department.php">
                                    <label for="projectName" class="form-label">Department Name</label>
                                    <input name="department" type="text" class="form-control"
                                        placeholder="Enter department name" required>
                                    <div class="d-flex justify-content-end mt-4">
                                        <button type="submit" name="submit"
                                            class="btn bg-gradient-primary text-white m-0 ms-2">Add Department</button>
                                    </div>
                                </form> -->
                    </div>
                </div>
            </div>
            <br>
            <?php include '../../includes/footer.php'; ?>
            <!-- End footer -->
            </form>
        </div>
    </main>
    <!--   Core JS Files   -->
    <?php include '../../includes/scripts.php'; ?>
</body>

</html>