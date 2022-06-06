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
 <?php 
    echo("<span id='Date'>");
    echo($_GET['date']);
    echo("</span>");
?>
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
                    alert("Successfully Booked");                        
                }
            }
        );
        if(document.getElementById('TripType').innerHTML=='Direct')
        {
            location.href = "Cart.php";
        }
        if(document.getElementById('TripType').innerHTML=='ReturnEarly')
        {
            let From=document.getElementById('To').innerHTML;
            let To=document.getElementById('From').innerHTML;
            let NumP=document.getElementById('NumberOfPassengers').innerHTML;
            let date=document.getElementById('Date').innerHTML;
            location.href = "Trips.php?From="+From+"&To="+To+"&TripType=Direct&NumberOfPassengers="+NumP+"&ReSub=1&date="+date;
        }
        if(document.getElementById('TripType').innerHTML=='ReturnLate')
        {
            let From=document.getElementById('To').innerHTML;
            let To=document.getElementById('From').innerHTML;
            let NumP=document.getElementById('NumberOfPassengers').innerHTML;
            let date=document.getElementById('Date').innerHTML;
            location.href = "Trips.php?From="+From+"&To="+To+"&TripType=Direct&NumberOfPassengers="+NumP+"&ReSub=1&date="+date;
        }
    }
</script>
<?php
    // Create connection
    $conn = new mysqli("localhost", "root", "", "egway");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // if(isset($_GET['ReSub']))
    //     $sql = "SELECT FlightCode, FromAirPort, Destination, f_date, price FROM trips WHERE FromAirPort='".$_GET['From']."' AND Destination='".$_GET['To']."' AND f_date='".$_GET['date']."'";
    else if($_GET['date']!=NULL)
        $sql = "SELECT FlightCode, FromAirPort, Destination, f_date, price FROM trips WHERE FromAirPort='".$_GET['From']."' AND Destination='".$_GET['To']."' AND f_date='".$_GET['date']."'";
    else
        $sql = "SELECT FlightCode, FromAirPort, Destination, f_date, price FROM trips WHERE FromAirPort='".$_GET['From']."' AND Destination='".$_GET['To']."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
        echo"<div class='FlightCardTopBar'> <input id=". $row['FlightCode']." type='button' onclick='AddToCart(this.id)' value='Book' class='right'></div>";
        echo"<div class='FlightCard'>";
        echo"<div style='text-align: center;'>Flight Details</div>";
        echo "<span style='text-align: left;'> Flight Code:".$row['FlightCode']."</span>";
        echo "<span style='float:right;'> TripDate: " . $row["f_date"]."</span>";
        echo "<br>";
        echo "<br>";
        echo "<span style='text-align: left;'> Destination: " . $row["Destination"]."</span>";
        echo "<span style='float:right;'> FromAirPort: " . $row["FromAirPort"]."</span>";
        echo "<br>";
        echo "<div style='text-align: center;'> Price: " . $row["price"]."</div>";
        echo "</div>";
        echo "<br>";
        }
    } else {
      echo "0 results";
    }
    $conn->close();
?>
</html>