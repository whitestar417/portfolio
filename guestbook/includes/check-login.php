<?php

//Turn on error reporting -- this is critical!
ini_set('display_errors', 1);
error_reporting(E_ALL);

//See if the user is logged in
session_start();

if (!isset($_SESSION['un'])) {

    //Store current location
    $_SESSION['page'] = $_SERVER['SCRIPT_URI'];

    //Redirect to login page
    header("location: login.php");
}