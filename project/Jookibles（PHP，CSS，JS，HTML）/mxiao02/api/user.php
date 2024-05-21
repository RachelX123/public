<?php
header('Content-Type: application/json');
//connect db
include("conn.php");
include("get.php");
$info = "endpoint incorrect";
$data = array();
//show user
if (isset($_GET['id'])) {
    $uid = $_GET['id'];
    if (!empty($uid)) {
        $one = "SELECT username,user_id, password, email, user_type.user_type FROM `pr2userSystem`
        INNER JOIN `user_type` ON pr2userSystem.user_type = user_type.id
        WHERE user_id = $uid;";
        $res = $conn->query($one);
        if (!$res) {
            $info = "SQL error";
        } else {
            $info = "SUCCESS";
            while ($row = $res->fetch_assoc()) {
                array_push($data, $row);
            }
        }
    } else {
        echo "parameter needs a value";
    }
} else {
    //all book:
    $all = "SELECT username,user_id, password, email, user_type.user_type FROM `pr2userSystem`
    INNER JOIN `user_type` ON pr2userSystem.user_type = user_type.id;;";
    $res = $conn->query($all);
    if (!$res) {
        $info = "SQL error";
    } else {
        $info = "SUCCESS";
        while ($row = $res->fetch_assoc()) {
            array_push($data, $row);
        }
    }
}



$response = array("message" => $data, "status" => $info);

echo json_encode($response);

?>