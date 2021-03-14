<?php
/*
 * Hog Store Website Version 3
 * userHanlder.php Version 1
 * Shawn Fradet
 * CST-236
 * 3/14/2021
 * This file handles all user administration functions.
 */

require_once "../views/_header.php";
require_once "../../Autoloader.php";
require_once "../../utility/securePage.php";

// User Service
$userService = new UserService();

// Check if POST is empty
if (empty($_POST['route']))
{
    // Get array of users and display
    $userArray = $userService->getAllUsers();
    include("../views/_userAdmin.php");
}
// Check if user trying to view User data
elseif ($_POST['route'] == 'view')
{
    // Get User and return details page
    $user = $userService->getUserById($_POST['id']);
    include("../views/_userDetails.php");
}
// Check if user trying to delete User
elseif ($_POST['route'] == 'delete')
{
    // Delete user
    $userService->deleteUser($_POST['id']);

    // Get all users and display table
    $userArray = $userService->getAllUsers();
    include("../views/_userAdmin.php");
}
// Check if user trying to edit user.
else {
    // Get user from database and display edit page.
    $user = $userService->getUserById($_POST['id']);
    include("userUpdateHandler.php");
}

include("../views/_footer.php");

