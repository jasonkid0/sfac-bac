<?php
require '../../includes/conn.php';
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

    body {
        font-weight: 400;
        background: url(../../assets/img/curved-images/curved4.jpg), #8392ab !important;
        background-repeat: no-repeat !important;
        background-position-y: top !important;
        background-attachment: fixed !important;
        background-size: cover !important;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;

    }

    .bg-gradient-red-orange {
        background-image: linear-gradient(310deg, #d77700, #ab0808);
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        border-radius: 50px;
        background-image: linear-gradient(310deg, #1d2139, #39406d) !important;
        color: whitesmoke !important;
        padding: 6px 14px !important;
        border: none;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
        color: #8392ab !important;
        background-image: linear-gradient(310deg, #1d2139, #39406d) !important;
    }

    .badge-warning {
        background-color: #ce7e00 !important;
        color: bisque !important;
    }
    </style>