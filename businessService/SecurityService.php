<?php
/*
 * Hog Store Website Version 3
 * SecurityService.php Version 1
 * Shawn Fradet
 * CST-236
 * 2/28/2021
 * This class for logging in users.
 */

class SecurityService
{
    // Variables for logging in
    private $username;
    private $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    // Check if user exists in database
    public function authenticate()
    {
        $userDataService = new UserDataService();

        return $userDataService->authenticateLogin($this->username, $this->password);
    }
}