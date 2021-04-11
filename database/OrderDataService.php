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
        if ($result->num_rows == 0) {
            return null;
        } else {
            $order_array = array();

            while ($order = $result->fetch_assoc()) {
                $returnedDetails = new OrderDetails($order["PRODUCT_ID"], $order["QUANTITY"], $order["CURRENTPRICE"], $order['ORDER_ID'], $order['DATE']);

                array_push($order_array, $returnedDetails);
            }

            return $order_array;
        }
    }

    // Function to retrieve Coupon by its coupon code.
    function getCouponByCode($couponCode)
    {
        // Prepare search string
        $sql_query = "SELECT * FROM coupons WHERE COUPON_CODE = ?";
        $stmt = $this->connection->prepare($sql_query);
        $stmt->bind_param("s", $couponCode);

        // Execute search and get results
        $stmt->execute();
        $result = $stmt->get_result();

        // Set results to an array. If no results, return null
        if ($result->num_rows == 0) {
            return null;
        } else {

            $coupon = 0;

            while ($coupons = $result->fetch_assoc()) {
                $coupon = new Coupon($coupons["COUPON_ID"], $coupons["COUPON_CODE"], $coupons["COUPON_VALUE"], $coupons["EXP_DATE"]);
            }

            return $coupon;
        }
    }

    // Function to get coupon by it's coupon ID
    function getCouponByID($couponID)
    {
        // Prepare search string
        $sql_query = "SELECT * FROM coupons WHERE COUPON_ID = ?";
        $stmt = $this->connection->prepare($sql_query);
        $stmt->bind_param("i", $couponID);

        // Execute search and get results
        $stmt->execute();
        $result = $stmt->get_result();

        // Set results to an array. If no results, return null
        if ($result->num_rows == 0) {
            return null;
        } else {

            $coupon = 0;

            while ($coupons = $result->fetch_assoc())
            {
                $coupon = new Coupon($coupons["COUPON_ID"], $coupons["COUPON_CODE"], $coupons["COUPON_VALUE"], $coupons["EXP_DATE"]);
            }

            return $coupon;
        }
    }

    // Function to add redeemed coupons to redeemed coupon table.
    function addRedeemedCoupon($userID, $orderID, $couponID)
    {
        // Prepare SQL String
        $sql_query = "INSERT INTO redeemed_coupon (COUPON_ID, USER_ID, ORDER_ID) VALUES (?, ?, ?)";
        $stmt = $this->connection->prepare($sql_query);

        $stmt->bind_param("iii", $couponID, $userID, $orderID);

        // Execute statement return boolean.
        if ($stmt->execute()) {
            return $stmt->insert_id;
        } else {
            return false;
        }
    }

    // Function to check for redeemed coupon by coupon ID and user ID
    function checkCouponUsage($couponID, $userID)
    {
        // Prepare SQL String
        $sql_query = "SELECT * FROM redeemed_coupon WHERE COUPON_ID = ? AND USER_ID = ?";
        $stmt = $this->connection->prepare($sql_query);
        $stmt->bind_param("ii", $couponID, $userID);

        // Execute search and get results
        $stmt->execute();
        $result = $stmt->get_result();

        // Execute statement return boolean.
        if ($result->num_rows == 0) {
            return false;
        } else {
            return true;
        }
    }

    // Function for returning all orders and order details within a date range.
    function getOrdersByDate($date1, $date2)
    {
        // Prepare search string
        $sql_query = "SELECT * FROM orderdetails INNER JOIN orders ON orders.ORDER_ID=orderdetails.ORDER_ID WHERE cast(DATE as date) BETWEEN ? AND ? ORDER BY orderdetails.PRODUCT_ID, orderdetails.QUANTITY DESC";
        $stmt = $this->connection->prepare($sql_query);
        $stmt->bind_param("ss", $date1, $date2);

        // Execute search and get results
        $stmt->execute();
        $result = $stmt->get_result();

        // Set results to an array. If no results, return null
        if ($result->num_rows == 0) {
            return 'None';
        } else {
            $order_array = array();

            while ($order = $result->fetch_assoc()) {
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
        if ($stmt->execute()) {
            return $stmt->insert_id;
        } else {
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
        if ($stmt->execute()) {
            return true;
        } else {
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
        if ($stmt->execute()) {
            return $stmt->insert_id;
        } else {
            return false;
        }
    }
}