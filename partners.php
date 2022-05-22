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
            <a href="index.php"><img src="photo/logoza_ru.png" class="logo"></a>
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
            <a href="">Классика</a>
            <a href="">Психология</a>
            <a href="">Романы</a>
            <a href="">Фэнтези</a>
            <a href="">Детская литература</a>
        </nav>
		<div class="partners">
		<h3>Арендодателям</h3>
		<p class="text_part">В связи с постоянным развитием сети «Читай.» мы рассматриваем предложения по аренде помещений в Москве, Подмосковье и других регионах России.<br>
Преимущества сотрудничества с нами:</p>
<ul class="text_part">
<li>долгосрочная аренда;</li>

<li>привлечение дополнительных посетителей за счет широкого выбора качественной продукции;</li>

<li>надежная система поставок и обновления ассортимента;</li>

<li>возможность открытия нескольких объектов в одном городе;</li>

<li>оперативность в принятии решения.</li>
</ul>

<p class="text_part">Требования к помещениям: площадь от 150 до 850 метров, в проходных местах и в торговых центрах. 
Рассмотрим любые предложения: подвал, цоколь, первый, второй этажи и выше.</p>
<h3>Наши партнеры</h3>
		<p class="text_part">Сеть книжных магазинов «Читай.» постоянно и динамично развивается, 
		предоставляя посетителям все больший ассортимент продукции и дополнительных услуг.
		Наша компания всегда заинтересована в надежном и взаимовыгодном партнерстве 
		со специалистами самых разных областей и направлений.</p>
<div id="main">
	<div class="slider">
		<div class="slide-list">
			<div class="slide-wrap">
				<div class="slide-item">
					<img width="280px" height="auto" src="img/img-1.jpg" alt="" />
					<span class="slide-title">CDEK</span>
				</div>
				<div class="slide-item">
					<img width="280px" height="auto" src="img/img-2.jpg" alt="" />
					<span class="slide-title">WILDBERRIES</span>
				</div>
				<div class="slide-item">
					<img width="280px" height="auto" src="img/img-3.jpg" alt="" />
					<span class="slide-title">OZON</span>
				</div>
				<div class="slide-item">
					<img width="290px" height="auto" src="img/img-4.jpg" alt="" />
					<span class="slide-title">boxberry</span>
				</div>
				<div class="slide-item">
					<img width="330px" height="auto" src="img/img-5.jpg" alt="" />
					<span class="slide-title">СБЕР МАРКЕТ</span>
				</div>
				<div class="slide-item">
					<img width="280px" height="auto" src="img/img-6.jpg" alt="" />
					<span class="slide-title">PickPoint</span>
				</div>
				
			</div>
			<div class="clear"></div>
		</div>
		<div class="navy prev-slide"></div>
		<div class="navy next-slide"></div>
		
	</div>
	
</div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="slider.js"></script>
</div>
		
		    </body>
				</html>