<?php
//header
//get genre
include('conn.php');
$show_sql = "SELECT genre FROM pr2genre";
$sh = $conn->query($show_sql);
$show = array();
while ($datash = $sh->fetch_assoc()) {
    array_push($show, $datash);
}
$sql_genre = "SELECT * FROM pr2genre";
$gen = getfromdb($sql_genre,$conn);
?>
<header class="header">
    <a href="#home" class="logo"><span><b>Jookibles</b></span></a>

    <div id="menu-btn" class="fas fa-bars"></div>

    <nav class="navbar">
        <ul>
            <li><a href="index.php">Home</a></li>
            <!--show all book-->
            <li><a href="Book.php?kw=All">All</a></li>
            <li><a href="#genre">genre</a>
                <ul>
                <?php
                    foreach ($gen as $row){
                        $gen = $row['genre'];
                        $g_url = $row['g_url'];
                        //echo "<p>genre: $gen</p> 
                        //<p>link $g_url</p>";
                        //because specail sybom url
                        if($gen=='Fairy Tales & Folklore'){
                            $genr = 'Fairy Tales Folklore';
                        }else if($gen=='Fashion & Beauty'){
                            $genr = 'Fashion Beauty';
                        }else if($gen=='Loners & Outcasts'){
                            $genr = 'Loners Outcasts';
                        }else if($gen=='People & Places'){
                            $genr = 'PeoplePlaces';
                        }
                        else if($gen =='School & Education'){
                            $genr = 'SchoolEducation';
                        }
                        else if($gen =='Science & Nature'){
                            $genr='ScienceNature';
                        }
                        else if($gen =='Sports & Recreation'){
                            $genr='Sports Recreation';
                        }else if($gen =='Thrillers & Suspense'){
                            $genr='ThrillersSuspense';
                        }else if($gen=='Travel & Transportation'){
                            $genr='TravelTransportation';
                        }else if($gen=='War & Military'){
                            $genr='WarMilitary';
                        }else if($gen=='Werewolves & Shifters'){
                            $genr='WerewolvesShifters';
                        }else{
                            $genr=$gen;
                        }

                        ?>
                        <li><a href='Book.php?kw=<?php echo $genr?>'><?php echo $genr ?></a></li>
                        <?php
                    }
                    ?>
                    <?php
                    /*
                        foreach ($show as $row) {
                            $name = $row['genre'];
                        ?>
                        <li><a href='<?php echo "Book.php?kw=$name"; ?>'><?php echo $name ?></a></li>
                    <?php
                        }
                    */ ?>
                </ul>
            </li>
            <li><a href="Book.php?kw=NEWBOOK">NewBook</a></li>
        </ul>
    </nav>
    <?php
    if (!empty($username) & $user_type==2) {
    ?>
        <div class="icons">
            <div class="fas fa-search" id="search-btn"></div>
            <div class="fas fa-user" id="login-btn"></div>
            <a href="account.php?kw=like" style="color: black;"><div class="fas fa-heart" id="like"></div></a>
        </div>
        <form action="Book.php" class="search-form" method="GET">
            <input type="search" id="search-box" name="kw" placeholder="search here...">
            <label class="fas fa-search"><input id="search" type="submit" name="submit"></label>
        </form>
        <form action="" class="login-form">
            <h3><?php echo $username ?></h3>
            <p><a href="account.php">ACCOUNT</a></p>
            <p><a href="Signout.php">Logout</a></p>
        </form>

    <?php
    } else {
    ?>
        <div class="icons">
            <div class="fas fa-search" id="search-btn"></div>
            <div class="fas fa-user" id="login-btn"></div>
        </div>
        <form action="Book.php" class="search-form" method="GET">
            <input type="search" id="search-box" name="kw" placeholder="search here...">
            <label class="fas fa-search"><input id="search" type="submit" name="submit"></label>
        </form>
        <form action="" class="login-form">
            <h3> </h3>
            <p><a href="login/login-register.php">PlEASE LOGIN</a></p>
        </form>

    <?php
    }
    ?>

</header>