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
    <title>Search For A Flight</title>
    <link rel="stylesheet" href="customerservicestyle.css">
</head>
<body>
    <div class ="title"> Search For A Flight </div>    
    <form method="post" action="">
        <div class="search" > Flight Code: </div> 
          <div> <input class="searchtext" type="text" placeholder="example: CA0001PA" name="flightcode" required> </div>
        <p><button class="searchbutton" type="submit" name="save">Search</button></p>
    </form>
</body>
</html>

        