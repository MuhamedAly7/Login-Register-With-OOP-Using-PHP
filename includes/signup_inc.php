<?php
if(isset($_POST['submit_signup']))
{
    // Get the data from Sign UP form
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $pwdrepeat = $_POST['pwdrepeat'];
    $email = $_POST['email'];


    // Init Sign up controller Class
    include("../classes/db_classes.php");
    include("../classes/signup_classes.php");
    include("../classes/signup_controller_classes.php");

    $signup = new SignupController($uid, $pwd, $pwdrepeat, $email);
    // Running Error Handlers
    $signup->signupUser();
    // Go back to the front page
    header("location: ../index.php?error=none");
}  