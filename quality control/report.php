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
    
                break;
}
$query= "SELECT * from reservations where comment IS NOT NULL";

$result=$conn->query($query);

echo "manga ";


?>

</html>