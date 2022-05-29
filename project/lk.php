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
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <title>Читай</title>
        <link rel="stylesheet" href="lk1.css">
    </head>
    <body>
        <header>
            <a href="#"><img src="file:///D|/polytech/2сем/ПД/photo/logoza_ru.png" class="logo"></a>
            <input type="text" placeholder="Поиск..." class="search"> <!--Нужно написать поиск по странице-->
            <input type="submit" value="&#128269;" class="searchSub">
            <img src="https://xn--80aaaacc4bth9atiu.xn--p1ai/static/img/cabinet.png" class="login"> 
            <div class="imgblock">
                <a href=""><img src="https://avatars.mds.yandex.net/i?id=3647d58c8eb96d86f46741f5292d21ba-5663007-images-thumbs&n=13" alt="Snow"></a>
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
		
		 <nav class="menu1">
            <a href="">Мои заказы</a>
            <a href="">Понравившееся</a>
            <a href="">Прочитанные</a>
            <a href="">Рецензии</a>
        </nav>
        
		<div class="block-border card-block">
                <div class="group-title">
                    <a class="right"><span style="margin-right:0;" class="i-group-edit"></span></a>                    <h2>Личные данные</h2>
                </div>
                <div class="with-pad">                     
                <div class="profile-info-column">
                <span class="group-row-title"><b>Имя</b>: Иван</span> <span class="group-row-title"><b>Фамилия</b>: Иванов</span>
					<span class="group-row-title"><b>Телефон:</b> +79999999999</span>
					 <span class="group-row-title"><b>Дата рождения:</b> 01&nbsp;января&nbsp;2022&nbsp;г.</span>
                     <span class="group-row-title"><b>Дата регистрации:</b> 01&nbsp;января&nbsp;2022&nbsp;г.</span>
                    <span class="group-row-title"><b>Статус:</b> Новичок</span>
                     <span class="group-row-title"><b>Рейтинг:</b> скоро появится</span>
                     <span class="group-row-title"><b>Индекс активности:</b> скоро появится</span>
                </div>
            </div>
		</div>
	</ul>                          
        
    </main>
					
    </body>
</html>