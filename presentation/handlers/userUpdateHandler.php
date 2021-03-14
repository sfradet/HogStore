<?php

require_once "../views/_header.php";
require_once "../../Autoloader.php";
require_once "../../utility/securePage.php";

$userService = new UserService();
$_SESSION['error_msg_email'] = null;
$_SESSION['error_msg_user'] = null;


if ($_POST['route']=="update")
{
    $user = $userService->getUserById($_POST['id']);

    $firstname = clean_input($_POST['Firstname']);
    $lastname = clean_input($_POST['Lastname']);
    $username = clean_input($_POST['Username']);
    $email = clean_input($_POST['Email']);
    $role = clean_input($_POST['Role']);
    $id = clean_input($_POST['id']);

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

        $user->setFirstname($firstname);
        $user->setLastname($lastname);
        $user->setUsername($username);
        $user->setEmail($email);
        $user->setRole($role);
        $result = $userService->updateUser($user);

        if ($result)
        {
            header("Location: \HogStore\presentation\handlers\userHandler.php");
        }
        else {
            include("../views/_userEdit.php");
        }
    }
}
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

function clean_input($inputData) {
    $inputData = trim($inputData);
    $inputData = stripslashes($inputData);
    $inputData = htmlspecialchars($inputData);
    return $inputData;
}