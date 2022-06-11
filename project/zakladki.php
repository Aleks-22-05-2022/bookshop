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
        <meta charset="windows-1251">
        <title>�����</title>
        <link rel="stylesheet" href="zakladki1.css">
    </head>
    <body>
        <header>
            <a href="../index.php"><img src="photo/logoza_ru.png" class="logo"></a>
            <input type="text" placeholder="�����..." class="search"> <!--����� �������� ����� �� ��������-->
            <input type="submit" value="&#128269;" class="searchSub">
            <img src="photo/cabinet.png" class="login"> 
            <div class="imgblock">
                <a href=""><img src="photo/Screenshot_7-removebg-preview.png" alt="Snow"></a>
                <span><?php echo $num; ?></span> <!-- ����� ����� ������� ���������� ������� � ������� -->
            </div>
        </header>
        <nav class="menu">
            <a href="categories.php?cat=Classic">��������</a>
            <a href="categories.php?cat=Psihologes">����������</a>
            <a href="categories.php?cat=Novel">������</a>
            <a href="categories.php?cat=Fantasy">�������</a>
            <a href="categories.php?cat=Children">������� ����������</a>
        </nav>
		
		  <div class="obc">
    <nav class="menu1">
        <div class="ramka"><a href="">��� ������</a></div>
        <div class="ramka"><a href="">�������������</a></div>
        <div class="ramka"><a href="">��������</a></div>
        <div class="ramka"><a href="">�����</a></div>
   </nav>
   
   <div class="block-border card-block">
           <div class="group-title">
               <a class="right"><span style="margin-right:0;" class="i-group-edit"></span></a><h2>��������</h2>
           	</div>
           	<div class="with-pad">             
				<div class="wrapper">
				<figure>
    			<div class='tovar'>
					<img class="Pictures" src="<?php echo $photo_b[$i]?>"> <br>
					<p class=NameBook><?php echo $name_b[$i], "<br>";?></p>
					<p class="Author"><?php echo $author_b[$i], '<br>';?></p>
					<div class="button">
						<p class="Price"><?php echo $price_b[$i], " ������ <br>";?> </p>
						<input type="button" value="������"> <!--���������� � ������� �������-->
					</div>
				</div>
				</figure>
					
				<figure>
				
    			<div class='tovar'>
					<img class="Pictures" src="<?php echo $photo_b[$i]?>"> <br>
					<p class=NameBook><?php echo $name_b[$i], "<br>";?></p>
					<p class="Author"><?php echo $author_b[$i], '<br>';?></p>
					<div class="button">
						<p class="Price"><?php echo $price_b[$i], " ������ <br>";?> </p>
						<input type="button" value="������"> <!--���������� � ������� �������-->
					</div>
				</div>
				</figure>
				<figure>
    			<div class='tovar'>
					<img class="Pictures" src="<?php echo $photo_b[$i]?>"> <br>
					<p class=NameBook><?php echo $name_b[$i], "<br>";?></p>
					<p class="Author"><?php echo $author_b[$i], '<br>';?></p>
					<div class="button">
						<p class="Price"><?php echo $price_b[$i], " ������ <br>";?> </p>
						<input type="button" value="������"> <!--���������� � ������� �������-->
					</div>
				</div>
				</figure>
			</div>
       	</div>
   </div>
</div>
		
    </main>
					
    </body>
</html>