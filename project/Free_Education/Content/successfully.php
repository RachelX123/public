<?php
session_start();
include('../db.php');
$username = isset($_SESSION["username"])?$_SESSION["username"]:'';
$user_id=isset($_SESSION["user_id"])?$_SESSION["user_id"]:'';
$user_type = isset($_SESSION["user_type"])?$_SESSION["user_type"]:'';

$type = isset($_GET['type'])?$_GET['type']:'';
$resource_id = isset($_GET['resource_id'])?$_GET['resource_id']:'';

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" >
        <meta name="viewport" content="width=device-width,initial-scale=1.0" >
        <title>Successfully</title>
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
            include('header1.php');
        }
        
    ?>

    <!--content-->
    <div class="content_container" >
        <?php
        // success for upload resource:
        if($type=='upload'){
        ?>
        <div>
            
            <div class="showMo">
                <p class="succ" >RESOURCE ADD SUCCESSFULLY!!!</p>
            </div>
            <div class="content_container" >
                <p class="succ">THANK YOU FOR YOUR CONTRIBUTION TO EQUALITY IN EDUCATION</p>
                <br/>
                <p>YOU CAN CLICK THE LINK TO SEE THE RESOURCE YOU HAVE UPLOAD</p>
                <p><a href='content.php?resource=<?php echo $resource_id; ?>'>CONTENT.PAGE</a></p>
                <br/>
                <p><a href='index.php'>GO TO THE HOME PAGE</a></p>
                <p><a href='creater.php'>BACK TO UPLOAD A NEW FILE</a></p>
                
            </div>
        </div>
        <?php
        }else if($type=='edit'){
            ?>
            <div>
            
            <div class="showMo">
                <p class="succ" >RESOURCE EDIT SUCCESSFULLY!!!</p>
            </div>
            <div class="content_container" >
                <p class="succ">THANK YOU FOR YOUR CONTRIBUTION TO EQUALITY IN EDUCATION</p>
                <br/>
                <p>YOU CAN CLICK THE LINK TO SEE THE RESOURCE YOU EDIT</p>
                <p><a href='content.php?resource=<?php echo $resource_id; ?>'>CONTENT.PAGE</a></p>
                <br/>
                
                <?php if($user_type !=4){?>
                    <p><a href='manage.php'>BACK TO EDIT OTHER FILE</a></p>
                    <p><a href='index.php'>GO TO THE HOME PAGE</a></p>
                <?php
                }else{?>
                    <p><a href='../administrator/index.php'>BACK TO MANAGE OTHER FILE</a></p>
                <?php
                } ?>
            </div>
        </div>
        <?php
        }else if($type=='user'){
        ?>
        <div class="showMo">
                <p class="succ" >USER EDIT SUCCESSFULLY!!!</p>
            </div>
            <div class="content_container" >
                <p class="succ">THANK YOU FOR YOUR CONTRIBUTION TO EQUALITY IN EDUCATION</p>
                <br/>
                <p>YOU CAN CLICK THE LINK TO SEE THE RESOURCE YOU HAVE UPLOAD</p>
                <br/>
                <p><a href='../administrator/user.php'>BACK TO MANAGE OTHER USER</a></p>
            </div>
        <?php
        }
        ?>
    </div>

    <?php
            include("footer.php")
    ?>
    </body>
</html>
