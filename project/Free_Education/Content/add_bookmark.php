<?php 
session_start();
include('../db.php');
$username = isset($_SESSION["username"])?$_SESSION["username"]:'';
$user_id=isset($_SESSION["user_id"])?$_SESSION["user_id"]:'';
$user_type = isset($_SESSION["user_type"])?$_SESSION["user_type"]:'';
$date=date('Y-m-d H:i:s');
//resource details:
$resource_id = isset($_POST['resource_id'])?$_POST['resource_id']:'';
$id = isset($_POST['user_id'])?$_POST['user_id']:'';

$sql_add = "INSERT INTO `bookmark` (`resource_id`,`user_id`,`date`) VALUE (\"$resource_id\", \"$id\", \"$date\")";
$sql_check = "SELECT * FROM `bookmark` WHERE `resource_id` = \"$resource_id\" AND `user_id`=\"$id\" ";

$res=$conn->query($sql_check);
$bookmark=[];
while($data=$res->fetch_assoc()){
    array_push($bookmark,$data);
}

if ($res && $res->num_rows > 0) {
    $sql_delete = "DELETE FROM `bookmark` WHERE resource_id = \"$resource_id\" AND user_id = \"$id\" ";
    $conn->query($sql_delete);
    echo 'CANCEL BOOKMARK';
}else{
    if($add = $conn->query($sql_add)){
        //if($input_list[0]['source_type'] == '1') unlink($input_list[0]['Input']); no enought right
        echo 'ADD BOOKMARK Sussessfully!';
    
    }else{
        echo 'Add Failed: ' . $conn->error;
    }

}


?>