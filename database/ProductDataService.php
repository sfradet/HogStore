<?php

require_once "Database.php";

class ProductDataService
{
    function getAllProducts()
    {
        $db = new Database();

        $sql_query = "SELECT * FROM product";

        $connection = $db->getConnection();

        $stmt = $connection->prepare($sql_query);

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows == 0)
        {
            return null;
        } else {
            $product_array = array();

            while ($product = $result->fetch_assoc())
            {
                $returnedProduct = new Product($product["PROD_ID"], $product["PROD_NAME"], $product["PROD_COST"], $product["PROD_DESCRIPTION"], $product["PROD_COUNT"]);
                //echo $product["PROD_NAME"] . "<br>";
                array_push($product_array, $returnedProduct);
            }

            return $product_array;
        }
    }

    function getProductsById($id)
    {
        $db = new Database();

        //$id = (int)$id;

        $sql_query = "SELECT * FROM product WHERE PROD_ID=?";

        $connection = $db->getConnection();

        $stmt = $connection->prepare($sql_query);

        $stmt->bind_param("i", $id);

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows == 0)
        {
            return null;
        } else {
            $product_array = array();

            while ($product = $result->fetch_assoc())
            {
                $returnedProduct = new Product($product["PROD_ID"], $product["PROD_NAME"], $product["PROD_COST"], $product["PROD_DESCRIPTION"], $product["PROD_COUNT"]);
                //echo $product["PROD_NAME"] . "<br>";
                array_push($product_array, $returnedProduct);
            }

            return $product_array;
        }
    }

    function searchProductsByName($searchString, $searchColumn)
    {
        $db = new Database();

        $searchString = "%" . $searchString . "%";

        $sql_query = "SELECT * FROM product WHERE $searchColumn LIKE ?";

        $connection = $db->getConnection();

        $stmt = $connection->prepare($sql_query);

        $stmt->bind_param("s", $searchString);

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows == 0)
        {
            return null;
        } else {
            $product_array = array();

            while ($product = $result->fetch_assoc())
            {
                $returnedProduct = new Product($product["PROD_ID"], $product["PROD_NAME"], $product["PROD_COST"], $product["PROD_DESCRIPTION"], $product["PROD_COUNT"]);
                //echo $product["PROD_NAME"] . "<br>";
                array_push($product_array, $returnedProduct);
            }

            return $product_array;
        }
    }
}