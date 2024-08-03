<?php
if(isset($_POST['submit_login']))
{
    // Get the data from Sign UP form
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];


    // Init Sign up controller Class
    include("../classes/db_classes.php");
    include("../classes/login_classes.php");
    include("../classes/login_controller_classes.php");

    $login = new LoginController($uid, $pwd, $pwdrepeat, $email);
    // Running Error Handlers
    $signup->loginUser();
    // Go back to the front page
    header("location: ../index.php?error=none");
}  