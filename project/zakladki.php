<!DOCTYPE html>
<?php 
$book_id = $_GET['book'];
require_once ("Connections/shop.php");
$link = mysqli_connect($host, $username, $password);
$select = mysqli_select_db($link, $db);
$query = 'select * from products';
$select = mysqli_query($link, $query);
while ($book = mysqli_fetch_array($select)){
	if ($book_id == $book['id']){
		$name = $book['name_products'];
		$description = $book['description_products'];
		$price = $book['price_products'];
		$author = $book['author'];
		$url = $book['url_photo'];
		$categories = $book['categories_products'];
		$weight = $book['weight'];
		$year = $book['year_publication'];
		$cover = $book['cover_type'];
		$public = $book['publishing_house'];
		$pages = $book['pages'];
		$age = $book['age_restrictions'];
	}
}
?>

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

<?php 
	require_once ("Connections/shop.php");
	$link = mysqli_connect($host, $username, $password);
	$select = mysqli_select_db($link, $db);
	$query = 'select * from basket where mark="y" and users_id='.file_get_contents("session.txt").'';
	$select = mysqli_query($link, $query);
	$product = array();
	$col = 0;
	$photo = array();
	$id = array();
	$name = array();
	$author = array();
	$price = array();
	while ($book1 = mysqli_fetch_array($select)){
		$col += 1;
		$product[$col] = $book1["products_id"];
		$query1 = 'select * from products where id='.$book1["products_id"].'';
		$select1 = mysqli_query($link, $query1);
		while ($book = mysqli_fetch_array($select1)){
			$photo[$col] = $book['url_photo']; 
			$id[$col] = $book['id']; 
			$name[$col] = $book['name_products']; 
			$author[$col] = $book['author']; 
			$price[$col] = $book['price_products']; 
		}
	}
?>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <title>Читай</title>
        <link rel="stylesheet" href="zakladki1.css">
    </head>
    <body>
        <header>
            <a href="../index.php"><img src="photo/logoza_ru.png" class="logo"></a>
            <form action="search.php?result=<?php echo $query_search;?>">
				<input type="text" placeholder="Поиск..." class="search" id="result" name="result">
            	<input type="submit" value="&#128269;" class="searchSub" >
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
        <div class="ramka"><a href="zakaz.php">Мои заказы</a></div>
        <div class="ramka"><a href="liked.php">Понравившееся</a></div>
        <div class="ramka"><a href="#">Закладки</a></div>
        <div class="ramka"><a href="del.php">Выйти</a></div>
   </nav>
   
   <div class="block-border card-block">
           <div class="group-title">
               <a class="right"><span style="margin-right:0;" class="i-group-edit"></span></a><h2>Закладки</h2>
           	</div>
           	<div class="with-pad">             
				<div class="wrapper">
				<figure>
    			<div class="block">
						<?php 
						for($i = 1; $i < $col + 1; $i++){?>
							<a href="str.php?book=<?php echo $id[$i];?>">
								<div class='tovar'>
									<img class="Pictures" src="<?php echo $photo[$i]?>"> <br>
									<p class=NameBook><?php echo $name[$i], "<br>";?></p>
									<p class="Author"><?php echo $author[$i], '<br>';?></p>
									<div class="button">
										<p class="Price"><?php echo $price[$i], " Рублей <br>";?> </p>
										<input type="button" value="Купить"> <!--Добавление в корзину корзину-->
									</div>
								</div>
							</a><?php 
						} 
					?>
				</div>
				</figure>
			</div>
       	</div>
   </div>
</div>
		
    </main>
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

