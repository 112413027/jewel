<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "bakery_shop"
);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

?>