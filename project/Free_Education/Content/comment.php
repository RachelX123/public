
    <?php 
        function buildCategoryTree(array $categories, $parentId = '0') {
            $branch = array();
         
            foreach ($categories as $category) {
                if ($category['review_pid'] == $parentId) {
                    $children = buildCategoryTree($categories, $category['review_id']);
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

        //get user_comment
        $sql_user_review="SELECT m.*,u.username,u.picture,t.user_type FROM review as m LEFT JOIN user AS u on u.user_id=m.user_id LEFT JOIN user_type As t on u.user_type = t.user_type_id  WHERE resource_id = \"$resource_id\"
        ORDER BY `date` asc";
        $res=$conn->query($sql_user_review);
        $user_review_list=[];
        while($data=$res->fetch_assoc()){
           
           //reply
           if($data['review_pid']>0){
            $top="SELECT * from `review` where review_id={$data['review_pid']}";
            $tops=$conn->query($top);
            $topa=$tops->fetch_assoc();
            if(!isset($topa['review_pid'])){
                continue; 
            }
            if($topa['review_pid']!=0){
            $sql="SELECT u.user_id,u.username,u.picture, t.user_type from `review` as f left Join user as u on u.user_id=f.user_id left join user_type as t on u.user_type = t.user_type_id
            where review_id={$data['review_pid']}";
            $user=$conn->query($sql);
            $user_data=$user->fetch_assoc();
            $data['user']=$user_data;
            }
            
            
            }

            array_push($user_review_list,$data);
        }
        $user_review_list=buildCategoryTree($user_review_list,0);
        foreach($user_review_list as $k => $item){
            if(isset($user_review_list[$k]['children'])){
                $user_review_list[$k]['children']=array_reverse($user_review_list[$k]['children']);
            }
            
         }

       // var_dump($user_review_list);
    ?>


        <!--content:-->

                <div class="review-container">
                    <div class="review-list">
                        <?php foreach($user_review_list as $item) {
                            if($item['review_pid']==0){
                            ?>
                        <div class="review-item  review-item-zhu">
                            <div class="review-zhuconten">
                                <div class="user-img user less_margin">
                                    <div class="user_pic">
                                        <img  src="<?php echo $item['picture']; ?>" alt="profile picture">
                                    </div>
                                </div>
                                <div class="user-review">
                                    <h2 class="username"><?php echo $item['username']; ?><a> </a><a class="user_type" ><?php echo $item['user_type']; ?></a></h2>
                                    <div class="all_content" >
                                        <div class="text-content">
                                            <div class="content" ><?php echo $item['comment']; ?></div>
                                            <div class="ico">
                                                <i onclick="toSend_r(<?php echo $item['review_id'];?>)"  class="bx bx-send"></i>
                                            </div>
                                        </div>
                                        <div class="remove" onclick="removeItem('<?php echo $item['review_id']; ?>','review')" style="<?php if($item['user_id'] != $user_id) echo 'visibility: hidden;' ?>" >
                                            <p>REMOVE</p>
                                        </div>
                                    </div>
                        
                                </div>
                            </div>
                            <!-- comment -->
                            <?php if(isset($item['children'])){?>
                            <div class="review-list-huifu">
                                <?php foreach($item['children'] as $items) {?>
                                    <div class="review-item" id="<?php echo $items['review_id'];?>">
                                        <div class="review-zhuconten">
                                            <div class="user-img user less_margin">
                                                <div class="user_pic">
                                                    <img  src="<?php echo $items['picture']; ?>" alt="profile picture">
                                                </div>
                                            </div>
                                            <div class="user-review">
                                                <h2 class="username"><?php echo $items['username'];?><a> </a><a class="user_type" ><?php echo $items['user_type']; ?></a>  <?php if(isset($items['user'])){?>reply @ <?php echo $items['user']['username'];?><a> </a><a class="user_type" ><?php echo $items['user']['user_type']; ?></a><?php } ?></h2>
                                                <div class="all_content" >
                                                    <div class="text-content">
                                                        <div class="content" ><?php echo $items['comment'];?></div>
                                                            <div class="ico">
                                                                
                                                                <i onclick="toSend_r(<?php echo $items['review_id'];?>)"  class="bx bx-send"></i>
                                                            </div>
                                                        </div>
                                                        <div class="remove" onclick="removeItem('<?php echo $items['review_id']; ?>','review')" style="<?php if($items['user_id'] != $user_id) echo 'visibility: hidden;' ?>">
                                                            <p>REMOVE</p>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            
                                        </div>
                                    </div>
                                    <?php if(isset($items['children'])){?>
                                        <?php foreach($items['children'] as $itemss) {?>
                                            <div class="review-item">
                                                <div class="review-zhuconten">
                                                    <div class="user-img user less_margin">
                                                        <div class="user_pic">
                                                            <img  src="<?php echo $item['picture']; ?>" alt="profile picture">
                                                        </div>
                                                    </div>
                                                    <div class="user-review">
                                                        <h2 class="username"><?php echo $itemss['username'];?><a> </a><a class="user_type" ><?php echo $itemss['user_type']; ?></a></h2>
                                                        <div class="all_content" >
                                                            <div class="text-content">
                                                                <div class="content" ><?php echo $itemss['comment'];?></div>
                                                                    <div class="ico">
                                                                        <i onclick="toSend_r(<?php echo $itemss['review_id'];?>)"  class="bx bx-send"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }?>
                                    <?php }?>
                                <?php } ?>
                                <!-- <div class="review-item">
                                    <div class="review-zhuconten">
                                        <div class="user-img">
                                            <i  class="bx bx-user-circle user_icon"></i>
                                        </div>
                                        <div class="user-review">
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
                    <div class="review-submint ">
                        <form class="review-submint-form"  onsubmit="return submit_review()"  method="post" enctype="multipart/form-data">
                                <div class="user-img user less_margin">
                                    <div class="user_pic">
                                        <img  src="<?php echo $picture; ?>" alt="profile picture">
                                    </div>
                                </div>
                            <input type="hidden" class="resource_id" name="resource_id" value="<?php echo $resource_id ?>"/>
                            <textarea name="comment" placeholder="comment"></textarea>                    
                            <button type="submit">SEND</button>
                        </form>
                    </div>
                    <div class="popup">
                        <form class="review-submint-popup"  onsubmit="return popup_submit_review()"  method="post" enctype="multipart/form-data">
                                <div class="user-img user less_margin">
                                    <div class="user_pic">
                                        <img  src="<?php echo $picture; ?>" alt="profile picture">
                                    </div>
                                </div>
                                <input type="hidden" class="review_id" name="review_pid" value="3"/>
                                <input type="hidden" class="resource_id" name="resource_id" value="<?php echo $resource_id ?>"/>
                                <textarea name="comment" placeholder="comment"></textarea>                    
                                <button type="submit">SEND</button>
                                <button style="background-color: red;" onclick="return closePopup()">close</button>
                        </form>
                    
                    </div>
                </div>
            
