<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$host = "std-mysql";
$db = "std_1803_books";
$username = "std_1803_books";
$password = "22_05_2022_book";
$shop = mysqli_connect($host, $username, $password) or trigger_error(mysql_error(),E_USER_ERROR); 
?>