<?php
include 'test_connection.php';

$data = json_decode(file_get_contents("php://input"), true);

if (!empty($data['employeeID']) && !empty($data['name']) && !empty($data['role']) &&
!empty($data['salary'])) {
$ID = $data['employeeID'];
$name = $data['name'];
$role = $data['role'];
$salary = $data['salary'];

$query = "INSERT INTO employees (employeeID, name, role, salary) VALUES ('$ID',
'$name', '$role', '$salary')";

if (mysqli_query($con, $query)) {
echo json_encode(['success' => true, 'message' => 'Employee data added
successfully!']);
} else {
echo json_encode(['success' => false, 'message' => 'Error: ' .
mysqli_error($con)]);
}
} else {
echo json_encode(['success' => false, 'message' => 'Please provide all required
fields!']);
}
?>