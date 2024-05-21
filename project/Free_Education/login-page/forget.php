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
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" >
        <meta name="viewport" content="width=device-width,initial-scale=1.0" >
        <!-- boxicons -->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <title>Forget Password</title>
        <link rel="stylesheet" href="style.css" >
    </head>
    <body>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?> "method="post">
            <div class="wrapper" >
                <div class="login_box">
                    <div class="signup_header">
                        <span>RESET</span>
                    </div>
                    <div class="input_box">
                        <input type="text" id="user" name="username" class="input_field" required>
                        <label for="user" class="label">Username</label>
                        <i class="bx bx-user icon" ></i>
                    </div>
                    <div class="input_box">
                        <input type="email" id="user" name="email" class="input_field" required>
                        <label for="user" class="label">email</label>
                        <i class='bx bx-envelope icon' ></i>
                    </div>
                    <div class="input_box">
                        <input type="password" id="pass" name="password" class="input_field" required>
                        <label for="pass" class="label">Password</label>
                        <i class='bx bx-hide bx-rotate-180 icon pass' id="pass-icon" ></i>
                        <i class="bx bx-lock-alt icon" ></i>
                    </div>
                    <div class="input_box">

                    </div>
                    <div class="input_box">
                        <input type="submit" class="input_submit" value="SET" name="set" >
                    </div>
                    <div class="register">
                        <span>Return to <a href="login.php">Login</a></span>
                    </div>

                    <?php
                    $show = isset($_GET['show']) ? $_GET['show'] : "";
                    switch ($show) {
                        case 1:
                            echo "<p>Password change successfully!</p>";
                            break;
                        case 2:
                            echo "<p>Password change failed, username or email are error.</p>";
                            break;
                        case 3:
                            echo"<p>Administrator cannot change in here please constract with Organisations</p>";
                            break;
                    }
                    ?>
                </div>
            </div>
        </form> 
        <script src="script.js"></script>
    </body>
</html>