<?php
session_start();
//check login by session:
$username = $_SESSION['username'];
$user_id = $_SESSION['user_id'];
$user_type = $_SESSION['user_type'];
//get login info:
include('conn.php'); //connect db
include('get.php'); //function to get info from db

$kw = $_GET['kw']; //GET method for show 

/*account page just can been seen when login and user just can check their own page.
  if not login jump to the login page  need to login then can get own user detail
*/
if (!empty($user_id) & $user_type==2 ) {  //check login by user_id user_id is only one.

    //get detail of user
    $detail_sql = "SELECT username,password,email FROM pr2userSystem WHERE user_id=$user_id";
    $detail = getfromdb($detail_sql, $conn); //call function to get detail from db by query.
    $email = $detail[0]['email'];


    /*change password function:
    user need to input old password and new password to change their password.
    */
    if (isset($_POST['changepa'])) {

        $od = $_POST['oldpassword'];
        $new = $_POST['newpassword'];

        //check old password user can change password when they type correct password
        if ($od == $detail[0]['password']) {
            $change = "UPDATE pr2userSystem SET password = $new WHERE user_id = $user_id";
            $conn->query($change);
            header("Location:account.php?error=2"); //show user change successfull 
        } else {
            header("Location:account.php?error=1"); //show user change fail because old password not cottect
        }
    }


    //delect review function:
    if (isset($_POST['delect'])) {
        //delect comment by userid and bookid or commentid:
        $b_id = $_POST['b_id'];
        $delect_sql = "DELETE FROM comment WHERE user_id = $user_id AND b_id = $b_id";
        //delect need to be check need to query twice:
        $conn->query($delect_sql);
        $conn->query($delect_sql);
    }


    //remove the fabvourite book
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
    </head>

    <body>
        <?php
        include('header2.php'); //header for userpage with diff nav
        ?>
        <div id="k"><a href="javascript:window.location.replace(document.referrer);" id="Back" class="btn" style="font-size: 1.2rem; margin-top:2.4rem;margin-bottom:.8rem; padding-bottom:.6rem;">Back</a></div>

        <!--show user details:-->
        <section class="recommend" id="recommend" style="padding-top: 12rem;">
            <?php
            ?>

            <h1 style="font-size:2.4rem; width:100%;">Welcome: <?php echo $username ?></h1>

            <div class="content">
                <div class="box-container" style="width:100%">
                    <div class="box">
                        <h3 style="font-size: 1.2rem;">USERNAME: <span style="color:rgb(94, 92, 92); margin-left:1.2rem;"><?php echo $username ?></span></h3>
                        <h3 style="font-size: 1.2rem; margin-top:.6rem;">EMAIL:<span style="color:rgb(94, 92, 92); margin-left:1.2rem;"><?php echo $email; ?></span></h3>

                    </div>
                    <!--change password:-->
                    <div class="box">
                        <h3 style="font-size: 1.2rem;">PASSWORD:</h3>
                        <form action="" method="POST"><!--send input to access in own page-->
                            <h3 style="font-size: 1.2rem; margin-top:.6rem;"><input type="password" name="oldpassword" style="font-size: 1.2rem; margin-top:.6rem;" placeholder="old password" required="required" style="margin-left:.6rem;"></h3>
                            <h3 style="font-size: 1.2rem; margin-top:.6rem;"><input type="password" name="newpassword" style="font-size: 1.2rem; margin-top:.6rem;" placeholder="new password" required="required" style="margin-left:.6rem;"></h3>
                            <input type="submit" name="changepa" class="btn" value="change" style="width:5rem; font-size:.6rem; margin:.8rem;padding:.3rem;text-align:center;">
                        </form>
                        <?php
                        //show result for user to know:
                        $error = isset($_GET['error']) ? $_GET['error'] : "";
                        switch ($error) {
                            case 1:
                                echo "<p>old password invalid</p>";
                                break;
                            case 2:
                                echo "<p>change successfully</p>";
                                break;
                        }
                        ?>
                    </div>


                </div>



                <?php
                // if click review in nav show review for user:
                if ($kw == 'review') {
                    $review_sql = "SELECT comment.id, comment.date, comment.comment, comment.rate, comment.b_id,project.title FROM comment 
                        INNER JOIN project ON comment.b_id = project.b_id
                        WHERE user_id = $user_id";
                    $review = getfromdb($review_sql, $conn);
                    //print_r($review);
                    //output all review by this user
                ?>
                    <h1 class="heading" style="font-size: 2.4rem; margin-top:6rem;color:red;"> <span style="color:red;">REVIEW</span> </h1>
                    <div class="box-container" style="width:100%">
                        <div class="box">

                            <div style="margin-top: 1.2rem; ">
                                <?php
                                foreach ($review as $row) {
                                    $id = $row['id'];
                                    $b_id = $row['b_id'];
                                    $date = $row['date'];
                                    $comment = $row['comment'];
                                    $rate = $row['rate'];
                                    $title = $row['title'];
                                ?>

                                    <p><span style="margin-right: .6rem; font-size:1.2rem;"><a href="Bookdetail.php?id=<?php echo $b_id; ?> "><?php echo $title ?></a>:</span><?php echo $comment ?></p>
                                    <p style="margin-top: .8rem;">
                                        <?php 
                                        //show rate by star, 
                                        if (0 <= $rate && $rate <= 1) {
                                            echo '<i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>';
                                        } else if (1 < $rate && $rate <= 2) {
                                            echo '<i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>
                                                <i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>';
                                        } else if (2 < $rate && $rate <= 3) {
                                            echo '<i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>
                                                <i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>
                                                <i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>';
                                        } else if (3 < $rate && $rate <= 4) {
                                            echo '<i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>
                                                <i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>
                                                <i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>
                                                <i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>';
                                        } else if (4 < $rate && $rate <= 5) {
                                            echo '<i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>
                                                <i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>
                                                <i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>
                                                <i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>
                                                <i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>';
                                        }
                                        ?>
                                    </p>
                                    <p style="margin-top: .3rem;"><span style="font-size: .6rem;"><?php echo $date ?></span>
                                    <!--delete button push the b_id or commentid for delete-->
                                    <form action="" method="POST"><input type="submit" name="delect" value="DELETE" class="btn" style="width:5rem; font-size:.6rem; margin:.8rem;padding:.3rem;text-align:center; background:green;margin-bottom:2.4rem;">
                                        <input type="text" name="b_id" value="<?php echo $b_id ?>" style="display:none;">

                                    </form>
                                    </p>



                                <?php
                                }
                                echo "</div>";
                                ?>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>
        </section>
        <?php
        //for favourite
        if ($kw == 'like') {
            $like_sql = "SELECT favourite.b_id, project.title, project.thumbnailURI FROM favourite
                                INNER JOIN project ON favourite.b_id = project.b_id 
                                WHERE user_id = $user_id";
            $like = getfromdb($like_sql, $conn);// get info
        ?>
            <section class="genre" style="margin-top:-18rem;object-fit:initial;-o-object-fit: initial;">
                <h1 class="heading" style="font-size: 2.4rem; margin-top:6rem;color:red;"> <span style="color:red">FAVOURITE</span> </h1>
                <div class="box-container" style="margin-top:6rem;">
                    <?php
                    foreach ($like as $row) {
                        $title = $row['title'];
                        $b_id = $row['b_id'];
                        $thumbnailURI = $row['thumbnailURI'];
                    ?>
                        <div class="box">
                            <a href="<?php echo "Bookdetail.php?id=$b_id"; ?>"><img src="<?php echo $thumbnailURI ?>" alt="<?php echo $thumbnailURI ?>" title="<?php $title ?>"></a>
                            <div class="content">
                                <div class="share">
                                    <p><?php echo $title ?></p>
                                    <form action="" method="POST">
                                        <input type="text" name="b_id" value="<?php echo $b_id ?>" style="display:none;">
                                        <input value="UNLIKE" type="submit" name="unlike" class="btn" style="width:5rem; font-size:.6rem; margin:.8rem;padding:.3rem;text-align:center; background:green;margin-bottom:2.4rem;">
                                    </form>
                                </div>
                            </div>
                        </div>

                    <?php
                    }
                    ?>
                </div>
            </section>
        <?php
        }
        ?>



        <?php
        include('footer.php');
        ?>

        <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

        <!--js file link-->
        <script src="JS/script.js"></script>

    </body>

    </html>
<?php
} else {
    header('Location: login/login-register.php'); //jump to login page when not login
}
?>