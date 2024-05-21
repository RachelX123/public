<?php
session_start();
$b_id = $_GET['id'];
$title = $_GET['title'];
$username = $_SESSION['username'];
$user_type = $_SESSION['user_type'];
$do = $_GET['do'];
$user_id = $_SESSION['user_id'];
$bresult = $_GET['bresult'];
$uresult = $_GET['uresult'];
$conn = mysqli_connect('mxiao02.webhosting2.eeecs.qub.ac.uk', 'mxiao02', 'm497XYh1nGWbHK3m', 'mxiao02'); //connection
if (isset($_POST['DELRE'])) {
    $rid = $_POST['id'];
    $conn = mysqli_connect('mxiao02.webhosting2.eeecs.qub.ac.uk', 'mxiao02', 'm497XYh1nGWbHK3m', 'mxiao02');
    $delect_sql = "DELETE FROM `comment` WHERE id = $rid";
    $delect = $conn->query($delect_sql);
    $delect = $conn->query($delect_sql);
    header("Location:edit.php?uresult=suc");
}
$re_sql = "SELECT comment.b_id, author.author,project.publishedDate, comment.comment, comment.date,comment.id, pr2userSystem.username
FROM project
INNER JOIN comment ON project.b_id=comment.b_id
INNER JOIN author ON project.authors = author.author_id
INNER JOIN pr2userSystem ON comment.user_id = pr2userSystem.user_id
WHERE project.b_id = $b_id";
$get = $conn->query($re_sql);
$get_db = array();
while ($datarow = $get->fetch_assoc()) {
    array_push($get_db, $datarow);
}

//echo $title;
//echo $id;


//echo "$do"; for check

if (!empty($user_id) & $user_type==1) {


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

        <!--contain-->
        <div id="container" class="row">



            <div class="col m12" id="showgener">

                <h4>&emsp;&emsp;&emsp;<?php echo "Welcome Administrator: $username" ?></h4>

                <a>&emsp;&emsp;&emsp;&emsp;&emsp;</a><a href="javascript:history.go(-1);"><button>Back</button></a>

                <?php
                if ($do == 'addbook' || $do == 'addGen' || $do == 'editbook' || $do == 'editGen' || $do == 'delect' || $do == 'forbook' || $bresult == 'suc' || $bresult == 'fal') {
                ?>
                    <div class="row">
                        <div class="col m1"> </div>
                        <div class="col m11">
                            <h5>&nbsp FOR BOOK:</h5>
                            <a>&emsp; &emsp; &emsp; &emsp;</a>
                            <button><a href="edit.php?do=addbook">ADD BOOK</a></button>
                            <a>&emsp; &emsp; &emsp; &emsp;</a>
                            <button><a href="edit.php?do=addGen">ADD GENRE</a></button>
                            <a>&emsp; &emsp; &emsp; &emsp;</a>
                            <button><a href="edit.php?do=editbook">EDITED BOOK</a></button>
                            <a>&emsp; &emsp; &emsp; &emsp;</a>
                            <button><a href="edit.php?do=editGen">EDITED GENRE</a></button>
                            <a>&emsp; &emsp; &emsp; &emsp;</a>
                            <button><a href="edit.php?do=delect">DELECT BOOK</a></button>
                        </div>
                    </div>

                <?php
                }
                if ($do == 'account' || $do == 'review' || $do == 'manage' || $uresult == 'suc' || $uresult == 'fal') {
                ?>
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
                <?php
                } ?>

            </div>
        </div>

        </div>



        <?php
        if ($do == 'review') {
        ?>
            <div class="row">
                <div class="col m1"></div>
                <div class="col m11">
                    <p><b><?php echo $title ?>: &emsp;</b></p>
                    <div class="row">
                        <div class="col m12">
                            <div class="col m3"><b>USERNAME</b></div>
                            <div class="col m4"><b>COMMENT</b></div>
                            <div class="col m2"><b> TIME</b></div>
                        </div>
                    </div>
                    <?php
                    //show book:
                    foreach ($get_db as $row) {
                        $reid = $row['id'];
                        $uname = $row['username'];
                        $comment = $row['comment'];
                        $date = $row['date'];
                    ?>
                        <div class="row">
                            <div class="col m12">
                                <hr />
                                <div class="col m3"><?php echo "$uname" ?></div>
                                <div class="col m4"><?php echo "$comment" ?></div>
                                <div class="col m2"><?php echo "$date" ?></div>
                                <form action="" method="POST">
                                    <input name="id" value="<?php echo $reid ?>" style="display: none;">
                                    <input name="DELRE" type="submit" value="DELECT" style="background-color:brown; color:cornsilk;">
                                </form>
                                <br>
                            </div>
                        </div>

                    <?php
                    }
                    ?>
                </div>
            </div>

        <?php
        }


        ?>



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