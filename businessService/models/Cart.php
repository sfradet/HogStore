<?php
/*
 * Hog Store Website Version 4
 * Cart.php Version 1
 * Shawn Fradet
 * CST-236
 * 3/20/2021
 * This class represents a Shopping Cart model..
 */

class Cart
{
    private $userid; // ID of logged in user
    private $items; // Array to hold requested items
    private $subtotals; // Array of subtotals for items in cart
    private $totalPrice; // Total price of everything in the cart
    private $couponID; // ID of any applied coupons
    private $discountAmt; // Coupon Discount Amount

    public function __construct($userid)
    {
        $this->userid = $userid;
        $this->items = array();
        $this->subtotals = array();
        $this->totalPrice = 0;
        $this->couponID = 0;
        $this->discountAmt = 0;
    }

    // Add new item to cart by its productId
    public function addItem($prodId)
    {
        // Add item to cart. If item already in cart, increase quantity by 1.
        if (array_key_exists($prodId, $this->items))
        {
            $this->items[$prodId] += 1;
        }
        else
        {
            $this->items = $this->items + array($prodId => 1);
        }

        $this->calcTotal();
    }

    // Apply discount to cart
    public function addDiscount($discountPercent)
    {
        $this->discountAmt = $this->totalPrice * $discountPercent;
        $this->totalPrice -= $this->discountAmt;
    }

    // Remove discount from cart
    public function removeDiscount()
    {
        $this->couponID = 0;
        $this->discountAmt = 0;
        $this->calcTotal();
    }

    // Get total quantity of items in cart. Returns integer
    public function cartTotalItems()
    {
        $totalCount = 0;

        foreach($this->items as $item => $qty)
        {
            $totalCount += $qty;
        }
        return $totalCount;
    }

    // Update quantity in cart. Takes product ID and new quantity as arguments
    function updateQty($prodId, $newQty)
    {
        // If item exists, replace quantity.
        if (array_key_exists($prodId, $this->items))
        {
            $this->items[$prodId] = $newQty;
        }
        // If item does not exist, add with new quantity.
        else
        {
            $this->items = $this->items + array($prodId => $newQty);
        }

        // If quantity set to zero, remove item from cart.
        if ($this->items[$prodId] == 0)
        {
            unset($this->items[$prodId]);
        }

        $this->couponID = 0;

        // Recalculate cart total cost
        $this->calcTotal();
    }

    // Get total cost of items in cart.
    function calcTotal()
    {
        $this->totalPrice = 0;

        $productService = new ProductService();

        // Step through each item and get total cost for quantity.
        foreach($this->items as $item => $qty)
        {
            $product = $productService->getProductByID($item);
            $product_subtotal = $product->getCost() * $qty;
            $this->subtotals = $this->subtotals + array($item => $product_subtotal);
            $this->totalPrice = $this->totalPrice + $product_subtotal;
        }
    }

    // Reset cart
    function clearCart()
    {
        $this->items = array();
        $this->subtotals = array();
        $this->totalPrice = 0;
        $this->couponID = 0;
        $this->discountAmt = 0;

        $this->calcTotal();
    }

    // Getters and Setters
    /**
     * @return mixed
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * @param mixed $userid
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;
    }

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param array $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }

    /**
     * @return array
     */
    public function getSubtotals()
    {
        return $this->subtotals;
    }

    /**
     * @param array $subtotals
     */
    public function setSubtotals($subtotals)
    {
        $this->subtotals = $subtotals;
    }

    /**
     * @return int
     */
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    /**
     * @param int $totalPrice
     */
    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;
    }

    /**
     * @return mixed
     */
    public function getCouponID()
    {
        return $this->couponID;
    }

    /**
     * @param mixed $couponID
     */
    public function setCouponID($couponID)
    {
        $this->couponID = $couponID;
    }

    /**
     * @return int
     */
    public function getDiscountAmt()
    {
        return $this->discountAmt;
    }

    /**
     * @param int $discountAmt
     */
    public function setDiscountAmt($discountAmt)
    {
        $this->discountAmt = $discountAmt;
    }

}