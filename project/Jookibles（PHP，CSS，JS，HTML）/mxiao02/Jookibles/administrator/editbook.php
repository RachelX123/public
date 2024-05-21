<?php
session_start();
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
$user_type = $_SESSION['user_type'];
$do=$_GET['do'];
$b_id = $_GET['id'];
//echo "$b_id";
if (!empty($user_id) & $user_type==1) {

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

                <!--show book to edit-->
                <?php
                $conn = mysqli_connect('mxiao02.webhosting2.eeecs.qub.ac.uk', 'mxiao02', 'm497XYh1nGWbHK3m', 'mxiao02'); //connection
                $book_sql = "SELECT project.b_id,project.apiURI,project.title,author.author,publisher.name,project.publishedDate,project.description,project.identifier,project.pageCount,project.categories,project.thumbnailURI,project.previewURI,project.infoURI,project.snippet,project.price,pr2genre.genre FROM project 
                INNER JOIN author ON project.authors = author.author_id
                INNER JOIN pr2genre ON project.genre = pr2genre.id
                INNER JOIN publisher ON project.publisher = publisher.pu_id
                WHERE b_id = $b_id";
                $get = $conn->query($book_sql);
                $show = array();
                while ($datarow = $get->fetch_assoc()) {
                    array_push($show, $datarow);
                }

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

                // echo "$apiURI, $title, $author, $publisher";
                ?>

                <div class="row">
                    <div class="col m2">

                    </div>
                    <div class="col m6">
                        <p><b>EDIT BOOK</b></p>
                        <form action="<?php echo "accessEditBook.php?id=$b_id" ?>" method="POST">
                            <a style="color:black"><b>Name</b></a>
                            <input id="box" type="text" name="etitle" value="<?php echo $title ?>" required="required">
                            <a style="color:black"><b>Author</b></a>
                            <input id="box" type="text" name="eauthor" value="<?php echo $author ?>">
                            <a style="color:black"><b>Publisher</b></a>
                            <input id="box" type="text" name="epublisher" value="<?php echo $publisher ?>">
                            <a style="color:black"><b>PublishedDate</b></a>
                            <input id="box" type="text" name="epuDate" value="<?php echo $publishedDate ?>" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" onkeyup="value=value.replace(/[^\d.]/g,'')">
                            <a style="color:black"><b>Identifier</b></a>
                            <input id="box" type="text" name="eidentifier" value="<?php echo $identifier ?>">
                            <a style="color:black"><b>Categories</b></a>
                            <input id="box" type="text" name="ecategories" value="<?php echo $categories ?>">
                            <a style="color:black"><b>Snippet</b></a>
                            <input id="box" type="text" name="esnippet" value="<?php echo $snippet ?>">
                            <a style="color:black"><b>Page Count</b></a>
                            <input id="box" type="text" name="epagecount" value="<?php echo $pageCount ?>" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" onkeyup="value=value.replace(/[^\d.]/g,'')">
                            <a style="color:black"><b>Price</b></a>
                            <input id="box" type="text" name="eprice" value="<?php echo $price ?>" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" onkeyup="value=value.replace(/[^\d.]/g,'')">

                            <a style="color:black"><b>Genre</b></a>
                            <select class=" m12" name="egenre" value="<?php echo $genre ?>">
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
                                    <option value="<?php echo $genre ?>"><?php echo $genre ?> </option>
                                <?php
                                }

                                ?>
                            </select>
                            <a style="color:black"><b>Description</b></a>
                            <textarea id="box" name="edescription" style="height:100px; border: solid;border-width:1px;border-radius: 5px;border-color:silver;"><?php echo $description ?></textarea>
                            <p><b>URL:</b></p>
                            <a style="color:black"><b>Book Picture:</b></a>
                            <input id="box" type="text" name="ethumbnailURI" value="<?php echo $thumbnailURI ?>">
                            <a style="color:black"><b>Book Info:</b></a>
                            <input id="box" type="text" name="einfoURI" value="<?php echo $infoURI ?>">
                            <a style="color:black"><b>Book Preview:</b></a>
                            <input id="box" type="text" name="epreview" value="<?php echo $previewURI ?>">
                            <a style="color:black"><b>ApiURI:</b></a>
                            <input id="box" type="text" name="eapi" value="<?php echo $apiURI ?>">

                            <a class="col m3"></a><input type="submit" value="SUBMIT" name="submit" class="col m6">
                        </form>
                    </div>
                    <div class="col m4">
                        <?php
                        echo "<img src=$thumbnailURI title='$thumbnailURI' alt='$title'>";
                        ?>
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