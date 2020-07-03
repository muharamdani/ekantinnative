<?php
	session_start();
	if(!isset($_SESSION['login1']))
	{
		header("location:../../../../login");
	}
?>