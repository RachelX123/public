<?php
session_start();
$username = isset($_POST['username']) ? $_POST['username'] : ""; //input from username
$password = isset($_POST['password']) ? $_POST['password'] : ""; //input from password
//$remember = isset($_POST['remember']) ? $_POST['remember'] : "";// check remember password or not 


include('conn.php');
$username1 = $conn->real_escape_string (trim($username));
$password1 = $conn->real_escape_string (trim($password));

$sql_check = "SELECT username,password, user_type, user_id, pr2userSystem.authority FROM pr2userSystem 
INNER JOIN authority ON pr2userSystem.authority = authority.id 
WHERE username = '$username1' AND password = $password1";
//echo $sql_check;
//use query run in db
$check = $conn->query($sql_check);
$row = mysqli_fetch_array($check);

if ($username == $row['username'] && $password == $row['password']) {
    /*if($remember == "on"){
            setCookie("remember", $username, time() + 7 * 24 * 3600, );//keep login for 60
        }
*/
    if ($row['authority'] == 2) {
        header("Location:login-register.php?show=5");
    } else {


        $user_id = $row['user_id'];
        $user_type = $row['user_type'];
        $_SESSION['user_id'] = $user_id;
        $ip = $_SERVER['REMOTE_ADDR'];
        $date = date('Y-m-d H:m:s');
        $info = sprintf("Current user：%s,IP address：%s,Time：%s /n", $user_id, $ip, $date);
        $sql_logs = "INSERT INTO logs(username,ip,date) VALUES('$user_id','$ip','$date')";
        $time = time() + 24 * 60 * 60;
        setCookie("uid", $id, $time, "/"); //..设置COOKIE
        setCookie("username", $username, $time, "/"); //..设置一个用户名COOKIE
        setCookie("isLogin", 1, $time, "/"); //..设置一个登录判断的标记isLogin
        $_SESSION["username"] = $username;
        $_SESSION["user_type"] = $user_type;
        if ($user_type == 1) {
            header("Location: ../administrator/index.php");
            $_SESSION['user_type']=1;
        }
        if ($user_type == 2) {
            $_SESSION['user_type']=2;
            if (isset($_SESSION['b_id'])) {
                $b_id = $_SESSION['b_id'];
                // echo $b_id;
                header("Location:../Bookdetail.php?id=$b_id");
            } else if (isset($_SESSION['kw'])) {
                $kw = $_SESSION['kw'];
                header("Location:../Book.php?kw=$kw");
            } else {
                header("Location:../index.php");
            }
        }
    }
} else {
    header("Location:login-register.php?show=1");
}
