<?php
require_once("util-db.php");
require_once("model-Songs.php");

$pageTitle = "Songs";
include "view_header.php";

if (isset($_POST['actionType'])) {
    switch ($_POST['actionType']) {
        case "Add":
            if (InsertCompany($_POST['company_name'], $_POST['founded_year'], $_POST['employee_count'])) {
                echo '<div class="alert alert-success" role="alert">Company added successfully.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error adding company.</div>';
            }
            break;
        case "Edit":
            if (UpdateCompany($_POST['company_id'], $_POST['company_name'], $_POST['founded_year'], $_POST['employee_count'])) {
                echo '<div class="alert alert-success" role="alert">Company edited successfully.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error editing company.</div>';
            }
            break;
        case "Delete":
            if (DeleteCompany($_POST['company_id'])) {
                echo '<div class="alert alert-success" role="alert">Company deleted successfully.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error deleting company.</div>';
            }
            break;
    }
}

$Songs = selectSongs(); // Fetch Songs from the model
?>

<!-- Display Songs Table -->
<div class="container mt-5">
    <h1>Songs</h1>
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addCompanyModal">Add New Company</button>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Company Name</th>
                    <th>Founded Year</th>
                    <th>Employee Count</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($company = $Songs->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $company['company_id']; ?></td>
                        <td><?php echo $company['company_name']; ?></td>
                        <td><?php echo $company['founded_year']; ?></td>
                        <td><?php echo $company['employee_count']; ?></td>
                        <td>
                            <!-- Edit Button -->
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editCompanyModal<?php echo $company['company_id']; ?>">Edit</button>
                            <!-- Delete Form -->
                            <form method="POST" style="display: inline;">
                                <input type="hidden" name="actionType" value="Delete">
                                <input type="hidden" name="company_id" value="<?php echo $company['company_id']; ?>">
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editCompanyModal<?php echo $company['company_id']; ?>" tabindex="-1" aria-labelledby="editCompanyModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editCompanyModalLabel">Edit Company</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST">
                                    <div class="modal-body">
                                        <input type="hidden" name="actionType" value="Edit">
                                        <input type="hidden" name="company_id" value="<?php echo $company['company_id']; ?>">
                                        <div class="mb-3">
                                            <label for="company_name" class="form-label">Company Name</label>
                                            <input type="text" class="form-control" name="company_name" value="<?php echo $company['company_name']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="founded_year" class="form-label">Founded Year</label>
                                            <input type="date" class="form-control" name="founded_year" value="<?php echo $company['founded_year']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="employee_count" class="form-label">Employee Count</label>
                                            <input type="number" class="form-control" name="employee_count" value="<?php echo $company['employee_count']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Save Changes</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addCompanyModal" tabindex="-1" aria-labelledby="addCompanyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCompanyModalLabel">Add New Company</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <input type="hidden" name="actionType" value="Add">
                    <div class="mb-3">
                        <label for="company_name" class="form-label">Company Name</label>
                        <input type="text" class="form-control" name="company_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="founded_year" class="form-label">Founded Year</label>
                        <input type="date" class="form-control" name="founded_year" required>
                    </div>
                    <div class="mb-3">
                        <label for="employee_count" class="form-label">Employee Count</label>
                        <input type="number" class="form-control" name="employee_count" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add Company</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include "view_footer.php"; ?>
