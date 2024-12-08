<?php
$username = "root";
$password = "root";
$database = "Firstdb";
$mysqli = new mysqli("localhost", $username, $password, $database);
$query = "SELECT * FROM employees";
echo "<h2> <center>Employee List</center> </h2> <br> <br>";
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["employeeID"];
        $field2name = $row["name"];
        $field3name = $row["role"];
        $field4name = $row["salary"];
        $field5name = $row["id"];
        echo "<div class='grid'>";
        echo "<p>Employee number: $field5name</p><br>";
        echo "<p>ID: $field1name</p><br>";
        echo "<p>Name: $field2name</p><br>";
        echo "<p>Role: $field3name</p><br>";
        echo "<p>Salary (SGD): $field4name</p><br>";
        echo "</div>";
        echo "<hr>";
    }

/*freeresultset*/
    $result->free();
}
?>