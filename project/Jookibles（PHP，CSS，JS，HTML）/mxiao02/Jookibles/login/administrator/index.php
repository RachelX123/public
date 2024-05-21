<?php
session_start();
$username = $_SESSION['username'];
$user_id = $_SESSION['user_id'];
?>
<?php
if (!empty($username)) {
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
        <!--navigation-->
        <?php
        include("naviforAd.php");
        ?>

        <!--contain-->
        <div id="container" class="row">
            <div class="col m12" id="showgener">
                <div class="row">
                    <h4>&emsp;&emsp;&emsp;<?php echo "Welcome Administrator: $username" ?></h4>
                </div>
                <div class="row">
                <a>&emsp;&emsp;&emsp;&emsp;&emsp;</a><a href="javascript:history.go(-1);"><button>Back</button></a>
                </div>
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