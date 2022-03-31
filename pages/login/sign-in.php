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
unset($_SESSION['username']);
unset($_SESSION['code']);
unset($_SESSION['email']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../../assets/img/logos/logo.png">
    <title>
        Sign In | SFAC-BACOOR
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

<body class="">
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <!-- Navbar -->
                <nav
                    class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                    <div class="container-fluid">
                        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="sign-in.php">
                            SFAC-BACOOR
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
                                <li class="nav-item">
                                    <a class="nav-link me-2" href="../inquiry/online.inquiry.php">
                                        <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                                        Online Inquiry
                                    </a>
                                </li>
                            </ul>
                            <ul class="navbar-nav d-lg-block d-none">
                                <li class="nav-item">
                                    <a href="https://stfrancisbacoor.com"
                                        class="btn btn-sm btn-round mb-0 me-1 text-white font-weight-bold"
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
    <main class="main-content mt-0">
        <section>
            <div class="page-header min-vh-75">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto" style="z-index: 2">
                            <div class="card card-plain mt-8" style="background-color: rgba(255,255,255, 0.9);">
                                <div class="card-header pb-0 text-center bg-transparent">
                                    <h3 class="font-weight-bolder text-danger text-gradient">
                                        Welcome Franciscans!</h3>
                                    <p class="mb-0">Please login your...</p>
                                </div>

                                <?php if (isset($_SESSION['sessionP'])) {
                                    echo '<div class="alert alert-dismissible text-white mt-2 mb-0 " role="alert"
                                    style="background-color:#f74567;"><span class="alert-icon text-sm"><i
                                            class="fas fa-exclamation-triangle"> </i> The password you entered is
                                        incorrect.</span>
                                    <button type="button" class="btn-close text-lg py-3 opacity-10"
                                        data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>';
                                    unset($_SESSION['sessionP']);
                                } else if (isset($_SESSION['sessionUP'])) {
                                    echo '<div class="alert alert-dismissible text-white mt-2 mb-0 " role="alert"
                                    style="background-color:#f74567;"><span class="alert-icon text-sm"><i
                                            class="fas fa-exclamation-triangle"> </i> Invalid username and password.</span>
                                    <button type="button" class="btn-close text-lg py-3 opacity-10"
                                        data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>';
                                    unset($_SESSION['sessionUP']);
                                }

                                ?>
                                <div class="card-body">
                                    <form role="form" action="userData/ctrl.sign-in.php" method="POST">
                                        <label>Username</label>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" placeholder="Username"
                                                aria-label="Username" aria-describedby="username-addon" name="username">
                                        </div>
                                        <label>Password</label>
                                        <div class="mb-3">
                                            <input type="password" class="form-control" placeholder="Password"
                                                aria-label="Password" aria-describedby="password-addon" name="password">
                                        </div>
                                        <div class="form-check form-switch">
                                            <a href="reset_password.php" class="text-sm myhover">
                                                Did you forgot your password ?</a>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" name="signin"
                                                class="btn bg-gradient-danger w-100 mt-4 mb-0">Sign
                                                in</button>
                                        </div>
                                    </form>
                                </div><br>
                                <!-- <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-4 text-sm mx-auto">
                                        Don't have an account?
                                        <a href="javascript:;" class="text-info text-gradient font-weight-bold">Sign
                                            up</a>
                                    </p>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8"
                                style="z-index:1;">
                                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6"
                                    style="background-image:url('../../assets/img/curved-images/12.jpg'); background-position: 100% 100%; background-repeat: no-repeat;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    <footer class="footer pt-3" style="background-color: rgba(255,255,255, 0.9);">
        <div class="container-fluid">
            <div class="row my-0">
                <div class="col-lg-8 mb-4 mx-auto my-0 text-center">
                    <a href="https://web.facebook.com/mysfacbacoor" target="_blank" class="text-secondary me-xl-4 me-4">
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