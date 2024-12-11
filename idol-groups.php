<?php
require_once("util-db.php");
require_once("model-idol-groups.php");

$pageTitle = "Idol Groups";
include "view_header.php";

if (isset($_POST['actionType'])) {
    switch ($_POST['actionType']) {
        case "Add":
            if (InsertIdolGroup($_POST['group_name'], $_POST['debut_year'], $_POST['members_count'])) {
                echo '<div class="alert alert-success" role="alert">Idol Group added.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error adding Idol Group.</div>';
            }
            break;
        case "Edit":
            if (UpdateIdolGroup($_POST['group_id'], $_POST['group_name'], $_POST['debut_year'], $_POST['members_count'])) {
                echo '<div class="alert alert-success" role="alert">Idol Group edited.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error editing Idol Group.</div>';
            }
            break;
        case "Delete":
            if (DeleteIdolGroup($_POST['group_id'])) {
                echo '<div class="alert alert-success" role="alert">Idol Group deleted.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error deleting Idol Group.</div>';
            }
            break;
    }
}

$idolGroups = selectIdolGroups(); // Fetch idol groups from the model
include "view-idol-groups.php";
include "view_footer.php"; ?>
