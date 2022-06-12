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
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requests</title>


  <!--  <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
  <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
  <label class="btn btn btn-light" for="btnradio1">Light</label>

  <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" onclick="">
  <label class="btn btn-dark" for="btnradio2">Dark</label>

</div>
-->
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
<!--
  <table  class="table table-striped table-hover table-bordered">
    <tr>
<th>Full name</th>
<th>NatID</th>
<th>role</th>
<th>Accept</th>
<th>Reject</th>
<th>date/time</th>

    </tr>-->
    <?php
    while($row = $result->fetch_assoc()){
        ?>

    <!--<tr id="<//?php echo $row["natid"] ;?>">
    <td> <h4 ><//?php echo $row['Full Name'] ?></h4> </td>
      <td> <p ><//?php echo $row['natid'] ?></p> </td>
      <td><p ><//?php echo $row['role'] ?></p> </td>
      <p>
     <td>   <button type="button" class="btn btn-success" value="<//?php echo $row["natid"] ;?>" onclick=accept() >Accept</button> </td>
     <td>   <button type="button" class="btn btn-danger" value="<//?php echo $row["natid"] ;?>" onclick=reject() >Reject</button> </td>
      </p>
    <td>   <small><i><//?php echo $row['date_time'] ?></i></small>  </td>
    </tr>
    -->
    <div class="card" style="width: 18rem;" id="<?php echo $row["natid"] ;?>">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $row['Full Name'] ?></h5>
    <p ><?php echo $row['natid'] ?></p>
    <p class="card-text"><?php echo $row['role'] ?></p>
    <small><i><?php echo $row['date_time'] ?></i></small>   <br>
    <button type="button" class="btn btn-success" value="<?php echo $row["natid"] ;?>" onclick=accept() >Accept</button>
    <button type="button" class="btn btn-danger" value="<?php echo $row["natid"] ;?>" onclick=reject() >Reject</button> </td>
  </div>
</div>
<?php
   
}?>
 <!-- </table> -->
 <?php
}else{
    echo "No Pending Requests.";
}
?>










</body>
<script>
function accept() { 
 let x= event.target.value;
    let z=document.getElementById(x);
    
   
      $.ajax({
           type: "POST",
           url: 'qc_accept.php',
           data: {
            i:x 
           },
           success:function(data)
                    {
                        z.parentNode.removeChild(z);
                       alert(data);                        
                    }

      });
 }

function reject() { 
    let x= event.target.value;
    let z=document.getElementById(x);
   $.ajax({
        type: "POST",
        url: 'qc_reject.php',
        data: {
         i:x 
        },
        success:function(data)
                 {
                    z.parentNode.removeChild(z);
                    alert(data);                        
                 }

   });
}

function light(){
// let z=document.getElementsByClassName("table");


}

    </script>
</html>