<?php
	session_start();
?>

<!doctype html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="reg.css">
    <title>Авторизация и регистрация</title>
</head>
<body>
	<header>
            <a href="../index.php"><img src="photo/logoza_ru.png" class="logo"></a>
			<form action="search.php?result=<?php echo $query_search;?>">
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
		<h1 class="reg">Регистрация</h1>
    	<form action="register.php" method="post" class="avt">
			<p>Имя</p>
			<input type="text" name="name" placeholder="Введите свое имя">
			<p>Фамилия</p>
			<input type="text" name="surname" placeholder="Введите свою фамилию">
			<p>Логин</p>
			<input type="email" name="email" placeholder="Введите адрес своей почты">
			<p>Адрес</p>
			<input type="text" name="adress" placeholder="Введите свой адрес">
			<p>Почтовый индекс</p>
			<input type="text" name="post_index" placeholder="Введите свой почтовый индекс">
			<p>Пароль</p>
			<input type="password" name="password" placeholder="Введите пароль"><br><br>
			<button type="submit" class="sub" name="send">Отправить</button><br>
		</form>
		<p class="reg"> У вас уже есть аккаунт? <br> <a href="log_in.php">Авторизируйтесь</a>!
		</p>
	
</body>
</html>
<?php 
		if (array_key_exists('send', $_POST)){
			if (!empty($_REQUEST['name']) and !empty($_REQUEST['surname']) and !empty($_REQUEST['email']) and !empty($_REQUEST['post_index']) and !empty($_REQUEST['password']) and !empty($_REQUEST['adress'])){
				require_once ("Connections/shop.php");
				$link = mysqli_connect($host, $username, $password);
				$select = mysqli_select_db($link, $db);
				$name = $_REQUEST['name'];
				$surname = $_REQUEST['surname'];
				$email = $_REQUEST['email'];
				$adress = $_REQUEST['adress'];
				$post_index = $_REQUEST['post_index'];
				$password = $_REQUEST['password'];

				mysqli_query($connect, "INSERT INTO `users` (`id`, `name`, `s_name`, `adress`, `post_index`, `email`, `password`) VALUES (NULL, '$name', '$surname', '$adress', '$post_index', '$email', '$password');");
				?>
				<script>
					document.location.replace("log_in.php");
					alert("Регистрация прошла успешно");
				</script>
				<?php
			}else{
				echo '<p class="error">Вы ввели не все данные</p>';
			}
		}
		?>