<?php
/*
 * Hog Store Website Version 1
 * registrationHanlder.php Version 1
 * Shawn Fradet
 * CST-236
 * 2/28/2021
 * This file handles the process of registering a user after form submit..
 */
require_once "header.php";
require_once "Autoloader.php";

// Has password
$password = password_hash(trim($_POST['Password']), PASSWORD_DEFAULT);

// Create RegistrationService instance
$registrationService = new RegistrationService($_POST['Firstname'], $_POST['Lastname'], $_POST['Username'], $_POST['Email'], $password);

// Check if username or email are already registered
$checkUsername = $registrationService->checkUsername();
$checkEmail = $registrationService->checkEmail();

// If either username or email are used, return fail. If neither is used, register user and set session variable.
if ($checkUsername)
{
    $_SESSION['principal'] = false;
    $_SESSION['error_msg'] = "That username is already taken";
    header("Location: registrationFail.php");
} elseif ($checkEmail){
    $_SESSION['principal'] = false;
    $_SESSION['error_msg'] = "That email is already registered";
    header("Location: registrationFail.php");
} else {
    // Attempt to add user
    $loggedIn = $registrationService->addUser();

    if ($loggedIn)
    {
        // Save success to Session
        $_SESSION['principal'] = true;
        $_SESSION['username'] = $_POST['Username'];
        header("Location: index.php");

    }
    else {
        // Display error page.
        $_SESSION['principal'] = false;
        header("Location: loginFail.php");
    }
}


