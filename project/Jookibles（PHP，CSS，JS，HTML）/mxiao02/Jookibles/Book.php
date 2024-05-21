<?php
//show book list:
session_start();
//get login info:
$username = $_SESSION['username'];
$user_id = $_SESSION['user_id'];
$user_type = $_SESSION['user_type'];
//connect db:
include('conn.php');
include('get.php');
//get keyword by url 
/*
set show All book show by genre new book and by searching kw is for search in the db query
 */
$kw = $_GET['kw'];

//becuase they has special symbol cannot indentiy by GET method;

if ($kw === 'Fairy Tales Folklore') {
    $kw = 'Fairy Tales & Folklore';
}
if ($kw === 'Fashion Beauty') {
    $kw = 'Fashion & Beauty';
}
if ($kw === 'Loners Outcasts') {
    $kw = 'Loners & Outcasts';
}
if ($kw === 'PeoplePlaces') {
    $kw = 'People & Places';
}
if ($kw === 'SchoolEducation') {
    $kw = 'School & Education';
}
if ($kw === 'ScienceNature') {
    $kw = 'Science & Nature';
}
if ($kw === 'ScienceNature') {
    $kw = 'Sports & Recreation';
}
if ($kw === 'Sports Recreation') {
    $kw = 'Sports & Recreation';
}
if ($kw === 'ThrillersSuspense') {
    $kw = 'Thrillers & Suspense';
}
if ($kw === 'TravelTransportation') {
    $kw = 'Travel & Transportation';
}
if ($kw === 'WarMilitary') {
    $kw = 'War & Military';
}
if ($kw === 'WerewolvesShifters') {
    $kw = 'Werewolves & Shifters';
}
if ($kw === 'WerewolvesShifters') {
    $kw = 'Werewolves & Shifters';
}


/**
 * show three different button for user:
 * 1.loginlike button: when people haven't login click this button will jump to login page
 * 2.like button: user has login and haven't fav this book can add it to their fav
 * 3.unlike button: user has fav this book check it by db fav table by userid and bookid
 */
if(isset($_POST['loglike'])){
    header("Location:login/login-register.php");
}
if(isset($_POST['like'])){
    $user_id=$_POST['uid'];
    $bid=$_POST['b_id'];
    $date = date('Y-m-d H:i:s');
    $up = "INSERT INTO favourite (user_id, b_id, date) VALUES ($user_id,$bid, '$date')";
    $conn->query($up);
}

if(isset($_POST['unlike'])){
    $bid=$_POST['b_id'];
    $de= "DELETE FROM favourite WHERE b_id=$bid AND user_id = $user_id";
    $conn->query($de);$conn->query($de);

}

//this is not just show to user donn't need to check login 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jookibles</title>
    <!--font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
    <!--custom css file link-->
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="shortcut icon" href=" img/open-book.png" title="Icons made by Freepik from https://www.freepik.com" type="image/x-icon" />
</head>

<body>
    <?php
    include('header1.php');//header for book list page
    ?>

    <!--content-->
    <!--because their has form if go back to last page need to refresh-->
    <div id="k"><a href="javascript:window.location.replace(document.referrer);" id="Back" class="btn">Back</a></div>
    <section class="show" id="genre">
    <h1 class="heading"> <span><?php echo $kw ?></span> </h1>
        
        
            <?php
            //show all book:
            $kw = $conn->real_escape_string($kw);
            if($kw =='All'){
                include('errorhandle.php');
                include('showAll.php');
            }else if($kw=="NEWBOOK"){
                include('new.php');
            }else if(!empty($kw)){
                include('showgenre.php');
                if (empty($contentgenre)) {
                    include('search.php');
                }
            }else{
                echo "<h3>NEED KEY WORD!</h3>";
            }
            
            ?>

        

    </section>





    <?php
    include('footer.php');
    ?>

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!--js file link-->
    <script src="JS/script.js"></script>

</body>

</html>