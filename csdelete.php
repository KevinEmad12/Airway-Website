<style>
table, th, td 
{
  border: 1px solid black;
}

</style>
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
        $sql="DELETE FROM reservations WHERE id='".$del_id."'";
        mysqli_query($conn,$sql);
        $message = "Data deleted successfully !";
        echo ($message);
}
}
?>

<html>
    <h2> Delete Reservation</h2>
<form method="post" action="">
<table class="table table-bordered">
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
    <td><input type="checkbox" id="checkItem" name="check[]" value="<?php echo $row["id"]; ?>"></td>
</tr>
<?php
 
}
?>
</table>
<p><button type="submit" class="btn btn-success" name="save">DELETE</button></p>
</form>

</body>
</html>
</html>