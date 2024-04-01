<?php
session_start();
include '../../includes/head.php';
include '../../includes/session.php';
?>
<title>
    Enrollment Update List | SFAC - Bacoor
</title>
</head>


<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">View Enrollment Update List</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row mb-5">
                <div class="col-12">
                    <div class="card shadow shadow-xl">
                        <!-- Card header -->
                        <div class="card-header">
                            <h5 class="mb-0">Enrollment Update List</h5>
                            <!-- <p class="text-sm mb-0">
                                        A lightweight, extendable, dependency-free javascript HTML table plugin.
                                    </p> -->
                        </div>
                        <div class="table-responsive px-4 my-4">
                            <table class="table table-flush table-hover m-0 responsive nowrap" id="datatable-basic"
                                style="width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th></th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Academic Year</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Total Target New Enrollees</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Total Target Old Enrollees</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Options</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $listAdviser = mysqli_query($db, "SELECT academic_year, tbl_acadyears.ay_id, SUM(target_new) AS target_new, SUM(target_old) AS target_old FROM tbl_target LEFT JOIN tbl_acadyears ON tbl_acadyears.ay_id = tbl_target.ay_id GROUP BY tbl_acadyears.ay_id ORDER BY tbl_acadyears.ay_id DESC");
                                    while ($row = mysqli_fetch_array($listAdviser)) {
                                        $ay_id = $row['ay_id'];
                                    ?>

                                    <tr>
                                        <td></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['academic_year'] ?>
                                        </td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['target_new'] ?>
                                        </td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['target_old'] ?>
                                        </td>
                                        <td class="text-sm font-weight-normal">
                                            <a class="btn bg-gradient-primary text-xs"
                                                href="edit.target.php?ay_id=<?php echo $ay_id?>"><i
                                                    class="text-xs fas fa-edit"></i> Edit</a>

                                            <a class="btn btn-block bg-gradient-danger mb-3 text-xs"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modal-notification<?php echo $ay_id; ?>"><i
                                                    class="text-xs fas fa-trash-alt"></i>
                                                Delete</a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="modal-notification<?php echo $ay_id; ?>" tabindex="-1"
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
                                                            Delete Target Enrollees!</h4>
                                                        <p>Are you sure you want to delete
                                                            <br>
                                                            <i><b><?php echo $row['academic_year']; ?></b></i>?
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="userData/ctrl.del.target.php?<?php echo $ay_id; ?>"
                                                        class="btn btn-white text-white bg-danger">Delete</a>
                                                    <button type="button"
                                                        class="btn btn-link text-secondary btn-outline-dark ml-auto"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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