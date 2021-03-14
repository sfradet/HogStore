<?php

require_once "../views/_header.php";
require_once "../../Autoloader.php";
require_once "../../utility/securePage.php";

$productService = new ProductService();

if (empty($_POST['route']))
{
    $productArray = $productService->getAllProducts();
    include("../views/_productAdmin.php");
}
elseif ($_POST['route'] == 'view')
{
    $product = $productService->getProductByID($_POST['id']);
    include("../views/_productDetails.php");
}
elseif ($_POST['route'] == 'delete')
{
    $productService->deleteProductById($_POST['id']);
    $productArray = $productService->getAllProducts();
    include("../views/_productAdmin.php");
}
else {
    $product = $productService->getProductByID($_POST['id']);
    include("../views/_editProduct.php");
}

include("../views/_footer.php");

function clean_input($inputData) {
    $inputData = trim($inputData);
    $inputData = stripslashes($inputData);
    $inputData = htmlspecialchars($inputData);
    return $inputData;
}
