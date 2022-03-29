</nav>
<div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
    <div class="ms-md-auto pe-md-3 d-flex align-items-center">

    </div>
    <ul class="navbar-nav  justify-content-end">

        <li class="nav-item d-xl-none mx-2 ps-3 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                </div>
            </a>
        </li>
        <!-- Notification -->
        <?php if ($_SESSION['role'] == "Adviser" || $_SESSION['role'] == "Registrar") {
            echo '<li class="nav-item dropdown pe-2 d-flex align-items-center mx-2">
            <a href="javascript:;" class="position-relative nav-link text-body p-0 drop-toggle" id="dropdownMenuButton"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer text-secondary"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger count">
                    <span class="visually-hidden">unread messages</span>
                </span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4 notif" aria-labelledby="dropdownMenuButton">
            </ul>
        </li>';
        } ?>

        <li class="nav-item dropdown pe-2 d-flex align-items-center mx-2">
            <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="fas fa-caret-down text-secondary"></i>
            </a>
            <ul class="dropdown-menu  dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-0">

                    <div class="card card-background dropdown-item text-">
                        <div class="full-background cursor-pointer top-0"
                            style="background-image: url('../../assets/img/curved-images/curved2.jpg');"></div>
                        <div class="col-lg-12 col-md-6 w-100">
                            <div class="card-body p-3">
                                <div class="d-flex">

                                    <?php
                                    if ($_SESSION['role'] == "Super Administrator") {
                                        $getImg = mysqli_query($db, "SELECT * FROM tbl_super_admins WHERE sa_id = '$sa_id'");
                                        while ($row = mysqli_fetch_array($getImg)) {
                                            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" class="avatar avatar-xl border-radius-md">
                                                    <div class="ms-3 my-auto">
                                                <h6 class="text-white mb-0">' . $row['username'] . '</h6>
                                                <p class="text-xs text-white">Username</p>
                                            </div>
                                        </div>';
                                            if (!empty($row['email'])) {
                                                echo '<p class="text-sm mt-3 text-center">' . $row['email'] . '</p>';
                                            } else {
                                                echo '<p class="text-sm mt-3 text-center">Hi! Welcome to SFAC</p>';
                                            }
                                        }
                                    } elseif ($_SESSION['role'] == "Dean") {
                                        $getImg = mysqli_query($db, "SELECT * FROM tbl_deans WHERE dean_id = '$dean_id'");
                                        while ($row = mysqli_fetch_array($getImg)) {
                                            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" class="avatar avatar-xl border-radius-md">
                                                    <div class="ms-3 my-auto">
                                                <h6 class="text-white mb-0">' . $row['username'] . '</h6>
                                                <p class="text-xs text-white">Username</p>
                                            </div>
                                        </div>';
                                            if (!empty($row['email'])) {
                                                echo '<p class="text-sm mt-3 text-center">' . $row['email'] . '</p>';
                                            } else {
                                                echo '<p class="text-sm mt-3 text-center">Hi! Welcome to SFAC</p>';
                                            }
                                        }
                                    } elseif ($_SESSION['role'] == "Admission") {
                                        $getImg = mysqli_query($db, "SELECT * FROM tbl_admissions WHERE admission_id = '$admission_id'");
                                        while ($row = mysqli_fetch_array($getImg)) {
                                            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" class="avatar avatar-xl border-radius-md">
                                                    <div class="ms-3 my-auto">
                                                <h6 class="text-white mb-0">' . $row['username'] . '</h6>
                                                <p class="text-xs text-white">Username</p>
                                            </div>
                                        </div>';
                                            if (!empty($row['email'])) {
                                                echo '<p class="text-sm mt-3 text-center">' . $row['email'] . '</p>';
                                            } else {
                                                echo '<p class="text-sm mt-3 text-center">Hi! Welcome to SFAC</p>';
                                            }
                                        }
                                    } elseif ($_SESSION['role'] == "President") {
                                        $getImg = mysqli_query($db, "SELECT * FROM tbl_presidents WHERE pres_id = '$pres_id'");
                                        while ($row = mysqli_fetch_array($getImg)) {
                                            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" class="avatar avatar-xl border-radius-md">
                                                    <div class="ms-3 my-auto">
                                                <h6 class="text-white mb-0">' . $row['username'] . '</h6>
                                                <p class="text-xs text-white">Username</p>
                                            </div>
                                        </div>';
                                            if (!empty($row['email'])) {
                                                echo '<p class="text-sm mt-3 text-center">' . $row['email'] . '</p>';
                                            } else {
                                                echo '<p class="text-sm mt-3 text-center">Hi! Welcome to SFAC</p>';
                                            }
                                        }
                                    } elseif ($_SESSION['role'] == "Accounting") {
                                        $getImg = mysqli_query($db, "SELECT * FROM tbl_accounting WHERE account_id = '$account_id'");
                                        while ($row = mysqli_fetch_array($getImg)) {
                                            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" class="avatar avatar-xl border-radius-md">
                                                    <div class="ms-3 my-auto">
                                                <h6 class="text-white mb-0">' . $row['username'] . '</h6>
                                                <p class="text-xs text-white">Username</p>
                                            </div>
                                        </div>';
                                            if (!empty($row['email'])) {
                                                echo '<p class="text-sm mt-3 text-center">' . $row['email'] . '</p>';
                                            } else {
                                                echo '<p class="text-sm mt-3 text-center">Hi! Welcome to SFAC</p>';
                                            }
                                        }
                                    } elseif ($_SESSION['role'] == "Registrar") {
                                        $getImg = mysqli_query($db, "SELECT * FROM tbl_admins WHERE admin_id = '$admin_id'");
                                        while ($row = mysqli_fetch_array($getImg)) {
                                            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" class="avatar avatar-xl border-radius-md">
                                                    <div class="ms-3 my-auto">
                                                <h6 class="text-white mb-0">' . $row['username'] . '</h6>
                                                <p class="text-xs text-white">Username</p>
                                            </div>
                                        </div>';
                                            if (!empty($row['email'])) {
                                                echo '<p class="text-sm mt-3 text-center">' . $row['email'] . '</p>';
                                            } else {
                                                echo '<p class="text-sm mt-3 text-center">Hi! Welcome to SFAC</p>';
                                            }
                                        }
                                    } elseif ($_SESSION['role'] == "Student") {
                                        $getImg = mysqli_query($db, "SELECT * FROM tbl_students WHERE stud_id = '$stud_id'");
                                        while ($row = mysqli_fetch_array($getImg)) {
                                            if (!empty(base64_encode($row['img']))) {
                                                echo '<img src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" class="avatar avatar-xl border-radius-md">
                                                    <div class="ms-3 my-auto">
                                                <h6 class="text-white mb-0">' . $row['username'] . '</h6>
                                                <p class="text-xs text-white">Username</p>
                                            </div>
                                        </div>';
                                            } else {
                                                echo '<img src="../../assets/img/illustrations/user_prof.jpg" class="avatar avatar-xl border-radius-md">
                                                        <div class="ms-3 my-auto">
                                                    <h6 class="text-white mb-0">' . $row['username'] . '</h6>
                                                    <p class="text-xs text-white">Username</p>
                                                </div>
                                            </div>';
                                            }

                                            if (!empty($row['email'])) {
                                                echo '<p class="text-sm mt-3 text-center">' . $row['email'] . '</p>';
                                            } else {
                                                echo '<p class="text-sm mt-3 text-center">Hi! Welcome to SFAC</p>';
                                            }
                                        }
                                    } elseif ($_SESSION['role'] == "Adviser") {
                                        $getImg = mysqli_query($db, "SELECT * FROM tbl_faculties WHERE faculty_id = '$faculty_id'");
                                        while ($row = mysqli_fetch_array($getImg)) {
                                            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" class="avatar avatar-xl border-radius-md">
                                                    <div class="ms-3 my-auto">
                                                <h6 class="text-white mb-0">' . $row['username'] . '</h6>
                                                <p class="text-xs text-white">Username</p>
                                            </div>
                                        </div>';
                                            if (!empty($row['email'])) {
                                                echo '<p class="text-sm mt-3 text-center">' . $row['email'] . '</p>';
                                            } else {
                                                echo '<p class="text-sm mt-3 text-center">Hi! Welcome to SFAC</p>';
                                            }
                                        }
                                    } elseif ($_SESSION['role'] == "Teacher") {
                                        $getImg = mysqli_query($db, "SELECT * FROM tbl_faculties_staff WHERE faculty_id = '$faculty_id'");
                                        while ($row = mysqli_fetch_array($getImg)) {
                                            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" class="avatar avatar-xl border-radius-md">
                                                    <div class="ms-3 my-auto">
                                                <h6 class="text-white mb-0">' . $row['username'] . '</h6>
                                                <p class="text-xs text-white">Username</p>
                                            </div>
                                        </div>';
                                            if (!empty($row['email'])) {
                                                echo '<p class="text-sm mt-3 text-center">' . $row['email'] . '</p>';
                                            } else {
                                                echo '<p class="text-sm mt-3 text-center">Hi! Welcome to SFAC</p>';
                                            }
                                        }
                                    } ?>


                                    </p>
                                    <hr class="horizontal dark">
                                    <div class="row justify-content-center">
                                        <!-- <div class="col-6">
                                                <h6 class="text-sm mb-0">3</h6>
                                                <p class="text-secondary text-sm font-weight-bold mb-0">Participants
                                                </p>
                                            </div> -->
                                        <div class="col-12  text-center">
                                            <a href="../login/userData/ctrl.logout.php"
                                                class="btn btn-outline-white mb-0">Sign out</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </li>


            </ul>
        </li>
    </ul>
</div>
</div>
</nav>
<!-- End Navbar -->