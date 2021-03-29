<?php
/*
 * Hog Store Website Version 4
 * cartHandler.php Version 2
 * Shawn Fradet
 * CST-236
 * 3/25/2021
 * This class is used for handling the shopping cart page and actions.
 */
require_once "../views/_header.php";
require_once "../../Autoloader.php";

$productService = new ProductService(); // Instance of Product service
$orderService = new OrderService(); // Instance of Order service

$cart = $_SESSION['cart']; // Get cart from Session

// If user came from product page display cart
if (empty($_POST['route']))
{
    // Check if cart is empty. If not, display items.
    if ($cart->cartTotalItems() > 0)
    {
        include_once "../views/_shoppingCart.php";
    }
    else
    {
        echo "<h2 class='text-center mt-5'>Your cart is empty</h2>";
    }
}
// If user is trying to remove item update quantity to 0
elseif ($_POST['route'] == 'remove')
{
    $cart->updateQty($_POST['id'], 0);
    header("Location: \HogStore\presentation\handlers\cartHandler.php");
}
// If user is trying to update quantity of item, change its quantity.
elseif ($_POST['route'] == 'update')
{
    $cart->updateQty($_POST['id'], $_POST['select']);
    header("Location: \HogStore\presentation\handlers\cartHandler.php");
}
// User is trying to checkout.
elseif ($_POST['route'] == 'checkout')
{
    include("../views/_payProduct.php");
}
// If user is trying to complete payment
else{

    // Get credit card data from POST
    $ccName = clean_input($_POST['NameCard']);
    $ccNumber = clean_input($_POST['CCNumber']);
    $expMonth = clean_input($_POST['Month']);
    $expYear = clean_input($_POST['Year']);
    $cvv = clean_input($_POST['CVV']);

    // Create new CreditCard
    $cc = new CreditCard($ccName, $ccNumber, $expMonth, $expYear, $cvv, $cart->getUserid());

    // Create new Order and get ID
    $orderID = $orderService->processOrder($cart, $cc);
    // Get total cart cost
    $orderTotal = $cart->getTotalPrice();
    // Clear cart
    $cart->clearCart();
    // Get order details from database.
    $d_array = $orderService->getOrderDetails($orderID);

    include("../views/_orderReceipt.php");
}

include("../views/_footer.php");

// Function for cleaning user input against SQL injection
function clean_input($inputData) {
    $inputData = trim($inputData);
    $inputData = stripslashes($inputData);
    $inputData = htmlspecialchars($inputData);
    return $inputData;
}