<?php
session_start();
include '../../includes/head.php';
// include 'accountConn/conn.php';
include '../../includes/session.php';

$stud_id = $_GET['stud_id'];

?>
<title>
    Drop Student | SFAC - Bacoor
</title>
</head>
<script type="text/javascript">
    $(function () {
        $("#semester").change(function () {
            if ($(this).val() == 25) {
                $("#others").removeAttr("disabled");
                $("#others").focus();
            } else {
                $("#others").attr("disabled", "disabled");
            }
        });
    });
</script>
<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">Drop Student</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row mb-10">
                <div class="col-lg-6 col-12 mx-auto">
                    <div class="card card-body mt-4 shadow-sm">
                        <h5 class="font-weight-bolder mb-0">Dropping Form</h5>
                        <?php
                        $select_all = mysqli_query($db, "SELECT *,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname
                        FROM tbl_schoolyears
                        LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                        WHERE ay_id IN ('$_SESSION[AC]') AND sem_id IN ('$_SESSION[S]') AND tbl_schoolyears.stud_id = '$stud_id'") or die(mysqli_error($db));
                        $row = mysqli_fetch_array($select_all);
                        ?>
                        <p class="text-sm mb-0">for <b><?php echo $row['fullname']; ?></b></p>
                        <hr class="horizontal dark my-3">
                        <form method="POST" enctype="multipart/form-data" action="userData/ctrl.edit.drop.php?stud_id=<?php echo $stud_id;?>">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Reasons for Dropping</label>
                                    <select class="form-control" id="semester" name="drop_id">
                                            <?php $getDropReason = mysqli_query($db, "SELECT * FROM tbl_dropout");
                                            while ($row = mysqli_fetch_array($getDropReason)) {
                                            ?>
                                            <option selected value="<?php echo $row['drop_id']; ?>">
                                                <?php echo $row['drop_reason'];?>
                                            </option>
                                            <?php
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Please Specify</label>
                                    <input class="form-control" type="text" id="others" placeholder="Enter Reason"
                                        name="drop_reason" disabled="disabled"/>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mt-4">
                                <button class="btn bg-gradient-dark text-white m-0 ms-2" type="submit" title="Send"
                                    name="submit">Submit</button>
                            </div>
                        </form>
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