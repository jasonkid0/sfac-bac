<?php
session_start();
include '../../includes/head.php';
include '../../includes/session.php';
?>
<title>
    Effective Curriculum Year | SFAC - Bacoor
</title>
</head>

<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">Curriculum Year</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row mb-8">
                <div class=" col-lg-4 col-12 mx-auto">
                    <div class="card card-body mt-4 shadow-sm">
                        <h5 class="font-weight-bolder mb-0">Add Curriculum Year</h5>
                        <p class="text-sm mb-0">Fill out the field!</p>
                        <hr class="horizontal dark my-3">
                        <form method="POST" enctype="multipart/form-data" action="acadData/ctrl.effectiveAY.php">
                            <div class="row justify-content-center">
                                <div class="col-sm-10 text-center">
                                    <label>Curriculum Year</label>
                                    <input class="form-control text-center" data-format="0000-0000" type="text"
                                        placeholder="0000-0000" name="EAY" required>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mt-4">
                                <button class="btn bg-gradient-dark text-white m-0 ms-2" type="submit" title="Add"
                                    name="submit">Add</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="card shadow shadow-xl mt-4">
                        <!-- Card header -->
                        <div class="card-header">
                            <h5 class="mb-0 font-weight-bolder">Curriculum Year Lists</h5>
                            <p class="text-sm mb-0">
                                These are lists of Curriculum Years
                            </p>
                        </div>
                        <hr class="horizontal dark">
                        <div class="table-responsive px-4 my-4">
                            <table class="table table-flush table-hover m-0 responsive nowrap" id="datatable-basic"
                                style="width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Effective Curriculum Year</th>

                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Options</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $query = $db->query("SELECT * FROM tbl_effective_acadyear ORDER BY eay DESC") or die($db->error);
                                    while ($row = $query->fetch_array()) {
                                        $id = $row['eay_id']; ?>
                                    <tr>
                                        <td class="text-sm font-weight-normal"><?php echo $row['eay']; ?>
                                        </td>
                                        <td class="text-sm font-weight-normal">
                                            <a class="btn bg-gradient-primary text-xs"
                                                href="edit.effectiveAY.php?id=<?php echo $id; ?>"><i
                                                    class="text-xs fas fa-edit"></i> Edit</a>

                                            <a class="btn btn-block bg-gradient-danger mb-3 text-xs"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modal-notification<?php echo $id; ?>"><i
                                                    class="text-xs fas fa-trash-alt"></i>
                                                Delete</a>


                                            <div class="modal fade" id="modal-notification<?php echo $id; ?>"
                                                tabindex="-1" role="dialog" aria-labelledby="modal-notification"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-danger modal-dialog-centered modal-"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title text-danger"
                                                                id="modal-title-notification"><i
                                                                    class="fas fa-exclamation-triangle">
                                                                </i>
                                                                Warning
                                                            </h6>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="py-3 text-center">
                                                                <i class="fas fa-trash-alt text-9xl"></i>
                                                                <h4 class="text-gradient text-danger mt-4">
                                                                    Delete Effective Curriculum Year!</h4>
                                                                <p>Are you sure you want to delete
                                                                    <br>
                                                                    <i><b><?php echo $row['eay']; ?></b></i>?
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="acadData/ctrl.effectiveAY.php?id=<?php echo $id; ?>"
                                                                class="btn btn-white text-white bg-danger">Delete</a>
                                                            <button type="button"
                                                                class="btn btn-link text-secondary btn-outline-dark ml-auto"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        </td>
                                    </tr>
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