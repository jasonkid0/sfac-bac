<?php
session_start();
include '../../includes/head.php';
// include 'accountConn/conn.php';
include '../../includes/session.php';

$installment_id = $_GET['installment_id'];
?>
<title>
    Edit Installment Dates | SFAC - Bacoor
</title>
</head>

<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">Edit Installment Dates</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row mb-10">
                <div class="col-lg-9 col-12 mx-auto">
                    <div class="card card-body mt-4 shadow-sm">
                        <h5 class="font-weight-bolder mb-0">Edit Installment Dates</h5>
                        <p class="text-sm mb-0">Installment Dates Details</p>
                        <hr class="horizontal dark my-3">
                        <form method="POST" enctype="multipart/form-data" action="userData/ctrl.edit.installment.date.php?installment_id=<?php echo $installment_id?>">
                            <?php
                                $installment_info = mysqli_query($db, "SELECT * FROM tbl_installment_dates WHERE installment_id = '$installment_id'");
                                while ($row1 = mysqli_fetch_array($installment_info)) {
                            ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Semester</label>
                                    <select class="form-control" name="sem_id" id="semester">
                                        <?php $get_sem = mysqli_query($db, "SELECT * FROM tbl_semesters WHERE sem_id = '$row1[sem_id]'");
                                        while ($row = mysqli_fetch_array($get_sem)) {
                                        ?>
                                        <option value="<?php echo $row['sem_id']; ?>">
                                            <?php echo $row['semester'];?></option>
                                        <?php
                                        }
                                        ?>
                                        <?php $get_sem = mysqli_query($db, "SELECT * FROM tbl_semesters WHERE NOT sem_id = '$row1[sem_id]'");
                                        while ($row = mysqli_fetch_array($get_sem)) {
                                        ?>
                                        <option value="<?php echo $row['sem_id']; ?>">
                                            <?php echo $row['semester'];?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label>Prelims</label>
                                    <input class="form-control" type="date" name="date_1"  value="<?php echo $row1['date_1'];?>"
                                        name="discount_desc" />
                                </div>
                            </div>
                            <div class="row  mt-3">
                                <div class="col-sm-6">
                                    <label >Academic Year</label>
                                    <select class="form-control" name="ay_id" id="academic_year">
                                        <?php $get_ay = mysqli_query($db, "SELECT * FROM tbl_acadyears WHERE ay_id = '$row1[ay_id]'");
                                        while ($row = mysqli_fetch_array($get_ay)) {
                                        ?>
                                        <option value="<?php echo $row['ay_id']; ?>">
                                            <?php echo $row['academic_year'];?></option>
                                        <?php
                                        }
                                        ?>
                                        <?php $get_ay = mysqli_query($db, "SELECT * FROM tbl_acadyears WHERE NOT ay_id = '$row1[ay_id]'");
                                        while ($row = mysqli_fetch_array($get_ay)) {
                                        ?>
                                        <option value="<?php echo $row['ay_id']; ?>">
                                            <?php echo $row['academic_year'];?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label>Midterms</label>
                                    <input class="form-control" type="date" name="date_2"  value="<?php echo $row1['date_2'];?>"
                                        name="discount_desc" />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-6">
                                </div>
                                <div class="col-sm-6">
                                    <label>Finals</label>
                                    <input class="form-control" type="date" name="date_3"  value="<?php echo $row1['date_3'];?>"
                                        name="discount_desc" />
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-4">
                                <button class="btn bg-gradient-dark text-white m-0 ms-2"  type="submit" title="Send"
                                    name="submit">Edit
                                    Installment Date</button>
                            </div>
                            <?php
                            }?>
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