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
        <title>HOME</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Italianno&family=Itim&family=Jost&display=swap" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css" >
    </head>
    <body>
    <?php
        if($user_id!=''){
            if($user_type != 4){
                include("header1.php");
            }else{
                include("../administrator/header2.php");
            }
        }else{
            include("header1.php");
        }
        
        ?>

        <!--wall-->
        <div class="wall_container">
            <i class="bx bx-chevron-down bx-rotate-90 wall-btn left-btn" onclick="wallsc(-1)"></i>
            <div class="wall"> <!--to show news link about the study-->
                <div class="wall-item"><a href="https://www.researchgate.net/journal/Education-and-Information-Technologies-1573-7608?_tp=eyJjb250ZXh0Ijp7ImZpcnN0UGFnZSI6Il9kaXJlY3QiLCJwYWdlIjoiX2RpcmVjdCJ9fQ"><img src="https://www.researchgate.net/publication/362642757/figure/fig2/AS:11431281122336189@1677294516772/Sustainable-Development-Goal-SDG-4-and-its-components-for-education.png" alt="Slide 1" ></a></div>
                <div class="wall-item"><a href="https://www.holoniq.com/notes/sdg4-sdg4-mapping-momentum-to-2030"><img src="https://assets-global.website-files.com/620ed79721f9271deec09721/6231c2b8709a847c625c26f5_Screenshot-2020-01-21-15.17.55-1024x575.png" /></a></div>
                <div class="wall-item"><a href="https://news.un.org/en/tags/sdg4"><img src="https://www.globaleducationappg.co.uk/wp-content/uploads/2023/08/SDG-4-logo-980x463.jpeg" /></a></div>
                <!-- Add more canvas items as needed -->
            </div>
            <i class="bx bx-chevron-down bx-rotate-270 wall-btn right-btn" onclick="wallsc(1)"></i>
        </div>
        <!--canvas-->
        <div class="canvas" >
            <div class="canvas_item" onclick="canvasTo('modules.php?module1=Language')">
                <img src="dil_1_OLHP_786x400.jpg"/>
                <div class="Modname">
                    <p>Language</p>
                </div>
            </div>
            <div class="canvas_item" onclick="canvasTo('modules.php?module1=Mathematics')">
                <img src="https://sjcit.ac.in/wp-content/uploads/2022/03/mathematics-png.jpg"/>
                <div class="Modname">
                    <p>Mathematics</p>
                </div>
            </div>
            <div class="canvas_item" onclick="canvasTo('modules.php?module1=Science')">
                <img src="https://img.freepik.com/free-vector/hand-drawn-science-education-background_23-2148499325.jpg?w=996&t=st=1704691318~exp=1704691918~hmac=d00b56b0e52394f07a9270982f302c7818c95af1bd1b917a7222e9b9bafd0139"/>
                <div class="Modname">
                    <p>Science</p>
                </div>
            </div>
            <div class="canvas_item" onclick="canvasTo('modules.php?module1=Social%20Science')">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRxuFz6ReX32qBEZwiFmOpTuppheE0WEitRFFEPX2bHDc_fwSWy2wAZqVTwqXE-hwfG3jU&usqp=CAU"/>
                <div class="Modname">
                    <p>Social Science</p>
                </div>
            </div>
            <div class="canvas_item" onclick="canvasTo('modules.php?module1=Information%20%26%20News')">
                <img src="https://blogger.googleusercontent.com/img/a/AVvXsEih3iPrcVg8MrQLzrIeqqogrNj_mNhq-sEaPQQeq8735Q5yap9nCEp_239_doI-sALHIlTxqfYDoWtGwk4dr5B4V-idCvJGSwvTsBc1crIX25pkWfuE7xtnXi8qFhEldAWzYys1mA2_KnIhDPZSe5SAZqHaHB5FfeRoBU5CXqu3W2fSLrpyr_yPp_Va=s16000"/>
                <div class="Modname">
                    <p>Information & News</p>
                </div>
            </div>
            <div class="canvas_item" onclick="canvasTo('modules.php?module1=Personal%20growth')">
                <img src="https://unlockedpotentials.com/wp-content/uploads/2022/10/life-coach-in-dubai.jpg"/>
                <div class="Modname">
                    <p>Presonal growth</p>
                </div>
            </div>
        </div>

        <!--footer-->
        <?php
            include("footer.php")
        ?>
        <script src="script.js"></script>
    </body>
</html>