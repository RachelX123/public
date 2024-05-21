<?php
session_start();
include('../db.php');

$username = isset($_SESSION["username"])?$_SESSION["username"]:'';
$user_id=isset($_SESSION["user_id"])?$_SESSION["user_id"]:'';
$user_type = isset($_SESSION["user_type"])?$_SESSION["user_type"]:'';



$sql_manage = "SELECT `resource_id`,`resource_title` FROM educational_reource WHERE user_id = \"$user_id\";";

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
        <title>MANAGER</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Italianno&family=Itim&family=Jost&display=swap" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css" >
    </head>
    <body>
    <?php
        if($user_id!=''){
            if($user_type != 4){
                include("header1.php");
            }else{
                include("../administrator/header2.php");
            }
        }else{
            include('header1.php');
        }
        
    // session expire
    if(!$user_id){
    ?>
    <script>
        alert('Session expire Please Login.');
        window.location.href = 'creater.php';
    </script>
    
    <?php
    }
    ?>

        <!--content:-->
        <div class="content_container" >
            <div class="creater" >
                <i class="bx bx-chevron-down bx-rotate-90 left-btn returnBut" title="back to last page" alt="back to last page" onclick="backtolast()" ></i>
                <div class="showTitle" >
                    <h3>Creater</h3>
                    <p>Can manage educational resource.</p>
                    <p>Thank you for contributing to equal educational opportunity!</p>
                </div>

                <?php
                if ($res && $res->num_rows > 0){
                    foreach($manage_list as $val){
                ?>
                <div class="manager_container" >
                    <div class="titleName" >
                        <p><?php echo $val['resource_title'] ?></p>
                    </div>
                    <div class="chooseed">
                        <div class="edit">
                            <a href="edit.php?resource=<?php echo $val['resource_id']; ?>">Edit</a>
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

                    <p>You only can manage resource you have upload</p>
                <?php } 
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