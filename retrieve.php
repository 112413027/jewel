<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>User Data</title>
</head>

<body>

<h2>Retrieved User Data</h2>

<p>
    <strong>ID:</strong>
    <?php echo htmlspecialchars($_SESSION['user_id']); ?>
</p>

<p>
    <strong>Name:</strong>
    <?php echo htmlspecialchars($_SESSION['name']); ?>
</p>

<p>
    <strong>Email:</strong>
    <?php echo htmlspecialchars($_SESSION['email']); ?>
</p>

<p>
    <strong>Mobile:</strong>
    <?php echo htmlspecialchars($_SESSION['mobile']); ?>
</p>

<p>
    <strong>Username:</strong>
    <?php echo htmlspecialchars($_SESSION['username']); ?>
</p>

<p>
    <strong>Password (hashed):</strong>
    <?php echo htmlspecialchars($_SESSION['password']); ?>
</p>

<p>
    <strong>Confirm Password (hashed):</strong>
    <?php echo htmlspecialchars($_SESSION['confirm_password']); ?>
</p>

</body>
</html>
