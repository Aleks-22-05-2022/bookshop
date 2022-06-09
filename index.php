<!-- поиск -->

<?php  
if ($_GET['result'] != ''){
	$query_search = $_GET['result'];
	$query_search = trim($query_search); 
    $query_search = mysql_real_escape_string($query_search);
    $query_search =htmlspecialchars($query_search);?>
	<a href="project/search.php?result=<?php echo $query_search;?>"></a>
	<?php
}
?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Читай</title>
        <link rel="stylesheet" href="project/style.css">
    </head>
    <body>
        <header>
            <a href=""><img src="project/photo/logoza_ru.png" class="logo"></a>
			<form action="project/search.php?result=<?php echo $query_search;?>">
				<input type="text" placeholder="Поиск..." class="search" id="result" name="result">
            	<input type="submit" value="&#128269;" class="searchSub" >
			</form>
            <img src="project/photo/cabinet.png" class="login"> 
            <a href="" class="log">Войти</a>
            <div class="imgblock">
                <a href=""><img src="project/photo/Screenshot_7-removebg-preview.png" alt="Snow"></a>
                <span>0<?php echo $num; ?></span> <!-- Нужно потом считать количество товаров в корзине -->
            </div>
        </header>
        <nav class="menu">
            <a href="project/categories.php?cat=Classic">Классика</a>
            <a href="project/categories.php?cat=Psihologes">Психология</a>
            <a href="project/categories.php?cat=Novel">Романы</a>
            <a href="project/categories.php?cat=Fantasy">Фэнтези</a>
            <a href="project/categories.php?cat=Children">Детская литература</a>
        </nav>
        <h1 class="new">Новинки литературы</h1>
		<?php 
			require_once ("project/Connections/shop.php");
			$link = mysqli_connect($host, $username, $password);
			$select = mysqli_select_db($link, $db);
			$query = 'select * from products';
			$select = mysqli_query($link, $query);
			$photo = array();
			$id = array();
			$name = array();
			$author = array();
			$price = array();
			$photo_b = array();
			$id_b = array();
			$name_b = array();
			$author_b = array();
			$price_b = array();
		    $col = 0;
		 	$col_b = 0;
			while ($book = mysqli_fetch_array($select)){
				if ($book['year_publication'] == 2022){
					$col += 1;
					$photo[$col] = $book['url_photo']; 
					$id[$col] = $book['id']; 
					$name[$col] = $book['name_products']; 
					$author[$col] = $book['author']; 
					$price[$col] = $book['price_products']; 
				}
				if ($book['bestsellers'] == "y"){
					$col_b += 1;
					$photo_b[$col_b] = $book['url_photo']; 
					$id_b[$col_b] = $book['id']; 
					$name_b[$col_b] = $book['name_products']; 
					$author_b[$col_b] = $book['author']; 
					$price_b[$col_b] = $book['price_products']; 
				}
			}?>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
		<script src="project/slider.js"></script>
			<div id="main">
				<div class="slider">
					<div class="slide-list">
						<div class="slide-wrap">
						<?php 
						for($i = 1; $i < $col + 1; $i++){?>
							<div class="slide-item">
							<a href="project/str.php?book=<?php echo $id[$i];?>">
								<div class='tovar'>
									<img class="Pictures" src="<?php echo $photo[$i]?>"> <br>
									<p class=NameBook><?php echo $name[$i], "<br>";?></p>
									<p class="Author"><?php echo $author[$i], '<br>';?></p>
									<div class="button">
										<p class="Price"><?php echo $price[$i], " Рублей <br>";?> </p>
										<input type="button" value="Купить" > <!--Добавление в корзину корзину-->
									</div>
								</div>
							</a></div><?php 
						} 
						?></div>
						<div class="clear"></div>
					</div>
				<div class="navy prev-slide"></div>
				<div class="navy next-slide"></div>
			</div>
		</div>
		
		<script src="project/slider1.js"></script>
		<h1 class="new">Бесселеры</h1>	
			<div id="main1">
				<div class="slider">
					<div class="slide-list">
						<div class="slide-wrap">
						<?php 
						for($i = 1; $i < $col_b + 1; $i++){?>
							<div class="slide-item">
							<a href="project/str.php?book=<?php echo $id_b[$i];?>">
								<div class='tovar'>
									<img class="Pictures" src="<?php echo $photo_b[$i]?>"> <br>
									<p class=NameBook><?php echo $name_b[$i], "<br>";?></p>
									<p class="Author"><?php echo $author_b[$i], '<br>';?></p>
									<div class="button">
										<p class="Price"><?php echo $price_b[$i], " Рублей <br>";?> </p>
										<input type="button" value="Купить"> <!--Добавление в корзину корзину-->
									</div>
								</div>
							</a></div><?php 
						} 
						?></div>
						<div class="clear"></div>
					</div>
				<div class="navy prev-slide"></div>
				<div class="navy next-slide"></div>
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
				<li><a href="project/o_kompanii.php">О компании</a></li>
				<li><a href="project/partners.php">Партнеры</a></li>
				<li><a href="project/dostavka.php">Доставка и оплата</a></li>
			</ul>
			<p>©2022 Читай. | Отвлекись от реальности</p>
	</footer>
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>
<!-- корзина -->
<?php 
$query_count = 'select count(*) from basket';
$select_count = mysqli_query($link, $query);
//$num = mysql_num_rows($select_count);
function Basket($q){
	$query_tbl = "insert into basket (products_id) value ($q);";
	$select_count = mysqli_query($link, $query);
	$query_count = 'select count(*) from basket';
	$select_count = mysqli_query($link, $query);
	header("Refresh:0");
}
?>








