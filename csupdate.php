<style>
table, th, td {
  border: 1px solid black;
}

</style>
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
 $query = "SELECT * FROM reservations";
 $result = mysqli_query($conn,$query);

?>

<!DOCTYPE html>
<html>
<head>  
</head>
<body>
<table>
<tr>
    <th>Name</th>
	<th>Reservation Numbmer</th>
	<th>Flight Code</th>
    <th>Flight Code2</th>
    <th>Flight Code3</th>
	<th>Date</th>
    <th>Edit</th>
</tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) 
{
 
?>
<tr class="<?php if(isset($classname)) echo $classname;?>">
<td><?= $row['name']; ?></td>
	<td><?= $row['rev_num']; ?></td>
	<td><?=  $row['f_code']; ?></td>
	<td><?= $row['f_code2']; ?></td>
    <td><?= $row['f_code3']; ?></td>
    <td><?= $row['date']; ?></td>
<td><a href="updateaction.php?id=<?php echo $row["id"]; ?>">Edit</a></td>
</tr>
<?php
    $i++;
}
?>
</table>
</body>
</html>