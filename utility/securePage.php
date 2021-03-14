<?php
/*
 * Hog Store Website Version 1
 * securePage.php Version 1
 * Shawn Fradet
 * CST-236
 * 2/28/2021
 * This file is for checking if user is logged in to secure the page.
 */

if (isset($_SESSION['role']) == false || $_SESSION['role'] != 2 || $_SESSION['principal'] == null) {
    header("Location: \HogStore\index.php");
}
