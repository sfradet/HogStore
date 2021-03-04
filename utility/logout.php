<?php
/*
 * Hog Store Website Version 1
 * logout.php Version 1
 * Shawn Fradet
 * CST-236
 * 2/28/2021
 * This file handles logging a user out and ending their session.
 */
session_start(); // Start session
session_destroy(); // Destroy session information
header('Location: /HogStore/index.php'); // Redirect to login.php page
