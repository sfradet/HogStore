<?php
/*
 * Hog Store Website Version 4
 * UserDataService.php Version 1
 * Shawn Fradet
 * CST-236
 * 2/28/2021
 * This class is for actions related to users and the database.
 */
require_once "Database.php";

class UserDataService
{
    // Method for returning all users in an array.
    function getAllUsers()
    {
        // Connect to database
        $db = new Database();
        $connection = $db->getConnection();

        // Prepare search string
        $sql_query = "SELECT * FROM users";
        $stmt = $connection->prepare($sql_query);

        // Execute and get results
        $stmt->execute();
        $result = $stmt->get_result();

        // Set results to array. If no results return null.
        if ($result->num_rows == 0)
        {
            return null;
        } else {
            $user_array = array();

            while ($user = $result->fetch_assoc())
            {
                $returnedUser = new User($user["first_name"], $user["last_name"], $user["username"], $user["email"], $user["password"]);
                $returnedUser->setId($user['id']);
                $returnedUser->setRole($user['ROLE']);

                array_push($user_array, $returnedUser);
            }

            return $user_array;
        }
    }

    // Update user data in database
    function updateUserById($newUser)
    {
        // Connect to database
        $db = new Database();
        $connection = $db->getConnection();

        // Prepare SQL string
        $sql_query = "UPDATE users SET first_name=?, last_name=?, email=?, password=?, username=?, ROLE=? WHERE id=?";

        $stmt = $connection->prepare($sql_query);

        $firstname = $newUser->getFirstname();
        $lastname = $newUser->getLastname();
        $email = $newUser->getEmail();
        $password = $newUser->getPassword();
        $username = $newUser->getUsername();
        $role = $newUser->getRole();
        $id = $newUser->getId();

        $stmt->bind_param("sssssii", $firstname, $lastname, $email, $password, $username, $role, $id);

        // Execute statement and return boolean.
        if ($stmt->execute())
        {
            return true;
        }
        else {
            return false;
        }
    }

    // Check database for login credentials
    function authenticateLogin($username, $password)
    {
        // Connect to database
        $db = new Database();
        $connection = $db->getConnection();

        // Prepare SQL String
        $sql_query = "SELECT * FROM users WHERE username LIKE ?";
        $stmt = $connection->prepare($sql_query);
        $stmt->bind_param("s", $username);

        // Execute statement and get results.
        $stmt->execute();
        $result = $stmt->get_result();

        // Set results to array. If no results return null.
        if ($result->num_rows == 0)
        {
            return null;
        } else {

            $user_array = array();

            while ($user = $result->fetch_assoc())
            {
                $returnedUser = new User($user["first_name"], $user["last_name"], $user["username"], $user["email"], $user["password"]);
                $returnedUser->setId($user['id']);
                $returnedUser->setRole($user['ROLE']);

                array_push($user_array, $returnedUser);
            }

            // Get retrieved password
            $password_hash = $user_array[0]->getPassword();

            // Check password hash
            $passwordCheck = password_verify($password, $password_hash);

            // Return user if password check true, else return null.
            if ($passwordCheck) {
                return $user_array[0];
            } else {
                return null;
            }
        }
    }

    // Find user by username
    function findUsername($username)
    {
        // Connect to database
        $db = new Database();
        $connection = $db->getConnection();

        // Prepare SQL String
        $sql_query = "SELECT * FROM users WHERE username LIKE ?";
        $stmt = $connection->prepare($sql_query);
        $stmt->bind_param("s", $username);

        // Execute and get results
        $stmt->execute();
        $result = $stmt->get_result();

        // Check results and return boolean.
        if (!$result || $result->num_rows == 0){
            return false;
        } else {
            return true;
        }
    }

    // Delete a user by their id
    function deleteUserById($id)
    {
        // Connect to database
        $db = new Database();
        $connection = $db->getConnection();

        // Prepare search string
        $sql_query = "DELETE FROM users WHERE id=?";
        $stmt = $connection->prepare($sql_query);
        $stmt->bind_param("i", $id);

        if ($stmt->execute())
        {
            return true;
        } else {
            return false;
        }
    }

    // Get user from database by id
    function getUserById($id)
    {
        // Connect to database
        $db = new Database();
        $connection = $db->getConnection();

        // Prepare search string
        $sql_query = "SELECT * FROM users WHERE id=?";
        $stmt = $connection->prepare($sql_query);
        $stmt->bind_param("i", $id);

        // Execute search and get results
        $stmt->execute();
        $result = $stmt->get_result();

        // Set results to array. If no results return null.
        if ($result->num_rows == 0)
        {
            return null;
        } else {
            $user_array = array();

            while ($user = $result->fetch_assoc())
            {
                $returnedUser = new User($user["first_name"], $user["last_name"], $user["username"], $user["email"], $user["password"]);
                $returnedUser->setId($user['id']);
                $returnedUser->setRole($user['ROLE']);

                array_push($user_array, $returnedUser);
            }

            return $user_array[0];
        }
    }

    // Find user by email
    function findEmail($email)
    {
        // Connect to database
        $db = new Database();
        $connection = $db->getConnection();

        // Prepare SQL string
        $sql_query = "SELECT * FROM users WHERE email LIKE ?";
        $stmt = $connection->prepare($sql_query);
        $stmt->bind_param("s", $email);

        // Execute query and return results
        $stmt->execute();
        $result = $stmt->get_result();

        // Check results. Return true for results and null for none.
        if (!$result || $result->num_rows == 0){
            return false;
        } else {
            return true;
        }
    }

    // Add user to database
    function registerUser($newUser)
    {
        // Connect to database
        $db = new Database();
        $connection = $db->getConnection();

        // Preapre SQL string
        $sql_query = "INSERT INTO users (first_name, last_name, email, password, username, ROLE) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $connection->prepare($sql_query);

        $firstname = $newUser->getFirstname();
        $lastname = $newUser->getLastname();
        $email = $newUser->getEmail();
        $password = $newUser->getPassword();
        $username = $newUser->getUsername();
        $role = $newUser->getRole();

        $stmt->bind_param("sssssi", $firstname, $lastname, $email, $password, $username, $role);

        // Execute and return boolean
        if ($stmt->execute())
        {
            return true;
        }
        else {
            return false;
        }
    }
}