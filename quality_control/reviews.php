<html>




<body>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "egway";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$rate=$_POST['i'];
if($rate==0){
    $query= "SELECT * FROM reservations WHERE comment IS NOT NULL";
}else{
    $query= "SELECT * FROM reservations WHERE comment IS NOT NULL AND `rate` = '$rate' ";
}

$result= mysqli_query($conn,$query);
$req_count=mysqli_num_rows($result);
if($req_count>0){
    ?>
    <table class="table table-striped table-hover table-bordered">
        <tr>
        <th>name</th>
        <th>flight code</th>
        <th>rate</th>
        <th>comment</th>
        <th>date</th>
        </tr>

        <?php 
    while($row = $result->fetch_assoc()){
        ?>
<tr>
    <td>    <h1><?php echo $row['name'] ?>  </h1>  </td>
      <td>  <p> <?php echo $row['f_code'] ?>    </p></td>
     <td>   <p> <?php echo $row['rate'] ?>  </p></td>
     <td>   <p> <?php echo $row['comment'] ?>   </p> </td>
    <td><small><i><?php echo $row['date'] ?>    </i></small> </td>
    </tr>

<?php
    }
    ?>

    </table>
    <?php
}
else{
    echo "No Pending Requests.";
}
?>
</body>
</html>