<html>

<?php

use function PHPSTORM_META\type;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "egway";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$type=$_POST['i']; 
//  1 rating 2 flight 3  cancel 4 edited 5 most ordered
switch($type){
case '1':
    ?>
    <input type="text" placeholder="rate you want to count" onclick="">
    <?php
    $query= "SELECT 'f_code',COUNT('f_code') from reservations where rate IS NOT NULL";
    break;
case '2':

    break;
case '3':
    $query= "SELECT COUNT(`cancel`) FROM `reservations` WHERE `cancel` IS NOT NULL";
        break;
case '4':

            break;
case '5':
    $query="SELECT 'f_code', count('f_code') 
    from `reservations` 
    group by 'f_code' 
    order by count('f_code') 
    desc limit 3";
                break;
}
$query= "SELECT * from reservations where comment IS NOT NULL";

$result=$conn->query($query);

// echo;


?>

</html>