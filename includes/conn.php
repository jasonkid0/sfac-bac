<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "enrollmentbac";

// $servername = "localhost";
// $username = "u733437513_lorenzo";
// $password = "Hw#7vmG4[H";
// $dbname = "u733437513_enrollmentbac";

$db = new mysqli($servername, $username, $password, $dbname) or die($db->error);