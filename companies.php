<?php
require_once("util_db.php");
require_once("model_companies.php");

$pageTitle = "Companies";
include "view_header.php";

if (isset($_POST['actionType'])) {
    switch ($_POST['actionType']) {
        case "Add":
            if (InsertCompany($_POST['company_name'], $_POST['company_foundation_year'], $_POST['company_ceo'])) {
                echo '<div class="alert alert-success" role="alert">Company added.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error adding company.</div>';
            }
            break;
        case "Edit":
            if (UpdateCompany($_POST['company_id'], $_POST['company_name'], $_POST['company_foundation_year'], $_POST['company_ceo'])) {
                echo '<div class="alert alert-success" role="alert">Company updated.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error updating company.</div>';
            }
            break;
        case "Delete":
            if (DeleteCompany($_POST['company_id'])) {
                echo '<div class="alert alert-success" role="alert">Company deleted.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error deleting company.</div>';
            }
            break;
    }
}
$companies = selectCompanies(); // Fetch companies from the model
include "view_companies.php";
include "view_footer.php"; 
?>
