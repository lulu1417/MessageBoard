<?php
include 'style.css';
include 'db.php';
if(session_id() == ''){
    session_start();
}