<?php

if (isset($_POST["submit"]))
{
    // Grabbing the data
    $uid = $_POST["submit"];
    $pwd = $_POST["pwd"];

    // Instantiate LoginContr class
    include '../classes/Dbh.classes.php';
    include '../classes/Login.classes.php';
    include '../classes/Login.contr.classes.php';
    $login = new LoginContr($uid, $pwd);

    // Running error handlers and user login
    $login->loginUser();

    // Going back to front page
    header("location: ../index.php?error=none");
}