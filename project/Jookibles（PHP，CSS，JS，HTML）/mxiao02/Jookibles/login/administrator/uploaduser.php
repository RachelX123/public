<?php
if (isset($_POST['submit'])) {
    $username = $_POST['eusername'];
    $password = $_POST['epassword'];
    $authority = $_POST['eau'];
    $email = $_POST['email'];
    $conn = mysqli_connect('mxiao02.webhosting2.eeecs.qub.ac.uk', 'mxiao02', 'm497XYh1nGWbHK3m', 'mxiao02');
    if ($authority == "RUNNING") {
        $au = 1;
    } else {
        $au = 2;
    }
    $update_sql = "UPDATE `pr2userSystem` SET `user_type`=2,`username`='$username',`password`='$password',`email`='$email',`authority`='$au' WHERE `user_id`=$userid";
    $update = $conn->query($update_sql);

    header("Location:edit.php?uresult=suc");
    //header("Location:edit.php?bresult=suc");
}
?>
