<?php
/*
 * Hog Store Website Version 2
 * UserDataService.php Version 1
 * Shawn Fradet
 * CST-236
 * 2/28/2021
 * This class is for actions related to users and the database.
 */
require_once "Database.php";

class UserDataService
{
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
        $db = new Database();

        $sql_query = "UPDATE users SET first_name=?, last_name=?, email=?, password=?, username=?, ROLE=? WHERE id=?";

        $connection = $db->getConnection();

        $stmt = $connection->prepare($sql_query);

        $firstname = $newUser->getFirstname();
        $lastname = $newUser->getLastname();
        $email = $newUser->getEmail();
        $password = $newUser->getPassword();
        $username = $newUser->getUsername();
        $role = $newUser->getRole();
        $id = $newUser->getId();

        $stmt->bind_param("sssssii", $firstname, $lastname, $email, $password, $username, $role, $id);

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
        $db = new Database();

        $sql_query = "SELECT * FROM users WHERE username LIKE ?";

        $connection = $db->getConnection();

        $stmt = $connection->prepare($sql_query);

        $stmt->bind_param("s", $username);

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

            if ($passwordCheck) {
                return $user_array[0];
            } else {
                return null;
            }

            //return $user_array[0];
        }
        // Get results as a associative array
        //$row = $result->fetch_assoc();


        /* Return results
        if ($passwordCheck) {
            return true;
        } else {
            return false;
        }*/
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
    function registerUser($newUser)
    {
        $db = new Database();

        $sql_query = "INSERT INTO users (first_name, last_name, email, password, username, ROLE) VALUES (?, ?, ?, ?, ?, ?)";

        $connection = $db->getConnection();

        $stmt = $connection->prepare($sql_query);

        $firstname = $newUser->getFirstname();
        $lastname = $newUser->getLastname();
        $email = $newUser->getEmail();
        $password = $newUser->getPassword();
        $username = $newUser->getUsername();
        $role = $newUser->getRole();

        $stmt->bind_param("sssssi", $firstname, $lastname, $email, $password, $username, $role);

        if ($stmt->execute())
        {
            return true;
        }
        else {
            return false;
        }
    }
}