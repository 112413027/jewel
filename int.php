<?php

// Mobile directory data
$directory = array(
    "9876543210" => array(
        "name" => "Arun Kumar",
        "address" => "Chennai, Tamil Nadu"
    ),

    "9123456789" => array(
        "name" => "Priya Sharma",
        "address" => "Bangalore, Karnataka"
    ),

    "9000011111" => array(
        "name" => "Rahul Kumar",
        "address" => "Madurai, Tamil Nadu"
    )
);


// Get searched mobile number
$mobile = $_POST['mobile'];

?>

<body>

<div class="box">

<h2>Mobile Directory Result</h2>

<?php

if(array_key_exists($mobile, $directory))
{
    echo "<p><b>Mobile Number:</b> ".$mobile."</p>";
    echo "<p><b>Owner Name:</b> ".$directory[$mobile]["name"]."</p>";
    echo "<p><b>Address:</b> ".$directory[$mobile]["address"]."</p>";
}
else
{
    echo "<h3 style='color:red'>Mobile Number Not Found</h3>";
}

?>

<br>
<a href="internal1.html">Search Again</a>

</div>

</body>
</html>