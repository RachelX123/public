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
        <link rel="stylesheet" href="../Content/style.css" >
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

                include("header2.php");

        $user_id=$user_id?$user_id:1;
        //get user_comment
        $sql_user_forum="SELECT m.*,u.username, u.picture FROM forum as m LEFT JOIN user AS u on u.user_id=m.user_id where `type`='teacher' ORDER BY forum_id asc";
        $res=$conn->query($sql_user_forum);
        $user_forum_list=[];
        while($data=$res->fetch_assoc()){
            
              //reply
           if($data['forum_pid']>0){
            $top="SELECT * from `forum` where forum_id={$data['forum_pid']}";
            $tops=$conn->query($top);
            $topa=$tops->fetch_assoc();
            if(!isset($topa['forum_pid'])){
                continue; 
            }
            if($topa['forum_pid']!=0){
            $sql="SELECT u.* from `forum` as f left Join user as u on u.user_id=f.user_id where forum_id={$data['forum_pid']}";
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
                                <h2 class="username"><?php echo $item['username']; ?></h2>
                                <div class="all_content" >
                                    <div class="text-content">
                                        <div class="content" ><?php echo $item['comment']; ?></div>
                                    </div>
                                    <div class="remove" onclick="removeItem('<?php echo $item['forum_id']; ?>','forum')" >
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
                                            <h2 class="username"><?php echo $items['username'];?>  <?php if(isset($items['user'])){?>reply @ <?php echo $items['user']['username'];?><?php } ?></h2>
                                            <div class="all_content" >
                                                <div class="text-content">
                                                    <div class="content" ><?php echo $items['comment'];?></div>
            
                                                </div>
                                                <div class="remove" onclick="removeItem('<?php echo $items['forum_id']; ?>','forum')">
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
                                                    <h2 class="username"><?php echo $itemss['username'];?></h2>
                                                    <div class="all_content" >
                                                        <div class="text-content">
                                                            <div class="content" ><?php echo $itemss['comment'];?></div>
                                                            
                                                        </div>
                                                        <div class="remove" onclick="removeItem('<?php echo $itemss['forum_id']; ?>','forum')" >
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

            </div>
        </div>
    <?php
            include("../Content/footer.php")
    ?>
    </body>
    <script src="../Content/jq.js"></script>
    <script src="../Content/script.js"></script>   
    <script src="../Content/submit.js"></script>
</html>