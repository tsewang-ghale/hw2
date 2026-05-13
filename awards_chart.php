<?php
require_once("util_db.php");
require_once("model_awards_chart.php"); // Change model file to handle awards

$pageTitle = "Awards Chart"; // Title of the page
include "view_header.php";  // Header part

include "view_awards_chart.php"; // Include the chart view (updated to view-awards-chart.php)
include "view_footer.php"; // Footer part
?>
