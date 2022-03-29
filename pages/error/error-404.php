<?php
session_start();
require '../../includes/conn.php';
include '../../includes/session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../../assets/img/logos/logo.png">

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="../../assets/js/plugins/fontawesome.js" crossorigin="anonymous"></script>
    <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../../assets/css/soft-ui-dashboard.min.css?v=1.0.4" rel="stylesheet" />
    <!-- datatables -->
    <link rel="stylesheet" href="../../assets/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../../assets/css/responsive.dataTables.min.css">
    <script src="../../assets/js/jquery-3.5.1.js"></script>
    <!-- edited CSS -->
    <link rel="stylesheet" href="../../assets/css/addons/edited.css">
    <style>
    ::-webkit-scrollbar {
        width: 0;
        background: transparent;
    }
    </style>

    <title>
        404 | SFAC - Las Piñas
    </title>
</head>


<body class="bg-gray-100 bg-white">
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">

        <!-- End Navbar -->

        <div class="container mt-7">
            <div class="row align-items-end">
                <div class="col-lg-6 my-auto">
                    <h1 class="display-1 text-bolder text-danger">Error 404
                    </h1>
                    <h2>Page not found</h2>
                    <p class="lead">We suggest you to go to the Dashboard while we solve
                        this issue.
                    </p>
                    <a href="../dashboard/index.php" class="btn bg-gradient-dark mt-4">Go to
                        Dashboard</a>
                </div>
                <div class="col-lg-6 my-auto position-relative">
                    <img class="w-100 position-relative" src="../../assets/img/illustrations/error-404.png"
                        alt="404-error">
                </div>
            </div>
        </div>

        <!-- End footer -->
        </div>
    </main>


</body>

</html>