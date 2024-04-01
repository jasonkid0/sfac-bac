<?php
session_start();
require '../../includes/conn.php';
include '../../includes/head.php';
include '../../includes/session.php';
if ($_SESSION['role'] == "Super Administrator") {
    $admission_id = $_GET['admission_id'];
}
$_SESSION['admission_id'] = $admission_id;

?>
<title>
    Edit Account | SFAC - Bacoor
</title>
</head>


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
                                $getUserData = mysqli_query($db, "SELECT *, CONCAT(tbl_admissions.admission_firstname, ' ', tbl_admissions.admission_middlename, ' ', tbl_admissions.admission_lastname) AS fullname FROM tbl_admissions WHERE admission_id = '$admission_id'");
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
                                    Admission
                                </p>
                            </div>
                        </div>
                        <form method="POST" enctype="multipart/form-data" action="userData/ctrl.edit.admission.php"
                            class="col-sm-auto ms-lg-auto mt-sm-0 ms-sm-0 mt-3 justify-content-sm-center">

                            <button class="btn btn-outline-primary me-2 mb-0"><input type="file" name="image"></button>
                            <button type="submit" name="saveImg" class="btn bg-gradient-primary mb-0">Save</button>

                        </form>
                    </div>
                </div>
                <!-- Card Basic Info -->
                <form method="POST" enctype="multipart/form-data" action="userData/ctrl.edit.admission.php"
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
                                        value="<?php echo $row['admission_lastname'];
                                                                                                                                        ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-label">First Name</label>
                                <div class="input-group">
                                    <input id="firstName" name="fname" class="form-control" type="text"
                                        placeholder="Firstname"
                                        value="<?php echo $row['admission_firstname'];
                                                                                                                                        ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-label">Middlename</label>
                                <div class="input-group">
                                    <input id="middlename" name="mname" class="form-control" type="text"
                                        placeholder="Middlename" value="<?php echo $row['admission_middlename']; ?>">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-8">
                                <label class="form-label mt-4">Email</label>
                                <div class="input-group">
                                    <input id="email" name="email" class="form-control" type="email"
                                        placeholder="example@email.com"
                                        value="<?php echo $row['email'];
                                                                                                                                            ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-label mt-4">Username</label>
                                <div class="input-group">
                                    <input id="text" name="username" class="form-control" type="text"
                                        placeholder="Username"
                                        value="<?php echo $row['username'];
                                                                                                                                } ?>"
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 button-row d-flex mt-4">
                            <button type="submit" name="save" class="btn bg-gradient-primary ms-auto">Save</button>
                        </div>
                    </div>
                </form>


                <!-- Card Change Password -->
                <form class="card mt-4 mb-5" id="password" method="POST" action="userData/ctrl.edit.admission.php">
                    <div class="card-header">
                        <h5>Change Password</h5>
                    </div>
                    <div class="card-body pt-0">
                        <?php if ($_SESSION['role'] == "Admission") {
                            echo '<label class="form-label">Current Password</label>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="oldPass"
                                        placeholder="Current password" required>
                                </div>';
                        } ?>

                        <label class="form-label">New Password</label>
                        <div class="form-group">
                            <input class="form-control" type="password" name="password" placeholder="New Password"
                                required>
                        </div>
                        <label class="form-label">Confirm New Password</label>
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
        </div>
    </main>
    <!--   Core JS Files   -->
    <?php include '../../includes/scripts.php'; ?>
</body>

</html>