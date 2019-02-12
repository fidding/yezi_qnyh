<?php
// 连接数据库
$conn = mysql_connect($db_host, $db_username, $db_password) or die("error connecting".mysql_error());
$db_selected = mysql_select_db($db_database, $conn) or die("Can\'t use ".mysql_error())
?>