<?php
/*
 * Hog Store Website Version 3
 * productAdminHanlder.php Version 1
 * Shawn Fradet
 * CST-236
 * 3/14/2021
 * This file handles all product administration functions.
 */

require_once "../views/_header.php";
require_once "../../Autoloader.php";
require_once "../../utility/securePage.php";

// Product Service
$productService = new ProductService();

// Check for POST data
if (empty($_POST['route']))
{
    // Return all Products
    $productArray = $productService->getAllProducts();
    include("../views/_productAdmin.php");
}
// Check if user is trying to view Product
elseif ($_POST['route'] == 'view')
{
    // Get Product and return details
    $product = $productService->getProductByID($_POST['id']);
    include("../views/_productDetails.php");
}
// Check if user is trying to delete Product
elseif ($_POST['route'] == 'delete')
{
    // Delete Product by $id
    $productService->deleteProductById($_POST['id']);

    // Get all Products and return table
    $productArray = $productService->getAllProducts();
    include("../views/_productAdmin.php");
}
// Check if user is trying to edit product
else {
    // Get Product and display details page
    $product = $productService->getProductByID($_POST['id']);
    include("../views/_editProduct.php");
}

include("../views/_footer.php");

// Function for cleaning user inputs against SQL injection
function clean_input($inputData) {
    $inputData = trim($inputData);
    $inputData = stripslashes($inputData);
    $inputData = htmlspecialchars($inputData);
    return $inputData;
}
