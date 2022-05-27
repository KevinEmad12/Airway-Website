<?php
// Start the session
session_start();
?>
<html>
<title>Home Page</title>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="styles.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    
    <title>Home Page</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style media="screen">
            .topnav{
                background-color: #333;
                width: 100%;
                display: fixed;
                top: 0%;
                left: 0%;
                overflow:hidden;

            }
            .topnav a{

                float: left;
                display: block;
                color: #f2f2f2;
                text-align: center;
                padding: 14px 16px;
                text-decoration:none;
                font-size:17px;           
             }
             .topnav-right a{
                float: right;
                display: block;
                color: #f2f2f2;
                text-align: center;
                padding: 14px 16px;
                text-decoration:none;
                font-size:17px;           
             }
             .topnav a:hover{
                 background-color:whitesmoke ;
                 color: black;
             }
             .topnav a:active{
                 background-color: #04AA6D;
                 color: white;
             }
             *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
             }
             body{
                background: #fcfcfc;
                font-family: sans-serif;
                padding-bottom: auto ;
                position: relative;
                justify-content: space-between;
            }
            .flex-wrapper {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            justify-content: space-between;
            }
            .con
            {
                background-color: #fff;
                border-radius: auto;
                position: relative;
                width:auto;
                max-width: auto;
                
            }
            footer{
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
                background: #111;
                height: absolute;
                width: 100%;
                padding-top: 40px;
                color: #fff;
                justify-content: space-between;
            }
            .footer-content{
                display: inline-block;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                text-align: center;
            }
            .footer-content h1{
                text-align: center;
                font-size: xx-large;
                font-weight: 500;
                text-transform: capitalize;
                line-height: 30px;
            }
            .footer-content p{
                max-width: auto;
                margin: 10px auto;
                line-height: 28px;
                font-size: 14px;
                color: #cacdd2;
            }
            .footer-content img {
                display:block;                
                flex-direction: row;
            }
            .footer-bottom{
                background: #000;
                width: auto;
                padding: 20px;
            padding-bottom: 30px;
                
            }
            .footer-bottom p{
                float: left;
                font-size: 14px;
                word-spacing: 2px;                    
            }
            .footer-bottom p a{
            color:aqua;
            font-size: 16px;
            text-decoration: none;
            }
            .footer-menu{
            float: right;

            }
            .footer-menu ul{
            display: flex;
            }
            .footer-menu ul li{
            padding-right: 10px;
            display: block;
            }
            .footer-menu ul li a{
            color: #cfd2d6;
            text-decoration: none;
            }
            .footer-menu ul li a:hover{
            color: aqua;
            }
            .socials{
                
                list-style: none;
                display: flex;
                align-items: center;
                justify-content: center;
                margin:10px 250px 30px 250px;
            }
            .socials li{
                margin: 0 10px;
            }
            .socials a{
                text-decoration: none;
                color: #fff;
                border: 1px solid white;
                padding: 5px;

                border-radius: 50%;

            }
            .socials a i{
                font-size:medium;
                width: 20px;


            }
            .socials a:hover i{
                color: aqua;
            }

            ::-webkit-scrollbar {
            width: 10px;
            }
            ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px grey; 
            border-radius: 10px;
            }
            ::-webkit-scrollbar-thumb {
            background: #04AA6D; 
            border-radius: 10px;
            }
            ::-webkit-scrollbar-thumb:hover {
            background: #04AA6D; 
            }
        </style>
    
        <link rel="stylesheet" type="text/css" href="Menu.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <br>
        

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
                            <li><a href="About.html">About</a></li>
                            <li><a href="Contact.html">Contact</a></li>
                            
                          </ul>
                        </div>
            
            </div>
            </footer>
   
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
