<?php 
session_start();
include('../db.php');

$kw = isset($_GET['kw'])?$_GET['kw']:'';

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
       
        if($kw){
            $sql_user_bookmark = "SELECT bookmark.`resource_id`,`resource_title`,`cover_of_resource`
            FROM `bookmark` LEFT JOIN `educational_reource` on bookmark.resource_id = educational_reource.resource_id
            left join module_l1 as m1 on m1.module_id=educational_reource.Module_id 
            left join module_l2 as m2 on educational_reource.moduleL2_id = m2.moduleL2_id
            left join user as user on educational_reource.user_id = user.user_id
            WHERE ((resource_title LIKE '%$kw%') OR (m1.`module_name` LIKE '%$kw%') 
            OR (m2.`module_name` LIKE '%$kw%') OR (username LIKE '%$kw%') OR (bookmark.date LIKE '%$kw%')
            OR (resource_topic LIKE '%$kw%') OR (description LIKE '%$kw%')) 
            AND bookmark.user_id = \"$user_id\" order by bookmark.`date` desc";
        }else{
            $sql_user_bookmark="SELECT bookmark.`resource_id`,`resource_title`,`cover_of_resource`
            FROM `bookmark` LEFT JOIN `educational_reource` on bookmark.resource_id = educational_reource.resource_id 
            WHERE bookmark.user_id = \"$user_id\" order by bookmark.`date` desc";
        }
        
        $res=$conn->query($sql_user_bookmark);
        $user_bookmark=[];
        while($data=$res->fetch_assoc()){
             array_push($user_bookmark,$data);
        }
       
    ?>


        <!--content:-->
        <div class="content_container" >
            <div class="creater" >
            <i class="bx bx-chevron-down bx-rotate-90 left-btn returnBut" title="back to last page" alt="back to last page" onclick="backtolast()" ></i>
                <div class="showTitle" >
                    <h1>Bookmark</h1>
                    <!-- <p>Can uploads educational resource.</p>
                    <p>Thank you for contributing to equal educational opportunity!</p> -->
                </div>           
            </div>
            <div class="userinfo-container">
                <div class="user-nav">
                    <ul class="user-nav-list">
                        <li><a href="userpage.php">Profile</a></li>
                        <li class="active"><a href="bookmark.php">bookmark</a></li>
                        <li><a href="news.php">news</a></li>
                    </ul>
                </div>
                <div class="user-right">
                    <div class="rightCol" >
                        <div class="center" >
                                <form action="bookmark.php" class="search_bar" method="GET">
                                    <i class='bx bx-search' id="bar"><input id="search" type="submit" name="submit"></i>
                                    <input class="input_field" style="box-shadow: 0 0 0 0;" name="kw" type="search" placeholder="Search by Keyword" required="required"> 
                                </form>
                            </div>
                        <div class=" canvas" >
                            
                            <?php
                            if ($res && $res->num_rows > 0) {
                            ?>
                                <?php foreach($user_bookmark as $val){
                                ?>
                                    <div class="canvas_item1" onclick="canvasTo('content.php?resource=<?php echo $val['resource_id'] ?>')">
                                        <img src="<?php echo $val['cover_of_resource']; ?>"/>
                                        <div class="Modname">
                                            <p><?php echo $val['resource_title'] ?></p>
                                        </div>
                                    </div>
                                    
                                <?php
                                }
                            }else{
                            ?>
                                <p>no relative resource</p>
                            <?php
                            }
                            ?>
                            
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
    <script src="submit.js"></script>
</html>