<?php
session_start();
include('../db.php');
$username = isset($_SESSION["username"])?$_SESSION["username"]:'';
$user_id=isset($_SESSION["user_id"])?$_SESSION["user_id"]:'';
$user_type = isset($_SESSION["user_type"])?$_SESSION["user_type"]:'';
$resource_id = isset($_GET['resource'])?$_GET['resource']:'';
$sql_update = "SELECT `resource_title`,`resource_topic`,`description`,`Input`,`source_type`,`resource_id`
               FROM `educational_reource`
               WHERE `resource_id` = '$resource_id';";
$res=$conn->query($sql_update);
$update_content_list=[];
while($data=$res->fetch_assoc()){
    array_push($update_content_list,$data);
}

if(!$user_id){
    echo "<script>alert('Session expire Please Login.');location.href='../login-page/login.php'</script>";
    die;
}


//submit
if(isset($_POST['resource_title'])){
            
    $_POST['file']=isset($_POST['file'])?$_POST['file']:'';

    $sql="UPDATE `educational_reource` SET
    `resource_title` = \"{$_POST['resource_title']}\",
    `resource_topic` = \"{$_POST['resource_topic']}\",
    `resource_type` = \"$resource_type\",
    `file` = \"{$_POST['file']}\",
    `ori_file` = \"$update_content_list[0]['Input']\",
    `text_input` = \"{$_POST['text_input']}\",
    `linkInput` = \"{$_POST['linkInput']}\"
    WHERE `resource_id` = '$resource_id';";
    try {
        $ret=$conn->query($sql);
        if(!$ret){
            var_dump($conn->error);
        }
    } catch (\Exception $e) {
       var_dump($e->getMessage());
    }
   
   
    var_dump($_POST);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" >
        <meta name="viewport" content="width=device-width,initial-scale=1.0" >
        <title>EDIT</title>
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
        
    ?>


        <!--content:-->
        <div class="content_container" >
            <div class="creater" >
                <div class="showTitle" >
                    <h3>Edit</h3>
                    <p>Can edit educational resource.</p>
                    <p>Thank you for contributing to equal educational opportunity!</p>
                </div>
                <div class="form_container" >
                    <form class="update_form" onsubmit="return submit_update()"  method="post" enctype="multipart/form-data">
                        <!--text input: resource title-->
                        <input type="text" id="resource_title" name="resource_title" placeholder="Resource Title" required="required" value="<?php echo $update_content_list[0]['resource_title'] ?>">

                        <!--text input: Resource Topic-->
                        <input type="text" id="resource_topic" name="resource_topic" placeholder="Resource Topic" required="required" value="<?php echo $update_content_list[0]['resource_topic'] ?>">

                        <input type="text" id="resource_type" type="hidden" style="display:none;" name="resource_type" value="<?php echo $update_content_list[0]['source_type'] ?>">
                        
                        <!--text imput: description:-->
                        <textarea type="text" id="description" name="description" placeholder="Description" ><?php echo $update_content_list[0]['description'] ?></textarea>

                        <!--File:-->

                        <div id="file_input_container" class="file_input_container <?php if($update_content_list[0]['source_type'] != '1') echo'hidden';?>" >
                            <span id="fileName"></span>
                            <label for="file_input" class="choosefilelabel">Browse</label>
                            <input type="file" id="file_input" name="file_input" class="file_input" onchange="chooseFileName()" >
                        </div>
                        <?php if($update_content_list[0]['source_type'] == '1'){ ?>
                        <p>Click here to see original file <a class="likeButton" href="<?php if($update_content_list[0]['source_type'] == '1') echo $update_content_list[0]['Input']; ?>" target="_blank">CHECK</a></p>
                        <input type="hidden" value="<?php if($update_content_list[0]['source_type'] == '1') echo $update_content_list[0]['Input']; ?>" name="ori_file"/>
                        <?php
                        }?>
                        
                        
                        <!--Text-->
                        <div id="text_input_container" class="<?php if($update_content_list[0]['source_type'] != '2') echo'hidden';?>">
                            <label>Content:</label>
                            <textarea type="text" id="text_input" name="text_input"><?php if($update_content_list[0]['source_type'] == '2') echo $update_content_list[0]['Input'] ?></textarea>
                        </div>

                        <!--Link-->
                        <div id="link_input_container" class="<?php if($update_content_list[0]['source_type'] != '3') echo 'hidden'; ?>">
                            <label>Link:</label>
                            <input type="text" id="linkInput" name="linkInput" value="<?php if($update_content_list[0]['source_type'] == '3') echo $update_content_list[0]['Input'] ?>">
                        </div>

                        <div  class="sub">
                            <div class="twoBut" >
                                <button type="button" onclick="window.history.go(-1);" >CANCEL</button>
                            </div>
                            <div class="twoBut save">
                                <button type="submit">SAVE</button>
                            </div>
                            
                        </div>
                        <input type="hidden" value="<?php echo $update_content_list[0]['resource_id']; ?>" name="resource_id"/>
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