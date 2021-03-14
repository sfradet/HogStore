<?php
/*
 * Hog Store Website Version 3
 * Database.php Version 1
 * Shawn Fradet
 * CST-236
 * 2/28/2021
 * This class is used for connecting to a database.
 */

class Database
{
    // Database configuration
    private $dbServerName = "localhost";
    private $dbUserName = "root";
    private $dbPassword = "root";
    private $dbName = "hogstore";

    // Get database connection and return it.
    function getConnection()
    {
        $conn = new mysqli($this->dbServerName, $this->dbUserName, $this->dbPassword, $this->dbName);

        if ($conn->connect_error)
        {
            return "Connection failed " . $conn->connect_error . "<br>";
        }
        else {
            return $conn;
        }
    }

}