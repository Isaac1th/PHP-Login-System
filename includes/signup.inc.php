<?php

if (isset($_POST["submit"]))
{
    // Grabbing the data
    $uid = $_POST["submit"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];
    $email = $_POST["email"];

    // Instantiate SignupContr class
    include '../classes/Dbh.classes.php';
    include '../classes/Signup.classes.php';
    include '../classes/Signup.contr.classes.php';
    $signup = new SignupContr($uid, $pwd, $pwdrepeat, $email);

    // Running error handlers and user signup
    $signup->SignupUser();

    // Going back to front page
    header("location: ../index.php?error=none");
}