<?php
session_start();
//get login info:
$username = $_SESSION['username'];
$user_id = $_SESSION['user_id'];
//connect db:
$conn = mysqli_connect('mxiao02.webhosting2.eeecs.qub.ac.uk', 'mxiao02', 'm497XYh1nGWbHK3m', 'mxiao02');
$kw = $_GET['kw'];

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
if(isset($_POST['loglike'])){
    
    header("Location:login/login-register.php?");
    $_SESSION['kw'] = 'All';
}

if(isset($_POST['like'])){
    $user_id=$_POST['uid'];
    $bid=$_POST['b_id'];
    $date = date('Y-m-d H:i:s');
    $up = "INSERT INTO favourite (user_id, b_id, date) VALUES ($user_id,$bid, '$date')";
    $conn->$up;
}


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
    include('header1.php');
    ?>

    <!--content-->
    <div id="k"><a href="javascript:history.go(-1);" id="Back" class="btn">Back</a></div>
    <section class="show" id="genre">
    <h1 class="heading"> <span><?php echo $kw ?></span> </h1>
        
        
            <?php
            //show all book:
            if($kw =='All'){
                include('errorhandle.php');
                include('showAll.php');
            }else if($kw=="NEWBOOK"){
                include('new.php');
            }else if(!empty($kw)){
                include('showgenre.php');
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