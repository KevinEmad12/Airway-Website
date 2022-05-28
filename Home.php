<?php
// Start the session
session_start();
?>
<html>
<title>Home Page</title>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="AboutUsStyle.css">
    <link rel="stylesheet" href="Styles2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>About Us</title>
        <link rel="stylesheet" type="text/css" href="Menu.css">
  </head>
    <div class="topnav"> 
      <a  href="home.html"><i class="fa fa-fw fa-home"></i>Home</a>
      <a  href="contact.html"><i class="fa fa-fw fa-envelope"></i>Contact</a>
      <a  href="Book.html"><i class="fa fa-plane" aria-hidden="true"></i> Book</a>
      <a href="myBook.html"><i class="fa fa-calendar" aria-hidden="true"></i> My Trip</a>
      <div class="topnav-right">
          <a href="Sign In"><i class="fa fa-fw fa-user"></i>Login</a>
          <a href="Sign Up"><i class="fa fa-user-plus" aria-hidden="true"></i> Sign Up</a>
      </div>
  </div>
  <footer>
      
      <img class="footer-content" alt="smile" src="skytrax-airline-covid19-logo.svg" WIDTH=100 HEIGHT=80> 
      <img class="footer-content" alt="smile" src="AirlineOftheYear2021.svg" WIDTH=100 HEIGHT=80> 
      <img class="footer-content" alt="smile" src="Theqa_logo_SVG.svg" width="125" height="50">
                  <div class="footer-content">
          <h1>Welcome to our website</h1>
          <br><br>
          <p>Let's stay connected</p> 
          
          <ul class="socials">
              <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
              <li><a href="https://twitter.com/i/flow/login"><i class="fa fa-twitter"></i></a></li>
              <li><a href="https://www.instagram.com/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
              <li><a href="https://www.youtube.com/"><i class="fa fa-youtube"></i></a></li>
          </ul>

      </div>
                                     
      <iframe style="text-align:right" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3451.450024542732!2d31.3966993145951!3d30.109933622431942!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14581771026121f9%3A0xa38d42c793391a6a!2sAirport!5e0!3m2!1sen!2seg!4v1652309091653!5m2!1sen!2seg" width="250" height="100"></iframe>

      <div class="footer-bottom">
          <p>EGWay. All rights reserved</p>
                  <div class="footer-menu">
                    <ul class="f-menu">
                      <li><a href="HomePage.html">Home</a></li>
                      <li><a href="Contact.html">Contact</a></li>
                      
                    </ul>
                  </div>
      </div>
  </footer>

        <div class="flex-wrapper">
        <body>
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
    </div>
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
</html>
