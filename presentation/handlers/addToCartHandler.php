<?php
/*
 * Hog Store Website Version 4
 * addToCartHandler.php Version 1
 * Shawn Fradet
 * CST-236
 * 3/20/2021
 * This class is used for handling adding items to the cart.
 */
require_once "../../Autoloader.php";
session_start();

// Check if user is logged in. Reroute to login if not.
if ($_SESSION['principal'] == null)
{
    header("Location: \HogStore\presentation\\views\_login.php");
}
// If logged in, setup user cart.
else
    {
    $cart = $_SESSION['cart'];

    $cart->addItem($_POST['id']);

    header("Location: \HogStore\presentation\handlers\productHandler.php");
}






