<?php 

	// Connect to DB
	require('config.php');
	require('connect.php');
	$link = dbConnect();

	require('models/films.php');

	// Update film in DB
	if (array_key_exists('update-Film', $_POST)) {
		
		$result = updateFilm($link, $_POST['title'],$_POST['genre'],$_POST['year'],$_POST['description'], $_GET['id']);
		
		if ($result) $updateSuccess = true;
		else $errorData = "Произошла ошибка:" . mysqli_error($link);
			
	}

	// Get film data from DB
	$film = getFilm($link, $_GET['id']);

	include('views/header.tpl');
	include('views/notifications.tpl');
	include('views/edit-film.tpl');
	include('views/footer.tpl');

?>