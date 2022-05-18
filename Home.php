<?php
// Start the session
session_start();
?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
    <link rel="stylesheet" href="styles.css">
    <?php
        $_SESSION["User"]="Guest";
    ?>
    <script>
        function SwitchMainTabs(SelectedButton)
        {
            document.getElementById('button1').className = 'MainBar';
            document.getElementById('button2').className = 'MainBar';
            document.getElementById('button3').className = 'MainBar';
            document.getElementById('button4').className = 'MainBar';
            document.getElementById(SelectedButton).className='MainBarActive';
            if(SelectedButton=='button1')
            {
                document.getElementById('Book').className = 'Form';
                document.getElementById('MyTripsFail').className = 'FormHidden';
                document.getElementById('MyTripsSuccess').className = 'FormHidden';
                document.getElementById('Reservation').className = 'FormHidden';
                document.getElementById('CheckFlight').className = 'FormHidden';
                document.getElementById('ShowFlight').className = 'FormHidden';
            }
            if(SelectedButton=='button2')
            {
                document.getElementById('Book').className = 'FormHidden';
                let text =document.getElementById('UserName').textContent;
                if(text=="Guest"){
                    document.getElementById('MyTripsFail').className = 'Form';
                }
                else{
                    document.getElementById('MyTripsSuccess').className = 'Form';
                }
                document.getElementById('Reservation').className = 'FormHidden';
                document.getElementById('CheckFlight').className = 'FormHidden';
                document.getElementById('ShowFlight').className = 'FormHidden';
            }
            if(SelectedButton=='button3')
            {
                document.getElementById('Book').className = 'FormHidden';
                document.getElementById('MyTripsFail').className = 'FormHidden';
                document.getElementById('MyTripsSuccess').className = 'FormHidden';
                document.getElementById('Reservation').className = 'Form';
                document.getElementById('CheckFlight').className = 'FormHidden';
                document.getElementById('ShowFlight').className = 'FormHidden';
            }
            if(SelectedButton=='button4')
            {
                document.getElementById('Book').className = 'FormHidden';
                document.getElementById('MyTripsFail').className = 'FormHidden';
                document.getElementById('MyTripsSuccess').className = 'FormHidden';
                document.getElementById('Reservation').className = 'FormHidden';
                document.getElementById('CheckFlight').className = 'Form';
                document.getElementById('ShowFlight').className = 'FormHidden';
            }
            if(SelectedButton=='ShowFlight')
            {
                document.getElementById('Book').className = 'FormHidden';
                document.getElementById('MyTripsFail').className = 'FormHidden';
                document.getElementById('MyTripsSuccess').className = 'FormHidden';
                document.getElementById('CheckFlight').className = 'FormHidden';
                document.getElementById('ShowFlight').className = 'FormHidden';
            }
        }
        function ShowTheFlight() {
            jQuery.ajax(
                {
                    url:"ShowFlight.php",
                    data:"FCode="+document.getElementById('FCode').value,
                    type:"GET",
                    success:function(data)
                    {
                        document.getElementById("out").innerHTML = data;                        
                    }
                }
            );
        }
        function ShowTheReservation() {
            jQuery.ajax(
                {
                    url:"ShowReservation.php",
                    data:"RCode="+document.getElementById('RCode').value,
                    type:"GET",
                    success:function(data)
                    {
                        document.getElementById("back").innerHTML = data;                        
                    }
                }
            );
        }
        function FromC() {
            jQuery.ajax(
                {
                    url:"FlightSearchAid.php",
                    data:"City="+document.getElementById('CityFrom').value,
                    type:"GET",
                    success:function(data)
                    {
                        document.getElementById("From").innerHTML = data;                        
                    }
                }
            );
        }
        function ToC() {
            jQuery.ajax(
                {
                    url:"FlightSearchAid.php",
                    data:"City="+document.getElementById('CityTo').value,
                    type:"GET",
                    success:function(data)
                    {
                        document.getElementById("To").innerHTML = data;                        
                    }
                }
            );
        }
        </script>
    <head>
    </head>
    <div id="UserName" style="font-size: 0px; padding:0px; margin:0px;"><?php echo($_SESSION["User"]); ?></div>
    <body class="GreyBackGround">
        <div class="bar">
            <button id="button1" class="MainBarActive" onclick="SwitchMainTabs('button1')" style="border-radius: 25px  0px 0px 0px;">Book</button>
            <button id="button2" class="MainBar" onclick="SwitchMainTabs('button2')">My Trips</button>
            <button id="button3" class="MainBar" onclick="SwitchMainTabs('button3')">Reservation Details</button>
            <button id="button4" class="MainBar" onclick="SwitchMainTabs('button4')" style="border-radius: 0px 25px 0px 0px;">Check Flight Details</button>
        </div>
        <div id="Book" class="Form">
            <form method="GET" action="Trips.php">
                <input class="book" required="required" id="CityFrom" list="From" name="From" style="border-radius: 25px  0px 0px 25px;" placeholder="From..." onkeyup="FromC()">
                <datalist id="From">
                </datalist>
                <input class="book" required="required" id="CityTo" list="To" name="To" style="border-radius: 0px  0px 0px 0px;" placeholder="To..." onkeyup="ToC()">
                <datalist id="To">
                </datalist>
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
                <p style="font-size: large;"></p>
                <input class="book" type="submit" value="Book" >
            </form>
        </div>
        <div id="MyTripsFail" class="FormHidden">
            <div style="font-size: 25px;">You need to be logged in to view your trips<br><br></div>
            <a class="Redirect" href="login.html" style="font-size: 25;">Click here to login</a>
        </div>
        <div id="MyTripsSuccess" class="FormHidden" style="font-size: 30px;">
            These are ur trips
        </div>
        <div id="Reservation" class="FormHidden" style="font-size: 25px;">
        <div id="back"></div>
        <br>
            <input id="RCode" class="book" type="text" name="ReservationCode" style="border-radius: 25px  25px 25px 25px;" placeholder="Reservation Code">
            <button class="MainBar" onclick="ShowTheReservation()" style="border-radius: 25px  25px 25px 25px;">Show Flight</button>
        </div>
        <div id="CheckFlight" class="FormHidden" style="font-size: 25px;">
        <div id="out"></div>
        <br>
            <input id="FCode" class="book" type="text" name="FlightCode" style="border-radius: 25px  25px 25px 25px;" placeholder="Enter Flight Code">
            <button class="MainBar" onclick="ShowTheFlight()" style="border-radius: 25px  25px 25px 25px;">Show Flight</button>
        </div>
    </body>
</html>