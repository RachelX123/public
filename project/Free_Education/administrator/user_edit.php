<?php
session_start();
include('../db.php');
$username = isset($_SESSION["username"])?$_SESSION["username"]:'';
$user_id=isset($_SESSION["user_id"])?$_SESSION["user_id"]:'';
$user_type = isset($_SESSION["user_type"])?$_SESSION["user_type"]:'';
$id = isset($_GET['user'])?$_GET['user']:'';
$sql_update = "SELECT `user_type`,`user_password`,`email`,`username`,`age`,`gender`,`picture`
               FROM `user`
               WHERE `user_id` = '$id';";
$res=$conn->query($sql_update);
$update_content_list=[];
while($data=$res->fetch_assoc()){
    array_push($update_content_list,$data);
}


if(!$user_id){
    echo "<script>alert('Session expire Please Login.');location.href='../login-page/login.php'</script>";
    die;
}

$submit = isset($_POST['submit'])?$_POST['submit']:'';

//submit
if($submit){

    $username = isset($_POST['username'])?$_POST['username']:"$update_content_list[0]['username']";
    $username= htmlspecialchars(addslashes($username), ENT_QUOTES, 'UTF-8');
    $user_type = isset($_POST['user_type'])?$_POST['user_type']:"$update_content_list[0]['user_type']";
    $user_password = isset($_POST['user_password'])?$_POST['user_password']:"$update_content_list[0]['user_password']";
    $user_password= htmlspecialchars(addslashes($user_password), ENT_QUOTES, 'UTF-8');
    $email = isset($_POST['email'])?$_POST['email']:"$update_content_list[0]['email']";
    $email= htmlspecialchars(addslashes($email), ENT_QUOTES, 'UTF-8');
    $age = $_POST['age'];
    if($age == ''){
        $age = '0';
    }
    
    $gender = isset($_POST['gender'])?$_POST['gender']:$update_content_list[0]['gender'];
    $gender= htmlspecialchars(addslashes($gender), ENT_QUOTES, 'UTF-8');
    $picture = isset($_POST['file_input'])?$_POST['file_input']:$update_content_list[0]['picture'];
    if(isset($_FILES['file_input']) && $_FILES['file_input']['error'] === UPLOAD_ERR_OK) {
        $file_tmp = $_FILES['file_input']['tmp_name']; // Temporary File Path
        $file_name = $_FILES['file_input']['name']; // filename

        // Specify the file upload directory
        $upload_dir = '../profile_picture/';
        // Setting the file path
        $picture = $upload_dir . $user_id . $file_name;
        // Moving files to the upload directory
        move_uploaded_file($file_tmp, $picture);
        
    }
    $sql_update = "UPDATE `user` SET user_type = \"{$user_type}\", username = \"{$username}\", 
    user_password = \"{$user_password}\",email = \"{$email}\",age = \"{$age}\",gender = \"{$gender}\",picture = \"{$picture}\"
    WHERE user_id = $id";
    //echo $sql_update;
    //echo "<script>alert(age = '$age')'</script>";
    $ret=$conn->query($sql_update);
    header("Location: ../Content/successfully.php?type=user");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" >
        <meta name="viewport" content="width=device-width,initial-scale=1.0" >
        <title>EDIT</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Italianno&family=Itim&family=Jost&display=swap" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <link rel="stylesheet" href="../Content/style.css" >
    </head>
    <body>
    <?php
         include("header2.php");

        
    ?>


        <!--content:-->
        <div class="content_container" >
            <div class="creater" >
                <div class="showTitle" >
                    <h3>Creater</h3>
                    <p>Can edit educational resource.</p>
                    <p>Thank you for contributing to equal educational opportunity!</p>
                </div>
                <div class="form_container" >
                    <form class="update_form" action=""  method="post" enctype="multipart/form-data">
                        <!--text input: username-->
                        <label>username:</label>
                        <input type="text" id="username" name="username"  required="required" value="<?php echo $update_content_list[0]['username'] ?>">

                        <!--text input: User password-->
                        <label>user password:</label>
                        <input type="text" id="user_password" name="user_password"  required="required" value="<?php echo $update_content_list[0]['user_password'] ?>">
                        
                        <label>user type</label>
                        <select id="userTypeSelect" name="user_type" onchange="updateSelectedUserType()">
                            <option value="1" <?php if ($update_content_list[0]['user_type'] == 1) echo "selected"; ?>>STUDENT</option>
                            <option value="2" <?php if ($update_content_list[0]['user_type'] == 2) echo "selected"; ?>>TEACHER</option>
                            <option value="3" <?php if ($update_content_list[0]['user_type'] == 3) echo "selected"; ?>>CREATER</option>
                        </select>
                        <!--text imput: description:-->
                        <label>Email:</label>
                        <input type="text" id="email" name="email" value="<?php echo $update_content_list[0]['email'] ?>" />

                        <label>Age:</label>
                        <input type="text" id="age" name="age" value="<?php echo $update_content_list[0]['age'] ?>" />

                        <label>Gender:</label>
                        <input type="text" id="gender" name="gender" value="<?php echo $update_content_list[0]['gender'] ?>" />

                        <label>Picture:</label>                       
                        <div id="file_input_container" class="file_input_container" >
                            <span id="fileName"></span>
                            <label for="file_input" class="choosefilelabel">Browse</label>
                            <input type="file" id="file_input" name="file_input" class="file_input" onchange="chooseFileName()" >
                        </div>
                        <p>Click here to see original picture <a class="likeButton" href="<?php echo $update_content_list[0]['picture']; ?>" target="_blank">CHECK</a></p>


                        <div  class="sub">
                            <div class="twoBut" >
                                <button type="button" onclick="window.history.go(-1);" >CANCEL</button>
                            </div>
                            <div class="twoBut save">
                                <input id="submit" type="submit" name="submit" value="SAVE">
                            </div>
                            
                        </div>
                    </form>
                </div>
                
            </div>
        </div>

    <?php
            include("../Content/footer.php")
    ?>
    </body>
    <script src="../Content/jq.js"></script>
    <script src="../Content/script.js"></script>
    <script src="../Content/submit.js"></script>
</html>