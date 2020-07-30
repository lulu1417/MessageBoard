<?php
include 'style.css';
include 'db.php';
session_start();
if (!empty($_SESSION['name']) && !empty($_SESSION['userId'])) {
    $name = $_SESSION['name'];
    $userId = $_SESSION['userId'];
}
