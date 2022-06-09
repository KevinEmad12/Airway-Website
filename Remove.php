<?php
    $conn = new mysqli("localhost", "root", "", "egway");
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $sql = "DELETE FROM `reservations` WHERE `rev_num`='".$_GET['REVCode']."'";
    $result = $conn->query($sql);
    $conn->close();
?>
