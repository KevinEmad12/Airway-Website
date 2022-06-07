<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "egway";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$query= "UPDATE `users` SET `cs_status`='1' , `cs_comment`='".$_POST['y']."' WHERE `NatID`= '".$_POST['i']."'";
$result= $conn->query($query);
echo "rejected successfully";

?>