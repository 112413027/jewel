<?php
if (
    empty($_POST["memberid"]) ||
    empty($_POST["fullname"]) ||
    empty($_POST["email"]) ||
    empty($_POST["phone"]) ||
    empty($_POST["address"]) ||
    empty($_POST["gender"])
) {
    echo "<h2>Library Membership Registration Failed!</h2>";
    echo "Please fill all the required fields.";
    exit();
}

$memberid = $_POST["memberid"];
$fullname = $_POST["fullname"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$membership = $_POST["membership"];
$gender = $_POST["gender"];

$books = "";

if (isset($_POST["books"])) {
    $books = implode(", ", $_POST["books"]);
}

echo "<h2>Library Membership Details</h2>";

echo "Member ID : " . $memberid . "<br><br>";
echo "Full Name : " . $fullname . "<br><br>";
echo "Email : " . $email . "<br><br>";
echo "Phone Number : " . $phone . "<br><br>";
echo "Address : " . $address . "<br><br>";
echo "Membership Type : " . $membership . "<br><br>";
echo "Gender : " . $gender . "<br><br>";
echo "Preferred Books : " . $books . "<br><br>";

echo "<h3>Library Membership Registered Successfully!</h3>";

?>
