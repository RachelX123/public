<?php
session_start();
$user_id = $_SESSION['user_id'];
$apiURI = '';
$title = '';
$authors = '';
$publisher = '';
$publisherDate = '';
$identifier = '';
$description = '';
$pagecount = 0;
$categories = '';
$averageRating = 0;
$thumbnailURI = '';
$previewURI = '';
$infoURI = '';
$ratingsCount = '';
$snippet = '';
$price = 0;

if (!empty($user_id)) {
    if (isset($_POST['submit'])) {
        //get vairable:
        $title = $_POST['title'];
        $authors = $_POST['author'];
        $publisher = $_POST['publisher'];
        if ($_POST['pdate'] == '') {
            $publisherDate = 0;
        } else {
            $publisherDate = $_POST['pdate'];
        }
        $identifier = $_POST['identifier'];
        $description = $_POST['description'];
        if ($_POST['pagecount'] == '') {
            $pagecount = 0;
        } else {
            $pagecount = $_POST['pagecount'];
        }
        $categories = $_POST['categories'];
        $snippet = $_POST['snippet'];
        if ($_POST['price'] == "") {
            $price = 0;
        } else {
            $price = $_POST['price'];
        }
        $genre = $_POST['genre'];
        $apiURI = $_POST['apiURI'];
        $thumbnailURI = $_POST['thumbnailURI'];
        $previewURI = $_POST['previewURI'];
        $infoURI = $_POST['infoURI'];


        echo "$title, $authors, $publisher, $publisherDate, $identifier, $description, $pagecount, $snippet, $price, $categories, $genre, $apiURI, $thumbnailURI,$previewURI, $infoURI";

        //genre:
        $conn = mysqli_connect('mxiao02.webhosting2.eeecs.qub.ac.uk', 'mxiao02', 'm497XYh1nGWbHK3m', 'mxiao02');
        $gen_sql = "SELECT id FROM pr2genre WHERE genre='$genre'";
        $get = $conn->query($gen_sql);
        $gen = mysqli_fetch_array($get);
        //print_r($gen);
        $gen_id = $gen['id'];
        //echo "<p>$gen_id</p>";

        //authors:
        $au_sql = "SELECT author_id FROM author WHERE author=\"'$authors'\"";
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
            //echo "<p> au_id :$au_id</p>";
        }


        //publisher
        $pu_sql = "SELECT pu_id FROM `publisher` WHERE name=\"$publisher\"";
        $get_pu = $conn->query($pu_sql);
        $pu = mysqli_fetch_array($get_pu);
        if (!empty($pu)) {
            $pu_id = $pu['pu_id'];
            //echo "$pu_id";
        } else {
            //echo "ADD publisher";
            $add_pu = "INSERT INTO `publisher` (`name`) VALUES ('$publisher')";
            $get_pu1 = $conn->query($add_pu);
            $pu_sql1 = "SELECT pu_id FROM `publisher` WHERE name='$publisher'";
            $get_pu2 = $conn->query($pu_sql1);
            $pu1 = mysqli_fetch_array($get_pu2);
            //echo "$pu1";
            $pu_id = $pu1['pu_id'];
            //echo "<p>$pu_id</p>";

        }


        //check exist or not:
        $conn = mysqli_connect('mxiao02.webhosting2.eeecs.qub.ac.uk', 'mxiao02', 'm497XYh1nGWbHK3m', 'mxiao02');
        $check_sql = "SELECT `b_id` FROM `project` WHERE title='$title' 
                    AND authors=$au_id AND publisher=$pu_id
                    AND publishedDate=$publisherDate AND genre=$gen_id";

        echo "<p>$check_sql</p>";

        $check = $conn->query($check_sql);
        /*
    if(!$check){
        echo $conn->error;
    }
    */
        $check_it = mysqli_fetch_array($check);
        //echo "check_it:";
        //print_r($check_it);

        if (empty($check_it)) {
            //insert to db
            $conn = mysqli_connect('mxiao02.webhosting2.eeecs.qub.ac.uk', 'mxiao02', 'm497XYh1nGWbHK3m', 'mxiao02');
            if ($categories == NULL) {
                $sql = "INSERT INTO `project`(`apiURI`, `title`, `authors`, `publisher`, `publishedDate`,`description`, `identifier`, `pageCount`, `categories`, `thumbnailURI`,`previewURI`, `infoURI`, `snippet`, `price`, `genre`, `click`) 
            VALUES ('$apiURI','$title',$au_id,$pu_id,$publisherDate,'$description','$identifier',$pagecount, '','$thumbnailURI', '$previewURI','$infoURI','$snippet',$price,$gen_id,0)";
                echo "<p>$sql</p>";
            } else {
                $sql = "INSERT INTO `project`(`apiURI`, `title`, `authors`, `publisher`, `publishedDate`,`description`, `identifier`, `pageCount`, `categories`, `thumbnailURI`,`previewURI`, `infoURI`, `snippet`, `price`, `genre`, `click`) 
            VALUES ('$apiURI','$title',$au_id,$pu_id,$publisherDate,'$description','$identifier',$pagecount, '\'$categories\'','$thumbnailURI', '$previewURI','$infoURI','$snippet',$price,$gen_id,0)";
            }

            $addbook = $conn->query($sql);
            /*
        if(!$addbook){
            echo $conn->error;
        }
        */
            header("Location:edit.php?bresult=suc");
        } else {
            header("Location:edit.php?bresult=fal");
        }
    }
} else {
    header('Location:../login/login-register.php');
}
