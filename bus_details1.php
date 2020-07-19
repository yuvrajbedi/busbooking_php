<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Bus_details</title>
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
	text-shadow: 1px 1px black;
}
h4
{
	color:white;
	text-shadow: 1px 1px black;
}
td{
	color:white;
	text-shadow: 1px 1px black;
}
		</style>
	</head>
	<body style="background:-webkit-linear-gradient(top,skyblue,skyblue); background: linear-gradient(to bottom,grey);">


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

			</section>
			</div>

<?php
include "include.php";
$req=$_POST["Seats"];
$Bus_id;
$sel="SELECT * FROM `bus` where Origin='".$_POST["Origin"]."' and Destination='".$_POST["Destination"]."' and Date='".$_POST["Date"]."' and Seats>= ".$_POST["Seats"]."  " ;
$str= mysqli_query($connec, $sel) or die(mysqli_error($connec));
$rows= mysqli_num_rows($str) ;
if($rows==0)
{
//	header('Refresh:5; url=generic.php');

	echo '<h3 style= "text-align:center;"> <font color="red">No available Buses </font></h3>';
	echo "<br>";
//	echo '<p style= "text-align:center">Redirecting to the home page in 5 seconds</p>';
}
else
{

	echo '<h3 style= "text-align:center;"> <font color="red"><center>Available Buses </center></font></h3>';
echo '<table align="center" border=1 >
<tr>
<th> Id </th>
<th> Name of the bus</th>
<th> Available seats </th>
<th> Origin </th>
<th> Destination </th>
<th> Date of journey</th>
<th> Arrival time </th>
<th> Departure time </th>
<th> Fare </th>
<th> Book </th>
</tr>';
while($row=mysqli_fetch_array($str))
{
	$Bus_id = $row['Id'];
	$Total_fare= $row['Fare'] * $req;
	//echo $Bus_id;
	echo "<tr>";

	echo "<td>".$row['Id']."</td>";
	echo "<td>".$row['Name']."</td>";
	echo "<td>".$row['Seats']."</td>";
	echo "<td>".$row['Origin']."</td>";
	echo "<td>".$row['Destination']."</td>";
	echo "<td>".$row['Date']."</td>";
	echo "<td>".$row['Arrival_time']."</td>";
	echo "<td>".$row['Departure_time']."</td>";
	echo "<td>".$row['Fare']."</td>";
	/*echo
	'<td>  <form action="payment.php" method="POST" >
	<input name="Bus_id" type="hidden" value= "<?php echo $Bus_id; ?>" >
	<input name="Seats_no" type="hidden" value="<?php echo $Req; ?>" >
	<input class="btn btn-primary" type="submit" value="Book"  />
	</td>';*/
	echo "<td>";
//	echo "$req";
	echo '<a href="payment1.php?Seats_no='.$req.'& Bus_id='.$Bus_id.'& Total_fare='.$Total_fare.'">Book Now</a>';
	echo "</td>";
	echo "</tr>";
}
echo "</table>";
}
?>

</div>
		<!-- Footer --><footer id="footer">
				<p style="text-align:center;">&copy; 2020 BookMyBusTicket. All rights reserved. Brought To You By MCA students @NITC</p>
			</footer>
	</body>
</html>
