<?php 
session_start();
include('../db.php');

$username = isset($_SESSION["username"])?$_SESSION["username"]:'';
$user_id=isset($_SESSION["user_id"])?$_SESSION["user_id"]:'';
$user_type = isset($_SESSION["user_type"])?$_SESSION["user_type"]:'';
$kw = isset($_GET["kw"])?$_GET["kw"]:'';
if($kw){
    $sql_manage = "SELECT `user_id`,`username`,u.user_type 
    FROM `user` LEFT JOIN user_type as u on user.user_type=u.user_type_id 
    WHERE ((username LIKE '%$kw%') OR (email LIKE '%$kw%') OR (u.user_type LIKE '%$kw%') 
    OR (age LIKE '%$kw%') OR (gender LIKE '%$kw%') OR (user.user_id LIKE '%$kw%')) AND (u.user_type !=4); ";

}else{
    $sql_manage = "SELECT `user_id`,`username` 
    FROM `user`
    WHERE user_type !=4";
}

//echo "<script>alert($kw->'sql:$sql_manage');</script>";

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
                    <h2>User</h2>
                    <p>Thank you for managerial the user</p>

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
                        <p style="color: black;" >user name</p>
                    </div>
                    <div class="chooseed" style='visibility: hidden;' >
                        <div class="edit">
                            <a >Edit</a>
                        </div>
                        <div class="remove" >
                            <p>REMOVE</p>
                        </div>
                    </div>
                </div>

                <?php
                    foreach($manage_list as $val){
                ?>

                <div class="manager_container" >
                    <div class="sho_id" >
                        <p><?php echo $val['user_id']; ?></p>
                    </div>
                    <div class="titleName" >
                        <p><?php echo $val['username'] ?></p>
                    </div>
                    <div class="chooseed">
                        <div class="edit">
                            <a href="user_edit.php?user=<?php echo $val['user_id']; ?>">Edit</a>
                        </div>
                        <div class="remove" onclick="removeItem('<?php echo $val['user_id']; ?>', 'user')">
                            <p>REMOVE</p>
                        </div>
                    </div>
                </div>
                <?php
                    }
                }else{?>
                    <p>no user</p>

                    <p>There is no user in database.</p>
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