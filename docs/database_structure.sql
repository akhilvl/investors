create database investor;

use investor;

create table company(
	company_id int(11) unsigned primary key auto_increment,
	company_name varchar(105) not null,
	location varchar(105) not null, 
	status tinyint(1) default 1,	
	created_by int(11) default 1,
	created_date TIMESTAMP default CURRENT_TIMESTAMP	
);


create table stocks(
	stock_id int(11) unsigned primary key auto_increment,
	company_id int(11) not null,
	exchange_id int(3) not null,
	stock_type enum('common', 'preferred') default 'common',	
	unit_count int(11) not null,
	unit_price float(10,2) not null,
	status tinyint(1) default 1,
	created_by int(11) default 1,
	created_date TIMESTAMP default CURRENT_TIMESTAMP	
);


create table exchanges(
	exchange_id int(11) unsigned primary key auto_increment,
	exchange_name varchar(105) not null,
	status tinyint(1) default 1,
	created_by int(11) default 1,
	created_date TIMESTAMP default CURRENT_TIMESTAMP	
);
insert into exchanges(exchange_name) values('New York Stock Exchange');
insert into exchanges(exchange_name) values('London Stock Exchange');
insert into exchanges(exchange_name) values('Hong Kong Stock Exchange');
insert into exchanges(exchange_name) values('Shanghai Stock Exchange');
insert into exchanges(exchange_name) values('Deutsche Börse Frankfurt');

