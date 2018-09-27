<?php 

	require('config.php');
	require('connect.php');
	$link = dbConnect();

	require('functions/user-verification.php');
	require('functions/updateCookie.php');
	
	// Вход в систему / Проверка пользователя
	if ( isset($_POST['user-enter']) ) {
		// name = "admin";
		// password = "11111";

		$query = "SELECT * FROM `users`";
		$result = mysqli_query($link,$query);

		if (!empty($result) && !mysqli_error($link)) {
			
			$isUserExist = false;
			
			while ($row = mysqli_fetch_array($result)) {
				
				if ( $_POST['user-login'] == $row['name'] ) {
					$isUserExist = true;
					if ( $_POST['user-password'] == $row['password'] ) {
						// Добавляем пользователя в сессию
						$_SESSION['login'] = $_POST['user-login'];
						// Добавляем права администратора
						if ( $row['admin'] ) {
							$_SESSION['admin'] = true;
						}
						header('location:' . HOST . 'index.php');		
					} else {
						$errorData =  "Неверный пароль!";
					}
				}
			}

			if ( !$isUserExist ) $errorData = "Неверное имя пользователя!";

		} else {
			$errorData =  "Ошибка при загрузке данных о пользователях." . mysqli_error($link);
		}

	}

	// Выход из системы / Сброс данных сессии
	if ( isset($_GET['action']) ) {
		
		if ($_GET['action'] == 'resetSession') {
			unset($_SESSION['login']);
			unset($_SESSION['admin']);
			updateCookie(time()-1);
			header('location:' . HOST . 'index.php');
		}
		
	}

	include('views/header.tpl');
	include('views/notifications.tpl');
	include('views/login.tpl');
	include('views/footer.tpl');

?>