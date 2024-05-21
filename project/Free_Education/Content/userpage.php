<?php
session_start();
include('../db.php');

$username = isset($_SESSION["username"])?$_SESSION["username"]:'';
$user_id=isset($_SESSION["user_id"])?$_SESSION["user_id"]:'';
$user_type = isset($_SESSION["user_type"])?$_SESSION["user_type"]:'';

?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8" >
        <meta name="viewport" content="width=device-width,initial-scale=1.0" >
        <title>Profile</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Italianno&family=Itim&family=Jost&display=swap" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css" >
    </head>
    <body>
    <?php
        if(isset($user_id)){
            if($user_type != 4){
                include("header1.php");
            }else{
                include("../administrator/header2.php");
            }
        }else{
            include('header1.php');
        }
        if(!$user_id){
            echo "<script>alert('Session expire Please Login.');location.href='../login-page/login.php'</script>";
            die;
        }
        $sql = "SELECT u.*,t.user_type as 'user_type_name' FROM user as u LEFT JOIN user_type as t on u.user_type = t.user_type_id WHERE user_id='$user_id'";
        $res = $conn->query($sql);
        $data = $res->fetch_assoc();

        // submit
        if(isset($_POST['username'])){
            $username = $_POST['username'];
            if($username == ''){
                $username = $data['username'];
                $username= htmlspecialchars(addslashes($username), ENT_QUOTES, 'UTF-8');
            }
            $email = $_POST['email'];
            if($email == ''){
                $email = $data["email"];
                $email= htmlspecialchars(addslashes($email), ENT_QUOTES, 'UTF-8');
            }
            $age = $_POST['age'];
            if($age == ''){
                $age = '0';
            }
            
            $gender = $_POST['gender'];
            $gender= htmlspecialchars(addslashes($gender), ENT_QUOTES, 'UTF-8');

            $update_sql = "UPDATE `user` SET `username`=\"$username\", `email`=\"$email\", `age`=\"$age\", `gender`=\"$gender\" WHERE `user_id`='$user_id'";
            // upload
            if(isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
                $file_tmp = $_FILES['profile_picture']['tmp_name']; // Temporary File Path
                $file_name = $_FILES['profile_picture']['name']; // filename

                // Specify the file upload directory
                $upload_dir = '../profile_picture/';
                // Setting the file path
                $picture = $upload_dir . $user_id . $file_name;
                // Moving files to the upload directory
                move_uploaded_file($file_tmp, $picture);
                
                $update_sql = "UPDATE `user` SET `username`=\"$username\", `email`=\"$email\", `age`=\"$age\", `gender`=\"$gender\", `picture`=\"$picture\" WHERE `user_id`='$user_id'";
            }

            
            
            try {
                $conn->query($update_sql);
                if($conn->error){
                    $msg = $conn->error;
                    echo "<script>alert('{$msg}');location.href='userpage.php'</script>";
                    die;
                } else {
                    //echo "<script>alert('Change successfully');location.href='userpage.php'</script>";
                    echo "<script>location.href='userpage.php'</script>";
                }

            } catch (\Exception $e) {
                $msg =  $e->getMessage();
                echo "<script>alert('{$msg}');location.href='userpage.php'</script>";
                die;
            }
        }
        
    ?>


        <!--content:-->
        <div class="content_container" >
            <div class="creater" >
                <i class="bx bx-chevron-down bx-rotate-90 left-btn returnBut" title="back to last page" alt="back to last page" onclick="backtolast()" ></i>
                <div class="showTitle" >
                    <h1>Profile</h1>
                    <!-- <p>Can uploads educational resource.</p>
                    <p>Thank you for contributing to equal educational opportunity!</p> -->
                </div>           
            </div>
            <div class="userinfo-container">
                <div class="user-nav">
                    <ul class="user-nav-list">
                        <li class="active"><a href="userpage.php">Profile</a></li>
                        <li><a href="bookmark.php">bookmark</a></li>
                        <li class=""><a href="news.php">news</a></li>
                    </ul>
                </div>
                <div class="user-right">
                    <div class="user-edit-info">
                        
                    <form class="user-form" onsubmit="return submit_user_edit()"  method="post" enctype="multipart/form-data">
                        <div class="user-form-item" >
                            <div class="img-container">
                                <!-- show user picture -->
                                <img src="<?php echo $data['picture']; ?>" alt="profile picture">
                                <!-- input picture -->
                                <input type="file" id="profile-pic" accept="image/*" name="profile_picture" onchange="changeProfilePicture(this)" alt="Change profile picture">
                            </div>
                                <div class="user-form-item">
                                    <label class="user-label">User Type：</label>
                                    <input class="user-form-input" style="box-shadow: 0 0 0 0;" name="user_type" value="<?php echo $data['user_type_name'] ?>" readonly />
                                </div>
                                <div class="user-form-item">
                                    <label class="user-label">Email：</label>
                                    <input class="user-form-input" name="email" value="<?php echo $data['email'] ?>" />
                                </div>
                                <div class="user-form-item">
                                    <label class="user-label">Age：</label><input class="user-form-input" name="age" value="<?php echo $data['age'] ?>" />
                                </div>
                                <div class="user-form-item">
                                    <label class="user-label">Gender：</label><input class="user-form-input" name="gender" value="<?php echo $data['gender'] ?>" />
                                </div>
                                <div class="user-form-item">
                                    <label class="user-label">Username：</label><input class="user-form-input" name="username" value="<?php echo $data['username'] ?>" />
                                </div>
                                <div class="user-form-item user-form-button">
                                    <button>SAVE</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php
        include("footer.php")
    ?>
    </body>
    <script src="jq.js"></script>
    <script src="script.js"></script>   
    <script src="submit.js"></script>
    <script>
    // JavaScript code to change the profile picture
    function changeProfilePicture(input) {
        const file = input.files[0]; // get upload picture
        if (file) {
            const reader = new FileReader(); // create a new FileReader object
            reader.onload = function(e) {
                const img = input.previousElementSibling; // get img element
                img.src = e.target.result; // upload picture resource  to data
            }
            reader.readAsDataURL(file); //read upload picture as data URL
        }
    }
</script>
</html>