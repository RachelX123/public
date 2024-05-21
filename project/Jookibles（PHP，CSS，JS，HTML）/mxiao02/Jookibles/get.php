<?php
/**
 * get info from db return array();
 */
function getfromdb($sql,$conn){
    $result = $conn->query($sql);
    $answer = array();
    
    while($datarow = $result->fetch_assoc()){
        array_push($answer, $datarow);
    }
    return $answer;
    exit();
}
?>