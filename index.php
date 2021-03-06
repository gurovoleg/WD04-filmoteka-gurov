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

	// Connect to DB
	$link = mysqli_connect('localhost','root','root','WD04-filmoteka-gurov');
	$error = mysqli_connect_error();

	if (!$link){
		exit("Connection failed: $error .");
	}

	// Add new data to DB
	if (array_key_exists('add-newFilm', $_POST)) {
		
		$query = "INSERT INTO `films` (`name`,`genre`,`year`) VALUES ('" 
					. $_POST['title'] . "','"
					. $_POST['genre'] . "','"
					. $_POST['year'] . "')";

		if (mysqli_query($link,$query)) {
			// echo "<p>Новый фильм был успешно добавлен.</p>";
		} else {
			echo "<p>Новый фильм не был добавлен. Произошла ошибка:" . mysqli_error($link) . "</p>";
		}
		
	}


	// Upload data from DB
	$query = "SELECT * FROM `films`";
	$result = mysqli_query($link,$query);

?>


<body class="index-page">
	<div class="container user-content section-page">
		<div class="title-1">Фильмотека</div>
		
		<?php while ($row = mysqli_fetch_array($result)) {?>

		<div class="card mb-20">
			<h4 class="title-4"> <?php echo $row['name'];?> </h4>
			<div class="badge"> <?php echo $row['genre'];?> </div>
			<div class="badge"> <?php echo $row['year'];?> </div>
		</div>
		
		<?php } ?>
		

		<div class="panel-holder mt-80 mb-40">
			<div class="title-3 mt-0">Добавить фильм</div>
			<form id="form-film-add" action="index.php" method="POST">

				<div class="notify notify--error mb-20 d-none">Необходимо заполнить все поля!</div>
				<div class="notify notify--success mb-20 d-none">Вы добавили новый фильм!</div>
				
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