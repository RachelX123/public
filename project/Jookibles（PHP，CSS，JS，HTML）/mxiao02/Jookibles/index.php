<?php
session_start();
//get login info:
$username = $_SESSION['username'];
$user_id = $_SESSION['user_id'];
$user_type = $_SESSION['user_type'];


include('conn.php');
include('get.php');
//get Top1 click Book:

$sql_click = "SELECT project.b_id,project.apiURI,project.title,author.author,publisher.name,project.publishedDate,project.description,project.identifier,project.pageCount,project.categories,project.thumbnailURI,project.previewURI,project.infoURI,project.snippet,project.price,pr2genre.genre, project.averageRating, project.ratingsCount FROM project 
INNER JOIN author ON project.authors = author.author_id
INNER JOIN pr2genre ON project.genre = pr2genre.id
INNER JOIN publisher ON project.publisher = publisher.pu_id
order by ratingsCount desc limit 1";
$click = getfromdb($sql_click,$conn);

//TOP1:
$thumbnailURI1 = $click[0]['thumbnailURI'];
$title1 = $click[0]['title'];
$b_id1 = $click[0]['b_id'];
$author1 = substr($click[0]['author'], 1, strlen($click[0]['author']) - 2);
$ratingsCount1 = $click[0]['ratingsCount'];
$detail1 = $click[0]['description'];

//new book:
$sql_new = "SELECT distinct project.title,project.b_id,project.apiURI,author.author,publisher.name,project.publishedDate,project.description,project.identifier,project.pageCount,project.categories,project.thumbnailURI,project.previewURI,project.infoURI,project.snippet,project.price,pr2genre.genre FROM project INNER JOIN author ON project.authors = author.author_id
INNER JOIN pr2genre ON project.genre = pr2genre.id
INNER JOIN publisher ON project.publisher = publisher.pu_id group by project.title ORDER by publishedDate desc limit 10";
$new = getfromdb($sql_new,$conn);

//genre

$sql_genre = "SELECT * FROM pr2genre";
$gen = getfromdb($sql_genre,$conn);
//echo $conn->error;
//print_r($genre);
//echo $conn->error;
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

    <!--header section start-->
    <?php
    include('header.php');
    ?>

    <!--home section-->
    <section class="home" id="home">

        <div class="swiper home-slider">

            <div class="swiper-wrapper wrapper">

                <div class="swiper-slide slide" style="background: url(https://miro.medium.com/max/1400/1*bcCBU6YUEVd1jzl7dV-RhQ.jpeg) no-repeat; opacity: .7;">
                    <div class="content">
                        <span></span>
                        <h3>Welcome <?php if (!empty($username) & $user_type==2) {
                                        echo $username;
                                    } ?></h3>
                        <a href="Book.php?kw=All" class="btn"> get started</a>
                    </div>
                </div>

                <div class="swiper-slide slide" style="background: url(https://theintimatedge.files.wordpress.com/2016/12/131126191411-strahov-abbey-library-horizontal-large-gallery1.jpg)no-repeat; opacity: .7;">
                    <div class="content">
                        <span></span>
                        <h3>Welcome <?php if (!empty($username & $user_type==2)) {
                                        echo $username;
                                    }?></h3>
                        <a href="Book.php?kw=All" class="btn"> get started</a>
                    </div>
                </div>

                <div class="swiper-slide slide" style="background: url(https://biblionyan.files.wordpress.com/2018/11/anime-library-01.gif?w=600)no-repeat; opacity: .7; ">
                    <div class="content">
                        <span></span>
                        <h3>Welcome <?php if (!empty($username & $user_type==2)) {
                                        echo $username;
                                    } ?></h3>
                        <a href="Book.php?kw=All" class="btn"> get started</a>
                    </div>
                </div>

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <!--recommend book-->
    <section class="recommend" id="recommend">
        <div class="image">
            <img src="<?php echo $thumbnailURI1 ?>" alt="<?php echo $thumbnailURI1 ?>">
        </div>
        <div class="content">
            <span>Top 1</span>
            <br>
            <div class="box-container">
                <div class="box">
                    <h3>ID: <?php echo $b_id1 ?></h3>
                    <p>Book Name:</p>
                </div>
            </div>
            <h3 class="title"><?php echo $title1 ?></h3>
            <div class="box">
                <p>Author:</p>
                <h3><?php echo $author1 ?></h3>

            </div>
            <p>Details:</p>
            <div class="box-container">
                <div class="box">
                    <h3><?php echo $detail1; ?></h3>
                </div>
            </div>
            <a href="<?php echo "Bookdetail.php?id=$b_id1" ?>" class="btn">MORE</a>
        </div>

    </section>

    <!--new book-->
    <section class="new" id="New">

        <h1 class="heading"> <span>NEW BOOK</span> </h1>

        <div class="swiper new-slider">

            <div class="swiper-wrapper">
                <?php
                foreach ($new as $row) {
                    $b_id2 = $row['b_id'];
                    $author2 = substr($row['author'], 1, strlen($row['author']) - 2);
                    $title2 = $row['title'];
                    $thumbnailURI2 = $row['thumbnailURI'];
                    $genre = $row['genre'];
                    $pd = $row['publishedDate'];
                ?>
                    <div class="swiper-slide slide">
                        <div class="image">
                            <a href="<?php echo "Bookdetail.php?id=$b_id2"; ?>"><img src="<?php echo $thumbnailURI2 ?>" alt="<?php echo $thumbnailURI2 ?>"></a>
                        </div>
                        <div class="content">
                            <div class="pd"><?php echo $pd; ?></div>
                            <p><?php echo $author2 ?></p>

                        </div>
                    </div>
                <?php
                }
                ?>

            </div>

            <div class="swiper-pagination"></div>

        </div>

    </section>

    <!--genre-->
    <section class="genre" id="genre">

        <h1 class="heading"> <span>GENRE</span> </h1>

        <div class="box-container">
            <?php
            //echo $conn->error;
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
                <div class="box">
                    <a href="<?php echo "Book.php?kw=$genr"; ?>"><img src="<?php echo $g_url ?>" alt="<?php echo $g_url ?>" title="Picture from Pexels.com"></a>
                    <div class="content">
                        <div class="share">
                            <p><?php echo $gen ?></p>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>

        </div>

    </section>

<!--footer-->
<?php
include('footer.php');
?>





    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!--js file link-->
    <script src="JS/script.js"></script>


</body>

</html>