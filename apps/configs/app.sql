/*
 * 密码表
 * username 用户名
 * password 密码
 * created_at 创建时间
 */
drop table if exists passwords;
create table passwords(
	username varchar(20) not null,
	password char(32) not null,
	updated_at timestamp on update CURRENT_TIMESTAMP not null default CURRENT_TIMESTAMP
)charset=utf8;

/*
 * 用户信息表
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
