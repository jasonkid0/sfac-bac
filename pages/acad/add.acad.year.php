<?php
session_start();
include '../../includes/head.php';
include '../../includes/session.php';

?>
<title>
    Add New Academic Year | SFAC - Bacoor
</title>
</head>


<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">Add New Academic Year</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->


        <div class="container-fluid py-4">
            <div class="row mb-10">
                <div class="col-lg-9 col-12 mx-auto">
                    <div class="card card-body mt-4 shadow-sm">
                        <h6 class="mb-0">Add Academic Year</h6>
                        <p class="text-sm mb-0">Please fill out the field</p>
                        <hr class="horizontal dark my-3">
                        <form method="POST" enctype="multipart/form-data" action="acadData/ctrl.add.acad.year.php">
                            <!--single form panel-->
                            <div class="row">
                                <div class="col-12 mt-3 mt-sm-0">
                                    <label>Academic Year</label>
                                    <input class="form-control" type="text" placeholder="Academic Year: 0000-0000"
                                        name="academic_year" required />
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mt-4">
                                <button type="submit" name="submit"
                                    class="btn bg-gradient-dark text-white m-0 ms-2">Add</button>
                            </div>
                        </form>
                        <!-- <form method="POST" action="depData/ctrl.add.department.php">
                                    <label for="projectName" class="form-label">Department Name</label>
                                    <input name="department" type="text" class="form-control"
                                        placeholder="Enter department name" required>
                                    <div class="d-flex justify-content-end mt-4">
                                        <button type="submit" name="submit"
                                            class="btn bg-gradient-primary text-white m-0 ms-2">Add Department</button>
                                    </div>
                                </form> -->
                    </div>
                </div>
            </div>
            <br>
            <?php include '../../includes/footer.php'; ?>
            <!-- End footer -->
            </form>
        </div>
    </main>
    <!--   Core JS Files   -->
    <?php include '../../includes/scripts.php'; ?>
</body>

</html>