<?php
header("Content-Type:text/html; charset=utf-8");
//start Session
session_start();
$user_type = $_SESSION['user_type'];

if ($user_type == 4) {
    //clean Session
    session_destroy();
    //admin need to jump to login.php
    header("Location: login.php");
}else{
    //clean Session
    session_destroy();
    //return to index page: 
    header("Location:../Content/index.php");
}
