<!DOCTYPE html>
<html>
<head>
    <title>Library Membership Form</title>

    <style>
        body{
            font-family:Arial;
            background:#f2f2f2;
        }

        .container{
            width:700px;
            margin:auto;
            background:white;
            padding:20px;
            border-radius:10px;
            box-shadow:0 0 10px gray;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        td{
            padding:8px;
        }

        h2{
            text-align:center;
            color:darkblue;
        }

        input, textarea, select{
            width:95%;
            padding:8px;
        }

        input[type=radio],
        input[type=checkbox]{
            width:auto;
        }

        textarea{
            resize:none;
        }

        .btn{
            width:120px;
            background:green;
            color:white;
            border:none;
            padding:10px;
            cursor:pointer;
        }

        .btn:hover{
            background:darkgreen;
        }
    </style>

</head>

<body>

<div class="container">

<h2>Library Membership Form</h2>

<form method="post">

<fieldset>

<legend><b>Member Details</b></legend>

<table border="1">

<tr>
<td><label>Full Name</label></td>
<td><input type="text" name="name" required></td>
</tr>

<tr>
<td><label>Email</label></td>
<td><input type="email" name="email" required></td>
</tr>

<tr>
<td><label>Phone Number</label></td>
<td><input type="text" name="phone" required></td>
</tr>

<tr>
<td><label>Age</label></td>
<td><input type="number" name="age" required></td>
</tr>

<tr>
<td><label>Date of Birth</label></td>
<td><input type="date" name="dob" required></td>
</tr>

<tr>
<td><label>Gender</label></td>
<td>
<input type="radio" name="gender" value="Male" required> Male
<input type="radio" name="gender" value="Female"> Female
<input type="radio" name="gender" value="Other"> Other
</td>
</tr>

<tr>
<td><label>Membership Type</label></td>
<td>
<select name="membership">
<option>Student</option>
<option>Regular</option>
<option>Premium</option>
<option>Lifetime</option>
</select>
</td>
</tr>

<tr>
<td><label>Preferred Sections</label></td>
<td>
<input type="checkbox" name="section[]" value="Science"> Science<br>
<input type="checkbox" name="section[]" value="Technology"> Technology<br>
<input type="checkbox" name="section[]" value="Literature"> Literature<br>
<input type="checkbox" name="section[]" value="History"> History
</td>
</tr>

<tr>
<td><label>Address</label></td>
<td>
<textarea rows="4" name="address"></textarea>
</td>
</tr>

<tr>
<td colspan="2" align="center">
<button class="btn" type="submit" name="submit">Submit</button>
<button class="btn" type="reset">Reset</button>
</td>
</tr>

</table>

</fieldset>

</form>

<?php

if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $age=$_POST['age'];
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];
    $membership=$_POST['membership'];
    $address=$_POST['address'];

    if(isset($_POST['section']))
        $sections=implode(", ",$_POST['section']);
    else
        $sections="None";

    $message="Library Membership Details\n\n";
    $message.="Name : $name\n";
    $message.="Email : $email\n";
    $message.="Phone : $phone\n";
    $message.="Age : $age\n";
    $message.="Date of Birth : $dob\n";
    $message.="Gender : $gender\n";
    $message.="Membership : $membership\n";
    $message.="Preferred Sections : $sections\n";
    $message.="Address : $address";

    echo "<script>alert(".json_encode($message).");</script>";

    echo "<hr>";
    echo "<h2>Membership Details</h2>";

    echo "<table border='1' cellpadding='8' width='100%'>";
    echo "<tr><td><b>Name</b></td><td>$name</td></tr>";
    echo "<tr><td><b>Email</b></td><td>$email</td></tr>";
    echo "<tr><td><b>Phone</b></td><td>$phone</td></tr>";
    echo "<tr><td><b>Age</b></td><td>$age</td></tr>";
    echo "<tr><td><b>Date of Birth</b></td><td>$dob</td></tr>";
    echo "<tr><td><b>Gender</b></td><td>$gender</td></tr>";
    echo "<tr><td><b>Membership</b></td><td>$membership</td></tr>";
    echo "<tr><td><b>Preferred Sections</b></td><td>$sections</td></tr>";
    echo "<tr><td><b>Address</b></td><td>$address</td></tr>";
    echo "</table>";
}

?>

</div>

</body>
</html>