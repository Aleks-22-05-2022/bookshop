<!doctype html>

<?php  
if ($_GET['result'] != ''){
	$query_search = $_GET['result'];
	$query_search = trim($query_search); 
    $query_search = mysql_real_escape_string($query_search);
    $query_search =htmlspecialchars($query_search);?>
	<a href="search.php?result=<?php echo $query_search;?>"></a>
	<?php
}
?>
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
				$password = md5($_REQUEST['password']);

				mysqli_query($link, "INSERT INTO `users` (`name`, `s_name`, `adress`, `post_index`, `email`, `password`) VALUES ( '$name', '$surname', '$adress', '$post_index', '$email', '$password');");
				?>
				<script>
					alert("Регистрация прошла успешно");
					document.location.replace("log_in.php");
				</script>
				<?php
			}else{
				echo '<p class="error">Вы ввели не все данные</p>';
			}
		}
?>
	<footer>
		 	<div class="waves">
        		<div class="wave" id="wave1"></div>
    		</div>
			<ul class="social">
				<li><a href="#"><ion-icon name="logo-facebook"></ion-icon></a></li>
				<li><a href="#"><ion-icon name="logo-twitter"></ion-icon></a></li>
				<li><a href="#"><ion-icon name="logo-linkedin"><ion-icon></a></li>
				<li><a href="#"><ion-icon name="logo-instagram"></ion-icon></a></li>
			</ul>
			<ul class="foo">
				<li><a href="index.php">Главная</a></li>
				<li><a href="o_kompanii.php">О компании</a></li>
				<li><a href="partners.php">Партнеры</a></li>
				<li><a href="dostavka.php">Доставка и оплата</a></li>
			</ul>
			<p>©2022 Читай. | Отвлекись от реальности</p>
		</footer>
		<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
		<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>		
</body>
</html>

