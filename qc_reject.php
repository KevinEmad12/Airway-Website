<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "egway";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$query= "UPDATE users SET status='false' WHERE NatID is ".$_POST['NatID']."";
$result= mysqli_query($conn,$query);


?>