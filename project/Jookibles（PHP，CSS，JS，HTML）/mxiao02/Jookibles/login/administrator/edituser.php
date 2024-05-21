<?php
session_start();
$username1 = $_SESSION['username'];
$do = $_GET['do'];
$user_id = $_SESSION['user_id']; //administrator
$userid = $_GET['id']; //user id 
//echo "$b_id";



if (!empty($user_id)) {
    if (isset($_POST['submit'])) {
        $eusername = $_POST['eusername'];
        $epassword = $_POST['epassword'];
        $eauthority = $_POST['eau'];
        $eemail = $_POST['email'];
        echo $conn->error;
        $conn = mysqli_connect('mxiao02.webhosting2.eeecs.qub.ac.uk', 'mxiao02', 'm497XYh1nGWbHK3m', 'mxiao02');
        if ($eauthority == "RUNNING") {
            $au = '1';
        }
        if ($eauthority == "BLOCK") {
            $au = '2';
        }
        $update_sql = "UPDATE `pr2userSystem` SET `username`='$eusername',`password`='$epassword',`email`='$eemail',`authority`=$au WHERE `user_id` = $userid ";
        //echo $update_sql."<br>";
        $conn->query($update_sql);
        //echo $conn->error;
        //exit(-1);
        header("Location:edit.php?uresult=suc");
    }

    //echo $userid."<br>";
    $conn = mysqli_connect('mxiao02.webhosting2.eeecs.qub.ac.uk', 'mxiao02', 'm497XYh1nGWbHK3m', 'mxiao02');
    $user_sql = "SELECT username, password,authority.authority, email FROM pr2userSystem 
    INNER JOIN authority ON pr2userSystem.authority = authority.id
    WHERE `user_id`=$userid";
    $get_user = $conn->query($user_sql);
    echo $conn->error;
    $get_db = array();
    while ($datarowALL = $get_user->fetch_assoc()) {
        array_push($get_db, $datarowALL);
    }
    $username = $get_db[0]['username'];
    $password = $get_db[0]['password'];
    $authority = $get_db[0]['authority'];
    $email = $get_db[0]['email'];


?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
        <link rel="stylesheet" type="text/css" href="https://rawgit.com/outboxcraft/beauter/master/beauter.min.css" />
        <script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>
        <link rel="stylesheet" type="text/css" href="CSS/ui.css" />
        <link rel="shortcut icon" href=" img/open-book.png" title="Icons made by Freepik from https://www.freepik.com" type="image/x-icon">
        <title>Jookibles</title>
    </head>

    <body>
        <!--navigation-->
        <?php
        include("naviforAd.php");
        ?>


        <!--contianer:-->

        <div id="container" class="row">

            <div class="col m12" id="showgener">
                <h4>&emsp;&emsp;&emsp;<?php echo "Welcome Administrator: $username1" ?></h4>

                <a>&emsp;&emsp;&emsp;&emsp;&emsp;</a><a href="javascript:history.go(-1);"><button>Back</button></a>
                <div class="row">
                    <div class="col m1"> </div>
                    <div class="col m10">
                        <h5>&nbsp MANAGE:</h5>
                        <a>&emsp; &emsp; &emsp; &emsp;</a>
                        <button><a href="edit.php?do=account">ACCOUNT</a></button>
                        <a>&emsp; &emsp; &emsp; &emsp;</a>
                        <button><a href="edit.php?do=review">REVIEW</a></button>
                    </div>
                </div>

                <div class="row">
                    <div class="col m12">
                        <div class="row m12">
                            <div class="col m1"></div>
                            <div class="col m11">
                                <div class="col m2"><b>USERNAME</b></div>
                                <div class="col m3"><b>PASSWORD</b></div>
                                <div class="col m3"><b>email</b></div>
                                <div class="col m3"><b>AUTHORITY</b></div>

                            </div>
                        </div>
                        <div class="row m12">
                            <div class="col m1"></div>
                            <form action="" method="POST" name="form" class="col m11">
                                <div class="col m2"><input id="box" type="text" value="<?php echo $username ?>" required="required" name="eusername"></div>
                                <div class="col m3"><input id="box" type="text" value="<?php echo $password ?>" required="required" name="epassword"></div>
                                <div class="col m3"><input id="box" type="text" value="<?php echo $email ?>" required="required" name="email"></div>
                                <div class="col m3"><select class=" m6" name="eau" value="<?php echo $authority ?>">
                                        <option value="RUNNING">RUNNING</option>
                                        <option value="BLOCK">BLOCK</option>
                                    </select></div>
                        </div>
                        <div class="row">
                            <a class="col m4"></a><input type="submit" value="EDIT" name="submit" class="col m3">
                        </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>




        <!--footer-->
        <footer id="mainfooter">

            <ul style="list-style-type: none">
                <li>
                    <p>email:mxiao02@qub.ac.uk</p>
                </li>
                <li>
                    <p>
                    <p>phone:11111111</p>
                    </p>
                </li>
                <li>
                    <div class="right">Icons made by <a href="https://www.freepik.com" title="Freepik">Freepik</a> from
                        <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a>
                    </div>
                </li>
                <li>
                    <div><a>Welcom to contack us !</a></div>
                </li>
            </ul>

        </footer>
    </body>


    </html>


<?php

} else {
    header('Location:../login/login-register.php');
}


?>