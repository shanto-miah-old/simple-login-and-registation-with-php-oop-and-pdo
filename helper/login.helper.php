<?php
	session_start();

	include 'classes/auth.php';

	function checkLogin()
	{
		if (isset($_SESSION['login'])) {
			return true;
		} else {
			return false;
		}
		
	}

	function tryLogin()
	{
		if (isset($_REQUEST['login'])) {

			if ($_REQUEST['email'] == '' || $_REQUEST['password'] == '') {
				$error = '<div class="alert alert-warning">Email And Password fild are required!</div>';
				return $error;
			} else {

				$auth = new Auth($_REQUEST['email'], $_REQUEST['password']);

				if ($auth->login()) {
					header('location: index.php');
				} else {
					$error = '<div class="alert alert-warning">Email And Password Not Match!</div>';
					return $error;
				}
				

			}
			
		} else {
			return null;
		}
	}

	function trysignUp()
	{

		$error = null;

		if (isset($_REQUEST['signup'])) {


			if ($_REQUEST['name'] == '' || $_REQUEST['email'] == '' || $_REQUEST['password'] == '' || $_REQUEST['_password'] == '') {
				$error = 'All fild are required!';
			} else {				
				$auth = new Auth($_REQUEST['email']);

				if ($auth->haveEmail()) {
					$error = 'Email Alrady Exists!';
				} else {
					if ($_REQUEST['password'] != $_REQUEST['_password']) {
						$error = 'Password dont match!';
					} else {
						if (!$auth->register($_REQUEST['name'], $_REQUEST['email'], $_REQUEST['password'])) {
							$error = 'Somthing Want Wrong!';
						}
					}
					
				}
			}
		}

		return $error;
	}

	
?>