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
        $email = $_POST['email'];
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
            $sql="SELECT * from users WHERE Email='".$_POST['email']."'";
            $result = mysqli_query($conn,$sql);

            echo"<table>
    
        <tr>
        
            <th>Full Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>National ID</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Postal Code </th>
            <th>Country</th>
            <th>Passport Number</th>
            <th>Nationality</th>
            <th>Date</th>
        </tr>";
    while($row = mysqli_fetch_array($result)) 
    {
        ?>
        <tr>
    
        <td><?= $row['Full Name']; ?></td>
        <td><?= $row['Email']; ?></td>
        <td><?=  $row['Password']; ?></td>
        <td><?= $row['natid']; ?></td>
        <td><?= $row['phone_num']; ?></td>
        <td><?= $row['address']; ?></td>
        <td><?= $row['postal_code']; ?></td>
        <td><?= $row['country']; ?></td>
        <td><?= $row['passport_num']; ?></td>
        <td><?= $row['nationality']; ?></td>
        <td><?= $row['date_time']; ?></td>
        </tr>
        <?php
    }
    
}
    else {
        $message= "$email. is not a valid email address";
    }
}
?>
        
<html>
<head>
    <title>Search For A User</title>
    <link rel="stylesheet" href="customerservicestyle.css">
</head>
<body>
    <div class ="title"> Search For A User </div>    
    <form method="post" action="">
        <div class="search"> Enter Email: </div>
        <input type="text" class="searchtext" placeholder="example@yahoo.com" name="email" required>
        <p><button type="submit" name="save" class="searchbutton">Search</button></p>
    </form>
    <div class="error"><?php if(isset($message)) { echo $message; } ?></div>
</body>
</html>