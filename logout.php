<?php

	require 'common.php';

	if(isset($_SESSION['email']));{
		session_destroy();
		echo "you have successfully logged out!";
	}
	header('Location:login.php',true);
	exit();

?>