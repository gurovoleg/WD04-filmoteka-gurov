<?php 

	function uploadAllFilms($link){
		$query = "SELECT * FROM `films`";
		$result = mysqli_query($link,$query);

		if (!empty($result) && !mysqli_error($link)) {
			return $result;			
		} else {
			exit("Loadind data error." . mysqli_error($link));
		}
	}

	function addNewFilm($link, $title, $genre, $year, $description){

		$result = processImageFile();
		if ($result != false) $dbFileName = $result;
		else $dbFileName = "";

		$query = "INSERT INTO `films` (`name`,`genre`,`year`,`description`,`photo`) VALUES ('" 
					. mysqli_real_escape_string($link, $title) . "','"
					. mysqli_real_escape_string($link, $genre) . "','"
					. mysqli_real_escape_string($link, $year) . "','"
					. mysqli_real_escape_string($link, $description) . "','"
					. mysqli_real_escape_string($link, $dbFileName) . "')";
		
		if (mysqli_query($link,$query)) return true;
		else return false;
	}

	function getFilm($link, $id){
		$query = "SELECT * FROM `films` WHERE id=$id";
		$result = mysqli_query($link,$query);
		$row = mysqli_fetch_array($result);

		if (!empty($result) && !empty($row)) {
			return $row;			
		} else {
			exit("Loadind data error. Film ID = $id ." . mysqli_error($link));
		}
	}

	function updateFilm($link, $title, $genre, $year, $description, $id) {

		$result = processImageFile();
		if ($result != false) $dbFileName = $result;
		else $dbFileName = "";

		$query = "UPDATE `films` 
					SET `name` = '" . mysqli_real_escape_string($link, $title)
					 . "',`genre` = '" . mysqli_real_escape_string($link, $genre)
					 . "',`year` = '" . mysqli_real_escape_string($link, $year)
					 . "',`description` = '" . mysqli_real_escape_string($link, $description)
					 . "',`photo` = '" . mysqli_real_escape_string($link, $dbFileName)
					 . "' WHERE id=$id";
		 
		 if (mysqli_query($link,$query)) return true;
		 else return false;
	}

	function deleteFilm($link, $id) {
		$query = "DELETE FROM `films` WHERE id='" . mysqli_real_escape_string($link, $id) . "'";
		mysqli_query($link,$query);

		if (mysqli_affected_rows($link) > 0) return true;
		else return false;
	}

	// Check, create image file and thumbnail & copy image files to DB storage
	function processImageFile() {
		
		if ( $_FILES['photo']['name'] && $_FILES['photo']['tmp_name'] != "" ) {
			$fileName = $_FILES['photo']['name'];
			$fileTmpLocation = $_FILES['photo']['tmp_name'];
			$fileType = $_FILES['photo']['type'];
			$fileSize = $_FILES['photo']['size'];
			$fileError = $_FILES['photo']['error'];
			$temp = explode(".", $fileName);
			$fileExt = end($temp);

			list($width, $height) = getimagesize($fileTmpLocation);
			if ( $width < 10 || $height < 10) {
				$errorData = "The image has no dimensions";
			}
			// Generate file random name
			$dbFileName = rand(1000000,9999999) . "." . $fileExt;
			
			// Some checks
			if ($fileSize > 10485760 ){
				$errorData = "Your image size > 10mb";
			} else if (!preg_match("/\.(gif|jpg|png|jpeg)$/i", $fileName)) {
				$errorData = "Your image should be jpg, gif or png type";
			} else if ($fileError == 1) {
				$errorData = "An unknown error occured";
			}

			//Files location storage
			$photoFolderLocation = ROOT . "data/films/full/"; //для полных файлов
			$photoFolderLocationMin = ROOT . "data/films/min/"; //для миниатюр
			
			// Filename & filePath to be saved
			$uploadFile = $photoFolderLocation . $dbFileName;
			
			// echo "FileExt:" . $fileExt . "<br>";
			// echo "dbFileName:" . $dbFileName . "<br>";
			// echo "uploadFile:" . $uploadFile . "<br>";
			
			$result = move_uploaded_file($fileTmpLocation, $uploadFile);
			if (!$result) {
				$errorData = "File upload failed";
				return false;
			} else return $dbFileName;

			// Обрезаем файл - делаем миниатюру. Нужна бибилиотека imagick
			// require_once( ROOT . "functions/image_resize_imagick.php");
			// $target_file =  $photoFolderLocation . $dbFileName;
			// $resized_file = $photoFolderLocationMin . $dbFileName;
			// $wmax = 137;
			// $hmax = 200;
			// $img = createThumbnail($target_file, $wmax, $hmax);
			// $img->writeImage($resized_file);
		
		} else return false;
	}

?>