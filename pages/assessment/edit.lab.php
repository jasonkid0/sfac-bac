<?php
session_start();
include '../../includes/head.php';
// include 'accountConn/conn.php';
include '../../includes/session.php';

$lab_id = $_GET['lab_id'];
?>
<title>
    Edit Laboratory Fee | SFAC - Bacoor
</title>
</head>

<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">Edit Laboratory Fee</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row mb-10">
                <div class="col-lg-9 col-12 mx-auto">
                    <div class="card card-body mt-4 shadow-sm">
                        <h5 class="font-weight-bolder mb-0">Laboratory Fee</h5>
                        <p class="text-sm mb-0">Laboratory Fee Details</p>
                        <hr class="horizontal dark my-3">
                        <form method="POST" enctype="multipart/form-data" action="userData/ctrl.edit.lab.php?lab_id=<?php echo $lab_id?>">
                        <?php
                            $lab_select = mysqli_query($db,"SELECT * FROM tbl_lab_fees WHERE lab_id = '$lab_id'");
                            while ($row1 = mysqli_fetch_array($lab_select)) {
                        ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Laboratory Fee Description</label>
                                    <input class="form-control" type="text" placeholder="Fee Description" value="<?php echo $row1['lab_desc'];?>"
                                        name="lab_desc" />
                                </div>
                                <div class="col-sm-6">
                                    <label>Fee Value</label>
                                    <input class="form-control" type="text" placeholder="0.00" value="<?php echo $row1['lab'];?>"
                                        name="lab" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="mt-3">Year Level</label>
                                    <select class="form-control" name="year_id" id="year_lvl">
                                        <?php $row_year = mysqli_query($db,"SELECT * FROM tbl_year_levels WHERE year_id = '$row1[year_id]'");
                                        while ($row = mysqli_fetch_array($row_year)) {
                                        ?>
                                        <option value="<?php echo $row['year_id']; ?>" selected>
                                            <?php echo $row['year_level'];
                                         ?></option>
                                        <?php
                                        }
                                        ?>
                                        <?php $get_year = mysqli_query($db, "SELECT * FROM tbl_year_levels WHERE NOT year_id = '$row1[year_id]'");
                                        while ($row = mysqli_fetch_array($get_year)) {
                                        ?>
                                        <option value="<?php echo $row['year_id']; ?>">
                                            <?php echo $row['year_level'];
                                         ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label class="mt-3">Academic Year</label>
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
                            </div>
                            <div class="d-flex justify-content-end mt-4">
                                <button class="btn bg-gradient-dark text-white m-0 ms-2" type="submit" title="Send"
                                    name="submit">Edit
                                    Laboratory Fee</button>
                            </div>
                        <?php
                            }
                        ?>
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