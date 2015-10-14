CREATE DATABASE guestbook;
SET names utf8;
USE guestbook;
CREATE TABLE admin(
    id int not null auto_increment primary key,
    username varchar(50) unique not null,
    passwd char(32) not null
    );
CREATE TABLE message(
    id int not null auto_increment primary key,
    name varchar(50) CHARACTER SET utf8 COLLATE utf8_bin not null,
    title varchar(200) CHARACTER SET utf8 COLLATE utf8_bin not null,
    content text CHARACTER SET utf8 COLLATE utf8_bin not null,
    time datetime not null
    );
