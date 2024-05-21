<?php
session_start();
include('../db.php');
$act=$_POST['act'];
$username = isset($_SESSION["username"])?$_SESSION["username"]:'';
$user_id=isset($_SESSION["user_id"])?$_SESSION["user_id"]:'';
$user_type = isset($_SESSION["user_type"])?$_SESSION["user_type"]:'';
if($act=='submit_upload'){
    if (!$user_id) {
        echo json_encode(['code'=>0,'msg'=>'Please Login']);
        die;
    }
    $post=$_POST;//post comment
    $file=$_FILES;//post file
    if(isset($file['file'])){
        //Creating a saved folder
        //don't have the right to create a new file.
        //$upload_file=__DIR__.'/resource/'.date('Ymd').'/';
        $upload_file='../resource/';
        /*
        if(!file_exists($upload_file)){
            //mkdir($upload_file,true);
            if (!mkdir($upload_file,true)) {
                $currentDirectory = __DIR__;
                $msg = 'Failed to create directory: ' . error_get_last()['message']
                ."current directory：$currentDirectory".'   check upload_file:'.$upload_file;
                echo json_encode(['code' => 0, 'msg' => $msg]);
                die;
            } else {
                $msg = 'Directory created successfully';
                echo json_encode(['code' => 1, 'msg' => $msg]); // Output debugging information
            }
        }*/
        //stored files
        $tempFile = $file['file']['tmp_name'];
        $fileName = $file['file']['name'];
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);//get expansion name eg: .pdf
        $fileNameWithoutExtension = pathinfo($fileName, PATHINFO_FILENAME); //only the file name

        $targetFilename = $fileNameWithoutExtension ."_" .$user_id. "_" . date("YmdHis") . "." . $extension; //add the time and user_id to avoid cover because same name
        $targetFile = $upload_file . $targetFilename;
        move_uploaded_file($tempFile, $targetFile);//Moving files to a directory
        /*
        if (!move_uploaded_file($tempFile, $targetFile)) {
            $msg = 'Failed to move_uploaded_file: ' . error_get_last()['message']
            ."targetFile：$targetFile".'   check utempFile:'.$tempFile.' move_uploaded_file return:'.var_export(move_uploaded_file($tempFile, $targetFile), true);
            echo json_encode(['code' => 0, 'msg' => $msg]);
            die;
        } else {
            $msg = 'Directory created successfully';
            echo json_encode(['code' => 1, 'msg' => $msg]); // Output debugging information
        }*/
        $post['fileInput']=$targetFile;
    }
    //for db
    //var_dump($post);
    $source_type=isset($post['resource_type'])?$post['resource_type']:''; 
    $Module_id=isset($post['module_level1'])?$post['module_level1']:'';
    $date=date('Y-m-d H:i:s');
    $moduleL2_id=isset($post['module_level2'])?$post['module_level2']:'';
    $resource_title=isset($post['resource_title'])?$post['resource_title']:'';
    $resource_title= htmlspecialchars(addslashes($resource_title), ENT_QUOTES, 'UTF-8');
    $resource_topic=isset($post['resource_topic'])?$post['resource_topic']:'';
    $resource_topic= htmlspecialchars(addslashes($resource_topic), ENT_QUOTES, 'UTF-8');
    $description=isset($post['description'])?$post['description']:'';
    $description = htmlspecialchars(addslashes($description), ENT_QUOTES, 'UTF-8');
    $text_input=isset($post['text_input'])?$post['text_input']:'';
    $text_input= htmlspecialchars(addslashes($text_input), ENT_QUOTES, 'UTF-8');

    $fileInput=isset($post['fileInput'])?$post['fileInput']:'';
    $linkInput =isset($post['linkInput'])?$post['linkInput']:'';
    $linkInput = htmlspecialchars(addslashes($linkInput), ENT_QUOTES, 'UTF-8');

    $cover =$post['cover_of_resource'];
    $cover= htmlspecialchars(addslashes($cover), ENT_QUOTES, 'UTF-8');
    if($cover == ''){
        $cover = 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/Global_Open_Educational_Resources_Logo.svg/1200px-Global_Open_Educational_Resources_Logo.svg.png';
    }
    if($source_type==1){
        $Input=$fileInput;
    }else if($source_type==2){
        $Input=$text_input;
    }else{
        $Input=$linkInput;
    }
    $insert_sql="INSERT INTO `educational_reource` 
    (`source_type`,`user_id`,`Module_id`,`date`,`moduleL2_id`,`resource_title`,`resource_topic`,`description`,`Input`,`cover_of_resource`) 
    VALUE (\"$source_type\",\"$user_id\",\"$Module_id\",\"$date\",\"$moduleL2_id\",\"$resource_title\",\"$resource_topic\",\"$description\",\"$Input\",\"$cover\")";
    
    $show_sql = "SELECT `resource_id` FROM `educational_reource`
    WHERE `source_type` = \"$source_type\"
    AND `user_id` = \"$user_id\"
    AND `date` = \"$date\";";

    try {
        $conn->query($insert_sql);
        if($conn->error){
            $msg= $conn->error;
            echo json_encode(['code'=>0,'msg'=>$msg]);
            die;
        }
    } catch (\Exception $e) {
        $msg=  $e->getMessage();
        echo json_encode(['code'=>0,'msg'=>$msg]);
        die;
    }
    if(!$conn->error){
        $msg= 'submit successfully cover:'.$cover;
        $result = $conn->query($show_sql);
        $result_list=[];
        while($data=$result->fetch_assoc()){
            array_push($result_list,$data);
        }
        $resource_id = $result_list[0]['resource_id'];
        echo json_encode(['code'=>1,'msg'=>$msg,'resource_id'=>$resource_id]);
        die;
    }
    die;
}
//get module level 2
if($act=='getm'){
    $mod_id=$_POST['mod_id'];
    $sql_module_l2="SELECT * FROM module_l2 where module_id={$mod_id}";
    $res=$conn->query($sql_module_l2);
    $module_l2_list=[];
    while($data=$res->fetch_assoc()){
        array_push($module_l2_list,$data);
    }
    echo json_encode($module_l2_list);
    die;
}

if($act=='submit_comment'){
    if (!$user_id) {
         echo json_encode(['code'=>0,'msg'=>'Please Login']);
         die;
     }
    $post=$_POST;//post comment
    
    $date=date('Y-m-d H:i:s');
    $user_id=isset($_SESSION["user_id"])?$_SESSION["user_id"]:'';
    $comment=isset($post['comment'])?$post['comment']:'';
    $comment = htmlspecialchars(addslashes($comment), ENT_QUOTES, 'UTF-8');
    $resource_id = isset($post['resource_id'])?$post['resource_id']:'';
    $insert_sql="INSERT INTO `review` (`resource_id`,`user_id`,`comment`,`date`) VALUE (\"$resource_id\",\"$user_id\",\"$comment\",\"$date\")";
    try {
        $conn->query($insert_sql);
        if($conn->error){
            $msg= $conn->error;
            echo json_encode(['code'=>0,'msg'=>$msg]);
            die;
        }
    } catch (\Exception $e) {
        $msg=  $e->getMessage();
        echo json_encode(['code'=>0,'msg'=>$msg]);
        die;
    }
    if(!$conn->error){
        $msg= 'Comment published successfully';
        echo json_encode(['code'=>1,'msg'=>$msg]);
        die;
    }
}

//update the resource by edit:
if($act=='submit_update'){
    if (!$user_id) {
        echo json_encode(['code'=>0,'msg'=>'Please Login']);
        die;
    }
    $post=$_POST;//post comment
    $file=$_FILES;//post file
    if(isset($file['file'])){
        $upload_file='../resource/';
        //stored files
        $tempFile = $file['file']['tmp_name'];
        $fileName = $file['file']['name'];
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);//get expansion name eg: .pdf
        $fileNameWithoutExtension = pathinfo($fileName, PATHINFO_FILENAME); //only the file name
        $targetFilename = $fileNameWithoutExtension ."_" .$user_id. "_" . date("YmdHis") . "." . $extension; //add the time and user_id to avoid cover because same name
        $targetFile = $upload_file . $targetFilename;
        move_uploaded_file($tempFile, $targetFile);//Moving files to a directory
        $post['fileInput']=$targetFile;
    }
    //for db
    //var_dump($post);
    $resource_id=isset($post['resource_id'])?$post['resource_id']:'';
    $resource_title=isset($post['resource_title'])?$post['resource_title']:'';
    $resource_title= htmlspecialchars(addslashes($resource_title), ENT_QUOTES, 'UTF-8');
    $resource_topic=isset($post['resource_topic'])?$post['resource_topic']:'';
    $resource_topic= htmlspecialchars(addslashes($resource_topic), ENT_QUOTES, 'UTF-8');
    $source_type=isset($post['resource_type'])?$post['resource_type']:''; 
    $description=isset($post['description'])?$post['description']:'';
    $description = htmlspecialchars(addslashes($description), ENT_QUOTES, 'UTF-8');
    $text_input=isset($post['text_input'])?$post['text_input']:'';
    $text_input = htmlspecialchars(addslashes($text_input), ENT_QUOTES, 'UTF-8');
    $fileInput=isset($post['fileInput'])?$post['fileInput']:'';
    $linkInput =isset($post['linkInput'])?$post['linkInput']:'';
    $linkInput = htmlspecialchars(addslashes($linkInput), ENT_QUOTES, 'UTF-8');
    $ori_file =isset($post['ori_file'])?$post['ori_file']:'';
    if($source_type==1){
        if($fileInput){
            $Input=$fileInput;
        }else{
            $Input=$ori_file;
        }
        
        
    }else if($source_type==2){
        $Input=$text_input;
    }else{
        $Input=$linkInput;
    }
    $insert_sql="UPDATE `educational_reource` SET
                `resource_title` = \"$resource_title\",
                `resource_topic`= \"$resource_topic\",
                `description`= \"$description\",
                `Input` = \"$Input\"
                WHERE `resource_id` = \"$resource_id\";";
    try {
        $conn->query($insert_sql);
        if($conn->error){
            $msg= $conn->error;
            echo json_encode(['code'=>0,'msg'=>$msg]);
            die;
        }
    } catch (\Exception $e) {
        $msg=  $e->getMessage();
        echo json_encode(['code'=>0,'msg'=>$msg]);
        die;
    }
    if(!$conn->error){
        $msg= 'submit successfully';
        echo json_encode(['code'=>1,'msg'=>$msg,'resource_id'=>$resource_id]);
        die;
    }
    die;
}

if($act=='submit_forum'){
    if (!$user_id) {
        echo json_encode(['code'=>0,'msg'=>'Please Login']);
        die;
    }
    $post=$_POST;//post comment

    $date=date('Y-m-d H:i:s');
    $type=isset($post['type'])?$post['type']:'';
    $comment=isset($post['comment'])?$post['comment']:'';
    $comment = htmlspecialchars(addslashes($comment), ENT_QUOTES, 'UTF-8');
    $forum_pid=isset($post['forum_pid'])?$post['forum_pid']:0;
    $insert_sql="INSERT INTO `forum` (`type`,`user_id`,`comment`,`date`,`forum_pid`) VALUE (\"$type\",\"$user_id\",\"$comment\",\"$date\", \"$forum_pid\")";
    try {
        $conn->query($insert_sql);
        if($conn->error){
            $msg= $conn->error;
            echo json_encode(['code'=>0,'msg'=>$msg]);
            die;
        }
        
        $forum_id = $conn->insert_id;
        if($forum_pid>0){
            $ask_sql="SELECT * from `forum` where `forum_id`={$forum_pid}";
            $ask_ret=$conn->query($ask_sql);
            $data_ask=$ask_ret->fetch_assoc();
            $ask_user_id=$data_ask['user_id'];
            $insert_sql="INSERT INTO `forum_news` (`type`,`user_id`,`comment`,`date`,`forum_pid`,`ask_user_id`,`forum_id`) VALUE (\"$type\",\"$user_id\",\"$comment\",\"$date\", \"$forum_pid\", \"$ask_user_id\", \"$forum_id\")";
            $conn->query($insert_sql);
            }
    } catch (\Exception $e) {
        $msg=  $e->getMessage();
        echo json_encode(['code'=>0,'msg'=>$msg]);
        die;
    }
    if(!$conn->error){
        $msg= 'submit successfully';
        echo json_encode(['code'=>1,'msg'=>$msg]);
        die;
    }
    die;
}

if($act=='submit_review'){
    if (!$user_id) {
        echo json_encode(['code'=>0,'msg'=>'Please Login']);
        die;
    }
    $post=$_POST;//post comment

    $date=date('Y-m-d H:i:s');
    $resource_id=isset($post['resource_id'])?$post['resource_id']:'';
    $comment=isset($post['comment'])?$post['comment']:'';
    $comment = htmlspecialchars(addslashes($comment), ENT_QUOTES, 'UTF-8');
    $review_pid=isset($post['review_pid'])?$post['review_pid']:0;
    $insert_sql="INSERT INTO `review` (`resource_id`,`user_id`,`comment`,`date`,`review_pid`) VALUE (\"$resource_id\",\"$user_id\",\"$comment\",\"$date\", \"$review_pid\")";
    try {
        $conn->query($insert_sql);
        if($conn->error){
            $msg= $conn->error;
            echo json_encode(['code'=>0,'msg'=>$msg]);
            die;
        }
        
        $review_id = $conn->insert_id;
        if($review_pid>0){
            $ask_sql="SELECT * from `review` where `review_id`={$review_pid}";
            $ask_ret=$conn->query($ask_sql);
            $data_ask=$ask_ret->fetch_assoc();
            $ask_user_id=$data_ask['user_id'];
            $insert_sql="INSERT INTO `review_news` (`resource_id`,`user_id`,`comment`,`date`,`review_pid`,`ask_user_id`,`review_id`) VALUE (\"$resource_id\",\"$user_id\",\"$comment\",\"$date\", \"$review_pid\", \"$ask_user_id\", \"$review_id\")";
            $conn->query($insert_sql);
        }
    } catch (\Exception $e) {
        $msg=  $e->getMessage();
        echo json_encode(['code'=>0,'msg'=>$msg]);
        die;
    }
    if(!$conn->error){
        $msg= 'submit successfully';
        echo json_encode(['code'=>1,'msg'=>$msg]);
        die;
    }
    die;
}

if($act=='toLike'){
    if (!$user_id) {
        echo json_encode(['code'=>0,'msg'=>'Please Login']);
        die;
    }
    $post=$_POST;//post comment
    $type=isset($post['type'])?$post['type']:'like';
    $date=date('Y-m-d H:i:s');
    $forum_id=isset($post['forum_id'])?$post['forum_id']:0;
    //check like or dislike has already
    $slect_SQL="SELECT * FROM forum_like_dislike where `type`='$type' and `user_id`='$user_id' and `forum_id`='$forum_id'";
    $res=$conn->query($slect_SQL);
    if($res->fetch_assoc()){
        $dele_SQL="DELETE FROM forum_like_dislike where `type`='$type' and `user_id`='$user_id' and `forum_id`='$forum_id'";
        try {
            $conn->query($dele_SQL);
            if($conn->error){
                $msg= $conn->error;
                echo json_encode(['code'=>0,'msg'=>$msg]);
                die;
            }
        } catch (\Exception $e) {
            $msg=  $e->getMessage();
            echo json_encode(['code'=>0,'msg'=>$msg]);
            die;
        }
        if(!$conn->error){
            $msg= 'submit successfully';
            echo json_encode(['code'=>1,'msg'=>$msg]);
            die;
        }
    }else{
        //cancel
        $dele_SQL="DELETE FROM forum_like_dislike where `type`='dislike' and `user_id`='$user_id' and `forum_id`='$forum_id'";
        try {
            $conn->query($dele_SQL);
            if($conn->error){
                $msg= $conn->error;
                echo json_encode(['code'=>0,'msg'=>$msg]);
                die;
            }
        } catch (\Exception $e) {
            $msg=  $e->getMessage();
            echo json_encode(['code'=>0,'msg'=>$msg]);
            die;
        }
        



        $insert_sql="INSERT INTO `forum_like_dislike` (`type`,`user_id`,`forum_id`,`date`) VALUE ('$type','$user_id','$forum_id','$date')";
        try {
            $conn->query($insert_sql);
            if($conn->error){
                $msg= $conn->error;
                echo json_encode(['code'=>0,'msg'=>$msg]);
                die;
            }
        } catch (\Exception $e) {
            $msg=  $e->getMessage();
            echo json_encode(['code'=>0,'msg'=>$msg]);
            die;
        }
        if(!$conn->error){
            $msg= 'submit successfully';
            echo json_encode(['code'=>1,'msg'=>$msg]);
            die;
        }
    }

   
    die;
}
if($act=='toDislike'){
    if (!$user_id) {
        echo json_encode(['code'=>0,'msg'=>'Please Login']);
        die;
    }
    $post=$_POST;//post comment
    $type=isset($post['type'])?$post['type']:'dislike';
    $date=date('Y-m-d H:i:s');
    $forum_id=isset($post['forum_id'])?$post['forum_id']:0;
    //check exist
    $slect_SQL="SELECT * FROM forum_like_dislike where `type`='$type' and `user_id`='$user_id' and `forum_id`='$forum_id'";
    $res=$conn->query($slect_SQL);
    if($res->fetch_assoc()){
        $dele_SQL="DELETE FROM forum_like_dislike where `type`='$type' and `user_id`='$user_id' and `forum_id`='$forum_id'";
        try {
            $conn->query($dele_SQL);
            if($conn->error){
                $msg= $conn->error;
                echo json_encode(['code'=>0,'msg'=>$msg]);
                die;
            }
        } catch (\Exception $e) {
            $msg=  $e->getMessage();
            echo json_encode(['code'=>0,'msg'=>$msg]);
            die;
        }
        if(!$conn->error){
            $msg= 'submit successfully';
            echo json_encode(['code'=>1,'msg'=>$msg]);
            die;
        }
    }else{
        //cancel
        $dele_SQL="DELETE FROM forum_like_dislike where `type`='like' and `user_id`='$user_id' and `forum_id`='$forum_id'";
        try {
            $conn->query($dele_SQL);
            if($conn->error){
                $msg= $conn->error;
                echo json_encode(['code'=>0,'msg'=>$msg]);
                die;
            }
        } catch (\Exception $e) {
            $msg=  $e->getMessage();
            echo json_encode(['code'=>0,'msg'=>$msg]);
            die;
        }
        
        $insert_sql="INSERT INTO `forum_like_dislike` (`type`,`user_id`,`forum_id`,`date`) VALUE ('$type','$user_id','$forum_id','$date')";
        try {
            $conn->query($insert_sql);
            if($conn->error){
                $msg= $conn->error;
                echo json_encode(['code'=>0,'msg'=>$msg]);
                die;
            }
        } catch (\Exception $e) {
            $msg=  $e->getMessage();
            echo json_encode(['code'=>0,'msg'=>$msg]);
            die;
        }
        if(!$conn->error){
            $msg= 'submit successfully';
            echo json_encode(['code'=>1,'msg'=>$msg]);
            die;
        }
    }

   
    die;
}

if($act=='read_news'){
    if (!$user_id) {
        echo json_encode(['code'=>0,'msg'=>'Please Login']);
        die;
    }
    $post=$_POST;//post comment
    $news_id=isset($post['news_id'])?$post['news_id']:'0';
    $sql_u="UPDATE `forum_news` set `status`=2 where `news_id`={$news_id}";
    try {
        $conn->query($sql_u);
        if($conn->error){
            $msg= $conn->error;
            echo json_encode(['code'=>0,'msg'=>$msg]);
            die;
        }
    } catch (\Exception $e) {
        $msg=  $e->getMessage();
        echo json_encode(['code'=>0,'msg'=>$msg]);
        die;
    }
    if(!$conn->error){
        $msg= 'submit successfully';
        echo json_encode(['code'=>1,'msg'=>$msg]);
        die;
    }
}

if($act=='read_news_resource'){
    if (!$user_id) {
        echo json_encode(['code'=>0,'msg'=>'Please Login']);
        die;
    }
    $post=$_POST;//post comment
    $news_id=isset($post['news_id'])?$post['news_id']:'0';
    $sql_u="UPDATE `review_news` set `status`=2 where `news_id`={$news_id}";
    try {
        $conn->query($sql_u);
        if($conn->error){
            $msg= $conn->error;
            echo json_encode(['code'=>0,'msg'=>$msg]);
            die;
        }
    } catch (\Exception $e) {
        $msg=  $e->getMessage();
        echo json_encode(['code'=>0,'msg'=>$msg]);
        die;
    }
    if(!$conn->error){
        $msg= 'submit successfully';
        echo json_encode(['code'=>1,'msg'=>$msg]);
        die;
    }
}

//echo "this is test";