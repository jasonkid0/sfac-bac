<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <?php $getSchool_info1 = $db->query("SELECT * FROM tbl_school_info") or die($db->error);
                while ($row = $getSchool_info1->fetch_array()) {
                    $sch_ad = $row['school_address'];
                    echo '  <li class="breadcrumb-item text-sm">
                    <img src="data:image/jpeg;base64,' . base64_encode($row['school_logo']) . '" class="navbar-brand-img h-100" alt="main_logo"
                        style="width: 40px; height: 40px;">
                </li>
                <li class=" text-sm text-dark mt-2 ms-2" aria-current="page">' . $row['school_name'] . ' ' . $row['school_address'] . '</li>
            </ol>';
                }
                // to update course_id from tbl_students and tbl_schoolyears
                $query_get_course_id = $db->query("SELECT course_id, stud_id FROM tbl_schoolyears WHERE ay_id = '$_SESSION[AC]' AND sem_id = '$_SESSION[S]'");
                while ($row = $query_get_course_id->fetch_array()) {
                    $query_get_course_id2 = $db->query("SELECT course_id, stud_id FROM tbl_students WHERE stud_id = '$row[stud_id]'");
                    $row2 = $query_get_course_id2->fetch_array();
                    if (!empty($row2['stud_id'])) {
                        if ($row['course_id'] != $row2['course_id']) {
                            $query_update_course_id = $db->query("UPDATE tbl_students SET course_id = '$row[course_id]' WHERE stud_id = '$row[stud_id]'");
                        }
                    }
                }
                ?>