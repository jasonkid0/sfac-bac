<?php
require '../../../includes/conn.php';
require '../accountConn/conn.php';
session_start();
date_default_timezone_set('Asia/Manila');

$miscell_id = $_GET['miscell_id'];

$delete_miscell = mysqli_query($db, "DELETE FROM tbl_miscellaneous_fees WHERE miscell_id = '$miscell_id'");

$_SESSION['successDel'] = true;
header("location: ../list.miscell.php");