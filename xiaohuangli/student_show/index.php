<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/magicquotes.inc.php';

//验证是否登陆
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/access.inc.php';

if (!userIsLoggedIn())
{
    header('Location: ../.');
    exit();
}

//设置每次获取的数值
if (!isset($_COOKIE['student_demand']))
{
    $_COOKIE['student_demand'] = 10;
}
$random_demand = $_COOKIE['student_demand'];
setcookie('student_demand', $random_demand, time() + 3600 * 24 * 365);

//如果被设置数值
if (isset($_REQUEST['setdemand']))
{
    if (ctype_digit($_REQUEST['setdemand']))
    {
        $random_demand = $_REQUEST['setdemand'];
        setcookie('student_demand', $random_demand, time() + 3600 * 24 * 365);
    }
    
    header('Location: .');
    exit();
}
    
//连接数据库
require $_SERVER['DOCUMENT_ROOT'] . '/includes/db_student.inc.php';

//查询content的总数目
try
{
    $sql = 'select count(*) from studentwords.corpus';
    $result = $pdo->query($sql);
}
catch (PDOException $e)
{
    $error_message = 'Error counting content: ' . $e->getMessage();
    require 'error.html.php';
    exit();
}

$row = $result->fetch();
$counter_word_all = $row['count(*)'];
$counter_word_all_minus_one = $counter_word_all - 1;    //总数减一,即最后一个元素下标
$random_demand = min($random_demand, $counter_word_all);//避免需求大于产能
$random_queue = range(1, $counter_word_all);            //序号数组

//初始化随机数种子
function make_seed()
{
    list($usec, $sec) = explode(' ', microtime());
    return (float) $sec + ((float) $usec * 100000);
}
mt_srand(make_seed());

//产生目标数量的不重复的随机数
for ($random_counter = 0; $random_counter < $random_demand; ++$random_counter)
{
    $random_number = mt_rand($random_counter, $counter_word_all_minus_one);
    $temp_number = $random_queue[$random_counter];
    $random_queue[$random_counter] = $random_queue[$random_number];
    $random_queue[$random_number] = $temp_number;
}

//数据库查询指定个随机的单词
try
{
    $sql = 'select content from studentwords.corpus where id = :random_number';
    $s = $pdo->prepare($sql);
    for ($random_index = 0; $random_index < $random_demand; ++$random_index)
    {
        $s->bindValue(':random_number', $random_queue[$random_index]);
        $s->execute();
        $row = $s->fetch();
        $words[] = $row['content'];
    }
}
catch (PDOException $e)
{
    $error_message = 'Error fetching content: ' . $e->getMessage();
    require 'error.html.php';
    exit();
}

//将载入的内容添加入页面
require 'student_show.html.php';
