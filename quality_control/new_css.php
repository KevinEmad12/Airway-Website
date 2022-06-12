<html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "egway";
 include_once 'qc_home.html';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


/*
$emailError="";
$mobileError="";
$passworderror="";

if(isset($_POST["submit"])){ //check if form was submitted

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
$passworderror="small password";

	}

	if (!preg_match("#[0-9]+#", $_POST["password"])) {
        $passworderror = "Password must include at least one number! ";
    }

    if (!preg_match("#[a-zA-Z]+#", $_POST["password"])) {
        $passworderror += "  Password must include at least one letter!";
    }     


	else
	{*/
		$sql="INSERT INTO `users`(`Name`, `Email`, `Password`, `natid`, `phone_num`, `address`, `postal_code`, `country`, `nationality`, `role`, `cs_status`) VALUES ('".$_POST["name"]."','".$_POST["email"]."','".$_POST["password"]."','".$_POST["natid"]."','".$_POST["phone"]."','".$_POST["address"]."','".$_POST["postal_code"]."','".$_POST["country"]."','".$_POST["nationality"]."','".$_POST["role"]."','".$_POST["cs_status"]."')";

		$result=$conn->query($sql);
		
        
        if($result)	
		{
			echo "inserted successfully ";	
			?>		
			<br>
			<button onclick=direct()> add one more</button>
			
			<?php
		}
		

		/*else
		{
			echo $sql;
		}*/

   
   
   
    //}
//}
?>
<script>
	function direct(){
		window.location.href = "http://localhost/github/Airway_website-main/quality_control/new_cs.html?alert=1";
	}
	</script>
</html>