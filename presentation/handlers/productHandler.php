<?php
require_once "../views/_header.php";
require_once "../../Autoloader.php";
require_once "../../utility/securePage.php";

$productService = new ProductService();

if (!$_POST['searchString'] == null)
{
    $productArray = $productService->searchProducts($_POST['searchString'], $_POST['select']);
} elseif (!$_POST['id'] == null) {
    $productArray = $productService->getProductByID($_POST['id']);
} else {
    $productArray = $productService->getAllProducts();
}

include("../views/_products.php");
include("../views/_footer.php");


