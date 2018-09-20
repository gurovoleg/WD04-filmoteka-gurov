<?php 

	// Connect to DB
	require('config.php');
	require('connect.php');
	$link = dbConnect();

	require('models/films.php');
	require('functions/user-verification.php');

	// Delete Film from DB
	if ( $_GET ) {
		if ( $_GET['action']=='delete' ) {
			$result = deleteFilm($link, $_GET['id']);

			if ($result) $deleteSuccess = true;
			else $errorData = "Произошла ошибка:" . mysqli_error($link);
		}
	}

	// Upload all films data
	$result = uploadAllFilms($link);

	include('views/header.tpl');
	include('views/notifications.tpl');
	include('views/index.tpl');
	include('views/footer.tpl');

?>



	
