<?php
/*
 * Hog Store Website Version 1
 * UserDataService.php Version 1
 * Shawn Fradet
 * CST-236
 * 2/28/2021
 * This class is for actions related to users and the database.
 */
require_once "Database.php";

class UserDataService
{
    // Check database for login credentials
    function authenticateLogin($username, $password)
    {
        $db = new Database();

        $sql_query = "SELECT * FROM users WHERE username LIKE ?";

        $connection = $db->getConnection();

        $stmt = $connection->prepare($sql_query);

        $stmt->bind_param("s", $username);

        $stmt->execute();

        $result = $stmt->get_result();

        // Get results as a associative array
        $row = $result->fetch_assoc();
        // Get retrieved password
        $password_hash = $row['password'];

        // Check password hash
        $passwordCheck = password_verify($password, $password_hash);

        // Return results
        if ($passwordCheck) {
            return true;
        } else {
            return false;
        }
    }

    // Find user by username
    function findUsername($username)
    {
        $db = new Database();

        $sql_query = "SELECT * FROM users WHERE username LIKE ?";

        $connection = $db->getConnection();

        $stmt = $connection->prepare($sql_query);

        $stmt->bind_param("s", $username);

        $stmt->execute();

        $result = $stmt->get_result();

        if (!$result || $result->num_rows == 0){
            return false;
        } else {
            return true;
        }
    }

    // Find user by email
    function findEmail($email)
    {
        $db = new Database();

        $sql_query = "SELECT * FROM users WHERE email LIKE ?";

        $connection = $db->getConnection();

        $stmt = $connection->prepare($sql_query);

        $stmt->bind_param("s", $email);

        $stmt->execute();

        $result = $stmt->get_result();

        if (!$result || $result->num_rows == 0){
            return false;
        } else {
            return true;
        }
    }

    // Add user to database
    function registerUser($firstname, $lastname, $username, $email, $password)
    {
        $db = new Database();

        $sql_query = "INSERT INTO users (first_name, last_name, email, password, username) VALUES (?, ?, ?, ?, ?)";

        $connection = $db->getConnection();

        $stmt = $connection->prepare($sql_query);

        $stmt->bind_param("sssss", $firstname, $lastname, $email, $password, $username);

        if ($stmt->execute())
        {
            return true;
        }
        else {
            return false;
        }
    }

}