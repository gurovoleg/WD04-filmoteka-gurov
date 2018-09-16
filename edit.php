<!-- Разные миксины по одному, которые понадобятся. Для логотипа, бейджа, и т.д.-->
<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8" />
	<title>Редактирование фильма</title>
	<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"/><![endif]-->
	<link rel="stylesheet" href="libs/normalize-css/normalize.css" />
	<link rel="stylesheet" href="libs/bootstrap-4-grid/grid.min.css" />
	<!-- build:cssCustom css/main.css -->
	<link rel="stylesheet" href="./css/main.css" /><!-- endbuild -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&amp;subset=cyrillic-ext" rel="stylesheet">
	<!--[if lt IE 9]><script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script><![endif]-->
</head>

<?php 

	$updateSuccess = false;
	$errorData = "";

	// Connect to DB
	$link = mysqli_connect('localhost','root','root','WD04-filmoteka-gurov');
	$error = mysqli_connect_error();

	if (!$link){
		exit("Connection failed: $error .");
	}

	// Update film data in DB
	if (array_key_exists('update-newFilm', $_POST)) {
		
		$query = "UPDATE `films` 
					SET `name` = '" . mysqli_real_escape_string($link, $_POST['title'])
					 . "',`genre` = '" . mysqli_real_escape_string($link, $_POST['genre'])
					 . "',`year` = '" . mysqli_real_escape_string($link, $_POST['year'])
					  . "' WHERE id=" . $_GET['id'];

		if (mysqli_query($link,$query)) {
			$updateSuccess = true;
		} else {
			$errorData = "Произошла ошибка:" . mysqli_error($link);
		}
		
	}


	// Upload film from DB
	$query = "SELECT * FROM `films` WHERE id='" . $_GET['id'] . "'";
	$result = mysqli_query($link,$query);
	$row = mysqli_fetch_array($result);

?>


<body class="index-page">
	<div class="container user-content section-page">
		
		<!-- <div class="title-1"></div> -->
		<?php if ($updateSuccess) { ?>
			<div class="notify notify--update mb-20">Информация по фильму обновлена</div>
		<?php } ?>

		<?php if ($errorData != "") { ?>
			<div class="notify notify--error mb-20"><?php echo $errorData; ?></div>
		<?php } ?>
		
		<div class="card mb-20">
			<div class="card__header">
				<h4 class="title-4"> <?php echo $row['name'];?> </h4>
				<div class="buttons">
					<!-- <a href="?action=delete&id=" class="button button--remove">Удалить</a> -->
				</div>
			</div>
			<div class="badge"> <?php echo $row['genre'];?> </div>
			<div class="badge"> <?php echo $row['year'];?> </div>
		</div>
		
		<div class="panel-holder mt-80 mb-40">
			<div class="title-4 mt-0">Редактировать фильм</div>
			<form id="form-film-update" action="edit.php?id=<?php echo $row['id'];?>" method="POST">
				
				<div class="form-group">
					<label class="label">Название фильма
						<input id="film-title" class="input" name="title" type="text" value="<?php echo $row['name'];?>"/>
					</label>
				</div>
				
				<div class="row">
					<div class="col">
						<div class="form-group">
							<label class="label">Жанр
								<input class="input" name="genre" type="text" value="<?php echo $row['genre'];?>"/>
							</label>
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<label class="label">Год
								<input class="input" name="year" type="text" value="<?php echo $row['year'];?>"/>
							</label>
						</div>
					</div>
				</div>
				<input class="button" type="submit" name="update-newFilm" value="Сохранить изменения" />
			</form>
		</div>
		<a href="index.php">На главную</a>
	</div>
	
	<script src="libs/jquery/jquery.min.js"></script>
	<script src="js/main.js"></script>
	<script defer="defer" src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
</body>

</html>