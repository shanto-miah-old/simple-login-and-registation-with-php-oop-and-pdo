<?php	
	include 'helper/login.helper.php';

	if (checkLogin()) {
		session_unset();
		header('location: login.php');
	} else {
		header('location: login.php');
	}
?>