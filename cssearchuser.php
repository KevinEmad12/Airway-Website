<style>
table, th, td {
  border: 1px solid black;
}

</style>

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
    $query = "SELECT * FROM users where role = user";
    $result = mysqli_query($conn,$query);

    if(isset($_POST['save']))
    {
        
        $sql="SELECT * from users WHERE Email='".$_POST['email']."'";
        $result = mysqli_query($conn,$sql);
    
        echo"<table >
    
        <tr>
        
            <th> Full Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>National ID</th>
            <th> Phone Number</th>
            <th>Address ID</th>
            <th>Postal Code ID</th>
            <th>Country</th>
            <th>Passport Number</th>
            <th>Nationality</th>
          
             
        </tr>";
    while($row = mysqli_fetch_array($result)) 
    {
        ?>
        <tr>
    
        <td><?= $row['Full Name']; ?></td>
        <td><?= $row['Email']; ?></td>
        <td><?=  $row['Password']; ?></td>
        <td><?= $row['natid']; ?></td>

        </tr>
        <?php
    }
    
    }
?>

<html>
<form method="post" action="">
Email: <input type="text" name="email">
 
<p><button type="submit" name="save">Search</button></p>

</html>