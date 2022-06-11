<?php
include "csmenu.php";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "egway";

$conn = new mysqli($servername, $username, $password, $dbname);
if(! $conn ) {
    die('Could not connect: ' . mysql_error());
 }

$query = "SELECT * FROM reservations";
$result = mysqli_query($conn,$query);

if(isset($_POST['save']))
{
	$checkbox = $_POST['check'];
	for($i=0; $i < count($checkbox); $i++)
    {
        $del_id = $checkbox[$i]; 
        $sql="DELETE FROM reservations WHERE rev_num ='".$del_id."'";
        mysqli_query($conn,$sql);
        $message = "Data deleted successfully !";
}
}
?>

<html>
    <head>
        <title>Delete Reservation</title>
        <link rel="stylesheet" href="customerservicestyle.css">
    </head>
<body>
<div class ="title"> Delete Reservation </div> 
<div class = "FlightCardTopBar"> </div> 
<div class ="FlightCard">
<form method="post" action="">
<div>
    <?php if(isset($message)) { echo $message; } ?>
</div>
<div style="padding-bottom:5px;"></div>
<table class="table">
<thead>
<tr>
	<th> Name</th>
	<th>Reservation Numbmer</th>
	<th>Flight Code</th>
    <th>Flight Code2</th>
    <th>Flight Code3</th>
	<th>Date</th>
    <th>Delete </th>
	 
</tr>
</thead>
<?php
 
while($row = mysqli_fetch_array($result)) 
{
?>
<tr>
	<td><?= $row['name']; ?></td>
	<td><?= $row['rev_num']; ?></td>
	<td><?=  $row['f_code']; ?></td>
	<td><?= $row['f_code2']; ?></td>
    <td><?= $row['f_code3']; ?></td>
    <td><?= $row['date']; ?></td>
    <td><input type="checkbox" id="checkItem" name="check[]" value="<?php echo $row["rev_num"]; ?>"></td>
</tr>
<?php
 
}
?>
</table>
<p><button type="submit" class="button" name="save" onclick="return confirm('Are you sure you want to delete this item?');" >DELETE</button></p>
</form>
</div>
</body>
</html>
