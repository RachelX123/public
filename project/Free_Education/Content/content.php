<?php
session_start();
include('../db.php');
$username = isset($_SESSION["username"])?$_SESSION["username"]:'';
$user_id=isset($_SESSION["user_id"])?$_SESSION["user_id"]:'';
$user_type = isset($_SESSION["user_type"])?$_SESSION["user_type"]:'';
//resource details:
$resource_id = isset($_GET['resource'])?$_GET['resource']:'';

$sql_content = "SELECT
    `resource_id`, `source_type`, user.user_id as user_id,`username`,`resource_title`, `resource_topic`,`description`,`Input`,`picture`
    FROM `educational_reource`
    LEFT JOIN `user` ON user.user_id=educational_reource.user_id 
    WHERE resource_id= '$resource_id'";
//echo $sql_content ;
$res=$conn->query($sql_content);
$content_list=[];
while($data=$res->fetch_assoc()){
    array_push($content_list,$data);
}

$sql_bookmark = "SELECT * FROM `bookmark` WHERE resource_id = \"$resource_id\" AND user_id = \"$user_id\"";
$bookmark = $conn ->query($sql_bookmark);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" >
        <meta name="viewport" content="width=device-width,initial-scale=1.0" >
        <title>CONTENT</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Italianno&family=Itim&family=Jost&display=swap" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css" >
    </head>
    <body>
    <?php
        if($user_id){
            if($user_type != 4){
                include("header1.php");
            }else{
                include("../administrator/header2.php");
            }
        }else{
            include('header1.php');
        }
        
    ?>


        <!--content:-->
        <div class="content_container" >
            <i class="bx bx-chevron-down bx-rotate-90 left-btn returnBut" title="back to last page" alt="back to last page" onclick="backtolast()" ></i>

            <div class="resource_title" >
                <h1><?php echo $content_list[0]['resource_title']; ?></h1>
            </div>
            <div class="resource_container" >
                <!--bookmark:-->
                <div class="bookmark" >
                    <?php
                    if($bookmark && $bookmark->num_rows > 0){
                    ?>
                        <i class='bx bxs-bookmark-star' style='color:#FEBE10;' onclick="addBookmark(<?php echo $user_id; ?>, <?php echo $resource_id; ?>)" ></i>

                    <?php
                    }else{
                    ?>
                    <i class='bx bxs-bookmark-star' style='color:#d9d7d7;' onclick="addBookmark(<?php echo $user_id; ?>, <?php echo $resource_id; ?>)" ></i>
                    <?php
                    }
                    ?>
                    
                </div>

                <div class="resource_topic">
                    <?php if($content_list[0]['user_id'] == $user_id){ ?><p class="Mine" >My resource</p><?php } ?>
                    <p>Topic: <?php echo $content_list[0]['resource_topic'];?></p>
                </div>
                <div class="resource_box">
                    <?php
                    if($content_list[0]['source_type'] == 2){
                    ?>
                    <div class="text" ><?php echo stripslashes($content_list[0]['Input']); ?></div>
                    <?php
                    }else{
                    ?>
                    <iframe class="video" src="<?php echo $content_list[0]['Input']; ?>" frameborder="0" allowfullscreen></iframe>
                    <?php
                    }
                    ?>
                </div>
                <?php
                    if($content_list[0]['source_type'] == 3){
                    ?>
                        <p>reference: <a href="<?php echo $content_list[0]['Input']; ?>" ><?php echo $content_list[0]['Input']; ?></a></p>
                    <?php
                    }
                    ?>
                <div class="details" >
                    <div class="user" >
                        <div class="user_name"><?php echo $content_list[0]['username'] ?></div>
                        <div class="user_pic">
                            <img  src="<?php echo $content_list[0]['picture']; ?>" alt="profile picture">
                        </div>
                    </div>
                    <div class="description" ><?php echo stripslashes($content_list[0]['description']); ?></div>
                </div>  
                    
                
            </div>

            

            
            
            <?php
             //get user_comment
             $sql_user_comment="SELECT m.*,u.username FROM review as m LEFT JOIN user AS u on u.user_id=m.user_id WHERE resource_id= $resource_id";
             $res=$conn->query($sql_user_comment);
             $user_comment_list=[];
             while($data=$res->fetch_assoc()){
                 array_push($user_comment_list,$data);
             }
            ?>

            <!--comment-->
            <div class="comment_container">
                    <div class="comment_title">Comment</div>
                    <?php
                    include('comment.php'); 
                    ?>
            </div>
        </div>

    <?php
            include("footer.php")
    ?>
    </body>
    <script src="jq.js"></script>
    <script src="script.js"></script>   
    <script src="submit.js"></script>
</html>