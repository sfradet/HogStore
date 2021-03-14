<?php

require_once "../views/_header.php";
require_once "../../Autoloader.php";
require_once "../../utility/securePage.php";

$userService = new UserService();

if (empty($_POST['route']))
{
    $userArray = $userService->getAllUsers();
    include("../views/_userAdmin.php");
}
elseif ($_POST['route'] == 'view')
{
    $user = $userService->getUserById($_POST['id']);
    include("../views/_userDetails.php");
}
elseif ($_POST['route'] == 'delete')
{
    $userService->deleteUser($_POST['id']);
    $userArray = $userService->getAllUsers();
    include("../views/_userAdmin.php");
}
else {
    $user = $userService->getUserById($_POST['id']);
    include("userUpdateHandler.php");
}

include("../views/_footer.php");

