<html>
<link rel="stylesheet" href="styles.css">
<div style="text-align: center; font-size: 30px;">Choose a
<?php
    session_start(); 
    echo($_SESSION['User']);
    echo("<span id='TripType'>");
    echo($_GET['TripType']);
    echo("</span>");
?>
Flight from 
<?php 
    echo("<span id='From'>");
    echo($_GET['From']);
    echo("</span>");
?>
 To 
<?php 
    echo("<span id='To'>");
    echo($_GET['To']);
    echo("</span>");
?>
 For
<?php 
    echo("<span id='NumberOfPassengers'>");
    echo($_GET['NumberOfPassengers']);
    echo("</span>");
?>
 Passengers
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    function AddToCart(Flight) {
        jQuery.ajax(
            {
                url:"AddToCart.php",
                data:"FCode="+Flight+"&NumOfPassengers="+document.getElementById('NumberOfPassengers').innerHTML,
                type:"GET",
                success:function(data)
                {
                    alert("hi");                        
                }
            }
        );
        // if(document.getElementById('TripType').innerHTML=='Direct')
        // {
        //     location.href = "Cart.php";
        // }
        // if(document.getElementById('TripType').innerHTML=='ReturnEarly')
        // {
        //     let From=document.getElementById('To').innerHTML;
        //     let To=document.getElementById('From').innerHTML;
        //     location.href = "http://localhost/EGWay/Trips.php?From="+From+"&To="+To+"&TripType=Direct&NumberOfPassengers=1";
        // }
        // if(document.getElementById('TripType').innerHTML=='ReturnLate')
        // {
        //     let From=document.getElementById('To').innerHTML;
        //     let To=document.getElementById('From').innerHTML;
        //     location.href = "http://localhost/EGWay/Trips.php?From="+From+"&To="+To+"&TripType=Direct&NumberOfPassengers=1";
        // }
    }
</script>
<?php
    // Create connection
    $conn = new mysqli("localhost", "root", "", "egway");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT FlightCode, FromAirPort, Destination, TripStatus FROM trips WHERE FromAirPort='".$_GET['From']."' AND Destination='".$_GET['To']."' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
        echo"<div class='FlightCardTopBar'> <input id=". $row['FlightCode']." type='button' onclick='AddToCart(this.id)' value='Book' class='right'></div>";
        echo"<div class='FlightCard'>";
        echo"<div style='text-align: center;'>Flight Details</div>";
        echo "<span style='text-align: left;'> Flight Code:".$row['FlightCode']."</span>";
        echo "<span style='float:right;'> TripStatus: " . $row["TripStatus"]."</span>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<span style='text-align: left;'> Destination: " . $row["Destination"]."</span>";
        echo "<span style='float:right;'> FromAirPort: " . $row["FromAirPort"]."</span>";
        echo "</div>";
        echo "<br>";
        }
    } else {
      echo "0 results";
    }
    $conn->close();
?>
</html>