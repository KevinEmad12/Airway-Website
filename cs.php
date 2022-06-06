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

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "egway";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$query= "SELECT * FROM `users` WHERE `role` = 'cs' ";
$result= mysqli_query($conn,$query);
$req_count=mysqli_num_rows($result);
if($req_count>0){
    ?>
   
  <table  class="table table-striped table-hover table-bordered">
    <tr>
<th>Full name</th>
<th>NatID</th>
<th>role</th>
<th>date/time</th>
<th>comment</th>
<th>Enable</th>
<th>Disable</th>
<th>promote</th>



    </tr>
    <?php
    while($row = $result->fetch_assoc()){
        ?>

   
    <tr id="<?php echo $row["natid"] ;?>">
    <td> <h4 ><?php echo $row['Full Name'] ?></h4> </td>
      <td> <p ><?php echo $row['natid'] ?></p> </td>
      <td><p ><?php echo $row['role'] ?></p> </td>
      <td>   <small><i><?php echo $row['date_time'] ?></i></small>  </td>
<td><textarea id="text"> </textarea></td>
      <p>
     <td>   <button type="button" class="btn btn-success" value="<?php echo $row["natid"] ;?>" onclick=accept() >Enable</button> </td>
     <td>   <button type="button" class="btn btn-danger" value="<?php echo $row["natid"] ;?>" onclick=reject() >Disable</button> </td>
     <td>   <button type="button" class="btn btn-success" value="<?php echo $row["natid"] ;?>" onclick=promote() >promote</button> </td>
      </p>
   
    </tr>
    
<?php
    } ?>
</table>

<?php
}else{
    echo "No Pending Requests.";
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>customer service</title>

    <script>
function accept() { let x= event.target.value;
   
   $.ajax({
        type: "POST",
        url: 'qc_cs_accept.php',
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
let tex=document.getElementById(text).innerText;
$.ajax({
     type: "POST",
     url: 'qc_cs_reject.php',
     data: {
      i:x , y:tex
     },
     success:function(data)
              {
                 alert(data);                        
              }

});
}

    </script>
</head>
  
<body>
    




</body>
</html>