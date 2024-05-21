<?php
//resource page:
session_start();
include('../db.php');

$username = isset($_SESSION["username"])?$_SESSION["username"]:'';
$user_id=isset($_SESSION["user_id"])?$_SESSION["user_id"]:'';
$user_type = isset($_SESSION["user_type"])?$_SESSION["user_type"]:'';
$kw = isset($_GET["kw"])?$_GET["kw"]:'';
$kw= htmlspecialchars(addslashes($kw), ENT_QUOTES, 'UTF-8');
//echo "kw:".$kw;
if($kw){
    $sql_manage = "SELECT `resource_id`,`resource_title`
    FROM `educational_reource`
    left join module_l1 as m1 on m1.module_id=educational_reource.Module_id 
    left join module_l2 as m2 on educational_reource.moduleL2_id = m2.moduleL2_id
    left join user as user on educational_reource.user_id = user.user_id
    WHERE (resource_title LIKE '%$kw%') OR (m1.`module_name` LIKE '%$kw%') 
    OR (m2.`module_name` LIKE '%$kw%') OR (username LIKE '%$kw%') OR (date LIKE '%$kw%')
    OR (resource_topic LIKE '%$kw%') OR (description LIKE '%$kw%') OR (resource_id LIKE '%$kw%')";
}else{
    $sql_manage = "SELECT `resource_id`,`resource_title` 
    FROM educational_reource";
}

$res=$conn->query($sql_manage);
$manage_list=[];
while($data=$res->fetch_assoc()){
    array_push($manage_list,$data);
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" >
        <meta name="viewport" content="width=device-width,initial-scale=1.0" >
        <title>ADEMINISTRATION</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Italianno&family=Itim&family=Jost&display=swap" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <link rel="stylesheet" href="../Content/style.css" >
    </head>
    <body>
    <?php
            include("header2.php");
  
        
    ?>

        <!--content:-->
        <div class="content_container" >
            <div class="creater" >
                <i class="bx bx-chevron-down bx-rotate-90 left-btn returnBut" title="back to last page" alt="back to last page" onclick="backtolast()" ></i>
                <div class="showTitle" >
                    <h1>ADEMINISTRATION</h1>
                    <h2>Resource</h2>
                    <p>Thank you for managerial the resource</p>

                    <div class="center" >
                        <form action="" class="search_bar" method="GET">
                            <i class='bx bx-search' id="bar"><input id="search" type="submit" name="submit"></i>
                            <input class="input_field" style="box-shadow: 0 0 0 0;" name="kw" type="search" placeholder="Search by Keyword" required="required"> 
                        </form>
                    </div>
                </div>

                
   
                

                <?php
                if ($res && $res->num_rows > 0){
                ?>

                <div class="manager_container" >
                    <div class="sho_id" >
                        <p>id</p>
                    </div>
                    <div class="titleName" style="background-color: transparent;" >
                        <p style="color: black;" >resource_title</p>
                    </div>
                    <div class="chooseed" style='visibility: hidden;' >
                        <div class="edit">
                            <a href="../Content/edit.php?resource=<?php echo $val['resource_id']; ?>">Edit</a>
                        </div>
                        <div class="remove" onclick="removeItem('<?php echo $val['resource_id']; ?>')">

                            <p>REMOVE</p>
                        </div>
                    </div>
                </div> 
                <?php 
                    foreach($manage_list as $val){
                ?>

                



                <div class="manager_container" >
                    <div class="sho_id" >
                        <p><?php echo $val['resource_id']; ?></p>
                    </div>
                    <div class="titleName" >
                        <p><?php echo $val['resource_title'] ?></p>
                    </div>
                    <div class="chooseed">
                        <div class="edit">
                            <a href="../Content/edit.php?resource=<?php echo $val['resource_id']; ?>">Edit</a>
                        </div>
                        <div class="remove" onclick="removeItem('<?php echo $val['resource_id']; ?>', 'resource')">
                            <p>REMOVE</p>
                        </div>
                    </div>
                </div>
                <?php
                    }
                }else{?>
                    <p>no resource</p>

                    <p>There is no resource in database.</p>
                <?php } 
                ?>
                
                    
                </div>





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