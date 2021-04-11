<?php
/*
 * Hog Store Website Version 7
 * Coupon.php Version 1
 * Shawn Fradet
 * CST-236
 * 4/11/2021
 * This class represents a Coupon model..
 */

class Coupon
{
    private $couponID; // ID number of coupon
    private $couponCode; // Coupon code for reclaiming
    private $couponValue; // Value of coupon as decimal
    private $couponExpDate; // Expiration date of coupon

    function __construct($couponID, $couponCode, $couponValue, $couponExpDate)
    {
        $this->couponID = $couponID;
        $this->couponCode = $couponCode;
        $this->couponValue = $couponValue;
        $this->couponExpDate = date('M j Y g:i A', strtotime($couponExpDate));
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
     * @return mixed
     */
    public function getCouponCode()
    {
        return $this->couponCode;
    }

    /**
     * @param mixed $couponCode
     */
    public function setCouponCode($couponCode)
    {
        $this->couponCode = $couponCode;
    }

    /**
     * @return mixed
     */
    public function getCouponValue()
    {
        return $this->couponValue;
    }

    /**
     * @param mixed $couponValue
     */
    public function setCouponValue($couponValue)
    {
        $this->couponValue = $couponValue;
    }

    /**
     * @return mixed
     */
    public function getCouponExpDate()
    {
        return $this->couponExpDate;
    }

    /**
     * @param mixed $couponExpDate
     */
    public function setCouponExpDate($couponExpDate)
    {
        $this->couponExpDate = $couponExpDate;
    }
}