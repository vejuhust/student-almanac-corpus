<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/magicquotes.inc.php';

//验证是否登陆
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/access.inc.php';
if (!userIsLoggedIn())
{
    require 'login.html.php';
    exit();
}

//登陆后转入
header('Location: student_show/');
