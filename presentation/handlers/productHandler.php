<?php
/*
 * Hog Store Website Version 2
 * productHandler.php Version 1
 * Shawn Fradet
 * CST-236
 * 3/7/2021
 * This file is for handling user requests for products.
 */

require_once "../views/_header.php";
require_once "../../Autoloader.php";
require_once "../../utility/securePage.php";

$productService = new ProductService();

// Check if user is searching for product. Find matching results
if (!$_POST['searchString'] == null)
{
    $productArray = $productService->searchProducts($_POST['searchString'], $_POST['select']);
}
// Check if user is getting details on a product. Get that product.
elseif (!$_POST['id'] == null) {
    $productArray = $productService->getProductByID($_POST['id']);
}
// Return all products
else {
    $productArray = $productService->getAllProducts();
}

include("../views/_products.php");
include("../views/_footer.php");


