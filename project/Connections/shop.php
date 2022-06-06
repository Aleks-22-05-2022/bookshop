<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$host = "localhost";
$db = "book_shop";
$username = "admin";
$password = "admin";
$shop = mysqli_connect($host, $username, $password) or trigger_error(mysql_error(),E_USER_ERROR); 
?>