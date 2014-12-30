/*
 * 1.密码表 passwords
 * username 用户名
 * password 密码
 * created_at 创建时间
 */
drop table if exists passwords;
create table passwords(
	username varchar(20) not null,
	password char(60) not null,
	updated_at timestamp on update CURRENT_TIMESTAMP not null default CURRENT_TIMESTAMP
)charset=utf8;
insert into passwords(username,password) 
values('hongker','$2a$12$89F.noUbUefF2CF2i7ROSOHLs5vLHPA620.tUvW0yEtTD07tkks2C');

/*
 * 2.用户信息表 users
 * id 主键
 * username 用户名
 * email 邮箱
 * age 年龄
 * sex 性别
 * school 学校
 * education 学历
 * grade 年级
 * created_at 创建时间
 * updated_at 更新时间
 */
drop table if exists users;
create table users(
	id int not null primary key auto_increment,
	username varchar(20) not null,
	email varchar(50) not null,
	age tinyint not null default 20,
	sex char(1) not null default ' ',
	school varchar(50) not null default ' ',
	education varchar(4) not null default ' ',
	grade varchar(4) not null default ' ',
	created_at timestamp not null default current_timestamp,
	updated_at timestamp not null default '0000-00-00 00:00:00'
)charset=utf8;
insert into users(username,email,sex) values('hongker','xiaok@qq.com','男');

/*
 * 3.公司信息表 companys
 * id 主键
 * name 公司名称
 * logo 公司logo
 * city 城市id
 * address 详细地址
 * type 公司类型(国企，民企，外企。。)
 * field 经营领域(金融，互联网，土建。。)
 * tel 联系电话
 * state 状态(0：待审核，1：审核通过)
 * description 简介
 * created_at 创建时间
 * updated_at 更新时间
 */
drop table if exists companys;
create table companys(
	id int not null primary key auto_increment,
	name varchar(50) not null,
	logo varchar(100) not null,
	city int not null,
	address varchar(100) not null,
	type varchar(10) not null,
	field varchar(200) not null,
	tel varchar(20) not null,
	state tinyint not null,
	description varchar(255) not null,
	created_at timestamp not null default current_timestamp,
	updated_at timestamp not null default '0000-00-00 00:00:00'
)charset=utf8;
insert into companys(name,logo,city,address,type,field,tel,state,description)
values('惠普科技有限公司','/images/hp.png',1,'北京市朝阳区建国路112号中国惠普大厦(近招商局大厦)','外企','互联网','18728400401',1,'惠普（HP）公司成立于1939年，是一家业务运营遍及全球170多个国家和地区的高科技公司。我们致力于探索科技和服务如何帮助人们和企业解决其遇到的问题和挑战，并把握机遇、实现愿景、成就梦想。我们运用新的思想和理念来打造更简单、更有价值、更值得信赖的技术体验，不断帮助客户改善其生活和工作方式。'),
('万科企业股份有限公司','/images/wanke.png',1,'深圳市盐田区大梅沙环梅路33号万科中心','民企','房地产，互联网','18728400402',1,'万科企业股份有限公司成立于1984年，1988年进入房地产行业，1991年成为深圳证券交易所第二家上市公司。经过二十多年的发展，成为国内最大的住宅开发企业，目前业务覆盖珠三角、长三角、环渤海三大城市经济圈以及中西部地区，共计53个大中城市。近三年来，年均住宅销售规模在6万套以上，2011年公司实现销售面积1075万平米，销售金额1215亿元，2012年销售额超过1400亿。销售规模持续居全球同行业首位。')
,('中国光大银行股份有限公司','/images/guangda.png',1,'北京市西城区太平桥大街25号中国光大中心','国企','金融','18728400403',1,'中国光大银行成立于1992年8月，1997年1月完成股份制改造，成为国内第一家国有控股并有国际金融组织参股的全国性股份制商业银行。已在全国27个省、自治区、直辖市的60多个经济中心城市以及香港特别行政区拥有分支机构600多家。')
;
/*
 * 4.实习工作表 jobs
 * id 主键
 * company_id 公司id
 * name 岗位名称
 * city 工作城市
 * type 岗位类型
 * worktime 工作时间
 * workers 所招人数
 * description 描述
 * state 状态(0:待审核,1:审核通过)
 * created_at 创建时间
 * updated_at 更新时间
 */
drop table if exists jobs;
create table jobs(
	id int not null primary key auto_increment,
	company_id int not null,
	name varchar(50) not null,
	city int not null,
	type varchar(20) not null,
	worktime varchar(50) not null,
	workers smallint not null,
	description text not null,
	state tinyint not null,
	created_at timestamp not null default current_timestamp,
	updated_at timestamp not null default '0000-00-00 00:00:00'
)charset=utf8;

/*
 * 5.投递意向表 intentions
 * id 主键
 * job_id 岗位id
 * user_id 用户id
 * instruction 想要获取该岗位的原因说明
 * state 状态(0:待采纳,1:已采纳)
 * created_at 创建时间
 * updated_at 更新时间
 */
drop table if exists intentions;
create table intentions(
	id int not null primary key auto_increment,
	job_id int not null,
	user_id int not null,
	instruction text not null,
	state tinyint not null,
	created_at timestamp not null default current_timestamp,
	updated_at timestamp not null default '0000-00-00 00:00:00'
)charset=utf8;

/*
 * 6.学生简历表 resumes
 * id 主键
 * user_id 用户id
 * work_year 工作年限
 * characters 性格描述
 * skills 职业技能
 * description 其他描述
 * created_at 创建时间
 * updated_at 更新时间
 */
drop table if exists resumes;
create table resumes(
	id int not null primary key auto_increment,
	user_id int not null,
	work_year tinyint not null,
	characters varchar(255) not null,
	skills text not null,
	description varchar(255) not null,
	created_at timestamp not null default current_timestamp,
	updated_at timestamp not null default '0000-00-00 00:00:00'
)charset=utf8;

/*
 * 7.工作经验记录表 experiences
 * id 主键
 * user_id 用户id
 * companyid 公司id
 * start_time 入职时间
 * level_time 离职时间
 * description 对该段时间的工作的评价
 * company_desc 公司对员工这段时间工作的评价
 * created_at 创建时间
 * updated_at 更新时间
 */
drop table if exists experiences;
create table experiences(
	id int not null primary key auto_increment,
	user_id int not null,
	companyid varchar(50) not null,
	start_time date not null,
	level_time date not null,
	description varchar(255) not null,
	company_desc varchar(255) not null,
	created_at timestamp not null default current_timestamp,
	updated_at timestamp not null default '0000-00-00 00:00:00'
)charset=utf8;

/*
 * 城市表
 * id 主键
 * city 城市名称
 * province 省
 * type 类型
 * created_at 创建时间
 * updated_at 更新时间
 */
drop table if exists citys;
create table citys(
	id int not null primary key auto_increment,
	city varchar(20) not null,
	province varchar(20) not null,
	created_at timestamp not null default current_timestamp,
	key city(city)
)charset=utf8;

/*
 * 文章表
 * id 主键
 * title 文章标题
 * authorid 作者id
 * picture 封面图片
 * digest 摘要
 * content 文章内容
 * typeid 文章类型id
 * tag 标签
 * state 文章状态(0:待审核,1:已通过审核,2:推荐文章)
 * click 点击量
 * created_at 创建时间
 * updated_at 更新时间
 */
drop table if exists articles;
create table articles(
	id int not null primary key auto_increment,
	title varchar(50) not null,
	authorid int not null,
	picture varchar(50)  not null,
	digest varchar(255) not null,
	content text not null,
	tag varchar(200) not null,
	typeid tinyint not null,
	state tinyint not null default 0,
	click int not null default 0,
	created_at timestamp not null default current_timestamp,
	updated_at timestamp not null default '0000-00-00 00:00:00'
)charset=utf8;
insert into articles(title,authorid,picture,digest,content,tag,typeid,state)
values('盘点2014：十大最受关注的亚马逊AWS产品',1,'/images/article.jpg','2014年，亚马逊AWS新增了一个新的数据中心Region，推出一个新文档同步和共享服务等等。马上回顾一下这些服务和产品，以下按重要性的倒序列出。','这里是文章内容','互联网&大数据&全球化&产品',1,1);

/*
 * 文章类型表
 * id 主键
 * name 类型名
 * created_at 创建时间
 * updated_at 更新时间
 */
drop table if exists article_types;
create table article_types(
	id int not null primary key auto_increment,
	name varchar(20) not null,
	created_at timestamp not null default current_timestamp,
	updated_at timestamp not null default '0000-00-00 00:00:00'
)charset=utf8;
insert into article_types(name) values('计算机'),('工商管理'),('文学');

/*
 * 表格模板
 * id 主键
 * created_at 创建时间
 * updated_at 更新时间
 */
drop table if exists tables;
create table tables(
	id int not null primary key auto_increment,
	created_at timestamp not null default current_timestamp,
	updated_at timestamp not null default '0000-00-00 00:00:00'
)charset=utf8;