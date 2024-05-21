<?php
session_start();
$username = $_SESSION['username'];
$user_id = $_SESSION['user_id'];
$user_type = $_SESSION['user_type'];
$search = $_GET['search'];
$searchuser = $_GET['searchuser'];
$searchdelect = $_GET['searchdelect'];
if (!empty($searchuser)) {
    $do = 'account';
} else if (!empty($searchdelect)) {
    $do = 'delect';
} else {
    $do = 'editbook';
}
if (!empty($user_id) & $user_type==1) {
    //echo $search;



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

                <?php
                if ($do == 'addbook' || $do == 'addGen' || $do == 'editbook' || $do == 'editGen' || $do == 'delect' || $do == 'forbook' || $bresult == 'suc' || $bresult == 'fal') {
                ?>
                    <div class="row">
                        <div class="col m1"> </div>
                        <div class="col m11">
                            <h5>&nbsp FOR BOOK:</h5>
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

                <?php
                }
                if ($do == 'account' || $do == 'review' || $do == 'manage' || $uresult == 'suc' || $uresult == 'fal') {
                ?>
                    <div class="row">
                        <div class="col m1"> </div>
                        <div class="col m10">
                            <h5>&nbsp MANAGE:</h5>
                            <button><a href="edit.php?do=account">ACCOUNT</a></button>
                            <a>&emsp; &emsp; &emsp; &emsp;</a>
                            <button><a href="edit.php?do=review">REVIEW</a></button>
                        </div>
                    </div>
                    <?php
                }
                if (!empty($search)) {


                    if (is_numeric($search)) {
                    ?>
                        <div class="row">
                            <div class="col m1"></div>
                            <div class="col m11">
                                <div class="col m1"><b>id</b></div>
                                <div class="col m3"><b>title</b></div>
                                <div class="col m3"><b>author</b></div>
                                <div class="col m2"><b>publishedDate</b></div>
                                <div class="col m2"><b>genre</b></div>
                            </div>
                            <div class="row">
                                <div class="col m1"></div>
                                <div class="col m11">
                                    <?php


                                    //echo "yes";
                                    //if is only number is searching book by id firstly, if no find book by id then try keyword
                                    //connect to db:
                                    $conn = mysqli_connect('mxiao02.webhosting2.eeecs.qub.ac.uk', 'mxiao02', 'm497XYh1nGWbHK3m', 'mxiao02');
                                    $select_sql = "SELECT project.b_id,project.apiURI,project.title,author.author,publisher.name,project.publishedDate,project.description,project.identifier,project.pageCount,project.categories,project.thumbnailURI,project.previewURI,project.infoURI,project.snippet,project.price,pr2genre.genre FROM project 
                                                INNER JOIN author ON project.authors = author.author_id
                                                INNER JOIN pr2genre ON project.genre = pr2genre.id
                                                INNER JOIN publisher ON project.publisher = publisher.pu_id
                                                WHERE b_id = $search";
                                    $search_sql = $conn->real_escape_string($search_sql);
                                    //echo $conn->error;
                                    //echo "<p>$select_sql\n</p>";
                                    $select = $conn->query($select_sql);
                                    //echo $conn->error;
                                    $show = array();
                                    while ($datarow = $select->fetch_assoc()) {
                                        array_push($show, $datarow);
                                    }
                                    if (!empty($show)) {
                                        $id =  $show[0]['b_id'];
                                        $apiURI = $show[0]['apiURI'];
                                        $title = $show[0]['title'];
                                        $author = substr($show[0]['author'], 1, strlen($show[0]['author']) - 2);
                                        $publisher = $show[0]['name'];
                                        $publishedDate = $show[0]['publishedDate'];
                                        $description = $show[0]['description'];
                                        $identifier = $show[0]['identifier'];
                                        $pageCount = $show[0]['pageCount'];
                                        $categories = substr($show[0]['categories'], 1, strlen($show[0]['categories']) - 2);
                                        $thumbnailURI = $show[0]['thumbnailURI'];
                                        $previewURI = $show[0]['previewURI'];
                                        $infoURI = $show[0]['infoURI'];
                                        $snippet = $show[0]['snippet'];
                                        $price = $show[0]['price'];
                                        $genre = $show[0]['genre'];
                                        //echo "<p>$id, $title, $author</p>"; //check the content
                                    ?>
                                        <div class="row">
                                            <hr>
                                            <div class="col m1"><?php echo $id ?></div>
                                            <div class="col m3"><?php echo $title ?></div>
                                            <div class="col m3"><?php echo $author ?></div>
                                            <div class="col m2"><?php echo $publishedDate ?></div>
                                            <div class="col m2"><?php echo $genre ?></div>
                                            <div class="col m1"><a href="<?php echo "editbook.php?id=$id&do=editbook"; ?>">EDIT</a></div>
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="row">
                                            <div class="col m1"></div>

                                            <div class="row">
                                                <div class="col m1"></div>
                                                <div class="col m11">
                                                    <?php
                                                    //echo "NO find";
                                                    //search by keyword
                                                    $conn = mysqli_connect('mxiao02.webhosting2.eeecs.qub.ac.uk', 'mxiao02', 'm497XYh1nGWbHK3m', 'mxiao02');
                                                    $search_sql1 = "SELECT project.b_id,project.apiURI,project.title,author.author,publisher.name,project.publishedDate,project.description,project.identifier,project.pageCount,project.categories,project.thumbnailURI,project.previewURI,project.infoURI,project.snippet,project.price,pr2genre.genre FROM project 
                                                    INNER JOIN author ON project.authors = author.author_id
                                                    INNER JOIN pr2genre ON project.genre = pr2genre.id
                                                    INNER JOIN publisher ON project.publisher = publisher.pu_id
                                                    WHERE project.title LIKE '%$search%'";

                                                    $select1 = $conn->query($search_sql1);
                                                    //echo $conn->error;
                                                    $show1 = array();
                                                    while ($datarow = $select1->fetch_assoc()) {
                                                        array_push($show1, $datarow);
                                                    }
                                                    if (!empty($show1)) {
                                                        foreach ($show1 as $row) {
                                                            $id =  $row['b_id'];
                                                            $apiURI = $row['apiURI'];
                                                            $title = $row['title'];
                                                            $author = substr($row['author'], 1, strlen($row['author']) - 2);
                                                            $publisher = $row['name'];
                                                            $publishedDate = $row['publishedDate'];
                                                            $description = $row['description'];
                                                            $identifier = $row['identifier'];
                                                            $pageCount = $row['pageCount'];
                                                            $categories = substr($row['categories'], 1, strlen($row['categories']) - 2);
                                                            $thumbnailURI = $row['thumbnailURI'];
                                                            $previewURI = $row['previewURI'];
                                                            $infoURI = $row['infoURI'];
                                                            $snippet = $row['snippet'];
                                                            $price = $row['price'];
                                                            $genre = $row['genre'];
                                                    ?>
                                                            <div class="row">
                                                                <hr>
                                                                <div class="col m1"><?php echo $id ?></div>
                                                                <div class="col m3"><?php echo $title ?></div>
                                                                <div class="col m3"><?php echo $author ?></div>
                                                                <div class="col m2"><?php echo $publishedDate ?></div>
                                                                <div class="col m2"><?php echo $genre ?></div>
                                                                <div class="col m1"><a href="<?php echo "editbook.php?id=$id&do=editbook"; ?>">EDIT</a></div>
                                                            </div>
                                                        <?php
                                                        }
                                                    } else {
                                                        echo "<div class='row'><div class='col m10'><h1>Never Find</h1></div></div>";
                                                    }
                                                }
                                            } else {
                                                //echo "no";
                                                //if is not number only searching book by keyword
                                                $conn = mysqli_connect('mxiao02.webhosting2.eeecs.qub.ac.uk', 'mxiao02', 'm497XYh1nGWbHK3m', 'mxiao02');
                                                $search = $conn->real_escape_string($search);
                                                $search_sql2 = "SELECT project.b_id,project.apiURI,project.title,author.author,publisher.name,project.publishedDate,project.description,project.identifier,project.pageCount,project.categories,project.thumbnailURI,project.previewURI,project.infoURI,project.snippet,project.price,pr2genre.genre FROM project 
                                                INNER JOIN author ON project.authors = author.author_id
                                                INNER JOIN pr2genre ON project.genre = pr2genre.id
                                                INNER JOIN publisher ON project.publisher = publisher.pu_id
                                                WHERE project.title LIKE '%$search%'";
                                                //echo "$search_sql2";

                                                $select2 = $conn->query($search_sql2);
                                                //echo $conn->error;
                                                $show2 = array();
                                                while ($datarow = $select2->fetch_assoc()) {
                                                    array_push($show2, $datarow);
                                                }
                                                if (!empty($show2)) {
                                                    foreach ($show2 as $row) {
                                                        $id =  $row['b_id'];
                                                        $apiURI = $row['apiURI'];
                                                        $title = $row['title'];
                                                        $author = substr($row['author'], 1, strlen($row['author']) - 2);
                                                        $publisher = $row['name'];
                                                        $publishedDate = $row['publishedDate'];
                                                        $description = $row['description'];
                                                        $identifier = $row['identifier'];
                                                        $pageCount = $row['pageCount'];
                                                        $categories = substr($row[0]['categories'], 1, strlen($row['categories']) - 2);
                                                        $thumbnailURI = $row['thumbnailURI'];
                                                        $previewURI = $row['previewURI'];
                                                        $infoURI = $row['infoURI'];
                                                        $snippet = $row['snippet'];
                                                        $price = $row['price'];
                                                        $genre = $row['genre'];
                                                        //echo "<p>$id,$title,$author</p>";
                                                        ?>
                                                        <div class="row">
                                                            <hr>
                                                            <div class="col m1"><?php echo $id ?></div>
                                                            <div class="col m3"><?php echo $title ?></div>
                                                            <div class="col m3"><?php echo $author ?></div>
                                                            <div class="col m2"><?php echo $publishedDate ?></div>
                                                            <div class="col m2"><?php echo $genre ?></div>
                                                            <div class="col m1"><a href="<?php echo "editbook.php?id=$id&do=editbook"; ?>">EDIT</a></div>
                                                        </div>
                                            <?php
                                                    }
                                                } else {
                                                    echo "<div class='row'><div class='col m10'><h1>Never Find</h1></div></div></div>";
                                                }
                                            }
                                        }

                                        //search user account:
                                        if (!empty($searchuser)) {
                                            //echo "$searchuser";
                                            ?>

                                            <div class="row">
                                                <div class="col m1"></div>

                                                <div class="col m11">
                                                    <div class="col m2"><b>ID</b></div>
                                                    <div class="col m3"><b>USERNAME</b></div>
                                                    <div class="col m3"><b>PASSWORD</b></div>
                                                    <div class="col m2"><b>AUTHORITY</b></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col m1"></div>
                                                    <div class="col m11">
                                                        <?php
                                                        //search user by id:
                                                        if (is_numeric($searchuser)) {
                                                            $conn = mysqli_connect('mxiao02.webhosting2.eeecs.qub.ac.uk', 'mxiao02', 'm497XYh1nGWbHK3m', 'mxiao02');
                                                            $select_sql = "SELECT user_id, username,user_type, password,authority.authority, email FROM pr2userSystem 
                                                   INNER JOIN authority ON pr2userSystem.authority = authority.id
                                                   WHERE `user_id`=$searchuser AND user_type=2";

                                                            $select = $conn->query($select_sql);
                                                            $show = array();
                                                            while ($datarow = $select->fetch_assoc()) {
                                                                array_push($show, $datarow);
                                                            }
                                                            if (!empty($show)) {
                                                                $id = $show[0]['user_id'];
                                                                $username = $show[0]['username'];
                                                                $password = $show[0]['password'];
                                                                $authority = $show[0]['authority'];
                                                        ?>
                                                                <hr>
                                                                <div class="col m2"><?php echo $id ?></div>
                                                                <div class="col m3"><?php echo $username ?></div>
                                                                <div class="col m3"><?php echo $password ?></div>
                                                                <div class="col m2"><?php echo $authority ?></div>
                                                                <div class="col m1"><a href="edituser.php?id=<?php echo "$user_id" ?>&do=account">EDIT</a></div>
                                                                <?php
                                                            } else {
                                                                $searchuser = $conn->real_escape_string($searchuser);
                                                                $search_sql1 = "SELECT user_id, username, password,authority.authority, email, user_type FROM pr2userSystem 
                                                            INNER JOIN authority ON pr2userSystem.authority = authority.id
                                                            WHERE username LIKE '%$searchuser%' AND user_type=2";

                                                                $select1 = $conn->query($search_sql1);
                                                                //echo $conn->error;
                                                                $show1 = array();
                                                                while ($datarow = $select1->fetch_assoc()) {
                                                                    array_push($show1, $datarow);
                                                                }
                                                                if (!empty($show1)) {
                                                                    foreach ($show1 as $row) {
                                                                        $id = $row['user_id'];
                                                                        $username = $row['username'];
                                                                        $password = $row['password'];
                                                                        $authority = $row['authority'];
                                                                ?>
                                                                        <hr>
                                                                        <div class="col m2"><?php echo $id ?></div>
                                                                        <div class="col m3"><?php echo $username ?></div>
                                                                        <div class="col m3"><?php echo $password ?></div>
                                                                        <div class="col m2"><?php echo $authority ?></div>
                                                                        <div class="col m1"><a href="edituser.php?id=<?php echo "$user_id" ?>&do=account">EDIT</a></div>
                                                                    <?php
                                                                    }
                                                                } else {
                                                                    echo "<div class='row'><div class='col m10'><h1>Never Find</h1></div></div>";
                                                                }
                                                            }
                                                        } else {
                                                            $conn = mysqli_connect('mxiao02.webhosting2.eeecs.qub.ac.uk', 'mxiao02', 'm497XYh1nGWbHK3m', 'mxiao02');
                                                            $searchuser = $conn->real_escape_string($searchuser);
                                                            $search_sql2 = "SELECT user_id, username, password,authority.authority, email, user_type FROM pr2userSystem 
                                                            INNER JOIN authority ON pr2userSystem.authority = authority.id
                                                            WHERE username LIKE '%$searchuser%' AND user_type=2";
                                                            $select2 = $conn->query($search_sql2);
                                                            //echo $conn->error;
                                                            $show2 = array();
                                                            while ($datarow = $select2->fetch_assoc()) {
                                                                array_push($show2, $datarow);
                                                            }
                                                            if (!empty($show2)) {
                                                                foreach ($show2 as $row) {
                                                                    $id = $row['user_id'];
                                                                    $username = $row['username'];
                                                                    $password = $row['password'];
                                                                    $authority = $row['authority'];
                                                                    ?>
                                                                    <hr>
                                                                    <div class="col m2"><?php echo $id ?></div>
                                                                    <div class="col m3"><?php echo $username ?></div>
                                                                    <div class="col m3"><?php echo $password ?></div>
                                                                    <div class="col m2"><?php echo $authority ?></div>
                                                                    <div class="col m1"><a href="edituser.php?id=<?php echo "$user_id" ?>&do=account">EDIT</a></div>
                                                        <?php
                                                                }
                                                            } else {
                                                                echo "<div class='row'><div class='col m10'><h1>Never Find</h1></div></div>";
                                                            }
                                                        }
                                                    }


                                                    //select to delect:
                                                    if (!empty($searchdelect)) {
                                                        ?>
                                                        <div class="row">
                                                            <div class="col m1"></div>
                                                            <div class="col m11">
                                                                <p><b>DELECT BOOK: &emsp;</b></p>
                                                                <div class="row">
                                                                    <div class="col m12">
                                                                        <div class="col m1">
                                                                            <p><b>id</b></p>
                                                                        </div>
                                                                        <div class="col m3"><b>title</b></div>
                                                                        <div class="col m3"><b>author</b></div>
                                                                        <div class="col m2"><b>publishedDate</b></div>
                                                                        <div class="col m2"><b>genre</b></div>
                                                                    </div>

                                                                </div>
                                                                <?php
                                                                //show book:
                                                                $conn = mysqli_connect('mxiao02.webhosting2.eeecs.qub.ac.uk', 'mxiao02', 'm497XYh1nGWbHK3m', 'mxiao02');
                                                                $show = "SELECT project.b_id, project.title, author.author, project.publishedDate,pr2genre.genre
                                                    FROM project
                                                    INNER JOIN author ON project.authors = author.author_id
                                                    INNER JOIN pr2genre ON project.genre = pr2genre.id
                                                    WHERE title LIKE '%$searchdelect%' OR author LIKE '%$searchdelect%' OR b_id LIKE '%$searchdelect%'";

                                                                $get = $conn->query($show);
                                                                $get_db = array();
                                                                while ($datarowALL = $get->fetch_assoc()) {
                                                                    array_push($get_db, $datarowALL);
                                                                }
                                                                if (!empty($show)) {


                                                                    foreach ($get_db as $row) {
                                                                        $id = $row['b_id'];
                                                                        $title = $row['title'];
                                                                        $author = substr($row['author'], 1, strlen($row['author']) - 2);
                                                                        $publishedDate = $row['publishedDate'];
                                                                        $genre = $row['genre'];
                                                                ?>
                                                                        <div class="row">
                                                                            <div class="col m12">
                                                                                <hr />
                                                                                <div class="col m1">
                                                                                    <p><?php echo "$id" ?></p>
                                                                                </div>
                                                                                <div class="col m3"><?php echo "$title" ?></div>
                                                                                <div class="col m3"><?php echo "$author" ?></div>
                                                                                <div class="col m2"><?php echo "$publishedDate" ?></div>
                                                                                <div class="col m2"><?php echo "$genre" ?></div>
                                                                                <div class="col m1">
                                                                                    <form action="<?php echo "delet.php?id=$id&do=delect" ?>" method="GET">
                                                                                        <input name="do" type="text" value="delect" style="display: none;">
                                                                                        <input name="id" type="text" value="<?php echo $id ?>" style="display: none;">
                                                                                        <input name="delect" type="submit" value="DELECT">
                                                                                    </form>
                                                                                </div>
                                                                                <br>
                                                                            </div>
                                                                        </div>

                                                                    <?php
                                                                    }
                                                                    ?>
                                                            </div>
                                                        </div>

                                                <?php
                                                                } else {
                                                                    echo "<div class='row'><div class='col m10'><h1>Never Find</h1></div></div>";
                                                                }
                                                            } else {
                                                            }
                                                ?>

                                                    </div>
                                                </div>
                                            </div>
                                                </div>

                                            </div>

                                        </div>

                                </div>

                            </div>





                                <!--footer-->
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