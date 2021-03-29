<?php
/*
 * Hog Store Website Version 4
 * CreditCard.php Version 1
 * Shawn Fradet
 * CST-236
 * 3/25/2021
 * This class is used for holding information pertaining to a credit card.
 */
class CreditCard
{
    private $ccName; // Name on Credit Card
    private $ccNumber; // Number form Card
    private $expMonth; // Exp Month
    private $expYear; // Exp Year
    private $cvv; // CVV Number
    private $userID; // User ID associated with card


    function __construct($ccName, $ccNumber, $expMonth, $expYear, $cvv, $userID)
    {
        $this->ccName = $ccName;
        $this->ccNumber = $ccNumber;
        $this->expMonth = $expMonth;
        $this->expYear = $expYear;
        $this->cvv = $cvv;
        $this->userID = $userID;
    }

    // Getters and Setters
    /**
     * @return mixed
     */
    public function getCcName()
    {
        return $this->ccName;
    }

    /**
     * @param mixed $ccName
     */
    public function setCcName($ccName)
    {
        $this->ccName = $ccName;
    }

    /**
     * @return mixed
     */
    public function getCcNumber()
    {
        return $this->ccNumber;
    }

    /**
     * @param mixed $ccNumber
     */
    public function setCcNumber($ccNumber)
    {
        $this->ccNumber = $ccNumber;
    }

    /**
     * @return mixed
     */
    public function getExpMonth()
    {
        return $this->expMonth;
    }

    /**
     * @param mixed $expMonth
     */
    public function setExpMonth($expMonth)
    {
        $this->expMonth = $expMonth;
    }

    /**
     * @return mixed
     */
    public function getExpYear()
    {
        return $this->expYear;
    }

    /**
     * @param mixed $expYear
     */
    public function setExpYear($expYear)
    {
        $this->expYear = $expYear;
    }

    /**
     * @return mixed
     */
    public function getCvv()
    {
        return $this->cvv;
    }

    /**
     * @param mixed $cvv
     */
    public function setCvv($cvv)
    {
        $this->cvv = $cvv;
    }

    /**
     * @return mixed
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * @param mixed $userID
     */
    public function setUserID($userID)
    {
        $this->userID = $userID;
    }


}