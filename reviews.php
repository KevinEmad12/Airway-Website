<!DOCTYPE html>
<html lang="en">
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "egway";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$query= "SELECT * from reservations where comments IS NOT NULL";
$result= mysqli_query($conn,$query);
$req_count=mysqli_num_rows($result);
if($req_count>0){
    foreach(fetchAll($query) as $row){
        ?>

    <h1 ><?php echo $row['name'] ?></h1>
      <p ><?php echo $row['FlightCode'] ?></p>
      <p ><?php echo $row['rate'] ?></p>
      <p ><?php echo $row['comment'] ?></p>
      
    <small><i><?php echo $row['date'] ?></i></small>
<?php
    }
}else{
    echo "No Pending Requests.";
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reviews</title>

    <script></script>
</head>
  
<body>
    




</body>
</html>