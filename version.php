<?php
// 设置此页面的过期时间(用格林威治时间表示)，只要是已经过去的日期即可
header ( " Expires: Mon, 26 Jul 1970 05:00:00 GMT " );
// 告诉客户端浏览器不使用缓存，HTTP 1.1 协议
header ( " Cache-Control: no-cache, must-revalidate " );
// 告诉客户端浏览器不使用缓存，兼容HTTP 1.0 协议
header ( " Pragma: no-cache " );

// 连接数据库
require('./config.php');
require('./db_connect.php');
// 获取版本呢号
$query = "select version from yezi_software";
$result = mysql_query($query);
$data = mysql_fetch_array($result);
$version = $data['version'];
echo $version;
?>
