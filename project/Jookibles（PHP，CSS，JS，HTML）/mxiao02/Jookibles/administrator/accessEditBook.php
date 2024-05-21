<?php
session_start();
$user_id = $_SESSION['user_id'];
$b_id = $_GET['id'];
$user_type = $_SESSION['user_type'];
if (!empty($user_id) &$user_type==1) {

    if (isset($_POST['submit'])) {
        $etitle = $_POST['etitle'];
        $eauthor = $_POST['eauthor'];
        $epublisher = $_POST['epublisher'];
        $epuDate = $_POST['epuDate'];
        $eidentifier = $_POST['eidentifier'];
        $ecategories = $_POST['ecategories'];
        $esnippet = $_POST['esnippet'];
        $epagecount = $_POST['epagecount'];
        $eprice = $_POST['eprice'];
        if(!empty($eprice)){
            $eprice = $eprice;
        }else{
            $eprice = 0;
        }
        $egenre = $_POST['egenre'];
        $edescription = $_POST['edescription'];
        $ethumbnailURI = $_POST['ethumbnailURI'];
        $einfoURI = $_POST['einfoURI'];
        $epreview = $_POST['epreview'];
        $eapi = $_POST['eapi'];

        //echo "<p>b_id: $b_id</p>";
        $conn = mysqli_connect('mxiao02.webhosting2.eeecs.qub.ac.uk', 'mxiao02', 'm497XYh1nGWbHK3m', 'mxiao02');
        //get genre id :
        $gen_sql = "SELECT id FROM pr2genre WHERE genre='$egenre'";
        $get = $conn->query($gen_sql);
        $gen = mysqli_fetch_array($get);
        //print_r($gen);
        $gen_id = $gen['id'];
        //echo "<p>gen_id: $gen_id</p>";

        //get author id:
        $au_sql = "SELECT author_id FROM author WHERE author=\"'$eauthor'\"";
        $get = $conn->query($au_sql);
        $au = mysqli_fetch_array($get);
        if (!empty($au)) {
            $au_id = $au['author_id'];
            //echo "<p>au_id : $au_id</p>";
        } else {
            //echo "ADD authors";
            $add_au  = "INSERT INTO `author`(`author`) VALUES (\"'$authors'\")";
            $get1 = $conn->query($add_au);
            $au_sql1 = "SELECT author_id FROM author WHERE author=\"'$authors'\"";
            $get2 = $conn->query($au_sql1);
            $au1 = mysqli_fetch_array($get2);
            //print_r($au1);
            $au_id = $au1['author_id'];
            // echo "<p> au_id :$au_id</p>";
        }

        //publisher id:
        $pu_sql = "SELECT pu_id FROM `publisher` WHERE name=\"$epublisher\"";
        $get_pu = $conn->query($pu_sql);
        $pu = mysqli_fetch_array($get_pu);
        if (!empty($pu)) {
            $pu_id = $pu['pu_id'];
            //echo "pu_id :$pu_id";
        } else {
            //echo "ADD publisher";
            $add_pu = "INSERT INTO `publisher` (`name`) VALUES ('$publisher')";
            $get_pu1 = $conn->query($add_pu);
            $pu_sql1 = "SELECT pu_id FROM `publisher` WHERE name='$publisher'";
            $get_pu2 = $conn->query($pu_sql1);
            $pu1 = mysqli_fetch_array($get_pu2);
            //echo "$pu1";
            $pu_id = $pu1['pu_id'];
            //echo "<p>pu_is :$pu_id</p>";
        }
        //echo " $b_id,$etitle, $eauthor, $epublisher, $epuDate, $eidentifier,$ecategories, $esnippet, $epagecount,  $eprice, $egenre, $edescription, $ethumbnailURI, $einfoURI,  $epreview, $eapi";
        $update_sql = "UPDATE `project` SET `apiURI`=\"$eapi\",`title`=\"$etitle\",`authors`=\"$au_id\",`publisher`=\"$pu_id\",`publishedDate`=$epuDate,`description`=\"$edescription\",`identifier`=\"$eidentifier\",`pageCount`=$epagecount,`categories`=\"$ecategories\",`thumbnailURI`=\"$ethumbnailURI\",`previewURI`=\"$epreview\",`infoURI`=\"$einfoURI\",`snippet`=\"$esnippet\",`price`=$eprice,`genre`=$gen_id WHERE `b_id`=$b_id";
        echo $update_sql;
        $update = $conn->query($update_sql);
        header('Location:edit.php?bresult=suc');
    }
} else {
    header('Location:../login/login-register.php');
}
