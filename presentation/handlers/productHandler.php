<?php
require_once "../views/_header.php";
require_once "../../Autoloader.php";

$productService = new ProductService();

if (empty($_POST))
{
    $productArray = $productService->getAllProducts();
} else {
    $productArray = $productService->searchProducts($_POST['searchString'], $_POST['select']);
}

include("../views/products.php");
include("../views/_footer.php");


