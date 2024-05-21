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
$gener = getfromdb($sql_genre,$conn);
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
                    foreach ($gener as $row){
                        $gener = $row['genre'];
                        $g_url = $row['g_url'];
                        //echo "<p>genre: $gen</p> 
                        //<p>link $g_url</p>";
                        //because specail sybom url
                        if($gener=='Fairy Tales & Folklore'){
                            $genre = 'Fairy Tales Folklore';
                        }else if($gener=='Fashion & Beauty'){
                            $genre = 'Fashion Beauty';
                        }else if($gener=='Loners & Outcasts'){
                            $genre = 'Loners Outcasts';
                        }else if($gener=='People & Places'){
                            $genre = 'PeoplePlaces';
                        }
                        else if($gener =='School & Education'){
                            $genre = 'SchoolEducation';
                        }
                        else if($gener =='Science & Nature'){
                            $genre='ScienceNature';
                        }
                        else if($gener =='Sports & Recreation'){
                            $genre='Sports Recreation';
                        }else if($gener =='Thrillers & Suspense'){
                            $genre='ThrillersSuspense';
                        }else if($gener=='Travel & Transportation'){
                            $genre='TravelTransportation';
                        }else if($gener=='War & Military'){
                            $genre='WarMilitary';
                        }else if($gener=='Werewolves & Shifters'){
                            $genre='WerewolvesShifters';
                        }else{
                            $genre=$gener;
                        }

                        ?>
                        <li><a href='Book.php?kw=<?php echo $genre?>'><?php echo $genre ?></a></li>
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
            <li><a href="#recommend">Recommend</a></li>
            <li><a href="#New">NewBook</a></li>
        </ul>
    </nav>
    <?php
    if (!empty($username) & $user_type ==2) {
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
            <a href="account.php?kw=like" style="color: black;"><div class="fas fa-heart" id="like"></div></a>


        </div>
        <form action="Book.php" class="search-form" method="GET">
            <input type="search" id="search-box" name="kw" placeholder="search here...">
            <label class="fas fa-search"><input id="search" type="submit" name="submit"></label>
        </form>

        <form action="" class="login-form">
            <p><a href="login/login-register.php">PlEASE LOGIN</a></p>
        </form>

    <?php
    }
    ?>

</header>