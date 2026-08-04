<?php

$contacts = array(
    "John" => "9876543210",
    "Mary" => "9123456780",
    "David" => "9001234567",
    "Ravi" => "9871234560",
    "Priya" => "9988776655"
);

$name = trim($_POST['name']);

echo "<h2>Search Result</h2>";

if(array_key_exists($name, $contacts))
{
    echo "<p><b>Name:</b> $name</p>";
    echo "<p><b>Mobile Number:</b> ".$contacts[$name]."</p>";
}
else
{
    echo "<p>Contact not found.</p>";
}

echo "<br><a href='internal1.html'>Back</a>";

?>
