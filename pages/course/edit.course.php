<?php
session_start();
include '../../includes/head.php';
include '../../includes/session.php';

$id                    = $_GET['course_id'];
$_SESSION['course_id'] = $id;
?>
<title>
    Edit Course | SFAC - Bacoor
</title>
</head>

<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">Edit Course</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row mb-10">
                <div class="col-lg-9 col-12 mx-auto">
                    <div class="card card-body mt-4 shadow-sm">
                        <h5 class="mb-0">Edit Course</h5>
                        <p class="text-sm mb-0">Course Details</p>
                        <hr class="horizontal dark my-3">

                        <form method="POST" action="userData/ctrl.edit.course.php">
                            <!--single form panel-->
                            <?php
                            $listCourse = mysqli_query($db, "SELECT *, CONCAT(cour.course, ', ', cour.course_abv) AS fullname
                                            FROM tbl_courses AS cour
                                            LEFT JOIN tbl_departments AS dep ON dep.department_id = cour.department_id
                                            WHERE course_id = '$id'");
                            while ($row = mysqli_fetch_array($listCourse)) {
                            ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Course Name</label>
                                    <input class="form-control" type="text" placeholder="Course Name" name="course"
                                        value="<?php echo $row['course'];
                                                                                                                                ?>" />
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="mt-3">Course Abbrev.</label>
                                    <input class="form-control" type="text" placeholder="Course Abbrevation"
                                        name="course_abv" value="<?php echo $row['course_abv']; ?>" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="mt-3">Department</label>
                                    <select class="form-control" name="department" id="department">
                                        <?php $getDept = mysqli_query($db, "SELECT * FROM tbl_departments WHERE department_id IN ('$row[department_id]')");
                                            while ($row2 = mysqli_fetch_array($getDept)) {
                                            ?>
                                        <option selected value="<?php echo $row2['department_id']; ?>">
                                            <?php echo $row2['department_name'];
                                            } ?>
                                        </option>

                                        <?php $getDept = mysqli_query($db, "SELECT * FROM tbl_departments WHERE department_id NOT IN ('$row[department_id]')");
                                                while ($row1 = mysqli_fetch_array($getDept)) {
                                                ?>
                                        <option value="<?php echo $row1['department_id']; ?>">
                                            <?php echo $row1['department_name'];
                                                } ?></option>
                                    </select>
                                </div>
                            </div>


                            <?php } ?>
                            <div class="d-flex justify-content-end mt-4">
                                <button class="btn bg-gradient-primary text-white m-0 ms-2" type="submit"
                                    title="Update Course" name="update">Update</button>
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