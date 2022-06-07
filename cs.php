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
    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">

<input type="radio" class="btn-check" name="btnradio" id="btnradio0" autocomplete="off"  onclick=sort(0) >
<label class="btn btn-outline-primary" for="btnradio0">All</label>


<input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" onclick=sort(1) >
<label class="btn btn-outline-primary" for="btnradio1">Enabled</label>

<input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" onclick=sort(2) >
<label class="btn btn-outline-primary" for="btnradio2">Disabled</label>

</div> 

</head>
  
<body>


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
    $counter =0;
    while($row = $result->fetch_assoc()){
        ?>

   
    <tr id="<?php echo $row["natid"] ;?>">
    
    <td> <h4 ><?php echo $row['Full Name'] ?></h4> </td>
      <td> <p ><?php echo $row['natid'] ?></p> </td>
      <td><p ><?php echo $row['role'] ?></p> </td>
      <td>   <small><i><?php echo $row['date_time'] ?></i></small>  </td>
<td>    <input type = "text" id="<?php echo $counter; ?>">  </input>                        </td>
      <p>
     <td>   <button type="button" class="btn btn-success" value="<?php echo $row["natid"] ;?>" onclick=accept() >Enable</button> </td>
     <td>   <button type="button" class="btn btn-danger"  value="<?php echo $row["natid"] ;?>" onclick=reject(<?php echo $counter; ?>) >Disable</button> </td>
     <td>   <button type="button" class="btn btn-success" value="<?php echo $row["natid"] ;?>" onclick=promote() >promote</button> </td>
      </p>
   
    </tr>
    
<?php
$counter+=1;
    } ?>
</table>

<?php
}else{
    echo "No Pending Requests.";
}
?>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>customer service</title>

    <script>
function accept() { let x= event.target.value;
   
   jQuery.ajax({
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

function reject(input) { 
let x= event.target.value;

let tex=document.getElementById(input).value; //---->1
alert(tex);
let z=document.getElementById(x);
$.ajax({
     type: "POST",
     url: 'qc_cs_reject.php',
     data: {
      i:x ,
    y:tex
     },
     success:function(data)
              {
                z.parentNode.removeChild(z);
                 alert(data);                        
              }

});
}

    </script>


</body>
</html>