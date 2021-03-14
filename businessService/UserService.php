<?php


class UserService
{
    public function getAllUsers()
    {
        $userDataService = new UserDataService();

        return $userDataService->getAllUsers();
    }

    public function getUserById($id)
    {
        $userDataService = new UserDataService();

        return $userDataService->getUserById($id);
    }

    public function updateUser($user)
    {
        $userDataService = new UserDataService();

        return $userDataService->updateUserById($user);
    }

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