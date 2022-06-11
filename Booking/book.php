<?php
session_start();
// Create connection
$conn = new mysqli("localhost", "root", "", "egway");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "UPDATE `reservations` SET `status`='Ordered' ,`date`=NOW()  WHERE `name`='".$_SESSION['User']."'";
$result = $conn->query($sql);
?>