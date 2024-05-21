<?php

?>
<div>
    <div>
        <form action="searchfored.php" method="GET">
            <ul class="topnav nav" id="myTopnav2">
                <li><a class="brand">Jookibles</a></li>
                <li><a href="index.php" class="active">Home</a></li>
                <?php
                if ($do == 'addbook' || $do == 'addGen' || $do == 'editbook' || $do == 'editGen' || $do == 'delect' || $do == 'forbook' || $bresult == 'suc' || $do == 'search') {
                ?>
                    <li><a href="edit.php?do=manage" class="active">MANAGE</a></li>
                <?php
                }
                if ($do == 'account' || $do == 'review' || $do == 'manage' || $mresult == 'suc' || $do == 'search') {
                ?>
                    <li><a href="edit.php?do=forbook" class="active">FOR BOOK</a></li>
                <?php
                }
                if ($do == 'account') {
                ?>
                    <li class="inpbox"><input id="box" type="text" name="searchuser" placeholder="search user by keyword or id to edit"></li>
                    <li class="inpbox2"><input id="search" type="submit" value="search"></input></li>
                <?php
                }else if($do =='delect'){
                    ?>
                    <li class="inpbox"><input id="box" type="text" name="searchdelect" placeholder="search book by keyword or id to delect"></li>
                    <li class="inpbox2"><input id="search" type="submit" value="search"></input></li>
    
               <?php } 
                else {
                ?>
                    <li class="inpbox"><input id="box" type="text" name="search" placeholder="search book by keyword or id to edit"></li>
                    <li class="inpbox2"><input id="search" type="submit" value="search"></input></li>

                <?php }
                if (isset($_SESSION['user_id'])) : ?>
                    <li id="log"><a href="../login/Sign out.php">Sign out</a></li>
                <?php else : ?>
                    <li id="log"><a href="../login/login-register.php"> Sign in</a></li>
                <?php endif ?>
                <li class="-icon">
                    <a href="javascript:void(0);" onclick="topnav('myTopnav2')">三</a>
                </li>
            </ul>
        </form>
    </div>