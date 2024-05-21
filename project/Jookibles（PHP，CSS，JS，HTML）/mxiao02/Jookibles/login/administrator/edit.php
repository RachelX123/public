<?php
session_start();
$username = $_SESSION['username'];
$do = $_GET['do'];
$user_id = $_SESSION['user_id'];
$bresult = $_GET['bresult'];
$uresult = $_GET['uresult'];
//echo "$do"; for check

if (!empty($user_id)) {


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

                <?php
                }
                if ($do == 'account' || $do == 'review' || $do == 'manage' || $uresult == 'suc' || $uresult == 'fal') {
                ?>
                    <div class="row">
                        <div class="col m1"> </div>
                        <div class="col m10">
                            <h5>&nbsp MANAGE:</h5>
                            <a>&emsp; &emsp; &emsp; &emsp;</a>
                            <button><a href="edit.php?do=account">ACCOUNT</a></button>
                            <a>&emsp; &emsp; &emsp; &emsp;</a>
                            <button><a href="edit.php?do=review">REVIEW</a></button>
                        </div>
                    </div>
                <?php
                }



                //show content:

                // add book:
                if ($do == 'addbook') {
                ?>
                    <div class="col m2">
                        <a>&emsp;&emsp;&emsp; </a>
                    </div>
                    <div class="col m10">
                        <!--get info of add book-->
                        <form action="addbook.php" method="POST">
                            <p><b>ADD A NEW BOOK:</b></p>
                            <div class="row">
                                <div class="col m5">
                                    <a style="color:black"><b>Name</b></a>
                                    <input id="box" type="text" name="title" required="required">
                                    <a style="color:black"><b>Author</b></a>
                                    <input id="box" type="text" name="author" required="required">
                                    <a style="color:black"><b>Publisher</b></a>
                                    <input id="box" type="text" name="publisher" required="required">
                                    <a style="color:black"><b>Published Date</b></a>
                                    <input id="box" type="text" name="pdate" value="" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" onkeyup="value=value.replace(/[^\d.]/g,'')">
                                    <a style="color:black"><b>Identifier</b></a>
                                    <input id="box" type="text" name="identifier">
                                    <a style="color:black"><b>Categories</b></a>
                                    <input id="box" type="text" name="categories">
                                    <a style="color:black"><b>Snippet</b></a>
                                    <input id="box" type="text" name="snippet">
                                    <a style="color:black"><b>Genre</b></a>
                                    <select class=" m12" name="genre">
                                        <?php
                                        $conn = mysqli_connect('mxiao02.webhosting2.eeecs.qub.ac.uk', 'mxiao02', 'm497XYh1nGWbHK3m', 'mxiao02');
                                        $sql = "SELECT * FROM pr2genre";
                                        $result = $conn->query($sql);
                                        $show = array();
                                        while ($datarow = $result->fetch_assoc()) {
                                            array_push($show, $datarow);
                                        }
                                        foreach ($result as $row) {
                                            $genre = $row['genre'];
                                        ?>
                                            <option value="<?php echo "$genre" ?>"><?php echo "$genre" ?> </option>
                                        <?php
                                        }

                                        ?>
                                    </select>
                                </div>

                                <div class="col m5">
                                    <a style="color:black"><b>Page Count</b></a>
                                    <input id="box" type="text" name="pagecount" value="" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" onkeyup="value=value.replace(/[^\d.]/g,'')">
                                    <a style="color:black"><b>Price</b></a>
                                    <input id="box" type="text" name="price" onkeyup="value=value.replace(/[^\d.]/g,'')">
                                    <a style="color:black"><b>apiURL</b></a>
                                    <input id="box" type="text" name="apiURI">
                                    <a style="color:black"><b>thumbnailURL</b></a>
                                    <input id="box" type="text" name="thumbnailURI">
                                    <a style="color:black"><b>previewURL</b></a>
                                    <input id="box" type="text" name="previewURI">
                                    <a style="color:black"><b>infoURL</b></a>
                                    <input id="box" type="text" name="infoURI">
                                    <a style="color:black"><b>Description</b></a>
                                    <textarea id="box" name="description" style="height:100px; border: solid;border-width:1px;border-radius: 5px;border-color:silver;"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <a class="col m3"></a><input type="submit" value="SUBMIT" name="submit" class="col m6">
                            </div>
                        </form>
                    </div>
                <?php
                }

                //add genre:
                if ($do == 'addGen') {
                ?>
                    <div class="row">
                        <div class="col m2">
                        </div>
                        <div class="col m6">
                            <!--<a style="color:black"><b>ADD NEW GENRE</b></a>-->
                            <form action="addgenre.php" method="POST">
                                <p><b>ADD NEW GENRE</b></p>
                                <input id="box" type="text" name="genre" required="required">
                                <a class="col m3"></a><input type="submit" value="SUBMIT" name="submit" class="col m6">
                            </form>
                        </div>
                    </div>
                <?php
                }

                //edit book:
                if ($do == 'editbook') {
                ?>
                    <div class="row">
                        <div class="col m1"></div>
                        <div class="col m11">
                            <p><b>EDIT BOOK: &emsp;</b></p>
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
                            $conn = mysqli_connect('mxiao02.webhosting2.eeecs.qub.ac.uk', 'mxiao02', 'm497XYh1nGWbHK3m', 'mxiao02'); //connection
                            $show = "SELECT project.b_id, project.title, author.author, project.publishedDate,pr2genre.genre
                        FROM project
                        INNER JOIN author ON project.authors = author.author_id
                        INNER JOIN pr2genre ON project.genre = pr2genre.id
                        WHERE b_id<=20;";
                            $get = $conn->query($show);
                            $get_db = array();
                            while ($datarowALL = $get->fetch_assoc()) {
                                array_push($get_db, $datarowALL);
                            }
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
                                        <div class="col m1"><a href="<?php echo "editbook.php?id=$id&do=editbook"; ?>">EDIT</a></div>
                                        <br>
                                    </div>
                                </div>

                            <?php
                            }
                            ?>
                        </div>
                    </div>

                <?php
                }
                //edit genre
                if ($do == 'editGen') {
                ?>

                    <div class="row">
                        <div class="col m2"></div>
                        <div class="col m10">
                            <p><b>EDIT GENRE: </b></p>
                            <div class="row">
                                <div class="col m8">
                                    <form action="editGen.php" method="POST">
                                        <select class="m12" name="id">
                                            <?php
                                            $conn = mysqli_connect('mxiao02.webhosting2.eeecs.qub.ac.uk', 'mxiao02', 'm497XYh1nGWbHK3m', 'mxiao02');
                                            $sql = "SELECT * FROM pr2genre";
                                            $result = $conn->query($sql);
                                            $show = array();
                                            while ($datarow = $result->fetch_assoc()) {
                                                array_push($show, $datarow);
                                            }
                                            foreach ($result as $row) {
                                                $genre = $row['genre'];
                                                $id = $row['id'];
                                            ?>
                                                <option value="<?php echo "$id" ?>"><?php echo "$genre" ?> </option>
                                            <?php
                                            }

                                            ?>
                                        </select>
                                        <a style="color:black"><b>CHANGE TO</b></a>
                                        <input id="box" type="text" name="genre" class="col m10">
                                        <a class="col m3"></a><input type="submit" value="SUBMIT" name="submit" class="col m6">

                                    </form>
                                </div>

                            </div>
                        </div>
                    <?php

                }


                //delect book:
                if ($do == 'delect') {
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
                                $conn = mysqli_connect('mxiao02.webhosting2.eeecs.qub.ac.uk', 'mxiao02', 'm497XYh1nGWbHK3m', 'mxiao02'); //connection
                                $show = "SELECT project.b_id, project.title, author.author, project.publishedDate,pr2genre.genre
                            FROM project
                            INNER JOIN author ON project.authors = author.author_id
                            INNER JOIN pr2genre ON project.genre = pr2genre.id
                            WHERE b_id<=20;";
                                $get = $conn->query($show);
                                $get_db = array();
                                while ($datarowALL = $get->fetch_assoc()) {
                                    array_push($get_db, $datarowALL);
                                }
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
                                            <div class="col m1"><form action="<?php echo "delet.php?id=$id&do=delect" ?>" method="GET">
                                            <input name="do" type="text" value="delect" style="display: none;">
                                            <input name="id" type="text" value="<?php echo $id ?>" style="display: none;">
                                            <input name="delect" type="submit" value="DELECT"></form></div>
                                            <br>
                                        </div>
                                    </div>

                                <?php
                                }
                                ?>
                            </div>
                        </div>

                    <?php
                }

                //account:
                if ($do == 'account') {
                    ?>
                        <div class="row">
                            <div class="col m12">
                                <div class="col m1"> </div>
                                <div class="col m11">
                                    <div class="row">
                                        <div class="col m11"><b>USER:</b></div>
                                    </div>
                                    <div class="row">
                                        <div class="col m11">
                                            <div class="row">
                                                <div class="col m2"><b>ID</b></div>
                                                <div class="col m3"><b>USERNAME</b></div>
                                                <div class="col m3"><b>PASSWORD</b></div>
                                                <div class="col m2"><b>AUTHORITY</b></div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                    $conn = mysqli_connect('mxiao02.webhosting2.eeecs.qub.ac.uk', 'mxiao02', 'm497XYh1nGWbHK3m', 'mxiao02');
                                    $user_sql = "SELECT user_id, username, password,authority.authority FROM pr2userSystem 
                                    INNER JOIN authority ON pr2userSystem.authority = authority.id
                                    WHERE `user_type`=2";
                                    $get_user = $conn->query($user_sql);
                                    $get_db = array();
                                    while ($datarowALL = $get_user->fetch_assoc()) {
                                        array_push($get_db, $datarowALL);
                                    }
                                    foreach ($get_db as $row) {
                                        $user_id = $row['user_id'];
                                        $username = $row['username'];
                                        $password = $row['password'];
                                        $authority = $row['authority'];
                                    ?>
                                        <div class="row">
                                            <div class="col m11">
                                                <hr />
                                                <div class="col m2"><?php echo $user_id ?></div>
                                                <div class="col m3"><?php echo $username ?></div>
                                                <div class="col m3"><?php echo $password ?></div>
                                                <div class="col m2"><?php echo $authority ?></div>
                                                <div class="col m1"><a href="edituser.php?id=<?php echo "$user_id" ?>&do=account">EDIT</a></div>
                                            </div>
                                        </div>

                                    <?php
                                    }
                                    ?>

                                </div>

                            </div>
                        </div>
                    <?php
                }
                if ($do == 'review') {


                    ?>
                        <div class="row">
                            <div class="col m1"></div>
                            <div class="col m11">
                                <p><b>MANAGE REVIEW: &emsp;</b></p>
                                <div class="row">
                                    <div class="col m12">
                                        <div class="col m1">
                                            <p><b>id</b></p>
                                        </div>
                                        <div class="col m3"><b>title</b></div>
                                        <div class="col m3"><b>author</b></div>
                                        <div class="col m2"><b>publishedDate</b></div>
                                        <div class="col m2"><b> TOTAL</b></div>
                                    </div>
                                </div>
                                <?php
                                //show book:
                                $conn = mysqli_connect('mxiao02.webhosting2.eeecs.qub.ac.uk', 'mxiao02', 'm497XYh1nGWbHK3m', 'mxiao02'); //connection
                                $show = "SELECT comment.b_id,project.title, author.author,project.publishedDate, COUNT(comment.comment) AS Total_review
                                FROM comment LEFT JOIN project ON project.b_id = comment.b_id LEFT JOIN author ON author.author_id = project.authors 
                                GROUP BY (comment.b_id);";
                                $get = $conn->query($show);
                                $get_db = array();
                                while ($datarowALL = $get->fetch_assoc()) {
                                    array_push($get_db, $datarowALL);
                                }
                                foreach ($get_db as $row) {
                                    $id = $row['b_id'];
                                    $title = $row['title'];
                                    $author = substr($row['author'], 1, strlen($row['author']) - 2);
                                    $publishedDate = $row['publishedDate'];
                                    $total = $row['Total_review'];
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
                                            <div class="col m2"><?php echo "$total" ?></div>
                                            <div class="col m1"><a href="<?php echo "editreview.php?id=$id&do=review&title=$title"; ?>">EDIT</a></div>
                                            <br>
                                        </div>
                                    </div>

                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    <?php
                }
                    ?>







                    <!--ADD successfully-->
                    <?php
                    if ($bresult == 'suc' || $uresult == 'suc') {
                    ?>
                        <div class="row">
                            <div class="col m4"></div>
                            <div class="col m8">
                                <p>&emsp; &emsp; &emsp; &emsp;</p>
                                <h2>SUCCESSFULLY !</h2>

                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <!--exist add fal-->
                    <?php
                    if ($bresult == 'fal' || $uresult == 'fal') {
                    ?>
                        <div class="row">
                            <div class="col m4"></div>
                            <div class="col m8">
                                <p>&emsp; &emsp; &emsp; &emsp;</p>
                                <h2>IT HAS EXIST !</h2>

                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    </div>
            </div>

        </div>


        <?php
        if ($do == 'manage' || $do == 'forbook') {
            echo "<p>&emsp; &emsp; &emsp; &emsp;</p>
                  <p>&emsp; &emsp; &emsp; &emsp;</p>
                  <p>&emsp; &emsp; &emsp; &emsp;</p>
                  <p>&emsp; &emsp; &emsp; &emsp;</p>";
        }
        ?>
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