<?php
/*
 * Hog Store Website Version 4
 * OrderDetails.php Version 1
 * Shawn Fradet
 * CST-236
 * 3/25/2021
 * This class is used for holding order information retrieved from the database.
 */
class OrderDetails
{
    private $productID; // Product's ID
    private $quantity; // Quantity purchased
    private $cost; // Cost at purchase

    // Constructor takes Product ID, Quantity, and Cost as arguments.
    function __construct($productID, $quantity, $cost)
    {
        $this->productID = $productID;
        $this->quantity = $quantity;
        $this->cost = $cost;
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


}