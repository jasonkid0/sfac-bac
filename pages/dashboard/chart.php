<?php
session_start();
include '../../includes/head.php';
include '../../includes/session.php';
if (isset($_GET['sem'])) {
    $sem = $_GET['sem'];
} else {
    $sem = $_SESSION['ASem'];
}

if (isset($_GET['dep'])) {
    if ($_GET['dep'] == "All" || $_GET['dep'] == "Old" || $_GET['dep'] == "New") {
        $dep = $_GET['dep'];
    } else {
        $dep = $_GET['dep'];
        $rowdep = mysqli_fetch_array(mysqli_query($db, "SELECT department_name FROM tbl_departments WHERE department_id = $dep"));
    }
    
} else {
    $dep = 2;
}



?>
<title>
    Department Charts | SFAC - Bacoor
</title>
</head>


<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">View  Department Charts</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row mb-5">
                <div class="col-12">
                    <div class="card shadow shadow-xl">
                        <!-- Card header -->
                        <div class="card-header m-1 my-0">
                            <div class="row">
                                <div class="col-md-7 mt-2">
                                    <h5 class="mb-0 ">Comparative Chart</h5>
                                    <p class="text-sm mb-0">For Academic Year
                                    
                                    <?php $get_ay = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM tbl_acadyears WHERE NOT academic_year = '' ORDER BY academic_year ASC LIMIT 1"));
                                    $get_ay2 = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM tbl_acadyears WHERE NOT academic_year = '' ORDER BY academic_year DESC LIMIT 1")) or die (mysqli_error($db));
                                    
                                    echo '<b>'. $get_ay['academic_year'] .'</b> to <b>'. $get_ay2['academic_year'] . '</b>';
                                    
                                    ?> </p>
                                </div>
                                <div class="col-md-5 mt-2">
                                    
                                </div>
                            </div>
                            
                        </div>
                        <hr class="horizontal dark mt-0">
                        <div class="table-responsive px-4 my-4">
                            <div class="card">
                                <div class="card-header pb-0">
                                <h6>Student overview</h6>
                                <p class="text-sm">
                                    <b><?php
                                    if ($_GET['dep'] == "All" || $_GET['dep'] == "Old" || $_GET['dep'] == "New") {
                                        echo $_GET['dep']. " Enrolled Students.";
                                    } else {
                                    echo $rowdep['department_name']; }?></b>
                                </p>
                                </div>
                                <div class="card-body p-3">
                                <div class="chart">
                                    <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                                </div>
                                </div>
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
    <!-- SCRIPT DATA -->
    <?php
        $ay_array = array();
        $student_array = array();
        $student_array2 = array();
        $get_ay = mysqli_query($db,"SELECT * FROM tbl_acadyears WHERE NOT academic_year = '' ORDER BY academic_year ASC");
        while ($row1 = mysqli_fetch_array($get_ay)) {
            array_push($ay_array, $row1['academic_year']);
            
            if ($dep == "All") {
                $deptdata = mysqli_query($db, "SELECT COUNT(sy_id) AS count FROM tbl_schoolyears
            LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
            LEFT JOIN tbl_departments ON tbl_departments.department_id = tbl_courses.department_id
            WHERE tbl_schoolyears.ay_id = '$row1[academic_year]' AND tbl_schoolyears.sem_id = 'First Semester' AND remark IN ('Approved')");
            $count = mysqli_fetch_array($deptdata);
            array_push($student_array, $count['count']);
            
            } elseif ($dep == "Old") {
                $deptdata = mysqli_query($db, "SELECT COUNT(sy_id) AS count FROM tbl_schoolyears
            LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
            LEFT JOIN tbl_departments ON tbl_departments.department_id = tbl_courses.department_id
            WHERE tbl_schoolyears.ay_id = '$row1[academic_year]' AND tbl_schoolyears.sem_id = 'First Semester' AND remark IN ('Approved') AND status IN ('Old') ");
            $count = mysqli_fetch_array($deptdata);
            array_push($student_array, $count['count']);
            } elseif($dep == "New") {
                $deptdata = mysqli_query($db, "SELECT COUNT(sy_id) AS count FROM tbl_schoolyears
            LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
            LEFT JOIN tbl_departments ON tbl_departments.department_id = tbl_courses.department_id
            WHERE tbl_schoolyears.ay_id = '$row1[academic_year]' AND tbl_schoolyears.sem_id = 'First Semester' AND remark IN ('Approved') AND status IN ('New') ");
            $count = mysqli_fetch_array($deptdata);
            array_push($student_array, $count['count']);
            } else {
                $deptdata = mysqli_query($db, "SELECT COUNT(sy_id) AS count FROM tbl_schoolyears
            LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
            LEFT JOIN tbl_departments ON tbl_departments.department_id = tbl_courses.department_id
            WHERE tbl_schoolyears.ay_id = '$row1[academic_year]' AND tbl_schoolyears.sem_id = 'First Semester' AND tbl_departments.department_id = '$dep' AND remark IN ('Approved')");
            $count = mysqli_fetch_array($deptdata);
            array_push($student_array, $count['count']);
            }
            /////////////////////////////////////////////////////////////////////////////
            if ($dep == "All") {
                $deptdata = mysqli_query($db, "SELECT COUNT(sy_id) AS count FROM tbl_schoolyears
            LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
            LEFT JOIN tbl_departments ON tbl_departments.department_id = tbl_courses.department_id
            WHERE tbl_schoolyears.ay_id = '$row1[academic_year]' AND tbl_schoolyears.sem_id = 'Second Semester' AND remark IN ('Approved')");
            $count = mysqli_fetch_array($deptdata);
            array_push($student_array2, $count['count']);
            
            } elseif ($dep == "Old") {
                $deptdata = mysqli_query($db, "SELECT COUNT(sy_id) AS count FROM tbl_schoolyears
            LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
            LEFT JOIN tbl_departments ON tbl_departments.department_id = tbl_courses.department_id
            WHERE tbl_schoolyears.ay_id = '$row1[academic_year]' AND tbl_schoolyears.sem_id = 'Second Semester' AND remark IN ('Approved') AND status IN ('Old') ");
            $count = mysqli_fetch_array($deptdata);
            array_push($student_array2, $count['count']);
            } elseif($dep == "New") {
                $deptdata = mysqli_query($db, "SELECT COUNT(sy_id) AS count FROM tbl_schoolyears
            LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
            LEFT JOIN tbl_departments ON tbl_departments.department_id = tbl_courses.department_id
            WHERE tbl_schoolyears.ay_id = '$row1[academic_year]' AND tbl_schoolyears.sem_id = 'Second Semester' AND remark IN ('Approved') AND status IN ('New') ");
            $count = mysqli_fetch_array($deptdata);
            array_push($student_array2, $count['count']);
            } else {
                $deptdata = mysqli_query($db, "SELECT COUNT(sy_id) AS count FROM tbl_schoolyears
            LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
            LEFT JOIN tbl_departments ON tbl_departments.department_id = tbl_courses.department_id
            WHERE tbl_schoolyears.ay_id = '$row1[academic_year]' AND tbl_schoolyears.sem_id = 'Second Semester' AND tbl_departments.department_id = '$dep' AND remark IN ('Approved')");
            $count = mysqli_fetch_array($deptdata);
            array_push($student_array2, $count['count']);
            }

            
        }
        
        
    ?>
    <script>
    var ctx2 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

    var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
    gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: [
            <?php
            foreach ($ay_array as $data) {
                echo '"'.$data . '",';
            }    
            ?>
        ],
        datasets: [{
            label:"First Semester",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#cb0c9f",
            borderWidth: 3,
            backgroundColor: gradientStroke1,
            fill: true,
            data: [
                <?php
                foreach ($student_array as $data) {
                echo $data . ", ";
            }    
            ?>
            ],
            maxBarThickness: 6

          }, {
            label:"Second Semester",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#3A416F",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            fill: true,
            data: [
                <?php
                foreach ($student_array2 as $data) {
                echo $data . ", ";
            }    
            ?>
            ],
            maxBarThickness: 6

          }
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: true,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#b2b9bf',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#b2b9bf',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
</body>

</html>