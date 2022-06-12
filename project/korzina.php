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
$query = 'select t.id, t.products_id, t.product_count, k.url_photo, k.name_products, k.price_products from basket t, products k where mark="n" and t.products_id = k.id and t.users_id = '.file_get_contents("session.txt").'';
$select = mysqli_query($link, $query);
$col = 0;
$sum = 0;
$id = array();
$product_id = array();
$product_count = array();
$url_photo = array();
$name_products = array();
$price_products = array();
while ($book = mysqli_fetch_array($select)){
	$col += 1;
	$id[$col] = $book['id']; 
	$product_id[$col] = $book['product_id']; 
	$product_count[$col] = $book['product_count']; 
	$url_photo[$col] = $book['url_photo']; 
	$name_products[$col] = $book['name_products']; 
	$price_products[$col] = $book['price_products']; 
	$sum += $book['price_products'];
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
            <?php echo $log;?>
            <div class="imgblock">
                <a href="#"><img src="photo/Screenshot_7-removebg-preview.png" alt="Snow"></a>
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
		<div class="partners">
    	<table>
				<tr><td></td><td><p>Название</p></td><td><p>Цена</p></td><td><p>Количество</p></td><td><p></p></td></tr>
				<?php
							for($i = 1; $i < $col + 1; $i++){?>
								
								<tr style="border-top:1px solid #829D93; border-bottom:1px solid #829D93;" border="0">
									<td><img src="<?php echo $url_photo[$i];?>" style="width: 80px; height: 120px;"/></td><td>
								<?php echo $name_products[$i];?></td><td>
								<?php echo $price_products[$i];?></td><td>
								<?php echo $product_count[$i];?></td>
									<td><button class='dell'>Удалить</button></td></tr>
								
			
			<?php
							}
							?>
			</table>
    </div>
<hr>
<div style="width: 100%; text-align: right;">
	<div style="width: 50%; float: right;">
		<form method="post">
			<button class='dell1' name='delete'>Очистить корзину</button>
			<button class='dell2' name='order'>Оформить заказ</button>
		</form>
		
	</div>
</div>
			</div>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
		<script src="slider.js"></script>
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
    $query_search = htmlspecialchars($query_search);?>
	<a href="search.php?result=<?php echo $query_search;?>"></a>
	<?php
}
if(array_key_exists('order', $_POST)){
	require_once ("Connections/shop.php");
	$link = mysqli_connect($host, $username, $password);
	$select = mysqli_select_db($link, $db);
	$date = date('Y-m-d');
	$time = date("H:i:s");
	$query = "insert into orders (`date`, `time`,`price`,`users_id`, `status`) values ('$date', '$time', '$sum', '".file_get_contents("session.txt")."', 	'Оформлен');";
	$select = mysqli_query($link, $query);
	echo "<script>alert('Заказ оформлен');</script>";
}

if(array_key_exists('dell', $_POST)){
	require_once ("Connections/shop.php");
	$link = mysqli_connect($host, $username, $password);
	$select = mysqli_select_db($link, $db);
	$query = "insert into basket (`products_id`, `product_count`,`mark`) values ('$book_id', 1, 'n');";
	$select = mysqli_query($link, $query);
	echo "<script>alert('Книга добавлена в корзину');</script>";
}


?>