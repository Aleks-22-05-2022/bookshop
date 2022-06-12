<!DOCTYPE html>
<?php 
$id = file_get_contents("session.txt");
require_once ("Connections/shop.php");
$link = mysqli_connect($host, $username, $password);
$select = mysqli_select_db($link, $db);
$query = 'select * from users where id = '.$id.'';
$select = mysqli_query($link, $query);
while ($user = mysqli_fetch_array($select)){
	$name = $user['name'];
	$s_name = $user['s_name'];
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
            <a href="../index.php"><img src="photo/logoza_ru.png" class="logo"></a>
            <input type="text" placeholder="Поиск..." class="search"> <!--Нужно написать поиск по странице-->
            <input type="submit" value="&#128269;" class="searchSub">
            <img src="photo/cabinet.png" class="login"> 
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
		
		  <div class="obc">
    <nav class="menu1">
        <div class="ramka"><a href="">Мои заказы</a></div>
        <div class="ramka"><a href="">Понравившееся</a></div>
        <div class="ramka"><a href="zakladki.php">Закладки</a></div>
        <div class="ramka"><a href="">Выйти</a></div>
   </nav>
   
   <div class="block-border card-block">
           <div class="group-title">
               <a class="right"><span style="margin-right:0;" class="i-group-edit"></span></a><h2>Личные данные</h2>
           </div>
           <div class="with-pad">                     
           <div class="profile-info-column">
           <span class="group-row-title"><b>Имя</b>: <?php echo $name;?> </span> 
			   <span class="group-row-title"><b>Фамилия</b>:  <?php echo $s_name;?></span>
               <span class="group-row-title"><b>Телефон:</b> +79999999999</span>
                <span class="group-row-title"><b>Дата рождения:</b> 01&nbsp;января&nbsp;2022&nbsp;г.</span>
                <span class="group-row-title"><b>Дата регистрации:</b> 01&nbsp;января&nbsp;2022&nbsp;г.</span>
               	<span class="group-row-title"><b>Статус:</b> Новичок</span>
                <span class="group-row-title"><b>Рейтинг:</b> скоро появится</span>
                <span class="group-row-title"><b>Индекс активности:</b> скоро появится</span>
           </div>
       </div>
   </div>
</div>
    </main>
					
    </body>
</html>