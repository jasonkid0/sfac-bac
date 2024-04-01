<?php
session_start();
require '../../includes/conn.php';
include '../../includes/head.php';
include '../../includes/session.php';

$_SESSION['stud_id'] = $stud_id;
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
            <div class="col-lg-11 mt-lg-0 mt-4 mx-auto mb-5">
                <!-- Card Profile -->
                <div class="card card-body" id="profile">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-sm-auto col-4">
                            <div class="avatar avatar-xl position-relative">
                                <?php
                                $getStudData = mysqli_query($db, "SELECT *, CONCAT(stud.firstname, ' ', stud.middlename, ' ', stud.lastname) AS fullname
                                        FROM tbl_students AS stud
                                        WHERE stud_id = '$stud_id'");
                                while ($row = mysqli_fetch_array($getStudData)) {
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
                                    <?php if (empty($row['firstname']) || empty($row['middlename']) || empty($row['lastname'])) {
                                        echo $row['stud_no'];
                                    } else {
                                        echo $row['fullname'];
                                    } ?>
                                </h5>
                                <p class="mb-0 font-weight-bold text-sm">
                                    Student
                                </p>
                            </div>
                        </div>
                        <form method="POST" enctype="multipart/form-data" action="userData/ctrl.edit.account.php"
                            class="col-sm-auto ms-lg-auto mt-sm-0 ms-sm-0 mt-3 justify-content-sm-center">

                            <button class="btn btn-outline-primary me-2 mb-0"><input type="file" name="image"></button>
                            <button type="submit" name="saveImg" class="btn bg-gradient-primary mb-0">Save</button>

                        </form>
                    </div>
                </div>
                <!-- Card Account Details -->
                <form method="POST" enctype="multipart/form-data" action="userData/ctrl.edit.account.php"
                    class="card mt-4" id="account_details">
                    <div class="card-header">
                        <h5>Account Details</h5>
                    </div>

                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-sm-4">
                                <label class="form-label mt-3">Lastname</label>
                                <div class="input-group">
                                    <input id="lastname" name="lname" class="form-control" type="text"
                                        placeholder="Lastname" value="<?php echo $row['lastname']; ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-label mt-3">Firstname</label>
                                <div class="input-group">
                                    <input id="firstname" name="fname" class="form-control" type="text"
                                        placeholder="Firstname" value="<?php echo $row['firstname']; ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-label mt-3">Middlename</label>
                                <div class="input-group">
                                    <input id="middlename" name="mname" class="form-control" type="text"
                                        placeholder="Middlename" value="<?php echo $row['middlename']; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-8">
                                <label class="form-label mt-3">Email</label>
                                <div class="input-group">
                                    <input id="email" name="email" class="form-control" type="text" placeholder="Email"
                                        value="<?php echo $row['email']; ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-label mt-3">Username</label>
                                <div class="input-group">
                                    <input id="username" required name="username" class="form-control"
                                        placeholder="Username" type="text" value="<?php echo $row['username']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 button-row d-flex mt-4">
                            <button type="submit" name="save" class="btn bg-gradient-primary ms-auto">Save</button>
                        </div>
                    </div>
                </form>
                <?php }
            ?>

                <!-- card change password -->
                <form method="POST" enctype="multipart/form-data" action="userData/ctrl.edit.account.php"
                    class="card mt-4" id="account_details">
                    <div class="card-header">
                        <h5>Change Password</h5>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">

                            <label class="form-label mt-3">Current Password</label>
                            <div class="input-group">
                                <input id="old_password" required name="oldPass" class="form-control" type="password"
                                    placeholder="Current password">
                            </div>

                            <label class="form-label mt-3">New Password</label>
                            <div class="input-group">
                                <input id="password" required name="password" class="form-control"
                                    placeholder="New password" type="password">
                            </div>

                            <label class="form-label mt-3">Confirm New Password </label>
                            <div class="input-group">
                                <input id="confirm_password" required name="confirmPass" class="form-control"
                                    placeholder="Confirm password" type="password">
                            </div>
                        </div>

                        <div class="col-12 button-row d-flex mt-4">
                            <button type="submit" name="savePass" class="btn bg-gradient-primary ms-auto">Save</button>
                        </div>
                    </div>
                </form>



            </div>
            <?php include '../../includes/footer.php'; ?>
            <!-- End footer -->
        </div>

    </main>
    <!--   Core JS Files   -->
    <?php include '../../includes/scripts.php'; ?>
</body>

</html>