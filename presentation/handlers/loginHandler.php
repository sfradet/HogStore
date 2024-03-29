<?php
/*
 * Hog Store Website Version 3
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
$user = $securityService->authenticate();

// If authenticated, set session data and return to index.php. If no authentication return to _login.php
if (!$user == null)
{
    $_SESSION['principal'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $user->getRole();
    $_SESSION['cart'] = new Cart($user->getId());
    header("Location: ../../index.php");
}
else {
    $_SESSION['principal'] = false;
    header("Location: ../views/_loginFail.php");
}


