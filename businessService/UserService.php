<?php
/*
 * Hog Store Website Version 4
 * UserService.php Version 1
 * Shawn Fradet
 * CST-236
 * 3/14/2021
 * This class is a service that provides access to Users in the database.
 */

class UserService
{
    // Method for returning an array of all users in database.
    public function getAllUsers()
    {
        $userDataService = new UserDataService();

        return $userDataService->getAllUsers();
    }

    // Method for finding a user in database by id. Takes $id as argument returns User.
    public function getUserById($id)
    {
        $userDataService = new UserDataService();

        return $userDataService->getUserById($id);
    }

    // Method for updating a user in the database. Takes user as argument and returns boolean.
    public function updateUser($user)
    {
        $userDataService = new UserDataService();

        return $userDataService->updateUserById($user);
    }

    // Method for deleting a user from the database by its id. Takes id as argument and returns boolean.
    public function deleteUser($id)
    {
        $userDataService = new UserDataService();

        return $userDataService->deleteUserById($id);
    }

    // Class for checking if a username is already registered
    public function checkUsername($userName)
    {
        $userDataService = new UserDataService();

        // Check for username in database
        return  $userDataService->findUsername($userName);
    }

    // Class for checking if email is already registered
    public function checkEmail($email)
    {
        $userDataService = new UserDataService();

        // Check for email in database
        return $userDataService->findEmail($email);
    }
}