<?php
/*
 * Hog Store Website Version 6
 * ReportService.php Version 1
 * Shawn Fradet
 * CST-236
 * 4/4/2021
 * This class is used for generating reports by accessing the order data service that interfaces with the database.
 */

class ReportService
{
    function getReportByDate($date1, $date2)
    {
        // Create database connection
        $db = new Database();
        $connection = $db->getConnection();

        // Create OrderDataService with connection as argument
        $orderDataService = new OrderDataService($connection);

        // Return the report array after creation
        return $orderDataService->getOrdersByDate($date1, $date2);
    }
}