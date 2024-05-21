<header class="header1">
    <div class="brand">
        <div class="brand1">
            <div class="study_icon"><!--home icon-->
                <span class="home_icon" aria-label="study icon" onclick="canvasTo('index.php')" ></span>
                <span class="icon_font">Free Education</span>
            </div>
            
                <form action="modules.php" class="search_bar" method="GET">
                    <i class='bx bx-search' id="bar"><input id="search" type="submit" name="submit"></i>
                    <input class="input_field" style="box-shadow: 0 0 0 0;" name="kw" type="search" placeholder="Search by Keyword" required="required"> 
                </form>
            
        </div>
        <div class="brand2">
        <?php
        include('../db.php');
                //login in
                if ($user_id !='') { 
        ?>    
            <a href="userpage.php" class='bx bx-user-circle user_icon'></a>
            <a href="../login-page/logout.php" class='bx bx-log-out bx-flip-horizontal user_icon' ></a>
        <?php
                }else{  
        ?>
            <a href="../login-page/login.php" class="log_icon">Log in</a>
            <a href="../login-page/register.php" class="log_icon signup">Sign Up</a>
        <?php
                }
        ?>
        </div>
    </div>
    <div class="gradient-line"></div>
    <div class="brand-n">
        <div class="navbar">
            <ul>
                <li class="navbar-li">
                    <a href="modules.php" class="item_link">Modules</a>
                    <ul class="level_two" > <!--level 2 menu-->
                        <?php
                            $sql = "SELECT * FROM `module_l1`;";
                            $module_l1_list=$conn->query($sql);
                            foreach($module_l1_list as $val){ ?>
                            <li>
                            <a href="modules.php?module1=<?php echo urlencode($val['module_name']);?>" class="item_link"><?php echo $val['module_name']; ?></a>
                            <ul class="level_three" > <!--level 3 menu-->
                            <?php
                                $module_id = $val['module_id'];
                                $sql_2 = "SELECT * FROM `module_l2` WHERE `module_id` = '$module_id';";
                                $module_l2_list=$conn->query($sql_2);
                                foreach($module_l2_list as $val2){?>
                                <li><a href="modules.php?module1=<?php echo urlencode($val['module_name']);?>&module2=<?php echo urlencode($val2['module_name']);?>" class="item_link"><?php echo $val2['module_name'] ; ?></a></li>
                            <?php }
                            ?>
                            </ul>
                        </li>
                        <?php }
                        ?>
                    </ul>
                </li>
                <li>
                    <a href="student.php" class="item_link">Student</a>
                </li>
                <li>
                    <a href="teacher.php" class="item_link">Teacher</a>
                </li>
                <li>
                    <a href="creater.php" class="item_link">Creater</a>
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
                <img class="close-lines" src="x-button.png">
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
                    <a href="userpage.php" class='bx bx-user-circle user_icon'></a>
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
                <form action="modules.php" class="search_bar" method="GET">
                    <i class='bx bx-search' id="bar"><input id="search" type="submit" name="submit"></i>
                    <input class="input_field" name="kw" type="search" placeholder="Search by Keyword" required="required"> 
                </form>
                <div class="brand-dropdown">
                    <div class="navbar">
                        <ul>
                            <li class="navbar-li">
                                <a href="modules.php" class="item_link">Modules</a>
                                <ul class="level_two" > <!--level 2 menu-->
                                    <?php
                                        $sql = "SELECT * FROM `module_l1`;";
                                        $module_l1_list=$conn->query($sql);
                                        foreach($module_l1_list as $val){ ?>
                                        <li>
                                        <a href="modules.php?module1=<?php echo urlencode($val['module_name']);?>" class="item_link"><?php echo $val['module_name']; ?></a>
                                        <ul class="level_three" > <!--level 3 menu-->
                                        <?php
                                            $module_id = $val['module_id'];
                                            $sql_2 = "SELECT * FROM `module_l2` WHERE `module_id` = '$module_id';";
                                            $module_l2_list=$conn->query($sql_2);
                                            foreach($module_l2_list as $val2){?>
                                            <li><a href="modules.php?module1=<?php echo urlencode($val['module_name']);?>&module2=<?php echo urlencode($val2['module_name']);?>" class="item_link"><?php echo $val2['module_name'] ; ?></a></li>
                                        <?php }
                                        ?>
                                        </ul>
                                    </li>
                                    <?php }
                                    ?>
                                </ul>
                            </li>
                            <li class="navbar-li">
                                <a href="student.php" class="item_link">Student</a>
                            </li>
                            <li class="navbar-li">
                                <a href="teacher.php" class="item_link">Teacher</a>
                            </li>
                            <li class="navbar-li">
                                <a href="creater.php" class="item_link">Creater</a>
                            </li>
                        </ul>
                    </div>
                        <div class="UnitedNationsLabel"  >
                            <img src="https://aishahhelp.com/wp-content/uploads/2019/03/Education-01.png"/>

                </div>
            </div>
            
</header>