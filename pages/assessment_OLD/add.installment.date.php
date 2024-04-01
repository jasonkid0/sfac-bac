<?php
session_start();
include '../../includes/head.php';
// include 'accountConn/conn.php';
include '../../includes/session.php';


?>
<title>
    Add Installment Dates | SFAC - Bacoor
</title>
</head>

<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">Add Installment Dates</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row mb-10">
                <div class="col-lg-9 col-12 mx-auto">
                    <div class="card card-body mt-4 shadow-sm">
                        <h5 class="font-weight-bolder mb-0">Add Installment Dates</h5>
                        <p class="text-sm mb-0">Installment Dates Details</p>
                        <hr class="horizontal dark my-3">
                        <form method="POST" enctype="multipart/form-data" action="userData/ctrl.add.installment.date.php">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Semester</label>
                                    <select class="form-control" name="sem_id" id="semester">
                                        <option value="" disabled selected>Select Academic Year
                                        </option>
                                        <?php $get_sem = mysqli_query($db, "SELECT * FROM tbl_semesters");
                                        while ($row = mysqli_fetch_array($get_sem)) {
                                        ?>
                                        <option value="<?php echo $row['sem_id']; ?>">
                                            <?php echo $row['semester'];
                                        } ?></option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label>Prelims</label>
                                    <input class="form-control" type="date" name="date_1" placeholder="Discount Description"
                                        name="discount_desc" />
                                </div>
                            </div>
                            <div class="row  mt-3">
                                <div class="col-sm-6">
                                    <label>Academic Year</label>
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
                                <div class="col-sm-6">
                                    <label>Midterms</label>
                                    <input class="form-control" type="date" name="date_2" placeholder="Discount Description"
                                        name="discount_desc" />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-6">
                                </div>
                                <div class="col-sm-6">
                                    <label>Finals</label>
                                    <input class="form-control" type="date" name="date_3" placeholder="Discount Description"
                                        name="discount_desc" />
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-4">
                                <button class="btn bg-gradient-dark text-white m-0 ms-2"  type="submit" title="Send"
                                    name="submit">Add
                                    Due Date</button>
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