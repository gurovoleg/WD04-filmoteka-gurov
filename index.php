<!-- Разные миксины по одному, которые понадобятся. Для логотипа, бейджа, и т.д.-->
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

<?php 

	$deleteSuccess = false;	
	$addSuccess = false;
	$errorData = "";

	// Connect to DB
	$link = mysqli_connect('localhost','root','root','WD04-filmoteka-gurov');
	$error = mysqli_connect_error();

	if (!$link){
		exit("Connection failed: $error .");
	}

	// Delete data from DB
	// echo "<pre>";
	// print_r($_POST);
	// echo "</pre>";

	if ( $_GET ) {
		if ( $_GET['action']=='delete' ) {
			$query = "DELETE FROM `films` WHERE id='" . mysqli_real_escape_string($link, $_GET['id']) . "'";
			mysqli_query($link,$query);

			if (mysqli_affected_rows($link) > 0) {
				$deleteSuccess = true;

			}
		}
	}


	// Add new data to DB
	// if (array_key_exists('add-newFilm', $_POST)) {
	if ( $_GET ) {
		if ( $_GET['action']=='add' ) {
			
			$query = "INSERT INTO `films` (`name`,`genre`,`year`) VALUES ('" 
						. mysqli_real_escape_string($link, $_POST['title']) . "','"
						. mysqli_real_escape_string($link, $_POST['genre']) . "','"
						. mysqli_real_escape_string($link, $_POST['year']) . "')";

			if (mysqli_query($link,$query)) {
				$addSuccess = true;
			} else {
				// echo "<p>Новый фильм не был добавлен. Произошла ошибка:" . mysqli_error($link) . "</p>";
				$errorData = "Произошла ошибка:" . mysqli_error($link);
			}
			
		}
	}


	// Upload data from DB
	$query = "SELECT * FROM `films`";
	$result = mysqli_query($link,$query);

?>


<body class="index-page">
	<div class="container user-content section-page">
		
		<?php if ($deleteSuccess) { ?>
			<div class="notify notify--update mb-20">Фильм удален</div>
		<?php } ?>

		<?php if ($addSuccess) { ?>
			<div class="notify notify--success mb-20">Фильм добавлен</div>
		<?php } ?>

		<?php if ($errorData != "") { ?>
			<div class="notify notify--error mb-20"><?php echo $errorData; ?></div>
		<?php } ?>
		
		<div class="title-1">Фильмотека</div>
		
		<?php while ($row = mysqli_fetch_array($result)) {?>

		<div class="card mb-20">
			<div class="card__header">
				<h4 class="title-4"> <?php echo $row['name'];?> </h4>
				<div class="buttons">
					<a href="edit.php?id=<?php echo $row['id'];?>" class="button button--edit">Изменить</a>
					<a href="?action=delete&id=<?php echo $row['id'];?>" class="button button--remove">Удалить</a>
				</div>
			</div>
			<div class="badge"> <?php echo $row['genre'];?> </div>
			<div class="badge"> <?php echo $row['year'];?> </div>
		</div>
		
		<?php } ?>
		

		<div class="panel-holder mt-80 mb-40">
			<div class="title-3 mt-0">Добавить фильм</div>
			<form id="form-film-add" action="index.php?action=add" method="POST">

				<div class="notify notify--error display-none mb-20">Необходимо заполнить все поля!</div>
				<!-- <div class="notify notify--success mb-20">Вы добавили новый фильм!</div> -->
				
				<div class="form-group">
					<label class="label">Название фильма
						<input id="film-title" class="input" name="title" type="text" placeholder="Такси 2" />
					</label>
				</div>
				
				<div class="row">
					<div class="col">
						<div class="form-group">
							<label class="label">Жанр
								<input class="input" name="genre" type="text" placeholder="комедия" />
							</label>
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<label class="label">Год
								<input class="input" name="year" type="text" placeholder="2000" />
							</label>
						</div>
					</div>
				</div>
				<input class="button" type="submit" name="add-newFilm" value="Добавить" />
			</form>
		</div>
	</div>
	
	<script src="libs/jquery/jquery.min.js"></script>
	<script src="js/main.js"></script>
	<script defer="defer" src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
</body>

</html>