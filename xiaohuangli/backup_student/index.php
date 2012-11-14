<?php

//连接数据库
require $_SERVER['DOCUMENT_ROOT'] . '/includes/db_student.inc.php';

//按id顺序取回所有content
try
{
    $sql = 'select content from studentwords.corpus order by id asc';
    $result = $pdo->query($sql);
}
catch (PDOException $e)
{
    $error_message = 'Error fetching entire student contents: ' . $e->getMessage();
    require 'error.html.php';
    exit();
}

//生成带有时间戳的文件名
$timestamp = localtime(time(), true);
$filename = sprintf("backup_student_%04d%02d%02d%02d%02d%02d.txt", $timestamp['tm_year'] + 1900, $timestamp['tm_mon'] + 1, $timestamp['tm_mday'], $timestamp['tm_hour'], $timestamp['tm_min'], $timestamp['tm_sec']);

//模拟文件提供下载
header ("Content-Type: application/octet-stream");
header ("Content-Disposition: attachment; filename=\"" . $filename . "\"");
print("\xef\xbb\xbf");
foreach ($result as $row)
{
    print($row['content'] . "\n");
}

?>
