<?php
if (
    empty($_POST["memberid"]) ||
    empty($_POST["fullname"]) ||
    empty($_POST["email"]) ||
    empty($_POST["phone"]) ||
    empty($_POST["address"]) ||
    empty($_POST["gender"])
) {
    echo "<h2 style='color:red;'>❌ Library Membership Registration Failed!</h2>";
    echo "<hr>";
    echo "<b>Reason:</b> One or more required fields are missing.<br><br>";
    echo "Please fill in all the mandatory fields and submit the form again.<br><br>";
    echo "<a href='library3.html'>⬅ Go Back to Registration Form</a>";
    exit();
}

$memberid = $_POST["memberid"];
$fullname = $_POST["fullname"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$membership = $_POST["membership"];
$gender = $_POST["gender"];

$books = "None";

if (isset($_POST["books"])) {
    $books = implode(", ", $_POST["books"]);
}

echo "<h2 style='color:green;'>✅ Library Membership Registered Successfully!</h2>";
echo "<hr>";

echo "<b>Member ID:</b> $memberid <br><br>";
echo "<b>Full Name:</b> $fullname <br><br>";
echo "<b>Email:</b> $email <br><br>";
echo "<b>Phone Number:</b> $phone <br><br>";
echo "<b>Address:</b> $address <br><br>";
echo "<b>Membership Type:</b> $membership <br><br>";
echo "<b>Gender:</b> $gender <br><br>";
echo "<b>Preferred Books:</b> $books <br><br>";

echo "<hr>";
echo "<h3 style='color:green;'>Thank you for registering with our library.</h3>";
?>
