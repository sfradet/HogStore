<?php
/*
 * Hog Store Website Version 4
 * OrderService.php Version 1
 * Shawn Fradet
 * CST-236
 * 3/20/2021
 * This class is used for accessing the data service for interfacing with database.
 */

class OrderService
{
    // Create a new order. Takes user id as argument
    function createOrder($userID)
    {
        $orderDataService = new OrderDataService();

        return $orderDataService->createNewOrder($userID);
    }

    // Add an item to an existing order
    function addOrderItem($orderId, $productID, $qty, $cost)
    {
        $orderDataService = new OrderDataService();

        return $orderDataService->addOrderItem($orderId, $productID, $qty, $cost);
    }
}