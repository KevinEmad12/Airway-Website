<html>
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

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "egway";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$query= "SELECT * FROM `log` WHERE 1";
$result=$conn->query($query);
$req_count=mysqli_num_rows($result);
if($req_count>0){
    ?>
    <table class="table table-striped table-hover table-bordered">
        <tr>
        <th>date</th>
        <th>who</th>
        <th>action</th>
        <th>description</th>
       
        </tr>

        <?php 
    while($row = $result->fetch_assoc()){
        ?>
<tr>
    <td>    <?php echo $row['date'] ?>    </td>
      <td>  <p> <?php echo $row['who'] ?>    </p></td>
     <td>   <p> <?php echo $row['action'] ?>  </p></td>
     <td>   <p> <?php echo $row['description'] ?>   </p> </td>
    
    </tr>
<?php
    }
    ?>

    </table>
    <?php
}/*else{
    echo "No Pending Requests.";
}*/
?>



</html>