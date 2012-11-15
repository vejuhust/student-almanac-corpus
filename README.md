# 1.目录清单
* content - 数据备份
* database - MySQL数据库生成脚本
* includes - PHP代码公用部分
* xiaohuangli - PHP站点代码
* weibo - 新浪微博内容提取器(Python)

# 2.部署方法
## 2.1.代码准备
    **PASSWORD**
    **APP_KEY**
    **APP_SECRET**
请将源码中的以上字段替换

## 2.2.环境需求
配置LAMP，需要MySQL、PHP以及nginx支持。

## 2.3.部署
在数据库中执行database中两个sql脚本，例如

    source /root/xiaohuangli/create_youth.sql
    source /root/xiaohuangli/create_student.sql

将xiaohuangli和includes放置于网站更目录下，例如/alidata/www/default/，并在此目录下的robots.txt中写入

    Disallow: /xiaohuangli/
    Disallow: /includes/  
   
网站登陆访问，对于站点内容，可以使用content中数据，或者借助weibo中的脚本从新浪微博获取。

# 3.维护指南
以阿里云为例
## 3.1.数据库密码重置
停止MySQL

    /etc/init.d/mysqld stop

无网络无验证启动MySQL

    /alidata/server/mysql/bin/mysqld_safe --user=root --skip-grant-tables --skip-networking &

无密码登陆MySQL

    /alidata/server/mysql/bin/mysql -u root mysql

用MySQL命令重置root的密码为PASSWORD

    UPDATE user SET Password=PASSWORD('PASSWORD') where USER='root';
    FLUSH PRIVILEGES;
    QUIT;

## 3.2.数据库运行
无网络方式安全启动数据库

    /alidata/server/mysql/bin/mysqld_safe --user=root --skip-networking&

## 3.3.网站用户管理
添加用户

    use studentwords;
    insert into studentwords.author (name,password) values ('diandian','19900421');
    
## 3.4.网站内容管理
列出内容和作者

    select studentwords.corpus.id, left(studentwords.corpus.content,10), studentwords.author.name from studentwords.corpus inner join studentwords.author on studentwords.corpus.author_id = studentwords.author.id order by studentwords.corpus.id asc;
    