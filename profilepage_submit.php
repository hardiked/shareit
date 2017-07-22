<?php
include 'common.php';
if(isset($_SESSION['email'])){
		move_uploaded_file($_FILES['file']['tmp_name'],"pictures/".$_FILES['file']['name']);
		//$con = mysqli_connect("localhost","root","","profiles");
		$q = mysqli_query($con,"UPDATE users SET image = '".$_FILES['file']['name']."' WHERE email = '".$_SESSION['email']."'");
		header('Location:profilepage.php');
	}
?>