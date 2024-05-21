<?php
session_start();
$username = $_SESSION['username'];
$do = $_GET['do'];
$id = $_GET['id'];
if(isset($_GET['delect'])){
    $conn = mysqli_connect('mxiao02.webhosting2.eeecs.qub.ac.uk', 'mxiao02', 'm497XYh1nGWbHK3m', 'mxiao02');
    $delect_sql = "DELETE FROM `project` WHERE b_id = $id";
    $delect = $conn->query($delect_sql);
}
if (isset($_POST['submit'])) {
    $bkid=$_POST['bid'];
    $conn = mysqli_connect('mxiao02.webhosting2.eeecs.qub.ac.uk', 'mxiao02', 'm497XYh1nGWbHK3m', 'mxiao02');
    $delect_sql = "DELETE FROM `project` WHERE b_id = $bid";
    $delect = $conn->query($delect_sql);
    header("Location:edit.php?bresult=suc");
}
$conn = mysqli_connect('mxiao02.webhosting2.eeecs.qub.ac.uk', 'mxiao02', 'm497XYh1nGWbHK3m', 'mxiao02'); //connection
$book_sql = "SELECT project.b_id,project.title,author.author,publisher.name,project.publishedDate,project.thumbnailURI,project.previewURI,project.infoURI,project.snippet,project.price,pr2genre.genre FROM project 
            INNER JOIN author ON project.authors = author.author_id
            INNER JOIN pr2genre ON project.genre = pr2genre.id
            INNER JOIN publisher ON project.publisher = publisher.pu_id
            WHERE b_id = $id";
$get = $conn->query($book_sql);
$show = array();
while ($datarow = $get->fetch_assoc()) {
    array_push($show, $datarow);
}
if (!empty($username)) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
        <link rel="stylesheet" type="text/css" href="https://rawgit.com/outboxcraft/beauter/master/beauter.min.css" />
        <script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>
        <link rel="stylesheet" type="text/css" href="CSS/ui.css" />
        <link rel="shortcut icon" href=" img/open-book.png" title="Icons made by Freepik from https://www.freepik.com" type="image/x-icon">
        <title>Jookibles</title>
    </head>

    <body>
        <!--navigation-->
        <?php
        include("naviforAd.php");
        ?>

        <!--contain-->
        <div id="container" class="row">



            <div class="col m12" id="showgener">
                <h4>&emsp;&emsp;&emsp;<?php echo "Welcome Administrator: $username" ?></h4>
                <a>&emsp;&emsp;&emsp;&emsp;&emsp;</a><a href="javascript:history.go(-1);"><button>Back</button></a>
                <!--button-->
                <div class="row">
                    <div class="col m1"></div>
                    <div class="col m11">
                        <h5>&nbsp FOR BOOK:</h5>
                        <a>&emsp; &emsp; &emsp; &emsp;</a>
                        <button><a href="edit.php?do=addbook">ADD BOOK</a></button>
                        <a>&emsp; &emsp; &emsp; &emsp;</a>
                        <button><a href="edit.php?do=addGen">ADD GENRE</a></button>
                        <a>&emsp; &emsp; &emsp; &emsp;</a>
                        <button><a href="edit.php?do=editbook">EDITED BOOK</a></button>
                        <a>&emsp; &emsp; &emsp; &emsp;</a>
                        <button><a href="edit.php?do=editGen">EDITED GENRE</a></button>
                        <a>&emsp; &emsp; &emsp; &emsp;</a>
                        <button><a href="edit.php?do=delect">DELECT BOOK</a></button>
                    </div>

                </div>

                <div class="col m12">
                    <div class="row">
                        <div class="col m1"></div>
                        <div class="col m2">
                            <p>&emsp;&emsp;<b>DELECT BOOK</b></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col m12">
                            <div class="col m2"></div>
                            <div class="col m10">
                                <?php
                                $bid = $show[0]['b_id'];
                                $title = $show[0]['title'];
                                $author = substr($show[0]['author'], 1, strlen($show[0]['author']) - 2);
                                $publisher = $show[0]['name'];
                                $publishedDate = $show[0]['publishedDate'];
                                $thumbnailURI = $show[0]['thumbnailURI'];
                                $previewURI = $show[0]['previewURI'];
                                $infoURI = $show[0]['infoURI'];
                                $genre = $show[0]['genre'];
                                ?>
                                <div class="col m4">
                                    <div class="row">
                                        <?php echo "<a href='$infoURI'><img src=$thumbnailURI title='$thumbnailURI'></a>" ?>
                                    </div>
                                    <p> </p>
                                    <p> </p>

                                </div>
                                <div class="col m6">
                                    <p><b>Book name: </b><?php echo $title ?></p>
                                    <p><b>Author: </b><?php echo $author ?></p>
                                    <p><b>Publisher: </b><?php echo $publisher ?></p>
                                    <p><b>PublishedDate: </b><?php echo $publishedDate ?></p>
                                    <p><b>Genre: </b><?php echo $genre ?></p>
                                </div>
                                <div class="row">
                                    <div class="col m12">
                                        <div class="col m2"></div>
                                        <div class="col m9">
                                            <form action="#" method="POST">
                                                <input type="text" value="<?php echo $bid ?>" name="bid" style="display: none;">
                                                <input type="submit" value="COMFIRM DELECT" name="submit" class="col m6">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer id="mainfooter">

            <ul style="list-style-type: none">
                <li>
                    <p>email:mxiao02@qub.ac.uk</p>
                </li>
                <li>
                    <p>
                    <p>phone:11111111</p>
                    </p>
                </li>
                <li>
                    <div class="right">Icons made by <a href="https://www.freepik.com" title="Freepik">Freepik</a> from
                        <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a>
                    </div>
                </li>
                <li>
                    <div><a>Welcom to contack us !</a></div>
                </li>
            </ul>

        </footer>
    </body>


    </html>
<?php

    
} else {
    header('Location:../login/login-register.php');
}
?>