<?php
header('Content-Type: application/json');
//connect db
include("conn.php");
include("get.php");
$info = "endpoint incorrect";
$data = array();

if (isset($_GET['id'])) {
    $bid = $_GET['id'];
    if (!empty($bid)) {
        $review = "SELECT pr2userSystem.username, comment.b_id, project.title, comment.date, comment.comment, comment.rate 
        FROM comment INNER JOIN pr2userSystem ON comment.user_id = pr2userSystem.user_id 
        INNER JOIN project ON comment.b_id = project.b_id
        WHERE comment.b_id = $bid";
        $res = $conn->query($review );
        if (!$res) {
            echo "SQL error";
        } else {
            $info = "success";
            while ($row = $res->fetch_assoc()) {
                array_push($data, $row);
            }
        }
    } else {
        echo "parameter needs a value";
    }
} else {
    $allre = "SELECT pr2userSystem.username, comment.b_id, project.title, comment.date, comment.comment, comment.rate 
    FROM comment INNER JOIN pr2userSystem ON comment.user_id = pr2userSystem.user_id 
    INNER JOIN project ON comment.b_id = project.b_id";
    $res = $conn->query($allre);
    if (!$res) {
        echo "SQL error";
    } else {
        $info = "success";
        while ($row = $res->fetch_assoc()) {
            array_push($data, $row);
        }
    }
}


$response = array("message" => $data, "status" => $info);

echo json_encode($response);
