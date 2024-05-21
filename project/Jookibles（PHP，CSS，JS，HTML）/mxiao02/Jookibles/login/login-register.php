<?php
if (isset($_POST['Register'])) {
    include('conn.php');
    $username = $_POST['username'];
    $pw = $_POST['password'];
    $co_pw = $_POST['co_password'];
    $email = $_POST['email'];
    $username = $conn->real_escape_string (trim($username));
    $pw = $conn->real_escape_string (trim($pw));
    $email = $conn->real_escape_string (trim($email));

    if ($co_pw == $pw) {
        $conn = mysqli_connect('mxiao02.webhosting2.eeecs.qub.ac.uk', 'mxiao02', 'm497XYh1nGWbHK3m', 'mxiao02');
        $sql_check = "SELECT username,password FROM pr2userSystem WHERE username = '$username'";
        $check = $conn->query($sql_check);
        $row = mysqli_fetch_array($check);

        if ($username == $row['username']) {
            header("Location:login-register.php?reg=1&show=2");
        } else {
            $sql_add = "INSERT INTO pr2userSystem (username,password, user_type, email, authority) VALUES ('$username', $pw, 2,'$email', 1)";
            $add = $conn->query($sql_add);
            header("Location:login-register.php?reg=2&show=4");
            mysqli_close($conn);
            //register successfully.
        }
    } else {
        //password not same
        header("Location:login-register.php?reg=3&show=3");
    }
}
/*
if(isset($_GET['b_id'])){
    $b_id = $_GET['b_id'];
    //echo "$b_id";
}
*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/login.css" />
    <title>Sign in & Sign up Form</title>
    <link rel="shortcut icon" href="img/open-book.png" type="image/x-icon">
    <!--reference : https://github.com/XiaoLi-sach/practise-->
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <!--login form:-->
                <form action="<?php echo "checklog.php?b_id=$b_id" ?>" class="sign-in-form" method="POST">
                    <h2 class="title">Sign in</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="username" placeholder="Username" required="required" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Password" required="required" />
                    </div>
                    <input type="submit" value="Login" name="Login" class="btn solid" />



                    <p class="social-text">Or Sign in with social platforms</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                    <?php
                    $show = isset($_GET['show']) ? $_GET['show'] : "";
                    switch ($show) {
                        case 1:
                            echo "<br><p>username or password is invalid</p>";
                            break;
                        case 2:
                            echo "<br><p>Registration failed, username exist, please register again</p>";
                            break;
                        case 3:
                            echo "<br><p>Registration failed, password cannot confirm, please register again.</p>";
                            break;
                        case 4:
                            echo "<br><p>Register successfully!</p>";
                            break;
                        case 5:
                            echo"<p>Your account has been block!</p>";
                            break;
                    }
                    ?>
                </form>

                <!--Register form-->
                <form action="<?php echo $_SERVER['PHP_SELF']; ?> " class="sign-up-form" method="POST">
                    <h2 class="title">Register</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="username" placeholder="Username" required="required" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Password" required="required" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="co_password" placeholder="Confirm Password" required="required" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" placeholder="Email" required="required" />
                    </div>
                    <input type="submit" name="Register" class="btn" value="Register" />




                    <p class="social-text">Or Register with social platforms</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                    <?php
                    $reg = isset($_GET['reg']) ? $_GET['reg'] : "";
                    switch ($reg) {
                        case 1:
                            echo "<br><p>Registration failed, username exist, please register again</p>";
                            break;
                        case 2:
                            echo "<br><p>Register successfully!</p>";
                            break;
                        case 3:
                            echo "<br><p>Registration failed, password cannot confirm, please register again</p>";
                            break;
                    }
                    ?>
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New here ?</h3>
                    <br>
                    <h3>
                        Welcome to Jookibleshub!
                    </h3>
                    <p>
                        Our website allows young juveniles the ability to join a book community
                    </p>
                    <br>
                    <button class="btn transparent" id="sign-up-btn">
                        Register
                    </button>
                </div>
                <img src="img/log.svg" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>One of us ?</h3>
                    <br>
                    <h3>
                        Welcome to Jookibleshub!
                    </h3>
                    <p>
                        Our website allows young juveniles the ability to join a book community
                    </p>
                    <br>
                    <button class="btn transparent" id="sign-in-btn">
                        Sign in
                    </button>
                </div>
                <img src="img/register.svg" class="image" alt="" />
            </div>
        </div>
    </div>

    <script src="app.js"></script>
</body>

</html>