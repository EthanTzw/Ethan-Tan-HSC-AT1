<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include('test_connection.php');


$data = json_decode(file_get_contents("php://input"), true);

if (!empty($data['userName']) && !empty($data['passWord'])) {
$username = $data['userName'];
$password = $data['passWord'];

$query = "SELECT * FROM login WHERE user='$username' AND pass='$password'";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) >0) {
$_SESSION['username'] = $username;
echo json_encode(['success' => true, 'message' => 'Login successful!']);
} else {
echo json_encode(['success' => false, 'message' => 'Invalid username or
password!']);
}
} else {
echo json_encode(['success' => false, 'message' => 'Please provide both
username and password!']);
}
?>