<?php
require_once("util_db.php");
require_once("model_awards.php"); // Change model file to handle awards

$pageTitle = "Awards Chart"; // Title of the page
include "view_header.php";  // Header part

// Fetch awards data from the database
$awards = selectAwards(); // Assuming selectSales() is now selectAwards()

// Arrays to hold awards data and customer names for the chart
$awardData = [];
$customerNames = [];

while ($award = $awards->fetch_assoc()) {
    // Store the customer name and the count of awards per customer
    $customerNames[] = $award['cust_id']; // Assuming 'cust_id' represents the customer ID
    $awardData[] = (int) $award['award_id']; // Assuming 'award_id' represents an individual award
}

include "view_awards_chart.php"; // Include the chart view (updated to view-awards-chart.php)
include "view_footer.php"; // Footer part
?>
