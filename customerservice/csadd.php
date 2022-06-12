<?php include "csmenu.php";?>

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
    
   if (is_numeric($revnum) && !is_numeric($name)) {
        $sql = " INSERT INTO `reservations`(`name`, `rev_num`, `f_code`, `f_code2`, `f_code3`, `date`) 
        VALUES ('$name','$revnum','$flightcode','$flightcode2','$flightcode3','$date')";
        $result=mysqli_query($conn,$sql);
        $message = "Record Added Successfull";
    } 
    if(!is_numeric($revnum) || is_numeric($name)) {
        $message = "Reservation Number OR Name is not valid!";
    }  
}

?>
<html>
<head>
    <title>Add Reservation</title>
    <link rel="stylesheet" href="customerservicestyle.css">
</head>

<body>
<div class ="title"> Add Reservation </div>
<div class = "FlightCardTopBar"> </div> 
<div class ="FlightCard">
    <form action="" method="post" class="">
<div class="error"><?php if(isset($message)) { echo $message; } ?></div>
    Name:<br>
    <input type="text" name="name" required><br> 
    Reservation Number:<br>
    <input type="text" name="revnum" required> <br> 
    Flight Code:<br>
    <input type="text" name="flightcode" required><br>
    Flight Code 2:<br>
    <input type="text" name="flightcode2"><br>
    Flight Code 3:<br>
    <input type="text" name="flightcode3"><br>
    Date:<br>
    <input type="date" name="date" class="date" required><br>
    <input type="submit" value="Enter" name="enter" class="button">
</div>
</form>
</body>
</html>
