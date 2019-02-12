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

// 判断用户提交方式
$type = $_SERVER['REQUEST_METHOD'];

if ($type == 'GET') {
  $code = 0;
  $msg = '';
  $user = ' ';
  $date = date('Y-m-d H:i:s', time());
  // 检测是否已登陆
  if ($_COOKIE["user"]) {
    $code = 1;
    $msg = '已登陆！';
    $user = $_COOKIE['user'];
  } else {
    $code = 0;
    $msg = '尚未登陆！';
  }
  echo $code.'|'.$user.'|'.$msg.'|'.$date;
} else {
  // 用户登陆
  $user = trim($_POST['user']);
  $psd = trim($_POST['psd']);

  // 设置返回变量
  $code = 0;
  $date = date('Y-m-d H:i:s', time());
  $msg = ' ';

  if ($user == '' || $psd == '') {
    $code = 0;
    $msg = '用户名或密码不能为空!';
  } else {
    // 判断用户名密码是否正确
    $query = "select * from yezi_users where user = '$user' and psd = '$psd'";
    $result = mysql_query($query);
    $num = mysql_num_rows($result);
    if (!$num) {
      $code = 0;
      $msg = '用户名或密码不正确！';
    } else {
      $code = 1;
      $msg = '登陆成功！';
      // 设置cookie有效期7天
      setcookie('user', $user, time()+7*24*3600);
    }
  }
  echo $code.'|'.$user.'|'.$msg.'|'.$date;
}
// 关闭数据库
mysql_close($conn);


?>
