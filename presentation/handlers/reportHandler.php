<?php
/*
 * Hog Store Website Version 6
 * reportHandler.php Version 1
 * Shawn Fradet
 * CST-236
 * 4/4/2021
 * This class is used for creating reports based on a date range.
 */
require_once "../views/_header.php";
require_once "../../Autoloader.php";
require_once "../../utility/securePage.php";

$productService = new ProductService(); // Instance of Product service
$reportService = new ReportService(); // Instance of Report service

// Retrieve dates from POST data
$date1 = $_POST['date1'];
$date2 = $_POST['date2'];

// Get array of orders/orderdetails from database
$order_array = $reportService->getReportByDate($date1, $date2);;

include_once "../views/_displayReport.php";
include_once "../views/_footer.php";



