<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "egway";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$query= "UPDATE `users` SET `status`='1' WHERE `natid`= ".$_POST['i']."";
$result= mysqli_query($conn,$query);
echo "rejected successfully";

?>