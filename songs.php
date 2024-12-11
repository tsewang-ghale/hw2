<?php
require_once("util-db.php");
require_once("model-songs.php");

$pageTitle = "Songs";
include "view_header.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['actionType'])) {
    switch ($_POST['actionType']) {
        case "Add":
            if (InsertSong($_POST['song_name'], $_POST['release_date'], $_POST['idol_group_id'])) {
                echo '<div class="alert alert-success" role="alert">Song added successfully.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error adding song.</div>';
            }
            break;
        case "Edit":
            if (UpdateSong($_POST['song_id'], $_POST['song_name'], $_POST['release_date'], $_POST['idol_group_id'])) {
                echo '<div class="alert alert-success" role="alert">Song updated successfully.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error updating song.</div>';
            }
            break;
        case "Delete":
            if (DeleteSong($_POST['song_id'])) {
                echo '<div class="alert alert-success" role="alert">Song deleted successfully.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error deleting song.</div>';
            }
            break;
    }
}

$Songs = selectSongs(); // Fetch all songs from the model
include "view-songs.php";
include "view_footer.php"; 
?>
