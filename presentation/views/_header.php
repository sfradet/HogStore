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
include_once "../../Autoloader.php";
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link type="text/css" rel="stylesheet" href="\HogStore\utility\simplePagination.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

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
            <ul class="navbar-nav mr-auto">
                <?php
                if ($_SESSION['principal'] == true) : ?>
                    <li class="nav-item">
                        <a href="\HogStore\presentation\handlers\productHandler.php" class="nav-link">Products</a>
                    </li>
                <?php if ($_SESSION['role'] == 2) : ?>
                    <div class="dropdown show">
                        <a class="nav-link dropdown-toggle text-white-50" href="#" role="button" id="dropdownMenuLink"
                           data-toggle="dropdown">Administrator
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="\HogStore\presentation\handlers\userHandler.php">Manage Users</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="\HogStore\presentation\handlers\addProductHandler.php">Add Product</a>
                            <a class="dropdown-item" href="\HogStore\presentation\handlers\productAdminHandler.php">Manage Products</a>
                        </div>
                    </div>
                <?php endif; ?>
                <?php else : ?>
                    <li class="nav-item">
                        <a href="\HogStore\presentation\handlers\productHandler.php" class="nav-link">Products</a>
                    </li>
                    <li class="nav-item">
                        <a href="\HogStore\presentation\views\_login.php" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="\HogStore\presentation\views\_register.php" class="nav-link">Register</a>
                    </li>
                <?php endif; ?>
            </ul>
            <button class="btn btn-sm my-1 mr-2 btn-outline-info" style="width: 85px;" onclick="location.href='cartHandler.php'">
                <i class="bi bi-cart"></i>
                <?php if($_SESSION['principal'] == true)
                {
                    $cart = $_SESSION['cart'];
                    if ($cart->cartTotalItems() > 0)
                    {
                        echo "<span class='badge badge-dark ml-1'>" . $cart->cartTotalItems() . "</span>";
                    }
                }
                ?>
            </button>
            <div class="dropdown show">
                <?php
                if ($_SESSION['principal'] == true) : ?>
                    <a class="nav-link dropdown-toggle text-white px-0" href="#" role="button" id="dropdownMenuLink"
                       data-toggle="dropdown"><?php echo $_SESSION['username'] ?>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="\HogStore\utility\logout.php">Logout</a>
                    </div>
                <?php else : ?>
                    <a class="nav-link dropdown-toggle text-white px-0" href="#" role="button" id="dropdownMenuLink"
                       data-toggle="dropdown">Not Logged In
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="\HogStore\presentation\views\_login.php">Login</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>

<div class="jumbotron jumbotron fluid">
    <h1 class="text-center">The Hog Store</h1>
</div>
