<?php

session_start();
include('../db.php');
$user_id=isset($_SESSION["user_id"])?$_SESSION["user_id"]:'';
$id = isset($_POST['id'])?$_POST['id']:'';
$type = isset($_POST['type'])?$_POST['type']:'';
if($type == 'resource'){
    $sql_delect = "DELETE FROM `educational_reource` WHERE resource_id = $id";
    $sql_get_link = "SELECT `Input`,`source_type` FROM educational_reource WHERE user_id = \"$user_id\"";
    $res=$conn->query($sql_get_link);
    $input_list=[];
    while($data=$res->fetch_assoc()){
        array_push($input_list,$data);
    }
}else if($type == 'forum'){
    $sql_delect = "DELETE FROM `forum` WHERE forum_id = $id";
}else if($type == 'review'){
    $sql_delect = "DELETE FROM `review` WHERE review_id = $id";
}


if($delect = $conn->query($sql_delect)){
    //if($input_list[0]['source_type'] == '1') unlink($input_list[0]['Input']); no enought right
    echo 'Delete Sussessfully!';
}else{
    echo 'Delete Failed: ' . $conn->error;
}
?>
