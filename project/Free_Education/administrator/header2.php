<?php

//header for administration
include('../db.php');

$username = isset($_SESSION["username"])?$_SESSION["username"]:'';
$user_id=isset($_SESSION["user_id"])?$_SESSION["user_id"]:'';
$user_type = isset($_SESSION["user_type"])?$_SESSION["user_type"]:'';
if(!$user_id && $user_type!=4){
    // if not login mention administrator need to login and jump to login page
    echo "<script>alert('Please Login');location.href='../login-page/login.php'</script>";
}
?>
<header class="header1">
    <div class="brand">
        
        <div class="brand1">
            <div class="study_icon"><!--home icon-->
                <span class="home_icon" aria-label="study icon" onclick="canvasTo('index.php')" ></span>
                <span class="icon_font">Free Education</span>
            </div>
        </div>
        <div class="brand2">
        <?php
        include('../db.php');
                //login in
                
        ?>    
            <a href="../login-page/logout.php" class='bx bx-log-out bx-flip-horizontal user_icon' ></a>
        </div>
    </div>
    <div class="gradient-line"></div>
    <div class="brand-n">
        <div class="navbar">
            <ul>
                <li>
                    <a href="../administrator/index.php" class="item_link">Resource</a>
                </li>
                <li>
                    <a href="../administrator/user.php" class="item_link">User</a>
                </li>
                <li>
                    <a href="../administrator/comment.php" class="item_link">Comment</a>
                </li>
                <li>
                    <a href="../administrator/student.php" class="item_link">Student</a>
                </li>
                <li>
                    <a href="../administrator/teacher.php" class="item_link">Teacher</a>
                </li>
            </ul>
        </div>
        <div class="UnitedNationsLabel" >
            <img src="https://aishahhelp.com/wp-content/uploads/2019/03/Education-01.png"/>
        </div>
    </div>
</header>
<header class="mobile-header">
            <div class="mobile-header-dropdown" onclick="openMenu()">
                <div class="open-lines">
                    <div class="open-line"></div>
                    <div class="open-line"></div>
                    <div class="open-line"></div>
                </div>
                <img class="close-lines" src="../Content/x-button.png">
            </div>
            
            <div class="flex flex-center mobile-header-center">
                <img class="mobile-header-logo" src="study.png" onclick="canvasTo('index.php')" />
                <a class="mobile-header-free icon_font">Free Education</a>
                <!--
                <img class="mobile-header-free" src="./images/FreeEducation.png" />-->
            </div>
            
            
                <?php
                include('../db.php');
                        //login in
                        if ($user_id !='') { 
                ?> 
                <div class="brand2 brand-login">   
                    <a href="../login-page/logout.php" class='bx bx-log-out bx-flip-horizontal user_icon' ></a>
                </div>
                
                <?php
                        }else{  
                ?>
                <div class="brand2 brand-login flex">
                    <a href="../login-page/login.php" class="login">Log in</a>
                    <a href="../login-page/register.php" class="log_icon signup">Sign Up</a>
                </div>
                <?php
                        }
                ?>
                <!--
                <div class="login">Log In</div>
                <div class="signup">Sign Up</div>-->
                <!-- <a href="../login-page/userpage.php" class='bx bx-user-circle user_icon'></a>
                <a href="../login-page/logout.php" class='bx bx-log-out bx-flip-horizontal user_icon' ></a> -->
            

             <div class="dropdown-menu">
                <div class="brand-dropdown">
                    <div class="navbar">
                        <ul>
                            <li class="navbar-li">
                                <a href="../administrator/index.php" class="item_link">Resource</a>
                            </li>
                            <li class="navbar-li">
                                <a href="../administrator/user.php" class="item_link">User</a>
                            </li>
                            <li class="navbar-li">
                                <a href="../administrator/comment.php" class="item_link">Comment</a>
                            </li>
                            <li class="navbar-li">
                                <a href="../administrator/student.php" class="item_link">Student</a>
                            </li>
                            <li class="navbar-li">
                                <a href="../administrator/teacher.php" class="item_link">Teacher</a>
                            </li>
                        </ul>
                    </div>
                        <div class="UnitedNationsLabel"  >
                            <img src="https://aishahhelp.com/wp-content/uploads/2019/03/Education-01.png"/>

                </div>
            </div>
            
</header>