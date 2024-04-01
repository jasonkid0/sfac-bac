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
require '../../includes/conn.php';
session_start();
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
    html {
        overflow: scroll;
        overflow-x: hidden;
    }

    body {
        font-weight: 400;
        background: url(../../assets/img/curved-images/curved4.jpg) !important;
        background-repeat: no-repeat !important;
        background-position-y: top !important;
        background-attachment: fixed !important;
        background-size: cover !important;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;

    }
    </style>
    <title>
        SFAC - Bacoor | Online Inquiry
    </title>
</head>

<body>
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <!-- Navbar -->
                <nav
                    class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                    <div class="container-fluid">
                        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="../dashboard/index.php">
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
                                    <a class="nav-link me-2" href="../dashboard/index.php">
                                        <i class="fas fa-key opacity-6 text-dark me-1"></i>
                                        Sign In
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link me-2" href="../inquiry/online.enrollment.php">
                                        <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                                        Online Enrollment
                                    </a>
                                </li>
                            </ul>
                            <ul class="navbar-nav d-lg-block d-none">
                                <li class="nav-item">
                                    <a href="https://stfrancisbacoor.com/" class="btn btn-sm btn-round mb-0 me-1 text-white font-weight-bold"
                                        style="background-color: #d62121 !important;">Home</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <!-- section -->
            <section class="min-vh-100">
                <div class="page-header align-items-start min-vh-50 pt-5 pb-1 m-3 border-radius-lg">

                    <div class="container p-0 px-lg-3">
                        <div class="row justify-content-center">
                            <div class="col-lg-5 text-center mx-auto">
                                <h1 class="text-dark mb-2 mt-5">Online Enrollment</h1>
                                <p class="text-lead text-dark">Please fill out the form.</p>
                            </div>
                        </div>
                        <div class="container-fluid p-0 px-lg-2">
                            <div class="col-lg-11 mt-lg-0 mt-4 mx-auto">
                                <form method="POST" enctype="multipart/form-data"
                                    action="inquiryData/ctrl.add.inquiry.php" class="card mt-4" id="basic-info">
                                    <div class="card-header text-center pb-0">
                                        <h5>Personal Data</h5>
                                    </div>
                                    <hr class="card-horizontal dark mt-0">
                                    <div class="card-body pt-0">
                                        <p class="text-dark text-sm font-weight-bold">Note: All fields are required!
                                        </p>
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <label class="form-label mt-4">Course</label>
                                                <select class="form-control" required name="courses" id="courses">
                                                    <option disabled selected value="">Select Course</option>
                                                    <?php $getCourse = mysqli_query($db, "SELECT * FROM tbl_courses ORDER BY course DESC");
                                                    while ($row = mysqli_fetch_array($getCourse)) {
                                                        echo '<option value="' . $row['course_id'] . '">' . $row['course'] . '</option>';
                                                    } ?>
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="form-label mt-4">Year</label>
                                                <select class="form-control" required name="years" id="year_lvl">
                                                    <option disabled selected value="">Select Year</option>
                                                    <?php $getYear = mysqli_query($db, "SELECT * FROM tbl_year_levels");
                                                    while ($row = mysqli_fetch_array($getYear)) {
                                                        echo '<option value="' . $row['year_id'] . '">' . $row['year_level'] . '</option>';
                                                    } ?>
                                                    </option>
                                                </select>
                                            </div>


                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="form-label mt-4">Last Name</label>
                                                <div class="input-group">
                                                    <input id="lastName" name="lastname" class="form-control"
                                                        type="text" placeholder="Lastname" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <label class="form-label mt-4">First Name</label>
                                                <div class="input-group">
                                                    <input id="firstName" name="firstname" class="form-control"
                                                        type="text" placeholder="Firstname" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <label class="form-label mt-4">Middlename</label>
                                                <div class="input-group">
                                                    <input id="middlename" name="middlename" class="form-control"
                                                        type="text">
                                                </div>
                                            </div>

                                        </div>


                                        <div class="row">

                                            <div class="col-sm-12">
                                                <label class="form-label mt-4">Address</label>
                                                <div class="input-group">
                                                    <input id="address" name="address" class="form-control"
                                                        type="address"
                                                        placeholder="House/Unit/Flr #, Bldg Name, Blk or Lot #, Barangay, City/Municipality, Province"
                                                        required>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label class="form-label mt-4">Gender</label>
                                                <select class="form-control" required name="gender" id="gender">
                                                    <option disabled selected>Select Gender</option>
                                                    <?php $getgender = mysqli_query($db, "SELECT * FROM tbl_genders");
                                                    while ($row = mysqli_fetch_array($getgender)) {
                                                    ?>
                                                    <option value="<?php echo $row['gender_id']; ?>">
                                                        <?php echo $row['gender'];
                                                    } ?>
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-sm-2">
                                                <label class="form-label mt-4">Age</label>
                                                <div class="input-group">
                                                    <input id="age" name="age" class="form-control" type="text"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="form-label mt-4">Date of Birth</label>
                                                <div class="input-group">
                                                    <input id="birthdate" name="birthdate" class="form-control"
                                                        type="date" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="form-label mt-4">Place of Birth</label>
                                                <div class="input-group">
                                                    <input id="birthplace" name="birthplace" class="form-control"
                                                        type="text" placeholder="City/Municipality, Province" required>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="form-label mt-4">Religion</label>
                                                <div class="input-group">
                                                    <input id="religion" name="religion" class="form-control"
                                                        type="text" placeholder="Religion" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="form-label mt-4">Citizenship</label>
                                                <div class="input-group">
                                                    <input id="citizenship" name="citizenship" class="form-control"
                                                        type="text" placeholder="Citizenship" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="form-label mt-4">Civil Status</label>
                                                <div class="input-group">
                                                    <input id="civilstatus" name="civilstatus" class="form-control"
                                                        type="text" placeholder="civilstatus">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="form-label mt-4">Contact Number</label>
                                                <div class="input-group">
                                                    <input id="contact" name="contact" class="form-control" type="text"
                                                        placeholder="Contact Number" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <label class="form-label mt-4">Email Address</label>
                                                <div class="input-group">
                                                    <input id="email" name="email" class="form-control" type="text"
                                                        placeholder="example@gmail.com" required>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label class="form-label mt-4">Last School Attended</label>
                                                <div class="input-group">
                                                    <input id="lastschool" name="lastschool" class="form-control" type="text"
                                                        placeholder="Last School Attended" required>
                                                </div>
                                            </div>
                                         </div>
                                         <div class="row">
                                            <div class="col-sm-6">
                                                <label class="form-label mt-4">Last School Level Attended</label>
                                                
                                                    <select class="form-control" required name="last_level" id="semester">
                                                        <option value="1">College Level</option>
                                                        <option value="2">Senior High School</option>
                                                    </select>
                                                
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="form-label mt-4">School Type</label>
                                                
                                                    <select class="form-control" required name="last_school_type" id="department">
                                                        <option value="Private">Private</option>
                                                        <option value="Public">Public</option>
                                                    </select>
                                                
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label class="form-label mt-4">How did you find us?</label>
                                                    <select class="form-control" required name="info" id="info">
                                                        <option disabled selected value="">How did you find us?</option>
                                                        <?php $getYear = mysqli_query($db, "SELECT * FROM tbl_information");
                                                        while ($row = mysqli_fetch_array($getYear)) {
                                                            echo '<option value="' . $row['info_id'] . '">' . $row['info_name'] . '</option>';
                                                        } ?>
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                         </div>
                                    </div>


                                    <!-- <hr class=" collapse-horizontal mb-0">

                            <div class="card-header text-center">
                                <h5>Family Background</h5>
                            </div> -->

                                    <!-- <div class="card-body pt-0">

                                <h5 class="font-weight-bold">Father</h5>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Last Name</label>
                                        <div class="input-group">
                                            <input id="flastname" name="flastname" class="form-control" type="text"
                                                placeholder="Lastname">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">First Name</label>
                                        <div class="input-group">
                                            <input id="ffirstname" name="ffirstname" class="form-control" type="text"
                                                placeholder="Firstname">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Middle Name</label>
                                        <div class="input-group">
                                            <input id="fmiddlename" name="fmiddlename" class="form-control" type="text"
                                                placeholder="Middlename">
                                        </div>
                                    </div>
                                </div>
                                <div class="row pt-2">
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Age</label>
                                        <div class="input-group">
                                            <input id="fage" name="fage" class="form-control" type="text"
                                                placeholder="Age">
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <label class="form-label mt-4">Occupation</label>
                                        <div class="input-group">
                                            <input id="foccupation" name="foccupation" class="form-control" type="text"
                                                placeholder="Father Occupation">
                                        </div>
                                    </div>

                                </div>


                                <h5 class="mt-4 font-weight-bold">Mother</h5>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Last Name</label>
                                        <div class="input-group">
                                            <input id="mlastname" name="mlastname" class="form-control" type="text"
                                                placeholder="Lastname">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">First Name</label>
                                        <div class="input-group">
                                            <input id="mfirstname" name="mfirstname" class="form-control" type="text"
                                                placeholder="Firstname">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Middle Name</label>
                                        <div class="input-group">
                                            <input id="mmiddlename" name="mmiddlename" class="form-control" type="text"
                                                placeholder="Middlename">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Age</label>
                                        <div class="input-group">
                                            <input id="mage" name="mage" class="form-control" type="text"
                                                placeholder="Age">
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <label class="form-label mt-4">Occupation</label>
                                        <div class="input-group">
                                            <input id="moccupation" name="moccupation" class="form-control" type="text"
                                                placeholder="Mother Occupation">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label class="form-label mt-4">Monthly Family Income</label>
                                        <div class="input-group">
                                            <input id="familyincome" name="familyincome" class="form-control"
                                                placeholder="Income" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="form-label mt-4">No. of Siblings</label>
                                        <div class="input-group">
                                            <input id="nosiblings" name="nosiblings" class="form-control" type="text">
                                        </div>
                                    </div>
                                </div>


                                <hr class="collapse-horizontal">

                                <h5 class="mt-4">Guardian</h5>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Last Name</label>
                                        <div class="input-group">
                                            <input id="glastname" name="glastname" class="form-control" type="text"
                                                placeholder="Lastname">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">First Name</label>
                                        <div class="input-group">
                                            <input id="gfirstname" name="gfirstname" class="form-control" type="text"
                                                placeholder="Firstname">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Middle Name</label>
                                        <div class="input-group">
                                            <input id="gmiddlename" name="gmiddlename" class="form-control" type="text"
                                                placeholder="Middlename">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Relationship</label>
                                        <div class="input-group">
                                            <input id="relationship" name="relationship" class="form-control"
                                                placeholder="Relationship" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <label class="form-label mt-4">Address</label>
                                        <div class="input-group">
                                            <input id="gaddress" name="gaddress" class="form-control" type="text"
                                                placeholder="House/Unit/Flr #, Bldg Name, Blk or Lot #, Barangay, City/Municipality, Province">
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                                    <!-- <hr class="collapse-horizontal mb-0">
                            <div class="card-header text-center">
                                <h5>Educational Background</h5>
                            </div> -->

                                    <!-- <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <label class="form-label mt-4">Elementary Graduated From</label>
                                        <div class="input-group">
                                            <input id="elem" name="elem" class="form-control" type="text"
                                                placeholder="Name of School">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">School Year</label>
                                        <div class="input-group">
                                            <input id="elemSY" name="elemSY" class="form-control" type="text"
                                                placeholder="0000-0000">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="form-label mt-4">Address of School</label>
                                        <div class="input-group">
                                            <input id="elemAddress" name="elemAddress" class="form-control" type="text"
                                                placeholder="Address of School">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <label class="form-label mt-4">High School Graduated From</label>
                                        <div class="input-group">
                                            <input id="hs" name="hs" class="form-control" type="text"
                                                placeholder="Name of School">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">School Year</label>
                                        <div class="input-group">
                                            <input id="hsSY" name="hsSY" class="form-control" type="text"
                                                placeholder="0000-0000">
                                        </div>
                                    </div>

                                </div>
                                <div class="row pt-2">
                                    <div class="col-sm-12">
                                        <label class="form-label mt-4">Address of School</label>
                                        <div class="input-group">
                                            <input id="hsAddress" name="hsAddress" class="form-control" type="text"
                                                placeholder="Address of School">
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="form-label mt-4">Last School Attended</label>
                                        <div class="input-group">
                                            <input id="lastschool" name="lastschool" class="form-control" type="text"
                                                placeholder="Last School Attended">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="form-label mt-4">Course & Year</label>
                                        <div class="input-group">
                                            <input id="course-year" name="course-year" class="form-control" type="text"
                                                placeholder="Course & Year">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="form-label mt-4">School Year</label>
                                        <div class="input-group">
                                            <input id="lastSY" name="lastSY" class="form-control" type="text"
                                                placeholder="0000-0000">
                                        </div>
                                    </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label class="form-label mt-4">Address of School</label>
                                            <div class="input-group">
                                                <input id="lastAddress" name="lastAddress" class="form-control" type="text"
                                                    placeholder="Address of School">
                                            </div>
                                        </div>
                                </div>
                            </div> 
                        -->

                                    <div class="card-body pt-0">

                                        <div class="form-check form-check-info text-left">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault" required>
                                            <label class="form-check-label" for="flexCheckDefault">
                                                I agree that the data collected from this online inquiry shall be
                                                subjected to
                                                the school's <a href="dataPrivacy/SFAC-Data-Privacy.pdf"
                                                    class="text-dark font-weight-bolder">Data Privacy Policy.</a>
                                            </label>
                                        </div>


                                        <div class="col-12 button-row d-flex mt-4">
                                            <button type="submit" name="submit"
                                                class="btn bg-gradient-primary ms-auto">Register</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->

            <?php
            if (isset($_SESSION['inquiryComplete'])) {
                echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="inquiryComplete"
             id="autoClickBtn" hidden>
         </a>';
            }
            unset($_SESSION['inquiryComplete']);
            ?>

            <div class="position-fixed top-2 end-1 z-index-3">
                <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="inquiryComplete"
                    aria-atomic="true" style="position: absolute; top: 0; right: 0;">
                    <div class="toast-header border-0">
                        <i class="ni ni-check-bold text-success me-2"></i>
                        <span class="me-auto font-weight-bold">Inquiry Registered!</span>
                        <small class="text-body"></small>
                        <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast"
                            aria-label="Close"></i>
                    </div>
                    <hr class="horizontal dark m-0">
                    <div class="toast-body">
                        You've successfully registered your inquiries.
                    </div>
                </div>
            </div>
            <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
            <!--   Core JS Files   -->
            <?php include '../../includes/scripts.php'; ?>
</body>

</html>