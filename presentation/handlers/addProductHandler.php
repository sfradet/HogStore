<?php
/*
 * Hog Store Website Version 3
 * addProductHanlder.php Version 1
 * Shawn Fradet
 * CST-236
 * 3/14/2021
 * This class handles form submits for adding products.
 */

require_once "../views/_header.php";
require_once "../../Autoloader.php";
require_once "../../utility/securePage.php";

// Product service
$productService = new ProductService();

// Check if Post data exists
if (isset($_POST))
{
    // Retrieve Product Post data and create new Product.
    $name = clean_input($_POST['name']);
    $description = clean_input($_POST['description']);
    $count = clean_input($_POST['count']);
    $cost = clean_input($_POST['cost']);
    $image = clean_input($_POST['imageFileName']);

    $product = new Product(0, $name, $cost, $description, $count, $image);

    // Check if user is trying to add new Product
    if ($_POST['route'] == 'add')
    {
        // If adding product is successful take to Product table.
        if ($productService->addProduct($product))
        {
            header("Location: \HogStore\presentation\handlers\productAdminHandler.php");
        }
    }
    // Check if user is trying to edit a product
    elseif ($_POST['route'] == 'edit')
    {
        // Get product id
        $id = clean_input($_POST['id']);

        // Set id of product to update
        $product->setId($id);

        // if editing product successful take to Product table
        if ($productService->updateProduct($product))
        {
            header("Location: \HogStore\presentation\handlers\productAdminHandler.php");
        }
    }
}

include_once "../views/_addProduct.php";
include("../views/_footer.php");

// Function for cleaning user input against SQL injection
function clean_input($inputData) {
    $inputData = trim($inputData);
    $inputData = stripslashes($inputData);
    $inputData = htmlspecialchars($inputData);
    return $inputData;
}
