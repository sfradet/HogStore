<?php
/*
 * Hog Store Website Version 2
 * ProductService.php Version 1
 * Shawn Fradet
 * CST-236
 * 3/7/2021
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

    // Search products in database by id. Returns array.
    public function getProductByID($id)
    {
        $productDataService = new ProductDataService();

        return $productDataService->getProductById($id);
    }

    public function addProduct($product)
    {
        $productDataService = new ProductDataService();

        return $productDataService->addProduct($product);
    }

    public function deleteProductById($id)
    {
        $productDataService = new ProductDataService();

        return $productDataService->deleteProductById($id);
    }

    public function updateProduct($product)
    {
        $productDataService = new ProductDataService();

        return $productDataService->updateProduct($product);
    }
}