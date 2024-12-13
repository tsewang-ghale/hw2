<?php
require_once("util_db.php");
require_once("model_songs.php");

$pageTitle = "Songs";
include "view_header.php";

if (isset($_POST['actionType'])) {
    switch ($_POST['actionType']) {
        case "Add":
            if (InsertSong($_POST['song_name'], $_POST['release_date'], $_POST['idol_group_id'])) {
                echo '<div class="alert alert-success" role="alert">Song added.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error adding Song.</div>';
            }
            break;
        case "Edit":
            if (UpdateSong($_POST['song_id'], $_POST['song_name'], $_POST['release_date'], $_POST['idol_group_id'])) {
                echo '<div class="alert alert-success" role="alert"> Song edited.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error editing Song.</div>';
            }
            break;
        case "Delete":
            if (DeleteSong($_POST['song_id'])) {
                echo '<div class="alert alert-success" role="alert">Song deleted.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error deleting Song.</div>';
            }
            break;
    }
}

$Songs = selectSongs(); // Fetch all songs from the model
include "view_songs.php";
include "view_footer.php"; 
?>
