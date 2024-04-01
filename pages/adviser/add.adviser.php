<?php
session_start();
include '../../includes/head.php';
include '../../includes/session.php';
?>
<title>
    Add Adviser | SFAC - Bacoor
</title>
</head>

<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">Add Enrollment Adviser</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h3>Input the adviser information</h3>
                        <h5 class="text-secondary font-weight-normal">Please fill out the fields</h5>
                    </div>
                    <div class="multisteps-form mb-5">
                        <!--progress bar-->
                        <div class="row">
                            <div class="col-12 col-lg-8 mx-auto my-5">
                                <div class="multisteps-form__progress">
                                    <button class="multisteps-form__progress-btn js-active" type="button"
                                        title="User Info">
                                        <span>User Info</span>
                                    </button>
                                    <button class="multisteps-form__progress-btn" type="button"
                                        title="User Accounts">User Account</button>
                                    <!-- <button class="multisteps-form__progress-btn" type="button"
                                                title="Socials">Socials</button> -->
                                    <button class="multisteps-form__progress-btn" type="button"
                                        title="Profile">Profile</button>
                                </div>
                            </div>
                        </div>
                        <!--form panels-->
                        <div class="row">
                            <div class="col-12 col-lg-8 m-auto">
                                <form class="multisteps-form__form mb-8" method="POST" enctype="multipart/form-data"
                                    action="userData/ctrl.add.adviser.php">
                                    <!--single form panel-->
                                    <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active"
                                        data-animation="FadeIn">
                                        <h5 class="font-weight-bolder mb-0">Add Enrollment Adviser</h5>
                                        <p class="mb-0 text-sm">Personal Data</p>
                                        <div class="multisteps-form__content">


                                            <div class="row mt-3 justify-content-center">
                                                <div class="col-12 col-sm-4 mt-3 mt-sm-0">
                                                    <label>Last Name</label>
                                                    <input class="multisteps-form__input form-control" type="text"
                                                        placeholder="Lastname" name="lname" />
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                    <label>First Name</label>
                                                    <input class="multisteps-form__input form-control" type="text"
                                                        placeholder="Firstname" name="fname" />
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                    <label>Middlename</label>
                                                    <input class="multisteps-form__input form-control" type="text"
                                                        placeholder="Middlename" name="mname" />
                                                </div>
                                            </div>


                                            <div class="row mt-3 justify-content-center">
                                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                    <label>Email Address</label>
                                                    <input class="multisteps-form__input form-control" type="email"
                                                        placeholder="example@gmail.com" name="email" />
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <label>Faculty Number</label>
                                                    <input class="multisteps-form__input form-control" type="text"
                                                        placeholder="Enter a faculty number" name="faculty_no" />
                                                </div>
                                            </div>


                                            <div class="row mt-3 justify-content-center">
                                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                    <label>Department</label>
                                                    <select class="form-control" name="department" id="dep">
                                                        <option selected disabled value="">Select Department
                                                        </option>
                                                        <?php $getDepartment = mysqli_query($db, "SELECT * FROM tbl_departments");
                                                        while ($row1 = mysqli_fetch_array($getDepartment)) {
                                                            echo '<option value="' . $row1['department_id'] . '">
                                                ' . $row1['department_name'] . '
                                            </option>';
                                                        } ?>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <label>Role</label>
                                                    <input class="multisteps-form__input form-control" type="text"
                                                        placeholder="Enter a role" name="role" />
                                                </div>
                                            </div>


                                            <div class="row mt-3 justify-content-center">
                                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                    <label>Position</label>
                                                    <input class="multisteps-form__input form-control" type="text"
                                                        placeholder="Enter position" name="position" />
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <label>Employment Status</label>
                                                    <select class="form-control" name="status" id="status">
                                                        <option value="" disabled selected>Select Employment
                                                            Status
                                                        </option>
                                                        <option value="Full-time">Full-time</option>
                                                        <option value="Part-time">Part-time</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="button-row d-flex mt-4">
                                                <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next"
                                                    type="button" title="Next">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!--single form panel-->
                                    <div class="card multisteps-form__panel p-3 border-radius-xl bg-white"
                                        data-animation="FadeIn">
                                        <h5 class="font-weight-bolder">Account Details</h5>
                                        <div class="multisteps-form__content">
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <label>Username</label>
                                                    <input class="multisteps-form__input form-control" type="text"
                                                        placeholder="Username" name="username" />
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <label>Password</label>
                                                    <input class="multisteps-form__input form-control" type="password"
                                                        placeholder="Password" name="password" />
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <label>Confirm Password</label>
                                                    <input class="multisteps-form__input form-control" type="password"
                                                        placeholder="Password" name="confirmPass" />
                                                </div>
                                            </div>
                                            <div class="button-row d-flex mt-4">
                                                <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button"
                                                    title="Prev">Prev</button>
                                                <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next"
                                                    type="button" title="Next">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!--single form panel-->
                                    <!-- <div class="card multisteps-form__panel p-3 border-radius-xl bg-white"
                                                data-animation="FadeIn">
                                                <h5 class="font-weight-bolder">Socials</h5>
                                                <div class="multisteps-form__content">
                                                    <div class="row mt-3">
                                                        <div class="col-12">
                                                            <label>Twitter Handle</label>
                                                            <input class="multisteps-form__input form-control"
                                                                type="text" placeholder="@soft" />
                                                        </div>
                                                        <div class="col-12 mt-3">
                                                            <label>Facebook Account</label>
                                                            <input class="multisteps-form__input form-control"
                                                                type="text" placeholder="https://..." />
                                                        </div>
                                                        <div class="col-12 mt-3">
                                                            <label>Instagram Account</label>
                                                            <input class="multisteps-form__input form-control"
                                                                type="text" placeholder="https://..." />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="button-row d-flex mt-4 col-12">
                                                            <button class="btn bg-gradient-light mb-0 js-btn-prev"
                                                                type="button" title="Prev">Prev</button>
                                                            <button
                                                                class="btn bg-gradient-dark ms-auto mb-0 js-btn-next"
                                                                type="button" title="Next">Next</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                    <!--single form panel-->
                                    <div class="card multisteps-form__panel p-3 border-radius-xl bg-white h-100"
                                        data-animation="FadeIn">
                                        <h5 class="font-weight-bolder">Profile</h5>
                                        <div class="multisteps-form__content mt-1">
                                            <div class="row">
                                                <div class="col-12 mb-1">
                                                    <label>Profile Picture</label>
                                                    <input class="form-control dropzone" type="file" name="image"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="button-row d-flex mt-7">
                                                <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button"
                                                    title="Prev">Prev</button>
                                                <button class="btn bg-gradient-dark ms-auto mb-0" type="submit"
                                                    title="Send" name="submit">Add
                                                    Adviser</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
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