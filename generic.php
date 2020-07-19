<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Generic</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />

		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
		<!--<style >
		body {
				background: #7f9b4e url(images1/bus3.jpg) no-repeat center top;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				background-size: cover;
			}
		</style>-->
		<style type="text/css">
			body {
				background: #7f9b4e url(images1/login.jpg) no-repeat center top;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				background-size: cover;
			}

input    {
width:400px;
display:block;
border: 1px solid #999;
height: 25px;
-webkit-box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
-moz-box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
}
input.button {
width:300px;
position:absolute;
right:20px;
bottom:20px;
background:#09C;
color:#fff;
font-family: Tahoma, Geneva, sans-serif;
height:30px;
-webkit-border-radius: 15px;
-moz-border-radius: 15px;
border-radius: 15px;
border: 1p solid #999;
}
input.button:hover {
background:#fff;
color:#09C;
}
form    {
background: -webkit-gradient(linear, bottom, left 175px, from(#CCCCCC), to(#5F5F5F));
background: -moz-linear-gradient(bottom, #CCCCCC, #5F5F5F175px);
margin:auto;
position:relative;
width:700px;
height:500px;
font-family: Tahoma, Geneva, sans-serif;
font-size: 14px;
font-style: italic;
line-height: 24px;
font-weight: bold;
color: #000000;
text-decoration: none;
-webkit-border-radius: 10px;
-moz-border-radius: 10px;
border-radius: 10px;
padding:20px;
border: 2px solid #999;
border: inset 1px solid #333;
-webkit-box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
-moz-box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
}

input::-webkit-input-placeholder {
  color: 	#f00;
}
textarea#feedback {
width:375px;
height:150px;
}
textarea.message {
display:block;
}
h2
{
	color:black;

}
		</style>
	</head>
	<body style="background:-webkit-linear-gradient(top,lightblue,skyblue); background: linear-gradient(to bottom,lightgrey);">

		<!-- Header -->
			<header id="header">
				<h1><a href="index.php">BookMyBusTicket</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="generic.php">Home</a></li>
					<!--	<li><a href="#book">Book Now</a></li>-->
						<li><a href="history1.php">Booking History</a></li>
						<li><a href="profile.php">View Profile</a></li>
					<!--	<li><a href="update.php">Update Profile</a></li>	-->
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</nav>
			</header>
			<div class="container">
			<?php
		session_start();
		if(isset($_SESSION['pay']))
		{
			echo '<p class="message"> <font size="5" color="MediumVioletRedMagenta"> <center><i>';
			echo $_SESSION['pay'];
			echo "</i></center></font></p>";
			unset($_SESSION['pay']);
		}
		if(isset($_SESSION['updt']))
		{
			echo '<p class="message"> <font size="5" color="MediumMagenta"> <center><i>';
			echo $_SESSION['updt'];
			echo "</i></center></font></p>";
			unset($_SESSION['updt']);
		}
	/*	echo '<h3 style="text-align:left;"> <font color="red"> <i> Hello ';
		echo $_SESSION['user'];
		echo "</i> </font>";
		echo '</h3>';*/
		?>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
						<center><font size="35"><strong>Hello <?php echo $_SESSION['user']?></font></strong></center>
						<br>
						<h3>Welcome to BookMyBusTicket</h3>
					</header>
			</div>
			</section>
			<center>	<h2>Search Buses</h2> </center>
			<form action="bus_details1.php" method="POST">
  From
  <input class="form-control" placeholder="Choose a city from { jaipur, jodhpur, udaipur, jaisalmer, bikaner, ajmer, kota}" type="text" name="Origin" >
   	<br> To
  <input class="form-control" type="text" placeholder="Choose a city from { jaipur, jodhpur, udaipur, jaisalmer, bikaner, ajmer, kota}" name="Destination" >
 	<br> Date of journey
  <input class="form-control" type="text" placeholder="yyyy-dd-mm   from 2020-07-21 to 2020-07-31" name="Date" >
 	<br> No of seats
  <input class="form-control" type="text" placeholder="Enter no of seats you want to book (1-20)" name="Seats" >
  	<br>
  <input class="btn btn-primary" type="submit" value="Submit">
</form>
<br>
</div>
		<!-- Footer -->
		<footer id="footer">
				<p style="text-align:center;">&copy; 2020 BookMyBusTicket. All rights reserved. Brought To You By MCA students @NITC</p>
			</footer>
	</body>
</html>
