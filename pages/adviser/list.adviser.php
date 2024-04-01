<?php
session_start();
include '../../includes/head.php';
include '../../includes/session.php';
?>
<title>
    Advisers List | SFAC - Bacoor
</title>
</head>


<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">View Advisers List</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row mb-5">
                <div class="col-12">
                    <div class="card shadow shadow-xl">
                        <!-- Card header -->
                        <div class="card-header">
                            <h5 class="mb-0">Advisers List</h5>
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
                                            I.D. No.</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Fullname</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Position</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Role</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Department</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Status</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Email</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Username</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Created At</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Last Updated</th>

                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Updated By</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Options</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $listAdviser = mysqli_query($db, "SELECT *, CONCAT(facul.faculty_lastname, ', ', facul.faculty_firstname, ' ', facul.faculty_middlename) AS fullname 
                                            FROM tbl_faculties AS facul
                                            LEFT JOIN tbl_departments AS dep ON dep.department_id = facul.department_id
                                            WHERE role = 'Adviser'");
                                    while ($row = mysqli_fetch_array($listAdviser)) {
                                        $id = $row['faculty_id'];
                                    ?>

                                    <tr>
                                        <td></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['faculty_no'] ?>
                                        </td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['fullname']; ?></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['position']; ?></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['role']; ?></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['department_name']; ?></td>
                                        <td class="text-sm font-weight-normal"><?php echo $row['status']; ?>
                                        </td>
                                        <td class="text-sm font-weight-normal"><?php echo $row['email']; ?></td>
                                        <td class="text-sm font-weight-normal"><?php echo $row['username']; ?>
                                        </td>
                                        <td class="text-sm font-weight-normal"><?php echo $row['created_at']; ?>
                                        </td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['last_updated']; ?></td>
                                        <td class="text-sm font-weight-normal"><?php echo $row['updated_by']; ?>
                                        </td>
                                        <td class="text-sm font-weight-normal">
                                            <a class="btn bg-gradient-primary text-xs"
                                                href="edit.adviser.php?faculty_id=<?php echo $id; ?>"><i
                                                    class="text-xs fas fa-edit"></i> Edit</a>

                                            <a class="btn btn-block bg-gradient-danger mb-3 text-xs"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modal-notification<?php echo $id; ?>"><i
                                                    class="text-xs fas fa-trash-alt"></i>
                                                Delete</a>
                                        </td>
                                    </tr>
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
                                                            Delete Account!</h4>
                                                        <p>Are you sure you want to delete
                                                            <br>
                                                            <i><b><?php echo $row['fullname']; ?></b></i>?
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="userData/ctrl.del.admission.php?admission_id=<?php echo $id; ?>"
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