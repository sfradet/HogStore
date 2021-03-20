<?php
/*
 * Hog Store Website Version 4
 * OrderDataService.php Version 1
 * Shawn Fradet
 * CST-236
 * 3/20/2021
 * This class is used for accessing the database to store and retrieve order information.
 */

require_once "Database.php";

class OrderDataService
{
    // Function for creating new order. Returns order ID
    function createNewOrder($userId)
    {
        // Connect to database
        $db = new Database();
        $connection = $db->getConnection();

        // Prepare SQL String
        $sql_query = "INSERT INTO orders (USER_ID) VALUES (?)";
        $stmt = $connection->prepare($sql_query);

        $stmt->bind_param("i", $userId);

        // Execute statement return boolean.
        if ($stmt->execute())
        {
            return $stmt->insert_id;
        }
        else {
            return false;
        }
    }

    // Function for adding order items to orderdetails table in database
    function addOrderItem($orderId, $productId, $quantity, $price)
    {
        // Connect to database
        $db = new Database();
        $connection = $db->getConnection();

        // Prepare SQL String
        $sql_query = "INSERT INTO orderdetails (ORDER_ID, PRODUCT_ID, QUANTITY, CURRENTPRICE) VALUES (?, ? , ?, ?)";
        $stmt = $connection->prepare($sql_query);

        $stmt->bind_param("iiid", $orderId, $productId, $quantity, $price);

        // Execute statement return boolean.
        if ($stmt->execute())
        {
            return true;
        }
        else {
            return false;
        }
    }
}