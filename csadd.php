<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "egway";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(! $conn ) {
    die('Could not connect: ' . mysql_error());
 }

if(isset($_POST['enter']))
{
    $name = $_POST['name'];
    $revnum = $_POST['revnum'];
    $flightcode = $_POST["flightcode"];
    $flightcode2 = $_POST["flightcode2"];
    $flightcode3 = $_POST["flightcode3"];
    $date = $_POST["date"];
    
    $sql = " INSERT INTO `reservations`(`name`, `rev_num`, `f_code`, `f_code2`, `f_code3`, `date`) 
    VALUES ('$name','$revnum','$flightcode','$flightcode2','$flightcode3','$date')";
    $result=mysqli_query($conn,$sql);
    $message = "Record Added Successfull";
}


?>
<?php include "csmenu.php";?>

<h2> Add Reservation </h2>
<form action="" method="post">
<div>
    <?php if(isset($message)) { echo $message; } ?>
</div>
  Name:<br>
  <input type="text" name="name"><br> 
  Reservation Number:<br>
  <input type="text" name="revnum"> <br> 
  Flight Code:<br>
  <input type="text" name="flightcode"><br>
  Flight Code 2:<br>
  <input type="text" name="flightcode2"><br>
  Flight Code 3:<br>
  <input type="text" name="flightcode3"><br>
  Date:<br>
  <input type="date" name="date"><br>
  
  <input type="submit" value="Enter" name="enter">
 
</form>