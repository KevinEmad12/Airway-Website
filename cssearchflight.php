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

// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    if(! $conn ) {
        die('Could not connect: ' . mysql_error());
     }
    $query = "SELECT * FROM trips";
    $result = mysqli_query($conn,$query);

    if(isset($_POST['save']))
    {
        
        $sql="SELECT * from trips WHERE FlightCode='".$_POST['flightcode']."'";
        $result = mysqli_query($conn,$sql);
    
        echo"<table >
    
        <tr>
        
            <th> Flight Code </th>
            <th>From Airport</th>
            <th>Destination</th>
            <th>Date</th>
            <th> Price</th>
            
          
             
        </tr>";
    while($row = mysqli_fetch_array($result)) 
    {
        ?>
        <tr>
    
        <td><?= $row['FlightCode']; ?></td>
        <td><?= $row['FromAirPort']; ?></td>
        <td><?=  $row['Destination']; ?></td>
        <td><?= $row['f_date']; ?></td>
        <td><?= $row['price']; ?></td>

        </tr>
        <?php
    }
    
    }
?>

<html>
<head>
    
</head>
<form method="post" action="">
Flight Code: <input type="text" name="flightcode">
 
<p><button type="submit" name="save">Search</button></p>

</html>