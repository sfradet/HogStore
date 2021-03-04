<?php
/*
 * Hog Store Website Version 1
 * registrationHanlder.php Version 1
 * Shawn Fradet
 * CST-236
 * 2/28/2021
 * This file handles the process of registering a user after form submit..
 */
require_once "../views/_header.php";
require_once "../../Autoloader.php";

// Has password
$password = password_hash(trim($_POST['Password']), PASSWORD_DEFAULT);

$newUser = new User($_POST['Firstname'], $_POST['Lastname'], $_POST['Username'], $_POST['Email'], $password);

// Create RegistrationService instance
$registrationService = new RegistrationService();

// Check if username or email are already registered
$checkUsername = $registrationService->checkUsername($newUser->getUsername());
$checkEmail = $registrationService->checkEmail($newUser->getEmail());

// If either username or email are used, return fail. If neither is used, register user and set session variable.
if ($checkUsername)
{
    $_SESSION['principal'] = false;
    $_SESSION['error_msg'] = "That username is already taken";
    header("Location: ../views/registrationFail.php");
} elseif ($checkEmail){
    $_SESSION['principal'] = false;
    $_SESSION['error_msg'] = "That email is already registered";
    header("Location: ../views/registrationFail.php");
} else {
    // Attempt to add user
    $loggedIn = $registrationService->addUser($newUser);

    if ($loggedIn)
    {
        // Save success to Session
        $_SESSION['principal'] = true;
        $_SESSION['username'] = $_POST['Username'];
        header("Location: ../../index.php");

    }
    else {
        // Display error page.
        $_SESSION['principal'] = false;
        header("Location: ../views/loginFail.php");
    }
}


