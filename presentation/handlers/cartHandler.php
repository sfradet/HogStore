<?php
/*
 * Hog Store Website Version 4
 * cartHandler.php Version 1
 * Shawn Fradet
 * CST-236
 * 3/20/2021
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
else
{
    // Get new order id
    $orderId = $orderService->createOrder($cart->getUserid());

    // Step through cart and add each item to orderdetails table in database.
    foreach ($cart->getItems() as $productID => $qty)
    {
        $product = $productService->getProductByID($productID);
        $orderService->addOrderItem($orderId, $productID, $qty, $product->getCost());
    }

    // Display message and clear cart.
    echo "<h2 class='text-center mt-5'>Thank you for your purchase!</h2>";
    $cart->clearCart();
}

include("../views/_footer.php");