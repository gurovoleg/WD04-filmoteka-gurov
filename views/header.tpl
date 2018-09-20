<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8" />
	<title>Олег Гуров - Фильмотека</title>
	<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"/><![endif]-->
	<link rel="stylesheet" href="libs/normalize-css/normalize.css" />
	<link rel="stylesheet" href="libs/bootstrap-4-grid/grid.min.css" />
	<!-- build:cssCustom css/main.css -->
	<link rel="stylesheet" href="./css/main.css" /><!-- endbuild -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&amp;subset=cyrillic-ext" rel="stylesheet">
	<!--[if lt IE 9]><script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script><![endif]-->
</head>
<body class="index-page">
	<div class="container user-content">
		<div class="mt-20 mb-30">
			<a href="index.php" class="mr-10">Все фильмы</a>
			<a href="add-film.php" class="mr-10">Добавить фильм</a>
			<a href="request.php">Профиль пользователя</a>
		</div>

		<div class="mb-50">
			<?php if ( isset($_COOKIE['user-name']) ) {?>

				<?php if ( isset($_COOKIE['user-city']) ) {?>
					Привет, <?=$_COOKIE['user-name'];?>, из города <?=$_COOKIE['user-city'];?>!
				<?php } else {?>
					Привет, <?=$_COOKIE['user-name'];?>!
				<?php } ?>

			<?php } ?>
		</div>
	
