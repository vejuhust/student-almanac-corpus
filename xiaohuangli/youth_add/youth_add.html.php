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
  <title>添加到青年词库</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="span3">
        <div class="xh">
          <a href="#">
            <img src="../img/xh.png">
          </a>
        </div>
      </div>
      <div class="span8 pull-right">
        <div class="navbar">
          <div class="navbar-inner">
            <ul class="nav">
              <li><a href="../student_show/">学生词库</a></li>
              <li><a href="../student_add/">添加到学生词库</a></li>
              <li><a href="../youth_show/">青年词库</a></li>
              <li class="active"><a href="../youth_add/">添加到青年词库</a></li>
            </ul>
            <ul class="nav pull-right">
              <li class="divider-vertical"></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php htmlout($_SESSION['author']); ?><b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="../logout/">退出登录</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
        <h3>添加到青年词库</h3>
        <form action="?" method="post">
            <textarea class="span8" rows="10" name="newcontent" placeholder="请在这里输入短语，添加多个短语用回车隔开。"></textarea>
            <button type="submit" class="btn btn-warning pull-right" value="add">添加！</button>
        </form>
      </div>
    </div>
    <footer>
        © 2012 secretlisa.com, all rights reserved.
    </footer>
  </div>  
</body>
</html>