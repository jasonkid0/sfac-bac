<?php
session_start();
include '../../includes/head.php';
include '../../includes/session.php';
?>
<title>
    Dropped | SFAC - Bacoor
</title>
</head>


<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">View  Dropped (Students)</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row mb-5">
                <div class="col-12">
                    <div class="card shadow shadow-xl">
                        <!-- Card header -->
                        <div class="card-header m-1 my-0">
                            <h5 class="mb-0 "> Dropped (Students)</h5>
                            <p class="text-sm mb-0">For Academic Year
                                <?php echo $_SESSION['AC'] . ', ' . $_SESSION['S']; ?></p>
                        </div>
                        <hr class="horizontal dark mt-0">
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
                                            Student Type</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Date Enrolled</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Dropping Reason</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Option</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $studentList = mysqli_query(
                                        $db,
                                        "SELECT *,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname
                                            FROM tbl_schoolyears
                                            LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                            LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                            LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id
                                            LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                            LEFT JOIN tbl_dropout ON tbl_dropout.drop_id = tbl_schoolyears.drop_id
                                            WHERE remark IN ('Dropped') AND ay_id IN ('$_SESSION[AC]') AND sem_id IN ('$_SESSION[S]')
                                            ORDER BY stud_no DESC"
                                    ) or die(mysqli_error($db));
                                    while ($row = mysqli_fetch_array($studentList)) {
                                        $id = $row['stud_id'];
                                    ?>

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
                                            <?php echo $row['status']; ?>
                                        </td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['date_enrolled']; ?></td>
                                        <?php
                                        if ($row['drop_id'] == 25) {
                                            ?>
                                            <td class="text-sm font-weight-normal">
                                            <?php echo $row['other_reason']; ?></td>
                                            <?php
                                        } else {
                                            ?>
                                            <?php echo $row['drop_reason']; ?></td>
                                            <?php
                                        }
                                        ?>
                                        <td class="text-sm font-weight-normal">
                                            <div class="dropdown">
                                                <a href="#" class="btn bg-gradient-dark dropdown-toggle "
                                                    data-bs-toggle="dropdown" id="navbarDropdownMenuLink2">
                                                    <i class="text-xs fas fa-file-pdf"></i>&nbsp; Forms
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2"
                                                    style="min-width: unset;">
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="../forms/data/pre-with-data.php?stud_id=<?php echo $id;  ?>">
                                                            Pre-Enrollment
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="../forms/data/dars.php?stud_id=<?php echo $id; ?>">
                                                            Registration
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            
                                            <a class="btn btn-block bg-gradient-primary mb-3 text-xs"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modal-notification<?php echo $id; ?>"><i
                                                    class="fas fa-user-check"></i>&nbsp; Undrop</a>

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
                                                                <h4 class="text-gradient text-primary mt-4">
                                                                    Undrop Student!</h4>
                                                                <p>Are you sure you want to undrop
                                                                    <br>
                                                                    <i><b><?php echo $row['fullname']; ?></b></i>
                                                                    from <br>
                                                                    <i><b><?php echo $row['course']; ?></b></i>?
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="userData/ctrl.edit.undrop.php?stud_id=<?php echo $id; ?>"
                                                                class="btn btn-white text-white bg-primary">undrop</a>
                                                            <button type="button"
                                                                class="btn btn-link text-secondary btn-outline-dark ml-auto"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- <a class="btn btn-block bg-gradient-danger mb-3 text-xs"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modal-notification<?php echo $id; ?>"><i
                                                    class="fas fa-user-slash"></i>&nbsp; Drop</a>

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
                                                                    Drop Student!</h4>
                                                                <p>Are you sure you want to drop
                                                                    <br>
                                                                    <i><b><?php echo $row['fullname']; ?></b></i>
                                                                    from <br>
                                                                    <i><b><?php echo $row['course']; ?></b></i>?
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="userData/ctrl.edit.drop.php?stud_id=<?php echo $id; ?>"
                                                                class="btn btn-white text-white bg-danger">Drop</a>
                                                            <button type="button"
                                                                class="btn btn-link text-secondary btn-outline-dark ml-auto"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </td>
                                    </tr>
                                    <?php }
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