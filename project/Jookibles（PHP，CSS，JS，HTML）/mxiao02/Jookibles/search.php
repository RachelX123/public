<?php


$query_rs = "SELECT project.b_id,project.apiURI,project.title,author.author,publisher.name,project.publishedDate,project.description,project.identifier,project.pageCount,project.categories,project.thumbnailURI,project.previewURI,project.infoURI,project.snippet,project.price,pr2genre.genre FROM project 
INNER JOIN author ON project.authors = author.author_id
INNER JOIN pr2genre ON project.genre = pr2genre.id
INNER JOIN publisher ON project.publisher = publisher.pu_id
WHERE (title LIKE '%$kw%') OR (author.author LIKE '%$kw%') OR (pr2genre.genre LIKE '%$kw%') OR (project.b_id LIKE '%$kw%') OR (publisher.name LIKE '%$kw%') OR (project.price LIKE '%$kw%') OR (project.identifier LIKE '%$kw%') limit 30";

$result = getfromdb($query_rs,$conn);

//echo count($result);

?>

<div class="box-container">
    <?php
    foreach ($result as $row) {
        $b_id = $row['b_id'];
        $title = $row['title'];
        $authors = substr($row['author'], 1, strlen($row['author']) - 2);
        if (strlen($authors) < 25) {
            $authors = substr($row['author'], 1, strlen($row['author']) - 2);
        } else {
            $authors = substr($row['author'], 1, 24) . '...';
        }
        $publisher = $row['name'];
        $publishedDate = $row['publishedDate'];
        $price = $row['price'];
        $thumbnailURI = $row['thumbnailURI'];
    ?>
        <div class="box">
            <a href="<?php echo "Bookdetail.php?id=$b_id"; ?>"><img src="<?php echo $thumbnailURI ?>" alt="<?php echo $thumbnailURI ?>" title="<?php echo $thumbnailURI ?>">
                <div class="content">
                    <span><?php echo $authors ?></span>
                    <h3><?php echo $title ?></h3>
                    <div class="share">
                        <a><?php echo $publisher ?><?php echo "<span>|</span>$publishedDate"; ?></a>
                        <div>
                            <form action="" method="POST">

                                <?php
                                //check login:
                                if (empty($user_id) || $user_type!=2) {
                                ?>

                                    <i class="fas fa-heart" id="fav" style="cursor: pointer;"><input type='submit' value='like' name='loglike' style='position:absolute; left:0; width:3rem;opacity:0;cursor: pointer;'></i>
                                    <?php
                                } else {
                                    //checl already like:
                                    $result_sql = "SELECT b_id, user_id FROM favourite WHERE user_id = $user_id AND b_id =$b_id";
                                    $re = getfromdb($result_sql,$conn);
                                    
                                    if (!empty($re)) {
                                    ?>
                                        <input type="text" name="b_id" value="<?php echo $b_id ?>" style="display:none;">
                                        <i class="fas fa-heart" id="fav" style="cursor: pointer; color:red;"><input value="UNLIKE" type="submit" name="unlike" style='background-color: red; position:absolute; left:0; opacity:0;cursor: pointer;'></i>
                                    <?php
                                    } else {
                                    ?>
                                        <input type="text" name="uid" value="<?php echo $user_id ?>" style="display:none;">
                                        <input type="text" name="b_id" value="<?php echo $b_id ?>" style="display:none;">
                                        <i class="fas fa-heart" id="fav" style="cursor: pointer;"><input value="LIKE" type="submit" name="like" style='background-color: red; position:absolute; left:0; opacity:0;cursor: pointer;'></i>

                                <?php
                                    }
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    <?php
    }
    ?>
</div>