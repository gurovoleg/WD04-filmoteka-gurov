<?php 

	require('config.php');
	require('functions/user-verification.php');
		

	if ( isset($_POST['user-enter']) ) {
		$userLogin = "admin";
		$userPassword = "11111";

		if ( $_POST['user-login'] == $userLogin ) {
			if ( $_POST['user-password'] == $userPassword ) {
				$_SESSION['login'] = $_POST['user-login'];
				header('location:' . HOST . 'index.php');		
			}
		}
	}

	if ( isset($_GET['action']) ) {
		
		if ($_GET['action'] == 'resetSession') {
			unset($_SESSION['login']);
			header('location:' . HOST . 'index.php');
		}
		
	}

	include('views/header.tpl');
	include('views/login.tpl');
	include('views/footer.tpl');

?>