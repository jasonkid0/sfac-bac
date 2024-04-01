<?php
session_start();
require '../../includes/conn.php';
include '../../includes/head.php';
include '../../includes/session.php';

?>
<title>
    FAQs | SFAC - Bacoor
</title>
</head>


<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">Frequently Asked Questions</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->


        <div class="container-fluid py-4">
            <div class="row mb-10">
                <div class="col-lg-9 col-12 mx-auto">
                    <div class="card card-body mt-4 shadow-sm">
                        <h6 class="mb-0">Frequently Asked Questions</h6>
                        <hr class="horizontal dark my-3">
                        <form method="POST">
                            <label class="mt-3">FAQs</label>
                                <select class="form-control" name="name" id="department">
                                    <option value="" disabled selected>Select FAQs
                                    </option>
                                    <?php
                                     if ($_SESSION['role'] == "Registrar") {
                                    ?>
                                        <option value="offer_open.pdf">How to Offer Subjects and Edit Student's Schedules?</option>
                                        <option value="Enabling-and-Disabling-Grades-in-our-portal.pdf">How to Enable and Disable Grades in OnLine-Grade?</option>
                                    <?php
                                     } else {
                                    ?>
                                        <option value="check_schedule.pdf">How to Check Student's Schedules?</option>
                                    <?php
                                        $status = mysqli_query($db, "SELECT * FROM tbl_schoolyears WHERE ay_id = '$_SESSION[AC]' AND sem_id = '$_SESSION[S]' AND stud_id = '$_SESSION[user_id]'");
                                        $row = mysqli_fetch_array($status);
                                        if ($row['status'] == 'Old') {
                                    ?>
                                        <option value="enroll_old.pdf">How to Enroll for Old Students</option>
                                    <?php
                                        } else {
                                    ?>
                                        <option value="enroll_new.pdf">How to Enroll for New and Transferees Students</option>
                                    <?php
                                        }
                                     }
                                    ?>
                                    
                                </select>
                            <div class="d-flex justify-content-end mt-4">
                                <button type="submit" name="submit" class="btn bg-gradient-dark text-white m-0 ms-2">
                                    Search</button>
                            </div>
                        </form>
                        <?php
                         if (isset($_POST['submit'])) {
                            $link = mysqli_real_escape_string($db,$_POST['name']);
                            echo'<script>{
                                location.replace("'.$link.'")}
                                </script>';
                         }
                        ?>
                    </div>
                </div>
            </div>
            <br>
            <?php include '../../includes/footer.php'; ?>
            <!-- End footer -->
            </form>
        </div>
    </main>
    <!--   Core JS Files   -->
    <?php include '../../includes/scripts.php'; ?>
</body>

</html>