<?php 

	// DB const
	define('MYSQL_SERVER', 'localhost');
	define('MYSQL_USER', 'root');
	define('MYSQL_PASSWORD', 'root');
	define('MYSQL_DB', 'WD04-filmoteka-gurov');

	define('HOST','http://' . $_SERVER['HTTP_HOST'] . '/php/filmoteka/');
	define('IMG_PATH', HOST . "/data/films/full/");
	define('IMG_PATH_MIN', HOST . "/data/films/min/");


	define('ROOT', dirname(__FILE__) . "/");


	// Notify vars
	$deleteSuccess = false;
	$addSuccess = false;
	$updateSuccess = false;
	$errorData = "";

?>