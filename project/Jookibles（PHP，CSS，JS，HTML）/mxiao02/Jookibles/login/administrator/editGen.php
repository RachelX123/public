<?php
session_start();
if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $genre = $_POST['genre'];
    $conn = mysqli_connect('mxiao02.webhosting2.eeecs.qub.ac.uk', 'mxiao02', 'm497XYh1nGWbHK3m', 'mxiao02');
    $up_sql = "UPDATE `pr2genre` SET `genre`=\"$genre\" WHERE `id`=$id";
    //echo"$id $genre";
    $update = $conn->query($up_sql);
    header('Location:edit.php?bresult=suc');
}
?>