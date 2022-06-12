<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="main.css">
	<title>Авторизация</title>
</head>
<body>
	 <header>
            <a href="../index.php"><img src="photo/logoza_ru.png" class="logo"></a>
			<form action="=search.php?result=<?php echo $query_search;?>">
				<input type="text" placeholder="Поиск..." class="search" id="result" name="result">
            	<input type="submit" value="&#128269;" class="searchSub" >
			</form>
            <img src="photo/cabinet.png" class="login"> 
            <a href="log_in.php" class="log">Войти</a>
            <div class="imgblock">
                <a href=""><img src="photo/Screenshot_7-removebg-preview.png" alt="Snow"></a>
                <span>0<?php echo $num; ?></span> <!-- Нужно потом считать количество товаров в корзине -->
            </div>
        </header>
        <nav class="menu">
            <a href="categories.php?cat=Classic">Классика</a>
            <a href="categories.php?cat=Psihologes">Психология</a>
            <a href="categories.php?cat=Novel">Романы</a>
            <a href="categories.php?cat=Fantasy">Фэнтези</a>
            <a href="categories.php?cat=Children">Детская литература</a>
        </nav>
		<div class="auth">
			<h1>Войти</h1>
			<div class="poles">
				<form action="log_in.php" method="post">
				<p>Логин:</p>
				<input type="text" placeholder="..." name="email" class="pass">
				<p>Пароль:</p>
				<input type="password" placeholder="..." name="password" class="pass">
					<button type="submit" class="send" name="send">Войти</button>
				<p class="reg_text">
					У вас нет аккаунта? <a href="register.php">Зарегистрируйтесь</a>
				</p>
				</form>
			</div>
		</div>
</body>
</html>

<?php
	if ( !empty($_REQUEST['password']) and !empty($_REQUEST['email']) and array_key_exists('send', $_POST)) {
		//Пишем логин и пароль из формы в переменные (для удобства работы):
		require_once ("Connections/shop.php");
		$link = mysqli_connect($host, $username, $password);
		$select = mysqli_select_db($link, $db);
		$email = $_REQUEST['email']; 
		$passwords = md5($_REQUEST['password']); 
		$query = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$passwords' ";
		$select = mysqli_query($link, $query); //ответ базы запишем в переменную $result. 
		$user = mysqli_fetch_assoc($select); //преобразуем ответ из БД в нормальный массив PHP
		//Если база данных вернула не пустой ответ - значит пара логин-пароль правильная
		if (!empty($user)) {
			$session = fopen("session.txt", "w");
			fwrite($session, $user['id']);
			$fd = fopen("pr.txt", 'w');
			fwrite($fd, "0");
			?>
			<script>
				document.location.replace("../index.php");
			</script>
			<?php
		} else {
			echo '<p class="error">Неверный логин или пароль</p>';
		}
	}
?>


