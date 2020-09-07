<?php
	//Authorization: Preventing direct access to shoppingCart, user and admin pages
	session_start();
	if (!isset($_SESSION['isUser']))
	{
		header("Location:logIn.php");
		exit();
	}
	
?>