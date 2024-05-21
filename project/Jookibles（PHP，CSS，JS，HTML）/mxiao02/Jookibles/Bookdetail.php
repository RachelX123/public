<?php
session_start();
//get login info:
$username = $_SESSION['username'];
$user_id = $_SESSION['user_id'];
$user_type = $_SESSION['user_type'];
//connect db:
include('conn.php');
$b_id = $_GET['id'];
$bid = $b_id;
include('get.php');
//echo $bid;



//get book details:
$book_sql = "SELECT project.b_id,project.apiURI,project.title,author.author,publisher.name,project.publishedDate,project.description,project.identifier,project.pageCount,project.categories,project.thumbnailURI,project.previewURI,project.infoURI,project.snippet,project.price,pr2genre.genre, project.averageRating, project.ratingsCount FROM project 
INNER JOIN author ON project.authors = author.author_id
INNER JOIN pr2genre ON project.genre = pr2genre.id
INNER JOIN publisher ON project.publisher = publisher.pu_id
WHERE b_id = $bid";

//echo $book_sql;
$content = getfromdb($book_sql,$conn);

$bookName = $content[0]['title']; //This is Array[0][]; Two-dimensionalArray
//echo $bookName;
$api = $content[0]['apiURI']; //don know what 
$authors = substr($content[0]['author'], 1, strlen($content[0]['author']) - 2);
$publisher = $content[0]['name'];
$publishedDate = $content[0]['publishedDate'];
$description = $content[0]['description'];
$identifier = $content[0]['identifier'];
$pageCount = $content[0]['pageCount'];
$categories = substr($content[0]['categories'], 1, strlen($content[0]['categories']) - 2);; 
$averageRating = $content[0]['averageRating']; 
$thumbnailURI = $content[0]['thumbnailURI']; //pic for book
$previewURI = $content[0]['previewURI'];
$infoURI = $content[0]['infoURI'];
$ratingsCount = $content[0]['ratingsCount'];
$price = $content[0]['price'];
$snippet = $content[0]['snippet'];
$genre = $content[0]['genre'];

//get recommend book:
$reco_sql = "SELECT distinct project.title, project.b_id, author.author, publisher.name, project.thumbnailURI, pr2genre.genre FROM project 
INNER JOIN author ON project.authors = author.author_id 
INNER JOIN pr2genre ON project.genre = pr2genre.id 
INNER JOIN publisher ON project.publisher = publisher.pu_id 
WHERE (author.author='$authors' OR publisher.name='$publisher')AND publisher.name!='NULL' AND project.thumbnailURI!='NULL'
group by project.title";
$recommend1 = getfromdb($reco_sql,$conn);
$reco_sql1 = "SELECT distinct project.title, project.b_id, author.author, publisher.name, project.thumbnailURI, pr2genre.genre FROM project 
INNER JOIN author ON project.authors = author.author_id 
INNER JOIN pr2genre ON project.genre = pr2genre.id 
INNER JOIN publisher ON project.publisher = publisher.pu_id 
WHERE pr2genre.genre='$genre' AND publisher.name!='NULL' AND project.thumbnailURI!='NULL'
group by project.title
order by RAND() LIMIT 6";
$recommend2 = getfromdb($reco_sql1,$conn);
//if no 






//get rate for book: 
$showrate_sql = "select rate, SUM(rate) as toal, COUNT(rate) as count from comment WHERE b_id = $bid;";
$ratesh = getfromdb($showrate_sql,$conn);
$total = $ratesh[0]['toal']+$averageRating*$ratingsCount;
$count= $ratingsCount+$ratesh[0]['count'];
$brate =sprintf("%.2f", $total/$count);


//show review for book:(last comment show in the top) 
$review_sql = "SELECT pr2userSystem.username, comment.b_id, project.title, comment.date, comment.comment, comment.rate 
FROM comment INNER JOIN pr2userSystem ON comment.user_id = pr2userSystem.user_id 
INNER JOIN project ON comment.b_id = project.b_id
WHERE comment.b_id = $bid
order by date desc";
$comm = getfromdb($review_sql,$conn);

//check user rate it or not: want to just rate once.
if (!empty($user_id)) {
    $checkre_sql = "SELECT id, comment,rate, date FROM comment WHERE b_id = $bid AND user_id = $user_id";
    $checkre = getfromdb($checkre_sql,$conn);
}



//write revire by user:
if (isset($_POST['comments'])) {
    //check login:
    if (!empty($user_id)) {
        //check user rate it or not: want to just rate once.
        if (empty($checkre)) {
            if (!empty($_POST['star'])) {
                $rate = $_POST['star'];
                $com = $_POST['comments'];
                $date = date('Y-m-d H:i:s');

                $up = "INSERT INTO comment (user_id, b_id, date, comment,rate) VALUES ($user_id,$bid, '$date', '$com',$rate)";
                //echo $up;
                $conn->query($up);
                header("Location:Bookdetail.php?id=$bid");//reflesh this page 
            }
        }
    } else {

        header("Location:login/login-register.php");
        $_SESSION['b_id'] = $bid;//after login jump back this page
    }


    //cho "POST";
}



//favourite
if (isset($_POST['loglike'])) {
    header("Location:login/login-register.php");
    $_SESSION['b_id'] = $_POST['b_id'];
}
if (isset($_POST['like'])) {
    $user_id = $_POST['uid'];
    $bid = $_POST['b_id'];
    $date = date('Y-m-d H:i:s');
    $up = "INSERT INTO favourite (user_id, b_id, date) VALUES ($user_id,$bid, '$date')";
    $conn->query($up);
}
if (isset($_POST['unlike'])) {
    $bid = $_POST['b_id'];
    $de = "DELETE FROM favourite WHERE b_id=$bid AND user_id = $user_id";
    $conn->query($de);
    $conn->query($de);
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
    
    <style type="text/css">
        .star {
            transform: rotateY(180deg) ;
            display: flex;
        }

        .star label {
            margin-top: .6rem;
            padding: .3rem;
            display: block;
            cursor: pointer;
        }

        .star label:before {
            content: '\f005';
            color: rgb(253, 194, 0);
            opacity: 1;
        }

        .star label:after {
            content: '\f005';
            color: rgb(253, 0, 0);
            opacity: 0;
            display: block;
            position: relative;
            top: -1.1rem;

        }

        .star label:hover:after {
            opacity: 1;
        }

        .star label:hover:after,
        .star label:hover~label:after,
        .star input:checked~label:after {
            opacity: 1;
        }
    </style>
</head>

<body>
    <?php
    include('header1.php');
    ?>
    <div id="k"><a href="javascript:window.location.replace(document.referrer);" id="Back" class="btn" style="font-size: 1.2rem; margin-top:2.4rem;margin-bottom:.8rem; padding-bottom:.6rem;">Back</a></div>
    <!--content-->
    <section class="recommend" id="recommend" style="padding-top: 12rem;">
        <div id="name" style="margin-top:0;">
            <h2 class="title"><?php echo $bookName ?></h2>
        </div>
        <div class="book">
            <div class="image">
                <a href="<?php echo $infoURI ?>"><img src="<?php echo $thumbnailURI ?>" alt="<?php echo $thumbnailURI ?>"></a>
            </div>
        </div>
        <div class="content">
            <br>

            <div class="box-container">
                <div class="box">
                    <h3>ID: <?php echo $bid ?></h3>
                    <h3>Identifier: <?php echo $identifier ?></h3>
                    <h3>Author:</h3>
                    <p><?php echo $authors ?></p>
                    <p>Publisher: <?php echo $publisher ?> <span>|</span> Date:<?php echo $publishedDate ?></p>
                    <p>Genre: <?php echo $genre ?></p>
                    <p><?php echo "Categories: $categories" ?></p>
                    <p style="margin-top: .6rem;">
                        <?php
                        if ($brate == 0) {
                            echo 'NO ONE RATE <i class="fas fa-heart-broken" style="font-size: 1.2rem; color:red"></i>';
                        } else if (0 < $brate && $brate <= 1) {
                            echo '<i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>';
                        } else if (1 < $brate && $brate <= 2) {
                            echo '<i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>
                            <i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>';
                        } else if (2 < $brate && $brate <= 3) {
                            echo '<i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>
                            <i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>
                            <i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>';
                        } else if (3 < $brate && $brate <= 4) {
                            echo '<i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>
                            <i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>
                            <i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>
                            <i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>';
                        } else if (4 < $brate && $brate <= 5) {
                            echo '<i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>
                            <i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>
                            <i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>
                            <i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>
                            <i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>';
                        }
                        ?></p>
                    </p>
                </div>

                <div class="box">
                    <p><?php if (!empty($price)) {
                            echo "Price: $price &pound";
                        } else {
                            echo "Price: N/A &pound";
                        } ?></p>
                    <p>Page: <?php echo $pageCount ?></p>
                    
                    
                    <a href="<?php echo "$previewURI" ?>" class="btn" id="pr">preview</a>
                    <div style="margin-top: 1rem; font-size:1.8rem;">
                        <form action="" method="POST">

                            <?php
                            //favoutite button:
                            //check login:
                            if (empty($user_id) || $user_type!=2) {
                            ?>
                                <input type="text" value="<?php echo $bid ?>" name='b_id' style="display: none;">
                                <i class="fas fa-heart" id="fav" style="cursor: pointer;"><input type='submit' value='like' name='loglike' style='position:relative; left:-1.8rem; height:2.4rem; width:3rem;opacity:0;cursor: pointer;'></i>
                                <?php
                            } else {
                                //checl already like:
                                $result_sql = "SELECT b_id, user_id FROM favourite WHERE user_id = $user_id AND b_id =$b_id";

                                $re = getfromdb($result_sql,$conn);
                                if (!empty($re)) {//unlike button
                                ?>
                                    <input type="text" name="b_id" value="<?php echo $b_id ?>" style="display:none;">
                                    <i class="fas fa-heart" id="fav" style="cursor: pointer; color:red;"><input value="UNLIKE" type="submit" name="unlike" style='background-color: red; position:relative; left:-1.8rem; height:2.4rem; opacity:0;cursor: pointer;'></i>
                                <?php
                                } else {//like button
                                ?>
                                    <input type="text" name="uid" value="<?php echo $user_id ?>" style="display:none;">
                                    <input type="text" name="b_id" value="<?php echo $b_id ?>" style="display:none;">

                                    <i class="fas fa-heart" id="fav" style="cursor: pointer;"><input value="LIKE" type="submit" name="like" style='background-color: red; position:relative; left:-1.8rem; height:2.4rem;opacity:0;cursor: pointer;'></i>

                            <?php
                                }
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="box-container">
            <p>snippet:</p>
            <div class="box">
                <h3><?php echo $snippet; ?></h3>
            </div>
            <br>
            <p>Details:</p>
            <div class="box">
                <h3><?php echo $description; ?></h3>
            </div>

        </div>

<?php
if(!empty($user_id) & $user_type==2){
    ?>
     <h3 style="margin-top: 3rem;">RECOMMD BOOK</h3>
        <!-- recommend boook-->
        <div class="swiper new-slider">

            <div class="swiper-wrapper" style="margin-bottom: 3rem;">
                <?php
                if(count($recommend1)>1){
                foreach ($recommend1 as $row) {
                    $b_id2 = $row['b_id'];
                    $author2 = substr($row['author'], 1, strlen($row['author']) - 2);
                    if (strlen($author2) < 25) {
                        $author2 = substr($row['author'], 1, strlen($row['author']) - 2);
                    } else {
                        $author2 = substr($row['author'], 1, 24) . '...';
                    }
                    $title2 = $row['title'];
                    $thumbnailURI2 = $row['thumbnailURI'];
                    $genre = $row['genre'];
                    
                ?>
                    <div class="swiper-slide slide">
                        <div class="image">
                            <a href="<?php echo "Bookdetail.php?id=$b_id2"; ?>"><img src="<?php echo $thumbnailURI2 ?>" alt="<?php echo $thumbnailURI2 ?>"></a>
                        </div>
                        <div class="content">
                            <p><?php echo $author2 ?></p>

                        </div>
                    </div>
                <?php
                }
            }else{
                foreach ($recommend2 as $row) {
                    $b_id2 = $row['b_id'];
                    $author2 = substr($row['author'], 1, strlen($row['author']) - 2);
                    if (strlen($author2) < 25) {
                        $author2 = substr($row['author'], 1, strlen($row['author']) - 2);
                    } else {
                        $author2 = substr($row['author'], 1, 24) . '...';
                    }
                    $title2 = $row['title'];
                    $thumbnailURI2 = $row['thumbnailURI'];
                    $genre = $row['genre'];
                ?>
                    <div class="swiper-slide slide">
                        <div class="image">
                            <a href="<?php echo "Bookdetail.php?id=$b_id2"; ?>"><img src="<?php echo $thumbnailURI2 ?>" alt="<?php echo $thumbnailURI2 ?>"></a>
                        </div>
                        <div class="content">
                            <p><?php echo $author2 ?></p>

                        </div>
                    </div>
                <?php
                }
            }
                ?>

            </div>

            <div class="swiper-pagination" style="padding-top: 3rem;"></div>

        </div>
    <?php
}
?>

       




        <!--write review-->
        <!--
            There are 3 option:
            1. jump to login page
            2. show own review if user has already review this book
            3. input 
        -->
        <div class="box-container" style=" width:100%; margin-top:2.4rem;">
            <div class="box">
                <h3>Write review:</h3>
            </div>
            <div class="box">
                <form action="#" method="POST">

                    <?php
                    if (!empty($user_id) & $user_type==2) {

                        if (!empty($checkre)) {
                            $orate = $checkre[0]['rate'];
                            $rev = $checkre[0]['comment'];
                            $time = $checkre[0]['date'];
                    ?>
                            <p><span>YOUR comment: </span><?php echo $rev ?></p>

                            <p style="margin-top: .8rem;text-align:right;">

                                <?php
                                //show the aleady comment user has put
                                include('showstar.php');
                                ?></p>
                            <p style='margin-top: .8rem;text-align:right;'><?php $time ?></p>
                        <?php
                        } else {
                            //input box for user to input .
                            echo '<textarea type="input" id="box" name="comments" required="required" style=" width: 88%; height:12rem; border: solid;border-width:1px;border-radius: 5px;border-color:silver; padding:0rem; margin-left: 12%;text-align:left;"></textarea>';
                        ?>
                            <div class="star">
                            <div style="transform:rotateY(180deg)">
                                <input type="submit" name="submit" value="comment" class="btn" style="margin-left:1.2rem;margin-top: .6rem; padding: .6rem 1.2rem;padding-right: 1.8rem;background: linear-gradient(130deg, #f00 93%, transparent 90%);color: #fff;cursor: pointer; font-size: .6rem;">
                            </div>
                                <!--use radio to choice rate:-->
                                <input type="radio" name="star" <?php if (isset($star) && $star == "5"); ?> value="5" id="5" style="display:none"><label class="fas fa-star" for="5"></label>
                                <input type="radio" name="star" <?php if (isset($star) && $star == "4"); ?> value="4" id="4" style="display:none"><label class="fas fa-star" for="4"></label>
                                <input required="required" type="radio" name="star" <?php if (isset($star) && $star == "3"); ?> value="3" id="3" style="opacity:0;width:.1rem;margin-top:1rem"><label class="fas fa-star" for="3"></label>
                                <input type="radio" name="star" <?php if (isset($star) && $star == "2"); ?> value="2" id="2" style="display:none"><label class="fas fa-star" for="2"> </label>
                                <input type="radio" name="star" <?php if (isset($star) && $star == "1"); ?> value="1" id="1" style="display:none"><label class="fas fa-star" for="1"></label>
                        </div>
                        <?php
                        }
                    } else {//show user if want to review book need to login
                        echo '<textarea type="input" id="box" name="comments" style=" width: 88%; height:12rem; border: solid;border-width:1px;border-radius: 5px;border-color:silver; padding:0rem; margin-left: 12%;text-align:left;">Plaese login</textarea>';

                        ?>
                        <div class="star">
                        <div style="transform:rotateY(180deg)">
                            <input type="submit" name="submit" value="comment" class="btn" style="margin-left:1.2rem;margin-top: .6rem; padding: .6rem 1.2rem;padding-right: 1.8rem;background: linear-gradient(130deg, #f00 93%, transparent 90%);color: #fff;cursor: pointer; font-size: .6rem;">
                        </div>
                            <input type="radio" name="star" <?php if (isset($star) && $star == "5"); ?> value="5" id="5" style="display:none"><label class="fas fa-star" for="5"></label>
                            <input type="radio" name="star" <?php if (isset($star) && $star == "4"); ?> value="4" id="4" style="display:none"><label class="fas fa-star" for="4"></label>
                            <input type="radio" name="star" <?php if (isset($star) && $star == "3"); ?> value="3" id="3" style="display:none"><label class="fas fa-star" for="3"></label>
                            <input type="radio" name="star" <?php if (isset($star) && $star == "2"); ?> value="2" id="2" style="display:none"><label class="fas fa-star" for="2"> </label>
                            <input type="radio" name="star" <?php if (isset($star) && $star == "1"); ?> value="1" id="1" style="opacity:0;"><label class="fas fa-star" for="1"></label>


                       
                        
                    </div>
                    <?php
                    }

                    ?>


                </form>
            </div>
        </div>



        <!--review-->
        <div class="box-container" style="word-wrap:break-word; width:100%;">
            <!--style="style=word-break:break-all"-->
            <div class="box" style="margin-top:2.4rem;">
                <h3>review:</h3>
            </div>

            <div class="box" style="margin-left: 12%; width:88%; margin-top:.6rem; height:auto; overflow:auto">

                <!--has limit height if more than it-->
                <?php
                foreach ($comm as $row) {
                    $comment = $row['comment'];
                    $date = $row['date'];
                    $uname = $row['username'];
                    $urate = $row['rate'];

                ?>
                    <div style="margin-top: 1.2rem;">
                        <p><span style="margin-right: .6rem; font-size:1.2rem;"><?php echo $uname ?>:</span><?php echo $comment ?></p>
                        <p style="margin-top: .8rem;text-align:right;">
                            <?php
                            
                            if (0 <= $urate && $urate <= 1) {
                                echo '<i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>';
                            } else if (1 < $urate && $urate <= 2) {
                                echo '<i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>
                                    <i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>';
                            } else if (2 < $urate && $urate <= 3) {
                                echo '<i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>
                                    <i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>
                                    <i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>';
                            } else if (3 < $urate && $urate <= 4) {
                                echo '<i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>
                                    <i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>
                                    <i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>
                                    <i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>';
                            } else if (4 < $urate && $urate <= 5) {
                                echo '<i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>
                                    <i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>
                                    <i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>
                                    <i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>
                                    <i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>';
                            }
                            
                            ?></p>
                        <p style="margin-top: .8rem;text-align:right;"><?php echo $date ?></p>
                    </div>

                <?php
                }

                ?>

            </div>

        </div>
        <!--write review if not user show a window tell need to login -->


    </section>


    <?php
    include('footer.php');
    ?>

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!--js file link-->
    <script src="JS/script.js"></script>

</body>

</html>