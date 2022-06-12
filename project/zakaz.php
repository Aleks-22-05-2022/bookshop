<!DOCTYPE html>

<?php  
$session = fopen("session.txt", "r");
if(file_get_contents("session.txt") != '') {
	require_once ("Connections/shop.php");
	$link = mysqli_connect($host, $username, $password);
	$select = mysqli_select_db($link, $db);
	$query = 'select * from users where id = '.file_get_contents("session.txt").'';
	$select = mysqli_query($link, $query);
	$name = mysqli_fetch_assoc($select);
	$log = "<a href=\"lk.php\" class=\"log\">".$name['name']."</a>";
} else {
	$log = "<a href=\"log_in.php\" class=\"log\">Войти</a>";	
}
?>

<?php 
require_once ("Connections/shop.php");
$link = mysqli_connect($host, $username, $password);
$select = mysqli_select_db($link, $db);
$query = 'select * from orders where users_id = '.file_get_contents("session.txt").'';
$select = mysqli_query($link, $query);
$col = 0;
$id = array();
$status = array();
$price = array();
while ($book = mysqli_fetch_array($select)){
	$col += 1;
	$id[$col] = $book['id']; 
	$status[$col] = $book['status']; 
	$price[$col] = $book['price']; 
}
?>

<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Читай</title>
        <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <header>
            <a href="../index.php"><img src="photo/logoza_ru.png" class="logo"></a>
			<form action="search.php?result=<?php echo $query_search;?>">
				<input type="text" placeholder="Поиск..." class="search" id="result" name="result"> <!--Нужно написать поиск по странице-->
				<input type="submit" value="&#128269;" class="searchSub">
			</form>
            <img src="photo/cabinet.png" class="login"> 
            <div class="imgblock">
                <a href="korzina.php"><img src="photo/Screenshot_7-removebg-preview.png" alt="Snow"></a>
                <span><?php echo $num; ?></span> <!-- Нужно потом считать количество товаров в корзине -->
            </div>
        </header>
        <nav class="menu">
            <a href="categories.php?cat=Classic">Классика</a>
            <a href="categories.php?cat=Psihologes">Психология</a>
            <a href="categories.php?cat=Novel">Романы</a>
            <a href="categories.php?cat=Fantasy">Фэнтези</a>
            <a href="categories.php?cat=Children">Детская литература</a>
        </nav>
		<div class="obc">
		
		<nav class="menu1">
		<div class="ramka"><a href="lk.php">Мой профиль</a></div>
        <div class="ramka"><a href="#">Мои заказы</a></div>
        <div class="ramka"><a href="liked">Понравившееся</a></div>
        <div class="ramka"><a href="zakladki.php">Закладки</a></div>
        <div class="ramka"><a href="del.php">Выйти</a></div>
   		</nav>
		<div class="block-border card-block">
           <div class="group-title">
               <a class="right"><span style="margin-right:0;" class="i-group-edit"></span></a><h2>Заказы</h2>
           	</div>
           	<div class="with-pad">             
				
				<figure>
					<div class="partners">
						<ul class="korzina">
							<li>Заказ №</li>
							<li>Статус</li>
							<li>К оплате</li>
							<li>Способ оплаты</li>
						</ul>
						<hr>
				</div>
					<div class="partners">
						<?php for($i = 1; $i < $col + 1; $i++){?>
						<ul class="korzina">
							<li><?php echo $id[$i] ?></li>
							<li><?php echo $status[$i] ?></li>
							<li><?php echo $price[$i] ?></li>
							<li><a>Карта</a></li>
						</ul>
						<?php
						} ?>
				</div>
				</figure>
			
       	</div>
   </div>
</div>
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

<!-- поиск -->

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