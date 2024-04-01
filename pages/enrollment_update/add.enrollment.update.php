<?php
session_start();
include '../../includes/head.php';
include '../../includes/session.php';
?>
<title>
    Add Daily Enrollees | SFAC - Bacoor
</title>
</head>

<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">Add Daily Enrollees</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row mb-10">
                <div class="col-lg-9 col-12 mx-auto">
                    <div class="card card-body mt-4 shadow-sm">
                        <h5 class="font-weight-bolder mb-0">Add Daily Enrollees</h5>
                        <p class="text-sm mb-0">Enrollees Details</p>
                        <hr class="horizontal dark my-3">
                        <form method="POST" enctype="multipart/form-data" action="userData/ctrl.add.enrollment.update.php">

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Date</label>
                                    <input class="form-control" type="date" placeholder="Course Name" name="date" required/>
                                </div>
                            </div>
                            <?php
                            
                            $department = mysqli_query($db, "SELECT * FROM tbl_departments WHERE department_id NOT IN ('7', '8', '9', '10')");
                            while ($row = mysqli_fetch_array($department)) {
                            ?>

                            <h5 class="mt-4"><?php echo $row['dept_abv']?></h5>
                            <input class="form-control" type="text" name="department_id[]" value="<?php echo $row['department_id']?>" hidden/>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="mt-2">Walk In's</label>
                                    <input class="form-control" type="text" placeholder="Walk In Inquirees"
                                        name="walkin[]" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="mt-2">Online</label>
                                    <input class="form-control" type="text" placeholder="Online Inquirees"
                                        name="online[]" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="mt-2">Daily Enrollees New</label>
                                    <input class="form-control" type="text" placeholder="Daily Enrollees New"
                                        name="daily_new[]" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="mt-2">Daily Enrollees Old</label>
                                    <input class="form-control" type="text" placeholder="Daily Enrollees Old"
                                        name="daily_old[]" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="mt-2">Daily Reservations New</label>
                                    <input class="form-control" type="text" placeholder="Daily Reservations New"
                                        name="reservations_new[]" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="mt-2">Daily Reservations Old</label>
                                    <input class="form-control" type="text" placeholder="Daily Reservations Old"
                                        name="reservations_old[]" />
                                </div>
                            </div>

                            <?php } ?>

                            <div class="d-flex justify-content-end mt-4">
                                <button class="btn bg-gradient-dark text-white m-0 ms-2" type="submit"
                                    title="Add Daily Update" name="submit">Add
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