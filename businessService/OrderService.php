<?php
/*
 * Hog Store Website Version 4
 * OrderService.php Version 2
 * Shawn Fradet
 * CST-236
 * 3/25/2021
 * This class is used for accessing the data service for interfacing with database.
 */

class OrderService
{
    // Function to create a new order. Takes user id as argument
    function createOrder($userID)
    {
        // Create database connection
        $db = new Database();
        $connection = $db->getConnection();

        // Create OrderDataService with connection as argument
        $orderDataService = new OrderDataService($connection);

        // Return the Order ID after creation
        return $orderDataService->createNewOrder($userID);
    }

    // Function to retrieve coupon by its code. Take coupon code as argument
    function getCouponByCode($couponCode)
    {
        // Create database connection
        $db = new Database();
        $connection = $db->getConnection();

        // Create OrderDataService with connection as argument
        $orderDataService = new OrderDataService($connection);

        return $orderDataService->getCouponByCode($couponCode);
    }

    // Function to retrieve coupon by its ID. Takes coupon ID as argument
    function getCouponByID($couponID)
    {
        // Create database connection
        $db = new Database();
        $connection = $db->getConnection();

        // Create OrderDataService with connection as argument
        $orderDataService = new OrderDataService($connection);

        return $orderDataService->getCouponByID($couponID);
    }

    // Function to check if coupon has already been used by user. Takes coupon ID and user ID as argument
    function checkCouponUsage($couponID, $userID)
    {
        // Create database connection
        $db = new Database();
        $connection = $db->getConnection();

        // Create OrderDataService with connection as argument
        $orderDataService = new OrderDataService($connection);

        // Get all Order Details associated with a Order ID. Returns Array of OrderDetails
        return $orderDataService->checkCouponUsage($couponID, $userID);
    }

    // Function to create a new Order Detail
    function getOrderDetails($orderID)
    {
        // Create database connection
        $db = new Database();
        $connection = $db->getConnection();

        // Create OrderDataService with connection as argument
        $orderDataService = new OrderDataService($connection);

        // Get all Order Details associated with a Order ID. Returns Array of OrderDetails
        return $orderDataService->getOrdersByID($orderID);
    }

    // Function to add an item to an existing order
    function addOrderItem($orderId, $productID, $qty, $cost)
    {
        // Create database connection
        $db = new Database();
        $connection = $db->getConnection();

        // Create OrderDataService with connection as argument
        $orderDataService = new OrderDataService($connection);

        // Add single Order Details item to Orderdetails table.
        return $orderDataService->addOrderItem($orderId, $productID, $qty, $cost);
    }

    // Function to add credit card to the database.
    function addCreditCard($creditCard)
    {
        // Create database connection
        $db = new Database();
        $connection = $db->getConnection();

        // Create OrderDataService with connection as argument
        $orderDataService = new OrderDataService($connection);

        // Return Credit Card ID
        return $orderDataService->addCreditCard($creditCard);

    }

    // Function for processing a complete order.
    function processOrder($cart, $creditCard)
    {
        // Create database connection
        $db = new Database();
        $connection = $db->getConnection();

        // Disable autocommit and being the transaction
        $connection->autocommit(FALSE);
        $connection->begin_transaction();

        // OrderDataService and ProductService instances
        $orderDataService = new OrderDataService($connection);
        $productService = new ProductService();

        // Add credit card to database and get Credit Card ID for Order
        $creditCardID = $orderDataService->addCreditCard($creditCard);

        // Create new order with logged in User's ID and Credit Card. Save returned Order ID
        $orderID = $orderDataService->createNewOrder($cart->getUserid(), $creditCardID);

        // Add coupon to redeemed coupon table
        $redeemedCouponID = $orderDataService->addRedeemedCoupon($cart->getUserid(), $orderID, $cart->getCouponID());

        // Variable for checking if all order details were inserted correctly
        $passed = true;

        // Step through cart and add each item to orderdetails table in database.
        foreach ($cart->getItems() as $productID => $qty)
        {
            $product = $productService->getProductByID($productID);
            $inserted = $orderDataService->addOrderItem($orderID, $productID, $qty, $product->getCost());

            if ($inserted == false)
            {
                $passed = $inserted;
            }
        }

        // If orderdetails passed and order ID is valid commit order, else roll back changes.
        if ($passed && $orderID)
        {
            $connection->commit();
            return $orderID; // Return Order ID
        }
        else
        {
            $connection->rollback();
            return null; // Return null value
        }
    }
}