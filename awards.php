<?php
require_once("util-db.php");
require_once("model-awards.php");

$pageTitle = "Awards";
include "view_header.php";
$awards = selectAwards();  // Fetch awards from the model
include "view-awards.php";  // Display awards
include "view_footer.php";
?>
