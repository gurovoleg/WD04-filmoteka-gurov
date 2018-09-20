<?php 
	// require('./config.php');
	
	function isUserExist() {
		$result = false;
		
		if ( isset($_SESSION['login']) ) {
			$result = true;
		}

		return $result;
	}

	function isAdmin() {
		$result = false;
		
		if ( isset($_SESSION['admin']) ) {
			$result = true;
		}

		return $result;
	}




 ?>