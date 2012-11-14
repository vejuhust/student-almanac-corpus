<?php

function userIsLoggedIn()
{
    //验证登陆
    if (isset($_POST['action']) and $_POST['action'] == 'login')
    {
        //用户名&密码健全
        if (!isset($_POST['author']) or $_POST['author'] == '' or
            !isset($_POST['password']) or $_POST['password'] == '')
        {
            $GLOBALS['loginError'] = '麻烦你填写一下帐号和密码～';
            return FALSE;
        }

        //密码正确
        if (databaseContainsAuthor($_POST['author'], $_POST['password']))
        {
            $userInfo = get_user_info($_POST['author']);
            update_log_record($_POST['author']);
            session_start();
            $_SESSION['loggedIn'] = TRUE;
            $_SESSION['author'] = $_POST['author'];
            $_SESSION['password'] = $_POST['password'];
            $_SESSION['id'] = $userInfo['id'];
            $_SESSION['ip_login'] = $userInfo['ip_login'];
            $_SESSION['date_login'] = $userInfo['date_login'];
            return TRUE;
        }
        else
        {
            session_start();
            unset($_SESSION['loggedIn']);
            unset($_SESSION['author']);
            unset($_SESSION['password']);
            unset($_SESSION['id']);
            unset($_SESSION['ip_login']);
            unset($_SESSION['date_login']);
            $GLOBALS['loginError'] = '帐号或密码至少有一个错啦～';
            return FALSE;
        }
    }

    //Anyway...
    session_start();
    if (isset($_SESSION['loggedIn']))
    {
        return databaseContainsAuthor($_SESSION['author'], $_SESSION['password']);
    }
}
    
    
function databaseContainsAuthor($author, $password)
{
    require $_SERVER['DOCUMENT_ROOT'] . '/includes/db_student.inc.php';
    
    try
    {
        $sql = 'select count(*) from studentwords.author where studentwords.author.name = :author and studentwords.author.password = :password';
        $s = $pdo->prepare($sql);
        $s->bindValue(':author', $author);
        $s->bindValue(':password', $password);
        $s->execute();
    }
    catch (PDOException $e)
    {
        $error_message = 'Error searching for author. ' . $e->getMessage();
        require 'error.html.php';
        exit();
    }
    
    $row = $s->fetch();
    
    if ($row[0] > 0)
    {
        return TRUE;
    }
    else
    {
        return FALSE;
    }
}

    
function update_log_record($author)
{
    require $_SERVER['DOCUMENT_ROOT'] . '/includes/db_student.inc.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/includes/ip_address.inc.php';

    try
    {
        $sql = 'update studentwords.author set ip_login = :ip_address, date_login = localtime() where name = :author';
        $s = $pdo->prepare($sql);
        $s->bindValue(':author', $author);
        $s->bindValue(':ip_address', $ip_address);
        $s->execute();
    }
    catch (PDOException $e)
    {
        $error_message = 'Error updating login record. ' . $e->getMessage();
        require 'error.html.php';
        exit();
    }
}


function get_user_info($author)
{
    require $_SERVER['DOCUMENT_ROOT'] . '/includes/db_student.inc.php';
    
    try
    {
        $sql = 'select * from studentwords.author where studentwords.author.name = :author';
        $s = $pdo->prepare($sql);
        $s->bindValue(':author', $author);
        $s->execute();
    }
    catch (PDOException $e)
    {
        $error_message = 'Error retrieving user info. ' . $e->getMessage();
        require 'error.html.php';
        exit();
    }
    
    $row = $s->fetch();
    $userInfo = array();
    $userInfo['id'] = $row['id'];
    $userInfo['ip_login'] = $row['ip_login'];
    $userInfo['date_login'] = $row['date_login'];
    
    return ($userInfo);
}

