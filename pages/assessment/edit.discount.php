<?php
session_start();
include '../../includes/head.php';
// include 'accountConn/conn.php';
include '../../includes/session.php';

$disc_id = $_GET['disc_id']
?>
<title>
    Edit Discounts | SFAC - Bacoor
</title>
</head>

<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">Edit Discount</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row mb-10">
                <div class="col-lg-9 col-12 mx-auto">
                    <div class="card card-body mt-4 shadow-sm">
                        <h5 class="font-weight-bolder mb-0">Edit Discount</h5>
                        <p class="text-sm mb-0">Discount Details</p>
                        <hr class="horizontal dark my-3">
                        <form method="POST" enctype="multipart/form-data" action="userData/ctrl.edit.discount.php?disc_id=<?php echo $disc_id; ?>">
                            <?php
                                $disc_select = mysqli_query($db, "SELECT * FROM tbl_discounts WHERE disc_id = '$disc_id'");
                                while ($row1 = mysqli_fetch_array($disc_select)) {
                            ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Discount Description</label>
                                    <input class="form-control" type="text" value="<?php echo $row1['discount_desc']?>" placeholder="Discount Description"
                                        name="discount_desc" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-5">
                                    <label class="mt-3">Discount</label>
                                    <input class="form-control" type="text" value="<?php echo $row1['discount']?>" placeholder="Enter discount value"
                                        name="discount" />
                                    
                                </div>
                                <div class="col-sm-1">
                                    <div class="form-check mt-5">
                                        <input class="form-check-input" type="checkbox" value="1" name="percent" <?php echo ($row1['percent']== 1 ? 'checked' : '')?>>
                                        <label>percent</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="mt-3">Academic Year</label>
                                    <select class="form-control" name="ay_id" id="academic_year">
                                        <?php $getEAY = mysqli_query($db, "SELECT * FROM tbl_acadyears WHERE ay_id = '$row1[ay_id]'");
                                        while ($row = mysqli_fetch_array($getEAY)) {
                                        ?>
                                        <option selected value="<?php echo $row['ay_id']; ?>">
                                            <?php echo $row['academic_year'];
                                        } ?></option>
                                        <?php $getEAY1 = mysqli_query($db, "SELECT * FROM tbl_acadyears WHERE NOT ay_id = '$row1[ay_id]'");
                                        while ($row2 = mysqli_fetch_array($getEAY1)) {
                                        ?>
                                        <option selected value="<?php echo $row2['ay_id']; ?>">
                                            <?php echo $row2['academic_year'];
                                        } ?></option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-check mt-3">
                                        <input class="form-check-input" type="checkbox" value="1" name="discount_status" <?php echo ($row1['discount_status']== 1 ? 'checked' : '')?>>
                                        <label>Reflect only in form</label>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mt-4">
                                <button class="btn bg-gradient-dark text-white m-0 ms-2" type="submit" title="Send"
                                    name="submit">Edit
                                    Discount</button>
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