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
        <title>news</title>
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
       
        $sql_user_new="SELECT m.news_id,m.forum_id as id, m.forum_pid as pid, m.type, m.user_id, m.ask_user_id, m.comment, 
        m.date,u.username,\" \" as resource_id FROM forum_news as m LEFT JOIN user AS u on u.user_id=m.ask_user_id 
        where m.ask_user_id ='$user_id' and `status`=1 UNION SELECT m.news_id,m.review_id as id, m.review_pid as pid, 
        \"resource\" as type, m.user_id, m.ask_user_id, m.comment, m.date,u.username,m.resource_id FROM review_news as m 
        LEFT JOIN user AS u on u.user_id=m.ask_user_id where m.ask_user_id ='$user_id' and `status`=1 order by `date` desc";
        $res=$conn->query($sql_user_new);
        $user_new_list=[];
        while($data=$res->fetch_assoc()){
             array_push($user_new_list,$data);
        }
       
    ?>


        <!--content:-->
        <div class="content_container" >
            <div class="creater" >
            <i class="bx bx-chevron-down bx-rotate-90 left-btn returnBut" title="back to last page" alt="back to last page" onclick="backtolast()" ></i>
                <div class="showTitle" >
                    <h1>News</h1>
                    <!-- <p>Can uploads educational resource.</p>
                    <p>Thank you for contributing to equal educational opportunity!</p> -->
                </div>           
            </div>
            <div class="userinfo-container">
                <div class="user-nav">
                    <ul class="user-nav-list">
                        <li><a href="userpage.php">Profile</a></li>
                        <li><a href="bookmark.php">bookmark</a></li>
                        <li class="active"><a href="news.php">news</a></li>
                    </ul>
                </div>
                <div class="user-right">
                    <div class="news-list">
                    <?php foreach($user_new_list as $val){?>
                        <div class="news-item" onclick="
                            <?php if($val['type']=='resource'){?>  read_news_resource('<?php echo $val['resource_id'];?>',<?php echo $val['id'];?>,<?php echo $val['news_id'];?>  <?php 
                            }else{ ?>read_news('<?php echo $val['type'];?>',<?php echo $val['id'];?>,<?php echo $val['news_id'];}?>)">
                            <div class="news-title">
                                <div class="img"><i  class="bx bx-user-circle user_icon"></i></div>
                                <div class="username"><?php echo  $val['username'];?></div>
                                <div class="huifu">Replied to my comment</div>
                                <div class="boths"></div>
                                </div>
                            <div class="news-content"><?php echo  $val['comment'];?></div>
                            <div class="news-butom"><?php echo  $val['date'];?></div>
                        </div>
                        <?php } ?>
                        <?php if(count($user_new_list)==0 ){  ?>
                            <h3>NO NEW MESSAGE</h3>
                            <?php } ?>
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
</html>