<?php
/*
 * Hog Store Website Version 6
 * OrderDataService.php Version 2
 * Shawn Fradet
 * CST-236
 * 4/4/2021
 * This class is used for accessing the database to store and retrieve order information.
 */

require_once "Database.php";

class OrderDataService
{
    private $connection; // Holds connection data

    function __construct($connection)
    {
        $this->connection = $connection;
    }

    // Function for returning Order details associated with a order id
    function getOrdersByID($orderID)
    {
        // Prepare search string
        //$sql_query = "SELECT * FROM orderdetails WHERE ORDER_ID=?";
        $sql_query = "SELECT * FROM orderdetails INNER JOIN orders ON orders.ORDER_ID=orderdetails.ORDER_ID WHERE orderdetails.ORDER_ID=?";
        $stmt = $this->connection->prepare($sql_query);
        $stmt->bind_param("i", $orderID);

        // Execute search and get results
        $stmt->execute();
        $result = $stmt->get_result();

        // Set results to an array. If no results, return null
        if ($result->num_rows == 0)
        {
            return null;
        } else {
            $order_array = array();

            while ($order = $result->fetch_assoc())
            {
                $returnedDetails = new OrderDetails($order["PRODUCT_ID"], $order["QUANTITY"], $order["CURRENTPRICE"], $order['ORDER_ID'], $order['DATE']);

                array_push($order_array, $returnedDetails);
            }

            return $order_array;
        }
    }

    // Function for returning all orders and order details within a date range.
    function getOrdersByDate($date1, $date2)
    {
        // Prepare search string
        $sql_query = "SELECT * FROM orderdetails INNER JOIN orders ON orders.ORDER_ID=orderdetails.ORDER_ID WHERE DATE BETWEEN ? AND ? ORDER BY orderdetails.PRODUCT_ID, orderdetails.QUANTITY DESC";
        $stmt = $this->connection->prepare($sql_query);
        $stmt->bind_param("ss", $date1, $date2);

        // Execute search and get results
        $stmt->execute();
        $result = $stmt->get_result();

        // Set results to an array. If no results, return null
        if ($result->num_rows == 0)
        {
            return 'None';
        } else {
            $order_array = array();

            while ($order = $result->fetch_assoc())
            {
                $returnedDetails = new OrderDetails($order["PRODUCT_ID"], $order["QUANTITY"], $order["CURRENTPRICE"], $order['ORDER_ID'], $order['DATE']);

                array_push($order_array, $returnedDetails);
            }

            return $order_array;
        }
    }

    // Function for creating new order. Returns order ID
    function createNewOrder($userId, $creditCardID)
    {
        // Prepare SQL String
        $sql_query = "INSERT INTO orders (USER_ID, CC_ID) VALUES (?, ?)";
        $stmt = $this->connection->prepare($sql_query);

        $stmt->bind_param("ii", $userId, $creditCardID);

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
        // Prepare SQL String
        $sql_query = "INSERT INTO orderdetails (ORDER_ID, PRODUCT_ID, QUANTITY, CURRENTPRICE) VALUES (?, ? , ?, ?)";
        $stmt = $this->connection->prepare($sql_query);

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

    // Function for adding a credit acard to database
    function addCreditCard($creditCard)
    {
        // Get Credit Card information
        $ccName = $creditCard->getCcName();
        $ccNumber = $creditCard->getCcNumber();
        $ccCVV = $creditCard->getCvv();
        $ccMonth = $creditCard->getExpMonth();
        $ccYear = $creditCard->getExpYear();
        $userID = $creditCard->getUserID();

        // Prepare SQL String
        $sql_query = "INSERT INTO creditcard (CC_NAME, CARD_NUMBER, EXP_YEAR, EXP_MONTH, CVV, USER_ID) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->connection->prepare($sql_query);

        $stmt->bind_param("ssiiii", $ccName, $ccNumber, $ccYear, $ccMonth, $ccCVV, $userID);

        // Execute statement return ID.
        if ($stmt->execute())
        {
            return $stmt->insert_id;
        }
        else {
            return false;
        }
    }
}