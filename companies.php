<?php
require_once("util-db.php");
require_once("model-companies.php");

$pageTitle = "Companies";
include "view-header.php";
$companies = selectCompanies();  // Fetch companies from the model
include "view-companies.php";  // Display companies
include "view-footer.php";
?>
