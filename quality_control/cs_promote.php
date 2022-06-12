<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "egway";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$query= "UPDATE `users` SET `role`='qc' WHERE `NatID`= '".$_POST['i']."'";
$result= $conn->query($query);
echo "promoted successfully";

?>