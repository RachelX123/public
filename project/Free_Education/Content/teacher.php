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
        <title>TEACHER FORUM</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Italianno&family=Itim&family=Jost&display=swap" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css" >
    </head>
    <body>
    <?php
        function buildCategoryTree(array $categories, $parentId = '0') {
            $branch = array();
         
            foreach ($categories as $category) {
                if ($category['forum_pid'] == $parentId) {
                    $children = buildCategoryTree($categories, $category['forum_id']);
                    if ($children&&$parentId==0) {
                        $category['children'] = $children;
                    }else{
                        foreach ($children as $c) {
                            $branch[]= $c;
                        }
                    }
                    $branch[] = $category;
                }
            }
         
            return $branch;
        }
        if(isset($user_id)){
            if($user_type != 4){
                include("header1.php");
            }else{
                include("../administrator/header2.php");
            }
        }else{
            include('header1.php');
        }
        //get user_comment
        $sql_user_forum="SELECT m.*,u.username, u.picture, t.user_type FROM forum as m LEFT JOIN user AS u on u.user_id=m.user_id LEFT JOIN user_type As t on u.user_type = t.user_type_id where `type`='teacher' ORDER BY forum_id asc";
        $res=$conn->query($sql_user_forum);
        $user_forum_list=[];
        while($data=$res->fetch_assoc()){

            $like_sql="SELECT * from forum_like_dislike where `type`='like' and `user_id`='{$user_id}' and `forum_id`='{$data['forum_id']}'";
            $res_like=$conn->query($like_sql);
            if($res_like->fetch_assoc()){
                $data['like']=1;
            }else{
                $data['like']=0;
            }


            $like_sql="SELECT * from forum_like_dislike where `type`='dislike' and `user_id`='{$user_id}' and `forum_id`='{$data['forum_id']}'";
            $res_like=$conn->query($like_sql);
            if($res_like->fetch_assoc()){
                $data['dislike']=1;
            }else{
                $data['dislike']=0;
            }

           if($data['forum_pid']>0){
            $top="SELECT * from `forum` where forum_id={$data['forum_pid']}";
            $tops=$conn->query($top);
            $topa=$tops->fetch_assoc();
            if(!isset($topa['forum_pid'])){
                continue; 
            }
            if($topa['forum_pid']!=0){
            $sql="SELECT u.user_id,u.username,u.picture, t.user_type from `forum` as f left Join user as u on u.user_id=f.user_id left join user_type as t on u.user_type = t.user_type_id where forum_id={$data['forum_pid']}";
            $user=$conn->query($sql);
            $user_data=$user->fetch_assoc();
            $data['user']=$user_data;
            }
        }
            array_push($user_forum_list,$data);
        }
        $user_forum_list=buildCategoryTree($user_forum_list,0);
        foreach($user_forum_list as $k => $item){
            if(isset($user_forum_list[$k]['children'])){
                $user_forum_list[$k]['children']=array_reverse($user_forum_list[$k]['children']);
            }
            
         }
       // var_dump($user_forum_list);
    ?>


        <!--content:-->
        <div class="content_container" >
            <div class="creater" >
                <i class="bx bx-chevron-down bx-rotate-90 left-btn returnBut" title="back to last page" alt="back to last page" onclick="backtolast()" ></i>
                <div class="showTitle" >
                    <h3>Teacher Forum</h3>
                    <p>Welcome to discuss teacher-related content in this forum</p>
                    <p>Hopefully it will help the teacher community help each other</p>
                </div>           
                <!--  -->           
            </div>
            <div class="forum-container">
                <div class="forum-list">
                    <?php foreach($user_forum_list as $item) {
                        if($item['forum_pid']==0){
                        ?>
                    <div class="forum-item  forum-item-zhu">
                        <div class="forum-zhuconten">
                            <div class="user-img user less_margin">
                                <div class="user_pic">
                                    <img  src="<?php echo $item['picture']; ?>" alt="profile picture">
                                </div>
                            </div>
                            <div class="user-forum">
                                <h2 class="username"><?php echo $item['username']; ?><a> </a><a class="user_type" ><?php echo $item['user_type']; ?></a></h2>
                                <div class="all_content" >
                                    <div class="text-content">
                                        <div class="content" ><?php echo $item['comment']; ?></div>
                                        <div class="ico">
                                            <i onclick="toLike(<?php echo $item['forum_id'];?>)"  class="bx <?php 
                                                    if($item['like']==1){
                                                        echo "bxs-like";
                                                    }else{
                                                        echo "bx-like";
                                                    }
                                                    ?>"></i>
                                            <i onclick="toDislike(<?php echo $item['forum_id'];?>)"  class="bx <?php 
                                                    if($item['dislike']==1){
                                                        echo "bxs-dislike";
                                                    }else{
                                                        echo "bx-dislike";
                                                    }
                                                    ?>"></i>
                                            <i onclick="toSend(<?php echo $item['forum_id'];?>)"  class="bx bx-send"></i>
                                        </div>
                                    </div>
                                    <div class="remove" onclick="removeItem('<?php echo $item['forum_id']; ?>','forum')" style="<?php if($item['user_id'] != $user_id) echo 'visibility: hidden;' ?>" >
                                        <p>REMOVE</p>
                                    </div>
                            </div>
                            
                        </div>
                        
                    </div>
                        <!-- comment -->
                        <?php if(isset($item['children'])){?>
                        <div class="forum-list-huifu">
                            <?php foreach($item['children'] as $items) {?>
                                <div class="forum-item" id="<?php echo $items['type'].$items['forum_id'];?>">
                                    <div class="forum-zhuconten">
                                        <div class="user-img user less_margin">
                                            <div class="user_pic">
                                                <img  src="<?php echo $items['picture']; ?>" alt="profile picture">
                                            </div>
                                        </div>
                                        <div class="user-forum">
                                            <h2 class="username"><?php echo $items['username'];?><a> </a><a class="user_type" ><?php echo $items['user_type']; ?></a>  <?php if(isset($items['user'])){?>reply @ <?php echo $items['user']['username'];?><a> </a><a class="user_type" ><?php echo $items['user']['user_type']; ?></a><?php } ?></h2>
                                            <div class="all_content" >
                                                <div class="text-content">
                                                    <div class="content" ><?php echo $items['comment'];?></div>
                                                    <div class="ico">
                                                    <i onclick="toLike(<?php echo $items['forum_id'];?>)"  class="bx <?php 
                                                    if($items['like']==1){
                                                        echo "bxs-like";
                                                    }else{
                                                        echo "bx-like";
                                                    }
                                                    ?>"></i>
                                                    <i onclick="toDislike(<?php echo $items['forum_id'];?>)"  class="bx <?php 
                                                    if($items['dislike']==1){
                                                        echo "bxs-dislike";
                                                    }else{
                                                        echo "bx-dislike";
                                                    }
                                                    ?>"></i>
                                                    <i onclick="toSend(<?php echo $items['forum_id'];?>)"  class="bx bx-send"></i>
                                                    </div>
                                                </div>
                                                <div class="remove" onclick="removeItem('<?php echo $items['forum_id']; ?>','forum')" style="<?php if($items['user_id'] != $user_id) echo 'visibility: hidden;' ?>">
                                                    <p>REMOVE</p>
                                                </div>

                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                                <?php if(isset($items['children'])){?>
                                    <?php foreach($items['children'] as $itemss) {?>
                                        <div class="forum-item">
                                            <div class="forum-zhuconten">
                                                <div class="user-img user less_margin">
                                                    <div class="user_pic">
                                                        <img  src="<?php echo $itemss['picture']; ?>" alt="profile picture">
                                                    </div>
                                                </div>
                                                <div class="user-forum">
                                                    <h2 class="username"><?php echo $itemss['username'];?><a> </a><a class="user_type" ><?php echo $itemss['user_type']; ?></a></h2>
                                                    <div class="all_content" >
                                                        <div class="text-content">
                                                            <div class="content" ><?php echo $itemss['comment'];?></div>
                                                            <div class="ico">
                                                            <i onclick="toLike(<?php echo $itemss['forum_id'];?>)"  class="bx bx-like"></i>
                                                            <i onclick="toDislike(<?php echo $itemss['forum_id'];?>)"  class="bx bx-dislike"></i>
                                                            <i onclick="toSend(<?php echo $itemss['forum_id'];?>)"  class="bx bx-send"></i>
                                                            </div>
                                                        </div>
                                                        <div class="remove" onclick="removeItem('<?php echo $itemss['forum_id']; ?>','forum')" style="<?php if($itemss['user_id'] != $user_id) 'visibility: hidden;' ?>">
                                                            <p>REMOVE</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    <?php }?>
                                <?php }?>
                            <?php } ?>
                            <!-- <div class="forum-item">
                                <div class="forum-zhuconten">
                                    <div class="user-img">
                                        <i  class="bx bx-user-circle user_icon"></i>
                                    </div>
                                    <div class="user-forum">
                                        <h2 class="username">username</h2>
                                        <div class="text-content">
                                            zhshihi h fafafzhshihi h fafafzhshihi h fafafzhshihi h fafafzhshihi h fafafzhshihi h fafafzhshihi h fafafzhshihi h fafafzhshihi h fafafzhshihi h fafafzhshihi h fafafzhshihi h fafafzhshihi h fafafzhshihi h fafafzhshihi h fafafzhshihi h fafafzhshihi h fafafzhshihi h fafafzhshihi h fafaf
                                            <div class="ico">
                                                <i  class="bx bx-like"></i>
                                                <i  class="bx bx-dislike"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <?php }?>
                    </div>
                    <?php }}?>
                </div>
                <?php
                if($user_id!=''){
                    $sql = "SELECT `picture` FROM user WHERE user_id='$user_id'";
                    $res = $conn->query($sql);
                    $data = $res->fetch_assoc();
                    $picture = $data['picture'];
                }else{
                    $picture="../profile_picture/user.webp";
                }
                
                ?>
                <div class="forum-submint ">
                    <form class="forum-submint-form"  onsubmit="return submit_forum()"  method="post" enctype="multipart/form-data">
                            <div class="user-img user less_margin">
                                <div class="user_pic">
                                    <img  src="<?php echo $picture; ?>" alt="profile picture">
                                </div>
                            </div>
                        <input type="hidden" class="type" name="type" value="teacher"/>
                        <textarea name="comment" placeholder="comment"></textarea>                    
                        <button type="submit">SEND</button>
                    </form>
                </div>
                <div class="popup">
                    <form class="forum-submint-popup"  onsubmit="return popup_submit_forum()"  method="post" enctype="multipart/form-data">
                            <div class="user-img user less_margin">
                                <div class="user_pic">
                                    <img  src="<?php echo $picture; ?>" alt="profile picture">
                                </div>
                            </div>
                            <input type="hidden" class="forum_id" name="forum_pid" value="3"/>
                            <input type="hidden" class="type" name="type" value="teacher"/>
                            <textarea name="comment" placeholder="comment"></textarea>                    
                            <button type="submit">SEND</button>
                            <button style="background-color: red;" onclick="return closePopup()">close</button>
                    </form>
                
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