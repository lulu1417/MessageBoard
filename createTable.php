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
        content varchar(20),
        time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );
    ",

    'messages' => "create table messages(
        id integer auto_increment primary key,
        user_id integer(10) NOT NULL ,
        post_id integer(10) NOT NULL ,
        content varchar(20),
        time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );
    ",

    'likes' => "create table likes(
        id integer auto_increment primary key,
        user_id integer(10) NOT NULL ,
        post_id integer(10) NOT NULL ,
        number integer(10) NOT NULL ,
        time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );
    ",

   ];

foreach ($sqls as $sql) {
    var_dump(mysqli_query($db, $sql));
}


