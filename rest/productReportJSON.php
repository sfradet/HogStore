<?php
/*
 * Hog Store Website Version 6
 * productReportJSON.php Version 1
 * Shawn Fradet
 * CST-236
 * 4/4/2021
 * This files is used for returning a list of ordered products withing a date range.
 */
require_once "../Autoloader.php";

$productService = new ProductService(); // Instance of Product service
$reportService = new ReportService(); // Instance of Order service

// Get Dates from GET data
$date1 = $_GET['date1'];
$date2 = $_GET['date2'];

// Get order details from database.
$order_array = $reportService->getReportByDate($date1, $date2);;

echo json_encode($order_array);