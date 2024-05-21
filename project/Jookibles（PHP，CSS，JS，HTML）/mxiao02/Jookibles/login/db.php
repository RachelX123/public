<?php
$servername = "Localhost";
$username = "mx";
$password = "203010";
$db = "project";
$charset = 'utf8mb4';

$conn = new mysqli($servername, $username, $password, $db);
if($conn->connect_error){
    echo "not connected ".$conn->connect_error;
}else{
    //echo "connected to MySQL DB using MySQLi API";
}