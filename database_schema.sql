
create database if not exists orange;

create table if not exists useraccounts (
username varchar(40) primary key,
password varchar(40) not null,
firstname varchar(40) not null,
lastname varchar(40) not null,
email_address varchar(50) not null,
address1 varchar(100) not null,
address2 varchar(100),
state varchar(40) not null,
zip int(20) not null,
country varchar(40) not null,
CONSTRAINT email_id UNIQUE(email_address) );

create table if not exists  books(
book_id int(20) primary key auto_increment,
author_firstname varchar(40) not null ,
author_lastname varchar(40) not null,
title varchar(100) not null,
price real not null,
category varchar(40),
publisher varchar(40) not null
);


create table if not exists review(
review_id int(20) primary key auto_increment,
book_id int(20),
review varchar(300),
constraint fk_book foreign key (book_id) references books(book_id)
);


create table if not exists  orders (
order_id int(20) primary key auto_increment,
order_date datetime not null,
shipping_address1 varchar(100) not null,
shipping_address2 varchar(100),
shipping_state varchar(40) not null,
shipping_zip int(20),
shipping_country varchar(40) not null,
total_price real not null,
status varchar(20)
);

create table  if not exists  transaction(
transaction_id int(20) primary key auto_increment,
order_id int(20) not null,
total_price real not null,
tax real not null,
credit_card int not null,
exp_date datetime,
credit_card_type varchar(20) not null,
constraint fk_order_transaction foreign key (order_id) references orders(order_id)
);



create table if not exists orders_books(
order_id int(20) not null,
book_id int(20) not null,
constraint fk_orders foreign key (order_id) references orders(order_id),
constraint fk_books foreign key (book_id) references books(book_id)
);

create table if not exists  useraccounts_orders(
username varchar(40) not null,
order_id int(20) not null,
constraint fk_orders_users foreign key (order_id) references orders(order_id),
constraint fk_useraccounts foreign key (username) references useraccounts(username)
);



insert into books values(101,'Murach','Joel','MySQL',350.10,'Database','Brendon');
insert into books values(102,'Chetan','Bhagat','Two States',298,'Novel','Standard');
insert into books values(103,'Bakshi','Gaur','MyMachines',489,'Engineering','Standard');
insert into books values(104,'Dan','Brown','DavinceCode',489.33,'Novel','Meta');
insert into books values(106,'Duraiswamy','Alagappan','Chemistry',254.17,'Science','Muruga');
insert into books values(107,'Selvaraghavan','Joseph','How to Act?',987.17,'Art','Ynot');
insert into books values(108,'Rehman','ARR','Soul of Music',799.17,'Art','ARR');
insert into books values(109,'Modi','Narendra','Wanna Win Election?',654.17,'Politics','Gujju');