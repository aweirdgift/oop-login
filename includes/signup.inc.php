<?php

if (!isset($_POST["submit"])) {
    //Grab the data from form
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $pwdrepeat = $_POST["pwdrepeat"];


    //Instantiate Sign up Controller class
    include "../classes/database.php";
    include "../classes/signup.php";
    include "../classes/signup-controller.php";

    $signup = new signupControl($username, $pwd, $pwdrepeat);

    //Running error handlers and user signup
    $signup->signupUser();

    //Going back to front page
    header("location: ../index.php?message=account-created");
}