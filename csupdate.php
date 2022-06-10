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
    <title>Edit Reservation</title>
    <link rel="stylesheet" href="customerservicestyle.css">
</head>
<body>
<div class ="title"> Edit Reservation </div> 
<div class = "FlightCardTopBar"> </div> 
<div class ="FlightCard">
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
        <tr>
            <td><?= $row['name']; ?></td>
            <td><?= $row['rev_num']; ?></td>
            <td><?=  $row['f_code']; ?></td>
            <td><?= $row['f_code2']; ?></td>
            <td><?= $row['f_code3']; ?></td>
            <td><?= $row['date']; ?></td>
        <td><a href="csupdateaction.php?rev_num=<?php echo $row["rev_num"];?>"> Edit </a></td>
        </tr>
<?php
        $i++;
    }
?>
</table>
</div>
</body>
</html>
