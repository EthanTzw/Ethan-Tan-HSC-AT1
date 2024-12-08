<?php
session_start();
if (!isset($_SESSION['username'])) {
header("Location: index.html");
exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Data Entry</title>
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
            height: 40px;
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
        }

        button {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            width: 100px;
            height: 60px;
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
    </style>
</head>

<body bgcolor="#d6c69c">
    <h2>Welcome,
        <?php echo $_SESSION['username']; ?>
    </h2>
    <a href="HowToUse.html"><button type="button">How to use this site:</button></a>
    <a href="display.php"><button type="button">See all employees:</button></a>
    <h2>Enter employee Data</h2>
    <form id="employeeForm">
        <label for="employeeID">Employee ID:</label>
        <input type="number" id="employeeID" name="employeeID" required><br><br>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="role">Role:</label>
        <input type="text" id="role" name="role" required><br><br>

        <label for="salary">Salary:</label>
        <input type="number" id="salary" name="salary" required><br><br>

        <button type="button" onclick="submitEmployeeData()">Add employee</button>
    </form>
    <div id="employeeResponse"></div>

    <script>
        function submitEmployeeData() {
            const data = {
                employeeID: document.getElementById('employeeID').value,
                name: document.getElementById('name').value,
                role: document.getElementById('role').value,
                salary: document.getElementById('salary').value


            };

            fetch('processUserJson.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
                .then(response => response.json())
                .then(result => {
                    document.getElementById('employeeResponse').innerText =
                        result.message;
                })
                .catch(error => console.error('Error:', error));
        }
    </script>

    <script>
        if ('serviceWorker' in navigator) {
        window.addEventListener('load', () => {
        navigator.serviceWorker.register('/AT1/service-worker.js')
        .then(reg => console.log('Service Worker registered!', reg))
        .catch(err => console.log('Service Worker registration failed!', err));
        });
        }
    </script>

    <a href="index.html"><button type="button" onclick="<!php
    session_destroy();
    ?>">Log out</button></a>

</body>

</html>