<!DOCTYPE html>
<html lang="en">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script
src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requests</title>


</head>
  
<body>
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
    ?>

    <table>
    <tr>
<th>Full name</th>

    </tr>
    <?php
    while($row = $result->fetch_assoc()){
        ?>

    <tr>
    <td><h1 ><?php echo $row['Full Name'] ?></h1> <td>
      <p ><?php echo $row['NatID'] ?></p>
      <p ><?php echo $row['role'] ?></p>
      <p>
        <button value="<?php echo $row["NatID"] ;?>" onclick=accept() >Accept</button>
        <button value="<?php echo $row["NatID"] ;?>" onclick=reject() >Reject</button>
      </p>
    <small><i><?php echo $row['date_time'] ?></i></small>
    </tr>
   ?>
<?php
   
}?>
 </table>
 <?php
}else{
    echo "No Pending Requests.";
}
?>










</body>
<script>
function accept() { let x= event.target.value;
   
      $.ajax({
           type: "POST",
           url: 'qc_accept.php',
           data: {
            i:x 
           },
           success:function(data)
                    {
                       alert(data);                        
                    }

      });
 }

function reject() { let x= event.target.value;
   
   $.ajax({
        type: "POST",
        url: 'qc_reject.php',
        data: {
         i:x 
        },
        success:function(data)
                 {
                    alert(data);                        
                 }

   });
}


    </script>
</html>