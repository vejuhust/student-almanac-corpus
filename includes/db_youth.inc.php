<?php
try
{
    $pdo = new PDO('mysql:host=localhost;dbname=youthwords', 'youthwordsuser', '**PASSWORD**');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('SET NAMES "utf8"');
}
catch (PDOException $e)
{
    $error_message = 'Unable to connect to the database server.' . $e->getMessage();
    require 'error.html.php';
    exit();
}
