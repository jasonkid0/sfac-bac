<?php
session_start();
include '../../includes/head.php';
// include 'accountConn/conn.php';
include '../../includes/session.php';


?>
<title>
    Add Set Payments Status | SFAC - Bacoor
</title>
</head>

<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">Add Set Payment Status</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row mb-10">
                <div class="col-lg-9 col-12 mx-auto">
                    <div class="card card-body mt-4 shadow-sm">
                        <h5 class="font-weight-bolder mb-0">Payment Status</h5>
                        <p class="text-sm mb-0">Change Payment Status and Set account as Unpaid</p>
                        <hr class="horizontal dark my-3">
                        <form method="POST" enctype="multipart/form-data" action="userData/ctrl.add.discount.php">
                            <?php

                                
                               
                                $date_array = [];

                                

                                $select_dates = mysqli_query($acc, "SELECT * FROM tbl_installment_dates WHERE ay_id = '$_SESSION[AYear]'");
                                while ($row = mysqli_fetch_array($select_dates)) {
                                    $date_array[] = $row['date_1'];
                                    $date_array[] = $row['date_2'];
                                    $date_array[] = $row['date_3'];

                                    $current_date = new DateTime(date('d-m-Y'));

                                    foreach  ($date_array as $date_value) {
                                        $total_paid = 0;
                                        $total_unpaid = 0;
                                        $date = new DateTime($date_value);
                                        $select_status = mysqli_query($acc, "SELECT * FROM tbl_assessed_tf WHERE ay_id = '$_SESSION[AYear]' AND payment IN ('trimestral', 'quarterly')");
                                        while ($row1 = mysqli_fetch_array($select_status)) {

                                            $select_paid = mysqli_query($acc,"SELECT * FROM tbl_payments_status WHERE payment_date = '$date_value' AND assessed_id = '$row1[assessed_id]'") or die (mysqli_error($acc));
                                            if (mysqli_num_rows($select_paid) != 0) {
                                                $total_paid++;
                                            } else {
                                                $total_unpaid++;
                                            }
                                        }
                            ?>
                            <div class="row justify-content-center">
                                <div class="col-sm-4">
                                    <p>Date: <b><?php echo $date->format('M d, Y')?></b></p>
                                </div>
                                <div class="col-sm-4">

                                </div>
                            </div>
                            <div class="row justify-content-center mb-3">
                                <div class="col-sm-4">
                                    <label>Paid Students</label>
                                    <input class="form-control" type="text" value="<?php echo $total_paid;?>" disabled
                                        name="discount_desc" />
                                </div>
                                <div class="col-sm-4">
                                    <label>Unpaid Students</label>
                                    <input class="form-control" type="text" value="<?php echo $total_unpaid;?>" disabled
                                        name="discount_desc" />
                                </div>
                            </div>
                            <?php
                                                }
                                }

                            ?>
                            <div class="row justify-content-center">
                                <div class="col-sm-4">
                                </div>
                                <div class="col-sm-4 mt-1">
                                    <a class="btn bg-gradient-primary text-xs" href="userData/ctrl.edit.payment.php">Change Payment Status</a>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-4">
                                <button class="btn bg-gradient-dark text-white m-0 ms-2" type="submit" title="Send"
                                    name="submit">Finish</button>
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