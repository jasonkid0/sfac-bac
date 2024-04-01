<?php
require '../../../includes/conn.php';
session_start();

if (isset($_POST['submit'])) {


        $title = mysqli_real_escape_string($db, $_POST['title']);
        $date = mysqli_real_escape_string($db, $_POST['date']);
        $link = mysqli_real_escape_string($db, $_POST['link']);
        $embed = mysqli_real_escape_string($db, $_POST['embed']);
        $prio = mysqli_real_escape_string($db, $_POST['prio']);


        $add_announcement = mysqli_query($db, "INSERT INTO tbl_announcements (title, date, link, embed, prio) VALUES ('$title', '$date', '$link', '$embed', '$prio')");
        
        $_SESSION['addAnnouncement'] = true;
        header("location: ../add.announcement.php");
        
    
}