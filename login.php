<html>

<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab06";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if(isset($_POST["submit"])){ //check if form was submitted

	$sql="Select * from from user Where Email = '".$_POST["email"]."' and Password='".$_POST["password"]."' ";
	
  $result = mysqli_query($conn,$sql);		
	
  if($row=mysqli_fetch_array($result))	
	{
		$_SESSION["ID"]=$row[0];
    $_SESSION["name"]=$row["fname"];
    $_SESSION["emial"]=$row["email"];
    $_SESSION["password"]=$row["password"];
    $_SESSION["address"]=$row["address"];

		
		header("Location:home.php");
	}
	else	
	{
		echo "Invalid Email or Password";
	}
}
?>



<h1>login</h1>


<form  method="post">
 
  Email:<br>
  <input type="text" name="email"><br>
  Password:<br>
  <input type="Password" name="password"><br>
  <input type="submit" value="Submit" name="Submit">
  <input type="reset">
</form>
















</html>