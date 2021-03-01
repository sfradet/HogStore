<?php
/*
 * Hog Store Website Version 1
 * RegistrationService.php Version 1
 * Shawn Fradet
 * CST-236
 * 2/28/2021
 * This class is for handling registration actions.
 */

class RegistrationService
{
    // User registration variables
    private $firstname;
    private $lastname;
    private $email;
    private $username;
    private $password;

    public function __construct($firstname, $lastname, $username, $email, $password)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
    }

    // Class for checking if a username is already registered
    public function checkUsername()
    {
        $userDataService = new UserDataService();

        // Check for username in database
        $usernameExists = $userDataService->findUsername($this->username);

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
    public function checkEmail()
    {
        $userDataService = new UserDataService();

        // Check for email in database
        $emailExists = $userDataService->findEmail($this->email);

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
    public function addUser()
    {
        $userDataService = new UserDataService();

        // Add user to database
        $userAdded= $userDataService->registerUser($this->firstname, $this->lastname, $this->username, $this->email, $this->password);

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