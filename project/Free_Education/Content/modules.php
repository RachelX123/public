<?php
session_start();

include('../db.php');
   /* 
   need to definde the variable
    $username = $_SESSION['username'];
    $user_id = $_SESSION['user_id'];
    $user_type = $_SESSION['user_type'];
    */

//only need to check the variable is null or not
$username = isset($_SESSION["username"])?$_SESSION["username"]:'';
$user_id=isset($_SESSION["user_id"])?$_SESSION["user_id"]:'';
$user_type = isset($_SESSION["user_type"])?$_SESSION["user_type"]:'';

$kw = isset($_GET['kw'])?$_GET['kw']:'';
$kw = htmlspecialchars(addslashes($kw), ENT_QUOTES, 'UTF-8');
$sortBy = isset($_GET['sortBy']) ? $_GET['sortBy'] : '';

$moduleL1 = isset($_GET['module1'])?$_GET['module1']:'';
$moduleL2 = isset($_GET['module2'])?$_GET['module2']:'';

$moduleL1_name = urldecode($moduleL1);
$moduleL2_name = urldecode($moduleL2);

//$currentUrl = htmlspecialchars('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); //get the current parameters 
$currentUrl = "modules.php";

if($moduleL1_name){
    if($moduleL2_name){
        $sql_moudule = "SELECT `resource_id`, m1.`module_name`,m2.`module_name`,`resource_title`,`cover_of_resource`
        FROM `educational_reource`  
        left join module_l1 as m1 on m1.module_id=educational_reource.Module_id 
        left join module_l2 as m2 on educational_reource.moduleL2_id = m2.moduleL2_id
        WHERE m1.module_name = \"$moduleL1_name\" and m2.module_name = \"$moduleL2_name\"";

        $sql_topic ="SELECT `resource_topic` FROM `educational_reource`
        left join module_l1 as m1 on m1.module_id=educational_reource.Module_id 
        left join module_l2 as m2 on educational_reource.moduleL2_id = m2.moduleL2_id
        WHERE m1.module_name = \"$moduleL1_name\" and m2.module_name = \"$moduleL2_name\"";
    }else{
        $sql_moudule = "SELECT `resource_id`, m1.`module_name`,m2.`module_name`,`resource_title`,`cover_of_resource`
        FROM `educational_reource`  
        left join module_l1 as m1 on m1.module_id=educational_reource.Module_id 
        left join module_l2 as m2 on educational_reource.moduleL2_id = m2.moduleL2_id
        WHERE m1.module_name = \"$moduleL1_name\"";

        $sql_topic ="SELECT `resource_topic` FROM `educational_reource`
        left join module_l1 as m1 on m1.module_id=educational_reource.Module_id 
        left join module_l2 as m2 on educational_reource.moduleL2_id = m2.moduleL2_id
        WHERE m1.module_name = \"$moduleL1_name\"";
    }
}else if($kw){
    $sql_moudule = "SELECT `resource_id`,`resource_title`,`cover_of_resource`
    FROM `educational_reource`
    left join module_l1 as m1 on m1.module_id=educational_reource.Module_id 
    left join module_l2 as m2 on educational_reource.moduleL2_id = m2.moduleL2_id
    left join user as user on educational_reource.user_id = user.user_id
    WHERE (resource_title LIKE '%$kw%') OR (m1.`module_name` LIKE '%$kw%') 
    OR (m2.`module_name` LIKE '%$kw%') OR (username LIKE '%$kw%') OR (date LIKE '%$kw%')
    OR (resource_topic LIKE '%$kw%') OR (description LIKE '%$kw%')";

    $sql_topic ="SELECT `resource_topic` FROM `educational_reource`
    left join module_l1 as m1 on m1.module_id=educational_reource.Module_id 
    left join module_l2 as m2 on educational_reource.moduleL2_id = m2.moduleL2_id
    left join user as user on educational_reource.user_id = user.user_id
    WHERE (resource_title LIKE '%$kw%') OR (m1.`module_name` LIKE '%$kw%') 
    OR (m2.`module_name` LIKE '%$kw%') OR (username LIKE '%$kw%') OR (date LIKE '%$kw%')
    OR (resource_topic LIKE '%$kw%') OR (description LIKE '%$kw%')";
}else{
    $sql_moudule = "SELECT `resource_id`,`resource_title`,`cover_of_resource`
    FROM `educational_reource`";

    $sql_topic ="SELECT `resource_topic` FROM `educational_reource`";
}
$option1 = "Most Recent";
$option2 = "resource title(increase)";
$option3 = "resource title(decrease)";

//switch for the option to sort by:
switch (urldecode($sortBy)) {
    case $option1:
        //option1:
        //echo "Most Recent";
        $sql_moudule.=" ORDER BY `date` DESC";
        break;
    case $option2:
        //option2:
        //echo "resourcetitle(increase)";
        $sql_moudule.=" ORDER BY `resource_title` ASC";
        break;
    case $option3:
        // option3:
        //echo "resourcetitle(decrease)";
        $sql_moudule.=" ORDER BY `resource_title` DESC";
        break;
    default:
        // By default, if sortBy doesn't match any case, then do this
        $sql_moudule;
        break;
}

//echo $sql_moudule;

$res=$conn->query($sql_moudule);
$moudule_list=[];
while($data=$res->fetch_assoc()){
    array_push($moudule_list,$data);
}

//print_r($moudule_list);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" >
        <meta name="viewport" content="width=device-width,initial-scale=1.0" >
        <title>MODULES</title>
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
            include("header1.php");
        }
        
        ?>

        <!--content-->
        <div class="content_container" >
            <!--first line for modules name: show the name for the modules-->
            <div class="showMo">
                <i class="bx bx-chevron-down bx-rotate-90 left-btn" title="back to last page" alt="back to last page" onclick="backtolast()" ></i>
                <p>Modules<?php if($moduleL1_name) echo " > ".$moduleL1_name; ?> <?php if($moduleL2_name) echo ">".$moduleL2_name; ?><?php if($kw) echo ">".$kw; ?></p> <!--will show by php by level in get method-->
            </div>
            <!--show the resource for the modules-->
            <div class="showResource" >
                <!--one for the sort in left hand site-->
                <div class="leftCol" >
                    <!--sort -->
                    <!--<form id="sortForm" action="<?php echo htmlspecialchars($currentUrl); ?>" method="GET">-->
                    <form id="sortForm" action="<?php echo $currentUrl; ?>" method="GET">
                        <?php if($kw){ ?><input name="kw" type="hidden" value="<?php echo $kw; ?>" > <?php } ?>
                        <?php if($moduleL1){ ?><input name="module1" type="hidden" value="<?php echo $moduleL1; ?>" > <?php } ?>
                        <?php if($moduleL2){ ?><input name="module2" type="hidden" value="<?php echo $moduleL2; ?>" > <?php } ?>
                        <label for="sortBy">Sort By:</label>
                        <select id="sortBy" name="sortBy" onchange="this.form.submit()">
                            <?php
                                //  Defining an array of options
                                $options = array("Title", $option1, $option2,$option3);

                                // Iterate through the options array to generate options
                                foreach ($options as $option) {
                                    // Get the value of the current option
                                    /*$optionValue = strtolower(str_replace(' ', '', $option));*/ // Generate a value without spaces，eg：option1、option2 etc
                                    $optionValue = urlencode($option);
                                    // Output Options
                                    echo "<option value=\"$optionValue\"";
                                    
                                    // If the current sortBy parameter exists and has the same value as the current option, the option is checked.
                                    if (isset($_GET['sortBy']) && $_GET['sortBy'] == $optionValue) {
                                        echo " selected";
                                    }
                                    
                                    echo ">$option</option>";
                                }
                            ?>
                        </select>
                    </form>

                    <!--
                    <div class="Topic" >
                        <h3>By Topic</h3>
                            <a><p>Basic Geometry Concepts</p></a>
                            <a><p>Geometrics Shape</p></a>
                            <a><p>Lines and Angles</p></a>
                    </div>
                    -->
                </div>
                <!--one for show the model in fight hand site-->
                <div class="rightCol canvas" >
                <?php
                if ($res && $res->num_rows > 0) {
                ?>
                    <?php foreach($moudule_list as $val){
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
        <?php
            include("footer.php")
        ?>
    </body>
    <script src="script.js"></script>
</html>