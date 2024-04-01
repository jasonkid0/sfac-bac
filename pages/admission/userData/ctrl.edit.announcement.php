<?php
require '../../../includes/conn.php';
session_start();

$announcement_id = $_GET['announcement_id'];

if (isset($_POST['submit'])) {


        $title = mysqli_real_escape_string($db, $_POST['title']);
        $date = mysqli_real_escape_string($db, $_POST['date']);
        $link = mysqli_real_escape_string($db, $_POST['link']);
        $embed = mysqli_real_escape_string($db, $_POST['embed']);
        $prio = mysqli_real_escape_string($db, $_POST['prio']);


        $add_announcement = mysqli_query($db, "UPDATE tbl_announcements SET title = '$title', date = '$date', link = '$link', embed = '$embed', prio = '$prio' WHERE announcement_id = '$announcement_id'") or die (mysqli_error($db));
        
        $_SESSION['addAnnouncement'] = true;
        header("location: ../edit.announcement.php?announcement_id=". $announcement_id);
        
    
}