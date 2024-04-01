<?php
session_start();
include '../../includes/head.php';
include '../../includes/session.php';
?>
<title>
    Tuition Fees List | SFAC - Bacoor
</title>
</head>


<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">View Tuition Fees</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row mb-5">
                <div class="col-12">
                    <div class="card shadow shadow-xl">
                        <!-- Card header -->
                        <div class="card-header">
                            <h5 class="mb-0">Tuition Fees List</h5>
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
                                            Course</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Fee Value</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Academic Year</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Created At</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Last Updated at</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Last Updated by</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $list_tuition = mysqli_query($db, "SELECT * FROM tbl_tuition_fees LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_tuition_fees.year_id LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_tuition_fees.course_id");
                                    while ($row = mysqli_fetch_array($list_tuition)) {
                                        $id = $row['tf_id'];
                                        $created_at = new DateTime($row['created_at']);
                                        $last_updated = new DateTime($row['last_updated']);

                                        $ay = mysqli_query($db, "SELECT * FROM tbl_acadyears WHERE ay_id = $row[ay_id]");
                                        $row1 = mysqli_fetch_array($ay);
                                    ?>

                                    <tr>
                                        <td></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['year_level'].' - '.$row['course_abv']; ?></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo number_format($row['tuition_fee'], 2); ?></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row1['academic_year']; ?></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $created_at->format('h:i a \o\n M d, Y'); ?>
                                        </td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $last_updated->format('h:i a \o\n M d, Y'); ?></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['updated_by']; ?>
                                        </td>
                                        <td class="text-sm font-weight-normal">
                                            <a class="btn bg-gradient-primary text-xs"
                                                href="edit.tuition.php?tf_id=<?php echo $id; ?>"><i
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
                                                            Delete Tuition Fee!</h4>
                                                        <p>Are you sure you want to delete tuition fee for
                                                            <br>
                                                            <i><b><?php echo $row['course_abv']; ?></b></i>?
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="userData/ctrl.del.tuition.php?tf_id=<?php echo $id; ?>"
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