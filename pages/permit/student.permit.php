<?php
session_start();
include '../../includes/head.php';
// include 'accountConn/conn.php';
include '../../includes/session.php';


?>
<title>
    Student Permit | SFAC - Bacoor
</title>
</head>

<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">Student Permit</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row mb-10">
                <div class="col-lg-8 col-12 mx-auto">
                    <div class="card card-body mt-4 shadow-sm">
                        <h5 class="font-weight-bolder mb-0">Search</h5>
                        <p class="text-sm mb-0">Input student's id number to begin assessment</p>
                        <hr class="horizontal dark my-3">
                        <form method="GET" enctype="multipart/form-data" action="../forms/data/permit.php">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Print for</label>
                                    <select class="form-control" name="print_for" id="semester">
                                        <option value="all">All
                                        </option>
                                        <?php $get_dept = mysqli_query($db, "SELECT * FROM tbl_departments");
                                        while ($row = mysqli_fetch_array($get_dept)) {
                                        ?>
                                        <option value="<?php echo $row['department_id']; ?>">
                                            <?php echo $row['department_name'];?>
                                        </option>
                                        <?php } ?>

                                        
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label>Term</label>
                                    <select class="form-control" name="term" id="academic_year">
                                        <option value="Prelim">Prelims
                                        </option>
                                        <option value="Midterm">Midterms
                                        </option>
                                        <option value="Final">Finals
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mt-4">
                                <button class="btn bg-gradient-dark text-white m-0 ms-2" type="submit" title="Send"
                                    name="submit">Create Permit</button>
                            </div>
                        </form>
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