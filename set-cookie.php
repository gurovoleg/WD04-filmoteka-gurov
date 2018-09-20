<?php 

	require('config.php');
	require('functions/updateCookie.php');

		if (isset($_POST['add-user-info'])) {
			$expiryPeriod = time() + 60*60*30;
			updateCookie($expiryPeriod);
		}

		if (isset($_POST['delete-user-info'])) {
			$expiryPeriod = time() -1;
			updateCookie($expiryPeriod);
		}

	header('location:' . HOST . 'request.php')

?>