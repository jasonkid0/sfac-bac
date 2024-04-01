<?php
session_start();
include '../../includes/head.php';
include '../../includes/session.php';

$date = $_GET['date'];
?>
<title>
    Edit Daily Enrollees | SFAC - Bacoor
</title>
</head>

<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">Edit Daily Enrollees</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row mb-10">
                <div class="col-lg-9 col-12 mx-auto">
                    <div class="card card-body mt-4 shadow-sm">
                        <h5 class="font-weight-bolder mb-0">Edit Daily Enrollees</h5>
                        <p class="text-sm mb-0">Enrollees Details</p>
                        <hr class="horizontal dark my-3">
                        <form method="POST" enctype="multipart/form-data" action="userData/ctrl.edit.enrollment.update.php">

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Date</label>
                                    <input class="form-control" type="date" placeholder="Course Name" name="date" disabled value="<?php echo $date?>"/>
                                    <input class="form-control" type="date" placeholder="Course Name" name="date" hidden value="<?php echo $date?>"/>
                                </div>
                            </div>
                            <?php
                            
                            $department = mysqli_query($db, "SELECT * FROM tbl_departments LEFT JOIN tbl_enrollment_update ON tbl_enrollment_update.department_id = tbl_departments.department_id WHERE tbl_departments.department_id NOT IN ('7', '8', '9', '10') AND date = '$date'");
                            while ($row = mysqli_fetch_array($department)) {
                            ?>

                            <h5 class="mt-4"><?php echo $row['dept_abv']?></h5>
                            <input class="form-control" type="text" name="department_id[]" value="<?php echo $row['department_id']?>" hidden/>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="mt-2">Walk In's</label>
                                    <input class="form-control" type="text" placeholder="Walk In Inquirees" value="<?php echo $row['walkin']?>"
                                        name="walkin[]" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="mt-2">Online</label>
                                    <input class="form-control" type="text" placeholder="Online Inquirees" value="<?php echo $row['online']?>"
                                        name="online[]" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="mt-2">Daily Enrollees New</label>
                                    <input class="form-control" type="text" placeholder="Daily Enrollees New" value="<?php echo $row['daily_new']?>"
                                        name="daily_new[]" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="mt-2">Daily Enrollees Old</label>
                                    <input class="form-control" type="text" placeholder="Daily Enrollees Old" value="<?php echo $row['daily_old']?>"
                                        name="daily_old[]" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="mt-2">Daily Reservations New</label>
                                    <input class="form-control" type="text" placeholder="Daily Reservations New" value="<?php echo $row['reservations_new']?>"
                                        name="reservations_new[]" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="mt-2">Daily Reservations Old</label>
                                    <input class="form-control" type="text" placeholder="Daily Reservations Old" value="<?php echo $row['reservations_old']?>"
                                        name="reservations_old[]" />
                                </div>
                            </div>

                            <?php } ?>

                            <div class="d-flex justify-content-end mt-4">
                                <button class="btn bg-gradient-dark text-white m-0 ms-2" type="submit"
                                    title="Edit Daily Update" name="submit">Edit
                                    Daily Update</button>
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