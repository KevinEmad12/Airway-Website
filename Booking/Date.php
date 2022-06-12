<?php
    $conn = new mysqli("localhost", "root", "", "egway");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT `f_date` FROM `trips` WHERE `FlightCode`='".$_GET['FCode']."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $count=0;
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo($row["f_date"]);
        }
        $conn->close();
    }
?>