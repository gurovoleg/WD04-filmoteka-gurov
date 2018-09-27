<?php 

	function dbConnect() {
		
		$link = mysqli_connect(MYSQL_SERVER,MYSQL_USER,MYSQL_PASSWORD,MYSQL_DB);

		if (!$link) {
			exit("Connection to " . MYSQL_DB . " failed! " . mysqli_connect_error());
		}

		return $link;
	} 

?>