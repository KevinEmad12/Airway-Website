<?php
 include "csmenu.php";

 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "egway";
 session_start();
 
 $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(! $conn) 
    {
        die('Could not connect: ' . mysql_error());
    }

    if(isset($_POST['submit'])) 
    {
        $sql="UPDATE reservations set name='" . $_POST['name'] . "',rev_num='" . $_POST['rev_num'] . "',f_code='" . $_POST['f_code']. "',f_code2='" . $_POST['f_code2']. "',f_code3='" . $_POST['f_code3']. "',date='" . $_POST['date']  
         . "' WHERE rev_num='" .  $_GET['rev_num'] . "'";
     
        mysqli_query($conn,$sql);
        $message = "Record Modified Successfully";
    }
    $result = mysqli_query($conn,"SELECT * FROM reservations WHERE rev_num='" . $_GET['rev_num'] . "'");
    $row= mysqli_fetch_array($result);
?>

<html>
<head>
    <title>Edit Reservation</title>
    <link rel="stylesheet" href="customerservicestyle.css">
</head>
<body>
    <div class="title">Edit Reservation:</div>
    <div class = "FlightCardTopBar"> </div> 
    <div class ="FlightCard">
<form method="post" action="">
<div>
    <?php if(isset($message)) { echo $message; } ?>
</div>
<div style="padding-bottom:5px;"></div>
Name: <br>
<input type="text" name="name" value="<?php echo $row['name']; ?>">
<br>
Reservation Number:<br>
<input type="text" name="rev_num"  value="<?php echo $row['rev_num']; ?>">
<br>
Flight Code: <br>
<input type="text" name="f_code"  value="<?php echo $row['f_code']; ?>">
<br>
Flight Code2: <br>
<input type="text" name="f_code2"  value="<?php echo $row['f_code2']; ?>">
<br>
Flight Code3: <br>
<input type="text" name="f_code3"  value="<?php echo $row['f_code3']; ?>">
<br>
Date: <br>
<input type="text" name="date" class="date" value="<?php echo $row['date']; ?>">
<br>
<input type="submit" name="submit" class="button" value="Update">
</form>
</div>
</body>
</html>
