<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/helpers.inc.php'; ?>

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta http-equiv="Content-Language" content="zh-CN">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content=""/>
  <meta name="description" content="">
  <meta name="author" content=""/>
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" charset="utf8">
  <link rel="stylesheet" type="text/css" href="../css/layout.css" charset="utf8">
  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>  
  <title>错误 - student_show</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="span3">
        <div class="xh">
          <a href="mailto:vejuhust@163.com">
            <img src="../img/xh.png">
          </a>
        </div>
      </div>
      <div class="span8 pull-right">
        <h3>“学生小黄历”神奇后台突然间恍惚了一下</h3>
        <div class="login">
         <form class="form-horizontal" action="" method="post">
            <p>
                <?php htmlout($error_message); ?>
            </p>
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