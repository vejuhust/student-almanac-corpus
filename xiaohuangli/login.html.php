<?php require_once  $_SERVER['DOCUMENT_ROOT'] . '/includes/helpers.inc.php'; ?>

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta http-equiv="Content-Language" content="zh-CN">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content=""/>
  <meta name="description" content="">
  <meta name="author" content=""/>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" charset="utf8">
  <link rel="stylesheet" type="text/css" href="css/layout.css" charset="utf8">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>  
  <title>登录</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="span3">
        <div class="xh">
          <a href="#">
            <img src="img/xh.png">
          </a>
        </div>
      </div>
      <div class="span8 pull-right">
        <h3>“学生小黄历”神奇后台</h3>
        <div class="login">
         <form class="form-horizontal" action="" method="post">
    <?php if (isset($loginError)): ?>
    <p><?php htmlout($loginError); ?></p>
    <?php endif; ?>
          <div class="control-group">
            <div class="controls">
              <input type="text" id="inputEmail" name="author" placeholder="帐 号">
            </div>
          </div>
          <div class="control-group">
            <div class="controls">
              <input type="password" id="inputPassword" name="password" placeholder="密 码">
            </div>
          </div>
          <div class="control-group">
            <div class="controls">
              <input type="hidden" name="action" value="login">
              <button type="submit"  value="login" class="btn btn-warning">登 录</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <footer>
    © 2012 secretlisa.com, all rights reserved.
  </footer>
</div>  
</body>
</html>