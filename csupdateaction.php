<?php
include "csmenu.php";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "egway";
session_start();

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(! $conn ) {
    die('Could not connect: ' . mysql_error());
}
    

if(isset($_POST['submit'])) 
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $revnum = $_POST['rev_num'];
    $f_code = $_POST['f_code'];
    $f_code2= $_POST['f_code2'];
    $f_code3 = $_POST['f_code3'];
    $date = $_POST['date'];



    $sql = "UPDATE reservations set name = '$name', rev_num = '$revnum', f_code = '$f_code', f_code2='$f_code2', f_code3 = $f_code3, date = '$date' where id = $id";
   
    $result = mysqli_query($conn,$sql);     
    $message = "Record Modified Successfully";

}


$query = "SELECT * FROM reservations where id='" . $_GET['id'] . "'";
$result = mysqli_query($conn,$query);
$row= mysqli_fetch_array($result);


?>


<html>
<head>
<title>Update Reservation</title>
</head>
<body>
<form method="post" action="">
<div>
    <?php if(isset($message)) { echo $message; } ?>
</div>

<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
<br>
Name: <br>
<input type="text" name="name" value="<?php echo $row['name']; ?>">
<br>
Reservation Number:<br>
<input type="text" name="rev_num"  value="<?php echo $row['rev_num']; ?>">
<br>
Flight Code: <br>
<input type="text" name="f_code"  value="<?php echo $row['f_code']; ?>">
<br>
Flight Code2: <br>
<input type="text" name="f_code2"  value="<?php echo $row['f_code2']; ?>">
<br>
Flight Code3: <br>
<input type="text" name="f_code3"  value="<?php echo $row['f_code3']; ?>">
<br>
Date: <br>
<input type="text" name="date"  value="<?php echo $row['date']; ?>">
<br>
<input type="submit" name="submit" value="Update">
</form>

</body>
</html>
