<?php
// check login status:
session_start();

if (isset($_SESSION['user_id'])) {
    // Login
    $response = array('logged_in' => true);
} else {
    // never login
    $response = array('logged_in' => false);
}

// return JSON respornse:
header('Content-Type: application/json');
echo json_encode($response);
?>