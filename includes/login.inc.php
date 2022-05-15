<?php

if (!isset($_POST["submit"])) {
    //Grab the data from form
    $username = $_POST["username-login"];
    $pwd = $_POST["pwd-login"];


    //Instantiate Sign up Controller class
    include "../classes/database.php";
    include "../classes/login.php";
    include "../classes/login-controller.php";

    $login = new loginControl($username, $pwd);

    //Running error handlers and login signup
    $login->loginUser();

    //Going back to front page
    header("location: ../index.php?message=successfully-login");
}