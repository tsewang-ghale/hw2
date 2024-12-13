<?php
require_once("util_db.php");
require_once("model_songs_chart.php");
  
$pageTitle = "Songs Chart";
include "view_header.php";
$customers = selectSongs();
include "view_songs_chart.php";
include "view_footer.php";
?>
