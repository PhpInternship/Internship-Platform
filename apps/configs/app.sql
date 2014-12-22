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
 * city 城市id
 * address 详细地址
 * type 公司类型(国企，民企，外企。。)
 * field 经营领域(金融，互联网，土建。。)
 * tel 联系电话
 * state 状态(0：待审核，1：审核通过)
 * created_at 创建时间
 * updated_at 更新时间
 */
drop table if exists companys;
create table companys(
	id int not null primary key auto_increment,
	name varchar(50) not null,
	city int not null,
	address varchar(50) not null,
	type varchar(10) not null,
	field varchar(200) not null,
	tel varchar(20) not null,
	state tinyint not null,
	created_at timestamp not null default current_timestamp,
	updated_at timestamp not null default '0000-00-00 00:00:00'
)charset=utf8;

/*
 * 4.实习工作表 jobs
 * id 主键
 * company_id 公司id
 * name 岗位名称
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
 * company 公司
 * start_time 入职时间
 * level_time 离职时间
 * description 对该段时间的工作的评价
 * created_at 创建时间
 * updated_at 更新时间
 */
drop table if exists experiences;
create table experiences(
	id int not null primary key auto_increment,
	user_id int not null,
	company varchar(50) not null,
	start_time date not null,
	level_time date not null,
	description varchar(255) not null,
	created_at timestamp not null default current_timestamp,
	updated_at timestamp not null default '0000-00-00 00:00:00'
)charset=utf8;

/*
 * 
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