<html>
<link rel="stylesheet" href="styles.css">
<?php
    session_start();
?> 
<!-- <div id="Book" class="Form">
<form method="GET" action="Trips.php">
                <input class="book" id="CityFrom" list="From" name="From" style="border-radius: 25px  0px 0px 25px;" placeholder="From..." onkeyup="FromC()">
                <datalist id="From">
                </datalist>
                <input class="book" id="CityTo" list="To" name="To" style="border-radius: 0px  0px 0px 0px;" placeholder="To..." onkeyup="ToC()">
                <datalist id="To">
                </datalist>
                <input class="book" type="date" name="date" min="<?php echo date('Y-m-d'); ?>" />
                <select class="book" name="TripType">
                    <option value="Direct">Direct flight</option>
                    <option value="ReturnEarly">Return before 7 days</option>
                    <option value="ReturnLate">Return after 7 days</option>
                    <option value="Transit">Transit flight</option>
                    <option value="Multiple">Multiple destinations</option>
                </select>
                <select class="book" name="NumberOfPassengers" style="width: 250px; border-radius: 0px  25px 25px 0px;">
                    <option value="1">1 Passenger</option>
                    <option value="2">2 Passenger</option>
                    <option value="3">3 Passenger</option>
                    <option value="4">4 Passenger</option>
                    <option value="5">5 Passenger</option>
                    <option value="6">6 Passenger</option>
                </select>
                <input class="book" type="submit" value="Search" >
            </form>
</div> -->
<Ul style="list-style: none; font-size:30px; text-align: left; position:fixed; top: 15%; right: 0%; background-color: #5c0931; padding:10px; ">
    <li>Search Details</li>
    <li>Trip type:<?php echo"<span id='TripType'>".$_GET['TripType']."</span>"; ?></li>
    <li>From:<?php echo"<span id='From'>".$_GET['From']."</span>"; ?></li>
    <li>To:<?php echo"<span id='To'>".$_GET['To']."</span>"; ?></li>
    <li>Passengers:<?php echo"<span id='NumberOfPassengers'>".$_GET['NumberOfPassengers']."</span>"; ?></li>
</ul>
<table style="border-collapse: collapse; font-size:20px; text-align: center; position:fixed; bottom: 0%; right: 0%; background-color: #5c0931; padding:10px; ">
    <tr style="border: 3px solid;">
    <th style="border: 3px solid;">Flight Code</th>
    <th style="border: 3px solid;">Count</th>
    <th style="border: 3px solid;">Price</th>
    </tr>
    <tr style="border: 3px solid;">
    <?php if(isset($_GET['FCode'])){echo"<td style='border: 3px solid;'><span id='FCode2'>".$_GET['FCode']."</span></td><td style='border: 3px solid;'><span>".$_GET['NumberOfPassengers']."</span></td>";} ?>
    </tr>
    <tr style="border: 3px solid;">
        <?php if(isset($_GET['FCode2'])){echo"<td style='border: 3px solid;'><span id='FCode2'>".$_GET['FCode2']."</span></td><td style='border: 3px solid;'><span>".$_GET['NumberOfPassengers']."</span></td>";} ?>
    </tr>
    <tr style="border: 3px solid;">
        <?php echo"<td style='border: 3px solid;'><span>Total Price</span></td>"; ?>
    </tr>
</table>
<div style="text-align: center; font-size: 30px;">Choose a
 <?php 
    echo("<span id='Date'>");
    echo($_GET['date']);
    echo("</span>");
?>
<?php 
    if(isset($_GET['FCode']))
    {
        echo("<span id='f_code'>");
        echo($_GET['FCode']);
        echo("</span>");
    }
?>
<?php 
    if(isset($_GET['FCode2']))
    {
        echo("<span id='f_code2'>");
        echo($_GET['FCode2']);
        echo("</span>");
    }
?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    function AddToCart(Flight) {
        let str=document.getElementById('Date').innerHTML;
        if(document.getElementById('Date').innerHTML!="")
        {
            let str =document.getElementById('Date').innerHTML;
            let dat = new Date(str);
            dat.setDate(dat.getDate() + 7);
        }
        let FC1;
        let FC2;
        let FC3;
        if(document.getElementById('f_code2')!=null)
        {
            FC1=document.getElementById('f_code').innerHTML;
            FC2=document.getElementById('f_code2').innerHTML;
            FC3=Flight;
        }
        else if(document.getElementById('f_code')!=null)
        {
            FC1=document.getElementById('f_code').innerHTML;
            FC2=Flight;
            FC3="";
        }
        else
        {
            FC1=Flight;
            FC2="";
            FC3="";
        }
        if(document.getElementById('TripType').innerHTML=='Direct')
        {
            jQuery.ajax(
            {
                url:"AddToCart.php",
                data:"FCode="+FC1+"&NumOfPassengers="+document.getElementById('NumberOfPassengers').innerHTML+"&FCode2="+FC2+"&FCode3="+FC3,
                type:"GET",
                success:function(data)
                {
                    alert(data);
                    alert("Successfully Booked");                        
                }
            }
        );
            location.href = "Cart.php";
        }
        if(document.getElementById('TripType').innerHTML=='ReturnEarly')
        {
            let From=document.getElementById('To').innerHTML;
            let To=document.getElementById('From').innerHTML;
            let NumP=document.getElementById('NumberOfPassengers').innerHTML;
            location.href = "Trips.php?From="+From+"&To="+To+"&TripType=Direct&NumberOfPassengers="+NumP+"&FCode="+Flight+"&date="+str;
        }
        if(document.getElementById('TripType').innerHTML=='ReturnLate')
        {
            let From=document.getElementById('To').innerHTML;
            let To=document.getElementById('From').innerHTML;
            let NumP=document.getElementById('NumberOfPassengers').innerHTML;
            location.href = "Trips.php?From="+From+"&To="+To+"&TripType=Direct&NumberOfPassengers="+NumP+"&FCode="+Flight+"&date="+str;
        }
        if(document.getElementById('TripType').innerHTML=='Transit')
        {
            let From=document.getElementById('To').innerHTML;
            let To=document.getElementById('From').innerHTML;
            let NumP=document.getElementById('NumberOfPassengers').innerHTML;
            location.href = "Trips.php?From="+From+"&To="+To+"&TripType=Direct&NumberOfPassengers="+NumP+"&FCode="+FC1+"&FCode2="+FC2+"&date=";
        }
        if(document.getElementById('TripType').innerHTML=='Multiple')
        {
            let From=document.getElementById('To').innerHTML;
            let To=document.getElementById('From').innerHTML;
            let NumP=document.getElementById('NumberOfPassengers').innerHTML;
            if(document.getElementById('f_code')==null)
                location.href = "Trips.php?From="+From+"&To="+To+"&TripType=Multiple&NumberOfPassengers="+NumP+"&FCode="+FC1+"&date=";
            else
                location.href = "Trips.php?From="+From+"&To="+To+"&TripType=Direct&NumberOfPassengers="+NumP+"&FCode="+FC1+"&FCode2="+FC2+"&date=";
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
    if($_GET['TripType']=='Transit')
    {
        $sql="SELECT * FROM `trips` WHERE `FromAirPort`='".$_GET['From']."' AND `Destination`IN (SELECT `FromAirPort` FROM `trips` WHERE `Destination`= '".$_GET['To']."')";
    }
    else if(isset($_GET['T']))
    {
        if($_GET['T']=='b')
            $sql = "SELECT FlightCode, FromAirPort, Destination, f_date, price FROM trips WHERE FromAirPort='".$_GET['From']."' AND Destination='".$_GET['To']."' AND f_date ='".$_GET['date']."'";
        if($_GET['T']=='a')
            $sql = "SELECT FlightCode, FromAirPort, Destination, f_date, price FROM trips WHERE FromAirPort='".$_GET['From']."' AND Destination='".$_GET['To']."' AND f_date ='".$_GET['date']."'";
    }
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