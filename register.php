<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content=">叶子倩女幽魂手游自动踩梦岛工具">
    <meta name="keywords" content="叶子,倩女幽魂手游,辅助,工具">
    <title>注册-叶子倩女幽魂手游自动踩梦岛工具</title>
    <!-- FONT AWESOME-->
    <link rel="stylesheet" href="./public/plugin/fontawesome/css/font-awesome.min.css">
    <!-- SIMPLE LINE ICONS-->
    <link rel="stylesheet" href="./public/plugin/simple-line-icons/css/simple-line-icons.css">
    <!-- =============== BOOTSTRAP STYLES ===============-->
    <link rel="stylesheet" href="./public/plugin/bootstrap.css" id="bscss">
    <!-- =============== APP STYLES ===============-->
    <link rel="stylesheet" href="./public/plugin/app.css" id="maincss">
  </head>

  <body>
    <?php
    // 连接数据库
    require('./config.php');
    require('./db_connect.php');
    // 是否提交表单
    if(isset($_POST['submit'])){
      // 获取用户名密码
      $user = trim($_POST['user']);
      $psd = trim($_POST['psd']);
      if ($user == '' || $psd == '') {
        echo "<script>alert('请输入用户名或密码！');</script>";
      } else {
        // 判断用户名是否存在
        $query = "select * from yezi_users where user = '$user'";
        $result = mysql_query($query);
        $num = mysql_num_rows($result);
        if ($num) {
          echo "<script>alert('用户名已存在！');</script>";
        } else {
          // 开始注册账号
          $created_at = date('Y-m-d H:i:s', time());
          $sql = "insert into yezi_users (user, psd, created_at) values ('$user', '$psd', '$created_at')";
          if (!mysql_query($sql)) {
            die('Error: '.mysql_error());
          }
          // 关闭数据库
          mysql_close($conn);
          echo "<script>alert('注册成功，请使用软件登陆！');</script>";
        }
      }
    }
    ?>

    <div class="wrapper mt-xl">
      <div class="block-center mt-xl wd-xl">
        <!-- START panel-->
        <div class="panel panel-dark panel-flat">
          <div class="panel-heading text-center">注 册 账 号</div>
          <div class="panel-body">
            <form role="form" action="/yezi/register.php" method="post" novalidate="" class="mb-lg">
              <div class="form-group has-feedback">
                <label for="username" class="text-muted">用户名</label>
                <input id="username" name="user" placeholder="请输入用户名" autocomplete="off" required class="form-control">
                <span class="fa fa-user form-control-feedback text-muted"></span>
              </div>
              <div class="form-group has-feedback">
                <label for="password" class="text-muted">密码</label>
                <input id="password" name="psd" type="password" placeholder="请输入密码" autocomplete="off" required class="form-control">
                <span class="fa fa-lock form-control-feedback text-muted"></span>
              </div>
              <input type="submit" name="submit" class="btn btn-block btn-primary mt-lg" value="创建账号"/>
            </form>
            <a  class="btn btn-block btn-default  mt-lg" target="_blank" href="./index.php">软件下载</a>

          </div>
        </div>
        <!-- END panel-->
        <div class="p-lg text-center">
          <span>&copy;</span>
          <span>2017</span>
          <span>-</span>
          <span>叶子</span>
          <br>
          <span>倩女幽魂手游自动踩梦岛辅助工具</span>
        </div>
      </div>
    </div>
    <!-- =============== VENDOR SCRIPTS ===============-->
    <!-- MODERNIZR-->
    <script src="./public/plugin/modernizr/modernizr.custom.js"></script>
    <!-- JQUERY-->
    <script src="./public/plugin//jquery/dist/jquery.js"></script>
    <!-- BOOTSTRAP-->
    <script src="./public/plugin//bootstrap/dist/js/bootstrap.js"></script>
    <!-- STORAGE API-->
    <script src="./public/plugin//jQuery-Storage-API/jquery.storageapi.js"></script>
    <!-- PARSLEY-->
    <script src="./public/plugin//parsleyjs/dist/parsley.min.js"></script>
    <!-- =============== APP SCRIPTS ===============-->
    <script src="./public/plugin/app.js"></script>
  </body>

</html>
