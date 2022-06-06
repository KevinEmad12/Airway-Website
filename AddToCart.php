<?php
    session_start();
    // Create connection
    $conn = new mysqli("localhost", "root", "", "egway");
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    if(!isset($_GET['FCode2']))
    {
      $_GET['FCode2']=NULL;
    }
    if(!isset($_GET['FCode3']))
    {
      $_GET['FCode3']=NULL;
    }
    for($i=0;$i<$_GET['NumOfPassengers'];$i++)
    {
        $sql = "INSERT INTO `reservations`(`name`, `f_code`,`f_code2`,`f_code3`) VALUES ('".$_SESSION['User']."','".$_GET['FCode']."','".$_GET['FCode2']."','".$_GET['FCode3']."')";
        $result = $conn->query($sql);
    }
    $conn->close();
?>