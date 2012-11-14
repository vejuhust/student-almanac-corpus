
/* create database */
drop database youthwords;
create database youthwords;

/* add database user */
delete from mysql.user where user='youthwordsuser' and host='localhost';
grant all on youthwords.* to 'youthwordsuser'@'localhost' identified by '**PASSWORD**';


/* create tables */
use youthwords;

create table `youthwords`.`author` (
    `id` integer not null auto_increment,
    `name` char(30) not null,
    `password` char(30) not null,
    `ip_login` char(20) not null default '127.0.0.1',
    `date_login` timestamp not null default current_timestamp,
    primary key (id),
    index(id)
) default character set utf8 engine=InnoDB;

create table `youthwords`.`corpus` (
    `id` integer not null auto_increment,
    `content` tinytext not null,
    `author_id` integer not null default 1,
    `ip_submit` char(20) not null default '127.0.0.1',
    `date_submit` timestamp not null default current_timestamp,
    primary key(id),
    foreign key (author_id) references youthwords.author(id),
    index(id)
) default character set utf8 engine=InnoDB;


/* insert authors */
insert into youthwords.author (name,password) values ('vej','yw33893389');
insert into youthwords.author (name,password) values ('robot','iAmVeryRobust');
insert into youthwords.author (name,password) values ('tinyyuan','123456');
insert into youthwords.author (name,password) values ('gumogu','gx19900921');
insert into youthwords.author (name,password) values ('xiaqing','xq199815732');
insert into youthwords.author (name,password) values ('runpeng','rp38034344');


/* insert contents */
insert into youthwords.corpus (content) values ('自虐');
insert into youthwords.corpus (content) values ('撒泼');
insert into youthwords.corpus (content) values ('撸啦啦撸啦撸啦撸啦嘞');
insert into youthwords.corpus (content) values ('大麦茶');
insert into youthwords.corpus (content) values ('Android');
insert into youthwords.corpus (content) values ('交配');
insert into youthwords.corpus (content) values ('谈论iPad');
insert into youthwords.corpus (content) values ('地铁');
insert into youthwords.corpus (content) values ('豆浆');
insert into youthwords.corpus (content) values ('高跟鞋');
insert into youthwords.corpus (content) values ('与屌丝谈恋爱');
insert into youthwords.corpus (content) values ('木框眼镜');
insert into youthwords.corpus (content) values ('帽衫');
insert into youthwords.corpus (content) values ('装傻');
insert into youthwords.corpus (content) values ('撒娇');
insert into youthwords.corpus (content) values ('谎言');
insert into youthwords.corpus (content) values ('欠费');
insert into youthwords.corpus (content) values ('大骂');
insert into youthwords.corpus (content) values ('鼓掌');
insert into youthwords.corpus (content) values ('充值');
insert into youthwords.corpus (content) values ('茶餐厅');
insert into youthwords.corpus (content) values ('怀旧');
insert into youthwords.corpus (content) values ('翻译');
insert into youthwords.corpus (content) values ('调戏老前辈');
insert into youthwords.corpus (content) values ('接站');
insert into youthwords.corpus (content) values ('焖面');
insert into youthwords.corpus (content) values ('道歉');
insert into youthwords.corpus (content) values ('商品退换');
insert into youthwords.corpus (content) values ('暗访情敌');
insert into youthwords.corpus (content) values ('自爆自器');
insert into youthwords.corpus (content) values ('羊肉');
insert into youthwords.corpus (content) values ('屏蔽关键词');
insert into youthwords.corpus (content) values ('小面值纸币');
insert into youthwords.corpus (content) values ('借穿外衣');
insert into youthwords.corpus (content) values ('更换电话号码');
insert into youthwords.corpus (content) values ('要人陪');
insert into youthwords.corpus (content) values ('迟到');
insert into youthwords.corpus (content) values ('战斗到底');
insert into youthwords.corpus (content) values ('研究异性身体结构');
insert into youthwords.corpus (content) values ('购买玩具');
insert into youthwords.corpus (content) values ('接受约炮');
insert into youthwords.corpus (content) values ('眼见为实');
insert into youthwords.corpus (content) values ('私信');
insert into youthwords.corpus (content) values ('下载');
insert into youthwords.corpus (content) values ('黑色外衣');
insert into youthwords.corpus (content) values ('合影');
insert into youthwords.corpus (content) values ('可乐');
insert into youthwords.corpus (content) values ('饺子');
insert into youthwords.corpus (content) values ('开会');
insert into youthwords.corpus (content) values ('公司管饭');
insert into youthwords.corpus (content) values ('交换内裤');
insert into youthwords.corpus (content) values ('抛弃旧男友');
insert into youthwords.corpus (content) values ('当街发飙');
insert into youthwords.corpus (content) values ('争辩');
insert into youthwords.corpus (content) values ('进银行');
insert into youthwords.corpus (content) values ('网购');
insert into youthwords.corpus (content) values ('收发快递');
insert into youthwords.corpus (content) values ('调戏党员');
insert into youthwords.corpus (content) values ('电梯内放屁');
insert into youthwords.corpus (content) values ('迎风流泪');
insert into youthwords.corpus (content) values ('通话免提');
insert into youthwords.corpus (content) values ('一律碾碎冲服');
insert into youthwords.corpus (content) values ('炮打不平');
insert into youthwords.corpus (content) values ('陪嫂子体检');
insert into youthwords.corpus (content) values ('放债');
insert into youthwords.corpus (content) values ('哈欠');
insert into youthwords.corpus (content) values ('体制内牢骚');
insert into youthwords.corpus (content) values ('与推销员聊天');
insert into youthwords.corpus (content) values ('阳台观景');
insert into youthwords.corpus (content) values ('道德制高点');
insert into youthwords.corpus (content) values ('虐待同事');
insert into youthwords.corpus (content) values ('谄媚');
insert into youthwords.corpus (content) values ('瞌睡');
insert into youthwords.corpus (content) values ('自制咖啡');
insert into youthwords.corpus (content) values ('疯狂反击');
insert into youthwords.corpus (content) values ('贪得无厌');
insert into youthwords.corpus (content) values ('催促');
insert into youthwords.corpus (content) values ('独守空房');
insert into youthwords.corpus (content) values ('悄悄关注');
insert into youthwords.corpus (content) values ('撰写PPT');
insert into youthwords.corpus (content) values ('欺压胖子');
insert into youthwords.corpus (content) values ('开房');
insert into youthwords.corpus (content) values ('观看日本电影');
insert into youthwords.corpus (content) values ('蹂躏男友');
insert into youthwords.corpus (content) values ('自曝病情');
insert into youthwords.corpus (content) values ('祝贺王佩元');
insert into youthwords.corpus (content) values ('使用医保卡');
insert into youthwords.corpus (content) values ('欺压儿媳');
insert into youthwords.corpus (content) values ('自取其乳');
insert into youthwords.corpus (content) values ('综艺节目');
insert into youthwords.corpus (content) values ('掩饰脑残');
insert into youthwords.corpus (content) values ('接触女流氓');
insert into youthwords.corpus (content) values ('改过自新');
insert into youthwords.corpus (content) values ('无底线卖萌');
insert into youthwords.corpus (content) values ('多人开房');
insert into youthwords.corpus (content) values ('饮水过度');
insert into youthwords.corpus (content) values ('当众表演');
insert into youthwords.corpus (content) values ('上午发微博');
insert into youthwords.corpus (content) values ('手写签名');
insert into youthwords.corpus (content) values ('关注开奖');
insert into youthwords.corpus (content) values ('授受硬币');
insert into youthwords.corpus (content) values ('刷卡');
insert into youthwords.corpus (content) values ('买票');


/* check status */
describe youthwords.author;
describe youthwords.corpus;
select * from youthwords.author;
select * from youthwords.corpus;


