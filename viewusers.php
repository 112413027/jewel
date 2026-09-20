<?php

// Database connection
$conn = new mysqli("localhost", "root", "", "bakery1_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from database
$sql = "SELECT id, name, email, mobile, username, password, confirm_password
        FROM users";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>

    <title>Registered Users</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background: #f8f1e8;
            padding: 30px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            margin: 30px auto;
            border-collapse: collapse;
            background: white;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: center;
        }

        th {
            background: green;
            color: white;
        }

        tr:nth-child(even) {
            background: #f2f2f2;
        }

        .password {
            letter-spacing: 3px;
            font-weight: bold;
        }

    </style>

</head>

<body>

    <h2>Registered Users</h2>

    <table>

        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Username</th>
            <th>Password</th>
            <th>Confirm Password</th>
        </tr>

        <?php

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                echo "<tr>";

                echo "<td>" . htmlspecialchars($row["id"]) . "</td>";

                echo "<td>" . htmlspecialchars($row["name"]) . "</td>";

                echo "<td>" . htmlspecialchars($row["email"]) . "</td>";

                echo "<td>" . htmlspecialchars($row["mobile"]) . "</td>";

                echo "<td>" . htmlspecialchars($row["username"]) . "</td>";

                // Hide password
                echo "<td class='password'>********</td>";

                // Hide confirm password
                echo "<td class='password'>********</td>";

                echo "</tr>";
            }

        } else {

            echo "<tr>";
            echo "<td colspan='7'>No registered users found</td>";
            echo "</tr>";

        }

        ?>

    </table>

</body>
</html>

<?php

$conn->close();

?>

