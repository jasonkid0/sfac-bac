<?php
session_start();
require '../../includes/conn.php';
include '../../includes/head.php';
include '../../includes/session.php';
if ($_SESSION['role'] == "Super Administrator" || $_SESSION['role'] == "Adviser") {
    if (!empty($_GET['facultyStaff_id'])) {
        $facultyStaff_id = $_GET['facultyStaff_id'];
    } else {
        header("location: ../error/error-404.php");
    }
}

$_SESSION['facultyStaff_id'] = $facultyStaff_id;
?>


<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">Edit Account</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->


        <div class="container-fluid py-4">
            <div class="col-lg-11 mt-lg-0 mt-4 mx-auto">
                <!-- Card Profile -->
                <div class="card card-body" id="profile">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-sm-auto col-4">
                            <div class="avatar avatar-xl position-relative">
                                <?php
                                $getUserData = mysqli_query($db, "SELECT *, CONCAT(tbl_faculties_staff.faculty_firstname, ' ', tbl_faculties_staff.faculty_middlename, ' ', tbl_faculties_staff.faculty_lastname) AS fullname FROM tbl_faculties_staff WHERE faculty_id = '$facultyStaff_id'");
                                while ($row = mysqli_fetch_array($getUserData)) {
                                    if (!empty($row['img'])) {
                                        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" alt="bruce"
                                                class="border-radius-lg shadow-sm" style="height: 80px; width: 80px;">';
                                    } else {
                                        echo '<img src="../../assets/img/illustrations/user_prof.jpg" alt="bruce"
                                            class="border-radius-lg shadow-sm">';
                                    }


                                ?>

                            </div>
                        </div>
                        <div class="col-sm-auto col-8 my-auto">
                            <div class="h-100">
                                <h5 class="mb-1 font-weight-bolder">
                                    <?php echo $row['fullname'];  ?>
                                </h5>
                                <p class="mb-0 font-weight-bold text-sm">
                                    Teacher
                                </p>
                            </div>
                        </div>
                        <form method="POST" enctype="multipart/form-data" action="userData/ctrl.edit.teacher.php"
                            class="col-sm-auto ms-lg-auto mt-sm-0 ms-sm-0 mt-3 justify-content-sm-center">

                            <button class="btn btn-outline-primary me-2 mb-0"><input type="file" name="image"></button>
                            <button type="submit" name="saveImg" class="btn bg-gradient-primary mb-0">Save</button>

                        </form>
                    </div>
                </div>
                <!-- Card Basic Info -->
                <form method="POST" enctype="multipart/form-data" action="userData/ctrl.edit.teacher.php"
                    class="card mt-4" id="basic-info">
                    <div class="card-header">
                        <h5>Basic Info</h5>
                    </div>


                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-sm-4">
                                <label class="form-label">Last Name</label>
                                <div class="input-group">
                                    <input id="lastName" name="lname" class="form-control" type="text"
                                        placeholder="Lastname"
                                        value="<?php echo $row['faculty_lastname'];
                                                                                                                                        ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-label">First Name</label>
                                <div class="input-group">
                                    <input id="firstName" name="fname" class="form-control" type="text"
                                        placeholder="Firstname"
                                        value="<?php echo $row['faculty_firstname'];
                                                                                                                                        ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-label">Middlename</label>
                                <div class="input-group">
                                    <input id="middlename" name="mname" class="form-control" type="text"
                                        placeholder="Middlename" value="<?php echo $row['faculty_middlename']; ?>">
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-sm-7">
                                <label class="form-label mt-4">Email</label>
                                <div class="input-group">
                                    <input id="email" name="email" class="form-control" type="email"
                                        placeholder="example@email.com"
                                        value="<?php echo $row['email'];
                                                                                                                                            ?>">
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <label class="form-label mt-4">Faculty Number</label>
                                <div class="input-group">
                                    <input id="Faculty Number" required name="faculty_no" class="form-control"
                                        type="text" placeholder="Enter a faculty number"
                                        value="<?php echo $row['faculty_no']; ?>">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-4">
                                <label class="form-label mt-4">Position</label>
                                <div class="input-group">
                                    <input id="Position" name="position" class="form-control" type="text"
                                        placeholder="Enter position" required value="<?php echo $row['position']; ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-label mt-4">Employment Status</label>
                                <select class="form-control" required name="status" id="status">

                                    <?php $getUserData = mysqli_query($db, "SELECT *, CONCAT(tbl_faculties_staff.faculty_firstname, ' ', tbl_faculties_staff.faculty_middlename, ' ', tbl_faculties_staff.faculty_lastname) AS fullname FROM tbl_faculties_staff WHERE faculty_id = '$facultyStaff_id'");
                                    while ($row3 = mysqli_fetch_array($getUserData)) {
                                        if ($row3['status'] == "Full-time") {
                                            echo '<option value="' . $row3['status'] . '" selected>' . $row3['status'] . '
                                            </option>
                                            <option value="Part-time">Part-time</option>';
                                        } elseif ($row3['status'] == "Part-time") {
                                            echo '<option value="' . $row3['status'] . '" selected>' . $row3['status'] . '
                                                    </option><option value="Full-time">Full-time</option>';
                                        }
                                    } ?>

                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-label mt-4">Username</label>
                                <div class="input-group">
                                    <input id="text" name="username" class="form-control" type="text"
                                        placeholder="Username"
                                        value="<?php echo $row['username'];
                                                                                                                                    ?>"
                                        required>
                                </div>
                            </div>
                        </div>


                        <?php } ?>
                        <div class="col-12 button-row d-flex mt-4">
                            <button type="submit" name="save" class="btn bg-gradient-primary ms-auto">Save</button>
                        </div>
                    </div>
                </form>

                <!-- Card Change Password -->
                <form class="card mt-4 mb-5" id="password" method="POST" action="userData/ctrl.edit.teacher.php">
                    <div class="card-header">
                        <h5>Change Password</h5>
                    </div>
                    <div class="card-body pt-0">
                        <?php if ($_SESSION['role'] == "Teacher") {
                            echo '<label class="form-label">Current password</label>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="oldPass"
                                        placeholder="Current password" required>
                                </div>';
                        } ?>

                        <label class="form-label">New password</label>
                        <div class="form-group">
                            <input class="form-control" type="password" name="password" placeholder="New password"
                                required>
                        </div>
                        <label class="form-label">Confirm new password</label>
                        <div class="form-group">
                            <input class="form-control" type="password" name="confirmPass"
                                placeholder="Confirm password" required>
                        </div>

                        <div class="col-12 button-row d-flex mt-4">
                            <button type="submit" name="savePass"
                                class="btn bg-gradient-primary ms-auto">Update</button>
                        </div>
                    </div>
                </form>

                <?php include '../../includes/footer.php'; ?>
                <!-- End footer -->
            </div>
    </main>
    <!--   Core JS Files   -->
    <?php include '../../includes/scripts.php'; ?>
</body>

</html>