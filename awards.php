<?php
require_once("util_db.php");
require_once("model_awards.php");

$pageTitle = "Awards";
include "view_header.php";

if (isset($_POST['actionType'])) {
    switch ($_POST['actionType']) {
        case "Add":
            if (InsertAward($_POST['award_id'], $_POST['award_name'], $_POST['award_year'],$_POST['group_id'] )) {
                echo '<div class="alert alert-success" role="alert">Award added.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error adding Award.</div>';
            }
            break;
        case "Edit":
            if (UpdateAward($_POST['award_id'], $_POST['award_name'], $_POST['award_year'],$_POST['group_id'])) {
                echo '<div class="alert alert-success" role="alert">Award edited.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error editing Award.</div>';
            }
            break;
        case "Delete":
            if (DeleteAward($_POST['award_id'])) {
                echo '<div class="alert alert-success" role="alert">Award deleted.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error deleting Award.</div>';
            }
            break;
    }
}
$awards = selectAwards(); // Fetch awards from the model
include "view_awards.php";
include "view_footer.php"
?>
