<?php
require_once("util-db.php");
require_once("model-songs.php");

$pageTitle = "Songs";
include "view_header.php";
$songs = selectSongs();  // Fetch songs from the model
include "view-songs.php";  // Display songs
include "view_footer.php";
?>
