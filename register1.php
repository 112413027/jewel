<?php

$conn = new mysqli("localhost", "root", "", "bakery1_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

 
// Get the values from the registration form
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$mobile = trim($_POST['mobile']);
$username = trim($_POST['username']);
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];


// Check if passwords match
if ($password !== $confirm_password) {
    die("Passwords do not match.");
}


// Check full name
if (!preg_match("/^[A-Za-z ]{1,30}$/", $name)) {
    die("Name should contain only letters and spaces.");
}


// Check mobile number
if (!preg_match("/^[6-9][0-9]{9}$/", $mobile)) {
    die("Enter a valid mobile number.");
}


// Check password
if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@#$%^&+=!]).{8,20}$/", $password)) {
    die("Password must contain uppercase, lowercase, number and special character.");
}


// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);


// Insert the data into users table
$sql = "INSERT INTO users
        (name, email, mobile, username, password, confirm_password)
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param(
    "ssssss",
    $name,
    $email,
    $mobile,
    $username,
    $hashed_password,
    $hashed_password
);


// Execute the query
if ($stmt->execute()) {

    echo "Registration successful!";

    echo "<br><br>";

    echo "<a href='login.html'>Go to Login</a>";

} else {

    echo "Registration failed.";
}

$stmt->close();
$conn->close();

?>