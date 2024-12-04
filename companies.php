<?php
require_once("util-db.php");
require_once("model-companies.php");

$pageTitle = "Companies";
include "view_header.php";
$companies = selectCompanies();  // Fetch companies from the model
include "view-companies.php";  // Display companies
include "view_footer.php";
?>
