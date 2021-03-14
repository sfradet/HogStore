<?php

require_once "../views/_header.php";
require_once "../../Autoloader.php";
require_once "../../utility/securePage.php";

$productService = new ProductService();

if (isset($_POST))
{
    $name = clean_input($_POST['name']);
    $description = clean_input($_POST['description']);
    $count = clean_input($_POST['count']);
    $cost = clean_input($_POST['cost']);
    $image = clean_input($_POST['imageFileName']);

    $product = new Product(0, $name, $cost, $description, $count, $image);

    if ($_POST['route'] == 'add') {


        if ($productService->addProduct($product))
        {
            header("Location: \HogStore\presentation\handlers\productAdminHandler.php");
        }
        else {
        }
    }
    elseif ($_POST['route'] == 'edit')
    {
        $id = clean_input($_POST['id']);

        $product->setId($id);

        if ($productService->updateProduct($product))
        {
            header("Location: \HogStore\presentation\handlers\productAdminHandler.php");
        }
        else {
        }
    }
}

include_once "../views/_addProduct.php";
include("../views/_footer.php");

function clean_input($inputData) {
    $inputData = trim($inputData);
    $inputData = stripslashes($inputData);
    $inputData = htmlspecialchars($inputData);
    return $inputData;
}
