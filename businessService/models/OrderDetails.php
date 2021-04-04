<?php
/*
 * Hog Store Website Version 6
 * OrderDetails.php Version 2
 * Shawn Fradet
 * CST-236
 * f/4/2021
 * This class is used for holding order information retrieved from the database.
 */
class OrderDetails implements JsonSerializable
{
    private $productID; // Product's ID
    private $quantity; // Quantity purchased
    private $cost; // Cost at purchase
    private $orderID; // Associated Order ID
    private $dateTime; // Order creation timestamp

    // Constructor takes Product ID, Quantity, Cost, Order ID, and Date/time as arguments.
    function __construct($productID, $quantity, $cost, $orderID, $dateTime)
    {
        $this->productID = $productID;
        $this->quantity = $quantity;
        $this->cost = $cost;
        $this->orderID = $orderID;
        $this->dateTime = $dateTime;
    }

    // Function for converting class information to JSON format
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    // Getter and Setters
    /**
     * @return mixed
     */
    public function getProductID()
    {
        return $this->productID;
    }

    /**
     * @param mixed $productID
     */
    public function setProductID($productID)
    {
        $this->productID = $productID;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @param mixed $cost
     */
    public function setCost($cost)
    {
        $this->cost = $cost;
    }

    /**
     * @return mixed
     */
    public function getOrderID()
    {
        return $this->orderID;
    }

    /**
     * @param mixed $orderID
     */
    public function setOrderID($orderID)
    {
        $this->orderID = $orderID;
    }

    /**
     * @return mixed
     */
    public function getDateTime()
    {
        return $this->dateTime;
    }

    /**
     * @param mixed $dateTime
     */
    public function setDateTime($dateTime)
    {
        $this->dateTime = $dateTime;
    }
}