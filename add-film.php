<?php 

	// Connect to DB
	require('config.php');
	require('connect.php');
	$link = dbConnect();

	require('models/films.php');
	require('functions/user-verification.php');

	// Add new data to DB
	if (array_key_exists('form-film-add', $_POST)) {
		
		$result = addNewFilm($link, $_POST['title'],$_POST['genre'],$_POST['year'],$_POST['description']);	

		if ($result) $addSuccess = true;
		else $errorData = "Произошла ошибка:" . mysqli_error($link);
			
	}

	include('views/header.tpl');
	include('views/notifications.tpl');
	include('views/add-film.tpl');
	include('views/footer.tpl');

?>