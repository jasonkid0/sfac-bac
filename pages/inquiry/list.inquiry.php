<?php
session_start();
include '../../includes/head.php';
include '../../includes/session.php';
?>
<title>
    Online Inquiries | SFAC - Bacoor
</title>
</head>


<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">View Online Inquiries</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row mb-5">
                <div class="col-12">
                    <div class="card shadow shadow-xl">
                        <!-- Card header -->
                        <div class="card-header">
                            <h5 class="mb-0">Online Inquiries</h5>
                            <!-- <p class="text-sm mb-0">
                                        A lightweight, extendable, dependency-free javascript HTML table plugin.
                                    </p> -->
                        </div>
                        <div class="row mx-2 justify-content-center">
                            <div class="col">
                                <?php
                            $information = mysqli_query($db, "SELECT * FROM tbl_information");
                            while ($row = mysqli_fetch_array($information)) {
                                $sy = mysqli_query($db, "SELECT * FROM tbl_online_registrations WHERE info_id = '$row[info_id]'");
                                $number = mysqli_num_rows($sy);
                                ?>
                                <button class="btn btn-block bg-danger text-white text-xs"><?php echo $row['info_name']; ?> : <?php echo $number?></button>
                                <?php
                            }
                            ?>
                            </div>
                        </div>
                        <div class="table-responsive px-4 my-4">
                            <table class="table table-flush table-hover m-0 responsive nowrap" id="datatable-basic"
                                style="width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th></th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Fullname</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Course and Year Applying To</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Semester and Academic Year Applied</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Contact Number</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Email</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Last School Attended</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Type of School</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Info</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Created At</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Status</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Options</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php


                                    $listInquiries = mysqli_query($db, "SELECT *, CONCAT(tbl_online_registrations.lastname, ', ', tbl_online_registrations.firstname, ' ', tbl_online_registrations.middlename) AS fullname 
                                            FROM tbl_online_registrations
                                            LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_online_registrations.course_id
                                            LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_online_registrations.year_id
                                            LEFT JOIN tbl_information ON tbl_information.info_id = tbl_online_registrations.info_id
                                            ORDER BY status DESC, or_id DESC");
                                    while ($row = mysqli_fetch_array($listInquiries)) {
                                        $id = $row['or_id'];
                                        $created_at = new DateTime($row['created_at']);
                                    ?>

                                    <tr>
                                        <td></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['fullname']; ?></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['course_abv'] . ' - ' . $row['year_abv']; ?></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['semester'] . ', ' . $row['acad_year']; ?></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['contact']; ?></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['email']; ?></td>
                                            <?php
                                                if ($row['last_school_type'] == 1) {
                                            ?>
                                                    <td class="text-sm font-weight-normal">
                                                    Private</td>
                                            <?php
                                                } elseif ($row['last_school_type'] == 2) {
                                            ?>
                                                    <td class="text-sm font-weight-normal">
                                                    Public</td>
                                            <?php
                                                } else {
                                             ?>
                                                    <td class="text-sm font-weight-normal">
                                                    </td>
                                            <?php       
                                                }
                                            ?>
                            
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['lastschool']; ?></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['info_name']; ?></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $created_at->format('h:i a \o\n M d, Y') ?></td>
                                        <?php
                                            if ($row['status'] == "Pending") {
                                            ?>
                                        <td class="text-xs font-weight-normal" style="color: #b45f06">
                                            <span class="badge badge-warning"><?php echo $row['status']; ?></span>
                                        </td>
                                        <?php
                                            } else {
                                            ?>
                                        <td class="text-xs font-weight-normal" style="color: #38761d">
                                            <span class="badge"
                                                style="background-color: #38761d; color: #d9ead3"><?php echo $row['status']; ?>
                                        </td></span>
                                        <?php
                                            }
                                            ?>

                                        <td class="text-sm font-weight-normal">
                                            <?php if ($row['status'] == "Pending") { ?>
                                            <a class="btn text-xs bg-gradient-primary"
                                                href="edit.inquiry.php?or_id=<?php echo $id; ?>"><i
                                                    class="text-xs fas fa-edit"></i> Admit</a>
                                            <?php } ?>
                                            <a class="btn text-xs bg-gradient-dark"
                                                href="../forms/data/applicationadmission_inquiry.php?stud_id=<?php echo $id; ?>"><i
                                                    class="text-xs fas fa-file"></i> Form</a>
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
                                                                    class="fas fa-exclamation-triangle"> </i>
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
                                                                    Delete Enrollee!</h4>
                                                                <p>Are you sure you want to delete
                                                                    <br>
                                                                    <i><b><?php echo $row['fullname']; ?></b></i>?
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="inquiryData/ctrl.del.inquiry.php?or_id=<?php echo $id; ?>"
                                                                class="btn btn-white text-white bg-danger">Delete</a>
                                                            <button type="button"
                                                                class="btn btn-link text-secondary btn-outline-dark ml-auto"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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