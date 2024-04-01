<?php
session_start();
include '../../includes/head.php';
include '../../includes/session.php';

if (isset($_GET['ay_id']) && isset($_GET['sem_id'])) {
$ay_id = $_GET['ay_id'];
$sem_id = $_GET['sem_id'];

} else {
$ay_id = $_SESSION['AC'];
$sem_id = $_SESSION['S'];

}

?>
<title>
    Assessed Fee List | SFAC - Bacoor
</title>
</head>


<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">View Assessed Fees List</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row mb-5">
                <div class="col-12">
                    <div class="card shadow shadow-xl">
                        <!-- Card header -->
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h5 class="mb-0">Assessed Fees List</h5>
                                    <!-- <p class="text-sm mb-0">
                                                A lightweight, extendable, dependency-free javascript HTML table plugin.
                                            </p> -->
                                </div>
                                <div class="col d-flex justify-content-end">
                                    <!-- <button class="btn bg-gradient-dark text-white m-0 ms-2" type="submit" title="Send"
                                                    name="submit">Edit Payment Status</button> -->
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-9 col-9 mx-auto">
                                <div class="">
                                    <form method="GET" enctype="multipart/form-data" action="list.assessment.php">
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-sm-4">
                                                <input class="form-control" type="text" placeholder="Enter Student Name, Student Number or Course" 
                                                name="search" />
                                            </div>
                                            <div class="col-sm-3">
                                                <select class="form-control" name="sem_id" id="semester">
                                                    <?php
                                                    $get_sem_1 = mysqli_query($db, "SELECT * FROM tbl_semesters WHERE semester = '$sem_id'");
                                                    while ($row = mysqli_fetch_array($get_sem_1)) {
                                                    ?>
                                                    <option selected value="<?php echo $row['semester']; ?>">
                                                        <?php echo $row['semester'];?>
                                                    </option>
                                                    <?php } ?>

                                                    <?php $get_sem_2 = mysqli_query($db, "SELECT * FROM tbl_semesters WHERE NOT semester = '$sem_id'");
                                                    while ($row = mysqli_fetch_array($get_sem_2)) {
                                                    ?>
                                                    <option value="<?php echo $row['semester']; ?>">
                                                        <?php echo $row['semester'];?>
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-3">
                                                <select class="form-control" name="ay_id" id="academic_year">
                                                    <?php $getEAY = mysqli_query($db, "SELECT * FROM tbl_acadyears WHERE academic_year = '$ay_id'");
                                                    while ($row = mysqli_fetch_array($getEAY)) {
                                                    ?>
                                                    <option selected value="<?php echo $row['academic_year']; ?>">
                                                        <?php echo $row['academic_year'];?>
                                                    </option>
                                                    <?php } ?>
                                                    <?php $getEAY = mysqli_query($db, "SELECT * FROM tbl_acadyears WHERE NOT academic_year = '$ay_id'");
                                                    while ($row = mysqli_fetch_array($getEAY)) {
                                                    ?>
                                                    <option value="<?php echo $row['academic_year']; ?>">
                                                        <?php echo $row['academic_year'];?>
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-2">
                                                <button class="btn bg-gradient-dark text-white m-0 ms-2" type="submit" title="Send"
                                                    name="search_text">Search</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive px-4 my-4">
                            <table class="table table-flush table-hover nowrap responsive" id="datatable-basic">
                                <thead class="thead-light">
                                    <tr>
                                        <th></th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Student No.</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Fullname</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Year Level and Course</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Semester</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Academic Year</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Created At</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Last Updated at</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Last Updated by</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Status</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($_GET['search'])) {
                                    $_GET['search_text'] = addslashes($_GET['search_text']);

                                    $list_assessment = mysqli_query($db, "SELECT *, tbl_assessed_tf.status, tbl_assessed_tf.sem_id, tbl_assessed_tf.ay_id, tbl_assessed_tf.updated_by, CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname FROM tbl_assessed_tf
                                    LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_assessed_tf.stud_id
                                    LEFT JOIN tbl_schoolyears ON tbl_schoolyears.stud_id = tbl_students.stud_id
                                    LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                    LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id
                                    WHERE tbl_schoolyears.sem_id = '$sem_id' AND tbl_schoolyears.ay_id = '$ay_id' AND
                                    (firstname LIKE '%$_GET[search_text]%' OR
                                            middlename LIKE '%$_GET[search_text]%' OR
                                            lastname LIKE '%$_GET[search_text]%' OR
                                            course_abv LIKE '%$_GET[search_text]%' OR
                                            stud_no LIKE '%$_GET[search_text]%')") or die(mysqli_error($db));
                                    while ($row = mysqli_fetch_array($list_assessment)) {
                                        $id = $row['assessed_id'];
                                        $created_at = new DateTime($row['created_at']);
                                        $last_updated = new DateTime($row['last_updated']);

                                        $ay = mysqli_query($db, "SELECT * FROM tbl_acadyears WHERE ay_id = $row[ay_id]");
                                        $row_ay = mysqli_fetch_array($ay);

                                        $sem = mysqli_query($db, "SELECT * FROM tbl_semesters WHERE sem_id = $row[sem_id]");
                                        $row_sem = mysqli_fetch_array($sem);
                                    ?>

                                    <tr>
                                        <td></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['stud_no']; ?></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['fullname']; ?></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['year_abv'].' - '.$row['course_abv']; ?></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row_sem['semester']; ?></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row_ay['academic_year']; ?></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $created_at->format('h:i a, M d, Y'); ?>
                                        </td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $last_updated->format('h:i a, M d, Y'); ?></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['updated_by']; ?>
                                        </td>
                                        <td class="text-sm font-weight-normal">
                                            <?php
                                                if ($row['status'] == 'Paid') {
                                                    ?>
                                                    <a class="btn bg-gradient-success text-xs mt-3"
                                                    href="userData/ctrl.edit.payment.php?assessed_id=<?php echo $id; ?>&status=Unpaid"><i
                                                    class="text-xs fas fa-edit"></i> Paid</a>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <a class="btn bg-gradient-danger text-xs mt-3"
                                                    href="userData/ctrl.edit.payment.php?assessed_id=<?php echo $id; ?>&status=Paid"><i
                                                    class="text-xs fas fa-edit"></i> Unpaid</a>
                                                    <?php
                                                }
                                            ?>
                                        </td>
                                        <td class="text-sm font-weight-normal">
                                            <a class="btn bg-gradient-primary text-xs  mt-3"
                                                href="edit.assessment.php?assessed_id=<?php echo $id; ?>"><i
                                                    class="text-xs fas fa-edit"></i> Edit</a>

                                            <a class="btn btn-block bg-gradient-danger mb-3 text-xs  mt-3"
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
                                                            Delete Account!</h4>
                                                        <p>Are you sure you want to delete assessed fee for
                                                            <br>
                                                            <i><b><?php echo $row['fullname']; ?></b></i>?
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="userData/ctrl.del.assessment.php?assessed_id=<?php echo $id; ?>"
                                                        class="btn btn-white text-white bg-danger">Delete</a>
                                                    <button type="button"
                                                        class="btn btn-link text-secondary btn-outline-dark ml-auto"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end modals -->
                                    <?php } }?>
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