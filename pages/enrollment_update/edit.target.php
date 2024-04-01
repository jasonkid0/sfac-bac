<?php
session_start();
include '../../includes/head.php';
include '../../includes/session.php';

$ay_id = $_GET['ay_id']
?>
<title>
    Add Target Enrollees | SFAC - Bacoor
</title>
</head>

<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">Add Target Enrollees</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row mb-10">
                <div class="col-lg-9 col-12 mx-auto">
                    <div class="card card-body mt-4 shadow-sm">
                        <h5 class="font-weight-bolder mb-0">Add Target Enrollees</h5>
                        <p class="text-sm mb-0">Enrollees Details</p>
                        <hr class="horizontal dark my-3">
                        <form method="POST" enctype="multipart/form-data" action="userData/ctrl.edit.target.php">

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Academic Year</label>
                                    <select class="form-control" id="academic_year" name="ay_id" disabled>
                                            <?php $getEAY = mysqli_query($db, "SELECT * FROM tbl_acadyears WHERE ay_id = '$ay_id'");
                                            while ($row = mysqli_fetch_array($getEAY)) {
                                                $ay_id = $row['ay_id'];
                                            ?>
                                            <option value="<?php echo $row['ay_id']; ?>">
                                                <?php echo $row['academic_year'];?>
                                            </option>
                                            <?php } ?>
                                    </select>
                                    <input class="form-control" type="text" name="ay_id" value="<?php echo $ay_id?>" hidden/>
                                </div>
                            </div>
                            <?php
                            
                            $department = mysqli_query($db, "SELECT * FROM tbl_departments
                            LEFT JOIN tbl_target ON tbl_target.department_id = tbl_departments.department_id WHERE tbl_target.department_id NOT IN ('7', '8', '9', '10') AND ay_id = '$ay_id'");
                            while ($row = mysqli_fetch_array($department)) {
                            ?>

                            <h5 class="mt-4"><?php echo $row['dept_abv']?></h5>
                            <input class="form-control" type="text" name="department_id[]" value="<?php echo $row['department_id']?>" hidden/>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="mt-2">Target New Enrollees</label>
                                    <input class="form-control" type="text" placeholder="New Enrollees" value="<?php echo $row['target_new']?>"
                                        name="target_new[]" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="mt-2">Target Old Enrollees</label>
                                    <input class="form-control" type="text" placeholder="Old Enrollees" value="<?php echo $row['target_old']?>"
                                        name="target_old[]" />
                                </div>
                            </div>

                            <?php } ?>

                            <div class="d-flex justify-content-end mt-4">
                                <button class="btn bg-gradient-dark text-white m-0 ms-2" type="submit"
                                    title="Add Target Enrollees" name="submit">Add
                                    Target Enrollees</button>
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