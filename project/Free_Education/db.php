<?php
$servername = "mxiao02.webhosting3.eeecs.qub.ac.uk";
$username = "mxiao02";
$password = "";
$db = "";
$charset = 'utf8mb4';

$conn = new mysqli($servername, $username, $password, $db);
if($conn->connect_error){
    echo "not connected ".$conn->connect_error;
}else{
    //echo "connected to MySQL DB using MySQLi API";
}