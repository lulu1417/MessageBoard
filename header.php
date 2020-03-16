<?php
include 'style.css';
include 'db.php';
if(session_id() == ''){
    session_start();
    $name = $_SESSION['name'];
    $userId = $_SESSION['userId'];
}
