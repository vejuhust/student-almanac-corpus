<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/magicquotes.inc.php';

//验证是否登陆
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/access.inc.php';

if (!userIsLoggedIn())
{
    header('Location: ../.');
    exit();
}

//连接数据库
require $_SERVER['DOCUMENT_ROOT'] . '/includes/db_youth.inc.php';

//载入内容添加页面
require 'youth_add.html.php';

//处理已经添加的内容
if (isset($_POST['newcontent']))
{
    //获取提交者的IP
    require $_SERVER['DOCUMENT_ROOT'] . '/includes/ip_address.inc.php';
    
    $contents = explode("\n", $_POST['newcontent']);
    try
    {
        //查询是否重复语句
        $sql_query = 'select count(*) from youthwords.corpus
                      where content = :content';
        $s_query = $pdo->prepare($sql_query);
                    
        //插入新内容语句
        $sql_insert = 'insert into youthwords.corpus set
                       content = :word_new,
                       ip_submit = :ip_address,
                       author_id = :author_id';
        $s_insert = $pdo->prepare($sql_insert);
        $s_insert->bindValue(':ip_address', $ip_address);
        $s_insert->bindValue(':author_id', $_SESSION['id']);
        
        //依次处理每个词
        foreach ($contents as $content)
        {
            //删去首尾空白，长度限定为250，且不为空
            $content = substr(trim($content), 0, 250);
            if (strlen($content) == 0)
            {
                continue;
            }
            
            //查询数据库中是否存在
            $s_query->bindValue(':content', $content);
            $s_query->execute();
            $row = $s_query->fetch();
            $exist_word = $row['count(*)'];
    
            //如果不存在重复
            if ($exist_word == 0)
            {
                $s_insert->bindValue(':word_new', $content);
                $s_insert->execute();
            }
        }
    }
    catch (PDOException $e)
    {
        $error_message = 'Error adding youth newcontent: ' . $e->getMessage();
        require 'error.html.php';
        exit();
    }

    header('Location: .');
    exit();
}

