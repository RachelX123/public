<?php
header("Content-Type:text/html; charset=utf-8");
//開啟Session
session_start();
$user_type = $_SESSION['user_type'];

if ($user_type == 1) {
    //清除Session
    session_destroy();
    header("Location: login-register.php");
}
if ($user_type == 2) {
    //清除Session
    session_destroy();
    //導到login.php
    header("Location:../index.php");
}
