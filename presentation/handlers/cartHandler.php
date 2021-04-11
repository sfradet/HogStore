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

$_SESSION['error_msg_coupon'] = null;

$cart = $_SESSION['cart']; // Get cart from Session

// If user came from product page display cart
if (empty($_POST['route']) || !isset($_POST['route']))
{
    // Check if cart exists. If not, display display message.
    if (isset($cart))
    {
        // If cart has items, display cart. Else display message.
        if ($cart->cartTotalItems() > 0)
        {
            include_once "../views/_shoppingCart.php";
        }
        else
        {
            echo "<h2 class='text-center mt-5'>Your cart is empty.</h2>";
        }
    }
    else
        {
            echo "<h2 class='text-center mt-5'>You must login to access a cart.</h2>";
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
// Check if user is applying a coupon
elseif ($_POST['route'] == 'CouponCode')
{
    // Get coupon code
    $couponCode = clean_input($_POST['CouponCode']);

    // Retrieve coupon from database by its code
    $coupon = $orderService->getCouponByCOde($couponCode);

    // Check if coupon was retrieved from database
    if ($coupon != null)
    {
        // Check if coupon is expired
        if (time() < strtotime($coupon->getCouponExpDate()))
        {
            // Check if user has already used coupon
            if(!$orderService->checkCouponUsage($coupon->getCouponID(), $cart->getUserid()))
            {
                $cart->addDiscount($coupon->getCouponValue());
                $cart->setCouponID($coupon->getCouponID());
            }
            // Set already redeemed message
            else{
                $_SESSION['error_msg_coupon'] = "*Already Used Coupon";
            }
        }
        // Set expired message
        else
        {
            $_SESSION['error_msg_coupon'] = "*Coupon Expired";
        }
    }
    // Set invalid coupon error
    else
    {
        $_SESSION['error_msg_coupon'] = "*Invalid Coupon Code";
    }

    include_once "../views/_shoppingCart.php";
}
elseif ($_POST['route'] == 'RemoveCoupon')
{
    $cart->removeDiscount();
    include_once "../views/_shoppingCart.php";
}
elseif ($_POST['route'] == 'GiftCard')
{
    echo "In the gift card code";
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
    // Get cart cost before discount
    $cart->calcTotal();
    $cartTotal = $cart->getTotalPrice();
    // Get discount amount
    $orderDiscount = $cart->getDiscountAmt();
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