<?php
    session_start();
    // Create connection
    $conn = new mysqli("localhost", "root", "", "egway");
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    for($i=0;$i<$_GET['NumOfPassengers'];$i++)
        $sql = "INSERT INTO reservations (`User`, `FlightCode`) VALUES ('".$_SESSION['User']."','".$_GET['FCode']."')";
    $result = $conn->query($sql);
    $conn->close();
?>