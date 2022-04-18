<?php
	$connection=new mysqli('localhost','root','','EGWay');
	if($connection->connect_error)
		die("not found");
	else 
	    $query="INSERT INTO `airplane`(`MSN`, `AirCraftType`, `NumEconomySeats`, `NumBusinessSeats`) VALUES ('".$_POST['MSN']."','".$_POST['AirCraftType']."','".$_POST['NumEconomySeats']."','".$_POST['NumBusinessSeats']."')";
	    $result=$connection->query($query);
?>