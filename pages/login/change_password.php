<!--
=========================================================
* Soft UI Dashboard - v1.0.3
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<?php
session_start();
if (!empty($_SESSION['role'])) {
    header("location: ../dashboard/index.php");
}
if (!isset($_SESSION['username']) && !isset($_SESSION['code'])) {
    header('location: reset_password.php');
} elseif (!isset($_SESSION['code'])) {
    header('location: verification.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../../assets/img/logos/logo.png">
    <title>
        Change Password | Saint Francis of Assisi College - Bacoor
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../../assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
    <style>
    .form-control:focus {
        border-color: #e08994 !important;
        box-shadow: 0 0 0 2px #ea7381 !important;
    }

    .myhover:hover {
        color: #d36148 !important;
    }

    .myhover {
        color: #5eabcb !important;
    }

    .form-switch {
        padding-left: unset !important;
    }

    .form-control:focus {
        border-color: #e08994 !important;
        box-shadow: 0 0 0 1px #ea7381 !important;
    }
    </style>
</head>

<body class="bg-gray-200">
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <!-- Navbar -->
                <nav
                    class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                    <div class="container-fluid">
                        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="sign-in.php">
                            SFAC BACOOR
                        </a>
                        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon mt-2">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </span>
                        </button>
                        <div class="collapse navbar-collapse" id="navigation">
                            <ul class="navbar-nav mx-auto">
                                <!-- <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center me-2 active" aria-current="page"
                                        href="../pages/dashboard.html">
                                        <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>
                                        Dashboard
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link me-2" href="../pages/profile.html">
                                        <i class="fa fa-user opacity-6 text-dark me-1"></i>
                                        Profile
                                    </a>
                                </li> -->

                                <li class="nav-item">
                                    <a class="nav-link me-2" href="sign-in.php">
                                        <i class="fas fa-key opacity-6 text-dark me-1"></i>
                                        Sign In
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link me-2" href="../inquiry/online.inquiry.php">
                                        <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                                        Online Inquiry
                                    </a>
                                </li> -->
                            </ul>
                            <ul class="navbar-nav d-lg-block d-none">
                                <li class="nav-item">
                                    <a href="#" class="btn btn-sm btn-round mb-0 me-1 text-white font-weight-bold"
                                        style="background-color: #d62121 !important;">Home</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
        </div>
    </div>

    <main class="main-content  mt-0 mb-4">
        <div class="page-header min-vh-100">
            <span class="mask bg-gray-200 opacity-6"></span>
            <div class="container">
                <div class="row gx-4 mt-8 mt-sm-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header p-3 pb-0 mb-1">
                                <h6 class="mb-1">Change password</h6>
                                <?php if (isset($_SESSION['not_match'])) {
                                    echo '  <div class="alert alert-dismissible fade show text-white" role="alert"
                                    style="background-color: #f74567">
                                    <span class="alert-icon text-sm"><i class="fas fa-exclamation-triangle"></i>&nbsp;
                                        Password does not match!</span>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>';
                                    unset($_SESSION['not_match']);
                                } ?>
                                <p class="text-sm mb-0">
                                    Hey <?php echo $_SESSION['username']; ?>, Please enter your new password.
                                </p>
                            </div>
                            <form method="POST" action="userData/ctrl.change_password.php">
                                <div class="card-body p-3">
                                    <label class="form-label">New password</label>
                                    <div class="form-group">
                                        <input name="password" class="form-control" type="password" required
                                            placeholder="New password">
                                    </div>
                                    <label class="form-label">Confirm new password</label>
                                    <div class="form-group">
                                        <input name="con_password" class="form-control" type="password" required
                                            placeholder="Confirm password">
                                    </div>
                                    <button type="submit" name="submit" class="btn bg-gradient-dark w-100 mb-0">Update
                                        password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 mt-md-0 mt-4 mb-sm-4">
                        <div class="card">
                            <div class="card-header p-3 pb-0">
                                <h6 class="mb-1">
                                    Password requirements
                                </h6>
                                <p class="text-sm mb-0">
                                    Please follow this guide for a strong password:
                                </p>
                            </div>
                            <div class="card-body p-3">
                                <ul class="text-muted ps-4 mb-0">
                                    <li>
                                        <span class="text-sm">One special characters</span>
                                    </li>
                                    <li>
                                        <span class="text-sm">Min 6 characters</span>
                                    </li>
                                    <li>
                                        <span class="text-sm">One number (2 are recommended)</span>
                                    </li>
                                    <li>
                                        <span class="text-sm">Change it often</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
    <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    <footer class="footer pt-3">
        <div class="container-fluid">
            <div class="row my-0">
                <div class="col-lg-8 mb-4 mx-auto my-0 text-center">
                    <a href="https://web.facebook.com/mysfaclp" target="_blank" class="text-secondary me-xl-4 me-4">
                        <span class="text-lg fab fa-facebook"></span> SFAC - Bacoor
                    </a>
                    <a href="https://stfrancis.edu.ph/sfac-las-pinas" target="_blank"
                        class="text-secondary me-xl-4 me-4">
                        <span class="text-lg fas fa-globe"></span> stfrancis.edu.ph
                    </a>

                </div>
            </div>
            <div class="row my-0">
                <div class="col-8 mx-auto my-0 text-center mt-0">
                    <p class="text-secondary me-xl-4 me-4">
                        Copyright © <script>
                        document.write(new Date().getFullYear())
                        </script> CompStud.
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    <!--   Core JS Files   -->
    <script src="../../assets/js/core/popper.min.js"></script>
    <script src="../../assets/js/core/bootstrap.min.js"></script>
    <script src="../../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../../assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
</body>

</html>