<?php
/*
 * Hog Store Website Version 4
 * RegistrationService.php Version 1
 * Shawn Fradet
 * CST-236
 * 2/28/2021
 * This class is for handling registration actions with a database.
 */

class RegistrationService
{
    // Class for checking if a username is already registered
    public function checkUsername($userName)
    {
        $userDataService = new UserDataService();

        // Check for username in database
        $usernameExists = $userDataService->findUsername($userName);

        // Return results
        if ($usernameExists)
        {
            return true;
        }
        else {
            return false;
        }
    }

    // Class for checking if email is already registered
    public function checkEmail($email)
    {
        $userDataService = new UserDataService();

        // Check for email in database
        $emailExists = $userDataService->findEmail($email);

        // Return results
        if ($emailExists)
        {
            return true;
        }
        else {
            return false;
        }
    }

    // Add user to database
    public function addUser($newUser)
    {
        $userDataService = new UserDataService();

        // Add user to database
        $userAdded= $userDataService->registerUser($newUser);

        // Return results
        if ($userAdded)
        {
            return true;
        }
        else {
            return false;
        }
    }
}