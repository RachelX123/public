<?php
session_start();
include('../db.php');

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $username= htmlspecialchars(addslashes($username), ENT_QUOTES, 'UTF-8');
    $pw = $_POST['password'];
    $pw= htmlspecialchars(addslashes($pw), ENT_QUOTES, 'UTF-8');

    $sql_check = "SELECT user_id, username, user_password, user_type FROM user WHERE username = '$username' and user_password = '$pw' ";// check the user exist or not 
    $check = $conn->query($sql_check);
    $row = mysqli_fetch_array($check);
    if($username == $row['username'] && $pw == $row['user_password']){
        $user_id = $row['user_id'];
        $user_type = $row['user_type'];
        $_SESSION['user'] = $username;
        $ip = $_SERVER['REMOTE_ADDR'];
        $date = date('Y-m-d H:m:s');
        $info = sprintf("Current user：%s,IP address：%s,Time：%s /n", $username, $ip, $date);
        $sql_logs = "INSERT INTO logs(username,ip,date) VALUES('$username','$ip','$date')";
        $time = time() + 24 * 60 * 60;
        setCookie("uid", $id, $time, "/");
        setCookie("username", $username, $time, "/");
        setCookie("isLogin", 1, $time, "/");
        $_SESSION["username"] = $username;
        $_SESSION["user_id"] = $user_id;
        $_SESSION["user_type"] = $user_type;
        if ($user_type == 4) {
            header("Location: ../administrator/index.php");
        }else{
            header("Location:../Content/index.php");
        }
        
    }else{
        header("Location:login.php?show=1");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" >
        <meta name="viewport" content="width=device-width,initial-scale=1.0" >
        <!-- boxicons -->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <title>LOGIN</title>
        <link rel="stylesheet" href="style.css" >
    </head>
    <body>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?> " method="post">
            <div class="wrapper" >
                <div class="login_box">
                    <div class="login_header">
                        <span>LOGIN</span>
                    </div>
                    <div class="input_box">
                        <input type="text" id="user" class="input_field" name="username" required>
                        <label for="user" class="label">Username</label>
                        <i class="bx bx-user icon" ></i>
                    </div>
                    <div class="input_box">
                        <input type="password" id="pass" name="password" class="input_field" required>
                        <label for="pass" class="label">Password</label>
                        <i class='bx bx-hide bx-rotate-180 icon pass' id="pass-icon" ></i>
                        <i class="bx bx-lock-alt icon" ></i>
                    </div>
                    <div class="remember-forget">
                        <div class="remember-me">
                            <input type="checkbox" id="remember">
                            <label for="remember" >Remember me</label>
                        </div>
                        <div class="forget">
                            <a href="forget.php" >Forget password</a>
                        </div>
                    </div>
                    <div class="input_box">
                        <input type="submit" class="input_submit" value="LOGIN" name="login" >
                    </div>
                    <div class="register">
                        <span>Don't have an account <a href="register.php">SIGN UP</a></span>
                    </div>
                    <?php
                    $show = isset($_GET['show']) ? $_GET['show'] : "";
                    switch ($show) {
                        case 1:
                            echo"<p>username or password is invalid</p>";
                    }
                    ?>
                </div>
            </div>
        </form>
        <script src="script.js"></script>
    </body>
</html>