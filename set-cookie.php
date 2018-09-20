<?php 

	require('config.php');

		if (isset($_POST['add-user-info'])) {
			$expiryPeriod = time() + 60*60*30;
			updateCookie($expiryPeriod);
		}

		if (isset($_POST['delete-user-info'])) {
			$expiryPeriod = time() -1;
			updateCookie($expiryPeriod);
		}

		function updateCookie($expiryPeriod){
			$userName = $_POST['user-name'];
			$userCity = $_POST['user-city'];

			setcookie('user-name', $userName, $expiryPeriod);
			setcookie('user-city', $userCity, $expiryPeriod);
		}

	header('location:' . HOST . 'request.php')

?>