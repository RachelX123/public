<?php
session_start();
if (isset($_POST['submit'])) {
    $genre = $_POST['genre'];
    //echo "$genre";
    $url = $_POST['url'];
    $conn = mysqli_connect('mxiao02.webhosting2.eeecs.qub.ac.uk', 'mxiao02', 'm497XYh1nGWbHK3m', 'mxiao02');
    $gen_sql = "SELECT `genre` FROM `pr2genre` WHERE genre=\"$genre\"";
    $check = $conn->query($gen_sql);
    $check_it = mysqli_fetch_array($check);
    if (empty($check_it)) {
        $add_sql = "INSERT INTO `pr2genre` (`genre`, `click`,`g_url`) VALUE ('$genre',0,'$url')";
        $add = $conn->query($add_sql);
        //$add_genre = mysqli_fetch_array($add);
        header("Location:edit.php?bresult=suc");
    } else {
        header("Location:edit.php?bresult=fal");
    }
}
