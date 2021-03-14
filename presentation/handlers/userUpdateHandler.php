<?php
/*
 * Hog Store Website Version 3
 * userUpdateHanlder.php Version 1
 * Shawn Fradet
 * CST-236
 * 3/14/2021
 * This file handles all user update functions.
 */

require_once "../views/_header.php";
require_once "../../Autoloader.php";
require_once "../../utility/securePage.php";

// User Service
$userService = new UserService();

// Error messages
$_SESSION['error_msg_email'] = null;
$_SESSION['error_msg_user'] = null;

// Check if user trying to update user.
if ($_POST['route']=="update")
{
    // Get POST data and set to USER
    $firstname = clean_input($_POST['Firstname']);
    $lastname = clean_input($_POST['Lastname']);
    $username = clean_input($_POST['Username']);
    $email = clean_input($_POST['Email']);
    $role = clean_input($_POST['Role']);
    $id = clean_input($_POST['id']);

    $user = $userService->getUserById($id);

    // Check email and username validity
    $emailValid = $userService->checkEmail($email);
    $usernameValid = $userService->checkUsername($username);

    if ($emailValid && $user->getEmail() != $email)
    {
        $_SESSION['error_msg_email'] = "*Email already taken";
        include("../views/_userEdit.php");

    } elseif ($usernameValid && $user->getUsername() != $username)
    {
        $_SESSION['error_msg_user'] = "*Username already taken";
        include("../views/_userEdit.php");
    }
    else {

        // Add user updates
        $user->setFirstname($firstname);
        $user->setLastname($lastname);
        $user->setUsername($username);
        $user->setEmail($email);
        $user->setRole($role);

        // Call User Service and update
        $result = $userService->updateUser($user);

        // Check results. If successful go to User admin table
        if ($result)
        {
            header("Location: \HogStore\presentation\handlers\userHandler.php");
        }
        else {
            include("../views/_userEdit.php");
        }
    }
}
// Display user edit page with User details
else {
    $firstname = clean_input($user->getFirstname());
    $lastname = clean_input($user->getLastname());
    $username = clean_input($user->getUsername());
    $email = clean_input($user->getEmail());
    $password = clean_input($user->getPassword());
    $role = clean_input($user->getRole());
    $id = clean_input($user->getId());

    include("../views/_userEdit.php");
}

// Function for check user inputs against SQL injection
function clean_input($inputData) {
    $inputData = trim($inputData);
    $inputData = stripslashes($inputData);
    $inputData = htmlspecialchars($inputData);
    return $inputData;
}