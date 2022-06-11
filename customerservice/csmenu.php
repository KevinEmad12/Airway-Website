<html>
	<head>
		<style>
		.topnav
		{
			background-color: #5c0931;
			width: 100%;
			display: fixed;
			top: 0%;
			left: 0%;
			overflow:hidden;

		}
		.topnav a
		{
			float: left;
			display: block;
			color: #f2f2f2;
			text-align: center;
			padding: 14px 16px;
			text-decoration:none;
			font-size:17px; 
			cursor: pointer;          
 		}

		.topnav-right a
		{
            float: right;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration:none;
            font-size:17px;           
        }
         .topnav a:hover
		{
			background-color:whitesmoke ;
			color: black;
		}
			.topnav a:active
		{
			background-color: #500944;
			color: white;
		}
		</style>

	</head>
	<body>		
		<div class="topnav">
			<?php
					echo"<a href='cshome.php'>Home</a>";
					echo"<a href='csadd.php'>Add Reservation</a>";
					echo"<a href='csdelete.php'>Delete Reservation</a>";
                    echo"<a href='csupdate.php'>Edit Reservation</a>";
                    echo"<a href='cssearchuser.php'>Search for User</a>";
                    echo"<a href='cssearchflight.php'>Search for Flight</a>";
				?>
		</div>
		<br><br>
	</body>
</html>