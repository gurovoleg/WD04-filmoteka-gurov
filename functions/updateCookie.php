<?php 

	function updateCookie($expiryPeriod){
		$userName = $_POST['user-name'];
		$userCity = $_POST['user-city'];

		setcookie('user-name', $userName, $expiryPeriod);
		setcookie('user-city', $userCity, $expiryPeriod);
	}

?>