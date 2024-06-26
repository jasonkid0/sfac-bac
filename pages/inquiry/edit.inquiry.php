<?php
session_start();
require '../../includes/conn.php';
include '../../includes/head.php';
include '../../includes/session.php';


$or_id = $_GET['or_id'];

$_SESSION['or_id'] = $or_id;
?>
<title>
    Admit Online Inquiry | SFAC - Bacoor
</title>
</head>


<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">Inquirer's Information</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->


        <div class="container-fluid py-4">
            <div class="col-lg-11 mt-lg-0 mt-4 mx-auto mb-5">
                <!-- Card Profile -->
                <?php
                $getStudData = mysqli_query($db, "SELECT *, CONCAT(stud.firstname, ' ', stud.middlename, ' ', stud.lastname) AS fullname
                                        FROM tbl_online_registrations AS stud
                                        WHERE or_id = '$or_id'");
                while ($row = mysqli_fetch_array($getStudData)) {
                ?>
                <!-- Card Basic Info -->
                <form method="POST" enctype="multipart/form-data" action="inquiryData/ctrl.edit.inquiry.php"
                    class="card mt-4" id="basic-info">
                    <div class="card-header text-center">
                        <h5>Personal Data</h5>
                    </div>


                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-sm-4">
                                <label class="form-label mt-4">Student ID No.</label>
                                <div class="input-group">
                                    <input name="stud_no" required type="text" placeholder="Student Number"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <label class="form-label mt-4">Department</label>
                                <select class="form-control" required name="courses" id="department">

                                    <?php if (!empty($row['course_id'])) {
                                            $getCourses = mysqli_query($db, "SELECT * FROM tbl_courses WHERE course_id IN ('$row[course_id]')");
                                            while ($row2 = mysqli_fetch_array($getCourses)) {
                                        ?>
                                    <option selected value="<?php echo $row2['course_id']; ?>">
                                        <?php echo $row2['course'];
                                            } ?>
                                    </option>

                                    <?php $getCourses = mysqli_query($db, "SELECT * FROM tbl_courses WHERE course_id NOT IN ('$row[course_id]')");
                                                while ($row1 = mysqli_fetch_array($getCourses)) {
                                                ?>
                                    <option value="<?php echo $row1['course_id']; ?>">
                                        <?php echo $row1['course'];
                                                } ?></option>
                                    <?php } else {
                                                echo '<option value="" selected disabled>Select Department</option>';
                                                $getCourses = mysqli_query($db, "SELECT * FROM tbl_courses");
                                                while ($row3 = mysqli_fetch_array($getCourses)) {
                                                    echo '<option value="' . $row3['course_id'] . '">' . $row3['course'] . '</option>';
                                                }
                                            } ?>
                                </select>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label class="form-label mt-4">Last Name</label>
                                <div class="input-group">
                                    <input id="lastName" name="lastname" class="form-control" type="text"
                                        placeholder="Lastname" value="<?php echo $row['lastname']; ?>">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <label class="form-label mt-4">First Name</label>
                                <div class="input-group">
                                    <input id="firstName" name="firstname" class="form-control" type="text"
                                        placeholder="Firstname"
                                        value="<?php echo $row['firstname'];
                                                                                                                                                ?>">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <label class="form-label mt-4">Middlename</label>
                                <div class="input-group">
                                    <input id="middlename" name="middlename" class="form-control" type="text"
                                        placeholder="Middlename" value="<?php echo $row['middlename']; ?>">
                                </div>
                            </div>

                        </div>


                        <div class="row">

                            <div class="col-sm-12">
                                <label class="form-label mt-4">Address</label>
                                <div class="input-group">
                                    <input id="address" name="address" class="form-control" type="address"
                                        placeholder="House/Unit/Flr #, Bldg Name, Blk or Lot #, Barangay, City/Municipality, Province"
                                        value="<?php echo $row['address']; ?>">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-3">
                                <label class="form-label mt-4">Gender</label>
                                <select class="form-control" required name="gender" id="gender">
                                    <?php if (!empty($row['gender_id'])) {
                                            $getGenders = mysqli_query($db, "SELECT * FROM tbl_genders WHERE gender_id IN ('$row[gender_id]')");
                                            while ($row2 = mysqli_fetch_array($getGenders)) {
                                        ?>
                                    <option selected value="<?php echo $row2['gender_id']; ?>">
                                        <?php echo $row2['gender'];
                                            } ?>
                                    </option>

                                    <?php $getGenders = mysqli_query($db, "SELECT * FROM tbl_genders WHERE gender_id NOT IN ('$row[gender_id]')");
                                                while ($row1 = mysqli_fetch_array($getGenders)) {
                                                ?>
                                    <option value="<?php echo $row1['gender_id']; ?>">
                                        <?php echo $row1['gender'];
                                                } ?></option>
                                    <?php } else {
                                                echo '<option selected disabled>Select Gender</option>';
                                                $getGenders = mysqli_query($db, "SELECT * FROM tbl_genders");
                                                while ($row3 = mysqli_fetch_array($getGenders)) {
                                                    echo '<option value="' . $row3['gender_id'] . '">' . $row3['gender'] . '</option>';
                                                }
                                            } ?>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label class="form-label mt-4">Age</label>
                                <div class="input-group">
                                    <input id="age" name="age" class="form-control" type="text"
                                        value="<?php echo $row['age']; ?>">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label class="form-label mt-4">Date of Birth</label>
                                <div class="input-group">
                                    <input id="birthdate" name="birthdate" class="form-control" type="date"
                                        value="<?php echo $row['birthdate']; ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-label mt-4">Place of Birth</label>
                                <div class="input-group">
                                    <input id="birthplace" name="birthplace" class="form-control" type="text"
                                        placeholder="City/Municipality, Province"
                                        value="<?php echo $row['birthplace']; ?>">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-4">
                                <label class="form-label mt-4">Religion</label>
                                <div class="input-group">
                                    <input id="religion" name="religion" class="form-control" type="text"
                                        placeholder="Religion" value="<?php echo $row['religion']; ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-label mt-4">Citizenship</label>
                                <div class="input-group">
                                    <input id="citizenship" name="citizenship" class="form-control" type="text"
                                        placeholder="Citizenship" value="<?php echo $row['citizenship']; ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-label mt-4">Civil Status</label>
                                <div class="input-group">
                                    <input id="civilstatus" name="civilstatus" class="form-control" type="text"
                                        placeholder="civilstatus" value="<?php echo $row['civilstatus']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label class="form-label mt-4">Contact Number</label>
                                <div class="input-group">
                                    <input id="contact" name="contact" class="form-control" type="text"
                                        placeholder="Contact Number" value="<?php echo $row['contact']; ?>">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <label class="form-label mt-4">Email Address</label>
                                <div class="input-group">
                                    <input id="email" name="email" class="form-control" type="text"
                                        placeholder="example@gmail.com" value="<?php echo $row['email']; ?>">
                                </div>
                            </div>

                            <div class="row">
                                            <div class="col-sm-12">
                                                <label class="form-label mt-4">Last School Attended</label>
                                                <div class="input-group">
                                                    <input id="lastschool" name="lastschool" class="form-control" type="text"
                                                        placeholder="Last School Attended" value="<?php echo $row['lastschool']; ?>">
                                                </div>
                                            </div>
                                         </div>
                                         <div class="row">
                                            <div class="col-sm-6">
                                                <label class="form-label mt-4">Last School Level Attended</label>
                                                
                                                    <select class="form-control" required name="last_level" id="semester">
                                                        <?php
                                                            if ($row['last_level'] == 1) {
                                                                ?>
                                                                <option value="1" selected>College Level</option>
                                                                <option value="2">Senior High School</option>
                                                        <?php
                                                            } else {
                                                                ?>
                                                                <option value="1">College Level</option>
                                                                <option value="2" selected>Senior High School</option>
                                                                <?php
                                                            }
                                                        ?>
                                                        
                                                    </select>
                                                
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="form-label mt-4">School Type</label>
                                                
                                                    <select class="form-control" required name="last_school_type" id="curri">
                                                        <?php
                                                            if ($row['last_school_type'] == "Private") {
                                                                ?>
                                                                <option value="Private" selected>Private</option>
                                                        <option value="Public">Public</option>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <option value="Private">Private</option>
                                                        <option value="Public" selected>Public</option>
                                                                <?php
                                                            }
                                                                ?>
                                                        
                                                    </select>
                                                
                                            </div>
                                         </div>

                        </div>
                    </div>


                    <!-- <hr class="collapse-horizontal mb-0">
                            <div class="card-header text-center">
                                <h5>Family Background</h5>
                            </div>

                            <div class="card-body pt-0">

                                <h5 class="font-weight-bold">Father</h5>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Last Name</label>
                                        <div class="input-group">
                                            <input id="flastname" name="flastname" class="form-control" type="text"
                                                placeholder="Lastname" value="<?php echo $row['flastname']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">First Name</label>
                                        <div class="input-group">
                                            <input id="ffirstname" name="ffirstname" class="form-control" type="text"
                                                placeholder="Firstname" value="<?php echo $row['ffirstname']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Middle Name</label>
                                        <div class="input-group">
                                            <input id="fmiddlename" name="fmiddlename" class="form-control" type="text"
                                                placeholder="Middlename" value="<?php echo $row['fmiddlename']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row pt-2">
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Age</label>
                                        <div class="input-group">
                                            <input id="fage" name="fage" class="form-control" type="text"
                                                placeholder="Age" value="<?php echo $row['fage']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <label class="form-label mt-4">Occupation</label>
                                        <div class="input-group">
                                            <input id="foccupation" name="foccupation" class="form-control" type="text"
                                                placeholder="Father Occupation"
                                                value="<?php echo $row['foccupation']; ?>">
                                        </div>
                                    </div>

                                </div>


                                <h5 class="mt-4 font-weight-bold">Mother</h5>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Last Name</label>
                                        <div class="input-group">
                                            <input id="mlastname" name="mlastname" class="form-control" type="text"
                                                placeholder="Lastname" value="<?php echo $row['mlastname']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">First Name</label>
                                        <div class="input-group">
                                            <input id="mfirstname" name="mfirstname" class="form-control" type="text"
                                                placeholder="Firstname" value="<?php echo $row['mfirstname']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Middle Name</label>
                                        <div class="input-group">
                                            <input id="mmiddlename" name="mmiddlename" class="form-control" type="text"
                                                placeholder="Middlename" value="<?php echo $row['mmiddlename']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Age</label>
                                        <div class="input-group">
                                            <input id="mage" name="mage" class="form-control" type="text"
                                                placeholder="Age" value="<?php echo $row['mage']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <label class="form-label mt-4">Occupation</label>
                                        <div class="input-group">
                                            <input id="moccupation" name="moccupation" class="form-control" type="text"
                                                placeholder="Mother Occupation"
                                                value="<?php echo $row['moccupation']; ?>">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label class="form-label mt-4">Monthly Family Income</label>
                                        <div class="input-group">
                                            <input id="familyincome" name="familyincome" class="form-control"
                                                placeholder="Income" type="text"
                                                value="<?php echo $row['familyincome']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="form-label mt-4">No. of Siblings</label>
                                        <div class="input-group">
                                            <input id="nosiblings" name="nosiblings" class="form-control" type="text"
                                                value="<?php echo $row['nosiblings']; ?>">
                                        </div>
                                    </div>
                                </div> -->


                    <!-- <hr class="collapse-horizontal">
                                <h5 class="mt-4">Guardian</h5>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Last Name</label>
                                        <div class="input-group">
                                            <input id="glastname" name="glastname" class="form-control" type="text"
                                                placeholder="Lastname" value="<?php echo $row['glastname']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">First Name</label>
                                        <div class="input-group">
                                            <input id="gfirstname" name="gfirstname" class="form-control" type="text"
                                                placeholder="Firstname" value="<?php echo $row['gfirstname']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Middle Name</label>
                                        <div class="input-group">
                                            <input id="gmiddlename" name="gmiddlename" class="form-control" type="text"
                                                placeholder="Middlename" value="<?php echo $row['gmiddlename']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Relationship</label>
                                        <div class="input-group">
                                            <input id="relationship" name="relationship" class="form-control"
                                                placeholder="Relationship" type="text"
                                                value="<?php echo $row['relationship']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <label class="form-label mt-4">Address</label>
                                        <div class="input-group">
                                            <input id="gaddress" name="gaddress" class="form-control" type="text"
                                                placeholder="House/Unit/Flr #, Bldg Name, Blk or Lot #, Barangay, City/Municipality, Province"
                                                value="<?php echo $row['gaddress']; ?>">
                                        </div>
                                    </div>

                                </div>
                            </div> -->


                    <!-- <hr class="collapse-horizontal mb-0">
                            <div class="card-header text-center">
                                <h5>Educational Background</h5>
                            </div>

                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <label class="form-label mt-4">Elementary Graduated From</label>
                                        <div class="input-group">
                                            <input id="elem" name="elem" class="form-control" type="text"
                                                placeholder="Name of School" value="<?php echo $row['elem']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">School Year</label>
                                        <div class="input-group">
                                            <input id="elemSY" name="elemSY" class="form-control" type="text"
                                                placeholder="0000-0000" value="<?php echo $row['elemSY']; ?>">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="form-label mt-4">Address of School</label>
                                        <div class="input-group">
                                            <input id="elemAddress" name="elemAddress" class="form-control" type="text"
                                                placeholder="Address of School"
                                                value="<?php echo $row['elemAddress']; ?>">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <label class="form-label mt-4">High School Graduated From</label>
                                        <div class="input-group">
                                            <input id="hs" name="hs" class="form-control" type="text"
                                                placeholder="Name of School" value="<?php echo $row['hs']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">School Year</label>
                                        <div class="input-group">
                                            <input id="hsSY" name="hsSY" class="form-control" type="text"
                                                placeholder="0000-0000" value="<?php echo $row['hsSY']; ?>">
                                        </div>
                                    </div>

                                </div>
                                <div class="row pt-2">
                                    <div class="col-sm-12">
                                        <label class="form-label mt-4">Address of School</label>
                                        <div class="input-group">
                                            <input id="hsAddress" name="hsAddress" class="form-control" type="text"
                                                placeholder="Address of School"
                                                value="<?php echo $row['hsAddress']; ?>">
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="form-label mt-4">Last School Attended</label>
                                        <div class="input-group">
                                            <input id="lastschool" name="lastschool" class="form-control" type="text"
                                                placeholder="Last School Attended"
                                                value="<?php echo $row['lastschool']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="form-label mt-4">Course & Year</label>
                                        <div class="input-group">
                                            <input id="course-year" name="course-year" class="form-control" type="text"
                                                placeholder="Course & Year" value="<?php echo $row['courseYear']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="form-label mt-4">School Year</label>
                                        <div class="input-group">
                                            <input id="lastSY" name="lastSY" class="form-control" type="text"
                                                placeholder="0000-0000" value="<?php echo $row['lastSY']; ?>">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="form-label mt-4">Address of School</label>
                                        <div class="input-group">
                                            <input id="lastAddress" name="lastAddress" class="form-control" type="text"
                                                placeholder="Address of School"
                                                value="<?php echo $row['lastAddress']; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                    <hr class="collapse-horizontal mb-0">
                    <div class="card-header text-center">
                        <h5>Account Details</h5>
                    </div>

                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="form-label mt-3">Username</label>
                                <div class="input-group">
                                    <input id="username" required name="username" class="form-control" type="text"
                                        placeholder="Username">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label mt-3">Password</label>
                                <div class="input-group">
                                    <input id="password" required name="password" class="form-control"
                                        placeholder="Password" type="password">
                                </div>
                            </div>
                        </div>

                        <div class="col-12 button-row d-flex mt-4">
                            <button type="submit" name="submit" class="btn bg-gradient-primary ms-auto">Admit</button>
                        </div>
                    </div>
                </form>

                <?php } ?>

            </div>
            <?php include '../../includes/footer.php'; ?>
            <!-- End footer -->
        </div>

    </main>
    <!--   Core JS Files   -->
    <?php include '../../includes/scripts.php'; ?>
</body>

</html>