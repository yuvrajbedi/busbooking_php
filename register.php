<?php
include "include.php";

$pass=sha1($_POST["Password"]);
//$ins="INSERT INTO `user`(`Fname`,`Lname`,`Email`,`Username`,`Password`)VALUES('".$_POST['Fname']."','".$_POST['Lname']."','".$_POST['Email']."','".$_POST['Username']."','".$_POST['Password']."')";
$sel="SELECT * FROM `user` where Email='".$_POST["Email"]."'";

$res=mysqli_query($connec, $sel) or die(mysqli_error($connec));
if(mysqli_num_rows($res) == 0)
{
	$mail=$_POST["Email"];
if(empty($mail)==false)
{

$ins="INSERT INTO `user`(`Fname`,`Lname`,`Email`,`Username`,`Password`,`Security`)VALUES('".$_POST['Fname']."','".$_POST['Lname']."','".$_POST['Email']."','".$_POST['Username']."','$pass','".$_POST['Security']."')";

mysqli_query($connec, $ins) or die(mysqli_error($connec));

//echo "registered succesfully";
session_start();
	//$_SESSION['user']=$_POST["Username"];
	$_SESSION['reg'] = 'Registered succesfully...Login now!!';
	header('location: index4.php');
}
	else
{
session_start();
	$_SESSION['reg_error'] = 'Invalid email!!';
	header('location: index4.php');
}
//echo '<script language="javascript">document.location.href="web_home.php"</script>';
}
else
{

	session_start();
	$_SESSION['reg_error'] = 'Email registered already!!';
	header('location: index4.php');
}
?>