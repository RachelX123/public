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
        <title>CREATER</title>
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
                include("header2.php");
            }
        }else{
            include('header1.php');
        }
        
    ?>

        <!--content:-->
        <div class="content_container" >
            <div class="creater" >
                <i class="bx bx-chevron-down bx-rotate-90 left-btn returnBut" title="back to last page" alt="back to last page" onclick="backtolast()" ></i>
                <div class="showTitle" >
                    <h3>Creater</h3>
                    <p>Can uploads and manage educational resource.</p>
                    <p>Thank you for contributing to equal educational opportunity!</p>
                </div>
                <div class="creater_function">
                    <!--manager-->
                    <div class="function_item" onclick="checkAndRedirect('manage.php')">
                        <img src="file-management.png" />
                        <div class="Modname">
                            <p>MANAGE RESOURCE</p>
                        </div>
                    </div>
                    <!--upload-->
                    <div class="function_item" onclick="checkAndRedirect('upload.php')">
                        <img src="upload1.png"/>
                        <div class="Modname">
                            <p>UPLOAD RESOURCE</p>
                        </div>
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
</html>