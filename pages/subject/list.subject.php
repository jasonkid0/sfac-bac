<?php
session_start();
include '../../includes/head.php';
include '../../includes/session.php';

$course = 0;
$eay_c = 0;

if (isset($_GET['eay'])) {
    $eay_c = $_GET['eay'];
} else {
    $eay_c = 0;
}



if (isset($_GET['course_display'])) {
    $course = $_GET['course_display'];
} else {
    $course = 0;
}

?>
<title>
    Subject List | SFAC - Bacoor
</title>
</head>


<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">Subject List</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->

                <div class="container-fluid py-4">
                    <div class="row mb-5">
                        <div class="col-12">
                            <div class="card shadow shadow-xl">
                                <!-- Card header -->
                                <div class="card-header">
                            <form method="GET">
                                <div class="row">
                                    <div class="col-md-7 ms-auto">
                                        <h5 class="mb-0">Subjects List</h5>


                                    </div>

                                    <div class="col-md-3 px-0 g-0 mt-3 my-lg-0">
                                        <div class="my-auto">
                                            <select class="form-control" name="eay" id="academic_year">
                                                <?php
                                                // URl error 
                                                $getEAY1 = $db->query("SELECT * FROM tbl_effective_acadyear WHERE eay_id = '$_GET[eay]'") or die($db->error);
                                                $count = $getEAY1->num_rows;
                                                if (!empty($_GET['eay']) && $count > 0) {
                                                    $getEAY = $db->query("SELECT * FROM tbl_effective_acadyear WHERE eay_id IN ('$_GET[eay]')") or die($db->error);
                                                    while ($row = $getEAY->fetch_array()) {
                                                        echo '<option selected value="' . $row['eay_id'] . '">' . $row['eay'] . '</option>';
                                                    }
                                                    $getEAY2 = $db->query("SELECT * FROM tbl_effective_acadyear WHERE eay_id NOT IN ('$_GET[eay]') ORDER BY eay DESC") or die($db->error);
                                                    while ($row = $getEAY2->fetch_array()) {
                                                        echo '<option value="' . $row['eay_id'] . '">' . $row['eay'] . '</option>';
                                                    }
                                                } else {
                                                    echo '<option selected  value="">Select a year
                                                        </option>';
                                                    $getEAY3 = $db->query("SELECT * FROM tbl_effective_acadyear ORDER BY eay DESC") or die($db->error);
                                                    while ($row = $getEAY3->fetch_array()) {
                                                        echo '<option value="' . $row['eay_id'] . '">' . $row['eay'] . '</option>';
                                                    }
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 px-0 g-0 text-center mt-0 mt-md-3 my-lg-0">
                                        <button type="submit" class="btn bg-gradient-dark"><i class="fas fa-eye">
                                            </i>
                                            &nbsp;Show</button>
                                    </div>
                                </div>
                                <div id="divRes">

                                </div>
                            </form>
                        </div>
                                

                        <div class="card-body text-center">
                            <form action="list.subject.php" method="GET">
                                <?php
                                    $GETallcourse = mysqli_query($db, "SELECT * FROM tbl_courses WHERE course_id IN 
                                    (SELECT DISTINCT S.course_id FROM tbl_subjects_new S LEFT JOIN tbl_effective_acadyear EAY ON EAY.eay_id = S.eay_id INNER JOIN tbl_courses C ON C.course_id = S.course_id  WHERE EAY.eay_id = '$eay_c')
                                     ORDER BY department_id, course_abv")or die($db->error); 
                                    while ($DISPLAYcourse = mysqli_fetch_array($GETallcourse)) {
                                        echo '
                                            <button class="btn btn-icon btn-3 btn-info" value="'.$DISPLAYcourse['course_id'].'" name="course_display">
                                                <span class="btn-inner--icon"><i class="fas fa-laptop"></i></span>
                                                <span class="btn-inner--text">'.$DISPLAYcourse['course_abv'].'</span>
                                            </button>
                                        ';
                                    }

                                    echo '<input hidden type="text" name="eay" value="' . $eay_c . '">';
                                ?>
                                

                            </form>

                        </div>

                        <div class="table-responsive px-4 my-4">
                            <table class="table table-flush table-hover m-0 responsive nowrap" id="datatable-basic"
                                style="width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th></th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Subject Code</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Subject Description</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Unit</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Pre-Requisites</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Course</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Curriculum</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Year Level</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Semester</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Options</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // PLEASE STOP
                                    if (!empty($course)) {
                                        $listsubject = mysqli_query($db, "SELECT * FROM tbl_subjects_new
                                                LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_subjects_new.course_id
                                                LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_subjects_new.year_id
                                                LEFT JOIN tbl_semesters ON tbl_semesters.sem_id = tbl_subjects_new.sem_id
                                                LEFT JOIN tbl_effective_acadyear EAY ON EAY.eay_id = tbl_subjects_new.eay_id
                                                WHERE tbl_subjects_new.course_id IN ('$course') AND tbl_subjects_new.eay_id = '$eay_c' ORDER BY tbl_year_levels.year_level ASC, subj_id") or die($db->error);

                                    ?>

                                    <tr>
                                        <?php
                                            while ($row = mysqli_fetch_array($listsubject)) {
                                                $id = $row['subj_id'];
                                            ?>
                                        <td></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['subj_code'] ?>
                                        </td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['subj_desc']; ?></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['unit_lec']; ?></td>
                                        <td class="text-sm font-weight-normal"><?php echo $row['prereq']; ?></td>
                                        <td class="text-sm font-weight-normal"><?php echo $row['course']; ?></td>
                                        <td class="text-sm font-weight-normal"><?php echo $row['eay']; ?></td>
                                        <td class="text-sm font-weight-normal"><?php echo $row['year_level']; ?>
                                        </td>
                                        <td class="text-sm font-weight-normal"><?php echo $row['semester']; ?>
                                        </td>
                                        <td class="text-sm font-weight-normal">
                                            <a class="btn bg-gradient-primary text-xs"
                                                href="edit.subject.php?subj_id=<?php echo $id; ?>"><i
                                                    class="text-xs fas fa-edit"></i> Edit</a>

                                            <a class="btn btn-block bg-gradient-danger mb-3 text-xs disabled"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modal-notification<?php echo $id; ?>"><i
                                                    class="text-xs fas fa-trash-alt"></i> Delete</a>


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
                                                                    Delete Account!</h4>
                                                                <p>Are you sure you want to delete
                                                                    <br>
                                                                    <i><b><?php echo $row['subj_desc']; ?></b></i>?
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="userData/ctrl.del.subject.php?subj_id=<?php echo $id; ?>"
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
                                    <?php }
                                        } else {
                                        } ?>
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