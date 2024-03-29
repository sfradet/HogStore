<?php
/*
 * Hog Store Website Version 4
 * ProductDataService.php Version 2
 * Shawn Fradet
 * CST-236
 * 3/14/2021
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

    // Product to search the database by a id. Returns Product.
    function getProductById($id)
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

            return $product_array[0];
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

    // Add Product to the database
    function addProduct($product)
    {
        // Connect to database
        $db = new Database();
        $connection = $db->getConnection();

        // Prepare SQL String
        $sql_query = "INSERT INTO product (PROD_NAME, PROD_DESCRIPTION, PROD_COUNT, PROD_COST, PROD_IMAGE) VALUES (?, ?, ?, ?, ?)";
        $stmt = $connection->prepare($sql_query);

        $name = $product->getName();
        $description = $product->getDescription();
        $count = $product->getCount();
        $cost = $product->getCost();
        $image = $product->getImageFileName();

        $stmt->bind_param("ssids", $name, $description, $count, $cost, $image);

        // Execute statement return boolean.
        if ($stmt->execute())
        {
            return true;
        }
        else {
            echo "Whoops";
            return false;
        }
    }

    // Update Product data in database
    function updateProduct($product)
    {
        // Connect to database
        $db = new Database();
        $connection = $db->getConnection();

        // Prepare SQL string
        $sql_query = "UPDATE product SET PROD_NAME=?, PROD_DESCRIPTION=?, PROD_COST=?, PROD_COUNT=?, PROD_IMAGE=? WHERE PROD_ID=?";

        $stmt = $connection->prepare($sql_query);

        $name = $product->getName();
        $description = $product->getDescription();
        $count = $product->getCount();
        $cost = $product->getCost();
        $image = $product->getImageFileName();
        $id = $product->getId();

        $stmt->bind_param("ssdisi", $name, $description, $cost, $count, $image, $id);

        // Execute statement return boolean.
        if ($stmt->execute())
        {
            return true;
        }
        else {
            return false;
        }
    }

    // Delete a Product by their id
    function deleteProductById($id)
    {
        // Connect to database
        $db = new Database();
        $connection = $db->getConnection();

        // Prepare search string
        $sql_query = "DELETE FROM product WHERE PROD_ID=?";
        $stmt = $connection->prepare($sql_query);
        $stmt->bind_param("i", $id);

        // Execute statement and return boolean.
        if ($stmt->execute())
        {
            return true;
        } else {
            return false;
        }
    }
}