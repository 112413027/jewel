<?php

// Connect to MySQL
$conn = new mysqli("localhost", "root", "", "bakery1_db");

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Get login details
$username = trim($_POST['username']);
$password = $_POST['password'];

// Find the username in the users table
$sql = "SELECT * FROM users WHERE username = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();

$result = $stmt->get_result();

// Check if user exists
if ($result->num_rows == 1) {

    $user = $result->fetch_assoc();
    // Check password
    if (password_verify($password, $user['password'])) {

        echo "Login successful!<br>";
        echo "Welcome, " . htmlspecialchars($user['name']);

    } else {

        echo "Incorrect password.";

    }

} else {

    echo "Username not found.";
}

$stmt->close();
$conn->close();

?>