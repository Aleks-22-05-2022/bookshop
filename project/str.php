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
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="str1.css" type="text/css">
</head>

<body>
	<header>
            <a href="../index.php"><img src="photo/logoza_ru.png" class="logo"></a>
			<form action="search.php?result=<?php echo $query_search;?>">
				<input type="text" placeholder="Поиск..." class="search" id="result" name="result">
            	<input type="submit" value="&#128269;" class="searchSub" >
			</form>
            <img src="photo/cabinet.png" class="login"> 
            <?php echo $log;?>
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
	<br>
	<div class="main">
    <figure class="left">
        <img width="350" height="490" src="<?php echo $url;?>" width="200" alt="">
        
    </figure>
    
    <div>
		<div>
			<p class="b"><?php echo $name;?></p>
			<p class="a"><?php echo $author;?></p>    
        </div>
		<div class="flex">
        <p><button type="button" class="rating-widget__button">
                <span class="rating-widget__icon-holder">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        class="rating-widget__icon">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M12.89 20.005a1.844 1.844 0 00-1.78 0l-3.218 1.762c-1.403.768-3.041-.472-2.774-2.098l.615-3.732a2.042 2.042 0 00-.55-1.761L2.58 11.532c-1.134-1.152-.508-3.158 1.06-3.395l3.598-.544a1.919 1.919 0 001.44-1.09l1.609-3.395a1.879 1.879 0 013.428 0l1.61 3.396c.278.587.816.994 1.439 1.089l3.598.544c1.568.237 2.194 2.243 1.06 3.395l-2.604 2.643a2.042 2.042 0 00-.55 1.761l.615 3.732c.267 1.626-1.371 2.866-2.774 2.098l-3.219-1.762z">
                        </path>
                    </svg></span><span class="rating-widget__main-text"> 4,31(13518 оценок) </span>
            </button></p>

        <p>
        <div class="rating-area">
            <input type="radio" id="star-5" name="rating" value="5">
            <label for="star-5" title="Оценка «5»"></label>
            <input type="radio" id="star-4" name="rating" value="4">
            <label for="star-4" title="Оценка «4»"></label>
            <input type="radio" id="star-3" name="rating" value="3">
            <label for="star-3" title="Оценка «3»"></label>
            <input type="radio" id="star-2" name="rating" value="2">
            <label for="star-2" title="Оценка «2»"></label>
            <input type="radio" id="star-1" name="rating" value="1">
            <label for="star-1" title="Оценка «1»"></label>
        </div>
        </p>

        <p>
            Купили более 56 000 раз
        </p>

    </div>
	</div>
    <hr align="left" width=63.7%>
	
	<div class="descrip">

    <div class="te">
        <table cellpadding="5" cellspacing="0" width="400" height="200" align="center">
            <tr>
                <td class="tablica">ID товара:</td>
                <td class="inf"><?php echo $book_id;?></td>
            </tr>
            <tr>
                <td class="tablica">Издательство:</td>
                <td class="inf"><?php echo $public;?></td>
            </tr>
            <tr>
                <td class="tablica">Вес,г:</td>
                <td class="inf"><?php echo $weight;?></td>
            </tr>
            <tr>
                <td class="tablica">Год издания:</td>
                <td class="inf"><?php echo $year;?></td>
            </tr>
            <tr>
                <td class="tablica">Переплёт:</td>
                <td><?php echo $cover;?></td>
            </tr>
            <tr>
                <td class="tablica">Тематика:</td>
                <td class="inf"><?php echo $categories;?></td>
            </tr>
            <tr>
                <td class="tablica">Количество страниц:</td>
                <td class="inf"><?php echo $pages;?></td>
            </tr>
            <tr>
                <td class="tablica">Возрастные ограничения:</td>
                <td ><?php echo $age;?></td>
            </tr>
        </table>
    </div>
		<div class="flex">

            <div align="center" class="sidebar">
                <span style="color: rgb(7, 109, 7)">В наличии</span>
                <div align="center" class="sidebar1">
                    <?php echo $price;?>
					<br>
					<br>
                    <div class="knopka">
						<form method="post">
							<button class="d">Купить</button>
						</form>
						<br>
                        <form method="post">
                        <button class="izb" name="mark">Добавить в закладки</button>
						</form>
                    </div>
                </div>
            </div>
        </div>
    <div class="m">
        <table cellpadding="2" cellspacing="2" width="250" height="250" align="middle" class='delivery'>
            <th>Как получить заказ</th>
            <tr>
                <td>Курьером</td>
                <td class="tablica1">180 ₽</td>
            </tr>
            <tr>
                <td>Пунктом выдачи</td>
                <td class="tablica1">106 ₽</td>
            </tr>
        </table>
    </div>
        
    
	</div>
	
	<div class="er">
		<h3 class="annot">Аннотация</h3>
		<p class="annot1">
			<?php echo $description;?>
		</p>
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

<?php 
if(array_key_exists('mark', $_POST)){
	require_once ("Connections/shop.php");
	$link = mysqli_connect($host, $username, $password);
	$select = mysqli_select_db($link, $db);
	$query = "insert into basket (`products_id`, `mark`) values ('$book_id', 'y');";
	$select = mysqli_query($link, $query);
	echo "<script>alert('Книга добавлена в закладки');</script>";
}
?>

