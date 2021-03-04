<?php
/*
 * Hog Store Website Version 1
 * loginHandler.php Version 1
 * Shawn Fradet
 * CST-236
 * 2/28/2021
 * This file handles login requests to the website.
 */

require_once "../views/_header.php";
require_once "../../Autoloader.php";

// Get post data
$username = $_POST['Username'];
$password = $_POST['Password'];

// Create security service
$securityService = new SecurityService($username, $password);

// Authenticate user
$loggedIn = $securityService->authenticate();

// If authenticated, set session data and return to index.php. If no authentication return to login.php
if ($loggedIn)
{
    $_SESSION['principal'] = true;
    $_SESSION['username'] = $username;
    header("Location: ../../index.php");
}
else {
    $_SESSION['principal'] = false;
    header("Location: ../views/loginFail.php");
}


