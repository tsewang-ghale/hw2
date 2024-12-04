<?php
require_once("util-db.php");
require_once("model-idol-groups.php");

$pageTitle = "Idol Groups";
include "view_header.php";
$idolGroups = selectIdolGroups();  // Fetch idol groups from the model
include "view-idol-groups.php";  // Display idol groups
include "view_footer.php";
?>
