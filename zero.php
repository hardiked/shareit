<?php
include 'common.php';
$b=1;
$mail=$_SESSION['email'];
$sql = "UPDATE mail SET seen='$b' WHERE recieve='$mail'";
if(mysqli_query($con,$sql))
	{echo "success";}

?>