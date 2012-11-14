
/* create database */
drop database studentwords;
create database studentwords;

/* add database user */
delete from mysql.user where user='studentwordsuser' and host='localhost';
grant all on studentwords.* to 'studentwordsuser'@'localhost' identified by '**PASSWORD**';


/* create tables */
use studentwords;

create table `studentwords`.`author` (
    `id` integer not null auto_increment,
    `name` char(30) not null,
    `password` char(30) not null,
    `ip_login` char(20) not null default '127.0.0.1',
    `date_login` timestamp not null default current_timestamp,
    primary key (id),
    index(id)
) default character set utf8 engine=InnoDB;

create table `studentwords`.`corpus` (
    `id` integer not null auto_increment,
    `content` tinytext not null,
    `author_id` integer not null default 1,
    `ip_submit` char(20) not null default '127.0.0.1',
    `date_submit` timestamp not null default current_timestamp,
    primary key(id),
    foreign key (author_id) references studentwords.author(id),
    index(id)
) default character set utf8 engine=InnoDB;


/* insert authors */
insert into studentwords.author (name,password) values ('vej','**PASSWORD**');
insert into studentwords.author (name,password) values ('robot','**PASSWORD**');
insert into studentwords.author (name,password) values ('tinyyuan','**PASSWORD**');
insert into studentwords.author (name,password) values ('gumogu','**PASSWORD**');
insert into studentwords.author (name,password) values ('xiaqing','**PASSWORD**');
insert into studentwords.author (name,password) values ('runpeng','**PASSWORD**');


/* insert contents */
insert into studentwords.corpus (content) values ('小叶叶');
insert into studentwords.corpus (content) values ('元元');
insert into studentwords.corpus (content) values ('番茄酱');
insert into studentwords.corpus (content) values ('练子夫人');
insert into studentwords.corpus (content) values ('顾蘑菇');
insert into studentwords.corpus (content) values ('夏青青');
insert into studentwords.corpus (content) values ('润鹏');
insert into studentwords.corpus (content) values ('逛街');
insert into studentwords.corpus (content) values ('自习');
insert into studentwords.corpus (content) values ('求爱');
insert into studentwords.corpus (content) values ('看报纸');
insert into studentwords.corpus (content) values ('约炮');
insert into studentwords.corpus (content) values ('上课');
insert into studentwords.corpus (content) values ('翘课');
insert into studentwords.corpus (content) values ('发呆');
insert into studentwords.corpus (content) values ('做白日梦');
insert into studentwords.corpus (content) values ('看电影');
insert into studentwords.corpus (content) values ('刷微博');
insert into studentwords.corpus (content) values ('表白');
insert into studentwords.corpus (content) values ('暗恋');
insert into studentwords.corpus (content) values ('泡面');
insert into studentwords.corpus (content) values ('拌面');
insert into studentwords.corpus (content) values ('喝柠檬茶');
insert into studentwords.corpus (content) values ('姐弟恋');
insert into studentwords.corpus (content) values ('不吃早饭');
insert into studentwords.corpus (content) values ('加班');
insert into studentwords.corpus (content) values ('熬夜');
insert into studentwords.corpus (content) values ('通宵');
insert into studentwords.corpus (content) values ('写代码');
insert into studentwords.corpus (content) values ('泡豆瓣');
insert into studentwords.corpus (content) values ('水人人');
insert into studentwords.corpus (content) values ('散步');
insert into studentwords.corpus (content) values ('探亲');
insert into studentwords.corpus (content) values ('谈情');
insert into studentwords.corpus (content) values ('弹琴');
insert into studentwords.corpus (content) values ('弹棉花');
insert into studentwords.corpus (content) values ('打弹子');
insert into studentwords.corpus (content) values ('撸管');
insert into studentwords.corpus (content) values ('夹腿');
insert into studentwords.corpus (content) values ('写作业');
insert into studentwords.corpus (content) values ('抄作业');
insert into studentwords.corpus (content) values ('Apple');
insert into studentwords.corpus (content) values ('Microsoft');
insert into studentwords.corpus (content) values ('Facebook');
insert into studentwords.corpus (content) values ('Baidu');
insert into studentwords.corpus (content) values ('Tencent');
insert into studentwords.corpus (content) values ('逛淘宝');
insert into studentwords.corpus (content) values ('网购');
insert into studentwords.corpus (content) values ('宅');
insert into studentwords.corpus (content) values ('赖床');
insert into studentwords.corpus (content) values ('春游');
insert into studentwords.corpus (content) values ('泡温泉');
insert into studentwords.corpus (content) values ('上网');
insert into studentwords.corpus (content) values ('读书');
insert into studentwords.corpus (content) values ('翻杂志');
insert into studentwords.corpus (content) values ('签offer');
insert into studentwords.corpus (content) values ('爱爱');
insert into studentwords.corpus (content) values ('槑槑');
insert into studentwords.corpus (content) values ('摇一摇');
insert into studentwords.corpus (content) values ('胡思乱想');
insert into studentwords.corpus (content) values ('劈腿');
insert into studentwords.corpus (content) values ('捉奸');
insert into studentwords.corpus (content) values ('离婚');
insert into studentwords.corpus (content) values ('结婚');
insert into studentwords.corpus (content) values ('分手');
insert into studentwords.corpus (content) values ('牵手');
insert into studentwords.corpus (content) values ('拥抱');
insert into studentwords.corpus (content) values ('接吻');
insert into studentwords.corpus (content) values ('谈理想');
insert into studentwords.corpus (content) values ('谈人生');
insert into studentwords.corpus (content) values ('自拍');
insert into studentwords.corpus (content) values ('看日剧');
insert into studentwords.corpus (content) values ('看美剧');
insert into studentwords.corpus (content) values ('看韩剧');
insert into studentwords.corpus (content) values ('看英剧');
insert into studentwords.corpus (content) values ('做项目');
insert into studentwords.corpus (content) values ('祭祖');
insert into studentwords.corpus (content) values ('DotA');
insert into studentwords.corpus (content) values ('LOL');
insert into studentwords.corpus (content) values ('秀恩爱');
insert into studentwords.corpus (content) values ('小元');
insert into studentwords.corpus (content) values ('拉拉');
insert into studentwords.corpus (content) values ('搅基');
insert into studentwords.corpus (content) values ('自曝床照');
insert into studentwords.corpus (content) values ('转发状态');
insert into studentwords.corpus (content) values ('拒绝好友申请');
insert into studentwords.corpus (content) values ('点喜欢');
insert into studentwords.corpus (content) values ('摸同桌大腿');
insert into studentwords.corpus (content) values ('掰弯');
insert into studentwords.corpus (content) values ('洗碗');
insert into studentwords.corpus (content) values ('爆果照');
insert into studentwords.corpus (content) values ('摸摸');
insert into studentwords.corpus (content) values ('只拥抱不做爱');
insert into studentwords.corpus (content) values ('找工作');
insert into studentwords.corpus (content) values ('上班');
insert into studentwords.corpus (content) values ('下班');
insert into studentwords.corpus (content) values ('唱歌');
insert into studentwords.corpus (content) values ('控御姐');
insert into studentwords.corpus (content) values ('控萝莉');
insert into studentwords.corpus (content) values ('控大叔');
insert into studentwords.corpus (content) values ('控正太');


/* check status */
describe studentwords.author;
describe studentwords.corpus;
select * from studentwords.author;
select * from studentwords.corpus;


