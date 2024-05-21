<?php
session_start();

include('../db.php');

if(isset($_POST['signup'])){
    $username = $_POST['username'];
    $username= htmlspecialchars(addslashes($username), ENT_QUOTES, 'UTF-8');
    $email = $_POST['email'];
    $email= htmlspecialchars(addslashes($email), ENT_QUOTES, 'UTF-8');
    $pw = $_POST['password'];
    $pw= htmlspecialchars(addslashes($pw), ENT_QUOTES, 'UTF-8');
    $pw2 = $_POST['repeat_password'];
    $pw2= htmlspecialchars(addslashes($pw2), ENT_QUOTES, 'UTF-8');
    $user_type = $_POST['user_type'];
    
    switch ($user_type){ // switch to user_type_id to insert
        case "STUDENT": 
            $user_type = 1;
            break;
        case "TEACHER":
            $user_type = 2;
            break;
        case "CREATER":
            $user_type = 3;
            break;
    }

    if($pw == $pw2){ //check the password equal to repeate password
        //echo"<p>pw=pw</p>";
        $sql_check = "SELECT username, email FROM user WHERE username = '$username' and email = '$email' ";// check the user exist or not need name and email are same
        //echo" $sql_check";
        //echo"<p>sql_check over</p>";
        $check = $conn->query($sql_check);
        /*
        if (!$check) {
            echo "Query execution failed: " . $conn->error;
        } else {
            // Process the query result
            echo"check succ";
        }
        */
        
        $row = mysqli_fetch_array($check);
        //echo"<p>result</p>";
        if ($username == $row['username']) {
            header("Location:register.php?show=2");
        } else {
            //echo'<p>can add</p>';
            $sql_add = "INSERT INTO user (username,user_password, email,user_type, picture, age) VALUES ('$username', '$pw', '$email', '$user_type', '../profile_picture/user.webp',0)";
            //echo" $sql_add";
            
            $add = $conn->query($sql_add);
            header("Location:register.php?show=3");
            mysqli_close($conn);
            //register successfully.
        }
    }else{
        header("Location:register.php?show=1"); //need two password type same 
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
        <title>Register</title>
        <link rel="stylesheet" href="style.css" >
    </head>
    <body>
        
            <div class="wrapper" >
                <div class="login_box">
                    <div class="signup_header">
                        <span>REGISTER</span>
                    </div>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?> " method="post">
                    <div class="input_box">
                        <input type="text" id="user" name="username" class="input_field" required="required">
                        <label for="user" class="label">Username</label>
                        <i class="bx bx-user icon" ></i>
                    </div>
                    <div class="input_box">
                        <input type="email" id="email" name="email" class="input_field" required="required">
                        <label for="email" class="label">email</label>
                        <i class='bx bx-envelope icon' ></i>
                    </div>
                    <div class="input_box">
                        <input type="password" id="pass" name="password" class="input_field" required="required">
                        <label for="pass" class="label">Password</label>
                        <i class='bx bx-hide bx-rotate-180 icon pass' id="pass-icon" ></i>
                        <i class="bx bx-lock-alt icon" ></i>
                    </div>
                    <div class="input_box">
                        <input type="password" id="repass" name="repeat_password" class="input_field" required="required">
                        <label for="repass" class="label">Repeat Password</label>
                        <i class='bx bx-hide bx-rotate-180 icon pass' id="repass-icon" ></i>
                        <i class="bx bx-lock-alt icon" ></i>
                    </div>
                    <div class="input_box">
                        <select id="usertype" class="input_field" name="user_type" required="required">
                            <option value="">Choose your user type:(user right are same)</option>
                            <option value="STUDENT">STUDENT</option>
                            <option value="TEACHER">TEACHER</option>
                            <option value="CREATER">CONTENT CREATER</option>
                        </select>
                    </div>
                    <div class="input_box">
                        <input type="submit" class="input_submit" value="SIGN UP" name="signup" >
                    </div>
                    </form>
                    <div class="register">
                        <span>Have an account <a href="login.php">Login</a></span>
                    </div>
                    <?php
                    $show = isset($_GET['show']) ? $_GET['show'] : "";
                    switch ($show) {
                        case 1:
                            echo "<p>Registration failed, password cannot confirm, please register again.</p>";
                            break;
                        case 2:
                            echo "<p>Registration failed, username exist, please register again.</p>";
                            break;
                        case 3:
                            echo "<br><p>Register successfully!</p>";
                            break;
                    }
                    ?>
                </div>
            </div>
        
        <script src="script.js"></script>
    </body>
</html>