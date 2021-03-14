<?php
/*
 * Hog Store Website Version 3
 * ProductService.php Version 2
 * Shawn Fradet
 * CST-236
 * 3/14/2021
 * This class is a service that provides access to Products in the database.
 */
class ProductService
{
    // Get an Array of all products. Returns Array
    public function getAllProducts()
    {
        $productDataService = new ProductDataService();

        return $productDataService->getAllProducts();
    }

    // Search products in database by a string. Takes search string and database column as arguments. Returns array
    public function searchProducts($searchString, $searchColumn)
    {
        $productDataService = new ProductDataService();

        return $productDataService->searchProductsByName($searchString, $searchColumn);
    }

    // Search products in database by id. Returns Product.
    public function getProductByID($id)
    {
        $productDataService = new ProductDataService();

        return $productDataService->getProductById($id);
    }

    // Method for adding a new Product to the database. Takes Product as argument and returns boolean.
    public function addProduct($product)
    {
        $productDataService = new ProductDataService();

        return $productDataService->addProduct($product);
    }

    // Method for deleting a Product from database by its id. Takes id as argument and returns boolean.
    public function deleteProductById($id)
    {
        $productDataService = new ProductDataService();

        return $productDataService->deleteProductById($id);
    }

    // Method for updating a Product in the database. Takes a Product as argument and returns boolean.
    public function updateProduct($product)
    {
        $productDataService = new ProductDataService();

        return $productDataService->updateProduct($product);
    }
}