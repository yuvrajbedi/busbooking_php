<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>History</title>
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

input    {
width:375px;
display:block;
border: 1px solid #999;
height: 25px;
-webkit-box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
-moz-box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
}
input.button {
width:100px;
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
background: -webkit-gradient(linear, bottom, left 175px, from(#CCCCCC), to(#EEEEEE));
background: -moz-linear-gradient(bottom, #CCCCCC, #EEEEEE 175px);
margin:auto;
position:relative;
width:550px;
height:450px;
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
padding:10px;
border: 1px solid #999;
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
h2{
	color:red;
}
h4
{
	color:white;
}
td{
	color:white;
}
		</style>
	</head>
	<body style="background:-webkit-linear-gradient(left top,BurlyWood,Chocolate,Darkkhaki,BlanchedAlmond,BurlyWood); background: linear-gradient(to bottom right,BurlyWood,CadetBlue,Darkkhaki,BlanchedAlmond,BurlyWood);">

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

			if(isset($_SESSION['del']))
		{
			echo '<p class="message"> <font size="4" color="MediumMagenta"><center> <i>';
			echo $_SESSION['del'];
			echo $_SESSION['refund'];
			echo $_SESSION['mesg'];
			echo "</i></center></font></p>";
			unset($_SESSION['del']);
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
						<center><i><font size="35"><strong>Hello <?php echo $_SESSION['user']?></font></i></strong></center>
						<br>
						<h3>Welcome to BookMyBusTicket</h3>
					</header>
				</div>
<center>	<h2>Booking History</h2> </center>
<?php
include "include.php";
//$user=$_SESSION['user'];
//$Bus_id;
$sel="SELECT * FROM `booking` where user='".$_SESSION['user']."'" ;
$str= mysqli_query($connec, $sel);
$rows= mysqli_num_rows($str);
if($rows==0 )
{
	echo '<h3 style= "text-align:center;"> <font color="red">You have not booked any buses </font></h3>';
	echo "<br>";
}
else
{
	//echo '<h3 style= "text-align:center;"> <font color="red">Booking History </font></h3>';
echo '<table align="center" border=1 >
<tr>
<th> Date and Time</th>
<th> Bus id  </th>
<th> No of seats</th>
<th> Total fare </th>
<th> Bank </th>
<th> Payment method </th>
<!--<th> Cancel now </th> -->
<th> View Ticket</th>
</tr>';
while($row=mysqli_fetch_array($str))
{
	$Date= $row['Date'];
	$Fare= $row['Total_fare'];
	$id= $row['Bus_id'];
	$req=$row['Seats_no'];
	$book_id=$row['Booking_id'];
	echo "<tr>";

	echo "<td>".$row['Date']."</td>";
	echo "<td>".$row['Bus_id']."</td>";
	echo "<td>".$row['Seats_no']."</td>";
	echo "<td>".$row['Total_fare']."</td>";
	echo "<td>".$row['Bank']."</td>";
	echo "<td>".$row['Payment_method']."</td>";
//	echo "<td>";
//	echo '<a href="cancel.php?Date='.$Date.' & Fare='.$Fare.'& id='.$id.'& req='.$req.'">Cancel Now</a>';
//	echo "</td>";
	echo "<td>";
	echo '<a href="view_ticket1.php?id='.$book_id.'">View Ticket</a>';
	echo "</td>";
	echo "</tr>";
}
echo "</table>";
}
?>
			</section>

<br>
<a href="#" class="image fit"><img src="images1/bus7.jpg" alt="" /></a>
</div>
		<!-- Footer --><footer id="footer">
				<p style="text-align:center;">&copy; 2020 BookMyBusTicket. All rights reserved. Brought To You By MCA students @NITC</p>
			</footer>
	</body>
</html>
