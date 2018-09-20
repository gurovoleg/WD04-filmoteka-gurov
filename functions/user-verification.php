<?php 
	// require('./config.php');
	
	function isUserExist() {
		$result = false;
		
		if ( isset($_SESSION['login']) ) {
			$result = true;
		}

		return $result;
	}


 ?>