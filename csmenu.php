<html>
	<head>
		<style>
			.topnav{
				background-color: #7f1b4e;
				overflow:hidden;
				color: white;
				font-size: 17px;
				padding: 14px 16px;
			}
			.topnav a{
				float:left;
				display:block;
				color: white;
				text-align: center;
				padding: 0px 16px;
				text-decoration: none;
				font-size: 17px;
			}
			.topnav a:hover{
				background-color: #000000;
				
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