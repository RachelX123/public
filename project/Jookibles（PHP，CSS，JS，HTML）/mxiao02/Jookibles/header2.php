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
?>
<header class="header">
    <a href="#home" class="logo"><span><b>Jookibles</b></span></a>

    <div id="menu-btn" class="fas fa-bars"></div>

    <nav class="navbar">
        <ul>
            <li><a href="index.php">BOOK</a></li>
            <!--show all book-->
            <li><a href="account.php">HOME</a></li>
            <li><a href="account.php?kw=review">REVIEW</a></li>
            <li><a href="account.php?kw=like">FAVOURITE</a></li>
        </ul>
    </nav>
    <?php
    if (!empty($username)) {
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
        <form action="BooK.php" class="search-form" method="GET">
            <input type="search" id="search-box" name="kw" placeholder="search here...">
            <label class="fas fa-search"><input id="search" type="submit" name="submit"></label>
        </form>
        <form action="" class="login-form">
            <h3><?php echo $username ?></h3>
            <p><a href="login/login-register.php">PlEASE LOGIN</a></p>
        </form>

    <?php
    }
    ?>

</header>