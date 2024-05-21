<?php
function getfromdb($sql,$conn){
    $get = $conn->query($sql);
    if(!$get){
        echo "SQL error";
    }else{
        $data=array();
        while($row = $get->fetch_assoc()){
            array_push($data,$row);
        }
    }
    return $data;
}
?>