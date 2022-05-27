
<!-- http://localhost/labs/lab%206%20/signup.php?  -->

<html>

<h1>SignUp</h1>

<form action="" method="post" enctype="multipart/form-data">
  Name:<br>
  <input type="text" name="Name"><br> 
  first name:<br>
  <input type="text" name="fName"><br> 
 last Name:<br>
  <input type="text" name="lName"><br> 
  mobile number:<?php echo $mobileError; ?> <br>
  <input type="text" name="mobile"><br> 
  gender :<br>
  male:<input type="radio" name="gender" value="male"> 
  female:<input type="radio" name="gender" value="female"><br> 

  address :<br> <input type="text" name= "address"><br>
  <!--birthday -->
  <!--   ROLE  -->
  Email:<?php echo $emailError; ?> <br>
  <input type="text" name="email"><br>
  Password:<?php echo $passworderror; ?> <br>
  <input type="Password" name="password"><br>
  Profile Picture:<input type="file" name="image" ><br> 
  <input type="submit" value="Submit" name="Submit">
  <input type="reset">
</form>



<!--
//--<<Database>> --\\
-->


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "egway" ;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$emailError="";
$mobileError="";
$passworderror="";

if(isset($_POST["submit"])){ //check if form was submitted
  
	$image = $_FILES['image']['name'];
	$target = "images/".$image;
	move_uploaded_file($_FILES['image']['tmp_name'], $target);
	
	if(empty($_POST['email'])) //check if email is empty 
	{
		$emailError="Email is required";
	}
//  validates email
	else if(filter_var($_POST["email"],FILTER_SANITIZE_EMAIL)==false)
	{
		$emailError="Email contains illlegal charctars";
	}

//checks if mobile number  lower than or equal to 15 
	if(filter_var($_POST["mobile"],FILTER_VALIDATE_INT,["options" => ["max_range" => 15]])==false){

$mobileError="number of charcters is bigger than 15";

	}

	//password checks 
	
	else if(strlen($_POST["password"])<16){
$passworderror="";

	}

	if (!preg_match("#[0-9]+#", $_POST["password"])) {
        $passworderror = "Password must include at least one number! ";
    }

    if (!preg_match("#[a-zA-Z]+#", $_POST["password"])) {
        $passworderror += "  Password must include at least one letter!";
    }     


	else
	{
		$sql="INSERT INTO `user`(`NatID`, `Email`, `Password`, `Mobile`, `FirstName`, `LastName`, `Gender`, `DOB`, `Role`, `Address`,`Image`) 
		VALUES ('".$_POST[""]."','".$_POST["email"]."','".$_POST["password"]."]','".$_POST["mobile"]."','".$_POST["fname"]."','".$_POST["lname"]."','".$_POST["gender"]."','".$_POST[""]."','".$_POST[""]."','".$_POST["address"]."','$image')";
		
		$result=mysqli_query($conn,$sql);
		if($result)	
		{
			header("Location:HomePage.html");
		}
		else
		{
			echo $sql;
		}
	}
}
?>
</html>
