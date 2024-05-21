<?php
include('../db.php');
if(isset($_POST['set'])){
    $username = $_POST['username'];
    $username= htmlspecialchars(addslashes($username), ENT_QUOTES, 'UTF-8');
    $pw = $_POST['password'];
    $pw= htmlspecialchars(addslashes($pw), ENT_QUOTES, 'UTF-8');
    $email = $_POST['email'];
    $email= htmlspecialchars(addslashes($email), ENT_QUOTES, 'UTF-8');
    $sql_check = "SELECT user_id, username, user_type, email FROM user WHERE username = '$username' and email = '$email' ";// check the user exist or not 
    $check = $conn->query($sql_check);
    $row = mysqli_fetch_array($check);
    $user_id = $row['user_id'];
    $user_type = $row['user_type'];


    if($user_type != 4){
        echo"user_type != 4";
        if($username == $row['username'] && $email == $row['email']){
            $sql_update = "UPDATE user SET user_password = '$pw' WHERE user_id = $user_id and email = '$email' ";
            echo"<p>$sql_update</p>";
            $update = $conn->query($sql_update);
            header("Location:forget.php?show=1");
        }else{

            header("Location:forget.php?show=2");
        }
    }else{
        header("Location:forget.php?show=3");
    }

    
}
?>