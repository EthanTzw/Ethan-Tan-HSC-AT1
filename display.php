<?php
$username = "root";
$password = "root";
$database = "Firstdb";
$mysqli = new mysqli("localhost", $username, $password, $database);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Employees</title>
        <link rel="manifest" href="/AT1/manifest.json">
        <style>
            body {
                font-family: 'Times New Roman', Times, serif;
                margin: 20px;
                padding: 20px;
            }

            h2 {
                margin: auto;
                text-align: center;
                color: rgb(0, 0, 0);
                background-color: aliceblue;
                border: 4px solid black;
                width: 300px;
                border-radius: 10px;
                height: 30px;
            }

            label {
                margin-right: 10px;
            }

            form {
                background-color: aliceblue;
                margin: auto;
                width: 300px;
                height: auto;
                padding: 20px;
                border: 4px solid rgb(0, 0, 0);
                border-radius: 10px;
                box-sizing: border-box;
            }

            p {
                font-size: 30px;
                font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                margin: 0;
            }

            button {
                font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                width: 100px;
                height: 50px;
                margin: 0;
                border: 6px solid black;
                border-radius: 15px;
                padding: 10px;
            }

            input {
                font-family: 'Courier New', Courier, monospace;
                width: 250px;
                height: 30px;
                border: 4px solid black;
            }

            hr{
                border: 2px solid black;
            }
        </style>
    </head>
    <body bgcolor="#d6c69c">
        <?php
            $query = "SELECT * FROM employees";
            echo "<h2> <center>Employee List</center> </h2> <br> <br>";
            echo "<p><center>Command + Shift + R to update</center></p>";
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
        <script>
            if ('serviceWorker' in navigator) {
                window.addEventListener('load', () => {
                    navigator.serviceWorker.register('/AT1/service-worker.js')
                    .then(reg => console.log('Service Worker registered!', reg))
                    .catch(err => console.log('Service Worker registration failed!', err));
                });
            }
        </script>
        <a href="employee_data.php"><button type="button">Go back <--</button></a>
    </body>
</html>