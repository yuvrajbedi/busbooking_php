<?php
include "include.php";

session_start();

$del="Delete from `booking` where user='".$_SESSION['user']."' and Date='".$_GET['Date']."'";
$req= $_GET['req'];
$id=$_GET['id'];
$upd= "UPDATE bus SET seats=(seats+$req) WHERE Id=$id";

mysqli_query($connec, $del) or die(mysqli_error($connec));
mysqli_query($connec, $upd) or die(mysqli_error($connec));

//echo "registered succesfully";
	//$_SESSION['user']=$_POST["Username"];
	$_SESSION['del'] = 'Cancelled succesfully...Rs.';
	$_SESSION['refund']=$_GET['Fare'];
	$_SESSION['mesg']=' will be refunded!!';
	header('location: history1.php');
//echo '<script language="javascript">document.location.href="web_home.php"</script>';
?>