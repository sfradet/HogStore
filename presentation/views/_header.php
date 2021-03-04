<?php
/*
 * Hog Store Website Version 1
 * _header.php Version 1
 * Shawn Fradet
 * CST-236
 * 2/28/2021
 * This file contains information to place at the top of the file.
 * It includes a session start and navbar
 */

session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
          crossorigin="anonymous">
    <title>Hog Store</title>
</head>

<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a href="\HogStore\index.php" class="navbar-brand">
            Hog Store
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav">
                <?php
                if ($_SESSION['principal'] == true) : ?>
                    <li class="nav-item">
                        <a href="\HogStore\utility\logout.php" class="nav-link">Logout</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a href="\HogStore\presentation\views\login.php" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="\HogStore\presentation\views\register.php" class="nav-link">Register</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<div class="jumbotron jumbotron fluid">
    <h1 class="text-center">The Hog Store</h1>
</div>
