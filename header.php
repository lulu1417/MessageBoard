<?php
include 'style.css';
include 'db.php';
if(session_id() == ''){
    session_start();
}else{
    var_dump('cool');
    $name = $_SESSION['name'];
    $userId = $_SESSION['userId'];
}
