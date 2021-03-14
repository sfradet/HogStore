<?php
/*
 * Hog Store Website Version 3
 * Product.php Version 1
 * Shawn Fradet
 * CST-236
 * 3/14/2021
 * This class represents a Product model..
 */

class Product
{
    private $name; // Products Name
    private $cost; // Products Cost
    private $description; // Product Description
    private $count; // Current Stock
    private $imageFileName; // File name 'filenameexample.jpg'
    private $id; // Database id

    public function __construct($id, $name, $cost, $description, $count, $imageFileName)
    {
        $this->id = $id;
        $this->name = $name;
        $this->cost = $cost;
        $this->description = $description;
        $this->count = $count;
        $this->imageFileName = $imageFileName;
    }

    // Function to get the cost as a currency string
    public function getCostAsString()
    {
        return number_format($this->getCost(), 2, '.', ',');
    }

    // Getter and Setters
    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param mixed $count
     */
    public function setCount($count)
    {
        $this->count = $count;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getImageFileName()
    {
        return $this->imageFileName;
    }

    /**
     * @param mixed $imageFileName
     */
    public function setImageFileName($imageFileName)
    {
        $this->imageFileName = $imageFileName;
    }

}