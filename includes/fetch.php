<?php
session_start();
if (isset($_POST["view"])) {
    // connection
    include '../includes/conn.php';

    // Notification | Adviser
    if ($_SESSION['role'] == "Adviser") {
        // to Update the seen notif
        if ($_POST["view"] != "") {
            $update_query = $db->query("UPDATE tbl_notifications LEFT JOIN tbl_schoolyears SY USING(sy_id) LEFT JOIN tbl_courses C ON C.course_id = SY.course_id SET notif_status = 1 WHERE notif_status = 0 AND C.department_id IN ('$_SESSION[ADepartment_id]') AND (remark IN ('Pending') OR remark IN ('Checked') OR remark IN ('Canceled')) ") or die($db->error);
        }

        // to show the lists item of notif
        $query = $db->query("SELECT *, CONCAT(S.firstname, ' ', S.lastname) AS fullname 
     FROM tbl_notifications N
     LEFT JOIN tbl_schoolyears SY USING(sy_id) 
     LEFT JOIN tbl_students S USING(stud_id)
     LEFT JOIN tbl_year_levels YL USING(year_id)
     LEFT JOIN tbl_courses C ON C.course_id = SY.course_id
     WHERE C.department_id IN ('$_SESSION[ADepartment_id]') AND (remark IN ('Pending') OR remark IN ('Checked') OR remark IN ('Canceled'))
     ORDER BY notif_id DESC
     LIMIT 5") or die($db->error);

        $output = '';
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_array()) {
                if (!empty(base64_encode($row['img'])) && !empty($row['stud_no'])) {
                    $output .= '
        <li class="mb-2">
        <a class="dropdown-item border-radius-md" href="../enrollment/pendingStud.php?search=' . $row['stud_no'] . '">
            <div class="d-flex py-1">
                <div class="my-auto">
                    <img src="data:image/jpeg;base64, ' . base64_encode($row['img']) . '" class="avatar avatar-sm me-3 " alt="user image">
                </div>
                <div class="d-flex flex-column justify-content-center">
                    <h6 class="text-sm font-weight-normal mb-1">
                        <span class="font-weight-bold">' . $row['fullname'] . '</span>
                    </h6>
                    <p class="text-xs text-secondary mb-0">
                    <i class="fas fa-info-circle me-1"></i>
                    ' . $row['year_level'] . ' | ' . $row['status'] . ' Student
                    </p>
                </div>
            </div>
        </a>
    </li>
        ';
                } elseif (empty(base64_encode($row['img'])) && !empty($row['stud_no'])) {
                    $output .= ' 
        <li class="mb-2">
            <a class="dropdown-item border-radius-md" href="../enrollment/pendingStud.php?search=' . $row['stud_no'] . '">
                <div class="d-flex py-1">
                    <div class="my-auto">
                        <img src="../../assets/img/illustrations/user_prof.jpg" class="avatar avatar-sm me-3 " alt="user image">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                            <span class="font-weight-bold">' . $row['fullname'] . '</span>
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                        <i class="fas fa-info-circle me-1"></i>
                            ' . $row['year_level'] . ' | ' . $row['status'] . ' Student
                        </p>
                    </div>
                </div>
            </a>
        </li>
            ';
                } else {
                    $output .= '
            <li class="mb-2">
            <a class="dropdown-item border-radius-md" href="javascript:;">
                <div class="d-flex py-1">
                    <div class="my-auto">
                        <img src="../../assets/img/illustrations/user_prof.jpg" class="avatar avatar-sm me-3 " alt="user image">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                            <span class="font-weight-bold"> Deleted </span>
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                    </p>
                    </div>
                </div>
            </a>
        </li>
            ';
                }
            }
        } else {
            $output .= ' <li class="mb-2">
    <a class="dropdown-item border border-radius-md" href="javascript:;">
        <div class="d-flex py-1">
            <div class="d-flex flex-column justify-content-center">
                <h6 class="text-sm text-black-50 font-weight-normal mb-1">
                    <i>No Notification Found</i>
                </h6>
            </div>
        </div>
    </a>
</li>';
        }
        // Notification | Registrar
    } elseif ($_SESSION['role'] == "Registrar") {
        if ($_POST["view"] != "") {
            $update_query = $db->query("UPDATE tbl_notifications LEFT JOIN tbl_schoolyears SY USING(sy_id) LEFT JOIN tbl_courses C ON C.course_id = SY.course_id SET notif_status = 1 WHERE notif_status = 0 AND (remark IN ('Approved') OR remark IN ('Disapproved') OR remark IN ('Checked'))") or die($db->error);
        }

        // to show the lists item of notif
        $query = $db->query("SELECT *, CONCAT(S.firstname, ' ', S.lastname) AS fullname 
     FROM tbl_notifications N
     LEFT JOIN tbl_schoolyears SY USING(sy_id) 
     LEFT JOIN tbl_students S USING(stud_id)
     LEFT JOIN tbl_year_levels YL USING(year_id)
     LEFT JOIN tbl_courses C ON C.course_id = SY.course_id
     WHERE (remark IN ('Approved') OR remark IN ('Checked') OR remark IN ('Disapproved'))
     ORDER BY notif_id DESC
     LIMIT 5") or die($db->error);

        $output = '';
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_array()) {
                if (!empty(base64_encode($row['img'])) && !empty($row['stud_no'])) {
                    $output .= '
<li class="mb-2">
    <a class="dropdown-item border-radius-md" href="../enrollment/enrolledStud.php?search=' . $row['stud_no'] . '">
        <div class="d-flex py-1">
            <div class="my-auto">
                <img src="data:image/jpeg;base64, ' . base64_encode($row['img']) . '" class="avatar avatar-sm me-3 "
                    alt="user image">
            </div>
            <div class="d-flex flex-column justify-content-center">
                <h6 class="text-sm font-weight-normal mb-1">
                    <span class="font-weight-bold">' . $row['fullname'] . '</span>
                </h6>
                <p class="text-xs text-secondary mb-0">
                    <i class="fas fa-info-circle me-1"></i>
                    ' . $row['year_level'] . ' | ' . $row['status'] . ' Student
                </p>
            </div>
        </div>
    </a>
</li>
';
                } elseif (empty(base64_encode($row['img'])) && !empty($row['stud_no'])) {
                    $output .= '
<li class="mb-2">
    <a class="dropdown-item border-radius-md" href="../enrollment/enrolledStud.php?search=' . $row['stud_no'] . '">
        <div class="d-flex py-1">
            <div class="my-auto">
                <img src="../../assets/img/illustrations/user_prof.jpg" class="avatar avatar-sm me-3 " alt="user image">
            </div>
            <div class="d-flex flex-column justify-content-center">
                <h6 class="text-sm font-weight-normal mb-1">
                    <span class="font-weight-bold">' . $row['fullname'] . '</span>
                </h6>
                <p class="text-xs text-secondary mb-0">
                    <i class="fas fa-info-circle me-1"></i>
                    ' . $row['year_level'] . ' | ' . $row['status'] . ' Student
                </p>
            </div>
        </div>
    </a>
</li>
';
                } else {
                    $output .= '
<li class="mb-2">
    <a class="dropdown-item border-radius-md" href="javascript:;">
        <div class="d-flex py-1">
            <div class="my-auto">
                <img src="../../assets/img/illustrations/user_prof.jpg" class="avatar avatar-sm me-3 " alt="user image">
            </div>
            <div class="d-flex flex-column justify-content-center">
                <h6 class="text-sm font-weight-normal mb-1">
                    <span class="font-weight-bold"> Deleted </span>
                </h6>
                <p class="text-xs text-secondary mb-0">
                </p>
            </div>
        </div>
    </a>
</li>
';
                }
            }
        } else {
            $output .= ' <li class="mb-2">
    <a class="dropdown-item border border-radius-md" href="javascript:;">
        <div class="d-flex py-1">
            <div class="d-flex flex-column justify-content-center">
                <h6 class="text-sm text-black-50 font-weight-normal mb-1">
                    <i>No Notification Found</i>
                </h6>
            </div>
        </div>
    </a>
</li>';
        }
    } else {
        header("location: ../pages/error/error-404.php");
    }

    // Adviser Query
    if ($_SESSION['role'] == "Adviser") {
        // it count the number of unseen notif
        $query1 = $db->query("SELECT * FROM tbl_notifications
LEFT JOIN tbl_schoolyears SY USING(sy_id)
LEFT JOIN tbl_courses C ON C.course_id = SY.course_id
WHERE notif_status = 0 AND C.department_id IN ('$_SESSION[ADepartment_id]') AND (remark IN ('Pending') OR remark IN
('Canceled'))")
            or die($db->error);
        // Registrar Query
    } elseif ($_SESSION['role'] == "Registrar") {
        // it count the number of unseen notif
        $query1 = $db->query("SELECT * FROM tbl_notifications
LEFT JOIN tbl_schoolyears SY USING(sy_id)
LEFT JOIN tbl_courses C ON C.course_id = SY.course_id
WHERE notif_status = 0 AND (remark IN ('Approved') OR remark IN ('Checked') OR remark IN ('Disapproved'))")
            or die($db->error);
    }
    $count = $query1->num_rows;
    // it store the collected data
    $data = array(
        'notification' => $output,
        'unseen_notification' => $count
    );
    echo json_encode($data);
}