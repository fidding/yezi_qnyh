<?php
// 设置此页面的过期时间(用格林威治时间表示)，只要是已经过去的日期即可
header ( " Expires: Mon, 26 Jul 1970 05:00:00 GMT " );
// 告诉客户端浏览器不使用缓存，HTTP 1.1 协议
header ( " Cache-Control: no-cache, must-revalidate " );
// 告诉客户端浏览器不使用缓存，兼容HTTP 1.0 协议
header ( " Pragma: no-cache " );

// 清空用户cookie
setcookie('user');
echo 0
?>
