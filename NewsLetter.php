<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "egway";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $query="INSERT INTO `subscriptions`(`email`) VALUES ('".$_POST['email']."')";

if ($conn->query($query) === FALSE) {
    echo "Error: " . $query . "<br>" . $conn->error;
  }
  
  $conn->close();

?>