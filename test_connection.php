<?php
$host = "localhost";
$user = "root";

$password = "root";
$db_name = "Firstdb";

$con = mysqli_connect($host, $user, $password, $db_name);

if (mysqli_connect_errno()) {
die("Failed to connect to MySQL: " . mysqli_connect_error());
}
?>