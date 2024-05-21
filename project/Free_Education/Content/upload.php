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
        <title>UPLOAD</title>
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
                include("header2.php");
            }
        }else{
            include('header1.php');
        }

        //get source_type stored in source_type_list
        $sql_source_type="SELECT * FROM source_type";
        $res=$conn->query($sql_source_type);
        $source_type_list=[];
        while($data=$res->fetch_assoc()){
            array_push($source_type_list,$data);
        }
        //get module_l1 stored in module_l1_list
        $sql_module_l1="SELECT * FROM module_l1";
        $res=$conn->query($sql_module_l1);
        $module_l1_list=[];
        while($data=$res->fetch_assoc()){
            array_push($module_l1_list,$data);
        }
        //get module_l2 stored in module_l2_list
        $sql_module_l2="SELECT * FROM module_l2";
        $res=$conn->query($sql_module_l2);
        $module_l2_list=[];
        while($data=$res->fetch_assoc()){
            array_push($module_l2_list,$data);
        }
        //submit
         if(isset($_POST['resource_title'])){
            
             $_POST['file']=isset($_POST['file'])?$_POST['file']:'';
             $sql="insert into `educational_reource` (`resource_title`,`resource_topic`,`resource_type`,`file`,`text_input`,`linkInput`,`cover`) value ('{$_POST['resource_title']}','{$_POST['resource_topic']}','{$_POST['resource_type']}','{$_POST['file']}','{$_POST['text_input']}','{$_POST['linkInput']}','{$_POST['resource_topic']}','{$_POST['resource_type']}','{$_POST['file']}','{$_POST['text_input']}','{$_POST['cover']}')";
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


        <!--content:-->
        <div class="creater" >
            <i class="bx bx-chevron-down bx-rotate-90 left-btn returnBut" title="back to last page" alt="back to last page" onclick="backtolast()" ></i>
            <div class="showTitle" >
                <h3>Creater</h3>
                <p>Can uploads educational resource.</p>
                <p>Thank you for contributing to equal educational opportunity!</p>
            </div>
            <div class="form_container" >
                <form class="upload_form" onsubmit="return submit_upload()"  method="post" enctype="multipart/form-data">
                    <!--text input: resource title-->
                    <input type="text" id="resource_title" name="resource_title" placeholder="Resource Title" required="required">

                    <input type="text" id="cover_of_resource" name="cover_of_resource" placeholder="Cover Of Resource">
                    
                    <!--module_Level1-->
                    <select id="module_level1" name="module_level1" onchange="choosemodule()" required="required">
                        <option value="0">module level 1:</option>
                        <?php // auto show module level 1
                            foreach($module_l1_list as $val){?>
                                <option value="<?php echo  $val['module_id'];?>"><?php echo  $val['module_name'];?></option>
                        <?php }?>

                        <!--manually show -->
                        <!-- <option value="Mathematics">Mathematics</option>
                        <option value="Science">Science</option>
                        <option value="Social_Science">Social Science</option>
                        <option value="Information&News">Information & News</option>
                        <option value="Presonalgrowth">Presonal growth</option> -->
                    </select>
                    <!-- auto show module level 2 -->
                    <div id="leo_module_level2" class="hidden">
                        <select id="lesssmodule_level2" name="module_level2" required="required">
                        </select>
                    </div>
                    <!-- manually show module level 2
                        <!--Language: module_Level2-->
                        <!-- <div  id="Language_container" class="hidden">
                            <select id="module_level2" name="module_Language" required="required">
                                <option>module level 2:</option>
                                <option value="Reading">Reading</option>
                                <option value="Writing">Writing</option>
                                <option value="Listening">Listening</option>
                                <option value="Speaking">Speaking</option>
                            </select>
                        </div> -->

                        <!--Mathematics: module_Level2-->
                        <!-- <div  id="Mathematics_container" class="hidden">
                            <select id="module_level2" name="module_Mathematics" required="required">
                                <option>module level 2:</option>
                                <option value="Arithmetic">Arithmetic</option>
                                <option value="Geometrics">Geometrics</option>
                                <option value="Algebra">Algebra</option>
                                <option value="Quantity">Quantity</option>
                            </select>
                        </div> -->

                        <!--Science: module_Level2-->
                        <!-- <div  id="Science_container" class="hidden">
                            <select id="module_level2" name="module_Science" required="required">
                                <option>module level 2:</option>
                                <option value="Geography">Geography</option>
                                <option value="Biology">Biology</option>
                            </select>
                        </div> -->

                        <!--Social Science: module_Level2-->
                        <!-- <div  id="Social_Science_container" class="hidden">
                            <select id="module_level2" name="module_Social Science" required="required">
                                <option>module level 2:</option>
                                <option value="Physics">Physics</option>
                                <option value="History">History</option>
                            </select>
                        </div> -->

                    <!--text input: Resource Topic-->
                    <input type="text" id="resource_topic" name="resource_topic" placeholder="Resource Topic" required="required">

                    <!--select resource type-->
                    <select id="resource_type" name="resource_type" onchange="toinput()" required="required">
                        <option>Resource Type:</option>
                        <option value="1">File(Only PDF, VIDEO, JPG, JPEG, and PNG)</option>
                        <option value="2">Text</option>
                        <option value="3">Link</option>
                    </select>
                    
                    <!--text imput: description:-->
                    <textarea type="text" id="description" name="description" placeholder="Description" ></textarea>

                    <!--show input by different resource type-->

                    <!--File:-->
                    <div id="file_input_container" class="file_input_container hidden">
                        <span id="fileName"></span>
                        <label for="file_input" class="choosefilelabel">Browse</label>
                        <input type="file" id="file_input" name="file_input" class="file_input" onchange="chooseFileName()"  >
                    </div>
                    
                    <!--Text-->
                    <div id="text_input_container" class="hidden">
                        <label>Content:</label>
                        <textarea type="text" id="text_input" name="text_input"></textarea>
                    </div>

                    <!--Link-->
                    <div id="link_input_container" class="hidden">
                        <label>Link:</label>
                        <input type="text" id="linkInput" name="linkInput">
                    </div>

                    

                    <div  class="sub">
                        <button type="submit">SUBMIT</button>
                    </div>
                
                </form>
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