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
  <title>学生词库</title>
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
                <li class="active"><a href="../student_show/">学生词库</a></li>
              <li><a href="../student_add/">添加到学生词库</a></li>
              <li><a href="../youth_show/">青年词库</a></li>
              <li><a href="../youth_add/">添加到青年词库</a></li>
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
        <h3>学生词库</h3>
        <form class="form-inline">
          一共有<?php echo $counter_word_all; ?>个如花似玉的漂亮妹纸，客官你要
          <input type="text" class="input-mini" name="setdemand" value="<?php echo $random_demand; ?>">
          个？
          <button type="submit" class="btn btn-warning">都要了！</button>
        </form>
        <table class="table">
          <tbody>
        <?php
            $number_words = count($words);
            for ($index = 0; $index < $number_words; $index += 2):
        ?>
            <tr>
                <td><?php htmlout($words[$index]); ?></td>
                <td><?php htmlout($words[$index+1]); ?></td>
            </tr>
        <?php endfor; ?>
          </tbody>
        </table>
        <h3>下载</h3>
        <p>
          <a href="../backup_student/" class="btn btn-success"><i class="icon-download-alt icon-white"></i> 下载整个词库</a>
        </p>
      </div>
    </div>
    <footer>
      © 2012 secretlisa.com, all rights reserved.
    </footer>
  </div>
</body>
</html>