<?php
session_start();
include '../../includes/head.php';
include '../../includes/session.php';
?>
<title>
    Pending Students | SFAC - Bacoor
</title>
</head>


<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">View Pending Enrollees</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row mb-5">
                <div class="col-12">
                    <div class="card shadow shadow-xl">
                        <!-- Card header -->
                        <div class="card-header m-1 my-0">
                            <h5 class="mb-0 ">List of Pending Enrollees</h5>
                            <p class="text-sm mb-0">for Academic Year
                                <?php echo $_SESSION['AC'] . ', ' . $_SESSION['S']; ?></p>
                        </div>
                        <hr class="horizontal dark mt-0">
                        <div class="row d-flex justify-content-center mx-4">
                            <div class="col-md-6 m-1 ">
                                <form method="GET">
                                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                        <div class="input-group">
                                            <!-- <span class="input-group-text text-body"><i class  ="fas fa-search"
                                                            aria-hidden="true"></i></span> -->
                                            <input type="text" class="form-control" name="search"
                                                placeholder="Search Student"
                                                <?php if (!empty($_GET['search'])) {
                                                                                                                                    echo 'value="' . $_GET['search'] . '"';
                                                                                                                                }  ?>>
                                            <button class="btn-sm btn bg-gradient-dark ms-auto mb-0" type="submit"
                                                title="Send"><i class="fas fa-search text-lg"
                                                    aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive px-4 my-4">
                            <table class=" table table-hover responsive nowrap m-0" id="datatable-basic"
                                style="width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th></th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Picture</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Student No.</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Fullname</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Course</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Year Level</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Type</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Date Applied</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Remarks</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Officially Drop</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Options</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    if (isset($_GET['search'])) {

                                        $_GET['search'] = addslashes($_GET['search']);

                                        // Query Pending Students
                                        if ($_SESSION['role'] == "Admission") {
                                            $pendStud = $db->query("SELECT *, CONCAT(S.firstname, ' ', S.middlename, ' ', S.lastname) AS fullname
                                            FROM tbl_schoolyears SY
                                            LEFT JOIN tbl_courses C USING(course_id)
                                            LEFT JOIN tbl_students S USING(stud_id)
                                            LEFT JOIN tbl_year_levels YL USING(year_id)
                                            WHERE (remark IN ('Pending') OR remark IN ('Checked') OR remark IN ('Canceled') OR remark IN ('Disapproved')) AND ay_id IN ('$_SESSION[AC]') AND sem_id IN ('$_SESSION[S]') AND 
                                            (firstname LIKE '%$_GET[search]%' OR
                                            middlename LIKE '%$_GET[search]%' OR
                                            lastname LIKE '%$_GET[search]%' OR
                                            stud_no LIKE '%$_GET[search]%')
                                            ORDER BY sy_id DESC, remark DESC") or die($db->error);
                                        } else {
                                            $pendStud = $db->query("SELECT *, CONCAT(S.firstname, ' ', S.middlename, ' ', S.lastname) AS fullname
                                            FROM tbl_schoolyears SY
                                            LEFT JOIN tbl_courses C USING(course_id)
                                            LEFT JOIN tbl_students S USING(stud_id)
                                            LEFT JOIN tbl_year_levels YL USING(year_id)
                                            WHERE (remark IN ('Pending') OR remark IN ('Checked') OR remark IN ('Canceled') OR remark IN ('Disapproved')) AND C.department_id IN ('$_SESSION[ADepartment_id]') AND ay_id IN ('$_SESSION[AC]') AND sem_id IN ('$_SESSION[S]') AND 
                                            (firstname LIKE '%$_GET[search]%' OR
                                            middlename LIKE '%$_GET[search]%' OR
                                            lastname LIKE '%$_GET[search]%' OR
                                            stud_no LIKE '%$_GET[search]%')
                                            ORDER BY sy_id DESC, remark DESC") or die($db->error);
                                        }
                                        
                                        while ($row = $pendStud->fetch_array()) {
                                            $id = $row['sy_id'];
                                            $stud_id = $row['stud_id'];

                                    ?>
                                    <!-- ROWS -->
                                    <tr>
                                        <td></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php if (empty($row['img'])) {
                                                        echo '<img class="border-radius-lg shadow-sm zoom" style="height:80px; width:80px;" src="../../assets/img/illustrations/user_prof.jpg"/>';
                                                    } else {
                                                        echo ' <img class=" border-radius-lg shadow-sm zoom" style="height:80px; width:80px;" src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" "/>';
                                                    } ?>
                                        </td>

                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['stud_no']; ?></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['fullname']; ?></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['course_abv']; ?></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['year_level']; ?>
                                        </td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['status']; ?></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['date_enrolled']; ?>
                                        </td>
                                        <td class="text-sm font-weight-normal">
                                            <div class="d-flex align-items-center">
                                                <button <?php if ($row['remark'] == "Pending") {
                                                                    echo 'class="btn btn-icon-only btn-rounded btn-outline-warning mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"
                                                                                                                                                                                            style="color: #ce7e00; border-color:#ce7e00"><i class="fas fa-spinner"
                                                                                                                                                                                                    aria-hidden="true"></i>';
                                                                } elseif ($row['remark'] == 'Checked') {
                                                                    echo 'class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"
                                                                                                                                                                                            style="color: #38761d; border-color:#38761d"><i
                                                                class="fas fa-check" aria-hidden="true"></i>';
                                                                } elseif ($row['remark'] == 'Canceled' || $row['remark'] == "Disapproved") {
                                                                    echo 'class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"
                                                                style="color: #990000; border-color:#990000"><i class="fas fa-times" aria-hidden="true"></i>';
                                                                } ?> </button>
                                                    <span><?php echo $row['remark']; ?></span>
                                            </div>

                                        </td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['off_drop']; ?>
                                        </td>
                                        <td class="text-sm font-weight-normal">

                                            <div class="d-flex align-items-center">

                                                <a name="approval"
                                                    href="userData/ctrl.edit.pendingStud.php?id=<?php echo $id . '&remark=' . $row['remark'] . '&search=' . $_GET['search'];  ?>"
                                                    class="mx-2" data-bs-toggle="tooltip"
                                                    <?php if ($row['remark'] == 'Pending' || $row['remark'] == 'Canceled') {
                                                                                                                                                                                                                                                    echo 'data-bs-original-title="Check"><i class="fas fa-check text-success"></i>';
                                                                                                                                                                                                                                                } elseif ($row['remark'] == 'Checked' || $row['remark'] == 'Disapproved') echo 'data-bs-original-title="Uncheck"><i class="fas fa-times text-danger" ></i>'; ?>
                                                    </a>

                                                    <a href="../enrollment/enrollmentInfo.php?stud_id=<?php echo $stud_id; ?>"
                                                        class="mx-2" data-bs-toggle="tooltip"
                                                        data-bs-original-title="Enrollment Info.">
                                                        <i class="fas fa-globe text-secondary"></i>
                                                    </a>
                                                    <a href="../forms/data/pre-with-data.php?stud_id=<?php echo $stud_id;  ?>"
                                                        class="mx-2" data-bs-toggle="tooltip"
                                                        data-bs-original-title="Pre-Enrollment Form">
                                                        <i class="fas fa-file-pdf text-secondary"></i>
                                                    </a>
                                                    <a href="../forms/data/dars.php?stud_id=<?php echo $stud_id;  ?>"
                                                        class="mx-2" data-bs-toggle="tooltip"
                                                        data-bs-original-title="Registration Forms">
                                                        <i class="fas fa-file-pdf text-secondary"></i>
                                                    </a>
                                                    <span class="cursor-pointer" data-bs-toggle="tooltip"
                                                        data-bs-original-title="Delete">
                                                        <a class="mx-2" data-bs-toggle="modal"
                                                            data-bs-target="#modal-delete<?php echo $id; ?>">
                                                            <i class="fas fa-trash" style="color: #c55151"></i>
                                                        </a>
                                                    </span>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- END ROWS -->
                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="modal-delete<?php echo $id; ?>" tabindex="-1"
                                        role="dialog" aria-labelledby="modal-delete" aria-hidden="true">
                                        <div class="modal-dialog modal-danger modal-dialog-centered modal-"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title text-danger" id="modal-title-delete">
                                                        <i class="fas fa-exclamation-triangle">
                                                        </i>
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
                                                            Delete Enrollee!</h4>
                                                        <p>Are you sure you want to delete
                                                            <br>
                                                            <i><b><?php echo $row['fullname']; ?></b></i>
                                                            from <br>
                                                            <i><b><?php echo $row['course_abv']; ?></b></i>?
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="userData/ctrl.del.pendingStud.php?id=<?php echo $id . '&search=' . $_GET['search']; ?>"
                                                        class="btn btn-white text-white bg-danger">Delete</a>
                                                    <button type="button"
                                                        class="btn btn-link text-secondary btn-outline-dark ml-auto"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }
                                    }
                                    ?>
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