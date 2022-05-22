
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
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Читай</title>
        <link rel="stylesheet" href="style.css">

    </head>
    <body>
        <header>
            <a href="../index.php"><img src="photo/logoza_ru.png" class="logo"></a>
			<form action="search.php?result=<?php echo $query_search;?>">
				<input type="text" placeholder="Поиск..." class="search"> <!--Нужно написать поиск по странице-->
				<input type="submit" value="&#128269;" class="searchSub">
			</form>
            <img src="photo/cabinet.png" class="login"> 
            <a href="" class="log">Войти</a>
            <div class="imgblock">
                <a href=""><img src="photo/Screenshot_7-removebg-preview.png" alt="Snow"></a>
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
		<h3>О компании</h3>
		<p class="text_part">«Читай.» – это сеть книжных магазинов и интернет-магазин.<br><br>
			Мы не просто продаём книги, а разделяем любовь наших покупателей к чтению. Нам знакомо чувство, когда хорошие романы заканчиваются слишком быстро, времени в дороге не хватает, чтобы дочитать главу, а героиня никак не может найти свою любовь. 
			Мы знаем, как быстро летит время в компании с новинкой любимого автора и как сильно хочется растянуть это удовольствие.<br></p>
			<h3>3 причины влюбиться в «Читай.»</h3>
			<ol class="text_part">
				<li>Огромный выбор. Если вы отчаялись в поисках подарка, скорее приходите в наш магазин или загляните на сайт.</li>
				<li>Удобная доставка. Вы можете сделать заказ в интернет-магазине и получить его любым удобным способом. Например, бесплатно забрать в ближайшем к дому магазине сети.</li>
				<li>Книжные подборки. Мы постоянно делаем подборки книг, чтобы вы могли легко найти ту самую.</li>
			</ol>
			<p class="text_part">На самом деле, причин намного больше – убедитесь в этом сами.</p>
		<h3>Знаем книги не только по обложке</h3>
		<p class="text_part">Если вам сложно сделать книжный выбор или просто хочется убедиться в том, что книга, которая так манит к себе с полки, та самая, - мы поможем буквально. 
		Наши продавцы разделяют вашу любовь к чтению и всегда рады помочь, чтобы вы вышли из нашего книжного с той самой книгой и хорошим настроением.</p>
		</div>
	  </body>
				</html>