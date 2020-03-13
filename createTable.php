<?php
include 'db.php';
$sqls = [
    'users' => "create table users(
        id integer auto_increment primary key,
        name char(20) NOT NULL ,
        password char(20) NOT NULL ,
        time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );
    ",

    'posts' => "create table posts(
        id integer auto_increment primary key,
        user_id integer(10) NOT NULL ,
        subject varchar (20) NOT NULL ,
        content varchar(1000),
        time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );
    ",

    'comments' => "create table comments(
        id integer auto_increment primary key,
        user_id integer(10) NOT NULL ,
        post_id integer(10) NOT NULL ,
        content varchar(300),
        time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );
    ",

    'replies' => "create table replies(
        id integer auto_increment primary key,
        user_id integer(10) NOT NULL ,
        comment_id integer(10) NOT NULL ,
        content varchar(300),
        time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );
    ",

    'likes' => "create table likes(
        id integer auto_increment primary key,
        user_id integer(10) NOT NULL ,
        post_id integer(10) NOT NULL ,
        time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );
    ",

   ];

foreach ($sqls as $sql) {
    var_dump(mysqli_query($db, $sql));
}


