<?php
session_start();
include '../../includes/head.php';
include '../../includes/session.php';
?>
<title>
    Installment Dates List | SFAC - Bacoor
</title>
</head>


<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">View Installment Dates List</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row mb-5">
                <div class="col-12">
                    <div class="card shadow shadow-xl">
                        <!-- Card header -->
                        <div class="card-header">
                            <h5 class="mb-0">Installment Dates List</h5>
                            <!-- <p class="text-sm mb-0">
                                        A lightweight, extendable, dependency-free javascript HTML table plugin.
                                    </p> -->
                        </div>
                        <div class="table-responsive px-4 my-4">
                            <table class="table table-flush table-hover nowrap responsive" id="datatable-basic">
                                <thead class="thead-light">
                                    <tr>
                                        <th></th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Prelims</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Midterms</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Finals</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Semester - Academic Year</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $list_discount = mysqli_query($db, "SELECT * FROM tbl_installment_dates");
                                    while ($row = mysqli_fetch_array($list_discount)) {
                                        $id = $row['installment_id'];
                                        $prelims = new DateTime($row['date_1']);
                                        $midterms = new DateTime($row['date_2']);
                                        $finals = new DateTime($row['date_3']);

                                        $ay = mysqli_query($db, "SELECT * FROM tbl_acadyears WHERE ay_id = $row[ay_id]");
                                        $row1 = mysqli_fetch_array($ay);

                                        $sem = mysqli_query($db, "SELECT * FROM tbl_semesters WHERE sem_id = $row[sem_id]");
                                        $row2 = mysqli_fetch_array($sem);
                                    ?>

                                    <tr>
                                        <td></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $prelims->format('M d, Y'); ?></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $midterms->format('M d, Y'); ?></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $finals->format('M d, Y'); ?></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row2['semester'].' - '. $row1['academic_year']; ?>
                                        </td>
                                        <td class="text-sm font-weight-normal">
                                            <a class="btn bg-gradient-primary text-xs"
                                                href="edit.installment.date.php?installment_id=<?php echo $id; ?>"><i
                                                    class="text-xs fas fa-edit"></i> Edit</a>

                                            <a class="btn btn-block bg-gradient-danger mb-3 text-xs"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modal-notification<?php echo $id; ?>"><i
                                                    class="text-xs fas fa-trash-alt"></i> Delete</a>
                                        </td>
                                    </tr>
                                    <!-- modal -->
                                    <div class="modal fade" id="modal-notification<?php echo $id; ?>" tabindex="-1"
                                        role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                                        <div class="modal-dialog modal-danger modal-dialog-centered modal-"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title text-danger" id="modal-title-notification"><i
                                                            class="fas fa-exclamation-triangle"> </i>
                                                        Warning
                                                    </h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="py-3 text-center">
                                                        <i class="fas fa-trash-alt text-9xl"></i>
                                                        <h4 class="text-gradient text-danger mt-4">
                                                            Delete Installment Date!</h4>
                                                        <p>Are you sure you want to delete dates for
                                                            <br>
                                                            <i><b><?php echo  $row2['semester'].' - '. $row1['academic_year']; ?></b></i>?
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="userData/ctrl.del.installment.date.php?installment_id=<?php echo $id; ?>"
                                                        class="btn btn-white text-white bg-danger">Delete</a>
                                                    <button type="button"
                                                        class="btn btn-link text-secondary btn-outline-dark ml-auto"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end modals -->
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
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