<!DOCTYPE html>
<html lang="en">
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "egway";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$query= "SELECT * from users where status is NULL";
$result= mysqli_query($conn,$query);
$req_count=mysqli_num_rows($result);
if($req_count>0){
    while($row = $result->fetch_assoc()){
        ?>

    <h1 ><?php echo $row['Full Name'] ?></h1>
      <p ><?php echo $row['NatID'] ?></p>
      <p ><?php echo $row['role'] ?></p>
      <p>
        <button onclick=onclick(1) >Accept</button>
        <button onclick=onclick(0)>Reject</button>
      </p>
    <small><i><?php echo $row['date_time'] ?></i></small>
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
    <title>Requests</title>

    <script>
function onclick(i) {
    if(i>0){
      $.ajax({
           type: "POST",
           url: 'qc_accept.php',
           data: $row['NatID'],
           success:function(data)
                    {
                       alert(data);                        
                    }

      });
 }else{

    $.ajax({
           type: "POST",
           url: 'qc_reject.php',
           data: row['NatID']

      });
 }


}

    </script>
</head>
  
<body>
    




</body>
</html>