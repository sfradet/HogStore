<?php

class ProductService
{
    public function getAllProducts()
    {
        $productDataService = new ProductDataService();

        return $productDataService->getAllProducts();
    }

    public function searchProducts($searchString, $searchColumn)
    {
        $productDataService = new ProductDataService();

        return $productDataService->searchProductsByName($searchString, $searchColumn);
    }

    public function getProductByID($id)
    {
        $productDataService = new ProductDataService();

        return $productDataService->getProductsById($id);
    }
}