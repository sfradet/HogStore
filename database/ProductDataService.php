<?php
/*
 * Hog Store Website Version 2
 * ProductDataService.php Version 1
 * Shawn Fradet
 * CST-236
 * 3/7/2021
 * This class is used for accessing the database and getting product information.
 */
require_once "Database.php";

class ProductDataService
{
    // Function to get all products from the database. Returns array.
    function getAllProducts()
    {
        // Connect to database
        $db = new Database();
        $connection = $db->getConnection();

        // Prepare search string
        $sql_query = "SELECT * FROM product";
        $stmt = $connection->prepare($sql_query);

        // Execute and get results
        $stmt->execute();
        $result = $stmt->get_result();

        // Set results to array. If no results return null.
        if ($result->num_rows == 0)
        {
            return null;
        } else {
            $product_array = array();

            while ($product = $result->fetch_assoc())
            {
                $returnedProduct = new Product($product["PROD_ID"], $product["PROD_NAME"], $product["PROD_COST"], $product["PROD_DESCRIPTION"], $product["PROD_COUNT"], $product["PROD_IMAGE"]);

                array_push($product_array, $returnedProduct);
            }

            return $product_array;
        }
    }

    // Product to search the database by a id. Returns array.
    function getProductsById($id)
    {
        // Connect to database
        $db = new Database();
        $connection = $db->getConnection();

        // Prepare search string
        $sql_query = "SELECT * FROM product WHERE PROD_ID=?";
        $stmt = $connection->prepare($sql_query);
        $stmt->bind_param("i", $id);

        // Execute search and get results
        $stmt->execute();
        $result = $stmt->get_result();

        // Set results to an array. If no results, return null
        if ($result->num_rows == 0)
        {
            return null;
        } else {
            $product_array = array();

            while ($product = $result->fetch_assoc())
            {
                $returnedProduct = new Product($product["PROD_ID"], $product["PROD_NAME"], $product["PROD_COST"], $product["PROD_DESCRIPTION"], $product["PROD_COUNT"], $product["PROD_IMAGE"]);

                array_push($product_array, $returnedProduct);
            }

            return $product_array;
        }
    }

    // Search database for results by search string. Provides database id and column to search as argument.
    function searchProductsByName($searchString, $searchColumn)
    {
        // Connect to a database
        $db = new Database();
        $connection = $db->getConnection();

        // Prepare search string
        $sql_query = "SELECT * FROM product WHERE $searchColumn LIKE ?";
        $stmt = $connection->prepare($sql_query);
        $searchString = "%" . $searchString . "%";
        $stmt->bind_param("s", $searchString);

        // Execute search and get results
        $stmt->execute();
        $result = $stmt->get_result();

        // Set results to an array. Return null in no results.
        if ($result->num_rows == 0)
        {
            return null;
        } else {
            $product_array = array();

            while ($product = $result->fetch_assoc())
            {
                $returnedProduct = new Product($product["PROD_ID"], $product["PROD_NAME"], $product["PROD_COST"], $product["PROD_DESCRIPTION"], $product["PROD_COUNT"], $product["PROD_IMAGE"]);

                array_push($product_array, $returnedProduct);
            }

            return $product_array;
        }
    }
}