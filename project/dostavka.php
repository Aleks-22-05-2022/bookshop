
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
				<input type="text" placeholder="Поиск..." class="search" id="result" name="result"> <!--Нужно написать поиск по странице-->
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
		<h3>Доставка и оплата</h3>
		<p class="text_part">Существует три способа получения заказов из интернет-магазина «Читай.": самовывоз, курьерская доставка и доставка в пункты выдачи. 
		Точную стоимость доставки Вы увидите во время оформления заказа.</p>
		<h3>Оплата заказов</h3>
		<p class="text_part">Выбирайте удобный вариант:</p>
		<ul class="text_part">
<li>Оплата картой на сайте;</li>

<li>Оплата наличными или картой при получении;</li>

</ul>
		<h3>Сроки хранения заказов</h3>
		<ul class="text_part">
<li>PickPoint – 3 рабочих дня. Рабочими днями считаются дни работы конкретного пункта выдачи заказов, это могут быть не только будни, но и выходные;</li>

<li>СДЭК – 7 календарных дней;</li>

<li>BoxBerry – 7 календарных дней;</li>
</ul>
		<h3>Курьерская доставка</h3>
		<p class="text_part">Стоимость доставки:</p>
		<ul class="text_part">
<li>Бесплатно при заказе от 2000 ₽</li>
</ul>
		
		<p class="text_part">Время доставки: </p>
		<ul class="text_part">
<li>Москва – с 09:00 до 18:00 ежедневно;</li>

<li>Другие города – с 09:00 до 18:00 в будни.</li>

</ul>
<p class="text_part">После передачи заказа в курьерскую службу с Вами свяжется менеджер для уточнения деталей. В день доставки Вам позвонит курьер для окончательного подтверждения встречи. 
Если вес заказа превышает 25 кг, то при доставке он разбивается на два заказа.</p>
<h3>Пункты выдачи</h3>
<div style="position:relative;overflow:hidden;"><a href="https://yandex.ru/maps/213/moscow/search/%D0%9F%D1%83%D0%BD%D0%BA%D1%82%D1%8B%20%D0%B2%D1%8B%D0%B4%D0%B0%D1%87%D0%B8/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Пункты выдачи в Москве</a><a href="https://yandex.ru/maps/213/moscow/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:14px;">Москва</a>
<iframe src="https://yandex.ru/map-widget/v1/-/CCUJE4fstC" width="1200" height="580" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe>
</div>

</div>
	
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